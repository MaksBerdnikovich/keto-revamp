<?php
/**
 * Template Name: Upsell Noauth Plan V4
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

//$books = [1,2,3,4,5,6,7,8,9,10,11];

get_header();
?>

<div class="upsell v4">
    <div class="container">
        <div class="upsell-section section">
            <div class="page-title m-bottom-1">
                <div class="title-h3">Welcome To Your Keto Revamp Portal</div>
                <div class="title-h3">Please Choose Your Custom Options</div>
            </div>

            <div class="upsell-alert centered width-620 m-bottom-1_5">
                <i class="icon-info"></i>
                <p>Do not close this window – it may cause your Account to be deleted</p>
            </div>

            <div class="video m-bottom-1_5">
                <iframe id="vimeoFrame" src="//player.vimeo.com/video/662599744?title=0&byline=0&portrait=0&badge=0"
                        width="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen>
                </iframe>
            </div>

            <div class="upsell-alert centered width-620 m-bottom-2">
                <i class="icon-info"></i>
                <p>Please Watch The Entire Video To Discover How To Lose Weight Up To 10 Times Faster</p>
            </div>

            <div class="upsell-prices m-bottom-2">
                <ul>
                    <li>
                        <b>Retail<br/> Price</b> <span class="title-h3 strikeout">$208.89</span>
                    </li>
                    <li>
                        <b><span class="primary-color">Limited Time Offer</span> <br/>New Customers Only</b>
                        <span class="title-h3 success-color">$49</span>
                    </li>
                </ul>
            </div>

            <div class="fl-centered m-bottom-3">
                <a href="<?php echo do_shortcode('[mwb_upsell_yes]') ?>" class="upsell-order-btn btn btn-primary btn-solid btn-xlarge">
                    Yes, Olivia, please give me tasty<br/> fat burning recipes
                </a>
            </div>

            <div class="page-title m-bottom-1_5">
                <div class="title-h3">100% Money-Back <span class="primary-color">Guarantee!</span></div>
            </div>

            <div class="fl-centered">
                <img class="no-crop" src="<?=get_image_url('/upsell/pays.png')?>" alt="payments" />
            </div>

            <div class="upsell-separator"></div>

            <div class="fl-column fl-centered">
                <p class="text width-80">
                    No thanks Olivia. I understand that the Keto Revamp Dessert Recipe Collection sells for $208.89 on
                    your main website,
                    and I cannot find this limited-time $49 offer anywhere else for easy, delicious, fat-burning
                    recipes. I'm willing to gamble with my cravings.
                </p>
                <a href="<?php echo do_shortcode('[mwb_upsell_no]') ?>" class="upsell-no-thanks-btn danger-color">I'll pass.</a>
            </div>
        </div>

        <div class="upsell-section section">
            <div class="page-title m-bottom-2 tx-capitalize">
                <div class="title-h3">It's never been easier or more <br/>delicious to lose weight!</div>
            </div>

            <div class="page-text tx-repeat">
                <p>
                    A lot of people are under the impression that they will have to give up their favorite foods when
                    they start the keto diet (especially desserts and snacks).
                </p>
                <p>
                    That is not true at all, you just have to know how to make them.
                </p>
                <p>
                    It was for this reason that I created keto versions of your favorite desserts, cookies, snacks, and
                    treats.
                </p>
            </div>

            <div class="upsell-books">
                <div class="grid">
                    <div class="grid-row">
                        <?php for ($i = 1; $i <= 11; $i++) { ?>
                            <div class="grid-col col-25">
                                <div class="grid-item">
                                    <img class="no-crop" src="<?=get_image_url('/books/'.$i.'.png')?>" alt="book <?=$i?>" />
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="page-text tx-repeat">
                <p>
                    There are 11 fat burning recipe books containing over 320 of the most popular snacks and treats
                    people love such as pizza, french fries, chocolate cake, pastries, brownies, burgers, cookies, and
                    donuts.
                </p>
                <p>
                    If you ever feel like splurging, you can easily swap one of these delicious recipes for one in your
                    customized meal plan while still staying in ketosis and burning fat as fuel.
                </p>
                <p>
                    Having the ability to eat your favorites while still burning fat gives you the best chance of
                    success; in fact, feedback from our members suggests that you have an 8 times higher chance of
                    success because you don't feel like you're on a diet.
                </p>
                <p>
                    It is important to me that you succeed. The feeling of walking around confident in your own skin is
                    something that I want all of my members to experience.
                </p>
                <p>
                    Throughout your program, I want to ensure you enjoy every fat burning meal you eat.
                </p>
                <p>
                    This is why I'm giving you an exclusive opportunity to buy this product right here on this page
                    right now.<br/>
                    On my main website, I sell each of my eleven recipe books for $18.99 each, so for all 11, I charge
                    $208,89.
                </p>
                <p>
                    I am willing to let you take advantage of this special offer only on this page because I want to
                    stack all the decks in your favor today as a new customer for less than 1/3 of the normal price.
                </p>
                <p>
                    So here's what I want to offer you, instead of paying the regular $208.89 for all 11 recipes books,
                    you'll receive access to all 11 for only $49. 
                </p>
                <p>
                    You only need one sugary cheat meal to knock you out of ketosis, ruining all your hard work and
                    causing you to give up on your weight loss. 

                </p>
                <p>
                    These recipe books will prevent this from happening because you will never need to cheat!
                </p>
                <p>
                    However, you need to act quickly!
                </p>
                <p>
                    The opportunity is only available to those who have already purchased a customized keto meal plan.
                </p>
                <p>
                    After you leave this page, this exclusive offer will disappear, and you won't have access to your
                    delicious fat burning keto recipes anymore.
                </p>
                <p>
                    This is a one-time offer, so take advantage now to access the quickest, easiest and most effective
                    fat loss program available. Click the button below now. 
                </p>
            </div>
        </div>

        <div class="upsell-section section">
            <div class="page-title m-bottom-2 tx-capitalize">
                <div class="title-h3">60 Day Guarantee 100% <br/> Money Back Guarantee</div>
            </div>

            <div class="page-text tx-repeat">
                <p>
                    For any reason you are not 100% satisfied with this system or if for any reason you don't see the fastest and simplest way to reach your goals, simply request a refund within 60 days and you will get a full refund no questions asked!
                </p>
                <p>
                    I am confident that this program will work for you and I am willing to take all the risks. Start today to achieve your ideal physique!
                </p>
                <p><b>Olivia Reynolds</b></p>
            </div>

            <div class="upsell-books">
                <div class="grid">
                    <div class="grid-row">
                        <?php foreach ($books as $book): ?>
                            <div class="grid-col col-25">
                                <div class="grid-item">
                                    <img class="no-crop" src="<?=get_image_url('/books/'.$book.'.png')?>" alt="book <?=$book?>" />
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="upsell-prices m-bottom-2">
                <ul>
                    <li>
                        <b>Retail<br/> Price</b> <span class="title-h3 strikeout">$208.89</span>
                    </li>
                    <li>
                        <b><span class="primary-color">Limited Time Offer</span> <br/>New Customers Only</b>
                        <span class="title-h3 success-color">$49</span>
                    </li>
                </ul>
            </div>

            <div class="fl-centered m-bottom-3">
                <a href="<?php echo do_shortcode('[mwb_upsell_yes]') ?>" class="upsell-order-btn btn btn-primary btn-solid btn-xlarge">
                    Yes, Olivia, please give me tasty<br/> fat burning recipes
                </a>
            </div>

            <div class="page-title m-bottom-1_5">
                <div class="title-h3">100% Money-Back <span class="primary-color">Guarantee!</span></div>
            </div>

            <div class="fl-centered">
                <img class="no-crop" src="<?=get_image_url('/upsell/pays.png')?>" alt="payments" />
            </div>

            <div class="upsell-separator"></div>

            <div class="fl-column fl-centered">
                <p class="text width-80">
                    No thanks Olivia. I understand that the Keto Revamp Dessert Recipe Collection sells for $208.89 on
                    your main website,
                    and I cannot find this limited-time $49 offer anywhere else for easy, delicious, fat-burning
                    recipes. I'm willing to gamble with my cravings.
                </p>
                <a href="<?php echo do_shortcode('[mwb_upsell_no]') ?>" class="upsell-no-thanks-btn danger-color">I'll pass.</a>
            </div>
        </div>
    </div>
</div>

<?php get_footer();