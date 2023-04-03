<div class="quiz__item quiz__item--step8">

    <div class="quiz__item-title">
        <b class="title-h3">Do you have an important event coming up?</b>
        <p class="text">Having something to look forward to can be a big motivator to stick to your plan.</p>
    </div>

    <div class="quiz__item-grid row-cols-3">
        <?php foreach (get_step8_list() as $item): ?>
            <div class="quiz__item-col">
                <input id="<?=$item['id']?>"
                       class="quiz__item-radio icon-circle-box" type="radio" name="event_type" value="<?=$item['id']?>">
                <label for="<?=$item['id']?>">
                    <i><img src="<?=$item['image']?>" alt="<?=$item['name']?>" /></i>
                    <span><?=$item['name']?></span>
                </label>
            </div>
        <?php endforeach; ?>
    </div>

</div>