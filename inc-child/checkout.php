<?php

function save_quiz_to_db_session($params = [])
{
    $data = [
        'gender'           => $_POST['gender'],
        'age'              => $_POST['age'],
        'system'           => $_POST['system'],
        'height'           => $_POST['height'] ?? '',
        'height_1'         => $_POST['height_1'] ?? '',
        'height_2'         => $_POST['height_2'] ?? '',
        'weight'           => $_POST['weight'],
        'target_weight'    => $_POST['target_weight'],
        'activity'         => $_POST['activity'],
        'motivation'       => $_POST['motivation'],
        'preparation_time' => $_POST['preparation_time'],
        'products'         => $_POST['products'],
        'meat'             => $_POST['meat'],
        'event'            => $_POST['event_type'],
        'event_date'       => $_POST['event_date'],
    ];

    $data = array_merge($data, $params);
    set_keto_session('quiz_data', $data);

    return $data;
}

add_action('woocommerce_checkout_update_order_meta', 'set_order_type');

function set_order_type($order_id)
{
    $allowedTypes = get_allowed_order_types();
    $orderType = $_POST['order_type'];
    if (! empty($orderType) && in_array($orderType, $allowedTypes)) {
        update_post_meta($order_id, 'order_type', $orderType);
    } else {
        $orderType = attempt_to_detect_order_type($order_id);
        if (in_array($orderType, $allowedTypes)) {
            update_post_meta($order_id, 'order_type', $orderType);
        }
    }

    return $order_id;
}

function attempt_to_detect_order_type($order_id)
{

    $order = wc_get_order($order_id);
    if (check_if_order_has_tariff_product($order)) {
        return 'plan';
    } elseif (check_if_order_has_workout_product($order)) {
        return 'workouts';
    } elseif (check_if_order_has_plan_upsell($order)) {
        return 'plan_upsell';
    } else {
        return 'unknown';
    }
}

function allow_user_workout_access(WC_Order $order)
{
    return $order->get_id();
}

function create_new_user_with_plan(WC_Order $order)
{
    $email = get_keto_session('email');
    $name = get_keto_session('name');

    $quizData = get_keto_session('quiz_data') ?? false;
    if (! $quizData) {
        return false;
    }

    $existsUser = get_user_by('email', $email);
    if ($existsUser) {
        return true;
    }

    $password = wp_generate_password(12);

    $userData = [
        'user_login' => $email,
        'user_pass'  => $password,
        'user_email' => $email,
        'nickname'   => $name,
    ];
    $userId = wp_insert_user($userData);

    if (is_wp_error($userId)) {
        return false;
    }

    generate_new_user_plan($userId);

    send_mail($email, get_email_registration_template(), get_email_registration_subject(), [
        'PARAM_1' => $password,
    ]);

    $userKey = 'user_'.$userId;

    update_profile_data($userId, $quizData);

    update_field('products', $quizData['products'], $userKey);
    update_field('meat', $quizData['meat'], $userKey);

    update_field('graph', $quizData['graph'], $userKey);
    update_field('event', $quizData['event'], $userKey);
    update_field('event_point', $quizData['event_point'], $userKey);
    update_field('first_month_lose', $quizData['first_month_lose'], $userKey);
    update_field('first_month', $quizData['first_month'], $userKey);
    update_field('to_event_weight', $quizData['to_event_weight'], $userKey);

    if (check_if_order_has_dessert_upsell($order)) {
        update_field('has_dessert', true, $userKey);
    }
    if (check_if_order_has_cocktail_upsell($order)) {
        update_field('has_cocktail', true, $userKey);
    }
    if (check_if_order_has_plan_upsell($order)) {
        plan_upsell_order_complete($userId);
    }
    if (check_if_order_has_workout_product($order)) {
        workouts_order_complete($userId);
    }
    if (check_if_order_has_ask_coach_product($order)) {
        ask_coach_upsell_order_complete($userId);
    }
    if (check_if_order_has_supplements_product($order)) {
        supplements_upsell_order_complete($userId);
    }
    if (check_if_order_has_books_product($order)) {
        books_upsell_order_complete($userId);
    }

    update_post_meta($order->get_id(), '_customer_user', $userId);

    update_field('can_update_plan', check_if_order_support_plan_update($order), $userKey);

    $voluumCid = get_keto_session('voluum_cid');
    if ($voluumCid) {
        update_field('voluum_cid', $voluumCid, $userKey);
    }

    delete_keto_session();

    mailchimp_delete_member(get_mailchimp_before_register_list(), $email);
    mailchimp_add_member(get_mailchimp_after_register_list(), $email);

    save_order_payments_data($order, $userId);

    $auth = wp_authenticate($email, $password);
    wp_set_auth_cookie($auth->ID);

    return $userId;
}

