<?php
/**
 * Template Name: Checkout V1
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (is_checkout() && empty(is_wc_endpoint_url('order-received'))) {
    {
        if (isset($_GET['code'])) {
            set_keto_session_uuid($_GET['code']);
            wp_redirect(get_current_url());
            exit();
        }
    }

    if (is_user_logged_in() && has_user_premium()) {
        wp_redirect(get_my_plan_url());
        exit();
    }

    if (! check_if_quiz_data_exists()) {
        wp_redirect(home_url());
        exit();
    }

    if (! check_if_session_email_free()) {
        wp_redirect(get_email_url());
        exit();
    }

    $tariffsCollection = get_random_tariffs_collection();
    WC()->cart->empty_cart();
    try {
        WC()->cart->add_to_cart(get_default_tariff_id($tariffsCollection));
    } catch (Exception $e) {
    }
}

get_header();

?>

<?php while (have_posts()) : the_post();
    the_content();
endwhile; ?>

<?php get_footer(); ?>
