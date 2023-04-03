<div class="quiz__item quiz__item--step0">

    <div class="quiz__item-title">
        <div class="title-h3">Get Your Keto Diet</div>
    </div>

    <div class="quiz__item-grid row-cols-2">
        <?php foreach (get_step_list() as $item): ?>
            <div class="quiz__item-col">
                <input id="<?=$item['id']?>"
                       class="quiz__item-radio <?=$item['id']?>" type="radio" name="type" value="<?=$item['value']?>">
                <label for="<?=$item['id']?>">
                    <i><img src="<?=$item['image']?>" alt="<?=$item['name']?>" /></i>
                    <span><?=$item['name']?></span>
                </label>
            </div>
        <?php endforeach; ?>
    </div>

</div>
