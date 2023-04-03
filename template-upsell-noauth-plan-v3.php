<?php
/**
 * Template Name: Upsell Noauth Plan V3
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>

<div class="upsell v3">
    <div class="container offset">
        <div class="upsell-section section">
            <div class="upsell-alert centered width-100 m-bottom-1_5">
                <i class="icon-info"></i>
                <p>Do Not Close This Window – It May Cause Your Account To Be Deleted</p>
            </div>

            <div class="page-title m-bottom-1_5">
                <div class="title-h3">
                    Please Watch This Important Video That Shows You How You Can Lose Fat Up<br/> To 237% Faster
                </div>
            </div>

            <div class="video m-bottom-1_5">
                <iframe id="vimeoFrame" width="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>

            <div class="upsell-alert centered width-100">
                <i class="icon-info"></i>
                <p>
                    <b class="danger-color">Very important</b>
                    Be Sure You Watch The Entire Video To Learn How To Lose Weight Up To 237%
                </p>
            </div>

            <div id="showAfterVideo" style="display: none;">
                <div class="page-title m-top-2 m-bottom-1_5">
                    <div class="title-h3"><span class="primary-color">Get FREE SHIPPING</span> <br/>With Your Selection today</div>
                </div>

                <div class="upsell-shipping grid m-bottom-3">
                    <div class="grid-row">
                        <div class="grid-col col-33">
                            <div class="upsell-shipping__item panel">
                                <div class="upsell-shipping__name">1 Bottle</div>
                                <div class="upsell-shipping__image">
                                    <img src="<?=get_image_url('/upsell/1bottle.png')?>" alt="1 Bottle" />
                                </div>
                                <div class="upsell-shipping__one"><b>$69</b> / Bottle</div>
                                <div class="upsell-shipping__total">Total: <span class="strikeout">$139.99</span></div>
                                <div class="upsell-shipping__price">Your price <span class="title-h3">$69</span></div>
                                <div class="upsell-shipping__btn">
                                    <a href="<?php echo do_shortcode('[mwb_upsell_yes]') ?>"
                                       class="upsell-order-btn btn btn-primary btn-solid btn-large">Add to order</a>
                                </div>
                            </div>
                        </div>
                        <div class="grid-col col-33">
                            <div class="upsell-shipping__label">BEST VALUE!</div>
                            <div class="upsell-shipping__item panel best">
                                <div class="upsell-shipping__name">6 Bottle</div>
                                <div class="upsell-shipping__image">
                                    <img src="<?=get_image_url('/upsell/6bottles.png')?>" alt="6 Bottle" />
                                    <span class="upsell-shipping__image-badge">Save 65%</span>
                                </div>
                                <div class="upsell-shipping__one"><b>$25</b> / Bottle</div>
                                <div class="upsell-shipping__total">Total: <span class="strikeout">$839.94</span></div>
                                <div class="upsell-shipping__price">Your price <span class="title-h3">$150</span></div>
                                <div class="upsell-shipping__btn">
                                    <a href="<?php echo do_shortcode('[mwb_upsell_yes]') ?>"
                                       class="upsell-order-btn btn btn-primary btn-solid btn-large">Add to order</a>
                                </div>
                            </div>
                        </div>
                        <div class="grid-col col-33">
                            <div class="upsell-shipping__label">Most popular</div>
                            <div class="upsell-shipping__item panel best">
                                <div class="upsell-shipping__name">3 Bottle</div>
                                <div class="upsell-shipping__image">
                                    <img src="<?=get_image_url('/upsell/3bottles.png')?>" alt="3 Bottle" />
                                    <span class="upsell-shipping__image-badge">Save 45%</span>
                                </div>
                                <div class="upsell-shipping__one"><b>$33</b> / Bottle</div>
                                <div class="upsell-shipping__total">Total: <span class="strikeout">$419.97</span></div>
                                <div class="upsell-shipping__price">Your price <span class="title-h3">$99</span></div>
                                <div class="upsell-shipping__btn">
                                    <a href="<?php echo do_shortcode('[mwb_upsell_yes]') ?>"
                                       class="upsell-order-btn btn btn-primary btn-solid btn-large">Add to order</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="page-title m-top-2 m-bottom-1_5">
                    <div class="title-h3"><span class="primary-color">Includes A 60 Day Money Back</span> <br/>Satisfaction Guarantee!</div>
                </div>

                <div class="fl-column fl-centered">
                    <p>
                        No Thank you. I realize today is my only opportunity to take advantage of today's INCREDIBLE
                        keto fat burning discounts. I understand that these special discount packages of the Keto
                        MicroBio supplement found on this page can only be obtained by today's customers and will not be
                        offered again.
                    </p>
                    <a href="<?php echo do_shortcode('[mwb_upsell_no]') ?>" class="upsell-no-thanks-btn primary-color">
                        This is an opportunity that I will never get again and I’m okay with that.
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="upsell-modal" id="upsellModalV3" style="display: none;">
    <div class="upsell-modal__wrap section">
        <div class="page-title capitalize m-bottom-1">
            <div class="title-h3">
                <span class="show-before">Wait, this is too important</span>
                <span class="show-after danger-color" style="display: none">Wait, This Is Much Too Important</span><br/>
                <span class="primary-color">Bye 1, get 3 Free</span>
            </div>
        </div>
        <div class="upsell-modal__special m-bottom-2_5">
            <div class="upsell-modal__special-img m-bottom-1_5">
                <i><img src="<?=get_image_url('/upsell/1bottle.png')?>" alt="1 Bottle" /></i>
                <b class="plus">+</b>
                <i><img src="<?=get_image_url('/upsell/3bottles.png')?>" alt="3 Bottle" /></i>
            </div>
            <div class="upsell-modal__special-price m-bottom-1">
                <div class="regular">Regular Price: <span class="strikeout">$139.99</span></div>
                <div class="instant">Instant Savings: $490.99</div>
                <div class="total">Your price: <span class="primary-color">$69</span></div>
            </div>
            <div class="upsell-modal__btn">
                <button class="btn btn-solid btn-primary btn-xlarge set-cookie">
                    Yes! I want This Special Added<br/> to My Order
                </button>
            </div>
        </div>
        <div class="upsell-alert width-100 centered m-bottom-2">
            <i class="icon-info"></i>
            <p class="show-before">Disclaimer: New BioSlim customers only. Limit 1 order per customer</p>
            <p class="show-after danger-color" style="display: none;">Disclaimer: New Keto MicroBio customers only. Limit 1 order per customer</p>
        </div>
        <div class="page-title capitalize">
            <div class="title-h3">100% Money-Back <span class="primary-color">Guarantee!</span></div>
        </div>
        <div class="upsell-modal__text-change m-top-2">
            <a href="javascript:void(0)" class="danger-color">
                No thanks,<br/>I understand that I won't see This offer again
            </a>
        </div>
    </div>
</div>

<?php get_footer();