<div class="dashboard-container">
    <div class="dashboard-box dashboard-box-inr">
        <?php if (has_user_workouts_access()): ?>
            <?php if (isset($_GET['w']) && isset($_GET['d'])): ?>
                <?php get_template_part('template-parts/workout-day'); ?>
            <?php else: ?>
                <?php get_template_part('template-parts/workouts-list'); ?>
            <?php endif ?>
        <?php else: ?>
            <div class="profile-header">
                <h2 class="dashboard-title">Pay $19.99 to get access to this section</h2>
            </div>
            <div class="profile-box">
                <?php if (isset($payment) && !$payment): ?>
                    <p>Error</p>
                <?php endif; ?>
                <?php if (can_user_payment_with_stripe()): ?>
                    <form method="post" action="<?php get_current_url() ?>">
                        <input type="hidden" name="action" value="pay">
                        <button type="submit" class="order-btn pulse">Yes! Rush My Plan</button>
                    </form>
                <?php else: ?>
                    <?php echo do_shortcode('[woocommerce_checkout]') ?>
                <?php endif; ?>
            </div>
        <?php endif ?>
    </div>
</div>