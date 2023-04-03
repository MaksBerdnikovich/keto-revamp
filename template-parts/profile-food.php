<form class="grid" method="POST" action="<?php echo get_current_url() ?>">
    <input type="hidden" name="form" value="products">

    <div class="grid-row">
        <div class="grid-col col-45">
            <div class="grid-item">
                <div class="page-text m-bottom-1"><b>Meat.</b> Please select which products you would like included in the plan:</div>

                <div class="quiz__item-grid row-cols-3 m-bottom-1 meat-preference-data">
                    <?php foreach (get_meat_list() as $key => $item): ?>
                        <div class="quiz__item-col">
                            <input id="<?= $item['alias'] ?>" class="quiz__item-checkbox"
                                type="checkbox" name="meat[]" value="<?= $item['alias'] ?>"
                                <?php if (has_user_food($item['alias'], 'meat')): echo 'checked=checked'; endif;?>>
                            <label for="<?= $item['alias'] ?>">
                                <i class="icon-<?=$item['alias']?>"></i>
                                <span><?= $item['name'] ?></span>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="profile-db-food__btn">
                    <button class="btn btn-solid btn-primary btn-large">Save meat preference</button>
                </div>
            </div>
        </div>

        <div class="grid-col col-55">
            <div class="grid-item">
                <div class="page-text m-bottom-1"><b>Foods.</b> Please select which foods you would like included in the plan (minimum 5 foods):</div>

                <div class="quiz__item-grid row-cols-4 m-bottom-1 food-preference-data">
                    <?php foreach (get_products_list() as $key => $item): ?>
                        <div class="quiz__item-col">
                            <input id="<?= $item['alias'] ?>" class="quiz__item-checkbox"
                                type="checkbox" name="products[]" value="<?= $item['alias'] ?>"
                                <?php if (has_user_food($item['alias'])): echo 'checked'; endif;?>>

                            <label for="<?= $item['alias'] ?>">
                                <i class="icon-<?=$item['alias']?>"></i>
                                <span><?= $item['name'] ?></span>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="profile-db-food__btn">
                    <button class="btn btn-solid btn-primary btn-large">Save food preference</button>
                </div>
            </div>
        </div>
    </div>
</form>