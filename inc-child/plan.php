<?php

function get_daily_user_plan($recipesIds)
{
    $calories = get_field('calories', 'user_'.get_current_user_id());
    $recipes = [];
    foreach ($recipesIds as $key => $id) {
        $recipes[$key] = get_post($id);
    }
    $dailyNutrients = calculate_daily_nutrients($recipes, $calories);

    return [
        'daily_nutrients' => $dailyNutrients,
        'recipes'         => $recipes,
    ];
}

function get_user_plan($regenerate = false, $userId = false)
{
    if (! $userId) {
        $userId = get_current_user_id();
    }
    $userKey = 'user_'.$userId;
    $calories = get_field('calories', $userKey);
    if (! $regenerate) {
        $currentPlan = get_field('current_plan', $userKey);
    } else {
        $currentPlan = false;
    }

    $products = get_user_products($userId);
    $meat = get_user_meat($userId);

    if ($currentPlan && count($currentPlan) == 8) {
        return $currentPlan;
    }
    $plan = generate_plan_items($calories, $products, $meat);

    update_field('current_plan', $plan, $userKey);

    return $plan;
}

function generate_plan_items(
    $calories,
    $products,
    $meat,
    $weeks = 8
) {
    $plan = [];
    for ($i = 1; $i <= $weeks; $i++) {
        for ($j = 1; $j <= 7; $j++) {
            $plan[$i][$j] = get_recipes_by_calories($calories, $products);
        }
    }

    return $plan;
}

function get_weekly_ingredients($week = 1)
{
    $plan = get_user_plan();
    $startDay = 1;
    $endDay = 7;
    $ingredients = [];
    for ($i = $startDay; $i <= $endDay; $i++) {
        $day = $plan[$week][$i];
        foreach ($day as $recipe) {
            if ($recipe) {
                $recipeIngr = get_the_terms($recipe, 'ingredient') ?? [];
                $ingredients = array_merge($ingredients, $recipeIngr);
            }
        }
    }
    $unique = [];
    foreach ($ingredients as $ingredient) {
        $unique[$ingredient->term_id] = $ingredient;
    }

    return $unique;
}

add_action('wp_ajax_get_recipes_by_category_request', 'get_recipes_by_category_request');

function get_recipes_by_category_request()
{
    check_ajax_referer('ajax_nonce');
    $category = get_recipe_category_slug_by_name($_GET['category']);
    $title = $_GET['keyword'];
    $count = $_GET['count'];
    $args = [
        'post_type'      => 'recipe',
        'posts_per_page' => -1,
        'tax_query'      => [
            [
                'taxonomy' => 'recipe_cat',
                'field'    => 'slug',
                'terms'    => $category,
            ],
        ],
    ];
    if ($title) {
        $args['like_title'] = $title;
    }
    if ($count) {
        $args['posts_per_page'] = $count;
    }
    add_filter('posts_where', 'like_title_filter', 10, 2);
    $query = new WP_Query();
    $posts = $query->query($args);
    remove_filter('posts_where', 'like_title_filter', 10);
    ob_start();
    get_template_part('template-parts/recipes-list', null, [
        'recipes' => $posts,
    ]);
    $data = ob_get_contents();
    ob_end_clean();

    wp_send_json([
        'success' => 1,
        'recipes' => $data,
    ]);
    wp_die();
}

add_action('wp_ajax_replace_recipe_request', 'replace_recipe_request');

function replace_recipe_request()
{
    check_ajax_referer('ajax_nonce');

    $recipe = $_POST['recipe'];
    $day = $_POST['day'];
    $week = $_POST['week'];
    $category = $_POST['category'];
    $plan = get_user_plan();
    $plan[$week][$day][$category] = $recipe;
    update_field('current_plan', $plan, 'user_'.get_current_user_id());

    ob_start();
    get_template_part('loop-templates/content-my-plan');
    $data = ob_get_contents();
    ob_end_clean();

    wp_send_json([
        'success' => 1,
        'data'    => $data,
    ]);
    wp_die();
}

add_action('wp_ajax_get_recipe_details_request', 'get_recipe_details_request');

function get_recipe_details_request()
{
    check_ajax_referer('ajax_nonce');

    $recipe = $_GET['recipe'];
    $postRecipe = get_post($recipe);

    if (! $postRecipe) {
        wp_send_json([
            'success' => 0,
        ]);
    }
    ob_start();
    get_template_part('template-parts/recipe-modal-details', '', ['recipe' => $postRecipe]);
    $data = ob_get_contents();
    ob_end_clean();

    wp_send_json([
        'success' => 1,
        'data'    => $data,
        'title'   => $postRecipe->post_title,
    ]);
    wp_die();
}

add_action('wp_ajax_get_grocery_details_request', 'get_grocery_details_request');
function get_grocery_details_request()
{
    check_ajax_referer('ajax_nonce');

    ob_start();
    get_template_part('template-parts/grocery-modal');
    $data = ob_get_contents();
    ob_end_clean();

    wp_send_json([
        'success' => 1,
        'data'    => $data,
    ]);
    wp_die();
}

function get_recipe_category_slug_by_name($name)
{
    $arr = [
        'Breakfast'     => 'breakfast',
        'Morning snack' => 'snack',
        'Lunch'         => 'lunch',
        'Evening snack' => 'snack',
        'Dinner'        => 'dinner',
        'Cocktail'      => 'snack',
        'Dessert'       => 'snack',
    ];
    if (array_key_exists($name, $arr)) {
        return $arr[$name];
    }

    return 'lunch';
}

function get_user_plan_status($userId = false)
{
    if (! $userId) {
        $userId = get_current_user_id();
    }
    $userKey = 'user_'.$userId;
    return get_field('current_plan_status', $userKey);
}

function generate_new_user_plan($userId = false)
{
    if (! $userId) {
        $userId = get_current_user_id();
    }

    $key = 'user_'.$userId;
    $planStatus = get_field('current_plan_status', $key);
    if (is_null($planStatus) || $planStatus == 1) {
        update_field('current_plan_status', 0, 'user_'.$userId);
        PlanGenerator()->handle($userId);
    }

}