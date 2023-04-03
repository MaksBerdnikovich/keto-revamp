<?php
/**
 * Template Name: Upsell Noauth Plan
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header('upsell');
?>

    <div class="upsellBox">
        <div class="upBox-head">
            <p class="upbx-hdtxt1">Wait! Your Order Is<br class="forMob"> Not Complete</p>
            <p class="upbx-hdtxt2">We Have A Special Limited<br class="forMob"> Time Offer For You!</p>
        </div>
        <p class="upbx-pra1">With our mission to provide customized meal plans based on your body metrics, lifestyle
            & health goals, it takes our dietician up to 24 hours to review your answers and prepare your custom
            plan.</p>

        <div class="timerBox">
            <img src="<?php echo get_image_url('upsell/clock.png') ?>" alt="" class="clock">
            <p class="time-t">The Estimated Current Wait Time Is</p>
            <div class="timer-mid">
                <div id="firstTimer" class="psgTimer psgTimer_fade">
                    <div class="psgTimer_numbers">
                        <div class="hours psgTimer_unit">
                            <div>
                                <div class="number" id="hours-1" data-number="0">2</div>
                            </div>
                            <div>
                                <div class="number" id="hours-2" data-number="0">3</div>
                            </div>
                        </div>
                        <div class="minutes psgTimer_unit">
                            <div>
                                <div class="number" id="minutes-1" data-number="0">5</div>
                            </div>
                            <div>
                                <div class="number" id="minutes-2" data-number="0">9</div>
                            </div>
                        </div>
                        <div class="seconds psgTimer_unit">
                            <div>
                                <div class="number" id="seconds-1" data-number="0">5</div>
                            </div>
                            <div>
                                <div class="number" id="seconds-2" data-number="0">9</div>
                            </div>
                        </div>
                    </div>
                    <div class="psgTimer_labels">
                        <div class="hours">Hours</div>
                        <div class="minutes">minutes</div>
                        <div class="seconds">seconds</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="upBox-Offer">
            <div class="upoffer-hd">
                <p>But You Can Get Started In Just <span>30 Minutes!</span></p>
            </div>

            <div class="offerMid">
                <p class="upbx-pra1 top-0">However, if you want to get started we can prioritize the evaluation of
                    your answers & prepare your meal plan in just 30 minutes for an additional fee of just $5.</p>
                <p class="offr-midtxt">Hurry! We Have Only 2 Priority Options Left For Today </p>
                <p class="offer-count">This Offer Expires In <span id="stopwatch">05:00</span></p>
                <div class="clearall"></div>
                <a href="<?php echo do_shortcode('[mwb_upsell_yes]') ?>" class="order-btn pulse">Yes! Rush My Plan</a>
                <ul class="offr-list">
                    <li>No Subscription</li>
                    <li>No Hidden Fees</li>
                    <li>No Contracts</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="clearall"></div>
    <a href="<?php echo do_shortcode('[mwb_upsell_no]') ?>" class="no-thanks"><img
                src="<?php echo get_image_url('upsell/nothnk-cross.png') ?>" alt="">
        No thank you, I will wait
        for 24 hours to get my meal plan.</a>

<?php get_footer('upsell');