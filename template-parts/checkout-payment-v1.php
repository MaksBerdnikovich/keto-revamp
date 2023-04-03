<?php if (WC()->cart->needs_payment()) : ?>
    <div class="pop-chk-inr">
        <div id="wc-stripe-payment-request-wrapper">
            <div id="wc-stripe-payment-request-button"></div>
        </div>

        <div class="pop-pymnt-sec">
            <label class="card-row card-block active" data-id="">
                <div class="paymentOpt radio-group">
                    <input type="radio" id="payment_method_stripe" name="payment_method" checked="checked" value="mwb-wocuf-pro-stripe-gateway">
                    <span class="checker"></span>
                    <span class="label"><i class="icon-credit-card"></i> Credit Card</span>
                </div>
                <div class="accept-card">
                    <span>We Accept</span>
                    <img src="<?php echo get_image_url('checkout/pays.png') ?>" alt="Payments" />
                </div>
            </label>
            <?php
                if (!empty($args['available_gateways'])) {
                    foreach ($args['available_gateways'] as $gateway) {
                        if ($gateway->id == 'mwb-wocuf-pro-stripe-gateway') {
                            //if ($gateway->id == 'stripe') {
                            wc_get_template('checkout/payment-method.php', ['gateway' => $gateway]);
                        }
                    }
                }
            ?>
        </div>

        <label class="card-row paypal-block" data-id="" style="display: none;">
            <div class="paymentOpt radio-group">
                <input type="radio" id="payment_method_paypal" name="payment_method" value="mwb-wocuf-pro-paypal-gateway">
                <span class="checker"></span>
                <span class="label"><i class="icon-credit-card"></i> PayPal Card</span>
            </div>
        </label>

        <?php
            if (!empty($args['available_gateways'])) {
                foreach ($args['available_gateways'] as $gateway) {
                    if ($gateway->id == 'mwb-wocuf-pro-paypal-gateway') {
                        wc_get_template('checkout/payment-method.php', ['gateway' => $gateway]);
                    }
                }
            }
        ?>
    </div>

    <div class="chk-prc m-top-2">
        <p>Total: <span class="total-sum"></span> billed every <span class="total-period"></span> month(s)</p>
        <img src="<?php echo get_image_url('checkout/secure.png') ?>">
    </div>
<?php endif;