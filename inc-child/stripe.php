<?php

use Stripe\Exception\ApiErrorException;
use Stripe\PaymentIntent;
use Stripe\StripeClient;

/**
 * @param $intentId
 * @return bool|\Stripe\PaymentIntent
 */
function stripe_get_payment_intent($intentId)
{
    $stripe = new StripeClient(get_stripe_secret_key());

    try {
        return $stripe->paymentIntents->retrieve($intentId, []);
    } catch (ApiErrorException $e) {
        error_log($e->getTraceAsString());

        return false;
    }
}

function stripe_save_user_payment_data_from_intent($intentId, $userId = false)
{
    $intent = stripe_get_payment_intent($intentId);
    if (! $intent) {
        return false;
    }
    if (! $userId) {
        $userId = get_current_user_id();
    }
    update_field('stripe_enabled', true, 'user_' . $userId);
    update_field('stripe_payment_method', $intent->payment_method, 'user_' . $userId);
    update_field('stripe_customer', $intent->customer, 'user_' . $userId);

    return true;
}

function stripe_try_create_payment_intent(WC_Order $order)
{
    $userId = get_current_user_id();
    $paymentMethod = get_field('stripe_payment_method', 'user_' . $userId);
    $customer = get_field('stripe_customer', 'user_' . $userId);
    if (! can_user_payment_with_stripe($userId) || ! $paymentMethod || ! $customer) {
        return false;
    }
    $payment_desc = esc_html__('Payment for order id : ', 'woocommerce-one-click-upsell-funnel-pro');

    $total = intval($order->get_total());
    $totalNoDec = $total * 100;
    $card_intent_info = [
        'amount'               => $totalNoDec,
        'currency'             => strtolower(get_woocommerce_currency()),
        'payment_method_types' => ['card'],
        'confirm'              => true,
        'customer'             => $customer,
        'payment_method'       => $paymentMethod,
        'setup_future_usage'   => 'off_session',
        'description'          => $payment_desc . $order->get_id(),
    ];

    try {
        $intent = PaymentIntent::create($card_intent_info);
    } catch (ApiErrorException $exception) {
        return false;
    }
    update_post_meta($order->get_id(), '_saved_payment_intent_id', $intent->id);

    if (! empty($intent->charges->data)) {
        $payment_status = $intent->charges->data;
        if ($payment_status[0]->captured) {
            $order->add_order_note(__('Stripe charge complete ( Payment Intent ID:' . $intent->id . ')', 'woocommerce-one-click-upsell-funnel-pro'));

            return true;
        }
    }
    return false;
}

function create_oder_with_stripe_payment($productId)
{
    $user = wp_get_current_user();
    if (! can_user_payment_with_stripe()) {
        return false;
    }
    $order = wc_create_order();
    try {
        $order->add_product(wc_get_product($productId), 1);
        $order->set_billing_email($user->user_email);
        $order->set_customer_id(get_current_user_id());
        $payment_gateways = WC()->payment_gateways->payment_gateways();
        $order->set_payment_method($payment_gateways['mwb-wocuf-pro-stripe-gateway']);
    } catch (WC_Data_Exception $e) {
        error_log($e->getMessage());

        return false;
    }

    $order->calculate_totals(true);

    $payment = stripe_try_create_payment_intent($order);

    if ($payment) {
        $order->payment_complete();
        $order->update_status('completed');
        if (WC()->cart) {
            WC()->cart->empty_cart();
        }
        return true;
    } else {
        update_field('stripe_enabled', false, 'user_' . $user->ID);

        $order->delete(true);

        return false;
    }
}

function create_plan_upsell_oder_with_stripe_payment()
{
    $payment = create_oder_with_stripe_payment(get_plan_upsell_product_id());
    if ($payment) {
       plan_upsell_order_complete();
    }
    return $payment;
}

function create_workouts_oder_with_stripe_payment()
{
    $payment = create_oder_with_stripe_payment(get_workout_product_id());
    if ($payment) {
        workouts_order_complete();
    }
    return $payment;
}