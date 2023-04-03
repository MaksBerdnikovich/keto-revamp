<?php

use Carbon\Carbon;

function get_my_measurements(){
    $measurements = get_user_meta(get_current_user_id(), 'measurements', true);

    return ! empty($measurements) ? $measurements : [];
}

function get_my_measurements_date(){
	$measurements_date = get_user_meta(get_current_user_id(), 'measurements_date', true);
	
	return !empty($measurements_date) ? $measurements_date : '';
}

function add_to_measurements($data){
	$measurements = get_my_measurements();
	$item = [
		'id' => count($measurements) + 1,
		'data' => $data,
	];
	$measurements[] = $item;
    update_user_meta(get_current_user_id(), 'measurements', $measurements);

    return $measurements;
}

function delete_from_measurements($id){
	$measurements = get_my_measurements();
    foreach ($measurements as $key => $item) {
        if ($item['id'] == $id) {
            unset($measurements[$key]);
        }
    }
    update_user_meta(get_current_user_id(), 'measurements', $measurements);

    return $measurements;
}

function add_start_date_to_measurements($start_date){
	$measurements_date = carbon_parse($start_date)->timestamp;
	update_user_meta(get_current_user_id(), 'measurements_date', $measurements_date);
	
	return $measurements_date;
}