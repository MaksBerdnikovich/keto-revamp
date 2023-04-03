<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header('dashboard');
$container = get_theme_mod('understrap_container_type');
?>

<div class="dashboard-container">
    <div class="dashboard-box dashboard-box-inr">
        <?php while (have_posts()) : the_post(); ?>

            <?php get_template_part('loop-templates/content', 'single-exercise'); ?>

        <?php endwhile; // end of the loop. ?>

    </div>
</div>

<?php get_footer('dashboard'); ?>
