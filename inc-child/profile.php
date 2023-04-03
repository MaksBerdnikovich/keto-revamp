<?php

function update_profile()
{
    $userId = get_current_user_id();
    if ($_POST['form'] == 'params') {
        update_profile_data($userId);
        generate_new_user_plan($userId);
    }
    if ($_POST['form'] == 'products') {
        $userKey = 'user_' . $userId;
        update_field('products', $_POST['products'], $userKey);
        update_field('meat', $_POST['meat'], $userKey);
        generate_new_user_plan($userId);
    }

    return [
        'success' => true,
        'message' => 'Profile updated',
    ];
}

function update_profile_data($userId = false, $data = false)
{
    if (! $userId) {
        $userId = get_current_user_id();
    }
    if (! $data) {
        $data = $_POST;
    }
    $userKey = 'user_' . $userId;
    $system = $data['system'];
    $startWeight = $data['weight'];
    $targetWeight = $data['target_weight'];
    $motivation = $data['motivation'];
    $gender = get_field('gender', $userKey) ?? 'm';
    $height = $data['height'] ?? '';
    $height1 = $data['height_1'] ?? '';
    $height2 = $data['height_2'] ?? '';
    $age = $data['age'];
    $activity = $data['activity'];
    $preparationTime = $data['preparation_time'];
    if ($system == 'imperial') {
        $metricHeight = convert_height_to_metric($height1, $height2);
        $metricWeight = convert_weight_to_metric($startWeight);
        $metricTargetWeight = convert_weight_to_metric($targetWeight);
    } else {
        $metricHeight = $height;
        $metricWeight = $startWeight;
        $metricTargetWeight = $targetWeight;
    }
    $firstWeekLose = calculate_first_week_lose($motivation);
    $weekLose = calculate_week_lose($motivation);
    $weeksCount = calculate_weeks_count($metricWeight, $metricTargetWeight, $weekLose, $firstWeekLose);
    $planEnd = carbon_now()->addWeeks($weeksCount);
    $dailyCalories = calculate_daily_calories($metricWeight, $metricHeight, $age, $gender, $motivation, $activity);
    $event = $data['event'];
    $eventDate = carbon_parse($data['event_date']);

    update_field('gender', $gender, $userKey);
    update_field('age', $age, $userKey);
    update_field('system', $system, $userKey);
    if ($system == 'metric') {
        update_field('height', $height, $userKey);
    }
    if ($system == 'imperial') {
        update_field('height_1', $height1, $userKey);
        update_field('height_2', $height2, $userKey);
    }
    update_field('weight', $startWeight, $userKey);
    update_field('starting_weight', $startWeight, $userKey);
    update_field('target_weight', $targetWeight, $userKey);
    update_field('activity', $activity, $userKey);
    update_field('motivation', $motivation, $userKey);
    update_field('preparation_time', $preparationTime, $userKey);
    update_field('plan_start', time(), $userKey);
    update_field('plan_end', $planEnd->timestamp, $userKey);
    update_field('calories', $dailyCalories, $userKey);
    update_field('event', $event, $userKey);
    update_field('event_date', $eventDate->timestamp, $userKey);
}