function save_order_payments_data(WC_Order $order, $userId = false)
{
    if (! $userId) {
        get_current_user_id();
    }
    if ($order->get_payment_method() == 'mwb-wocuf-pro-stripe-gateway') {
        $paymentIntentId = get_post_meta($order->get_id(), '_saved_payment_intent_id', true);
        if ($paymentIntentId) {
            stripe_save_user_payment_data_from_intent($paymentIntentId, $userId);
        }
    }
}

add_filter('woocommerce_thankyou_order_received_text', 'thankyou_order_received_text', 10, 2);
function thankyou_order_received_text($esc_html__, $order)
{
    $orderId = $order->get_id();
    $orderType = get_post_meta($orderId, 'order_type', true);
    if ($orderType == 'workouts') {
        return '<a class="redirect-link btn btn-solid btn-primary btn-xlarge" href="'.get_workouts_url().'">Access Your Personalized Keto Meal Plan Here</a>';
    } else {
        return '<a class="redirect-link btn btn-solid btn-primary btn-xlarge" href="'.get_my_plan_url().'">Access Your Personalized Keto Meal Plan Here</a>';
    }
}

add_action('woocommerce_order_status_processing', 'complete_processing_order');
function complete_processing_order($order_id)
{
    $order = wc_get_order($order_id);
    $orderType = get_post_meta($order_id, 'order_type', true);
    if ($orderType == 'plan') {
        $userWithPlanId = create_new_user_with_plan($order);
        if ($userWithPlanId) {
            $order->update_status('completed');
            update_field('premium', '1', 'user_'.$userWithPlanId);
        }
    } elseif ($orderType == 'workouts') {
        $order->update_status('completed');
        workouts_order_complete();
        save_order_payments_data($order);
    } elseif ($orderType == 'plan_upsell') {
        $order->update_status('completed');
        plan_upsell_order_complete();
        save_order_payments_data($order);
    }
}

//disable redirect from checkout
add_filter('woocommerce_checkout_redirect_empty_cart', '__return_false');
add_filter('woocommerce_checkout_update_order_review_expired', '__return_false');

//ajax add to cart tariff from checkout page

add_action('wp_ajax_add_tariff_to_cart_request', 'add_tariff_to_cart_request');
add_action('wp_ajax_nopriv_add_tariff_to_cart_request', 'add_tariff_to_cart_request');
function add_tariff_to_cart_request()
{
    check_ajax_referer('ajax_nonce');
    WC()->cart->empty_cart();
    $productId = $_POST['tariff'];
    $product = wc_get_product($productId);
    if (! $product) {
        wp_send_json([
            'success' => 0,
            'message' => 'Tariff not found',
        ]);
        wp_die();
    }
    try {
        WC()->cart->add_to_cart($productId);
    } catch (Exception $e) {
        wp_send_json([
            'success' => 0,
            'message' => $e->getMessage(),
        ]);
        wp_die();
    }

    wp_send_json([
        'success' => 1,
        'message' => 'success',
    ]);
    wp_die();
}

add_action('wp_ajax_check_email_request', 'check_email_request');
add_action('wp_ajax_nopriv_check_email_request', 'check_email_request');
function check_email_request()
{
    check_ajax_referer('ajax_nonce');
    $email = $_POST['email'];
    if (! is_email($email)) {
        wp_send_json([
            'success' => 0,
            'message' => 'Invalid email',
        ]);
        wp_die();
    }
    if (! check_if_email_free($email)) {
        wp_send_json([
            'success' => 0,
            'message' => 'User with such email are exists',
        ]);
        wp_die();
    }
    set_keto_session('email', $email);
    wp_send_json([
        'success' => 1,
        'message' => 'Valid email',
    ]);
    wp_die();
}

function check_if_order_has_dessert_upsell(WC_Order $order)
{
    $items = $order->get_items();
    $id = get_dessert_upsell_product_id();
    foreach ($items as $item) {
        if ($item->get_product_id() == $id) {
            return true;
        }
    }

    return false;
}

