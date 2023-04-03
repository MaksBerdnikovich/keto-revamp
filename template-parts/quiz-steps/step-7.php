<div class="quiz__item quiz__item--step7">

    <div class="quiz__item-title">
        <b class="title-h3">How willing are you to lose weight?</b>
    </div>

    <div class="quiz__item-grid row-cols-3">
        <?php foreach (get_step7_list() as $item): ?>
            <div class="quiz__item-col">
                <input id="motivation-<?=$item['id']?>"
                       class="quiz__item-radio icon-circle-box" type="radio" name="motivation" value="<?=$item['id']?>">
                <label for="motivation-<?=$item['id']?>">
                    <i><img src="<?=$item['image']?>" alt="<?=$item['name']?>" /></i>
                    <span><?=$item['name']?></span>
                </label>
            </div>
        <?php endforeach; ?>
    </div>

</div>