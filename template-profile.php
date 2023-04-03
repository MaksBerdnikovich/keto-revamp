<?php
/**
 * Template Name: Profile
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (! is_user_logged_in()) {
    wp_redirect(home_url('login'));
    exit();
}

get_header('dashboard');

if ($_POST) {
    $res = update_profile();
}
?>

<div class="dashboard-container">
    <?php get_template_part('loop-templates/content-profile') ?>
</div>


<?php get_footer('dashboard'); ?>
