<div id="quiz" class="quiz-area section-gray section-padding">

    <div class="container">

        <div class="heading">
            <h2 class="heading__title">Calculator</h2>
            <p class="heading__subtitle">Answer the questions</p>
        </div><!-- .heading -->

        <div class="quiz-container">
            <div class="quiz">
                <div class="quiz-progress">
                    <span class="quiz-progress__number"></span>
                </div>
                <form method="post" action="<?php echo home_url('calculator') ?>" class="form keto-calc-form">
                    <div class="owl-carousel quiz__slides">
                        <?php get_template_part('template-parts/quiz-steps/step-1'); ?>
                        <?php get_template_part('template-parts/quiz-steps/step-2'); ?>
                        <?php get_template_part('template-parts/quiz-steps/step-3'); ?>
                        <?php get_template_part('template-parts/quiz-steps/step-4'); ?>
                        <?php get_template_part('template-parts/quiz-steps/step-5'); ?>
                        <?php get_template_part('template-parts/quiz-steps/step-6'); ?>
                        <?php get_template_part('template-parts/quiz-steps/step-7'); ?>
                        <?php get_template_part('template-parts/quiz-steps/step-8'); ?>
                        <?php get_template_part('template-parts/quiz-steps/step-9'); ?>
                    </div><!-- .quiz__slides -->
                </form><!-- .form -->
            </div><!-- .quiz -->
        </div><!-- .quiz-container -->

    </div><!-- .container -->

</div><!-- #quiz -->
