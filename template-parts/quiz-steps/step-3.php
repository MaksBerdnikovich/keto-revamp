<div class="quiz__item quiz__item--step3">

    <div class="quiz__item-title">
        <b class="title-h3">How much time do you have for meal prep each day?</b>
    </div>

    <div class="quiz__item-grid row-cols-3">
        <?php foreach (get_step3_list() as $item): ?>
            <div class="quiz__item-col">
                <input id="<?=$item['id']?>"
                       class="quiz__item-radio icon-circle-box" type="radio" name="preparation_time" value="<?=$item['value']?>">
                <label for="<?=$item['id']?>">
                    <i><img src="<?=$item['image']?>" alt="<?=$item['name']?>" /></i>
                    <span><?=$item['name']?></span>
                </label>
            </div>
        <?php endforeach; ?>
    </div>

</div>
