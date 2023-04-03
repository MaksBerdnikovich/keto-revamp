<div class="quiz__item quiz__item--step2">

    <div class="quiz__item-title">
        <b class="title-h3">How familiar are you with the Keto diet?</b>
        <p class="text">
            The ketogenic diet consists of a very low-carb, high-fat diet. Getting positive results from this diet means
            it has to be quite low in carbohydrates, high in dietary fat, and moderate in protein. As a result of this
            reduction in carbs, your body enters into a state of ketosis. The result is that your body becomes
            extraordinarily efficient at burning fat for energy. The ketogenic diet reduces blood sugar levels, insulin
            levels and helps you lose weight.
        </p>
    </div>

    <div class="quiz__item-grid row-cols-5">
        <div class="quiz__item-grid-title title-h5">Benefits of keto diet</div>

        <?php foreach (get_step2_list() as $item): ?>
            <div class="quiz__item-col readonly">
                <input id="<?=$item['id']?>"
                       class="quiz__item-radio icon-box" type="radio" name="benefits" value="<?=$item['value']?>">
                <label for="<?=$item['id']?>">
                    <i><img src="<?=$item['image']?>" alt="<?=$item['name']?>" /></i>
                    <span><?=$item['name']?></span>
                </label>
            </div>
        <?php endforeach; ?>
    </div>

</div>