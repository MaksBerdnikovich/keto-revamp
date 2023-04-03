<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

?>

<img src="<?php echo get_image_url('upsell/logos.png') ?>" alt="" class="logos">

<div class="footer">
    <p class="ftr-txt">
        <?php render_footer_menu(); ?>
    </p>
    <p class="ftr-txt">
        Copyright &copy; <?php echo date('Y') ?>, All Rights Reserved.
    </p>
</div>
</div>
</div>

<?php wp_footer(); ?>
</body>
</html>
