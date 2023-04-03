<?php

function generate_calculator_results() {
    if ( ! $_POST ) {
        return 'Wrong data';
    }

    $gender       = $_POST['gender'];
    $activity     = $_POST['activity'];
    $motivation   = $_POST['motivation'];
    $weekLose     = calculate_week_lose( $motivation );
    $system       = $_POST['system'];
    $age          = $system == 'imperial' ? (int)$_POST['age_1'] : (int)$_POST['age'];
    $weight       = $system == 'imperial' ? (int)$_POST['weight_1'] : (int)$_POST['weight'];
    $targetWeight = $system == 'imperial' ? (int)$_POST['target_weight_1'] : (int)$_POST['target_weight'];
    $event        = $_POST['event_type'];

    $weight_gr        = $weight;
    $target_weight_gr = $targetWeight;

    if ( $system == 'imperial' ) {
        $height       = convert_height_to_metric( $_POST['height_1'], $_POST['height_2'] );
        $weight       = convert_weight_to_metric( $weight );
        $targetWeight = convert_weight_to_metric( $targetWeight );
    } else {
        $height = $_POST['height'];
    }

    $bmi = $weight / pow( $height / 100, 2 );

    $dailyCalories = calculate_daily_calories( $weight, $height, $age, $gender, $motivation, $activity );

    if ( $bmi <= 18.5 ) {
        $bmiCategory = 'Underweight';
    } elseif ( $bmi > 18.5 && $bmi < 25 ) {
        $bmiCategory = 'Normal';
    } else {
        $bmiCategory = 'Overweight';
    }

    $firstWeekLose = calculate_first_week_lose( $motivation );
    $weeksCount    = calculate_weeks_count( $weight, $targetWeight, $weekLose, $firstWeekLose );

    $weeksCount = round( $weeksCount );

    $now = carbon_now();
    $end = carbon_now()->addWeeks( $weeksCount );

    $eventDate = $_POST['event_date'];

    $eventWeight = - 1;
    if ( $_POST['event_type'] && $_POST['event_type'] !== 'none'  && $eventDate) {
        $eventDateCarbon = carbon_parse( $eventDate );
        if ( $eventDateCarbon->gte( $end ) || $eventDateCarbon->lte( $now ) ) {
            $eventWeight = $targetWeight;
        } else {
            $eventWeeks  = $now->diffInWeeks( $eventDateCarbon );
            $eventWeight = calculate_weight_in_weeks( $eventWeeks, $weight, $firstWeekLose, $weekLose );
        }
        if ( $system == 'imperial' ) {
            $eventWeight = convert_weight_to_imperial( $eventWeight );
        }
    }

    if ( $system == 'imperial' ) {
        $firstWeekLose = convert_weight_to_imperial( $firstWeekLose );
    }

    $firstMonthLose = round( $firstWeekLose + $weekLose * 3 );

    $fats = round( $dailyCalories * .6 / 9 );
    $protein = round( $dailyCalories * .35 / 4 );
    $carbs = round( $dailyCalories * .05 / 4 );
    $water = round( $weight * .2 / 3 );
    if ( $system == 'metric' ) {
        $water = convert_water_to_metric( $water );
    }

    return [
        'graph'            => get_estimation_data( $weight, $targetWeight, $now, $end ),
        'graph_new'        => get_graph_data( $weight_gr, $target_weight_gr, $eventWeight, $now, $end, $eventDate , $system),
        'weeks'            => $end->format( 'F, Y' ),
        'calories'         => round( $dailyCalories ),
        'bmi_category'     => $bmiCategory,
        'bmi'              => round( $bmi, 2 ),
        'first_week_lose'  => round( $firstWeekLose, 1 ),
        'first_month_lose' => $firstMonthLose . ' ' . get_weight_unit( $firstMonthLose, $system ),
        'first_month'      => $now->format( 'F, Y' ),
        'middle_month'     => $now->clone()->addWeeks( $weeksCount / 2 )->format( 'M' ),
        'last_month'       => $end->format( 'M' ),
        'event_weight'     => $eventWeight,
        'to_event_weight'  => ((int)$weight_gr - (int)$eventWeight). ' ' . get_weight_unit( $system ),
        'event'            => $event,
        'event_point'      => strtotime($eventDate) >= strtotime($end) ? 3 : 2,
        'fats'             => $fats,
        'protein'          => $protein,
        'carbs'            => $carbs,
        'water'            => $water.''.get_water_unit(),
        'activity'         => get_activity_data($activity, $gender),
        'motivation'       => $motivation + 1,
    ];
}

