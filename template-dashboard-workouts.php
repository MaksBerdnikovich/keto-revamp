<?php
/**
 * Template Name: Dashboard Workouts
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (! is_user_logged_in()) {
    wp_redirect(get_login_url());
    exit();
}
if (! has_user_plan_access()) {
    wp_redirect(get_upsell_plan_url());
    exit();
}
get_header('dashboard');
?>

<?php
get_template_part('loop-templates/content', 'workouts');
?>


<?php get_footer('dashboard'); ?>
