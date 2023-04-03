<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<div class="single-page">
    <div class="container">
        <div class="single-page-404">
            <div class="page-title m-bottom-2">
                <div class="title-h2">Page not found</div>
            </div>
            <div class="page-text m-bottom-2">
                <p>
                    <?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'understrap' ); ?>
                </p>
            </div>
            <div class="page-link m-bottom-2">
                <a href="<?= get_home_url() ?>" class="btn btn-solid btn-primary btn-large">Go Home</a>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
