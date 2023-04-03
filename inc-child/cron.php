<?php

add_filter( 'cron_schedules', 'cron_add_one_min' );
function cron_add_one_min( $schedules ) {
    $schedules['one_min'] = array(
        'interval' => 60,
        'display' => 'One minute'
    );
    return $schedules;
}