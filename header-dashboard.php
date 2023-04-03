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

$titles = [
    'dashboard-welcome' => 'Getting Started',
    'dashboard-keto' => 'Keto 101',
    'dashboard-faq' => 'FAQ',
    'dashboard-books' => 'Bonus Treats',
    'my-plan' => 'Your weight loss plan',
    'dashboard-supplements' => 'Supplements',
    'dashboard-workout-step1' => 'Workouts',
    'dashboard-workout-step2' => 'Workouts',
    'dashboard-workout-step3' => 'Workouts',
    'dashboard-measurements' => 'Measurements',
    'dashboard-contact' => 'Contact Us',
    'profile' => 'Profile',
];

$modals = [
    'dashboard-keto' => 'What is keto 101',
];

$userId = get_current_user_id();
$nickname = get_field('nickname', 'user_' . $userId);

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

<body <?php body_class('layout-dashboard'); ?>>
<?php do_action('wp_body_open'); ?>

<main id="main" class="main-content"><!--Main start-->

    <header class="header"><!--Header start-->
        <div class="container">
            <div class="header-db">
                <?php foreach ($titles as $key => $value): ?>
                    <?php if (is_page_template('template-'.$key.'.php')): ?>
                        <div class="header-db__title"><b><?=$value?></b></div>
                    <?php endif;?>
                <?php endforeach; ?>

                <?php foreach ($modals as $key => $value): ?>
                    <?php if (is_page_template('template-'.$key.'.php')): ?>
                        <div class="header-db__button">
                            <a href="javascript:void(0)" data-fancybox data-src="#<?=$key?>">
                                <i class="icon-info-2"></i> <span><?=$value?></span>
                            </a>
                        </div>
                    <?php endif;?>
                <?php endforeach; ?>
                <div class="header-db__user">
                    <i class="icon-profile"></i> <span class="tx-capitalize">Hello, <?=$nickname?></span>
                </div>
                <div class="header-db__logout">
                    <a href="<?php echo wp_logout_url(home_url()); ?>">
                        <i class="icon-logout"></i> <span>Sign Out</span>
                    </a>
                </div>
            </div>
        </div>
    </header><!--Header end-->

    <div class="sidebar"><!--Sidebar start-->
        <div class="sidebar-db">
            <div class="sidebar-db__logo">
                <a href="<?php echo get_my_plan_url() ?>">
                    <img class="open" src="<?php echo get_image_url('/logo/logo.svg') ?>">
                    <img class="close" src="<?php echo get_image_url('/logo/fav.svg') ?>">
                </a>
            </div>
            <div class="sidebar-db__menu">
                <?php if (is_user_logged_in()): render_dashboard_menu(); endif; ?>
            </div>
            <div class="sidebar-db__menu menu--bottom">
                <ul>
                    <li><a href="javascript:void(0)" class="item-fb"><span>FB Group</span></a></li>
                    <li><a href="javascript:void(0)" class="item-te"><span>Contact Us</span></a></li>
                    <li><a href="javascript:void(0)" class="item-ask"><span>Ask A Coach</span></a></li>
                </ul>

                <div class="sidebar-db__copy">201 York Road,<br/> Suite 1-473,<br/> Jenkintown, PA 19046</div>
            </div>
        </div>

        <button class="sidebar-toggle"><i class="icon-angle-down"></i></button>
    </div><!--Sidebar end-->

    <div class="wrapper"><!--Wrapper start-->
