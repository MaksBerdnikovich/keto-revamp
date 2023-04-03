<?php
/**
 * Template Name: Upsell Dessert
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header('upsell');
?>

    <div class="upsellBox upBox2">
        <div class="upBox-head">
            <p class="upbx-hdtxt1">Wait! Do You Have<br class="forMob"> A Sweet Tooth?</p>
            <p class="upbx-hdtxt2">We Have The Healthiest Keto<br class="forMob"> Desserts For You!</p>
        </div>
        <p class="upbx-pra1">The best part about the Keto Program is that it lets you succeed with your<br
                    class="forDesk"> weight loss & health goals in a tasty way! Our dieticians have curated a list of
            delicious desserts<br class="forDesk"> that you can enjoy while you follow the keto program!</p>

        <div class="meal-plans">
            <div class="meal-plan">
                <img src="<?php echo get_image_url('upsell/meal-item1.jpg') ?>">
                <p>Keto<br>Cheesecake</p>
            </div>
            <div class="meal-plan">
                <img src="<?php echo get_image_url('upsell/meal-item2.jpg') ?>">
                <p>Keto Brown Butter<br>Pralines</p>
            </div>
            <div class="meal-plan">
                <img src="<?php echo get_image_url('upsell/meal-item3.jpg') ?>">
                <p>Keto Chocolate<br>Mousse</p>
            </div>
            <div class="meal-plan">
                <img src="<?php echo get_image_url('upsell/meal-item4.jpg') ?>">
                <p>Keto<br>Cheesecake Fluff</p>
            </div>
            <div class="meal-plan hide-mob">
                <img src="<?php echo get_image_url('upsell/meal-item5.jpg') ?>">
                <p>Keto<br>Mug Cake</p>
            </div>
        </div>

        <div class="upBox-Offer">
            <div class="upoffer-hd">
                <p>Add Keto Desserts<br class="forMob"> To Your Meal Plan</p>
            </div>

            <div class="offerMid">
                <div class="prcBox">
                    <div class="prcBox-lft">
                        <p class="prc-catgry">Regular<br>Price:</p>
                        <p class="prc-txt1"><span><img
                                        src="<?php echo get_image_url('upsell/red-cut.png') ?>"> $16</span></p>
                    </div>
                    <div class="prcBox-rgt">
                        <p class="prc-catgry prc-colr">Special<br>Price:</p>
                        <p class="prc-txt2">$5</p>
                    </div>
                </div>

                <p class="offer-count">This Offer Expires In <span id="stopwatch">05:00</span></p>
                <div class="clearall"></div>
                <a href="<?php echo do_shortcode('[mwb_upsell_yes]') ?>" class="order-btn pulse">Yes! I Love Desserts</a>
                <ul class="offr-list">
                    <li>No Subscription</li>
                    <li>No Hidden Fees</li>
                    <li>No Contracts</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="clearall"></div>
    <a href="<?php echo do_shortcode('[mwb_upsell_no]') ?>" class="no-thanks"><img src="<?php echo get_image_url('upsell/nothnk-cross.png') ?>" alt="">
        No thanks, I don't like desserts</a>

<?php get_footer('upsell');