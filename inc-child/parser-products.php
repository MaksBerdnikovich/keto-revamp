<?php

if (class_exists('WP_CLI')) {
    \WP_CLI::add_command('products', 'bind_ingredients_to_products');
}

function bind_ingredients_to_products()
{
    $recipes = get_posts([
        'post_type'   => 'recipe',
        'numberposts' => -1,
    ]);
    $products = get_terms([
        'taxonomy'   => 'recipe_product',
        'hide_empty' => false,
    ]);
    $meat = get_terms([
        'taxonomy'   => 'recipe_meat',
        'hide_empty' => false,
    ]);
    foreach ($recipes as $recipe) {
        $ingredients = wp_get_post_terms($recipe->ID, 'ingredient');
        $mids = [];
        $pids = [];

        foreach ($ingredients as $ingredient) {
            foreach ($products as $product) {
                if (contains_word($ingredient->name, $product->name)) {
                    $pids[] = $product->term_id;
                }
            }
            foreach ($meat as $product) {
                if (contains_word($ingredient->name, $product->name)) {
                    $mids[] = $product->term_id;
                }
            }
        }
        if (count($pids)) {
            wp_set_post_terms($recipe->ID, $pids, 'recipe_product');
        }
        if (count($mids)) {
            wp_set_post_terms($recipe->ID, $mids, 'recipe_meat');
        }
    }
}

function contains_word($str, $word)
{
    if (preg_match('/\b' . strtoupper($word) . '\b/', strtoupper($str))) {
        return true;
    }

    return false;
}