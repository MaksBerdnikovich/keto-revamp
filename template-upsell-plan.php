<?php
/**
 * Template Name: Upsell Plan
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if ($_POST['action'] == 'pay') {
    $payment = create_plan_upsell_oder_with_stripe_payment();
}
if (has_user_plan_access()) {
    wp_redirect(get_my_plan_url());
    exit();
}

if (! has_user_plan_upsell() && ! can_user_payment_with_stripe()) {
    define('WOOCOMMERCE_CHECKOUT', true);
    WC()->cart->empty_cart();
    try {
        WC()->cart->add_to_cart(get_plan_upsell_product_id());
    } catch (Exception $e) {
    }
}

get_header('dashboard');
?>

<div class="dashboard">
    <div class="container">
        <div class="upsell v1">
            <div class="upsell-section section">
                <div class="page-title">
                    <div class="title-h3 m-bottom-05">
                        Your meal plan is currently being custom curated by our nutritionists.<br/>
                        <span class="primary-color">Please check back within <?php echo has_user_plan_upsell() ? '30 minutes' : '24 hours' ?></span>
                    </div>
                </div>

                <div class="upsell-timer">
                    <div class="upsell-timer__wrap panel">
                        <div class="tx-bolder m-bottom-1_5">The Estimated Current Wait Time Is</div>
                        <div class="upsell-timer__list">
                            <ul class="upsell-countdown1">
                                <li><b>00</b> <span>hours</span></li>
                                <li class="sep"><b>:</b></li>
                                <li><b>00</b> <span>minutes</span></li>
                                <li class="sep"><b>:</b></li>
                                <li><b>00</b> <span>seconds</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="upsell-section section">
                <div class="page-title">
                    <div class="title-h3 m-bottom-05">
                         <span class="primary-color">Do you need your meal plan urgently?</span>
                    </div>
                </div>
                <div class="fl-centered m-bottom-1_5">
                    <div class="text fl-column width-65">
                        We can prioritize the evaluation of your answers & prepare your meal plan
                        <b>in just 30 minutes for an additional fee of just $5.</b>
                    </div>
                </div>
                <div class="fl-centered m-bottom-1_5">
                    <div class="text fl-column width-70">
                        <b class="danger-color">Hurry! We Have Only 2 Priority Options Left For Today!</b>
                    </div>
                </div>
                <div class="fl-centered">
                    <?php if (isset($payment) && ! $payment): ?>
                        <p>Error</p>
                    <?php endif; ?>
                    <?php if (can_user_payment_with_stripe()): ?>
                        <form method="post" action="<?php get_current_url() ?>">
                            <input type="hidden" name="action" value="pay">
                            <button type="submit" class="btn btn-primary btn-solid btn-xlarge">Yes! Rush My Plan</button>
                        </form>
                    <?php else: ?>
                        <?php echo do_shortcode('[woocommerce_checkout]') ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="upsell-section">
                <div class="fl-centered">
                    <?php if (! has_user_plan_upsell()): ?>
                        <a href="<?php echo get_my_plan_url() ?>" class="upsell-no-thanks-btn gray-color">
                            No thank you, I will wait for 24 hours to get my meal plan.
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>


<!--<div class="up-dashboard-container">-->
<!--        <div class="dashboard-box upsell dashboard-box-inr">-->
<!--            <div class="upBox">-->
<!--                <img src="--><?php //echo get_image_url('dashboard/up2-img.jpg') ?><!--" class="up2-img">-->
<!--                <p class="upbx-pra1">Your meal plan is currently being custom curated by our nutritionists. <br class="hide-mob">Please check back within --><?php //echo has_user_plan_upsell() ? '30 minutes' : '24 hours' ?><!--</p>-->
<!--                <div class="clearall"></div>-->
<!--                <div class="timerBox">-->
<!--                    <img src="--><?php //echo get_image_url('dashboard/clock.png') ?><!--" alt="" class="clock">-->
<!--                    <p class="time-t">The Estimated Current Wait Time Is</p>-->
<!--                    <div class="timer-mid">-->
<!--                        <div id="firstTimer" class="psgTimer psgTimer_fade">-->
<!--                            <div class="psgTimer_numbers">-->
<!--                                <div class="hours psgTimer_unit">-->
<!--                                    <div>-->
<!--                                        <div class="number" id="hours-1" data-number="0">2</div>-->
<!--                                    </div>-->
<!--                                    <div>-->
<!--                                        <div class="number" id="hours-2" data-number="0">3</div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="minutes psgTimer_unit">-->
<!--                                    <div>-->
<!--                                        <div class="number" id="minutes-1" data-number="0">5</div>-->
<!--                                    </div>-->
<!--                                    <div>-->
<!--                                        <div class="number" id="minutes-2" data-number="0">9</div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="seconds psgTimer_unit">-->
<!--                                    <div>-->
<!--                                        <div class="number" id="seconds-1" data-number="0">5</div>-->
<!--                                    </div>-->
<!--                                    <div>-->
<!--                                        <div class="number" id="seconds-2" data-number="0">9</div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="psgTimer_labels">-->
<!--                                <div class="hours">Hours</div>-->
<!--                                <div class="minutes">minutes</div>-->
<!--                                <div class="seconds">seconds</div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                --><?php //if (! has_user_plan_upsell()): ?>
<!--                    <p class="ofr-blue-txt">Do you need your meal plan urgently?</p>-->
<!--                    <p class="upbx-pra1">We can prioritize the evaluation of your answers & prepare your meal plan in-->
<!--                        just 30 minutes for an additional fee of just $5.</p>-->
<!--                    <div class="offerMid">-->
<!--                        <p class="offr-midtxt">Hurry! We Have Only 2 Priority Options Left For Today! </p>-->
<!--                        <div class="clearall"></div>-->
<!--                        --><?php //if (isset($payment) && ! $payment): ?>
<!--                            <p>Error</p>-->
<!--                        --><?php //endif; ?>
<!--                        --><?php //if (can_user_payment_with_stripe()): ?>
<!--                            <form method="post" action="--><?php //get_current_url() ?><!--">-->
<!--                                <input type="hidden" name="action" value="pay">-->
<!--                                <button type="submit" class="order-btn pulse">Yes! Rush My Plan</button>-->
<!--                            </form>-->
<!--                        --><?php //else: ?>
<!--                            --><?php //echo do_shortcode('[woocommerce_checkout]') ?>
<!--                        --><?php //endif; ?>
<!--                        <ul class="offr-list">-->
<!--                            <li>No Subscription</li>-->
<!--                            <li>No Hidden Fees</li>-->
<!--                            <li>No Contracts</li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                --><?php //endif; ?>
<!--            </div>-->
<!--        </div>-->
<!--        <p class="no-thanks">-->
<!--            --><?php //if (! has_user_plan_upsell()): ?>
<!--                <a href="--><?php //echo get_my_plan_url() ?><!--"><img-->
<!--                            src="--><?php //echo get_image_url('dashboard/nothnk-cross.png') ?><!--" alt="">No thank you, I will-->
<!--                    wait-->
<!--                    for 24 hours to get my meal plan.</a>-->
<!--            --><?php //endif; ?>
<!---->
<!--        </p>-->
<!--    </div>-->

<?php get_footer('dashboard'); ?>