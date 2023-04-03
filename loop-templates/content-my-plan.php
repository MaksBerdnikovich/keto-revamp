<?php
$plan = get_user_plan();

// Graph data
$userId = get_current_user_id();
$event = ucfirst(get_field('event', 'user_' . $userId));
$eventPoint = intval(get_field('event_point', 'user_' . $userId));
$firstMonthLose = get_field('first_month_lose', 'user_' . $userId);
$firstMonth = get_field('first_month', 'user_' . $userId);
$toEventWeight = get_field('to_event_weight', 'user_' . $userId);
function get_db_graph_data(){
    $data = $dataBefore = $dataAfter = [];
    $userId = get_current_user_id();
    $dataBefore = get_field('graph', 'user_' . $userId);
    $lastPointY = intval($dataBefore['point5']['y']);
    $lastPointLabel = $dataBefore['point5']['label'];

    for ($i = 6; $i <= 10; $i++) {
        $dataAfter['point' . $i] = [
            'x' => $i,
            'y' => $lastPointY,
            'label' => date("M, Y", strtotime('+' . ($i - 5) . ' month', strtotime($lastPointLabel))),
            'indexLabel' => '',
            'markerColor' => '',
            'markerSize' => 0
        ];
    }

    $data = array_merge($dataBefore, $dataAfter);

    return $data;
}

?>

<div class="dashboard">
    <div class="container">
        <div class="home-db-graph m-bottom-3"><!--Home Graph Start-->
            <div class="title-h4 m-bottom-1">
                Based on your answers, You'll be
                <span class="primary-color"><?= $firstMonthLose ?></span> by
                <span class="primary-color"><?= $firstMonth ?></span> and
                <span class="primary-color">lose <?= $toEventWeight ?></span> by the <?= $event ?>
            </div>
            <div class="home-db-graph__wrap">
                <div class="home-db-graph__inner">
                    <div id="chartContainer" class="chartContainer"
                         data-graph="<?= htmlspecialchars(json_encode(get_db_graph_data())); ?>"
                         data-event="<?= $event ?>"
                         data-event-point="<?= $eventPoint ?>">
                    </div>
                </div>
                <div class="stays">
                    <span>The weight stays off</span> <i class="icon-arrow-1"></i>
                </div>
                <div class="legend">
                    <ul>
                        <li class="curr"><span>Current weight</span></li>
                        <li class="goal"><span>Goal weight</span></li>
                    </ul>
                </div>
            </div>
        </div><!--Home Graph End-->

        <div class="home-db-motivation m-bottom-1"><!--Home Motivation Start-->
            <div class="title-h4 m-bottom-1">Your daily motivation</div>
            <div class="home-db-motivation__wrap">
                <div class="carousel">
                    <div class="carousel__slide">
                        <b>You deserve to be healthy, You Deserve to be fit</b> <span>Mr.Smith</span>
                    </div>
                    <div class="carousel__slide">
                        <b>You deserve to be healthy, You Deserve to be fit</b> <span>Mr.Smith</span>
                    </div>
                    <div class="carousel__slide">
                        <b>You deserve to be healthy, You Deserve to be fit</b> <span>Mr.Smith</span>
                    </div>
                </div>
            </div>
        </div><!--Home Motivation End-->

        <div class="home-db-plans__action">
            <div class="title">
                <a href="javascript:void(0)" data-fancybox data-src="#mealGuide"><i class="icon-info-2"></i></a>
                <div class="title-h4">Your Custom Meal Plan</div>
            </div>
            <div class="actions">
                <div class="action__item action-week">
                    <div class="quantity-group quantity-group--week">
                        <button type="button" class="btn-minus"><i class="icon-right-arrow"></i></button>
                        <span>Week</span>&nbsp;<span id="current-week-text">1</span>
                        <button type="button" class="btn-plus"><i class="icon-right-arrow"></i></button>
                    </div>
                </div>
                <!--
				<div class="action__item action-filter">
					<button class="btn btn-outline btn-primary" data-fancybox data-src="#filter">
						<i class="icon-filter-2"></i> <span>Filter</span>
					</button>
				</div>
				-->
                <div class="action__item action-print">
                    <form target="_blank" method="post" action="<?php echo get_print_ulr() ?>">
                        <input type="hidden" name="type" value="week_all">
                        <input type="hidden" name="id" value="1">
                        <button class="btn btn-outline btn-primary">
                            <i class="icon-print"></i> <span>Print my meal plan</span>
                        </button>
                    </form>
                </div>
                <div class="action__item action-download">
                    <button class="btn btn-solid btn-primary btn-small home-db-plans-grocery" data-fancybox data-src="#groceryList">
                        <i class="icon-save"></i> <span>Download shopping list</span>
                    </button>
                </div>
            </div>
        </div>

        <?php foreach ($plan as $weekNumber => $weekPlan): ?>
            <div id="week-<?php echo $weekNumber; ?>"
             class="home-db-plans__week" <?php if($weekNumber != 1): ?>style="display: none"<?php endif; ?>>
            <div class="home-db-plans home-db-plans-week-<?php echo $weekNumber; ?>">
                <?php foreach ($weekPlan as $key => $planItem): ?>
                    <?php
                    $res = get_daily_user_plan($planItem);
                    ?>
                    <div class="home-db-plans__grid grid panel">
                        <div class="home-db-plans__grid-title">Day <?= $key ?></div>
                        <div class="grid-row">
                            <?php foreach ($res['recipes'] as $recipeType => $recipe): ?>
                                <?php
                                $image = has_post_thumbnail($recipe) ? get_the_post_thumbnail_url($recipe, 'full') : get_image_url('db/home/dummy.png');
                                $calories = round(get_field('calories', $recipe->ID));
                                ?>
                                <div class="grid-col col-20">
                                    <div class="grid-item home-db-plans__grid-item home-db-plans-card"
                                         data-category="<?= $recipeType ?>" data-day="<?= $key ?>" data-week="<?php echo $weekNumber ?>"
                                         data-recipe="<?= $recipe->ID ?>">
                                        <div class="home-db-plans__grid-image">
                                            <img src="<?= $image ?>" alt="<?= $recipe->post_title ?>">
                                            <span class="label"><?= $recipeType ?></span>
                                        </div>
                                        <div class="home-db-plans__grid-info">
                                            <div class="home-db-plans__grid-recipe">
                                                <a href="javascript:void(0)" class="kcal">
                                                    <i class="icon-calories"></i> <span><?= $calories ?> kcal</span>
                                                </a>
                                                <a href="javascript:void(0)" class="home-db-plans-swap swap"
                                                   data-parent="week-1" data-category="<?= $recipeType ?>"
                                                   data-day="<?= $key ?>" data-week="<?php echo $weekNumber ?>">
                                                    <i class="icon-Shape-3"></i> <span>Swap this recipe</span>
                                                </a>
                                            </div>
                                            <div class="home-db-plans__grid-name"><?= $recipe->post_title ?></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endforeach; ?>

    </div>
