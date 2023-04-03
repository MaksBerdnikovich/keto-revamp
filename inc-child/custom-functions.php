<?php

function get_current_url(){
    global $wp;

    return home_url($wp->request);
}

function get_url_by_slug ($slug){
    return get_permalink( get_page_by_path( $slug) );
}

function get_url_by_id ($id){
    return get_permalink( $id );
}

function get_quiz_type(){
    return $_GET['quiz_type'] ?? 'm';
}

function get_quiz_id ($str){
    return str_replace([' ', '’'], '_', mb_strtolower($str));
}

function is_quiz_tpl() {
    return is_page_template('template-quiz.php');
}

function is_home_video_tpl() {
    return is_page_template('template-home-video.php');
}

function is_home_landing_tpl() {
    return is_page_template('template-home-landing.php');
}

function is_summary_tpl($param = '') {
    if ($param == 'v1') {
        return is_page_template('template-summary-v1.php');
    }

    if ($param == 'v2') {
        return is_page_template('template-summary-v2.php');
    }

    return is_page_template('template-summary-v1.php') || is_page_template('template-summary-v2.php');
}

function is_default_tpl() {
    return !is_quiz_tpl() && !is_home_landing_tpl() && !is_single_page_tpl();
}

function is_checkout_tpl() {
    return
        is_page_template('template-upsell-plan.php') ||
        is_page_template('template-checkout-v1.php');
}

function is_emails_tpl() {
    return
        is_page_template('template-email-v1.php') ||
        is_page_template('template-login.php') ||
        is_page_template('template-reset-password.php') ||
        is_page_template('template-verify-email.php') ||
        is_page_template('template-dashboard-contact.php');
}

function is_upsell_tpl() {
    return
        is_page_template('template-upsell-plan.php') ||
        is_page_template('template-upsell-noauth-plan-v1.php') ||
        is_page_template('template-upsell-noauth-plan-v2.php') ||
        is_page_template('template-upsell-noauth-plan-v3.php') ||
        is_page_template('template-upsell-noauth-plan-v4.php');
}

function is_single_page_tpl() {
    return
        is_page_template('template-privacy.php') ||
        is_page_template('template-terms-conditions.php') ||
        is_404();
}

function get_main_menu() {
    if (is_user_logged_in()) {
        wp_nav_menu([
            'theme_location'  => 'primary-logged',
            'container_class' => 'collapse navbar-collapse',
            'container_id'    => 'navbarNavDropdown',
            'menu_class'      => 'navbar-nav ml-auto',
            'fallback_cb'     => '',
            'menu_id'         => 'main-menu',
            'depth'           => 2,
            'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
        ]);
    } else {
        wp_nav_menu([
            'theme_location'  => 'primary',
            'container_class' => 'collapse navbar-collapse',
            'container_id'    => 'navbarNavDropdown',
            'menu_class'      => 'navbar-nav ml-auto',
            'fallback_cb'     => '',
            'menu_id'         => 'main-menu',
            'depth'           => 2,
            'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
        ]);
    }
}

function get_image_url($name)
{
    return get_stylesheet_directory_uri() . '/dist/images/' . $name;
}

function get_pdf_url($name)
{
    return get_stylesheet_directory_uri() . '/dist/pdf/' . $name;
}

function render_dashboard_menu($type = '')
{
    $menuLocations = get_nav_menu_locations();
    $menuID = $menuLocations['primary-logged'];
    $primaryNav = wp_get_nav_menu_items($menuID);
    get_template_part('template-parts/dashboard-menu', $type, ['items' => $primaryNav]);
}

function render_footer_menu($type = '')
{
    $menuLocations = get_nav_menu_locations();
    if (array_key_exists('footer', $menuLocations)) {
        $menuID = $menuLocations['footer'];
        $nav = wp_get_nav_menu_items($menuID);
        get_template_part('template-parts/footer-menu', $type, ['items' => $nav]);
    }
}

function get_post_id_by_meta_key_and_value($key, $value)
{
    global $wpdb;
    $meta = $wpdb->get_results($wpdb->prepare("SELECT * FROM `" . $wpdb->postmeta . "` WHERE meta_key='%s' AND meta_value='%s'", $key, $value));
    if (is_array($meta) && ! empty($meta) && isset($meta[0])) {
        $meta = $meta[0];
    }
    if (is_object($meta)) {
        return $meta->post_id;
    } else {
        return false;
    }
}

function get_stripe_secret_key()
{
    /** @var \WC_Payment_Gateway $payment_gateway */
    $payment_gateway = WC()->payment_gateways->payment_gateways()['mwb-wocuf-pro-stripe-gateway'];
    $test = $payment_gateway->get_option('testmode');
    if ($test) {
        return $payment_gateway->get_option('test_secret_key');
    } else {
        return $payment_gateway->get_option('live_secret_key');
    }
}

/**
 * @return \Carbon\Carbon
 */
function carbon_now()
{
    return \Carbon\Carbon::now();
}

/**
 * @param $parse
 * @return \Carbon\Carbon
 */
function carbon_parse($parse)
{
    return \Carbon\Carbon::parse($parse);
}

/**
 * @param $t
 * @return \Carbon\Carbon
 */
function carbon_from_timestamp($t)
{
    return \Carbon\Carbon::createFromTimestamp($t);
}

function check_if_session_email_free()
{
    $email = get_keto_session('email');
    if (! $email) {
        return false;
    }

    return check_if_email_free($email);
}

function check_if_email_free($email)
{
    $user = get_user_by('email', $email);
    if ($user) {
        return false;
    }

    return true;
}

function check_if_quiz_data_exists()
{
    $quizData = get_keto_session('quiz_data');
    if (is_array($quizData)) {
        return true;
    }

    return false;
}