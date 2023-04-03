<?php
function get_meat_list()
{
    return [
        [
            'name'  => 'Turkey',
            'alias' => 'turkey',
            'class' => 'meat',
            'class_new' => 'check_class1',
        ],
        [
            'name'  => 'Chicken',
            'alias' => 'chicken',
            'class' => 'meat',
            'class_new' => 'check_class1',
        ],
        [
            'name'  => 'Pork',
            'alias' => 'pork',
            'class' => 'meat',
            'class_new' => 'check_class1',
        ],
        [
            'name'  => 'Beef',
            'alias' => 'beef',
            'class' => 'meat',
            'class_new' => 'check_class1',
        ],
        [
            'name'  => 'Fish',
            'alias' => 'fish',
            'class' => 'meat',
            'class_new' => 'check_class1',
        ],
        [
            'name'  => 'Lamb',
            'alias' => 'lamb',
            'class' => 'meat',
            'class_new' => 'check_class1',
        ],
        [
            'name'  => 'Veal',
            'alias' => 'veal',
            'class' => 'meat',
            'class_new' => 'check_class1',
        ],
        [
            'name'  => 'I am vegetarian',
            'alias' => 'vegetarian',
            'class' => 'vegetarian',
            'class_new' => 'check_class2',
        ],
        [
            'name'  => 'I am vegan',
            'alias' => 'vegan',
            'class' => 'vegan',
            'class_new' => 'check_class3',
        ],
    ];
}

function get_products_list()
{
    return [
        [
            'name'  => 'Onions',
            'alias' => 'onions',
        ],
        [
            'name'  => 'Mushrooms',
            'alias' => 'mushrooms',
        ],
        [
            'name'  => 'Eggs',
            'alias' => 'egg',
        ],
        [
            'name'  => 'Nuts',
            'alias' => 'nuts',
        ],
        [
            'name'  => 'Cheese',
            'alias' => 'cheese',
        ],
        [
            'name'  => 'Butter',
            'alias' => 'butter',
        ],
        [
            'name'  => 'Milk',
            'alias' => 'milk',
        ],
        [
            'name'  => 'Avocados',
            'alias' => 'avocado',
        ],
        [
            'name'  => 'Seafood',
            'alias' => 'seafood',
        ],
        [
            'name'  => 'Olives',
            'alias' => 'olives',
        ],
        [
            'name'  => 'Capers',
            'alias' => 'capers',
        ],
        [
            'name'  => 'Coconut',
            'alias' => 'coconut',
        ],
	    /*
        [
            'name'  => 'Goat cheese',
            'alias' => 'goat_cheese',
        ],
	    */
    ];
}



function has_user_food($search, $type = 'products', $userId = null)
{
    if (! $userId) {
        $userId = get_current_user_id();
    }
    $food = get_field($type, 'user_' . $userId) ?? [];

    return in_array($search, $food);
}