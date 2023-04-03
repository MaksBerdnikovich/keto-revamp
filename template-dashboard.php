<?php
/**
 * Template Name: Dashboard
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
                <a class="back-home" href="<?php echo home_url() ?>"><i class="fa fa-angle-left" aria-hidden="true"></i> Home</a>
                <h2 class="dashboard-title"><?php echo get_the_title() ?></h2>
            </div>
            <div class="profile-box">
                <?php the_content(); ?>
            </div>

        <?php endwhile; // end of the loop. ?>

    </div>
</div>
<?php get_footer('dashboard'); ?>
