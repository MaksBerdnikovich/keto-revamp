<?php
/**
 * Template Name: Summary V2
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$action = $_POST['action'] ?? false;

if ($action == 'save-quiz') {
    wp_redirect(get_checkout_url());
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
    $targetWeight = $quiz['target_weight'];
    if ($quiz['system'] == 'imperial') {
        $height = $quiz['height_1'] ."'". $quiz['height_2'];
    } else {
        $height = $quiz['height'];
    }
} else {
    wp_redirect(home_url());
    exit();
}

get_header();

?>

<div class="summary v2">
    <div class="sticky-sidebar" data-offset="100">
        <div class="summary-countdown btn btn-primary btn-large btn-solid no-hover">
            18<span>min</span> <span class="sep">:</span> 00<span>sec</span>
        </div>
    </div>

    <div class="container">
        <div class="summary-preview section">
            <div class="summary-preview__title m-bottom-2">
                <div class="page-title">
                    <div class="title-h3">Get to Your Ideal Weight And Keep The Pounds OFF</div>
                </div>
            </div>

            <div class="summary-preview__video">
                <div class="video">
                    <iframe src="//player.vimeo.com/video/662500688?title=0&byline=0&portrait=0&badge=0"
                            width="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen>
                    </iframe>
                </div>
            </div>

            <div class="summary-preview__logos">
                <ul>
                    <li>
                        <a href="javascript:void(0);">
                            <img src="<?=get_image_url('/summary/logo1.svg')?>" alt="logo1" />
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <img src="<?=get_image_url('/summary/logo2.svg')?>" alt="logo2" />
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <img src="<?=get_image_url('/summary/logo3.svg')?>" alt="logo3" />
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <img src="<?=get_image_url('/summary/logo4.svg')?>" alt="logo4" />
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <img src="<?=get_image_url('/summary/logo5.svg')?>" alt="logo5" />
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <img src="<?=get_image_url('/summary/logo6.svg')?>" alt="logo6" />
                        </a>
                    </li>
                </ul>
            </div>

            <div class="summary-calc m-bottom-2_5">
                <div class="summary-calc__info m-bottom-1_5">
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

                <div class="summary-calc__graph">
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
                    <div class="grid">
                        <div class="grid-row">
                            <div class="grid-col col-25">
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
                            <div class="grid-col col-25">
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
                            <div class="grid-col col-25">
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
                            <div class="grid-col col-25">
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
                            <div class="grid-col col-25">
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
                            <div class="grid-col col-25">
                                <div class="grid-item panel">
                                    <div class="summary-calc__plan-info">
                                        <div class="summary-calc__plan-title">
                                            <b class="tx-bolder">Yoyr BMI</b>
                                        </div>
                                        <div class="summary-calc__plan-bmi">
                                            <i><img src="<?=get_image_url('/summary/bmi2.png')?>" alt="Yoyr BMI" /></i>
                                            <span>Your BMI</span>
                                            <b><?=$res['bmi']?> – <span><?=$res['bmi_category']?></span></b>
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
                            <div class="grid-col col-25">
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
                            <div class="grid-col col-25">
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

            <div class="summary-features">
                <div class="summary-features__list">
                    <div class="summary-features__list-item">
                        <div class="summary-features__list-img">
                            <img src="<?=get_image_url('/summary/11.svg')?>" alt="Easily Lose Weight">
                        </div>
                        <div class="summary-features__list-desc">
                            <b>Easily Lose Weight And Burn Annoying Belly Fat</b>
                            <p>According to Harvard studies, Keto causes the fastest visible weight loss.</p>
                        </div>
                    </div>
                    <div class="summary-features__list-item">
                        <div class="summary-features__list-img">
                            <img src="<?=get_image_url('/summary/12.svg')?>" alt="Eliminate Cravings">
                        </div>
                        <div class="summary-features__list-desc">
                            <b>Eliminate Cravings and Stop "Belly Bloat"</b>
                            <p>
                                Designed specifically for YOU and your body, your custom meal plan keeps you feeling
                                full and satisfied from early morning to late evening.
                            </p>
                        </div>
                    </div>
                    <div class="summary-features__list-item">
                        <div class="summary-features__list-img">
                            <img src="<?=get_image_url('/summary/13.svg')?>" alt="Get Rid of Constipation">
                        </div>
                        <div class="summary-features__list-desc">
                            <b>Get Rid of Constipation and Get Your Bathroom Habits Back On Track</b>
                            <p>
                                With Keto Revamp, you will consume the right amount of healthy fiber to stimulate your
                                digestion. In the first week and a half of your plan, you will detox and empty your
                                bowels completely.
                            </p>
                        </div>
                    </div>
                    <div class="summary-features__list-item">
                        <div class="summary-features__list-img">
                            <img src="<?=get_image_url('/summary/14.png')?>" alt="Enhance Your Metabolism">
                        </div>
                        <div class="summary-features__list-desc">
                            <b>Enhance Your Metabolism and Feel Amazing!</b>
                            <p>
                                You can now exercise, enjoy recreational activities, or spend time with your family
                                again with renewed energy.
                            </p>
                        </div>
                    </div>
                    <div class="summary-features__list-item">
                        <div class="summary-features__list-img">
                            <img src="<?=get_image_url('/summary/15.svg')?>" alt="Attain Your Goal Weight">
                        </div>
                        <div class="summary-features__list-desc">
                            <b>Attain Your Goal Weight!</b>
                            <p>
                                We'll update the program to match your progress and we'll support you until you reach
                                your weight loss goal. All the thinking, planning, and preparation has been taken care
                                of for you!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="summary-order section">
            <div class="summary-order__form">
                <div class="started m-bottom-1">
                    <div class="tx-bold m-bottom-1">Just click below to get started</div>
                    <?php get_template_part('template-parts/get-plan-form', '', array($res, 'btn_txt' => 'Yes! Claim my personal plan now', 'btn_size' => 'xlarge')) ?>
                </div>
                <div class="payments">
                    <div class="tx-bold m-bottom-2 gray-color">265 Bit Encryption secure payments by</div>
                    <img src="<?=get_image_url('/summary/pays.png')?>" alt="Payments">
                </div>
            </div>
        </div>

        <div class="summary-texts section">
            <div class="grid">
                <div class="grid-row">
                    <div class="grid-col v-center col-50">
                        <div class="grid-item summary-texts__item">
                            <div class="summary-texts__info">
                                <div class="title-h3">No More Counting Calories and Intense So-Called “Diet Food”</div>
                                <div class="text">
                                    <p>
                                        Experience the easiest (and most successful) way to increase energy, lose
                                        weight, improve sleep and mood, and improve digestion and health.
                                    </p>
                                    <p>
                                        We have created a customized meal plan that is easy, fun, and effective!
                                    </p>
                                    <p>
                                        Take advantage of delicious meals that shrink your waist, help you slow the
                                        aging process, boost your brain performance, and improve your overall health.
                                    </p>
                                    <p>
                                        There’s no counting macros… <br/>
                                        There’s no depriving yourself…  <br/>
                                        No relying on your own resolve…
                                    </p>
                                    <p>
                                        Since the Keto Revamp system does all the work for you, you can enjoy the
                                        waist-slimming, energy-boosting benefits right now.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid-col v-center col-50">
                        <div class="grid-item summary-texts__item">
                            <div class="summary-texts__image">
                                <img src="<?=get_image_url('/summary/device.png')?>" alt="device">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid-row invert">
                    <div class="grid-col v-center col-50">
                        <div class="grid-item summary-texts__item">
                            <div class="summary-texts__image">
                                <img src="<?=get_image_url('/summary/device.png')?>" alt="device">
                            </div>
                        </div>
                    </div>
                    <div class="grid-col v-center col-50">
                        <div class="grid-item summary-texts__item">
                            <div class="summary-texts__info">
                                <div class="title-h3">Savor Scrumptious Fat Burning Meals Every Day</div>
                                <div class="text">
                                    <p>
                                        Losing pounds and achieving optimum health is VERY easy when you eat delicious
                                        foods including..
                                    </p>
                                    <p>
                                        Crispy Fried Chicken… Ribeye Steak… Or Pizza Stuffed Mushrooms.
                                    </p>
                                    <p>
                                        NO MORE guilt… NO MORE blood sugar spikes… and NO MORE growing waistline.
                                    </p>
                                    <p>
                                        You'll be surprised every day when you get 4 new delicious keto recipes to pique
                                        your taste buds, fill you up for hours (without the annoying food cravings!) and
                                        ensure you'll never get bored eating them!
                                    </p>
                                    <p>
                                        It is a common practice for our customers to share these meals with their
                                        friends and families. You can enjoy the benefits of all the incredible health
                                        perks with the people you love.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid-row">
                    <div class="grid-col v-center col-50">
                        <div class="grid-item summary-texts__item">
                            <div class="summary-texts__info">
                                <div class="title-h3">We Have A Private VIP Facebook Community Where You Can Get Support and Make Friends</div>
                                <div class="text">
                                    <p>
                                        Oftentimes, when researchers study what makes people succeed with weight loss,
                                        they find that it is mostly a matter of how much support a person has in
                                        achieving their goals.
                                    </p>
                                    <p>
                                        Keto Revamp works because of our community where people share ideas, stories,
                                        meals, and emotional support.
                                    </p>
                                    <p>
                                        You'll have access to this exclusive group of like-minded individuals who can
                                        encourage you, answer any questions you have and keep you on track to reach your
                                        goal weight.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid-col v-center col-50">
                        <div class="grid-item summary-texts__item">
                            <div class="summary-texts__image">
                                <img src="<?=get_image_url('/summary/device.png')?>" alt="device">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="summary-bonuses section">
            <div class="page-title m-bottom-2">
                <div class="title-h3">Plus, Get $160 Worth of <span class="primary-color">FREE Bonuses</span></div>
                <div class="title-h3">When You Order In The Next Few Minutes…</div>
            </div>

            <div class="summary-bonuses__item panel invert">
                <div class="summary-bonuses__item-image">
                    <div class="btn btn-small btn-solid btn-success no-hover">FREE bonus #1</div>
                    <img src="<?=get_image_url('/summary/book1.png')?>" alt="FREE bonus #1">
                </div>
                <div class="summary-bonuses__item-info">
                    <div class="title-h4 m-bottom-1">Keto 101 - An Easy To Follow Guide On Everything You Need To Know About The Ketogenic Diet</div>
                    <div class="tx-bold m-bottom-1"><span class="primary-color">Value ($47)</span></div>
                    <div class="text">
                        <p>
                            Are you intimidated by the keto diet? We've got you covered with our Keto 101 resource, all
                            you need to make keto straightforward, easy, and fun!
                        </p>
                        <p>
                            Keto can help you lose weight quickly, boost your energy level, and improve mental clarity
                            We discuss foods to avoid and foods that will support ketosis.
                        </p>
                        <p>
                            Is keto able to reverse many common chronic health conditions?
                            For those suffering from chronic conditions, read Chapter 1 - Page 8 today!
                            Study results from 2018 show that 60% of participants who adopted the ketogenic lifestyle
                            reversed a common and deadly chronic disease.
                        </p>
                        <p>
                            We also cover myths and mistakes surrounding Keto so you have the knowledge to make great
                            choices.
                        </p>
                    </div>
                </div>
            </div>
            <div class="summary-bonuses__item panel">
                <div class="summary-bonuses__item-info">
                    <div class="title-h4 m-bottom-1">The Ultimate Fat Burning Secret</div>
                    <div class="tx-bold m-bottom-1"><span class="primary-color">Value ($37)</span></div>
                    <div class="text">
                        <p>
                            The Ultimate Fat Burning Secret teaches you: <br/>
                            The Age-Old Timing Ritual sheds inches and pounds of fat while releasing age-reversing
                            hormones throughout your body
                        </p>
                        <p>
                            Over 200 Studies including ones from Harvard Medical School, Johns Hopkins and Scientists
                            From NASA show that this metabolic boosting trick causes your body to burn fat, reverses
                            years of metabolic aging, naturally lowers your insulin levels, improves heart functions,
                            brain functions and so much more.
                        </p>
                        <p>
                            Researchers call this nature’s own “Fountain Of Youth”. This method is so biologically
                            effective that it slows down the aging process and fills in the smallest wrinkles and fine
                            lines. Leaving your hair, skin and nails with a new shine... 
                        </p>
                    </div>
                </div>
                <div class="summary-bonuses__item-image">
                    <div class="btn btn-small btn-solid btn-success no-hover">FREE bonus #2</div>
                    <img src="<?=get_image_url('/summary/book2.png')?>" alt="FREE bonus #2">
                </div>
            </div>
            <div class="summary-bonuses__item panel invert">
                <div class="summary-bonuses__item-image">
                    <div class="btn btn-small btn-solid btn-success no-hover">FREE bonus #3</div>
                    <img src="<?=get_image_url('/summary/book3.png')?>" alt="FREE bonus #3">
                </div>
                <div class="summary-bonuses__item-info">
                    <div class="title-h4 m-bottom-1">Erase Sweet & Savory Temptations</div>
                    <div class="tx-bold m-bottom-1"><span class="primary-color">Value ($26)</span></div>
                    <div class="text">
                        <p>
                            In Erase Sweet & Savory Temptations you'll learn:
                        </p>
                        <p>
                            When you do this one simple thing, you'll be able to curb your sugar cravings even if you're
                            the healthiest of them all…
                        </p>
                        <p>
                            AVOID EMOTIONAL EATING without willpower! Utilize this easy and free tool the next time you
                            feel the urge to eat and you won't gain weight or go hungry.
                        </p>
                        <p>
                            PLUS — 4 best allies to food cravings and what they say about your emotions...<br/>
                            Once you realize this, you will be able to overcome unstoppable cravings forever!
                        </p>
                    </div>
                </div>
            </div>
            <div class="summary-bonuses__item panel">
                <div class="summary-bonuses__item-info">
                    <div class="title-h4 m-bottom-1">Keto Recipes For The Soul</div>
                    <div class="tx-bold m-bottom-1"><span class="primary-color">Value ($25)</span></div>
                    <div class="text">
                        <p>
                            Eat like a true foody — while melting fat — with our delicious, Chicken Breast With Morbier
                            Cheese.
                        </p>
                        <p>
                            We believe Nutella was sent from the heavens and exists solely for human pleasure… So why
                            deprive yourself when you can enjoy it guilt-free!
                        </p>
                        <p>
                            Our fluffy Souffle Eggs will make waking up a delight! will delight the family… And they’ll
                            never know it’s 100% keto!
                        </p>
                        <p>
                            PLUS — you also get Lemon Cake, mouth-watering Salmon with nuts, Light Tuna Quiche, Cocoa
                            Panna Cotta, & Turkish Eggs with Yogurt.
                        </p>
                    </div>
                </div>
                <div class="summary-bonuses__item-image">
                    <div class="btn btn-small btn-solid btn-success no-hover">FREE bonus #4</div>
                    <img src="<?=get_image_url('/summary/book4.png')?>" alt="FREE bonus #4">
                </div>
            </div>
            <div class="summary-bonuses__item panel invert">
                <div class="summary-bonuses__item-image">
                    <div class="btn btn-small btn-solid btn-success no-hover">FREE bonus #5</div>
                    <img src="<?=get_image_url('/summary/book5.png')?>" alt="FREE bonus #5">
                </div>
                <div class="summary-bonuses__item-info">
                    <div class="title-h4 m-bottom-1">Keto comfort delicious homestyle cooking</div>
                    <div class="tx-bold m-bottom-1"><span class="primary-color">Value ($25)</span></div>
                    <div class="text">
                        <p>In Keto To Go you'll learn:</p>
                        <p>
                            Tips on how to set yourself up for success before going to a restaurant with friends or
                            family.
                            A few ways to stand your ground even if everyone else is ordering carb heavy entrees.
                        </p>
                        <p>When you should take carbohydrate blockers along with what kind of drinks to avoid.</p>
                        <p>To finish up the content we have a handful of restaurant tricks depending what time of the year it is.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="summary-testimonial section">
            <div class="page-title m-bottom-2_5">
                <div class="title-h3">Your Transformation Can Be Next!</div>
            </div>

            <div class="grid">
                <div class="grid-row">
                    <div class="grid-col col-40">
                        <div class="grid-item summary-testimonial__image">
                            <b class="danger-color">Before</b>
                            <img src="<?=get_image_url('/summary/girl2.png')?>" alt="Before">
                        </div>
                        <div class="grid-item summary-testimonial__image">
                            <b class="success-color">After </b>
                            <i><img src="<?=get_image_url('/summary/girl2-1.png')?>" alt="After"></i>
                        </div>
                    </div>
                    <div class="grid-col col-60">
                        <div class="summary-testimonial__desc">
                            <div class="title"><b>Rachel White, OH</b><i class="icon icon-quote"></i></div>
                            <div class="text">
                                I haven’t taken measurements yet but I’m going to sometime today. I usually weigh myself
                                every morning around the same time and last Saturday (day 1) I weighed in at 189.2 and
                                Today (day 7) I am 183.7 lbs!!! I love eating Keto. I started and it was daunting, but
                                what isn't when you are starting off on a new journey? Eating the foods are really easy.
                                And I love planning for it - I am a "list" person by nature, helps me stay focused, so
                                the meal planning and prep are more fun for me than work!
                            </div>
                        </div>
                    </div>
                </div>

                <div class="separator"></div>

                <div class="grid-row">
                    <div class="grid-col col-40">
                        <div class="summary-testimonial__image">
                            <b class="danger-color">Before</b>
                            <i><img src="<?=get_image_url('/summary/girl1.png')?>" alt="Before"></i>
                        </div>
                        <div class="summary-testimonial__image">
                            <b class="success-color">After </b>
                            <i><img src="<?=get_image_url('/summary/girl1-1.png')?>" alt="After"></i>
                        </div>
                    </div>
                    <div class="grid-col col-60">
                        <div class="summary-testimonial__desc">
                            <div class="title"><b>Sarah E, TX</b><i class="icon icon-quote"></i></div>
                            <div class="text">
                                I’m happy to give a review of Keto Revamp and can say it REALLY works… I’ve tried many
                                diets but can honestly say the keto diet has changed my life! As of today I’ve lost 42.5
                                lbs and I notice significant changes in my energy. All of my meals are planned and I
                                love the downloadable shopping list each week. My cholesterol and sodium have dropped
                                and I’ve been buying new cloths since last week. It’s 100% worth trying if you want to
                                lose weight.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="separator"></div>

                <div class="grid-row">
                    <div class="grid-col col-40">
                        <div class="summary-testimonial__image">
                            <b class="danger-color">Before</b>
                            <i><img src="<?=get_image_url('/summary/girl3.png')?>" alt="Before"></i>
                        </div>
                        <div class="summary-testimonial__image">
                            <b class="success-color">After </b>
                            <i><img src="<?=get_image_url('/summary/girl3-1.png')?>" alt="After"></i>
                        </div>
                    </div>
                    <div class="grid-col col-60">
                        <div class="summary-testimonial__desc">
                            <div class="title"><b>Tiffany Wallace, PA</b><i class="icon icon-quote"></i></div>
                            <div class="text">
                                Its day 79 and I’m down 59 lbs! I no longer feel hungry, I have zero brain fog and my
                                energy is 10 times better. I was lost and confused and try so many things but Keto has
                                completely changed my life! My most interesting challenge is eating things that I cut
                                out completely like butter, what a concept.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="summary-guarantee section">
            <div class="landing-keto-plan">
                <div class="landing-keto-plan__banner m-bottom-3">
                    <div class="landing-keto-plan__banner-img">
                        <i><img src="<?=get_image_url('/landing/keto-plan/1.png')?>" alt="banner" /></i>
                    </div>
                    <div class="landing-keto-plan__banner-info">
                        <div class="landing-text">
                            <b>There's more!</b>
                            <p>
                                In addition to the low price, I provide a sincere 100% satisfaction guarantee that works in the
                                following way:
                            </p>
                        </div>
                    </div>
                </div>

                <div class="landing-subtitle">
                    <div class="title-h4">
                        Try Your Personalized Meal Plan Risk-Free and Decide If It’s Right For You.
                    </div>
                    <div class="title-h4 primary-color">
                        All Money Will Be Refunded If You're Not Satisfied.
                    </div>
                </div>
            </div>
        </div>

        <div class="summary-faq section">
            <div class="page-title m-bottom-2">
                <div class="title-h3">F.A.Q.</div>
            </div>

            <div class="accordion">
                <div class="accordion__item">
                    <div class="accordion__title">
                        <div class="accordion__title-text">What happens after I place my order?</div>
                        <div class="accordion__title-arrow"><i class="icon-angle-down"></i></div>
                    </div>
                    <div class="accordion__content">
                        <p>
                            After you order today you will receive your personalized meal plan, which is based on your
                            food preferences, lifestyle and weight loss goals. Keto Revamp's customized meal plans are
                            prepared by a professional chef and overseen by a keto nutritionist.
                        </p>
                    </div>
                </div>
                <div class="accordion__item">
                    <div class="accordion__title">
                        <div class="accordion__title-text">When Will I Reach My Target Weight?</div>
                        <div class="accordion__title-arrow"><i class="icon-angle-down"></i></div>
                    </div>
                    <div class="accordion__content">
                        <p>
                            Every individual is different, as well as their level of commitment. With that in mind, we
                            tried to make the meal plan easy to follow and tasty enough to keep up with for a long
                            time. In your meal plan, all of the ingredients are ones you have personally selected. Many
                            of our customers have lost 2-4 pounds a week following their custom meal plan. Each person's
                            metabolism and goals will affect their results. After you claim your personal meal plan
                            today and begin enjoying the delicious meals, we are certain you will hit your goal weight
                            with ease.
                        </p>
                    </div>
                </div>
                <div class="accordion__item">
                    <div class="accordion__title">
                        <div class="accordion__title-text">What Happens If I Lose Weight Too Quickly?</div>
                        <div class="accordion__title-arrow"><i class="icon-angle-down"></i></div>
                    </div>
                    <div class="accordion__content">
                        <p>
                            The Keto Revamp meal plan can be adjusted if you begin losing weight faster than you feel
                            expected. When following the meal plan, most people can safely lose 2-4 pounds per week. If
                            you are losing weight faster than this, try the meal plan for 5 days and then go back to a
                            normal diet for 2 days - that's how simple it is. We recommend following the meal plan for
                            the first 60 days because seeing the fast results will motivate you to stick to the plan.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="summary-order section">
            <div class="summary-order__title">
                <div class="page-title">
                    <div class="title-h3">Every Week New Customized Meals Await You</div>
                </div>
            </div>

            <div class="summary-order__grid grid">
                <div class="grid-row">
                    <div class="grid-col col-25">
                        <div class="grid-item panel">
                            <img src="<?=get_image_url('/summary/16.png')?>" alt="Fast Secure Payment">
                            <b>Fast Secure<br/> Payment</b>
                        </div>
                    </div>
                    <div class="grid-col col-25">
                        <div class="grid-item panel">
                            <img src="<?=get_image_url('/summary/17.svg')?>" alt="Easy Online Access">
                            <b>Easy Online <br/> Access</b>
                        </div>
                    </div>
                    <div class="grid-col col-25">
                        <div class="grid-item panel">
                            <img src="<?=get_image_url('/summary/18.png')?>" alt="No Hidden Fees">
                            <b>No Hidden<br/> Fees</b>
                        </div>
                    </div>
                    <div class="grid-col col-25">
                        <div class="grid-item panel">
                            <img src="<?=get_image_url('/summary/19.svg')?>" alt="8 Week Access To Plan">
                            <b>8 Week Access<br/> To Plan</b>
                        </div>
                    </div>
                </div>
            </div>

            <div class="summary-order__table">
                <table>
                    <thead>
                        <tr class="head"><th>Product</th><th></th></tr>
                    </thead>
                    <tbody>
                        <tr><td>60 Day Keto Revamp Custom Meal Plan</td><td>Value ($600)</td></tr>
                        <tr><td>Keto 101 - An Easy To Follow Guide On <br/>Everything You Need To Know About The Ketogenic Diet</td><td>Value ($47)</td></tr>
                        <tr><td>The Ultimate Fat Burning Secret</td><td>Value ($37)</td></tr>
                        <tr><td>Erase Sweet & Savory Temptations</td><td>Value ($26)</td></tr>
                        <tr><td>Keto Recipes For The Soul</td><td>Value ($25)</td></tr>
                        <tr><td>Keto comfort delicious homestyle cooking</td><td>Value ($25)</td></tr>
                        <tr><td><b>Total Value</b></td><td><b class="strikeout">$760</b></td></tr>
                    </tbody>
                </table>
            </div>

            <div class="summary-order__form">
                <div class="started m-bottom-1">
                    <div class="tx-bold m-bottom-1">Just click below to get started</div>
                    <?php get_template_part('template-parts/get-plan-form', '', array($res, 'btn_txt' => 'Yes! Claim my personal plan now', 'btn_size' => 'xlarge')) ?>
                </div>
                <div class="payments">
                    <div class="tx-bold m-bottom-2 gray-color">265 Bit Encryption secure payments by</div>
                    <img src="<?=get_image_url('/summary/pays.png')?>" alt="Payments">
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
