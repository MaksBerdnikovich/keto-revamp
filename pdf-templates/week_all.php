<?php
$plan = $args['plan'];
?>

<?php foreach ($plan as $weekNum => $week): ?>
    <?php foreach ($week as $keyDay => $day): ?>
        <h2><?= 'Week'.' '.$weekNum.' '.'Day'.' '.($keyDay) ?></h2>
        <ul>
            <?php foreach ($day as $key => $recipeId): ?>
                <?php $recipe = get_post($recipeId); ?>
                <li style="margin-top: 10px"><b><?= $key.': ' ?></b> <?= $recipe->post_title ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>
<?php endforeach; ?>
