<?php

/** @var \WP_Post $recipe */
$recipe = $args['recipe'];


?>
<h2><?php echo $recipe->post_title ?></h2>
<h4>Ingredients</h4>
<ul>
    <?php $ingredients = get_field('ingredients', $recipe->ID) ?? []; ?>
    <?php foreach ($ingredients as $ingr): ?>
        <li style="margin: 10px 0;"><?php echo $ingr['text'] ?></li>
    <?php endforeach; ?>
</ul>

<h4>Instructions</h4>
<ol>
    <?php $steps = get_field('steps', $recipe->ID) ?? []; ?>
    <?php foreach ($steps as $key => $step): ?>
        <li style="margin: 10px 0;"><?php echo $step['text'] ?></li>
    <?php endforeach; ?>
</ol>

