<?php
$recipe = $args['recipe'];
$calories = round(get_field('calories', $recipe->ID));
?>

<div class="food-card-modal__title m-bottom-2">
    <div class="title-h3"><?=$recipe->post_title?></div>
</div>
<div class="food-card-modal__image m-bottom-2">
    <?php if (has_post_thumbnail($recipe)): ?>
        <img src="<?php echo get_the_post_thumbnail_url($recipe, 'full') ?>" alt="<?= $recipe->post_title ?>">
    <?php else: ?>
        <img src="<?=get_image_url('db/home/dummy.png')?>" alt="<?= $recipe->post_title ?>">
    <?php endif; ?>
</div>
<div class="food-card-modal__list m-bottom-2">
    <div class="tx-bold">Ingredients</div>

    <ul>
        <?php $ingredients = get_field('ingredients', $recipe->ID) ?? []; ?>
        <?php foreach ($ingredients as $ingr): ?>
            <li>
                <p><?php echo $ingr['text'] ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<div class="food-card-modal__text">
    <div class="tx-bold">Instructions</div>

    <ol>
        <?php $steps = get_field('steps', $recipe->ID) ?? []; ?>
        <?php foreach ($steps as $key => $step): ?>
            <li>
                <p><?php echo $step['text'] ?></p>
            </li>
        <?php endforeach; ?>
    </ol>
</div>

<div class="food-card-modal__btn">
    <form target="_blank" method="post" action="<?php echo get_print_ulr() ?>">
        <input type="hidden" name="type" value="recipe">
        <input type="hidden" name="id" value="<?php echo $recipe->ID ?>">
        <button class="btn btn-solid btn-primary btn-large"><i class="icon-print"></i> <span>Print Recipe</span></button>
    </form>
</div>