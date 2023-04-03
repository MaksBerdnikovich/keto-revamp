<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

$ingredients1 = get_weekly_ingredients(1);
$ingredients2 = get_weekly_ingredients(2);

?>

<div class="profile-header">
    <h2>Print grocery list</h2>
    <div class="four-weeks">
        <a href="#" data-day="week1" class="active">Week 1</a>
        <a href="#" data-day="week2">Week 2</a>

    </div>
</div>


<div class="food-prefrnceBox">
    <div class="each-week-opt week1">
        <div class="workout-row">
            <form target="_blank" method="post" action="<?php echo get_print_ulr() ?>" style="text-align: left">
                <div class="select-all-button-container"><a id="select-all-button" href="#">Select all items</a></div>
                <?php foreach ($ingredients1 as $ingredient): ?>
                    <div class="form-check">
                        <input type="hidden" name="type" value="grocery">
                        <input class="form-check-input" type="checkbox" name="id[]"
                               value="<?php echo $ingredient->name ?>" id="<?php echo $ingredient->slug ?>">
                        <label class="form-check-label" for="<?php echo $ingredient->slug ?>">
                            <?php echo $ingredient->name ?>
                        </label>
                    </div>
                <?php endforeach; ?>
                <button type="submit" class="printBtn">Print</button>
            </form>
        </div>
    </div>
    <div class="each-week-opt week2" style="display:none;">
        <div class="workout-row">
            <form target="_blank" method="post" action="<?php echo get_print_ulr() ?>" style="text-align: left">
                <?php foreach ($ingredients2 as $ingredient): ?>
                    <div class="form-check">
                        <input type="hidden" name="type" value="grocery">
                        <input class="form-check-input" type="checkbox" name="id[]"
                               value="<?php echo $ingredient->name ?>" id="<?php echo $ingredient->slug ?>">
                        <label class="form-check-label" for="<?php echo $ingredient->slug ?>">
                            <?php echo $ingredient->name ?>
                        </label>
                    </div>
                <?php endforeach; ?>
                <button type="submit" class="printBtn">Print</button>
            </form>
        </div>
    </div>
</div>
