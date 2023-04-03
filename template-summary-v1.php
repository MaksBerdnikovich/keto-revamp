<?php
/**
 * Template Name: Summary V1
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$action = $_POST['action'] ?? false;

if ($action == 'save-quiz') {
    wp_redirect(get_email_url());
    exit();
} elseif ($action == 'show-quiz') {
    $res = generate_calculator_results();
    $quiz = save_quiz_to_db_session([
        'calories' => $res['calories'],
        'graph' => $res['graph_new'],
        'event' => $res['event'],
        'event_point' => $res['event_point'],
        'first_month_lose' => $res['first_month_lose'],
        'first_month' => $res['first_month'],
        'to_event_weight' => $res['to_event_weight'],
    ]);
    $targetWeight = (int)$quiz['target_weight'];
    if ($quiz['system'] == 'imperial') {
        $height = (int)$quiz['height_1'] . "'" . (int)$quiz['height_2'];
    } else {
        $height = (int)$quiz['height'];
    }
} else {
    wp_redirect(home_url());
    exit();
}

get_header();

?>

<div class="summary v1">
    <div class="sticky-sidebar" data-offset="100">
        <div class="summary-countdown btn btn-primary btn-large btn-solid no-hover">
            18<span>min</span> <span class="sep">:</span> 00<span>sec</span>
        </div>
    </div>

    <div class="container offset">
        <div class="summary-calc section">
            <div class="summary-calc__info m-bottom-1">
                <div class="fl-centered m-bottom-1">
                    <div class="title-h3">Your 60-Day Custom Keto Plan Is Ready</div>
                </div>
                <div class="fl-centered gray-color">
                    <div class="tx-bold">Based on your answers, You'll be</div>
                </div>
                <div class="fl-centered gray-color spacer">
                    <div class="title-h3 primary-color"><?= $res['first_month_lose'] ?></div>
                    <div class="sep">by</div>
                    <div class="title-h3 primary-color"><?= $res['first_month'] ?></div>
                </div>
                <div class="fl-centered gray-color">
                    <div class="tx-bold">and lose <?= $res['to_event_weight'] ?> by the <?=$res['event']?></div>
                </div>
            </div>

            <div class="summary-calc__form m-bottom-2_5">
                <?php get_template_part('template-parts/get-plan-form', '', array($res, 'btn_txt' => 'Continue', 'btn_size' => 'large')) ?>
            </div>

            <div class="summary-calc__graph m-bottom-2_5">
                <div class="summary-calc__graph-inner">
                    <div id="chartContainer" class="chartContainer"
                         data-graph="<?= htmlspecialchars(json_encode($res['graph_new'])); ?>"
                         data-event="<?=$quiz['event']?>"
                         data-event-point="<?=$res['event_point']?>">
                    </div>
                </div>
                <div class="legend">
                    <ul>
                        <li class="curr"><span>Current weight</span></li>
                        <li class="goal"><span>Goal weight</span></li>
                    </ul>
                </div>
            </div>

            <div class="summary-calc__plan">
                <div class="fl-centered title-h3">Here’s Your Custom Analysis</div>

                <div class="grid">
                    <div class="grid-row">
                        <div class="grid-col col-50">
                            <div class="grid-item panel">
                                <div class="summary-calc__plan-info plan-info--yellow">
                                    <div class="summary-calc__plan-title">
                                        <b class="tx-bolder">Daily Calories</b>
                                    </div>
                                    <div class="summary-calc__plan-round">
                                        <div class="summary-calc__plan-slider"
                                             data-min="0" data-max="5000" data-step="5"
                                             data-min-val="<?= (int)$res['calories'] - 75?>"
                                             data-max-val="<?= (int)$res['calories'] + 75?>">
                                        </div>
                                        <div class="summary-calc__plan-desc">
                                            <img src="<?=get_image_url('/summary/1.svg')?>" alt="Daily Calories" />
                                            <b>Recommended Calories</b>
                                        </div>
                                    </div>
                                    <div class="summary-calc__plan-scale">
                                        <ul>
                                            <li class="gray-color">0</li>
                                            <li class="gray-color">5000</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid-col col-50">
                            <div class="grid-item panel">
                                <div class="summary-calc__plan-info plan-info--purple">
                                    <div class="summary-calc__plan-title">
                                        <b class="tx-bolder">Fats</b>
                                    </div>
                                    <div class="summary-calc__plan-round">
                                        <div class="summary-calc__plan-slider"
                                             data-min="0" data-max="300" data-step="1"
                                             data-min-val="<?= (int)$res['fats'] - 10?>"
                                             data-max-val="<?= (int)$res['fats'] + 10?>">
                                        </div>
                                        <div class="summary-calc__plan-desc">
                                            <img src="<?=get_image_url('/summary/2.svg')?>" alt="Fats" />
                                            <b>Recommended Fats</b>
                                        </div>
                                    </div>
                                    <div class="summary-calc__plan-scale">
                                        <ul>
                                            <li class="gray-color">0g</li>
                                            <li class="gray-color">300g</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid-col col-50">
                            <div class="grid-item panel">
                                <div class="summary-calc__plan-info plan-info--teal">
                                    <div class="summary-calc__plan-title">
                                        <b class="tx-bolder">Daily Protein</b>
                                    </div>
                                    <div class="summary-calc__plan-round">
                                        <div class="summary-calc__plan-slider"
                                             data-min="0" data-max="400" data-step="1"
                                             data-min-val="<?= (int)$res['protein'] - 10?>"
                                             data-max-val="<?= (int)$res['protein'] + 10?>">
                                        </div>
                                        <div class="summary-calc__plan-desc">
                                            <img src="<?=get_image_url('/summary/3.svg')?>" alt="Daily Protein" />
                                            <b>Recommended Protein</b>
                                        </div>
                                    </div>
                                    <div class="summary-calc__plan-scale">
                                        <ul>
                                            <li class="gray-color">0g</li>
                                            <li class="gray-color">400g</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid-col col-50">
                            <div class="grid-item panel">
                                <div class="summary-calc__plan-info plan-info--red">
                                    <div class="summary-calc__plan-title">
                                        <b class="tx-bolder">Daily Carbs</b>
                                    </div>
                                    <div class="summary-calc__plan-round">
                                        <div class="summary-calc__plan-slider"
                                             data-min="0" data-max="60" data-step="1"
                                             data-min-val="<?= (int)$res['carbs'] - 5?>"
                                             data-max-val="<?= (int)$res['carbs'] + 5?>">
                                        </div>
                                        <div class="summary-calc__plan-desc">
                                            <img src="<?=get_image_url('/summary/4.svg')?>" alt="Daily Carbs" />
                                            <b>Recommended Carbs</b>
                                        </div>
                                    </div>
                                    <div class="summary-calc__plan-scale">
                                        <ul>
                                            <li class="gray-color">0g</li>
                                            <li class="gray-color">60g</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid-col col-50">
                            <div class="grid-item panel">
                                <div class="summary-calc__plan-info">
                                    <div class="summary-calc__plan-title">
                                        <b class="tx-bolder">Daily Water Intake</b>
                                    </div>
                                    <div class="summary-calc__plan-water">
                                        <img src="<?=get_image_url('/summary/water.png')?>" alt="Daily Water Intake" />
                                        <p>
                                            <span>Recommended Water</span>
                                            <b><?= $res['water'] ?></b>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid-col col-50">
                            <div class="grid-item panel">
                                <div class="summary-calc__plan-info">
                                    <div class="summary-calc__plan-title">
                                        <b class="tx-bolder">Yoyr BMI</b>
                                    </div>
                                    <div class="summary-calc__plan-bmi">
                                        <img src="<?=get_image_url('/summary/bmi.png')?>" alt="Yoyr BMI" />
                                        <span>Your BMI</span>
                                        <b><?=$res['bmi']?> – <?=$res['bmi_category']?></b>
                                    </div>
                                    <div class="summary-calc__plan-bmi-points">
                                        <ul>
                                            <li>
                                                <?php if ($res['bmi_category'] == 'Underweight'): ?>
                                                    <i class="point point--success"></i>
                                                <?php endif; ?>
                                            </li>
                                            <li>
                                                <?php if ($res['bmi_category'] == 'Normal'): ?>
                                                    <i class="point point--normal"></i>
                                                <?php endif; ?>
                                            </li>
                                            <li>
                                                <?php if ($res['bmi_category'] == 'Overweight'): ?>
                                                    <i class="point point--fail"></i>
                                                <?php endif; ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid-col col-50">
                            <div class="grid-item panel">
                                <div class="summary-calc__plan-info">
                                    <div class="summary-calc__plan-title">
                                        <b class="tx-bolder">Daily Activity Level</b>
                                    </div>
                                    <div class="summary-calc__plan-icons">
                                        <i><img src="<?=get_image_url('/quiz/step6/'.$res['activity']['val'].'.svg')?>" alt="Daily Activity Level" /></i>
                                        <span>Your Daily Activity Level</span>
                                        <b><?=$res['activity']['name']?></b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid-col col-50">
                            <div class="grid-item panel">
                                <div class="summary-calc__plan-info">
                                    <div class="summary-calc__plan-title">
                                        <b class="tx-bolder">Achievable 30 Day Weight</b>
                                    </div>
                                    <div class="summary-calc__plan-icons">
                                        <i><img src="<?=get_image_url('/quiz/step7/'. $res['motivation'] .'.svg')?>" alt="Achievable 30 Day Weight" /></i>
                                        <span>Achievable Weight</span>
                                        <b><?= $res['first_month_lose'] ?></b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="summary-testimonial section">
            <div class="page-title m-bottom-2_5">
                <div class="title-h3">They Did It</div>
            </div>

            <div class="grid">
                <div class="grid-row">
                    <div class="grid-col col-50">
                        <div class="grid-item summary-testimonial__image">
                            <b class="danger-color">Before</b>
                            <img src="<?=get_image_url('/summary/girl2.png')?>" alt="Before">
                        </div>
                        <div class="grid-item summary-testimonial__image">
                            <b class="success-color">After </b>
                            <i><img src="<?=get_image_url('/summary/girl2-1.png')?>" alt="After"></i>
                        </div>
                    </div>
                    <div class="grid-col col-50">
                        <div class="summary-testimonial__desc">
                            <b>Rachel White, OH</b>
                            <p>
                                I haven’t taken measurements yet but I’m going to sometime today. I usually weigh myself
                                every morning around the same time and last Saturday (day 1) I weighed in at 189.2 and
                                Today (day 7) I am 183.7 lbs!!! I love eating Keto. I started and it was daunting, but
                                what isn't when you are starting off on a new journey? Eating the foods are really easy.
                                And I love planning for it - I am a "list" person by nature, helps me stay focused, so
                                the meal planning and prep are more fun for me than work!
                            </p>
                        </div>
                    </div>
                </div>

                <div class="separator"></div>

                <div class="grid-row">
                    <div class="grid-col col-50">
                        <div class="summary-testimonial__image">
                            <b class="danger-color">Before</b>
                            <i><img src="<?=get_image_url('/summary/girl1.png')?>" alt="Before"></i>
                        </div>
                        <div class="summary-testimonial__image">
                            <b class="success-color">After </b>
                            <i><img src="<?=get_image_url('/summary/girl1-1.png')?>" alt="After"></i>
                        </div>
                    </div>
                    <div class="grid-col col-50">
                        <div class="summary-testimonial__desc">
                            <b>Sarah E, TX</b>
                            <p>
                                I’m happy to give a review of Keto Revamp and can say it REALLY works… I’ve tried many
                                diets but can honestly say the keto diet has changed my life! As of today I’ve lost 42.5
                                lbs and I notice significant changes in my energy. All of my meals are planned and I
                                love the downloadable shopping list each week. My cholesterol and sodium have dropped
                                and I’ve been buying new cloths since last week. It’s 100% worth trying if you want to
                                lose weight.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="summary-testimonial__inc">
                <p class="gray-color">*Results experienced are not typical, consumer results may vary</p>
            </div>
        </div>

        <div class="summary-features section">
            <div class="page-title m-bottom-3">
                <div class="title-h3">Some Of Our Features</div>
            </div>

            <div class="summary-features__list">
                <div class="summary-features__list-item">
                    <div class="summary-features__list-img">
                        <img src="<?=get_image_url('/summary/5.svg')?>" alt="Fully Automated & Customizable">
                    </div>
                    <div class="summary-features__list-desc">
                        <b>Fully Automated & Customizable</b>
                        <p>
                            We use sophisticated algorithms to design our plans, which means that everything in the
                            member area can be changed at any time. As a result, whenever you make a change to your
                            plan, our system immediately recalculates everything.
                        </p>
                    </div>
                </div>
                <div class="summary-features__list-item">
                    <div class="summary-features__list-img">
                        <img src="<?=get_image_url('/summary/6.svg')?>" alt="Manage Your Progress">
                    </div>
                    <div class="summary-features__list-desc">
                        <b>Manage Your Progress</b>
                        <p>
                            You can track your progress as you get closer to your special event/vacation and overall
                            goal. Your break down of daily macros will help you stay on track while getting what your
                            body needs to stay in ketosis.
                        </p>
                    </div>
                </div>
                <div class="summary-features__list-item">
                    <div class="summary-features__list-img">
                        <img src="<?=get_image_url('/summary/7.svg')?>" alt="Intermittent Fasting Feature">
                    </div>
                    <div class="summary-features__list-desc">
                        <b>Intermittent Fasting Feature</b>
                        <p>
                            Would you like to skip a meal? Not a problem! We offer a feature that makes it easy to skip
                            meals with your custom keto diet, so you can eat around your schedule rather than allowing
                            your diet to dictate your schedule.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="summary-your-get section">
            <div class="page-title m-bottom-2_5">
                <div class="title-h3">What You Get</div>
            </div>

            <div class="summary-your-get_image">
                <img src="<?=get_image_url('/summary/device3.png')?>" alt="What You Get">
            </div>

            <div class="summary-your-get_grid grid">
                <div class="grid-row">
                    <div class="grid-col col-33">
                        <div class="grid-item">

                            <img src="<?=get_image_url('/summary/8.svg')?>" alt="A custom-designed">
                            <b>A custom-designed portion size has been calculated just for you</b>
                        </div>
                    </div>
                    <div class="grid-col col-33">
                        <div class="grid-item">
                            <img src="<?=get_image_url('/summary/9.png')?>" alt="The most successful diet">
                            <b>The most<br/> successful diet</b>
                        </div>
                    </div>
                    <div class="grid-col col-33">
                        <div class="grid-item">
                            <img src="<?=get_image_url('/summary/10.svg')?>" alt="Easily prepare">
                            <b>Easily prepare the the meals with these recipes</b>
                        </div>
                    </div>
                </div>
            </div>

            <div class="summary-your-get_form">
                <?php get_template_part('template-parts/get-plan-form', '', array($res, 'btn_txt' => 'Get In Now!', 'btn_size' => 'xlarge')) ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
