<?php
    global $tariffsCollection;

    $plan_desc = [
        '1' => '<p><b>Your Customized Keto Meal Plan</b>You\'ll know precisely what to eat for breakfast, lunch and dinner</p>',
        '2' => '<p><b>Daily Keto Snacks</b>Continue to lose weight each day with included snacks.</p>',
        '3' => '<p><b>Simple, easy-to-follow recipes</b>Easily prepare tasty meals that will leave you pleasantly full and know what to order when dining out</p>',
        '4' => '<p><b>Simple ingredients you can find at any store</b>Printable grocery list saves you time & money</p>',
        '5' => '<p><b>Attain Your Goal Weight</b>Everything has been taken care of for you! Just follow the meal plan and watch the results</p>',
        '6' => '<p><b>A Keto 101 Guide for beginners</b></p>',
    ]
?>

<div class="checkout">
    <div class="container">
        <div class="checkout-plans section">
            <div class="page-title m-bottom-2">
                <div class="title-h3">Sign Up In The Next 5 Minutes <br/> So You Don’t Lose Your Spot & Your Custom Meal Plan</div>
                <div class="text">We Have A Limited Amount Of Clients We Can Take Each Month So Don’t Delay</div>
            </div>

            <div class="checkout-plans__desc">
                <ul class="checkout-plans-list">
                    <li><?= $plan_desc['1'] ?></li>
                    <li><?= $plan_desc['2'] ?></li>
                    <li><?= $plan_desc['3'] ?></li>
                    <li><?= $plan_desc['4'] ?></li>
                    <li><?= $plan_desc['5'] ?></li>
                    <li><?= $plan_desc['6'] ?></li>
                </ul>
            </div>
            <div class="checkout-plans__grid grid">
                <div class="grid-row">
                    <?php foreach ($tariffsCollection as $key => $tariff): ?>
                        <div class="grid-col col-33">
                            <div class="checkout-plan__item <?= $tariff['default'] ? 'special active' : null ?>" data-tariff="<?php echo $tariff['id'] ?>" data-price="<?php echo $tariff['price_full'] ?? '' ?>" data-period="<?php echo $tariff['period'] ?? '' ?>">
                                <?php if ($tariff['sale_text']): ?>
                                    <div class="checkout-plan__item-label"><b><?php echo $tariff['sale_text'] ?></b></div>
                                <?php endif; ?>

                                <div class="checkout-plan__item-caption">
                                    <div class="checkout-plan__item-title">
                                        <div class="tx-bolder tx-capitalize"><?= $tariff['name'] ?> <span>Keto Diet</span></div>
                                    </div>
                                    <div class="checkout-plan__item-price">
                                        <div class="offer">
                                            <span class="strikeout">was <?php echo $tariff['price_month_without_sale'] ?>$</span>
                                            <span>today only</span>
                                        </div>
                                        <div class="price title-h3 primary-color">$<?php echo $tariff['price_month'] ?></div>
	                                    <?php if ($key == 0): ?>
                                            <div class="billed tx-bolder">No subscription</div>
                                        <?php else: ?>
                                            <div class="billed tx-bolder">Billed every <?= $tariff['period'] ?> months</div>
	                                    <?php endif; ?>
                                    </div>
                                </div>
                                <div class="checkout-plans__item-desc">
                                    <ul class="checkout-plans-list">
                                        <li><?= $plan_desc['1'] ?> <i class="icon-checked"></i></li>
                                        <li><?= $plan_desc['2'] ?> <i class="icon-checked"></i></li>
                                        <li><?= $plan_desc['3'] ?> <i class="icon-checked"></i></li>
                                        <li><?= $plan_desc['4'] ?> <i class="icon-checked"></i></li>
                                        <li><?= $plan_desc['5'] ?> <i class="icon-checked"></i></li>
                                        <li><?= $plan_desc['6'] ?> <i class="icon-checked"></i></li>
                                    </ul>
                                </div>
                                <div class="checkout-plan__item-btn get-plan">
                                    <div class="btn btn-solid btn-primary btn-large no-hover">Get my plan</div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
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

            <div class="checkout-bonus__btn get-plan m-bottom-2_5">
                <button class="btn btn-solid btn-primary btn-xlarge">Choose your plan</button>
            </div>

            <div class="summary-order__form">
                <div class="payments">
                    <img src="<?=get_image_url('/summary/pays.png')?>" alt="Payments">
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
    </div>
</div>


<div class="payment-popup" id="Pop1" style="display: none;">
    <div id="result" class="preloader"><div class="preloader__loader"></div></div>

    <div class="container offset">
        <div class="payment-popup__wrap section">
            <div class="page-title">
                <div class="title-h3">Select Payment Method</div>
            </div>
            <div class="payment-popup__form">
                <form id="form-checkout" name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
                    <input type="hidden" name="billing_email" value="<?php echo get_checkout_email() ?>"/>
                    <input type="hidden" value="plan" name="order_type">
                    <?php wp_nonce_field('woocommerce-process_checkout', 'woocommerce-process-checkout-nonce'); ?>
                    <div id="order_review" class="woocommerce-checkout-review-order">
                        <?php do_action('woocommerce_checkout_order_review'); ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>