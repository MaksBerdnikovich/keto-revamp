<?php
/**
 * Template Name: Verify Your Email
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (is_user_logged_in()) {
    wp_redirect(home_url('my-plan'));
    exit();
}

get_header();

?>

<div class="email-section reset">
    <div class="container offset">
        <div class="section">
            <?php while (have_posts()) : the_post(); ?>

                <?php get_template_part('loop-templates/content', 'verify-email'); ?>

            <?php endwhile; // end of the loop. ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
