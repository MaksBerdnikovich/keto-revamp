<?php

if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
}

function get_quiz_url($gender = false)
{
    $quiz = get_field('quiz_url');
    if (! $quiz) {
        $quiz = home_url('quiz');
    }
    if ($gender) {
        $quiz = add_query_arg(['quiz_type' => $gender], $quiz);
    }

    return $quiz;
}

function get_checkout_url()
{
    $url = get_field('checkout_url');
    if (! $url) {
        $url = home_url('checkout');
    }

    return $url;
}

function get_email_url()
{
    $url = get_field('email_url');
    if (! $url) {
        $url = home_url('email');
    }

    return $url;
}

function get_login_url()
{
    return home_url('login');
}

function get_summary_url()
{
    $url = get_field('summary_url');
    if (! $url) {
        $url = home_url('summary');
    }

    return $url;
}

function get_tariffs_collections()
{
    return get_field('categories_tariffs', 'option');
}

function get_tariffs_ids()
{
    $ids = [];
    $collection = get_tariffs_collections();
    $array = array_column($collection, 'category');
    foreach ($array as $item) {
        $ids = array_merge($ids, array_column($item, 'id'));
    }

    return $ids;
}

function get_random_tariffs_collection()
{
    $collection = get_tariffs_collections();
    if (! $collection) {
        return [];
    }

    if (! session_id()) {
        session_start();
    }

    $count = count($collection) - 1;
    if (isset($_SESSION['tariffs']) && $_SESSION['tariffs'] <= $count) {
        $rand = $_SESSION['tariffs'];
        $rand++;
        if ($rand > $count) {
            $rand = 0;
        }
    } else {
        $rand = rand(0, $count);
    }
    $_SESSION['tariffs'] = $rand;

    return $collection[$rand]['category'];
}

function get_default_tariff_id($tariffsCollection)
{
    if (count($tariffsCollection) == 0) {
        return false;
    }
    foreach ($tariffsCollection as $tariff) {
        if ($tariff['default']) {
            return $tariff['id'];
        }
    }

    return $tariffsCollection[0]['id'];
}

function get_workout_product_id()
{
    return get_field('workout_product_id', 'option');
}

function get_print_ulr()
{
    return home_url('print');
}

function get_grocery_ulr()
{
    return home_url('grocery');
}

function get_my_plan_url()
{
    return home_url('my-plan');
}

function get_workouts_url()
{
    $url = get_field('workouts_url', 'option');
    if (! $url) {
        $url = home_url('workouts');
    }

    return $url;
}

function get_support_email()
{
    $email = get_field('support_email', 'option');
    if (! $email) {
        $email = 'support@theketoprogram.com';
    }

    return $email;
}

function get_facebook_url()
{
    $url = get_field('facebook_url', 'option');
    if (! $url) {
        $url = '#';
    }

    return $url;
}

function get_email_registration_template()
{
    return get_field('email_registration_template', 'option');
}

function get_email_registration_subject()
{
    return get_field('email_registration_subject', 'option');
}

function get_email_password_reset_template()
{
    return get_field('email_password_reset_template', 'option');
}

function get_email_password_reset_subject()
{
    return get_field('email_password_reset_subject', 'option');
}

function get_email_password_changed_template()
{
    return get_field('email_password_changed_template', 'option');
}

function get_email_password_changed_subject()
{
    return get_field('email_password_changed_subject', 'option');
}

function get_mailchimp_api_key()
{
    return '2a2a48fdaecb5f3a87f3e82089aef6b6';
}

function get_mailchimp_domain()
{
    return 'us17';
}

function get_mailchimp_before_register_list()
{
    return '6271a0b22e';
}

function get_mailchimp_after_register_list()
{
    return '5c7c5c37ab';
}

function get_privacy_url()
{
    return home_url('privacy-policy');
}

function get_upsell_plan_url()
{
    return get_field('upsell_plan_url', 'option');
}

function get_dessert_upsell_product_id()
{
    return get_field('dessert_upsell_product_id', 'option');
}

function get_cocktail_upsell_product_id()
{
    return get_field('cocktail_upsell_product_id', 'option');
}

function get_plan_upsell_product_id()
{
    return get_field('plan_upsell_product_id', 'option');
}

function get_twilio_sid()
{
    return get_field('twilio_sid', 'option');
}
function get_twilio_token()
{
    return get_field('twilio_token', 'option');
}

function get_workouts_pdf()
{
    return get_field('workouts_pdf', 'option');
}

function get_ask_coach_upsell_product_id()
{
    return get_field('ask_coach_upsell_product_id', 'option');
}

function get_supplements_upsell_product_id()
{
    return get_field('supplements_upsell_product_id', 'option');
}

function get_books_upsell_product_id()
{
    return get_field('books_upsell_product_id', 'option');
}