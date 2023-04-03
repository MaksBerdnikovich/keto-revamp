<?php

function get_step_list() {
    return [
        [
            'id'  => 'male',
            'name' => 'Male',
            'value' => 'm',
            'image' => get_image_url('quiz/step0/1.svg'),
        ],
        [
            'id'  => 'female',
            'name' => 'Female',
            'value' => 'w',
            'image' => get_image_url('quiz/step0/2.svg'),
        ],
    ];
}

function get_step1_list() {
    return [
        [
            'id'  => 'expert',
            'name' => 'Expert',
            'value' => '0',
            'image' => [
                'man' => get_image_url('quiz/step1/1.svg'),
                'woman' => get_image_url('quiz/step1/4.svg'),
            ],
        ],
        [
            'id'  => 'familiar',
            'name' => 'I’m familiar',
            'value' => '1',
            'image' => [
                'man' => get_image_url('quiz/step1/2.svg'),
                'woman' => get_image_url('quiz/step1/5.svg'),
            ],
        ],
        [
            'id'  => 'beginner',
            'name' => 'Beginner',
            'value' => '2',
            'image' => [
                'man' => get_image_url('quiz/step1/3.svg'),
                'woman' => get_image_url('quiz/step1/6.svg'),
            ],
        ],
    ];
}

function get_step2_list() {
    return [
        [
            'id'  => 'weight_loss',
            'name' => 'Weight loss',
            'value' => '1',
            'image' => get_image_url('quiz/step2/1.svg'),
        ],
        [
            'id'  => 'reduced_blood',
            'name' => 'Reduced blood pressure',
            'value' => '2',
            'image' => get_image_url('quiz/step2/2.svg'),
        ],
        [
            'id'  => 'slower_process',
            'name' => 'Slower aging process',
            'value' => '3',
            'image' => get_image_url('quiz/step2/3.svg'),
        ],
        [
            'id'  => 'improved_sleep',
            'name' => 'Improved sleep and mood',
            'value' => '4',
            'image' => get_image_url('quiz/step2/4.svg'),
        ],
        [
            'id'  => 'increased_energy',
            'name' => 'Increased energy efficiency',
            'value' => '5',
            'image' => get_image_url('quiz/step2/5.svg'),
        ],
    ];
}

function get_step3_list() {
    return [
        [
            'id'  => 'up_to_30',
            'name' => 'Up to 30 minutes',
            'value' => '30',
            'image' => get_image_url('quiz/step3/1.svg'),
        ],
        [
            'id'  => 'up_to_1_hour',
            'name' => 'Up to<br>1 hour',
            'value' => '60',
            'image' => get_image_url('quiz/step3/2.svg'),
        ],
        [
            'id'  => 'more_than_1_hour',
            'name' => 'More than<br>1 hour',
            'value' => '61',
            'image' => get_image_url('quiz/step3/3.svg'),
        ],
    ];
}

function get_step4_list()
{
    return [
        [
            'id' => 'turkey',
            'name'  => 'Turkey',
            'icon' => 'step4-ico1',
        ],
        [
            'id' => 'chicken',
            'name'  => 'Chicken',
            'icon' => 'step4-ico2',
        ],
        [
            'id' => 'pork',
            'name'  => 'Pork',
            'icon' => 'step4-ico3',
        ],
        [
            'id' => 'beef',
            'name'  => 'Beef',
            'icon' => 'step4-ico4',
        ],
        [
            'id' => 'fish',
            'name'  => 'Fish',
            'icon' => 'step4-ico5',
        ],
        [
            'id' => 'lamb',
            'name'  => 'Lamb',
            'icon' => 'step4-ico6',
        ],
        [
            'id' => 'veal',
            'name'  => 'Veal',
            'icon' => 'step4-ico7',
        ],
        [
            'id' => 'vegetarian',
            'name'  => 'I am vegetarian',
            'icon' => 'step4-ico8',
        ],
        [
            'id' => 'vegan',
            'name'  => 'I am vegan',
            'icon' => 'step4-ico9',
        ],
    ];
}

