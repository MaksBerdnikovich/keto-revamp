<?php
/**
 * Template Name: Reset password
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (is_user_logged_in()) {
    wp_redirect(home_url('my-plan'));
    exit();
}
if ($_POST) {
    $res = try_to_reset_password();
    $res['reset_email'] = $_POST['e'];
    if ($res['success']) {
        wp_redirect( home_url('verify-email') );
        exit();
    }
}

get_header();

?>

<div class="email-section reset">
    <div class="container offset">
        <div class="section">
            <?php while (have_posts()) : the_post(); ?>

                <?php get_template_part('loop-templates/content', 'reset-password'); ?>

            <?php endwhile; // end of the loop. ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
