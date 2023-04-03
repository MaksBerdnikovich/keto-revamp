<div class="card-box panel">
    <?php
        $args['gateway']->payment_fields();
    ?>

    <input type="submit" value="Submit Secure Payment" id="stripe-submit-button" disabled="disabled"
           placeholder="Submit Secure Payment" class="comp-chk btn btn-primary btn-solid btn-xlarge">

    <label class="checkbox-group">
        <input type="checkbox" name="togData" id="togData">
        <span class="checker"></span>
        <span class="label">
             By submitting this form, you agree to our Terms of service and Privacy policy . If you do not
            wish to receive information about Company name services, please send us an email at
            <a href="mailto:<?php echo get_support_email() ?>"><?php echo get_support_email() ?></a>
        </span>
    </label>
</div>