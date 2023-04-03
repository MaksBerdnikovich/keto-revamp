<?php
/**
 * Template Name: Home V3
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Hitup - Fitness and Gym HTML Template </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="hitup-html/img/favicon.ico">
    <!-- Place favicon.ico in the root Internist, General Practitonery -->

    <!-- CSS here -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/hitup-html/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/hitup-html/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/hitup-html/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/hitup-html/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/hitup-html/css/dripicons.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/hitup-html/css/fonts.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/hitup-html/css/slick.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/hitup-html/css/default.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/hitup-html/css/meanmenu.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/hitup-html/css/style.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/hitup-html/css/responsive.css">
</head>
<body>
<!-- header -->
<header class="header-area">

    <div id="header-sticky" class="menu-area menu-area2">
        <div class="container">
            <div class="second-menu">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-2">
                        <div class="logo2">
                            <a href="index.html"><img
                                        src="<?php echo get_stylesheet_directory_uri() ?>/hitup-html/img/logo/logo.png"
                                        alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8">
                        <div class="main-menu text-right pr-15">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class="has-sub">
                                        <a href="index.html">Our solution</a>
                                    </li>
                                    <li><a href="about.html">How it works</a></li>
                                    <li><a href="about.html">Reviews</a></li>
                                    <li><a href="about.html">Login</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile-menu"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header-end -->
<!-- main-area -->
<main>
    <!-- slider-area -->
    <!-- slider-area-end -->
    <?php get_template_part('template-parts/home-v3-parallax') ?>
    <!-- about-area -->
    <?php get_template_part('template-parts/home-v3-problem') ?>
    <!-- about-area-end -->


    <!-- services-area -->
    <?php get_template_part('template-parts/home-v3-solution') ?>
    <!-- services-area-end -->

    <!-- Our Class Schedule Area Start -->
    <?php get_template_part('template-parts/home-v3-our-plan') ?>
    <!-- Our Class Schedule  Area End -->


    <!-- testimonial-area -->
    <?php get_template_part('template-parts/home-v3-testimonios') ?>
    <!-- testimonial-area-end -->

    <!-- blog-area -->
    <?php get_template_part('template-parts/home-v3-tested') ?>
    <!-- blog-area-end -->

    <?php get_template_part('template-parts/home-v3-take-quiz') ?>


</main>
<!-- main-area-end -->
<!-- footer -->
<footer>
    <div class="footer-bg footer-p pt-90">
        <div class="footer-top-heiding">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-6 p-0 px-3 d-flex justify-content-start">
                        <div class="flog mb-35">
                            <a href="#"><img src="<?php echo get_stylesheet_directory_uri() ?>/hitup-html/img/logo/w_logo.png" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-6 p-0 px-3 d-flex justify-content-end">
                        <div class="footer-link">
                            <ul>
                                <li><a href="#"><i class="fas fa-chevron-right"></i> About Us</a></li>
                                <li><a href="#"><i class="fas fa-chevron-right"></i> Reviews</a></li>
                                <li><a href="#"><i class="fas fa-chevron-right"></i> Terms & Conditions</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <div class="footer-top pb-50">

            <div class="container">
                <div class="row justify-content-between">

                    <div class="col-xl-5 col-lg-5 col-sm-6 p-0 px-3 d-flex justify-content-start">
                        <div class="footer-widget mb-30">
                            <div class="footer-text mb-20">
                                <p>Disclaimer: RESULTS MAY VARY FROM PERSON TO PERSON</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-sm-6 p-0 px-3 d-flex justify-content-end">
                        <div class="footer-widget mb-30">
                            <div class="footer-text mb-20">
                                <p class="copyright">© <?php echo date('Y') ?> LoveYourBelly - ALL RIGHTS RESERVED</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer-end -->


<!-- JS here -->
<!-- JS here -->
<script src="<?php echo get_stylesheet_directory_uri() ?>/hitup-html/js/vendor/modernizr-3.5.0.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/hitup-html/js/vendor/jquery-1.12.4.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/hitup-html/js/popper.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/hitup-html/js/bootstrap.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/hitup-html/js/one-page-nav-min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/hitup-html/js/jquery.meanmenu.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/hitup-html/js/slick.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/hitup-html/js/ajax-form.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/hitup-html/js/paroller.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/hitup-html/js/wow.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/hitup-html/js/js_isotope.pkgd.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/hitup-html/js/imagesloaded.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/hitup-html/js/parallax.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/hitup-html/js/jquery.waypoints.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/hitup-html/js/jquery.counterup.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/hitup-html/js/jquery.scrollUp.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/hitup-html/js/parallax-scroll.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/hitup-html/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/hitup-html/js/element-in-view.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/hitup-html/js/main.js"></script>
</body>
</html>