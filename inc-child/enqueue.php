<?php
/**
 * Understrap enqueue scripts
 *
 * @package understrap
 */

// Exit if accessed directly.

defined('ABSPATH') || exit;

add_action('wp_enqueue_scripts', 'understrap_remove_scripts', 20);
function understrap_remove_scripts()
{
    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
    wp_dequeue_style('understrap-styles');
    wp_deregister_style('understrap-styles');

    wp_dequeue_script('understrap-scripts');
    wp_deregister_script('understrap-scripts');
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    // Get the theme data
    $the_theme = wp_get_theme();

    // Deregister default jquery
    wp_deregister_script('jquery-core');
    wp_deregister_script('jquery');

    // Register jquery last version
    wp_register_script('jquery-core', get_stylesheet_directory_uri() . '/dist/js/common/jquery.min.js', false, null, true);
    wp_register_script('jquery', false, array('jquery-core'), null, true);

    // Register common style/script
    wp_register_style('owl-carousel', get_stylesheet_directory_uri() . '/dist/css/common/owl.carousel.min.css');
    wp_register_script('owl-carousel', get_stylesheet_directory_uri() . '/dist/js/common/owl.carousel.min.js', false, null, true);
    wp_register_style('roundslider', get_stylesheet_directory_uri() . '/dist/css/common/roundslider.min.css');
    wp_register_script('roundslider', get_stylesheet_directory_uri() . '/dist/js/common/roundslider.min.js', false, null, true);
    wp_register_script('validator', get_stylesheet_directory_uri() . '/dist/js/common/validator.min.js', false, null, true);
    wp_register_script('countdown', get_stylesheet_directory_uri() . '/dist/js/common/jquery.countdown.min.js', false, null, true);
    wp_register_style('selectric', get_stylesheet_directory_uri() . '/dist/css/common/selectric.css', [], $the_theme->get('Version'));
    wp_register_script('selectric', get_stylesheet_directory_uri() . '/dist/js/common/jquery.selectric.min.js', [], $the_theme->get('Version'), true);
    wp_register_style('datepicker', get_stylesheet_directory_uri() . '/dist/css/common/datepicker.min.css', [], $the_theme->get('Version'));
    wp_register_script('datepicker', get_stylesheet_directory_uri() . '/dist/js/common/datepicker.min.js', [], $the_theme->get('Version'), true);
    wp_register_script('canvas', get_stylesheet_directory_uri() . '/dist/js/common/canvas.min.js', [], $the_theme->get('Version'), true);
    wp_register_script('popper', get_stylesheet_directory_uri() . '/dist/js/common/popper.min.js', [], $the_theme->get('Version'), true);
    wp_register_style('tooltip', get_stylesheet_directory_uri() . '/dist/css/common/tippy.css', [], $the_theme->get('Version'));
    wp_register_script('tooltip', get_stylesheet_directory_uri() . '/dist/js/common/tippy.umd.js', [], $the_theme->get('Version'), true);

    // Register theme style/script
    wp_register_script('quiz-script', get_stylesheet_directory_uri() . '/dist/js/quiz.js', [], $the_theme->get('Version'), true);
    wp_register_script('summary-script', get_stylesheet_directory_uri() . '/dist/js/summary.js', [], $the_theme->get('Version'), true);
    wp_register_script('email-script', get_stylesheet_directory_uri() . '/dist/js/email.js', [], $the_theme->get('Version'), true);
    wp_register_script('checkout-script', get_stylesheet_directory_uri() . '/dist/js/checkout.js', [], $the_theme->get('Version'), true);
    wp_register_script('upsell-script', get_stylesheet_directory_uri() . '/dist/js/upsell.js', [], $the_theme->get('Version'), true);
    wp_register_script('graph-script', get_stylesheet_directory_uri() . '/dist/js/graph.js', [], $the_theme->get('Version'), true);
    wp_register_script('profile-redirect', get_stylesheet_directory_uri() . '/dist/js/profile-redirect.js', [], $the_theme->get('Version'), true);
    wp_register_script('my-plan-script', get_stylesheet_directory_uri() . '/dist/js/my-plan.js', [], $the_theme->get('Version'), true);
    wp_register_script('progress-script', get_stylesheet_directory_uri() . '/dist/js/progress.js', [], $the_theme->get('Version'), true);
    wp_register_script('profile-script', get_stylesheet_directory_uri() . '/dist/js/profile.js', [], $the_theme->get('Version'), true);

    // Enqueue default style/script
    wp_enqueue_style('stylesheet', get_stylesheet_directory_uri() . '/dist/css/style.css', [], $the_theme->get('Version'));
    wp_enqueue_script('functions', get_stylesheet_directory_uri() . '/dist/js/functions.js', [], $the_theme->get('Version'), true);
    wp_enqueue_style('fancybox', get_stylesheet_directory_uri() . '/dist/css/common/fancybox.css', [], $the_theme->get('Version'));
    wp_enqueue_script('fancybox', get_stylesheet_directory_uri() . '/dist/js/common/fancybox.umd.js', [], $the_theme->get('Version'), true);

    // Enqueue quiz style/script
    if (is_quiz_tpl()) {
        wp_enqueue_style('owl-carousel');
        wp_enqueue_script('owl-carousel');
        wp_enqueue_style('datepicker');
        wp_enqueue_script('datepicker');
        wp_enqueue_script('quiz-script');
    }

    // Enqueue summary style/script
    if (is_summary_tpl()) {
        wp_enqueue_style('roundslider');
        wp_enqueue_script('roundslider');
        wp_enqueue_script('countdown');
        wp_enqueue_script('canvas');
        wp_enqueue_script('graph-script');
        wp_enqueue_script('summary-script');
    }

    // Enqueue emails style/script
    if (is_emails_tpl()) {
        wp_enqueue_script('validator');
        wp_enqueue_script('email-script');
    }

    // Enqueue checkout style/script
    if (is_checkout_tpl()) {
        wp_enqueue_script('checkout-script');
    }
    if (is_checkout() && !empty(is_wc_endpoint_url('order-received'))) {
        $orderId = get_post_id_by_meta_key_and_value('_order_key', $_GET['key']);
        $orderType = get_post_meta($orderId, 'order_type', true);
        if ($orderType == 'workouts') {
            $url = get_workouts_url();
        }
        else {
            $url = get_my_plan_url();
        }
        wp_localize_script('jquery', 'Links', ['plan' => $url,]);
        wp_enqueue_script('profile-redirect');
    }

    // Enqueue upsell style/script
    if (is_upsell_tpl()) {
        wp_enqueue_script('countdown');
        wp_enqueue_script('upsell-script');
    }

    if (is_page_template('template-my-plan.php')) {
        wp_enqueue_script('canvas');
        wp_enqueue_script('graph-script');
        wp_enqueue_script('my-plan-script');
    }

    if (is_page_template('template-profile.php')) {
        wp_enqueue_style('selectric');
        wp_enqueue_script('selectric');
        wp_enqueue_style('tooltip');
        wp_enqueue_script('popper');
        wp_enqueue_script('tooltip');
        wp_enqueue_script('profile-script');
    }

    if (is_page_template('template-dashboard-measurements.php')) {
        wp_enqueue_style('datepicker');
        wp_enqueue_script('datepicker');
        wp_enqueue_script('progress-script');
    }

    wp_localize_script('jquery', 'ajax', [
        'nonce' => wp_create_nonce('ajax_nonce'),
        'url' => admin_url('admin-ajax.php'),
    ]);
}