function get_graph_data( $startWeight, $endWeight, $eventWeight, $now, $end, $event, $system ) {
    $d1 = strtotime($now);
    $d2 = strtotime($event);
    $d3 = strtotime($end);
    $is_event_later = $d2 > $d3;

    return [
        'point0' => [
            'x' => 0,
            'y' => $startWeight,
            'label' => date("M, Y", strtotime ( '-1 month' , $d1 )),
            'indexLabel' => '',
            'markerColor' => '',
            'markerSize' => 0
        ],
        'point1' => [
            'x' => 1,
            'y' => $startWeight,
            'label' => date("M, Y", $d1),
            'indexLabel' => $startWeight.' '.get_weight_unit( $system ),
            'markerColor' => '#F15E6B',
            'markerSize' => 15
        ],
        'point2' => [
            'x' => 2,
            'y' => $is_event_later ? $endWeight : $eventWeight,
            'label' => $is_event_later ? date("M, Y", $d3) : date("M, Y", $d2),
            'indexLabel' => $is_event_later ? $endWeight.' '.get_weight_unit( $system ) : $eventWeight.' '.get_weight_unit( $system ),
            'markerColor' => $is_event_later ? '#1ED487' : '#F15E6B',
            'markerSize' => 15
        ],
        'point3' => [
            'x' => 3,
            'y' => !$is_event_later ? $endWeight : $eventWeight,
            'label' => !$is_event_later ? date("M, Y", $d3) : date("M, Y", $d2),
            'indexLabel' => !$is_event_later ? $endWeight.' '.get_weight_unit( $system ) : $eventWeight.' '.get_weight_unit( $system ),
            'markerColor' => '#1ED487',
            'markerSize' => 15
        ],
        'point4' => [
            'x' => 4,
            'y' => !$is_event_later ? $endWeight : $eventWeight,
            'label' => !$is_event_later ? date("M, Y", strtotime ( '+1 month' , $d3 )) : date("M, Y", strtotime ( '+1 month' , $d2 )),
            'indexLabel' => '',
            'markerColor' => '',
            'markerSize' => 0
        ],
        'point5' => [
            'x' => 5,
            'y' => !$is_event_later ? $endWeight : $eventWeight,
            'label' => !$is_event_later ? date("M, Y", strtotime ( '+2 month' , $d3 )) : date("M, Y", strtotime ( '+2 month' , $d2 )),
            'indexLabel' => '',
            'markerColor' => '',
            'markerSize' => 0
        ],
    ];
}

function get_activity_data($activity, $gender) {
    $result = array();

    switch ( $activity ) {
        case 'hero';
            $result['name'] = 'Workout Champ';
            $result['val'] = $gender == 'm' ? '1' : '4';
            break;
        case 'light':
            $result['name'] = 'Moderately Active';
            $result['val'] = $gender == 'm' ? '2' : '5';
            break;
        case 'newbie';
            $result['name'] = 'Couch Cardio';
            $result['val'] = $gender == 'm' ? '3' : '6';
            break;
    }

    return $result;
}

function calculate_weight_in_weeks( $eventWeeks, $weight, $firstWeekLose, $weekLose ) {
    if ( $eventWeeks < 2 ) {
        return $weight - $firstWeekLose;
    } else {
        return $weight - $firstWeekLose - $weekLose * ( $eventWeeks - 1 );
    }
}

function calculate_first_week_lose( $motivation ) {
    if ( $motivation == 0 ) {
        $firstWeekLose = 3.5;
    } elseif ( $motivation == 1 ) {
        $firstWeekLose = 4;
    } else {
        $firstWeekLose = 4.5;
    }

    return $firstWeekLose;
}

function calculate_motivation( $motivation ) {
    if ( $motivation == 0 ) {
        $lose = 0;
    } elseif ( $motivation == 1 ) {
        $lose = 300;
    } else {
        $lose = 500;
    }

    return $lose;
}

function calculate_week_lose( $motivation ) {
    if ( $motivation == 0 ) {
        $lose = 1.5;
    } elseif ( $motivation == 1 ) {
        $lose = 2;
    } else {
        $lose = 2.5;
    }

    return $lose;
}

function calculate_weeks_count( $weight, $targetWeight, $weekLose, $firstWeekLose ) {
    if ( $weight > $targetWeight ) {
        $diffWeight     = $weight - $targetWeight;
        $firstMonthLose = $firstWeekLose + 3 * $weekLose;
        if ( $diffWeight <= $firstMonthLose ) {
            return $diffWeight / $firstWeekLose;
        } else {
            return 4 + ( ( $diffWeight - $firstMonthLose ) / $weekLose );
        }
    }

    return 1;
}

