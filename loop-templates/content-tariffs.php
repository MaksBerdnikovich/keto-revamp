<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$products = wc_get_products([
    'limit'    => -1,
    'meta_key' => '_price',
    'orderby'  => 'meta_value_num',
    'order'    => 'ASC',
]);

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <header class="entry-header">

        <h2>
            Select tariff plan
        </h2>
    </header><!-- .entry-header -->

    <?php echo get_the_post_thumbnail($post->ID, 'large'); ?>

    <div class="entry-content">
        <div class="row">
            <?php
            /** @var \WC_Product $product */
            foreach ($products as $product):
                ?>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product->get_name() . '/' . $product->get_price_html() ?></h5>
                            <p class="card-text"><?php echo $product->get_description() ?></p>
                            <form method="post" action="<?php echo get_current_url() ?>">
                                <input type="hidden" name="action" value="select-tariff"/>
                                <input type="hidden" name="tariff" value="<?php echo $product->get_id() ?>"/>
                                <button type="submit" class="btn btn-primary">Select</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div><!-- .entry-content -->

    <footer class="entry-footer">

        <?php edit_post_link(__('Edit', 'understrap'), '<span class="edit-link">', '</span>'); ?>

    </footer><!-- .entry-footer -->

</article><!-- #post-## -->
