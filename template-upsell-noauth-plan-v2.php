<?php
/**
 * Template Name: Upsell Noauth Plan V2
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>

<div class="upsell v2">
    <div class="container offset">
        <div class="upsell-section section">
            <div class="page-title m-bottom-1">
                <div class="title-h3">Welcome To Your Keto Revamp Portal</div>
                <div class="title-h3">Please Choose Your Custom Options</div>
            </div>
            <div class="upsell-alert width-420 m-bottom-2">
                <i class="icon-info"></i>
                <p>Do Not Close This Window – It May Cause<br/> Your Account To Be Deleted</p>
            </div>
            <div class="page-title m-bottom-1">
                <div class="title-h6">Activate Your 1 Month FREE Online Coaching</div>
            </div>
            <div class="video m-bottom-2">
                <iframe src="//player.vimeo.com/video/662500198?title=0&byline=0&portrait=0&badge=0"
                        width="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen>
                </iframe>
            </div>
            <div class="page-title m-bottom-1">
                <div class="title-h3">Just Use The Button Below</div>
                <div class="title-h3 primary-color">To Activate Your FREE 30 Days</div>
            </div>
            <div class="upsell-alert width-520 m-bottom-2">
                <i class="icon-info"></i>
                <p>
                    <b class="danger-color">Because Of Limited Space:</b>
                    If You Do Not To Activate Your Free Online Coaching,
                    Your Spot Will Be Given To Someone Else
                </p>
            </div>
            <div class="upsell-price m-bottom-2">
                <span class="strikeout">was $70</span>
                <span class="title-h2 primary-color">$0</span>
                <span>today only</span>
            </div>
            <div class="upsell-agree m-bottom-1">
                <div class="checkbox-group">
                    <input type="checkbox" checked="checked" name="order_product">
                    <span class="checker"></span>
                    <span class="label"><b>I agree to the terms of this product.</b></span>
                </div>
                <div class="text">
                    Terms: My Coaching will be free for 30 days, after which<br/>
                    I will be charged $29.95 per month, which can be cancelled at any time.
                </div>
            </div>
            <div class="fl-centered">
                <a href="<?php echo do_shortcode('[mwb_upsell_yes]') ?>"
                   class="upsell-order-btn btn btn-primary btn-solid btn-xlarge">Add to order</a>
            </div>
        </div>

        <div class="upsell-section section">
            <div class="fl-centered fl-column m-bottom-2">
                <b>No thanks, Olivia.</b>
                <p>I understand your Online Coaching is not available for free anywhere else.</p>
            </div>
            <div class="fl-centered">
                <p>
                    Despite the fact that this is the fastest and easiest way to guarantee the best results
                    with my Custom meal plan, I would prefer to do it by myself.
                </p>
            </div>
            <div class="fl-centered">
                <a href="<?php echo do_shortcode('[mwb_upsell_no]') ?>" class="upsell-no-thanks-btn danger-color">
                    I’ll pass on the free coaching
                </a>
            </div>
        </div>

        <div class="upsell-section section">
            <div class="upsell-guarantee">
                <div class="upsell-guarantee__image">
                    <img src="<?=get_image_url('/landing/keto-plan/1.png')?>" alt="guarantee" />
                </div>
                <div class="upsell-guarantee__list">
                    <ul>
                        <li><a href="javascript:void(0)">Cancel Anytime</a></li>
                        <li><a href="javascript:void(0)">Satisfaction Guaranteed</a></li>
                        <li><a href="javascript:void(0)">No Contract</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="upsell-modal" id="upsellModalV2" style="display: none;">
    <div class="upsell-modal__wrap section">
        <div class="page-title m-bottom-1">
            <div class="title-h3">wait! do not leave this page!</div>
            <div class="title-h3 primary-color">it will cause errors with your order</div>
        </div>
        <div class="upsell-alert m-bottom-1_5">
            <i class="icon-info"></i>
            <p>
                Do not hit the back button or close your browser.
                <b>Click "FINISH READING THIS PAGE"</b>
                below and make your selection on this page.
            </p>
        </div>
        <div class="upsell-modal__btn">
            <button class="btn btn-solid btn-primary btn-xlarge set-cookie">Finish reading this page</button>
        </div>
    </div>
</div>

<?php get_footer();