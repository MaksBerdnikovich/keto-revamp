<?php
if (is_page_template('template-checkout-v1.php')) {
    get_template_part('template-parts/checkout-form-v1');
} elseif(is_page_template('template-checkout-v2.php')) {
    get_template_part('template-parts/checkout-form-v2');
} elseif (is_page_template('template-workouts.php')) {
    get_template_part('template-parts/checkout-form-workouts');
}elseif (is_page_template('template-upsell-plan.php')) {
    get_template_part('template-parts/checkout-form-plan-upsell');
}