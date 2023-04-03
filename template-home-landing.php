<?php
/**
 * Template Name: Home Landing
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();

?>

<div class="home-landing"><!--Landing start-->

    <!--Landing Banner-->
    <?php get_template_part('template-parts/landing/hero'); ?>

    <!--Landing Dear friend!-->
    <?php get_template_part('template-parts/landing/about'); ?>

    <!--Landing Here’s The Truth-->
    <?php get_template_part('template-parts/landing/truth'); ?>

    <!--Landing Mistakes-->
    <?php get_template_part('template-parts/landing/mistakes'); ?>

    <!--Landing Fix Mistakes-->
    <?php get_template_part('template-parts/landing/fix-mistakes'); ?>

    <!--Landing Six Reasons-->
    <?php get_template_part('template-parts/landing/reasons'); ?>

    <!--Landing Wish To Lose-->
    <?php get_template_part('template-parts/landing/wish-to-lose'); ?>

    <!--Landing Keto Worked For Them-->
    <?php get_template_part('template-parts/landing/keto-worked'); ?>

    <!--Landing Keto Meal Plans-->
    <?php get_template_part('template-parts/landing/keto-plan'); ?>

    <!--Landing You Should NOT Use This Service If-->
    <?php get_template_part('template-parts/landing/not-use-service'); ?>

    <!--Landing The Next Thing I Want You-->
    <?php get_template_part('template-parts/landing/next-thing'); ?>

    <!--Landing There Are Three Choices-->
    <?php get_template_part('template-parts/landing/three-choices'); ?>

    <!--Landing Offer Plan-->
    <?php get_template_part('template-parts/landing/offer-plan'); ?>

</div><!--Landing end-->

<?php get_footer(); ?>
