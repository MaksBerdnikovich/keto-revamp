<?php $upsell = has_user_plan_upsell() ?>
<div class="dashboard-container">
    <div class="dashboard-box" id="main">
        <div class="profile-box">
            <img class="nutritionist-icon" alt="nutritionist"
                 src="<?php echo get_image_url('dashboard/nutritionist.svg') ?>"/>
            <p class="mb-20">
                Your meal plan is currently being custom curated by our nutritionists.<br>Please check back within
                <?php echo $upsell ? '30 minutes' : '24 hours' ?>
            </p>
            <?php if (! $upsell): ?>
                <p class="mb-20">
                    Need your meal plan urgently? Click below to have our nutritionists rush and prepare your meal plan
                    right now.
                </p>

                <p>
                    <a class="underline" href="<?php echo get_upsell_plan_url() ?>">Click Here For Rush Delivery For An
                        Additional $5.00</a>
                </p>
            <?php endif; ?>
        </div>
    </div>
</div>