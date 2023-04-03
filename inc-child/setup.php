<?php

function add_child_theme_textdomain()
{
    load_child_theme_textdomain('understrap-child', get_stylesheet_directory() . '/languages');
}

add_action('after_setup_theme', 'add_child_theme_textdomain');

if (function_exists('add_image_size')) {
    add_image_size('picture-thumb', 300, 300, [
        'center',
        'center',
    ]);
}

register_nav_menus([
    'primary-logged' => __('Primary Logged Menu', 'understrap'),
    'footer' => __('Footer Menu', 'understrap'),
]);

add_action('check_admin_referer', 'logout_without_confirmation', 1, 2);
function logout_without_confirmation($action, $result)
{
    if (! $result && ($action == 'log-out')) {
        wp_safe_redirect(get_logout_url());
        exit();
    }
}

function get_logout_url($redirectUrl = '')
{
    if (! $redirectUrl) {
        $redirectUrl = site_url();
    }
    $return = str_replace("&amp;", '&', wp_logout_url($redirectUrl));

    return $return;
}

