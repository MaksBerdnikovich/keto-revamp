<?php
if (class_exists('WP_CLI')) {
    \WP_CLI::add_command('recipes', 'add_recipes_command');
}
function add_recipes_command($args, $assoc_args)
{
    set_time_limit(0);
    require_once(ABSPATH.'wp-admin/includes/image.php');
    require_once ABSPATH.'wp-admin/includes/post.php';

    global $wpdb;
    $results = $wpdb->get_results("SELECT * FROM recipes", ARRAY_A);
    $folders = [];
    foreach ($results as $key => $result) {
        $content = json_decode($result['content'], true);

        $folder = $content['folder'] ?? 'Main Dishes';
        if (array_key_exists($folder, $folders)) {
            $folders[$folder] = $folders[$folder] + 1;
        } else {
            $folders[$folder] = 0;
        }

        if ($folders[$folder] > 20) {
            continue;
        }

        $title = wp_strip_all_tags($result['name']);
        $postId = post_exists($title);
        if (! $postId) {
            $post_data = [
                'post_title'   => $title,
                'post_content' => $content['collectionInfo']['description'] ?? '',
                'post_status'  => 'publish',
                'post_author'  => 1,
                'post_type'    => 'recipe',
            ];

            $postId = wp_insert_post($post_data);
        }
        $ingredients = [];
        foreach ($content['collectionInfo']['ingredients'] as $item) {
            if (is_array($item)) {
                $ingredients[] = get_ingredient_id($item);
            }
        }


        $recipeCatId = get_recipe_cat_id($folder);
        wp_set_post_terms($postId, $ingredients, 'ingredient');
        wp_set_post_terms($postId, [$recipeCatId], 'recipe_cat');

        update_field('fat', $content['standardNutrients']['FAT'] ?? '', $postId);
        update_field('protein', $content['standardNutrients']['PROCNT'] ?? '', $postId);
        update_field('carbs', $content['standardNutrients']['NET_CARBS'] ?? '', $postId);
        update_field('calories', $content['standardNutrients']['NET_CALORIES'] ?? '', $postId);
        update_field('object_id', $content['foodId'] ?? '', $postId);

        $steps = [];
        foreach ($content['collectionInfo']['steps'] as $step) {
            $photoThumb = $step['photoThumb'] ?? false;
            $stepArray = [
                'description' => $step['description'],
            ];
            if ($photoThumb) {
                $imageId = attach_image(get_image_name($photoThumb), 'steps');
                if ($imageId) {
                    $stepArray['image'] = $imageId;
                }
            }

            $steps[] = $stepArray;
        }
        update_field('steps', $steps, $postId);

        //$image = get_image_name($content['photoThumb']);
        //if ($image) {
        //    $imageId = attach_image($image, 'recipes');
        //    if ($imageId) {
        //        set_post_thumbnail($postId, $imageId);
        //    }
        //}

        \WP_CLI::success($result['id']);
    }
}

function get_ingredient_id($ingredient)
{
    $term = term_exists($ingredient, 'ingredient');
    if (! $term) {
        $args = [];
        $term = wp_insert_term($ingredient, 'ingredient', $args);
    }

    return intval($term['term_id']);
}

function get_recipe_cat_id($catName)
{
    $term = term_exists($catName, 'recipe_cat');
    if (! $term) {
        $args = [];
        $term = wp_insert_term($catName, 'recipe_cat', $args);
    }
    return intval($term['term_id']);
}

function attach_image($imageUrl, $type = 'recipes')
{
    $wp_upload_dir = wp_upload_dir();
//    $imageUrl = $wp_upload_dir['baseurl'].'/keto/'.$type.'/'.$filename;
    $filename =basename(parse_url($imageUrl, PHP_URL_PATH));
    $imageData = file_get_contents($imageUrl);
    if (! $imageData) {
        return false;
    }
    $file = $wp_upload_dir['path'].'/'.$filename;
    file_put_contents($file, $imageData);
    $wpFiletype = wp_check_filetype($filename, null);
    $attachment = [
        'post_mime_type' => $wpFiletype['type'],
        'post_title'     => sanitize_file_name($filename),
        'post_content'   => '',
        'post_status'    => 'publish',
    ];
    $attachmentId = wp_insert_attachment($attachment, $file);
    $attachmentMetadata = wp_generate_attachment_metadata($attachmentId, $file);
    wp_update_attachment_metadata($attachmentId, $attachmentMetadata);

    return $attachmentId;
}

function get_image_name($url)
{
    $path = str_replace('thumb_', '', $url);
    $path = str_replace('%2F', '_', $path);
    $parseUrl = parse_url($path);

    return basename($parseUrl['path']);
}