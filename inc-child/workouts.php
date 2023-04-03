<?php

use  Carbon\Carbon;

function generate_user_workouts()
{
    $wp_upload_dir = wp_upload_dir();
    $workoutsUrl = $wp_upload_dir['baseurl'] . '/workouts.json';
    $workoutsData = file_get_contents($workoutsUrl);
    $json = json_decode($workoutsData, true);
    $weekNumber = 1;
    $workouts = [];
    $i = 0;
    foreach ($json as $key => $item) {
        if ($i == 3) {
            $weekNumber++;
            $i = 0;
        }
        $w['title'] = $item['title'];
        $w['workoutTitle'] = $item['workoutTitle'];
        $w['duration'] = $item['duration'];
        $w['description'] = $item['description'];
        $w['cal'] = $item['cal'];
        $w['rounds'] = $item['rounds'];
        $w['complete'] = 0;
        $w['thumb'] = false;
        $exercisesPosts = [];
        foreach ($item['workouts'] as $workoutItem) {
            $title = $workoutItem['title'];
            add_filter('posts_where', 'where_title_filter', 10, 2);
            $args = [
                'where_title'    => $title,
                'post_type'      => 'exercise',
                'posts_per_page' => 1,
            ];
            $query = new WP_Query();
            $posts = $query->query($args);
            if ($posts) {
                $postId = $posts[0]->ID;
                $exercisesPosts[] = $postId;
                if (! $w['thumb'] && has_post_thumbnail($postId)) {
                    $w['thumb'] = get_the_post_thumbnail_url($postId, 'full');
                }
            }
            remove_filter('posts_where', 'where_title_filter', 10);
        }
        $w['exercises'] = $exercisesPosts;
        $workouts['week_' . $weekNumber]['day_' . ($i + 1)] = $w;
        $i++;
    }
    $start = carbon_now()->startOfWeek();
    $end = carbon_now()->addWeeks(3)->endOfWeek();

    return [
        'weeks' => $workouts,
        'start' => $start->format('Y-m-d'),
        'end'   => $end->format('Y-m-d'),
    ];
}

function get_user_workouts()
{
    $now = carbon_now();
    $workoutsField = get_field('workouts', 'user_' . get_current_user_id());
    if ($workoutsField) {
        $start = carbon_parse($workoutsField['start']);
        $end = carbon_parse($workoutsField['end']);
        if ($now->gte($start) && $now->lte($end)) {
            return $workoutsField;
        }
    }
    $workoutsField = generate_user_workouts();
    update_field('workouts', $workoutsField, 'user_' . get_current_user_id());

    return $workoutsField;
}

add_action('wp_ajax_submit_day_request', 'submit_day_request');

function submit_day_request()
{
    check_ajax_referer('ajax_nonce');

    $day = $_POST['day'];
    $week = $_POST['week'];

    $plan = get_user_workouts();
    if (! isset($plan['weeks'][$week][$day]['complete'])) {
        wp_send_json([
            'success' => 0,
        ]);
    }

    $response = [
        'success' => 1,
    ];

    $complete = $plan['weeks'][$week][$day]['complete'];

    if ($complete == 0) {
        $plan['weeks'][$week][$day]['complete'] = 1;
        $response['buttonText'] = 'Completed';
        $response['completed'] = 1;
    } elseif ($complete == 1) {
        $plan['weeks'][$week][$day]['complete'] = 0;
        $response['buttonText'] = 'Mark as completed';
        $response['completed'] = 0;
    } else {
        $response['success'] = 0;
    }

    update_field('workouts', $plan, 'user_' . get_current_user_id());

    wp_send_json($response);
    wp_die();
}

function get_week_progress($week)
{
    $plan = get_user_workouts();
    $week = $plan['weeks'][$week];
    $completedDays = 0;
    foreach ($week as $day) {
        if ($day['complete'] === 1) {
            $completedDays++;
        }
    }
    $count = count($week);

    return round($completedDays / $count * 100);
}
