<?php
if (class_exists('WP_CLI')) {
    \WP_CLI::add_command('sheets', 'sheets_parser_command');
}

//add_action('init', 'action_function_name_11');
function action_function_name_11()
{
    if ($_GET['a'] == 'b') {
        set_time_limit(0);
        sheets_parser_command(null, null);
    }
}

function sheets_parser_command($args, $assoc_args)
{
    if ($xlsx = SimpleXLSX::parse(wp_upload_dir()['basedir'].'/recipes.xlsx')) {

        require_once(ABSPATH.'wp-admin/includes/post.php');
        require_once(ABSPATH.'wp-admin/includes/image.php');
        require_once ABSPATH.'wp-admin/includes/post.php';

        $products = [];
        $types = [];
        $nutritious = [];
        foreach ($xlsx->rows() as $key => $r) {
            if ($key == 1) {
                for ($i = 2; $i < 281; $i++) {
                    $products[$i] = strtolower(trim($r[$i]));
                }
                for ($i = 282; $i < 287; $i++) {
                    $types[$i] = strtolower(trim($r[$i]));
                }
                for ($i = 292; $i <= 300; $i++) {
                    $nutritious[$i] = strtolower(trim($r[$i]));
                }
            } elseif ($key >= 3) {
                if (empty($r[288])) {
                    continue;
                }
                $recipe = [];
                $currentProducts = [];
                $currentTypes = [];
                $currentNutr = [];
                for ($i = 2; $i < 281; $i++) {
                    if (! empty($r[$i])) {
                        $currentProducts[] = $products[$i];
                    }
                }
                for ($i = 282; $i < 287; $i++) {
                    if (! empty($r[$i])) {
                        $currentTypes[] = $types[$i];
                    }
                }
                for ($i = 292; $i <= 300; $i++) {
                    if (! empty($r[$i])) {
                        $currentNutr[$nutritious[$i]] = floatval($r[$i]);
                    }
                }


                $ingr = [];

                foreach (explode('##', $r[281]) as $s) {
                    $ingr[] = [
                        'text' => $s,
                    ];
                }

                $recipe['products'] = $currentProducts;
                $recipe['types'] = $currentTypes;
                $recipe['nutritious'] = $currentNutr;

                $recipe['ingredients'] = $ingr;
                $recipe['url'] = $r[1];
                $recipe['title'] = trim($r[287]);
                $recipe['time'] = trim($r[288]);
                $recipe['servings'] = trim($r[289]);
                $recipe['image'] = trim($r[290]);

                $steps = [];
                foreach (explode('##', $r[291]) as $s) {
                    $steps[] = [
                        'text' => $s,
                    ];
                }
                $recipe['steps'] = $steps;
                $title = wp_strip_all_tags($recipe['title']);

                $postId = post_exists($title);

                if (! $postId) {
                    $post_data = [
                        'post_title'  => $title,
                        'post_status' => 'publish',
                        'post_author' => 1,
                        'post_type'   => 'recipe',
                    ];

                    $postId = wp_insert_post($post_data);

                }

                $ingredients = [];
                foreach ($recipe['products'] as $item) {
                    $ingredients[] = get_ingredient_id($item);
                }

                $recipeCats = [];
                foreach ($recipe['types'] as $item) {
                    $recipeCats[] = get_recipe_cat_id($item);
                }

                wp_set_post_terms($postId, $ingredients, 'ingredient');
                wp_set_post_terms($postId, $recipeCats, 'recipe_cat');

                foreach ($recipe['nutritious'] as $n => $value) {
                    update_field($n, $value, $postId);
                }

                update_field('ingredients', $recipe['ingredients'], $postId);
                update_field('steps', $recipe['steps'], $postId);
                update_field('time', $recipe['time'], $postId);
                update_field('servings', $recipe['servings'], $postId);
                update_field('url', $recipe['url'], $postId);

                if ($recipe['image']) {
//                    $imageId = attach_image($recipe['image'], 'recipes');
//                    if ($imageId) {
//                        set_post_thumbnail($postId, $imageId);
//                    }
                }

                if (class_exists('WP_CLI')) {
                    \WP_CLI::success($recipe['title']);
                }

            }
        }
    } else {
        echo SimpleXLSX::parseError();
    }
}