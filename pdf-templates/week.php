<?php

$plan = $args['plan'];
?>
<?php foreach ( $plan as $keyDay => $day ): ?>
    <h2><?php echo 'Day' . ' ' . ($keyDay) ?></h2>
	<?php foreach ( $day as $key => $recipeId ): ?>
		<?php
		$recipe = get_post( $recipeId );
		?>
        <p><?php echo $key . ': ' . $recipe->post_title ?></p>
	<?php endforeach; ?>
<?php endforeach; ?>
