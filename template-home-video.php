<?php
/**
 * Template Name: Home Video
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>

<div class="home-video">
    <div class="container">
        <div class="home-video-section section">
            <div class="section-title">
                <div class="title-h3">Get Your Customized Keto Plan</div>
            </div>
            <div class="home-video__frame">
                <div class="video">
                    <iframe src="//player.vimeo.com/video/662166944?title=0&byline=0&portrait=0&badge=0"
                            width="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen>
                    </iframe>
                </div>
            </div>
            <div class="home-video__links">
                <a href="<?= get_quiz_url() ?>" class="btn btn-solid btn-primary btn-xlarge">Get Your Customized Keto Plan</a>
                <a href="<?= get_home_url() ?>" class="link">Prefer To Read? - Click Here</a>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
