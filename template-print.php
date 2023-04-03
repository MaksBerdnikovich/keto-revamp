<?php
/**
 * Template Name: Print
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (! is_user_logged_in()) {
	wp_redirect(home_url());
	exit();
}

// Return this line after test
if (!has_user_premium()) {
	//wp_redirect(get_my_plan_url());
}
$type = $_POST['type'];
$id = $_POST['id'] ?? false;
$week = $_POST['week'] ?? false;
$day = $_POST['day'] ?? false;

if ($type == 'recipe') {
	create_recipe_pdf($id);
} elseif ($type == 'day') {
	create_day_pdf($week, $day);
} elseif ($type == 'grocery') {
	create_grocery_pdf($id);
} elseif ($type == 'week') {
	create_week_pdf($week);
} elseif ($type == 'week_all') {
	create_week_all_pdf();
} else {
	wp_redirect(home_url());
	exit();
}