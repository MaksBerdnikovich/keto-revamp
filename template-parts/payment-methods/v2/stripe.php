<div class="card-box" id="stripe-payment-data" data-email="" data-full-name=" " data-currency="usd">

    <?php
    ob_start();
    $args['gateway']->payment_fields();
    $var = ob_get_contents();
    ob_end_clean();
    $var = str_replace('<br />', '', $var);
    echo $var;
    ?>

    <input type="submit" value="Submit Secure Payment" id="stripe-submit-button" disabled="disabled" placeholder="Submit Secure Payment" class="comp-chk">

    <p class="click-txt"><input type="checkbox" name="togData" id="togData">
        By submitting this form, you agree to our Terms of service and Privacy policy . If you do not wish
        to receive information about Company name services, please send us an email at <a
                href="mailto:<?php echo get_support_email() ?>"><?php echo get_support_email() ?></a>
    </p>
</div>