</div>

<div id="recipeSwap" class="dashboard-modal home-db-recipes-modal" style="display:none;"><!--Recipes Modal Start-->
    <div class="preloader element">
        <div class="preloader__loader"></div>
    </div>

    <div class="page-title m-bottom-1">
        <div class="title-h3">Select New Recipe</div>
    </div>

    <div class="search-recipe-container">
        <div class="grid">
            <div class="grid-row">
                <div class="grid-col col-75">
                    <div class="grid-item">
                        <input id="search-recipe-input" class="input-text" placeholder="Enter recipe name...">
                    </div>
                </div>
                <div class="grid-col col-25">
                    <div class="grid-item">
                        <button class="btn btn-solid btn-primary btn-large search-recipe-button">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="dashboard-modal-body"></div>

    <div class="recipes-modal__btn">
        <button class="btn btn-solid btn-primary btn-large load-more-button">Load more</button>
    </div>
</div><!--Recipes Modal End-->

<div id="recipeCard" class="dashboard-modal home-db-food-card-modal" style="display:none;"><!--Food Card Modal Start-->
    <div class="preloader element">
        <div class="preloader__loader"></div>
    </div>

    <div class="dashboard-modal-body"></div>
</div><!--Food Card Modal End-->

<div id="mealGuide" class="dashboard-modal home-db-food-card-modal" style="display:none;"><!--Meal Plan Modal Start-->
    <div class="food-card-modal__title m-bottom-2">
        <div class="title-h3">Your meal plan guide</div>
    </div>

    <div class="food-card-modal__text m-bottom-1">
        <div class="tx-repeat">
            <p class="tx-bold">Your plan</p>
            <p>
                This is your fat-rich, low-carb eating plan. This plan is distinctive for
                its exceptionally high-fat content, typically 70% to 80%. We suggest following this plan until
                the desired amount of weight is lost.
            </p>
            <p class="tx-bold">How it works?</p>
            <p>
                This is a diet that causes ketones to be produced by the liver, shifting
                body's metabolism away from glucose and towards fat utilization. When you eat food high in
                carbs, your body produces glucose and insulin. While glucose is used as the main source of
                energy, insulin secretion is produced to regulate your glucose levels in the blood stream.
                Insulin is also responsible for storing fat in our body and if your body produces too much of
                it, you'll gain weight.
            </p>
            <p>
                Feel free to improvise with recipes in case you do not have some
                ingredients, here are some great substitutes:
            </p>
        </div>
    </div>

    <div class="food-card-modal__list m-bottom-2">
        <p class="tx-bold">Useful foods:</p>

        <ul class="mp-guide-list yes">
            <li><p>Meats (preferably grass-fed, organic and pasture raised) including beef, pork, lamb, bison and
                    chicken</p></li>
            <li><p>Salmon and other fish – preferably wild-caught</p></li>
            <li><p>Eggs</p></li>
            <li><p>Berries: strawberries, blueberries, raspberries, cranberries</p></li>
            <li><p>Vegetables: zucchini, asparagus, spinach, lettuce, leafy salads</p></li>
            <li><p>Nuts</p></li>
            <li><p>Greek yogurt and whole, plain yogurt</p></li>
            <li><p>Butter and ghee</p></li>
            <li><p>Coconut, olive and flax oils</p></li>
            <li><p>Avocado</p></li>
            <li><p>Beverages: coffee, tea or water</p></li>
            <li><p>Sugar supplements: Stevia, Monk Fruit extract, Splenda</p></li>
        </ul>
    </div>

    <div class="food-card-modal__list m-bottom-2">
        <p class="tx-bold">Try to avoid these:</p>

        <ul class="mp-guide-list no">
            <li><p>Soft drinks/sodas</p></li>
            <li><p>Commercial baked goods (cakes, cookies, etc)</p></li>
            <li><p>Ice cream</p></li>
            <li><p>Sweets</p></li>
            <li><p>Fruit juices</p></li>
            <li><p>Breads and pasta</p></li>
            <li><p>Any Processed Food with Trans Fats – hydrogenated or partially hydrogenated oils</p></li>
            <li><p>All vegetable oils (canola, soy, grapeseed, corn, sunflower)</p></li>
            <li><p>"Low-Fat" or "Diet" foods</p></li>
        </ul>
    </div>

    <div class="food-card-modal__text m-bottom-1">
        <div class="tx-repeat">
            <p>If you decide to substitute the ingredient in the recipe, please try to substitute it with the ingredient
                that has similar nutrition value.</p>
        </div>
    </div>
