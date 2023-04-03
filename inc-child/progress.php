<?php

use Carbon\Carbon;

function get_my_progress()
{
    $progress = get_user_meta(get_current_user_id(), 'progress', true);

    return ! empty($progress) ? $progress : [];
}

function add_to_progress($weight)
{
    $progress = get_my_progress();
    $item = [
        'id'     => count($progress) + 1,
        'weight' => $weight,
        'date'   => carbon_now()->timestamp,
    ];
    $progress[] = $item;
    update_user_meta(get_current_user_id(), 'progress', $progress);
    update_user_meta(get_current_user_id(), 'weight', $weight);

    return $progress;
}

function delete_from_progress($id)
{
    $progress = get_my_progress();
    foreach ($progress as $key => $item) {
        if ($item['id'] == $id) {
            unset($progress[$key]);
        }
    }
    update_user_meta(get_current_user_id(), 'progress', $progress);

    return $progress;
}

function generate_progress_graph_data()
{
    $progress = get_my_progress();
    $progressJsData = [];
    $jsLabel = [];
    $targetWeight = get_field('target_weight', 'user_' . get_current_user_id());
    $startingWeight = get_field('starting_weight', 'user_' . get_current_user_id());
    $planStart = get_field('plan_start', 'user_' . get_current_user_id());
    $planEnd = get_field('plan_end', 'user_' . get_current_user_id());
    $planStart = carbon_from_timestamp($planStart);
    $planEnd = carbon_from_timestamp($planEnd);

    $progressJsData[] = $startingWeight;
    $targetJsData[] = $startingWeight;
    $jsLabel[] = $planStart->format('M d');

    $isFinished = false;
    foreach ($progress as $key => $item) {
        $carbon = carbon_parse($item['date']);
        if ($carbon->gte($planEnd) && !$isFinished) {
            $targetJsData[] = $targetWeight;
            $jsLabel[] = $planEnd->format('M d');
            $progressJsData[] = $item['weight'];
        }
        $progressJsData[] = $item['weight'];
        $jsLabel[] = $carbon->format('M d');
        if ($carbon->lt($planEnd)) {
            $targetJsData[] = approximate_target_weight($startingWeight, $targetWeight, $planStart, $planEnd);
        } else {
            $isFinished = true;
        }
    }

    if (!$isFinished) {
        $targetJsData[] = $targetWeight;
        $jsLabel[] = $planEnd->format('M d');
    }

    return [
        'data'   => [
            'progress' => $progressJsData,
            'target'   => $targetJsData,
        ],
        'labels' => $jsLabel,
        'unit' => get_current_weight_unit(),
    ];
}

/**
 * @param $startWeight
 * @param $targetWeight
 * @param Carbon $startDate
 * @param Carbon $endDate
 * @return mixed
 */
function approximate_target_weight($startWeight, $targetWeight, $startDate, $endDate)
{
    $totalDays = $startDate->diffInDays($endDate);
    $currentDays= $startDate->diffInDays(carbon_now());
    $weightDiff = $startWeight - $targetWeight;
    return $startWeight - $currentDays * ($weightDiff / $totalDays);
}