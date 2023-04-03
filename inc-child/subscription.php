<?php

if (class_exists('WC_Subscription')) {
    add_action('woocommerce_subscription_status_active', 'activate_user_subscription_premium');

    function activate_user_subscription_premium(WC_Subscription $subscription)
    {
        update_field('premium', true, 'user_'.$subscription->get_user_id());
    }

    add_action('woocommerce_subscription_status_cancelled', 'deactivate_user_subscription_premium');
    add_action('woocommerce_subscription_status_expired', 'deactivate_user_subscription_premium');
    add_action('woocommerce_subscription_status_on-hold', 'deactivate_user_subscription_premium');

    function deactivate_user_subscription_premium(WC_Subscription $subscription)
    {
        update_field('premium', false, 'user_'.$subscription->get_user_id());
    }

}