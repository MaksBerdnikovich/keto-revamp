<?php
/**
 * Template Name: Workouts
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (! is_user_logged_in()) {
    wp_redirect(home_url());
    exit();
}

if ($_POST['action'] == 'pay') {
    $payment = create_workouts_oder_with_stripe_payment();
}

if (!has_user_workouts_access() && !can_user_payment_with_stripe()) {
    define( 'WOOCOMMERCE_CHECKOUT', true );
    WC()->cart->empty_cart();
    try {
        WC()->cart->add_to_cart(get_workout_product_id());
    } catch (Exception $e) {
    }
}

get_header('dashboard');
?>
<?php if (has_user_workouts_access()): ?>
    <?php get_template_part('loop-templates/content', 'workouts'); ?>
<?php else: ?>
    <?php get_template_part('loop-templates/content', 'workouts-payment'); ?>
<?php endif ?>
<?php get_footer('dashboard'); ?>