function get_estimation_data( $startWeight, $endWeight, $now, $end ) {
    return [
        'data'   => [ $startWeight, $endWeight ],
        'labels' => [ $now->format( 'F Y' ), $end->format( 'F Y' ) ],
    ];
}

function get_recipes_by_calories( $calories, $products ) {
    $fat = round( $calories * rand( 50, 80 ) / 900 );
    //$protein = round($calories * rand(30, 40) / 400);
    //$carbs = round($calories * rand(5, 10) / 400);

    $breakFast    = pickup_recipe( $fat, $calories, 0.25, $products, 'breakfast' );
    $morningSnack = pickup_recipe( $fat, $calories, 0.1, $products, 'snack' );
    $lunch        = pickup_recipe( $fat, $calories, 0.5, $products, 'lunch' );
    $eveningSnack = pickup_recipe( $fat, $calories, 0.1, $products, 'snack' );
    $dinner       = pickup_recipe( $fat, $calories, 0.25, $products, 'dinner' );

    $plan = [
        'Breakfast'     => $breakFast->ID,
        'Morning snack' => $morningSnack->ID,
        'Lunch'         => $lunch->ID,
        'Evening snack' => $eveningSnack->ID,
        'Dinner'        => $dinner->ID,
    ];

    return $plan;
}

function pickup_recipe(
    $fat,
    $calories,
    $startStep,
    $products,
    $category = 'lunch'
) {
    $stepFat = 0.1;
    while ( true ) {
        $minFat      = $fat * ( $startStep - $stepFat );
        $maxFat      = $fat * ( $startStep + $stepFat );
        $caloriesMin = $calories * ( $startStep - 0.2 );
        $caloriesMax = $calories * ( $startStep + 0.2 );
        $recipe      = get_recipe_by_fc( $minFat, $maxFat, $caloriesMin, $caloriesMax, $products, $category );
        if ( $recipe ) {
            return $recipe;
        }
        $stepFat += 0.05;
        if ( $stepFat >= 1 ) {
            break;
        }
    }

    return get_recipe_by_fc( 0, 9999, 0, 9999, $products, $category );
}

function get_recipe_by_fc(
    $fatMin,
    $fatMax,
    $caloriesMin,
    $caloriesMax,
    $products,
    $category = 'lunch'
) {

    $args = [
        'post_type'      => 'recipe',
        'orderby'        => 'rand',
        'posts_per_page' => - 1,
        'meta_query'     => [
            [
                'key'     => 'fat',
                'value'   => [ $fatMin, $fatMax ],
                'type'    => 'NUMERIC',
                'compare' => 'BETWEEN',
            ],
            [
                'key'     => 'calories',
                'value'   => [ $caloriesMin, $caloriesMax ],
                'type'    => 'NUMERIC',
                'compare' => 'BETWEEN',
            ],
        ],
        'tax_query'      => [
            'relation' => 'AND',
            [
                'taxonomy' => 'recipe_cat',
                'field'    => 'slug',
                'terms'    => $category,
            ],
        ],
    ];
    if ( $products ) {
        $args['tax_query'][] = [
            'taxonomy' => 'recipe_product',
            'field'    => 'id',
            'terms'    => get_terms_ids_by_slug( $products, 'recipe_product' ),
            'operator' => 'NOT IN',
        ];
    }
    $posts = get_posts( $args );

    //return $posts;
    return count( $posts ) ? $posts[0] : false;
}

function calculate_daily_nutrients( $recipes, $dailyCalories ) {
    $dailyNutrients = [
        'fat'      => [
            'norm'    => round( $dailyCalories * .6 / 9 ),
            'current' => 0,
            'percent' => 0,
        ],
        'protein'  => [
            'norm'    => round( $dailyCalories * .35 / 4 ),
            'current' => 0,
            'percent' => 0,
        ],
        'carbs'    => [
            'norm'    => round( $dailyCalories * .05 / 4 ),
            'current' => 0,
            'percent' => 0,
        ],
        'calories' => [
            'norm'    => round( $dailyCalories ),
            'current' => 0,
            'percent' => 0,
        ],
    ];
    foreach ( $recipes as $recipe ) {
        if ( ! $recipe ) {
            continue;
        }
        $dailyNutrients['fat']['current']      += round( get_field( 'fat', $recipe->ID ) );
        $dailyNutrients['protein']['current']  += round( get_field( 'protein', $recipe->ID ) );
        $dailyNutrients['carbs']['current']    += round( get_field( 'carbs', $recipe->ID ) );
        $dailyNutrients['calories']['current'] += round( get_field( 'calories', $recipe->ID ) );
    }

    $dailyNutrients['fat']['percent']      = $dailyNutrients['fat']['current'] / $dailyNutrients['fat']['norm'] * 100;
    $dailyNutrients['protein']['percent']  = $dailyNutrients['protein']['current'] / $dailyNutrients['protein']['norm'] * 100;
    $dailyNutrients['carbs']['percent']    = $dailyNutrients['carbs']['current'] / $dailyNutrients['carbs']['norm'] * 100;
    $dailyNutrients['calories']['percent'] = $dailyNutrients['calories']['current'] / $dailyNutrients['calories']['norm'] * 100;

    return $dailyNutrients;
}

