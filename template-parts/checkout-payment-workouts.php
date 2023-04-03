<div id="wc-stripe-payment-request-wrapper"><div id="wc-stripe-payment-request-button"></div></div>
<div class="chk-center">
    <div class="pop-chk-inr">
        <label class="card-row card-block active" data-id="">
            <div class="paymentOpt">
                <input type="radio" id="payment_method_stripe" name="payment_method" checked="checked" value="mwb-wocuf-pro-stripe-gateway">
                <span></span>
                <p>Credit Card</p>
            </div>
            <div class="accept-card"><img src="<?php echo get_image_url('v2/crd-img2.png') ?>"></div>
        </label>
        <label class="card-row paypal-block" data-id="">
            <div class="paymentOpt">
                <input type="radio" id="payment_method_paypal" name="payment_method" value="mwb-wocuf-pro-paypal-gateway">
                <span></span>
                <p>Paypal</p>
            </div>
            <div class="accept-card"><img src="<?php echo get_image_url('v2/paypal-card.png') ?>"></div>
        </label>

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

<?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>