function get_step5_list()
{
    return [
        [
            'id' => 'onions',
            'name'  => 'Onions',
            'icon' => 'step5-ico1',
        ],
        [
            'id' => 'mushrooms',
            'name'  => 'Mushrooms',
            'icon' => 'step5-ico2',
        ],
        [
            'id' => 'egg',
            'name'  => 'Eggs',
            'icon' => 'step5-ico3',
        ],
        [
            'id' => 'nuts',
            'name'  => 'Nuts',
            'icon' => 'step5-ico4',
        ],
        [
            'id' => 'cheese',
            'name'  => 'Cheese',
            'icon' => 'step5-ico5',
        ],
        [
            'id' => 'butter',
            'name'  => 'Butter',
            'icon' => 'step5-ico6',
        ],
        [
            'id' => 'milk',
            'name'  => 'Milk',
            'icon' => 'step5-ico7',
        ],
        [
            'id' => 'avocado',
            'name'  => 'Avocados',
            'icon' => 'step5-ico8',
        ],
        [
            'id' => 'seafood',
            'name'  => 'Seafood',
            'icon' => 'step5-ico9',
        ],
        [
            'id' => 'olives',
            'name'  => 'Olives',
            'icon' => 'step5-ico10',
        ],
        [
            'id' => 'capers',
            'name'  => 'Capers',
            'icon' => 'step5-ico11',
        ],
        [
            'id' => 'coconut',
            'name'  => 'Coconut',
            'icon' => 'step5-ico12',
        ]
    ];
}

function get_step6_list() {

    return [
        [
            'id'  => 'hero',
            'name' => 'Workout Champ<br/>(3-5 workouts/week)',
            'image' => [
                'man' => get_image_url('quiz/step6/1.svg'),
                'woman' => get_image_url('quiz/step6/4.svg'),
            ],
        ],
        [
            'id'  => 'light',
            'name' => 'Moderately Active<br/>(1-2 workouts/week)',
            'image' => [
                'man' => get_image_url('quiz/step6/2.svg'),
                'woman' => get_image_url('quiz/step6/5.svg'),
            ],
        ],
        [
            'id'  => 'newbie',
            'name' => 'Couch Cardio<br/>(Just getting started)',
            'image' => [
                'man' => get_image_url('quiz/step6/3.svg'),
                'woman' => get_image_url('quiz/step6/6.svg'),
            ],
        ],
    ];
}

function get_step7_list() {
    return [
        [
            'id'  => '0',
            'name' => 'I want to give <br/>the Keto diet a try',
            'image' => get_image_url('quiz/step7/1.svg'),
        ],
        [
            'id'  => '1',
            'name' => 'I want to give it a try <br/>and lose some weight',
            'image' => get_image_url('quiz/step7/2.svg'),
        ],
        [
            'id'  => '2',
            'name' => 'I want to lose <br/>as much weight as possible',
            'image' => get_image_url('quiz/step7/3.svg'),
        ],
    ];
}

function get_step8_list() {
    return [
        [
            'id'  => 'vacation',
            'name' => 'Vacation',
            'image' => get_image_url('quiz/step8/1.svg'),
        ],
        [
            'id'  => 'wedding',
            'name' => 'Wedding',
            'image' => get_image_url('quiz/step8/2.svg'),
        ],
        [
            'id'  => 'holiday',
            'name' => 'Holiday',
            'image' => get_image_url('quiz/step8/3.svg'),
        ],
        [
            'id'  => 'summer',
            'name' => 'Summer',
            'image' => get_image_url('quiz/step8/4.svg'),
        ],
        [
            'id'  => 'reunion',
            'name' => 'Reunion',
            'image' => get_image_url('quiz/step8/5.svg'),
        ],
        [
            'id'  => 'birthday',
            'name' => 'Birthday',
            'image' => get_image_url('quiz/step8/6.svg'),
        ],
        [
            'id'  => 'other',
            'name' => 'Other',
            'image' => get_image_url('quiz/step8/7.svg'),
        ],
        [
            'id'  => 'not_event',
            'name' => 'I don’t have an event',
            'image' => get_image_url('quiz/step8/8.svg'),
        ],
    ];
}