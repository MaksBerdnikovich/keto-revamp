<?php
/**
 * Template Name: Upsell Noauth Plan V1
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>


<div class="upsell v1">
    <div class="container offset">
        <div class="upsell-section section">
            <div class="page-title">
                <div class="title-h3 m-bottom-05">
                    Upgrade Meal Plan to 1 hour<br/> <span class="primary-color">We Have A Special Limited Time Offer For You!</span>
                </div>
                <div class="text m-bottom-1_5">
                    Since we strive to provide customized meal plans based on your body metrics, lifestyle, and health
                    goals, it takes our dietitian up to 24 hours to review your responses and prepare your custom meal
                    plan.
                </div>
            </div>

            <div class="upsell-timer">
                <div class="upsell-timer__wrap panel">
                    <div class="tx-bolder m-bottom-1_5">The Estimated Current Wait Time Is</div>
                    <div class="upsell-timer__list">
                        <ul class="upsell-countdown1">
                            <li><b>23</b> <span>hours</span></li>
                            <li class="sep"><b>:</b></li>
                            <li><b>59</b> <span>minutes</span></li>
                            <li class="sep"><b>:</b></li>
                            <li><b>59</b> <span>seconds</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="upsell-section section">
            <div class="page-title">
                <div class="title-h3 m-bottom-05">
                    But You Can Get Started In <span class="primary-color">Just 1 Hour!</span>
                </div>
            </div>
            <div class="fl-centered m-bottom-1_5">
                <div class="text fl-column width-65">
                    However, if you want to get started we can prioritize the evaluation of your answers & prepare your
                    meal plan <b>in just 1 hour for an additional fee of just $5.</b>
                </div>
            </div>
            <div class="fl-centered m-bottom-1_5">
                <div class="text fl-column width-70">
                    <b class="danger-color">Hurry! We Have Only 2 Priority Options Left For Today</b>
                    <b>This Offer Expires In <span class="upsell-countdown2">04:59</span></b>
                </div>
            </div>
            <div class="fl-centered">
                <a href="<?php echo do_shortcode('[mwb_upsell_yes]') ?>"
                   class="upsell-order-btn btn btn-primary btn-solid btn-xlarge">Yes! Rush My Plan</a>
            </div>
        </div>

        <div class="upsell-section">
            <div class="fl-centered">
                <a href="<?php echo do_shortcode('[mwb_upsell_no]') ?>" class="upsell-no-thanks-btn gray-color">
                    No thank you, I will wait for 24 hours to get my meal plan.
                </a>
            </div>
        </div>
    </div>
</div>


<div class="upsell-modal" id="upsellModalV1" style="display: none;">
    <div class="upsell-modal__wrap section">
        <div class="page-title m-bottom-1">
            <div class="title-h3">wait! do not leave this page!</div>
            <div class="title-h3 primary-color">it will cause errors with your order</div>
        </div>
        <div class="upsell-alert m-bottom-1_5">
            <i class="icon-info"></i>
            <p>
                Do not hit the back button or close your browser.
                <b>Click "FINISH READING THIS PAGE"</b>
                below and make your selection on this page.
            </p>
        </div>
        <div class="upsell-modal__btn">
            <button class="btn btn-solid btn-primary btn-xlarge set-cookie">Finish reading this page</button>
        </div>
    </div>
</div>

<?php get_footer();