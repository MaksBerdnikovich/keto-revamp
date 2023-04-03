<?php
/**
 * Template Name: Home V1
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
?>

<div class="banner">
    <div class="container">
        <a href="<?php echo get_my_plan_url() ?>" class="access-btn">Access My plan</a>
        <div class="bnr-left">
            <img src="<?php echo get_image_url('v1/logo.png') ?>" class="logo">
            <h1 class="bnr-hdng">It just got easier to <br class="forDesk">lose weight with Keto! </h1>
            <img src="<?php echo get_image_url('v1/banr-prod.png') ?>" alt="" class="banr-prod">

            <p class="bnr-txt1">Get Matched With The Perfect <br class="forMob">Delicious <br class="forDesk">Keto Diet
                By <br class="forMob"><strong>Taking Our 15 Second Quiz</strong></p>
            <img src="<?php echo get_image_url('v1/bnr-prod-mob.png') ?>" class="bnr-prod-mob forMob">
            <p class="bnr-txt2">Select Your Gender:</p>
            <a href="<?php echo get_quiz_url('w') ?>" class="bnr-btn1">
                <div class="gender">
                    <div class="circle" style="animation-delay: 0s"></div>
                    <div class="circle" style="animation-delay: 1s"></div>
                    <div class="circle" style="animation-delay: 2s"></div>
                    <div class="circle" style="animation-delay: 3s"></div>

                    <img src="<?php echo get_image_url('v1/female.png') ?>">
                </div>

                Women Click Here
                <img src="<?php echo get_image_url('v1/btn-arw.png') ?>" alt="" class="btn-arw">
            </a>
            <a href="<?php echo get_quiz_url('m') ?>" class="bnr-btn1 bnr-btn2">
                <div class="gender">
                    <div class="circle" style="animation-delay: 0s"></div>
                    <div class="circle" style="animation-delay: 1s"></div>
                    <div class="circle" style="animation-delay: 2s"></div>
                    <div class="circle" style="animation-delay: 3s"></div>
                    <img src="<?php echo get_image_url('v1/male.png') ?>" alt="">
                </div>
                Men Click Here
                <img src="<?php echo get_image_url('v1/btn-arw.png') ?>" alt="" class="btn-arw">
            </a>
            <div class="forMob">or</div>
            <a class="forMob" href="<?php echo get_my_plan_url() ?>">Access my plan</a>
        </div>
        <img src="<?php echo get_image_url('v1/arrow.png') ?>" class="bnr-arrow">
    </div>
</div>

<div class="bnr-btm-strp">
    <div class="container">
        <h2>Keto Diet As Seen On</h2>
        <img src="<?php echo get_image_url('v1/feature-logo.png') ?>" class="feature-logo hide-mob">
        <img src="<?php echo get_image_url('v1/feature-logo-mob.png') ?>" class="feature-logo-mob forMob">
    </div>
</div>

<div class="sectionOne">
    <div class="container">
        <h1 class="comnHdng">Try This Week’s <br class="forMob">Popular Meals</h1>
        <div class="s1-mdl">
            <div class="s1-col-1"><img src="<?php echo get_image_url('v1/s1-img1.jpg') ?>"></div>
            <div class="s1-col-1"><img src="<?php echo get_image_url('v1/s1-img2.jpg') ?>"></div>
            <div class="s1-col-1"><img src="<?php echo get_image_url('v1/s1-img3.jpg') ?>"></div>
            <div class="s1-col-1"><img src="<?php echo get_image_url('v1/s1-img1.jpg') ?>"></div>
            <div class="s1-col-1"><img src="<?php echo get_image_url('v1/s1-img2.jpg') ?>"></div>
            <div class="s1-col-1"><img src="<?php echo get_image_url('v1/s1-img3.jpg') ?>"></div>
        </div>
    </div>
</div>

<div class="sectionTwo">
    <div class="container">
        <div class="blue-stripBx">
            <h2>Start your keto journey today</h2>

            <p class="stp-txt1">Get Matched With The Perfect Delicious Keto Diet By <br><strong>Taking Our 15 Second
                    Quiz</strong></p>
            <img src="<?php echo get_image_url('v1/strip-prod.png') ?>" class="strip-prod">
            <p class="stp-txt2">Select Your Gender:</p>
            <a href="<?php echo get_quiz_url('w') ?>" class="bnr-btn1">
                <div class="gender">
                    <div class="circle" style="animation-delay: 0s"></div>
                    <div class="circle" style="animation-delay: 1s"></div>
                    <div class="circle" style="animation-delay: 2s"></div>
                    <div class="circle" style="animation-delay: 3s"></div>

                    <img src="<?php echo get_image_url('v1/female.png') ?>">
                </div>

                Women Click Here
                <img src="<?php echo get_image_url('v1/btn-arw.png') ?>" alt="" class="btn-arw">
            </a>
            <a href="<?php echo get_quiz_url('m') ?>" class="bnr-btn1 bnr-btn2">
                <div class="gender">
                    <div class="circle" style="animation-delay: 0s"></div>
                    <div class="circle" style="animation-delay: 1s"></div>
                    <div class="circle" style="animation-delay: 2s"></div>
                    <div class="circle" style="animation-delay: 3s"></div>
                    <img src="<?php echo get_image_url('v1/male.png') ?>" alt="">
                </div>
                Men Click Here
                <img src="<?php echo get_image_url('v1/btn-arw.png') ?>" alt="" class="btn-arw">
            </a>
            <img src="<?php echo get_image_url('v1/arrow.png') ?>" class="strp-arrow">
        </div>

        <h1 class="comnHdng">Simple, Stress-free Keto Diet Meal Plan</h1>
        <p class="s2-para">Whether you are new to keto or been doing it for years, our Keto Meal Plan is perfect for
            you</p>
        <div class="s2-mdl-stps">
            <div class="s2-row">
                <div class="s2-col-1"><span>Step 01</span></div>
                <div class="s2-col-2">
                    <img src="<?php echo get_image_url('v1/s2-stp-img1.png') ?>" class="s2-stp-img1">
                    <span>Take Our Cutting-Edge 15 Second Quiz</span>
                    <p>Our Expert Nutritionists will work around the clock to curate and design your delicious meals
                        which are exactly what you need for optimal, rapid weight loss.</p>
                </div>
            </div>
            <div class="s2-row">
                <div class="s2-col-1"><span style="background:#31df8f;">Step 02</span></div>
                <div class="s2-col-2">
                    <img src="<?php echo get_image_url('v1/s2-stp-img2.png') ?>" class="s2-stp-img1">
                    <span>Get Your Ingredients</span>
                    <p>Your nutritionist will provide you with an exact list of what you will need for each meal, in a
                        simple way.</p>
                </div>
            </div>
            <div class="s2-row">
                <div class="s2-col-1"><span style="background:#f8c14c;">Step 03</span></div>
                <div class="s2-col-2">
                    <img src="<?php echo get_image_url('v1/s2-stp-img3.png') ?>" class="s2-stp-img1">
                    <span>Enjoy Delicious Keto Meals</span>
                    <p>Feel healthier than ever and lose weight effortlessly. We will even calculate how much weight you
                        will lose within the first 21 days.</p>
                </div>
            </div>
        </div>
        <a href="#" class="get-btn">Get Started <img src="<?php echo get_image_url('v1/getbtn-arw.png') ?>"></a>
    </div>
</div>

<div class="sectionThree">
    <div class="container">
        <div class="blue-stripBx">
            <h2>Start your keto journey today</h2>

            <p class="stp-txt1">Get Matched With The Perfect Delicious Keto Diet By <br><strong>Taking Our 15 Second
                    Quiz</strong></p>
            <img src="<?php echo get_image_url('v1/strip-prod.png') ?>" class="strip-prod">
            <p class="stp-txt2">Select Your Gender:</p>
            <a href="<?php echo get_quiz_url('w') ?>" class="bnr-btn1">
                <div class="gender">
                    <div class="circle" style="animation-delay: 0s"></div>
                    <div class="circle" style="animation-delay: 1s"></div>
                    <div class="circle" style="animation-delay: 2s"></div>
                    <div class="circle" style="animation-delay: 3s"></div>

                    <img src="<?php echo get_image_url('v1/female.png') ?>">
                </div>

                Women Click Here
                <img src="<?php echo get_image_url('v1/btn-arw.png') ?>" alt="" class="btn-arw">
            </a>
            <a href="<?php echo get_quiz_url('m') ?>" class="bnr-btn1 bnr-btn2">
                <div class="gender">
                    <div class="circle" style="animation-delay: 0s"></div>
                    <div class="circle" style="animation-delay: 1s"></div>
                    <div class="circle" style="animation-delay: 2s"></div>
                    <div class="circle" style="animation-delay: 3s"></div>
                    <img src="<?php echo get_image_url('v1/male.png') ?>" alt="">
                </div>
                Men Click Here
                <img src="<?php echo get_image_url('v1/btn-arw.png') ?>" alt="" class="btn-arw">
            </a>
            <img src="<?php echo get_image_url('v1/arrow.png') ?>" class="strp-arrow">
        </div>

        <h1 class="comnHdng">Success Stories<br>Join The Keto Revolution With Ketosis</h1>
        <div class="story-box">
            <div class="testi-col">
                <div class="t-imgdv">
                    <img src="<?php echo get_image_url('v1/t-img1.png') ?>" class="t-img1">
                    <img src="<?php echo get_image_url('v1/t-tik.png') ?>" class="t-tik">
                </div>
                <img src="<?php echo get_image_url('v1/t-star.png') ?>" class="t-star">
                <p class="t-para">Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec
                    sagittis sem nibh id elit. Duis sed odio sit amet nibh vulpu tate cursus a sit amet mauris. Aenean
                    sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</p>
                <div class="t-name">
                    <img src="<?php echo get_image_url('v1/dil.png') ?>">
                    <span>Amy Gibson Duncan</span>
                    <p>Verified Customer</p>
                </div>
            </div>
            <div class="testi-col">
                <div class="t-imgdv">
                    <img src="<?php echo get_image_url('v1/t-img1.png') ?>" class="t-img1">
                    <img src="<?php echo get_image_url('v1/t-tik.png') ?>" class="t-tik">
                </div>
                <img src="<?php echo get_image_url('v1/t-star.png') ?>" class="t-star">
                <p class="t-para">Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec
                    sagittis sem nibh id elit. Duis sed odio sit amet nibh vulpu tate cursus a sit amet mauris. Aenean
                    sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</p>
                <div class="t-name">
                    <img src="<?php echo get_image_url('v1/dil.png') ?>">
                    <span>Amy Gibson Duncan</span>
                    <p>Verified Customer</p>
                </div>
            </div>
            <div class="testi-col">
                <div class="t-imgdv">
                    <img src="<?php echo get_image_url('v1/t-img1.png') ?>" class="t-img1">
                    <img src="<?php echo get_image_url('v1/t-tik.png') ?>" class="t-tik">
                </div>
                <img src="<?php echo get_image_url('v1/t-star.png') ?>" class="t-star">
                <p class="t-para">Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec
                    sagittis sem nibh id elit. Duis sed odio sit amet nibh vulpu tate cursus a sit amet mauris. Aenean
                    sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</p>
                <div class="t-name">
                    <img src="<?php echo get_image_url('v1/dil.png') ?>">
                    <span>Amy Gibson Duncan</span>
                    <p>Verified Customer</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="sectionFour">
    <div class="container">
        <div class="blue-stripBx">
            <h2>Start your keto journey today</h2>

            <p class="stp-txt1">Get Matched With The Perfect Delicious Keto Diet By <br><strong>Taking Our 15 Second
                    Quiz</strong></p>
            <img src="<?php echo get_image_url('v1/strip-prod.png') ?>" class="strip-prod">
            <p class="stp-txt2">Select Your Gender:</p>
            <a href="<?php echo get_quiz_url('w') ?>" class="bnr-btn1">
                <div class="gender">
                    <div class="circle" style="animation-delay: 0s"></div>
                    <div class="circle" style="animation-delay: 1s"></div>
                    <div class="circle" style="animation-delay: 2s"></div>
                    <div class="circle" style="animation-delay: 3s"></div>

                    <img src="<?php echo get_image_url('v1/female.png') ?>">
                </div>

                Women Click Here
                <img src="<?php echo get_image_url('v1/btn-arw.png') ?>" alt="" class="btn-arw">
            </a>
            <a href="<?php echo get_quiz_url('m') ?>" class="bnr-btn1 bnr-btn2">
                <div class="gender">
                    <div class="circle" style="animation-delay: 0s"></div>
                    <div class="circle" style="animation-delay: 1s"></div>
                    <div class="circle" style="animation-delay: 2s"></div>
                    <div class="circle" style="animation-delay: 3s"></div>
                    <img src="<?php echo get_image_url('v1/male.png') ?>" alt="">
                </div>
                Men Click Here
                <img src="<?php echo get_image_url('v1/btn-arw.png') ?>" alt="" class="btn-arw">
            </a>
            <img src="<?php echo get_image_url('v1/arrow.png') ?>" class="strp-arrow">
        </div>
        <p class="s4-txt1">Keto Lifestyle Benefits Include </p>
        <ul class="s4-list">
            <li><img src="<?php echo get_image_url('v1/s4-lst-ic1.png') ?>">Boost Energy & Performance</li>
            <li><img src="<?php echo get_image_url('v1/s4-lst-ic2.png') ?>">Stimulates<br>Fat Burning</li>
            <li><img src="<?php echo get_image_url('v1/s4-lst-ic3.png') ?>">Healthy<br>Sleep Cycles</li>
            <li><img src="<?php echo get_image_url('v1/s4-lst-ic4.png') ?>">Enhances<br>Focus & Clarity</li>
            <li><img src="<?php echo get_image_url('v1/s4-lst-ic5.png') ?>">Improve<br>Fitness Levels</li>
            <li><img src="<?php echo get_image_url('v1/s4-lst-ic6.png') ?>">Healthy<br>Mood Patterns</li>
        </ul>
    </div>
</div>

<?php get_footer(); ?>
