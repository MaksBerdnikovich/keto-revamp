<div class="plan-upsell-checkout-container">
    <form id="form-checkout" name="checkout" method="post" class="checkout woocommerce-checkout"
          action="<?php echo get_current_url(); ?>" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo wp_get_current_user()->user_email ?>" name="billing_email" id="billing_email">
        <input type="hidden" value="plan_upsell" name="order_type">
        <div id="order_review" class="woocommerce-checkout-review-order">
            <?php do_action('woocommerce_checkout_order_review'); ?>
        </div>
    </form>
</div>