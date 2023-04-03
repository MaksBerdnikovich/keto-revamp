<?php

if (class_exists('WP_CLI')) {
    \WP_CLI::add_command('recipes-tags', 'parse_recipes_tags');
}

function parse_recipes_tags()
{
    global $wpdb;
    $recipes = get_posts([
        'post_type'   => 'recipe',
        'numberposts' => -1,
    ]);
    foreach ($recipes as $recipe) {
        $objectId = get_field('object_id', $recipe->ID);
        $content = $wpdb->get_var($wpdb->prepare("SELECT content FROM recipes where object_id=%s", $objectId));
        $ids = [];
        if ($content) {
            $content = json_decode($content, true);
            $tags = $content['tags'];
            foreach ($tags as $tag) {
                if ($tag == 'vegan' || $tag == 'vegetarian') {
                    $ids[] = get_recipe_tag_id($tag);
                }
            }
        }
        if (count($ids)) {
            wp_set_post_terms($recipe->ID, $ids, 'recipe_meat', true);
        }
    }
}

function get_recipe_tag_id($tag)
{
    $term = term_exists($tag, 'recipe_meat');
    if (! $term) {
        $args = [];
        $term = wp_insert_term($tag, 'recipe_meat', $args);
    }

    return intval($term['term_id']);
}