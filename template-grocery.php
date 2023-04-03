<?php
/**
 * Template Name: Grocery
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header('dashboard');
?>


<div class="dashboard-container">
    <div class="dashboard-box dashboard-box-inr">
        <?php while (have_posts()) : the_post(); ?>

            <?php get_template_part('loop-templates/content', 'grocery'); ?>

        <?php endwhile; // end of the loop. ?>
    </div>
</div>

<?php get_footer('dashboard'); ?>