</div><!--Meal Plan Modal End-->

<div id="groceryList" class="dashboard-modal home-db-grocery-modal" style="display:none;">
    <?php
        $ingredients1 = get_weekly_ingredients(1);
        $ingredients2 = get_weekly_ingredients(2);
    ?>

    <div class="grocery-modal__title">
        <div class="title-h3">Grocery List</div>
        <div class="switcher switcher-grocery">
            <ul>
                <li><a href="javascript:void(0)" class="switch-item active" data-target="grocery-week-1">Week 1</a></li>
                <li><a href="javascript:void(0)" class="switch-item" data-target="grocery-week-2">Week 2</a></li>
            </ul>
        </div>
    </div>

    <div class="grocery-modal__data">
        <div id="grocery-week-1" class="grocery-switch-block">
            <form target="_blank" method="post" action="<?= get_print_ulr() ?>">
                <input type="hidden" name="type" value="grocery">
                <div class="grocery-modal__data-list">
                    <div class="grocery-modal__select-all">
                        <div class="checkbox-group">
                            <input class="selected-all" type="checkbox" name="select-all">
                            <span class="checker"></span>
                            <label class="form-check-label">Select all items</label>
                        </div>
                    </div>
                    <ul>
						<?php foreach ($ingredients1 as $ingredient): ?>
                            <li>
                                <div class="checkbox-group">
                                    <input class="form-check-input" type="checkbox" name="id[]" value="<?= $ingredient->name ?>" id="<?= $ingredient->slug ?>">
                                    <span class="checker"></span>
                                    <label class="form-check-label" for="<?= $ingredient->slug ?>"><?= $ingredient->name ?></label>
                                </div>
                            </li>
						<?php endforeach; ?>
                    </ul>
                    <button class="btn btn-primary btn-solid btn-large"><i class="icon-print"></i> <span>Print</span></button>
                </div>
            </form>
        </div>

        <div id="grocery-week-2" class="grocery-switch-block" style="display: none">
            <form target="_blank" method="post" action="<?= get_print_ulr() ?>" style="text-align: left">
                <input type="hidden" name="type" value="grocery">
                <div class="grocery-modal__data-list">
                    <div class="grocery-modal__select-all">
                        <div class="checkbox-group">
                            <input class="selected-all" type="checkbox" name="select-all">
                            <span class="checker"></span>
                            <label class="form-check-label">Select all items</label>
                        </div>
                    </div>
                    <ul>
						<?php foreach ($ingredients2 as $ingredient): ?>
                            <li>
                                <div class="checkbox-group">
                                    <input class="form-check-input" type="checkbox" name="id[]" value="<?= $ingredient->name ?>" id="<?= $ingredient->slug ?>">
                                    <span class="checker"></span>
                                    <label class="form-check-label" for="<?= $ingredient->slug ?>"><?= $ingredient->name ?></label>
                                </div>
                            </li>
						<?php endforeach; ?>
                    </ul>
                    <button class="btn btn-primary btn-solid btn-large"><i class="icon-print"></i> <span>Print</span></button>
                </div>
            </form>
        </div>
    </div>
