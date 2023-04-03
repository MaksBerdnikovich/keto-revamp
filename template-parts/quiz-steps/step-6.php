<div class="quiz__item quiz__item--step1">

    <div class="quiz__item-title">
        <div class="title-h3">How physically active are you?</div>
    </div>

    <div class="quiz__item-grid row-cols-3">
        <?php foreach (get_step6_list() as $item): ?>
            <div class="quiz__item-col">
                <input id="<?=$item['id']?>"
                       class="quiz__item-radio" type="radio" name="activity" value="<?=$item['id']?>">
                <label for="<?=$item['id']?>">
                    <?php foreach ($item['image'] as $key => $i):?>
                        <i class="image--<?=$key?>"><img src="<?=$i?>" alt="<?=$item['name']?>" /></i>
                    <?php endforeach; ?>
                    <span><?=$item['name']?></span>
                </label>
            </div>
        <?php endforeach; ?>
    </div>

</div>