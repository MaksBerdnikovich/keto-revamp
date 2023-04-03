<?php

/** @var \WP_Post $recipe */
$plan = $args['plan'];
?>
<?php foreach ($plan as $key => $recipeId): ?>
    <?php
    $recipe = get_post($recipeId);
    ?>
    <h2><?php echo $key . ': ' . $recipe->post_title ?></h2>
    <h4>Ingredients</h4>
    <?php $ingredients = get_the_terms($recipe->ID, 'ingredient') ?? []; ?>
    <?php foreach ($ingredients as $ingr): ?>
        <p><?php echo $ingr->name ?></p>
    <?php endforeach; ?>

    <h4>Steps</h4>
    <?php $steps = get_field('steps', $recipe->ID) ?? []; ?>
    <?php foreach ($steps as $key => $step): ?>
        <p><?php echo $key + 1 ?>. <?php echo $step['description'] ?></p>
    <?php endforeach; ?>
<?php endforeach; ?>
