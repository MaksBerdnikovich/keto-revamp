<p class="chk-txt1">Step 3</p>
<p class="chk-sec-hdng">Select a secure <br class="forMob">payment method</p>
<div class="chk-s3-left checkout-email-error-section">
    Enter email to see payments methods
</div>
<div class="chk-s3-left checkout-payment-section" style="display: none">
    <div class="pop-chk-inr">
        <div id="wc-stripe-payment-request-wrapper"><div id="wc-stripe-payment-request-button"></div></div>

        <label class="card-row card-block active" data-id="">
            <div class="paymentOpt">
                <input type="radio" id="payment_method_stripe" name="payment_method" checked="checked"
                       value="mwb-wocuf-pro-stripe-gateway">
                <span></span>
                <p>Credit Card</p>
            </div>
            <div class="accept-card"><img src="<?php echo get_image_url('v2/crd-img2.png') ?>"></div>
        </label>
        <label class="card-row paypal-block" data-id="">
            <div class="paymentOpt">
                <input type="radio" id="payment_method_paypal" name="payment_method"
                       value="mwb-wocuf-pro-paypal-gateway">
                <span></span>
                <p>Paypal</p>
            </div>
            <div class="accept-card"><img src="<?php echo get_image_url('v2/paypal-card.png') ?>"></div>
        </label>

    </div>

    <div class="chk-s3-rght forMob">
        <p class="ordr-smry">Order Summary</p>
        <p class="smry-col-1">Annual plan <span class="price-text"></span></p>
        <p class="smry-col-1">Discount <span class="clr sale-text"></span></p>
        <p class="smry-total">Total<span class="total-text"></span></p>
    </div>

    <div class="pop-pymnt-sec">
        <?php if (WC()->cart->needs_payment()) : ?>
            <?php
            if (! empty($args['available_gateways'])) {
                foreach ($args['available_gateways'] as $gateway) {
                    if ($gateway->id == 'mwb-wocuf-pro-stripe-gateway' || $gateway->id == 'mwb-wocuf-pro-paypal-gateway'):
                        wc_get_template('checkout/payment-method.php', ['gateway' => $gateway]);
                    endif;
                }
            }
            ?>
        <?php endif; ?>
    </div>

</div>

<div class="chk-s3-rght hide-mob">
    <p class="ordr-smry">Order Summary</p>
    <p class="smry-col-1">Annual plan <span class="price-text"></span></p>
    <p class="smry-col-1">Discount -75% <span class="clr sale-text"></span></p>
    <p class="smry-total">Total<span class="total-text"></span></p>
</div>

<?php wp_nonce_field('woocommerce-process_checkout', 'woocommerce-process-checkout-nonce'); ?>
