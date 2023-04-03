<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');

$body_custom_class = '';
if (is_home_landing_tpl() || is_single_page_tpl()) {
    $body_custom_class = 'layout-landing';
} else {
    $body_custom_class = 'layout-quiz';
}

$header_custom_class = '';
if (is_home_landing_tpl() || is_single_page_tpl()) {
    $header_custom_class = 'header--sticky';
} else if (is_quiz_tpl()) {
    $header_custom_class = 'header--quiz';
}

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    <link rel="apple-touch-icon" sizes="180x180" href="<?= get_image_url( 'favicon/apple-touch-icon.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= get_image_url('favicon/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= get_image_url( 'favicon/favicon-16x16.png') ?>">
    <link rel="mask-icon" href="<?= get_image_url( 'favicon/safari-pinned-tab.svg') ?>" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <?php wp_head(); ?>

    <?php echo get_field('header_scripts', 'option') ?>
</head>

<body data-loading="true" <?php body_class($body_custom_class); ?>>
<?php do_action('wp_body_open'); ?>

<?php if (!is_home_landing_tpl() && !is_single_page_tpl()): ?>
    <div class="back-image image--top-left">
        <img src="<?= get_image_url( 'bg/top-left.png') ?>" alt="background" />
    </div>
    <div class="back-image image--top-right">
        <img src="<?= get_image_url( 'bg/top-right.png') ?>" alt="background" />
    </div>
<?php endif; ?>

<main class="main-content"><!--Main start-->

    <header class="header <?= $header_custom_class ?>"><!--Header start-->
        <div class="container">

            <?php if (is_default_tpl()): ?>
                <div class="header-default">
                    <div class="header-default__logo">
                        <a href="<?= get_home_url() ?>"><img src="<?=get_image_url('logo/logo.svg')?>" alt="logo" /></a>
                    </div>

                    <?php if (is_summary_tpl()) : ?>
                        <div class="header-default__clock <?=is_page_template('template-summary-v1.php') ? 'v1' : 'v2'?>">
                            <div class="summary-countdown btn btn-primary btn-large btn-solid no-hover">
                                18<span>min</span> <span class="sep">:</span> 00<span>sec</span>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if (is_quiz_tpl()): ?>
                <div class="header-quiz">
                    <div class="header-quiz__logo">
                        <a href="<?= get_home_url() ?>"><img src="<?=get_image_url('logo/logo.svg')?>" alt="logo" /></a>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (is_home_landing_tpl() || is_single_page_tpl()): ?>
                <div class="header-landing">
                    <div class="header-landing__logo">
                        <a href="<?= get_home_url() ?>"><img src="<?=get_image_url('logo/logo.svg')?>" alt="logo" /></a>
                    </div>

                    <?php if (is_home_landing_tpl()): ?>
                    <div class="header-landing__btn">
                        <a class="btn btn-solid btn-primary btn-large" href="<?= get_quiz_url() ?>">I want an 8-week custom Keto meal plan</a>
                    </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </header><!--Header end-->
    
    <div class="wrapper <?php if (is_quiz_tpl()): ?>centered<?php endif; ?>"><!--Wrapper start-->