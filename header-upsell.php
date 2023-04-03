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

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Keto Program</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="shortcut icon" type="image/x-icon"
          href="<?php echo get_stylesheet_directory_uri(), '/images/v1/favicon.ico' ?>">

    <?php wp_head(); ?>

</head>

<body>
<div class="upsell-bg">
    <div class="container">
        <div class="top-section">
            <img src="<?php echo get_image_url('upsell/logo.png') ?>" alt="logo" class="logo">
            <div class="clearall"></div>
            <img src="<?php echo get_image_url('upsell/ship-img.png') ?>" alt="" class="ship-img">
        </div>