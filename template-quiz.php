<?php
/**
 * Template Name: Quiz
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

?>

<div class="quiz-section">
    <div class="container">
        <!--Quiz form-->
        <form id="ketoCalcForm" method="post" action="<?php echo get_summary_url() ?>" class="keto-calc-form">
            <input type="hidden" name="gender" value="m"/>
            <input type="hidden" name="action" value="show-quiz"/>
            <input type="submit" class="submit" style="display: none"/>

            <div class="section quiz__wrap">
                <!--Quiz preloader-->
                <div class="preloader element">
                    <div class="preloader__loader"></div>
                </div>

                <!--Quiz carousel element-->
                <div class="quiz__carousel owl-carousel">
                    <!--Quiz carousel steps-->
                    <?php get_template_part('template-parts/quiz-steps/step-0'); ?>
                    <?php get_template_part('template-parts/quiz-steps/step-1'); ?>
                    <?php get_template_part('template-parts/quiz-steps/step-2'); ?>
                    <?php get_template_part('template-parts/quiz-steps/step-3'); ?>
                    <?php get_template_part('template-parts/quiz-steps/step-4'); ?>
                    <?php get_template_part('template-parts/quiz-steps/step-5'); ?>
                    <?php get_template_part('template-parts/quiz-steps/step-6'); ?>
                    <?php get_template_part('template-parts/quiz-steps/step-7'); ?>
                    <?php get_template_part('template-parts/quiz-steps/step-8'); ?>
                    <?php get_template_part('template-parts/quiz-steps/step-9'); ?>
                    <?php get_template_part('template-parts/quiz-steps/step-10'); ?>
                    <?php get_template_part('template-parts/quiz-steps/step-11'); ?>
                </div>

                <!--Quiz carousel navigate-->
                <div class="quiz__navigate">
                    <div class="quiz__nav-prev">
                        <button class="quiz__prev-btn" disabled="disabled"><i class="icon-next"></i></button>
                    </div>
                    <div class="quiz__nav-page">
                        <div class="quiz__nav-page-cur">1</div>
                        <div class="quiz__nav-page-sep">—</div>
                        <div class="quiz__nav-page-all">11</div>
                    </div>
                    <div class="quiz__nav-next">
                        <button style="display: none" class="quiz__next-btn btn btn-solid btn-primary" type="submit">Got It</button>
                    </div>
                </div>

                <!--Quiz carousel navigate-->
                <div class="quiz__progress">
                    <div class="quiz__progress-bar" style="width: 10%;"></div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php get_footer(); ?>
