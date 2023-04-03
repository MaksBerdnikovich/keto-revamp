<?php
/**
 * Template Name: Login
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (is_user_logged_in()) {
    wp_redirect(get_my_plan_url());
    exit();
}
if ($_POST) {
    $res = try_to_login();
    if ($res['success']) {
        wp_redirect(get_my_plan_url());
        exit();
    }
}

get_header();
?>

<div class="email-section login">
    <div class="container offset">
        <div class="section">
            <?php while (have_posts()) : the_post(); ?>

                <?php get_template_part('loop-templates/content', 'login'); ?>

            <?php endwhile; // end of the loop. ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
