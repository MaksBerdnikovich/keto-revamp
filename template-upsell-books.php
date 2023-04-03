<?php
/**
 * Template Name: Upsell Books
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header('upsell');
?>

    <div>
        <h2>Books upsell</h2>
        <a href="<?php echo do_shortcode('[mwb_upsell_yes]') ?>">Yes</a>
        <a href="<?php echo do_shortcode('[mwb_upsell_no]') ?>">No</a>
    </div>

<?php get_footer('upsell');