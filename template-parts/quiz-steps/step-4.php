<div class="quiz__item quiz__item--step4">

    <div class="quiz__item-title">
        <b class="title-h3">Meat</b>
        <p class="text">Please select which products you would like included in the plan</p>
    </div>

    <div class="quiz__item-grid row-cols-3">
        <?php foreach (get_step4_list() as $item): ?>
            <div class="quiz__item-col">
                <input id="<?=$item['id']?>"
                       class="quiz__item-checkbox" type="checkbox" name="meat[]" value="<?=$item['id']?>">
                <label for="<?=$item['id']?>">
                    <i class="icon-<?=$item['id']?>"></i>
                    <span><?=$item['name']?></span>
                </label>
            </div>
        <?php endforeach; ?>
    </div>

</div>