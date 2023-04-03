<?php

use Twilio\Rest\Client;

function get_not_notified_users()
{
    global $wpdb;
    $table = get_keto_sessions_table_name();
    $sql = $wpdb->prepare("SELECT * FROM {$table} WHERE `value` LIKE %s", '%"notified":0%');
    $results = $wpdb->get_results($sql, ARRAY_A);

    return $results;
}

// cron task
if (! wp_next_scheduled('send_sms_to_unpaid_users')) {
    wp_schedule_event(time(), 'hourly', 'send_sms_to_unpaid_users');
}

if (defined('DOING_CRON') && DOING_CRON) {
    add_action('send_sms_to_unpaid_users', 'send_sms_to_unpaid_users');
}
function send_sms_to_unpaid_users()
{
    $users = get_not_notified_users();
    foreach ($users as $user) {
        $userExists = get_user_by('email', $user['email']);
        if ($userExists) {
            continue;
        }
        $notifyTime = get_keto_session('notify_time', $user['uuid']);
        if (time() > $notifyTime) {
            $phone = get_keto_session('phone', $user['uuid']);
            send_checkout_sms($phone, $user['uuid']);
            set_keto_session('notified', 1, false, $user['uuid']);
        }
    }
}

function send_checkout_sms($phone, $code)
{
    if (! $phone) {
        return false;
    }
    $sid = get_twilio_sid();
    $token = get_twilio_token();
    $client = new Client($sid, $token);

    try {
        $client->messages->create($phone, [
            'from' => '+18563630683',
            'body' => "Please, finish your keto diet quiz. Link: " . get_checkout_url() . '?code=' . $code,
        ]);
    } catch (\Twilio\Exceptions\TwilioException $e) {
        error_log($e->getMessage());
    }

    return true;
}

function clean_phone($phone)
{
    $phone = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
    $phone = str_replace(' ', '', $phone);
    $phone = str_replace('-', '', $phone);
    $phone = str_replace('+', '', $phone);
    if (strlen($phone) >= 7) {
        return '+' . $phone;
    }

    return false;
}