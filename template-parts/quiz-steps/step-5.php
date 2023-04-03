<div class="quiz__item quiz__item--step5">

    <div class="quiz__item-title">
        <b class="title-h3">Foods</b>
        <p class="text">Please select which foods you would like included in the plan
            <b class="primary-color">(minimum 5 foods)</b>
        </p>
    </div>

    <div class="quiz__item-grid row-cols-3">
        <?php foreach (get_step5_list() as $item): ?>
            <div class="quiz__item-col">
                <input id="<?=$item['id']?>"
                       class="quiz__item-checkbox counter" type="checkbox" name="products[]" value="<?=$item['id']?>">
                <label for="<?=$item['id']?>">
                    <i class="icon-<?=$item['id']?>"><sup data-id="<?=$item['id']?>"></sup></i>
                    <span><?=$item['name']?></span>
                </label>
            </div>
        <?php endforeach; ?>
    </div>

</div>