<div class="dashboard">
    <div class="container">
        <div class="workout-db-back m-bottom-1">
            <div class="back">
                <a href="javascript:history.go(-1)"><i class="icon-next"></i> <span>Back</span></a>
            </div>
            <div class="title-h4">Week 1 / Day 2 — Toronto II <span class="primary-color"><i class="icon-clock"></i> 30 min</span></div>
        </div>

        <div class="workout-db-text m-bottom-1_5">
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap
                into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                software like Aldus PageMaker including versions of Lorem Ipsum
            </p>
        </div>

        <div class="workout-db-complete">
            <div class="complete__item calories"><i class="icon-calories"></i> <span>375 kcal</span></div>
            <div class="complete__item round"><i class="icon-repeat"></i> <span>2 round(s)</span></div>
            <div class="complete__item button">
                <a href="javascript:void(0)" class="btn btn-outline btn-primary">
                    <i class="icon-check"></i> <span>Mark as completed</span>
                </a>
            </div>
        </div>

        <div class="workout-db-tng grid">
            <div class="grid-row">
                <?php for ($j = 1; $j <= 4; $j++) { ?>
                    <div class="grid-col col-25">
                        <a href="<?=home_url('workout-step3');?>" class="grid-item panel">
                            <div class="workout-db-tng__item">
                                <div class="workout-db-tng__image">
                                    <img src="<?=get_image_url('/db/workout.png')?>" alt="image" />
                                </div>
                                <div class="workout-db-tng__info">
                                    <div class="title">Shoulder rolls</div>
                                    <div class="actions">
                                        <div class="action__item"><i class="icon-clock"></i> 20 sec</div>
                                    </div>
                                    <div class="workout-db-level"><span>Difficulty</span> <i class="level--<?=$j?>"></i></div>
                                </div>
                                <div class="workout-db-tng__next"><i class="icon-next"></i></div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>