function calculate_daily_calories( $weight, $height, $age, $gender, $motivation, $activity ) {
    switch ( $activity ) {
    case 'hero';
        $pal = 2.2;
        break;
    case 'newbie';
        $pal = 1.5;
        break;
    case 'light':
    default:
        $pal = 1.9;
        break;
    }
    $bmr = ( 10 * $weight ) + ( 6.25 * $height ) - ( 5 * $age );

    if ( $gender === 'w' ) {
        $bmr += - 161;
    } else {
        $bmr += 5;
    }

    return round( $bmr * $pal - calculate_motivation( $motivation ) );
}

function convert_height_to_metric( $height1, $height2, $toSystem = 'metric' ) {
    //if ($toSystem == 'metric') {
    $height1 = $height1 * 30.47;
    $height2 = $height2 * 2.54;

    return $height1 + $height2;
    //} else {
    //$inches = $height1 / 2.54;
    //$feet = intval($inches / 12);
    //$inches = $inches % 12;
    //
    //return $feet + $inches;
    //}
}

function convert_weight_to_metric( $weight ) {
    //if ($toSystem == 'metric') {

    return $weight / 2.25;
    //}

    //return $weight * 2.25;
}

function convert_weight_to_imperial( $weight ) {
    return $weight * 2.25;
}

function convert_water_to_metric( $water ) {
    return round($water / 2.113);
}

function get_weight_unit( $value = false, $system = false ) {
    if ( ! $system ) {
        $system = $_POST['system'];
    }

    if ( $system == 'imperial' ) {
        return $value == 1 ? 'lb' : 'lbs';
    }

    return 'kg';
}

function get_current_weight_unit( $value = false ) {
    $system = get_field( 'system', 'user_' . get_current_user_id() );

    return get_weight_unit( $value, $system );
}

function get_current_height_unit( $value = false ) {
	$system = get_field( 'system', 'user_' . get_current_user_id() );
	
	return get_height_unit( $system );
}

function get_height_unit( $system = false ) {
    if ( ! $system ) {
        $system = $_POST['system'];
    }

    return $system == 'metric' ? 'cm' : 'ft';
}

function get_water_unit($system = false) {
    if ( ! $system ) {
        $system = $_POST['system'];
    }

    return $system == 'metric' ? 'l' : 'oz';
}

function get_gender_name( $gender = false ) {
    if ( ! $gender ) {
        $gender = $_POST['gender'];
    }

    return $gender == 'm' ? 'Man' : 'Woman';
}

function get_bmi_categories() {
    return [
        'Underweight',
        'Normal',
        'Overweight',
    ];
}

function get_terms_ids_by_slug( $slugs, $tax ) {
    return get_terms( [
        'taxonomy'   => $tax,
        'slug'       => $slugs,
        'hide_empty' => false,
        'fields'     => 'ids',
    ] );
}

function get_excluded_terms_ids_by_slug( $slugs, $tax ) {
    $excludedTerms = get_terms_ids_by_slug( $slugs, $tax );

    return get_terms( [
        'taxonomy'   => $tax,
        'slug'       => $slugs,
        'hide_empty' => false,
        'exclude'    => $excludedTerms,
        'fields'     => 'ids',
    ] );
}

function get_user_products( $userId = false ) {
    if ( ! $userId ) {
        $userId = get_current_user_id();
    }

    $userKey = 'user_' . $userId;

    $product = get_field( 'products', $userKey );
    $meat = get_field( 'meat', $userKey );

    return array_merge($product, $meat);
}

function get_user_meat( $userId = false ) {
    if ( ! $userId ) {
        $userId = get_current_user_id();
    }

    return get_field( 'meat', 'user_' . $userId );
}

function is_user_vegan( $userId = false ) {
    return has_user_meat( 'vegan', $userId );
}

function is_user_vegetarian( $userId = false ) {
    return has_user_meat( 'vegetarian', $userId );
}

function has_user_meat( $name, $userId = false ) {
    if ( ! $userId ) {
        $userId = get_current_user_id();
    }

    $meat = get_field( 'meat', 'user_' . $userId );

    return in_array( $name, $meat );
}

