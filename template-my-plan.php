<?php
/**
 * Template Name: My plan
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
if (has_user_premium()) {
    $planStatus = get_user_plan_status();
    if ($planStatus) {
        get_template_part('loop-templates/content', 'my-plan');
    } elseif(is_null($planStatus)) {
        get_template_part('loop-templates/content', 'no-plan');
    } else {
        get_template_part('loop-templates/content', 'generating-plan');
    }
} else {
    get_template_part('loop-templates/content', 'no-premium');
}
?>

<?php get_footer('dashboard'); ?>
