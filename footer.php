<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$is_footer = false;
if (is_home_video_tpl() || is_home_landing_tpl() || is_summary_tpl('v2') || is_checkout_tpl() || is_upsell_tpl()) {
    $is_footer = true;
}

?>

</div><!--Wrapper end-->

<?php if (!is_home_landing_tpl() && !is_single_page_tpl()): ?>
<div class="back-image image--bottom-left <?php if ($is_footer):?>with-footer<?php endif;?>">
    <img src="<?= get_image_url( 'bg/bottom-left.png') ?>" alt="background" />
</div>
<div class="back-image image--bottom-right <?php if ($is_footer):?>with-footer<?php endif;?>">
    <img src="<?= get_image_url( 'bg/bottom-right.png') ?>" alt="background" />
</div>
<?php endif; ?>

<?php if ($is_footer): ?>
<footer class="footer"><!--Footer start-->
    <div class="container">
        <div class="footer-wrap">
            <div class="footer-nav">
                <div class="footer-nav__logo">
                    <a href="/"><img src="<?=get_image_url('logo/logo.svg')?>" alt="logo" /></a>
                </div>
                <div class="footer-nav__menu">
                    <?php render_footer_menu(); ?>
                </div>
            </div>
            <div class="footer-copy">
                <p>
                    <span>© <?= date('Y') ?> KetoRevamp LLC. All rights reserved.</span>
                    *Statements regarding your profile and the results of our quiz have not been evaluated by the Food and
                    Drug Administration. This product is not intended to diagnose, treat, cure or prevent any disease. You
                    should consult with a medical professional before starting any diet or weight loss program. Individual
                    results may vary, and testimonials are not claimed to represent typical results. All testimonials are by
                    real people, and may not reflect the typical purchaser’s experience, and are not intended to represent
                    or guarantee that anyone will achieve the same or similar results.
                </p>
            </div>
        </div>
    </div>
</footer><!--Footer end-->
<?php endif; ?>

<?php if (is_single_page_tpl()): ?>
    <footer class="footer footer-single-page"><!--Footer start-->
        <div class="container">
            <div class="footer-db__menu">
                <?php render_footer_menu(); ?>
            </div>
        </div>
    </footer><!--Footer end-->
<?php endif; ?>

</main>
<?php wp_footer(); ?>
</body>
</html>

