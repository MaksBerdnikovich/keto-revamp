<div class="home-db-plans__grid grid">
    <div class="grid-row">
        <?php foreach ($args['recipes'] as $recipe): ?>
            <?php
                $image = has_post_thumbnail($recipe) ? get_the_post_thumbnail_url($recipe, 'full') : get_image_url('db/home/dummy.png');
                $calories = round(get_field('calories', $recipe->ID));
            ?>
            <div class="grid-col col-25">
                <div class="grid-item home-db-plans__grid-item">
                    <div class="home-db-plans__grid-image">
                        <img src="<?= $image ?>" alt="<?= $recipe->post_title ?>">
                    </div>
                    <div class="home-db-plans__grid-info">
                        <div class="home-db-plans__grid-recipe">
                            <a href="javascript:void(0)" class="kcal">
                                <i class="icon-calories"></i> <span><?=$calories?> kcal</span>
                            </a>
                            <a href="javascript:void(0)" class="replace-recipe-button swap" data-id="<?php echo $recipe->ID ?>">
                                <i class="icon-check"></i> <span>Select</span>
                            </a>
                        </div>
                        <div class="home-db-plans__grid-name"><?= $recipe->post_title ?> </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