function check_if_order_has_cocktail_upsell(WC_Order $order)
{
    $items = $order->get_items();
    $id = get_cocktail_upsell_product_id();
    foreach ($items as $item) {
        if ($item->get_product_id() == $id) {
            return true;
        }
    }

    return false;
}

function check_if_order_has_plan_upsell(WC_Order $order)
{
    $items = $order->get_items();
    $id = get_plan_upsell_product_id();
    foreach ($items as $item) {
        if ($item->get_product_id() == $id) {
            return true;
        }
    }

    return false;
}

function check_if_order_has_workout_product(WC_Order $order)
{
    $items = $order->get_items();
    $id = get_workout_product_id();
    foreach ($items as $item) {
        if ($item->get_product_id() == $id) {
            return true;
        }
    }

    return false;
}

function check_if_order_has_ask_coach_product(WC_Order $order)
{
    $items = $order->get_items();
    $id = get_ask_coach_upsell_product_id();
    foreach ($items as $item) {
        if ($item->get_product_id() == $id) {
            return true;
        }
    }

    return false;
}

function check_if_order_has_supplements_product(WC_Order $order)
{
    $items = $order->get_items();
    $id = get_supplements_upsell_product_id();
    foreach ($items as $item) {
        if ($item->get_product_id() == $id) {
            return true;
        }
    }

    return false;
}

function check_if_order_has_books_product(WC_Order $order)
{
    $items = $order->get_items();
    $id = get_books_upsell_product_id();
    foreach ($items as $item) {
        if ($item->get_product_id() == $id) {
            return true;
        }
    }

    return false;
}

function check_if_order_has_tariff_product(WC_Order $order)
{
    $items = $order->get_items();
    $ids = get_tariffs_ids();
    foreach ($items as $item) {
        if (in_array($item->get_product_id(), $ids)) {
            return true;
        }
    }

    return false;
}

function get_checkout_email()
{
    if (is_user_logged_in()) {
        $user = new WP_User(get_current_user_id());

        return $user->user_email;
    } else {
        return get_keto_session('email') ?? '';
    }
}

function save_email_to_session()
{
    $email = $_POST['email'];
    if ($_POST && $email) {
        $user = get_user_by('email', $email);
        if ($user) {
            return [
                'success' => false,
                'message' => 'User with such email already exists',
            ];
        }
        set_keto_session('email', $email);
        if (isset($_POST['phone'])) {
            $phone = clean_phone($_POST['phone']);
            if ($phone) {
                set_keto_session('phone', $phone);
                set_keto_session('notified', 0);
                set_keto_session('notify_time', time() + (HOUR_IN_SECONDS * 4));
            }
        }
        if (isset($_POST['first_name'])) {
            $name = $_POST['first_name'];
            set_keto_session('name', $name);
        }
        mailchimp_add_member(get_mailchimp_before_register_list(), $email);

        return true;
    } else {
        return false;
    }
}

function get_allowed_order_types()
{
    return [
        'plan',
        'workouts',
        'plan_upsell',
    ];
}

function plan_upsell_order_complete($userId = false)
{
    if (! $userId) {
        $userId = get_current_user_id();
    }
    $userKey = 'user_'.$userId;
    update_field('plan_upsell_date', time(), $userKey);
    update_field('has_plan_upsell', true, $userKey);
}

function workouts_order_complete($userId = false)
{
    if (! $userId) {
        $userId = get_current_user_id();
    }
    $userKey = 'user_'.$userId;
    update_field('workouts_access', true, $userKey);
}

function check_if_order_support_plan_update(WC_Order $order)
{
    $items = $order->get_items();
    foreach ($items as $item) {
        if (get_field('support_plan_update', $item->get_product_id())) {
            return true;
        }
    }

    return false;
}

function ask_coach_upsell_order_complete($userId = false)
{
    if (! $userId) {
        $userId = get_current_user_id();
    }
    $userKey = 'user_'.$userId;
    update_field('has_ask_coach_access', true, $userKey);
}

function supplements_upsell_order_complete($userId = false)
{
    if (! $userId) {
        $userId = get_current_user_id();
    }
    $userKey = 'user_'.$userId;
    update_field('has_supplements_access', true, $userKey);
}

function books_upsell_order_complete($userId = false)
{
    if (! $userId) {
        $userId = get_current_user_id();
    }
    $userKey = 'user_'.$userId;
    update_field('has_books_access', true, $userKey);
}