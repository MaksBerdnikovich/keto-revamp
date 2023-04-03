<?php
/**
 * Template Name: Upsell Workout
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header('upsell');
?>

    <div class="up-dashboard-container">
        <div class="dashboard-box upsell dashboard-box-inr">
            <div class="upBox">
                <p class="upbx-hdtxt1">Maximize Your Weight Loss With Our<br><span>Custom Keto Workout Plan </span></p>
                <p class="upbx-pra1">To get the best out of your Keto diet, it is essential to include a workout that is customized based on your body metrics, lifestyle & weight loss goals.</p>
                <ul class="up1-list">
                    <li>
                        <img src="<?php echo get_image_url('dashboard/up1-icon1.png')?>">
                        <p>Certified<br>Trainers</p>
                    </li>
                    <li>
                        <img src="<?php echo get_image_url('dashboard/up1-icon2.png')?>">
                        <p>Weekly<br>Workouts</p>
                    </li>
                    <li>
                        <img src="<?php echo get_image_url('dashboard/up1-icon3.png')?>">
                        <p>Guided<br>Video Tutorials</p>
                    </li>
                    <li>
                        <img src="<?php echo get_image_url('dashboard/up1-icon4.png')?>">
                        <p>Tailored<br>For You Only</p>
                    </li>
                </ul>

                <p class="upbx-pra1 medium">We already have your details from the survey, so just click the button below to get your Custom Keto Workout Plan. </p>

                <div class="offerMid">
                    <div class="prcBox">
                        <div class="prcBox-lft">
                            <p class="prc-catgry">Regular <br>Price:</p>
                            <p class="prc-txt"><span class="cross">$26<sup>.39</sup></span></p>
                        </div>
                        <div class="prcBox-rgt">
                            <p class="prc-catgry ">Special <br>Price:</p>
                            <p class="prc-txt"><span>$19<sup>.99</sup></span></p>
                        </div>
                    </div>
                    <div class="clearall"></div>

                    <a href="<?php echo do_shortcode('[mwb_upsell_yes]') ?>" class="order-btn pulse">Yes! Give Me Access</a>

                    <ul class="offr-list">
                        <li>No Subscription</li>
                        <li>No Hidden Fees</li>
                        <li>No Contracts</li>
                    </ul>
                </div>

            </div>
        </div>
        <p class="no-thanks">
            <a href="<?php echo do_shortcode('[mwb_upsell_no]') ?>"><img src="<?php echo get_image_url('dashboard/nothnk-cross.png')?>" alt="">No, thank you. I don't want to lose more weight.</a>
        </p>
    </div>

<?php get_footer('upsell');