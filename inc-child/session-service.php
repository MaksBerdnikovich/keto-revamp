<?php

function get_keto_sessions_table_name()
{
    global $wpdb;

    return $wpdb->base_prefix . 'keto_sessions';
}

function create_keto_sessions_table()
{
    global $wpdb;
    $table = get_keto_sessions_table_name();
    if ($wpdb->get_var("SHOW TABLES LIKE '{$table}'") == $table) {
        return true;
    }
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE `{$table}` (
		id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
		uuid char(32),
		value longtext,
		expiry bigint(20),
		PRIMARY KEY  (id),
		UNIQUE  (uuid)
		) $charset_collate;";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($sql);
    $success = empty($wpdb->last_error);

    return $success;
}

add_action('init', 'create_keto_sessions_table');

function get_keto_session_uuid()
{
    if (! session_id()) {
        session_start();
    }
    if (isset($_SESSION['keto_session_uuid'])) {
        return $_SESSION['keto_session_uuid'];
    }
    if (isset($_COOKIE['keto_session_uuid'])) {
        $_SESSION['keto_session_uuid'] = $_COOKIE['keto_session_uuid'];

        return $_SESSION['keto_session_uuid'];
    }
    $uuid = uniqid();
    set_keto_session_uuid($uuid);

    return $uuid;
}

function set_keto_session_uuid($uuid)
{
    if (! session_id()) {
        session_start();
    }
    setcookie('keto_session_uuid', $uuid, time() + MONTH_IN_SECONDS);
    $_SESSION['keto_session_uuid'] = $uuid;
}

function get_keto_session($key = null, $uuid = false)
{
    if (! $uuid) {
        $uuid = get_keto_session_uuid();
    }
    global $wpdb;
    $table = get_keto_sessions_table_name();
    $sql = $wpdb->prepare("SELECT * FROM {$table} WHERE uuid = %s", $uuid);

    $row = $wpdb->get_row($sql, ARRAY_A);
    if ($row) {
        $row['value'] = json_decode($row['value'], true);
        if (!$key) {
            return $row;
        }
        if (array_key_exists($key, $row['value'])) {
            return $row['value'][$key];
        } else {
            return false;
        }
    }

    return $row;
}

function check_if_keto_session_exists($uuid = false)
{
    if (! $uuid) {
        $uuid = get_keto_session_uuid();
    }
    global $wpdb;
    $table = get_keto_sessions_table_name();
    $sql = $wpdb->prepare("SELECT * FROM {$table} WHERE uuid = %s", $uuid);

    $row = $wpdb->get_row($sql, ARRAY_A);
    if ($row) {
        return true;
    }

    return $row;
}

function set_keto_session($key, $value, $expiry = null, $uuid = false)
{
    global $wpdb;
    if (! $uuid) {
        $uuid = get_keto_session_uuid();
    }
    $table = get_keto_sessions_table_name();
    if (! $expiry) {
        $expiry = time() + MONTH_IN_SECONDS;
    }
    $existRow = get_keto_session(false, $uuid);
    if ($existRow) {
        $existRow['value'][$key] = $value;
        $wpdb->update($table, [
            'uuid'   => $uuid,
            'value'  => json_encode($existRow['value']),
            'expiry' => $expiry,
        ], ['id' => $existRow['id']], [
            '%s',
            '%s',
            '%d',
        ], ['%d']);
    } else {
        $data[$key] = $value;
        $params = [
            'uuid'   => $uuid,
            'value'  => json_encode($data),
            'expiry' => $expiry,
        ];
        $wpdb->insert($table, $params, [
            '%s',
            '%s',
            '%d',
        ]);
    }
}

// автоудаление неактивных сессий
if (! wp_next_scheduled('keto_sessions_remove')) {
    wp_schedule_event(time(), 'daily', 'keto_sessions_remove');
}

if (defined('DOING_CRON') && DOING_CRON) {
    add_action('keto_sessions_remove', 'keto_clear_expired_sessions');
}
function keto_clear_expired_sessions()
{
    global $wpdb;
    $table = get_keto_sessions_table_name();
    $sql = $wpdb->prepare("DELETE FROM {$table} WHERE expiry < %d", time());
    $wpdb->query($sql);
}

function delete_keto_session()
{
    global $wpdb;
    $uuid = get_keto_session_uuid();
    $table = get_keto_sessions_table_name();
    $wpdb->delete($table, ['uuid' => $uuid]);
}