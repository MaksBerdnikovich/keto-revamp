
<div class="dashboard">
    <div class="container">
        <div class="progress-db">
            <div class="progress-db__image">
                <img src="<?=get_image_url('/db/man.png')?>" alt="image" />
            </div>

            <div class="progress-db__title">
                <div class="title-h4">Twelve month body measurement tracking chart</div>
            </div>

            <div class="progress-db__date">
                <form action="?" method="post">
                    <div class="form-item">
                        <label class="label" for="event_date">Date Started</label>
                        <input class="input" type="text" id="start_date"
                               data-toggle="datepicker-progress" readonly="" name="start_date"
                               placeholder="mm.dd.yyyy">
                    </div>
                </form>
            </div>

            <form id="progressForm" class="progress-db__table" method="post" action="?">
                <div class="progress-db__table-item panel">
                    <div class="table">
                        <ul class="progress-db__table-caption">
                            <li class="table-col__th"><b>What to <br/>Measure, cm</b></li>
                            <li class="table-col__th"><b>Weight</b></li>
                            <li class="table-col__th"><b>Chest</b></li>
                            <li class="table-col__th"><b>Waist</b></li>
                            <li class="table-col__th"><b>R Arm</b></li>
                            <li class="table-col__th"><b>L Arm</b></li>
                            <li class="table-col__th"><b>R Thigh</b></li>
                            <li class="table-col__th"><b>L Thigh</b></li>
                            <li class="table-col__th"><b>Hip</b></li>
                        </ul>

                        <ul class="progress-db__table-column">
                            <li class="table-col__th">
                                <span>Week 1</span>
                                <a href="#" class="table-item__edit"><i class="icon-pencil-2"></i></a>
                                <a href="#" class="table-item__save"><i class="icon-check"></i></a>
                                <a href="#" class="table-item__remove"><i class="icon-close"></i></a>
                            </li>
							<?php foreach ($columns as $col): ?>
                                <li class="table-col__td"><input type="number" value="55" name="week_1_<?=$col?>" readonly/></li>
							<?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </form>

            <div class="progress-db__table-btn">
                <a href="javascript:void(0)" class="btn btn-primary btn-solid btn-large">Add a week</a>
            </div>
        </div>
    </div>
</div>
