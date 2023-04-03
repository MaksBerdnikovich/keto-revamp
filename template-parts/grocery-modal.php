<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

$ingredients1 = get_weekly_ingredients(1);
$ingredients2 = get_weekly_ingredients(2);

?>

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