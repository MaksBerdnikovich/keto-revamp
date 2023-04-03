<?php
/**
 * Template Name: Upsell Cocktail
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header('upsell');
?>

    <div class="upsellBox upBox2">
        <div class="upBox-head">
            <p class="upbx-hdtxt1">Wait! Do You Like<br class="forMob"> Happy Hour?</p>
            <p class="upbx-hdtxt2">We Even Have Keto Cocktails<br class="forMob"> For You!</p>
        </div>
        <p class="upbx-pra1">Alcoholic Beverages can be FULL of carbs and can completely break your body's<br
                    class="forDesk"> Ketosis process. Our plan can include some incredible cocktail recipes that are
            completely<br class="forDesk"> Keto friendly, so you can party on while staying healthy. </p>

        <div class="meal-plans">
            <div class="meal-plan">
                <img src="<?php echo get_image_url('upsell/meal-item6.jpg') ?>">
                <p>Keto<br>Margarita</p>
            </div>
            <div class="meal-plan">
                <img src="<?php echo get_image_url('upsell/meal-item7.jpg') ?>">
                <p>Keto Ginger Lime<br>Mojito</p>
            </div>
            <div class="meal-plan">
                <img src="<?php echo get_image_url('upsell/meal-item8.jpg') ?>">
                <p>Keto Blackberry<br>Bramble</p>
            </div>
            <div class="meal-plan">
                <img src="<?php echo get_image_url('upsell/meal-item9.jpg') ?>">
                <p>Keto Sparkling<br>Sunrise</p>
            </div>
            <div class="meal-plan hide-mob">
                <img src="<?php echo get_image_url('upsell/meal-item10.jpg') ?>">
                <p>Keto<br>Bloody Mary</p>
            </div>
        </div>

        <div class="upBox-Offer">
            <div class="upoffer-hd">
                <p>Add Keto Cocktails<br class="forMob"> To Your Meal Plan</p>
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
                <a href="<?php echo do_shortcode('[mwb_upsell_yes]') ?>" class="order-btn pulse">Yes! I Need My Happy
                    Hour!</a>
                <ul class="offr-list">
                    <li>No Subscription</li>
                    <li>No Hidden Fees</li>
                    <li>No Contracts</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="clearall"></div>
    <a href="<?php echo do_shortcode('[mwb_upsell_no]') ?>" class="no-thanks"><img
                src="<?php echo get_image_url('upsell/nothnk-cross.png') ?>" alt=""> No, I don't want any Keto
        Cocktails! </a>

<?php get_footer('upsell');