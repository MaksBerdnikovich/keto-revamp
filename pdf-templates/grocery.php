<?php

/** @var \WP_Post $recipe */
$ingredients = $args['ingredients'];
?>
<h2>Grocery plan</h2>
<?php foreach ($ingredients as $key => $ingredient): ?>
    <p><?php echo $key + 1 ?>. <?php echo $ingredient ?></p>
<?php endforeach; ?>

