<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.7.0
 */

defined('ABSPATH') || exit;
?>

<div class="checkout">
    <div class="container">
        <div class="checkout-thanks section">
            <div class="checkout-thanks__wrap">
                <div class="page-title m-bottom-2">
                    <div class="title-h3">THANK YOU!</div>
                </div>

                <div class="page-text m-bottom-2">
                    <p>Thank you for your purchase! You will see a charge from Keto Revamp.com or Keto Revamp LLC on your bank statement.</p>
                </div>

                <div class="page-title m-bottom-2">
                    <div class="title-h4">CONGRATULATIONS!</div>
                </div>

                <div class="page-text tx-repeat m-bottom-2">
                    <p>
                        You can now access your Personalized Keto Meal account (and your meal plan should be available
                        soon). To access your meal plan, click the blue button below.
                    </p>
                    <p>
                        We suggest bookmarking the members area page once you get there for future access; instructions
                        have been emailed to you as well.
                    </p>
                    <p>
                        Please check your email for more information if you added the keto coaching to your order.
                    </p>
                    <p>
                        Ensure that <a href="#" class="primary-color tx-bold">support@ketorevamp.com</a> is whitelisted and check your spam folder if you haven't
                        received the welcome email.
                    </p>
                    <p>
                        <b class="primary-color tx-bold">Again thanks for your purchase, I’m so excited for your journey!</b>
                    </p>
                    <p><b>Olivia Reynolds</b></p>
                </div>

                <div class="page-text tx-repeat">
                    <?php if ($order): ?>
                        <?php if ($order->has_status('failed')) : ?>
                        <div class="fl-centered">
                            <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e('Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce'); ?></p>

                            <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
                                <a href="<?php echo esc_url($order->get_checkout_payment_url()); ?>"
                                   class="button pay"><?php esc_html_e('Pay', 'woocommerce'); ?></a>
                                <?php if (is_user_logged_in()) : ?>
                                    <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>"
                                       class="button pay"><?php esc_html_e('My account', 'woocommerce'); ?></a>
                                <?php endif; ?>
                            </p>
                        </div>
                        <?php else : ?>

                        <div class="fl-centered">
                            <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters('woocommerce_thankyou_order_received_text', esc_html__('Thank you. Your order has been received.', 'woocommerce'), $order); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

                            <?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
                        </div>
                    <?php endif; ?>

                    <?php else : ?>
                        <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters('woocommerce_thankyou_order_received_text', esc_html__('Thank you. Your order has been received.', 'woocommerce'), null); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>