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

</div><!--Wrapper end-->

<footer class="footer"><!--Footer start-->
    <div class="container">
        <div class="footer-db">
            <div class="footer-db__menu">
                <?php render_footer_menu(); ?>
            </div>
        </div>
    </div>
</footer><!--Footer end-->

</main>
<?php wp_footer(); ?>
</body>
</html>

