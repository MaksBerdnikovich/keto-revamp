<?php

function get_user_calendar()
{
    $now = carbon_now();
    $start = $now->startOfWeek();
    $end = $start->clone()->addWeeks(2);
    $days = [];
    while (true) {
        $days[] = $start->clone();
        $start->addDay();
        if ($start->greaterThanOrEqualTo($end)) {
            break;
        }
    }

    return $days;
}

function is_today_day($day)
{
    return carbon_now()->isSameDay($day);
}