</div>




<!--Filter Modals
<div id="filter" class="dashboard-modal home-db-filter-modal" style="display:none;">
    <?php
$filterMoreVariety = ['Make All Meals the same as Day 1 meals', 'Skip breakfast', 'Skip Lunch', 'Skip Dinner', 'Skip Snacks',];

$filterLessVariety = ['Skip Lunch', 'Skip Dinner', 'Skip Snacks',];
?>
    <div class="filter-modal__title">
        <div class="title-h3">Filter</div>
        <div class="switcher">
            <ul>
                <li><a href="javascript:void(0)" class="switch-item active" data-id="more-variety">More variety</a></li>
                <li><a href="javascript:void(0)" class="switch-item" data-id="less-variety">Less variety</a></li>
            </ul>
        </div>
    </div>

    <div class="filter-modal__data">
        <div class="filter-modal__data-caption">
            <ul>
                <?php for ($i = 1; $i <= 7; $i++) { ?> <li>Day <?= $i ?></li> <?php } ?>
            </ul>
        </div>

        <div id="more-variety" class="switch-block">
            <?php foreach ($filterMoreVariety as $item): ?>
                <div class="filter-modal__data-list">
                    <div class="title"><?= $item ?></div>
                    <ul>
                        <?php for ($i = 1; $i <= 7; $i++) { ?>
                            <li class="checkbox-group">
                                <input type="checkbox" name="day-<?= $i ?>">
                                <span class="checker"></span>
                                <label class="label">Day <?= $i ?></label>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>

        <div id="less-variety" class="switch-block" style="display: none">
            <?php foreach ($filterLessVariety as $item): ?>
                <div class="filter-modal__data-list">
                    <div class="title"><?= $item ?></div>
                    <ul>
                        <?php for ($i = 1; $i <= 7; $i++) { ?>
                            <li class="checkbox-group">
                                <input type="checkbox" name="day-<?= $i ?>">
                                <span class="checker"></span>
                                <label class="label">Day <?= $i ?></label>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="filter-modal__btn">
        <button class="btn btn-solid btn-primary btn-large">Save changes</button>
    </div>
</div>
<div id="filter-confirm" class="dashboard-modal home-db-filter-modal" style="display:none;">
    <div class="filter-modal__title centered m-bottom-2">
        <div class="title-h3">Are you sure you want to alter this setting as this will alter your meals for the week?</div>
    </div>

    <div class="filter-modal__icon m-bottom-2_5">
        <i class="icon-ico-12"></i>
    </div>

    <div class="filter-modal__btns">
        <button class="btn btn-outline btn-primary btn-large close">No</button>
        <button class="btn btn-solid btn-primary btn-large confirm">Yes</button>
    </div>
</div>
-->