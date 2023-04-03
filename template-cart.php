<?php
/**
 * Template Name: Cart redirect
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (is_user_logged_in() && has_user_premium()) {
    wp_redirect(get_my_plan_url());
    exit();
} else {
    wp_redirect(get_checkout_url());
    exit();
}
