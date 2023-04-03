<?php
/**
 * Template Name: Dashboard 2
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header('dashboard');

?>

<div class="dashboard-container">
    <div class="dashboard-box" id="main">
        <?php while (have_posts()) : the_post(); ?>
            <div class="profile-header">
                <h2 class="dashboard-title"><?php echo get_the_title() ?></h2>
            </div>
            <div class="profile-box">
                <?php the_content(); ?>
            </div>

        <?php endwhile; // end of the loop. ?>

    </div>
</div>
<?php get_footer('dashboard'); ?>
