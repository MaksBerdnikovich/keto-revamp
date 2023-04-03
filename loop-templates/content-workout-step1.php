<div class="dashboard">
    <div class="container">
        <div class="workout-db-progress">
            <div class="title-h4">Week progress: <span class="primary-color">33% completed</span></div>
            <div class="progress"><div class="bar" style="width: 33%"></div></div>
        </div>

        <div class="workout-db-weeks tabs">
            <div class="tabs-navigate">
                <ul>
                    <?php for ($i = 1; $i <= 7; $i++) { ?>
                    <li>
                        <a href="#" class="tabs-navigate__link <?php if ($i == 1) :?>active<?php endif; ?>"
                           data-target=".week-<?=$i?>">Week <?=$i?></a>
                    </li>
                    <?php } ?>
                </ul>
            </div>

            <?php for ($i = 1; $i <= 7; $i++) { ?>
            <div class="tabs-content week-<?=$i?> <?php if ($i == 1) :?>active<?php endif; ?>">
                <div class="workout-db-tng grid">
                    <div class="grid-row">
                        <?php for ($j = 1; $j <= 7; $j++) { ?>
                        <div class="grid-col col-25">
                            <a href="<?=home_url('workout-step2');?>" class="grid-item panel">
                                <div class="workout-db-tng__item">
                                    <div class="workout-db-tng__image">
                                        <img src="<?=get_image_url('/db/workout.png')?>" alt="image" />
                                    </div>
                                    <div class="workout-db-tng__info">
                                        <div class="title">Day <?=$j?> Toronto II</div>
                                        <div class="actions">
                                            <div class="action__item"><i class="icon-clock"></i> 30 min</div>
                                            <div class="action__item"><i class="icon-calories"></i> 375 kcal</div>
                                        </div>
                                    </div>
                                    <div class="workout-db-tng__next"><i class="icon-next"></i></div>
                                </div>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>


