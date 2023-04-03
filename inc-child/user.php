<?php

function has_user_premium($userId = null)
{
    if (! $userId) {
        $userId = get_current_user_id();
    }

    $premium = get_field('premium', 'user_' . $userId);

    return $premium ?? false;
}

function has_user_plan_access($userId = false)
{
    if (! $userId) {
        $userId = get_current_user_id();
    }
    $planUpsell = has_user_plan_upsell($userId);
    $user = new WP_User($userId);
    $registeredDiff = carbon_now()->diffInMinutes(carbon_parse($user->user_registered));
    $upsellDate = get_field('plan_upsell_date', 'user_' . $userId);
    $upsellDateCarbon = carbon_from_timestamp($upsellDate);
    $upsellDiff = carbon_now()->diffInMinutes($upsellDateCarbon);
    if (($planUpsell && $upsellDiff >= 30) || $registeredDiff >= 4 * 60) {
        return true;
    }

    return false;
}

function has_user_plan_upsell($userId = false)
{
    if (! $userId) {
        $userId = get_current_user_id();
    }
    $planUpsell = get_field('has_plan_upsell', 'user_' . $userId);
    if ($planUpsell) {
        return true;
    }

    return false;
}

function can_user_buy_plan_upsell($userId = false)
{
    if (! $userId) {
        $userId = get_current_user_id();
    }
    $user = new WP_User($userId);
    $planUpsell = has_user_plan_upsell($userId);
    $diff = carbon_now()->diffInMinutes(carbon_parse($user->user_registered));
    if (! $planUpsell && $diff < 5) {
        return true;
    }

    return false;
}

function has_user_dessert($userId = false)
{
    if (! $userId) {
        $userId = get_current_user_id();
    }
    $dessert = get_field('has_dessert', 'user_' . $userId);
    if ($dessert) {
        return true;
    }

    return false;
}

function has_user_cocktail($userId = false)
{
    if (! $userId) {
        $userId = get_current_user_id();
    }
    $cocktail = get_field('has_cocktail', 'user_' . $userId);
    if ($cocktail) {
        return true;
    }

    return false;
}

function has_user_ask_coach_access($userId = false)
{
    if (! $userId) {
        $userId = get_current_user_id();
    }
    $access = get_field('has_ask_coach_access', 'user_' . $userId);
    if ($access) {
        return true;
    }

    return false;
}

function has_user_books_access($userId = false)
{
    if (! $userId) {
        $userId = get_current_user_id();
    }
    $access = get_field('has_books_access', 'user_' . $userId);
    if ($access) {
        return true;
    }

    return false;
}

function has_user_workouts_access($userId = false)
{
    return true;
//    if (! $userId) {
//        $userId = get_current_user_id();
//    }
//    $access = get_field('workouts_access', 'user_' . $userId);
//    if ($access) {
//        return true;
//    }

    //return false;
}

function can_user_payment_with_stripe($userId = false)
{
    if (! $userId) {
        $userId = get_current_user_id();
    }
    $enabled = get_field('stripe_enabled', 'user_' . $userId);
    if ($enabled) {
        return true;
    }

    return false;
}

function can_user_update_plan($userId = false) {
    if (! $userId) {
        $userId = get_current_user_id();
    }
    $enabled = get_field('can_update_plan', 'user_' . $userId);
    if ($enabled) {
        return true;
    }

    return false;
}