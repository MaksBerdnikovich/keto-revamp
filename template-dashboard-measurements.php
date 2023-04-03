<?php
/**
 * Template Name: Dashboard Measurements
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (! is_user_logged_in()) {
    wp_redirect(get_login_url());
    exit();
}
if (! has_user_plan_access()) {
    wp_redirect(get_upsell_plan_url());
    exit();
}

$default = ['weight', 'chest', 'waist', 'r_arm', 'l_arm', 'r_thigh', 'l_thigh', 'hip'];

if (!empty($_POST) && $_POST['action'] == 'add') {
    foreach ($default as $def){
	    $data[] = $_POST[$def];
    }
    add_to_measurements($data);
	wp_redirect(get_current_url());
}
if (!empty($_POST) && $_POST['action'] == 'delete') {
    delete_from_measurements($_POST['id']);
	wp_redirect(get_current_url());
}

if (!empty($_POST) && $_POST['action'] == 'add_date') {
	add_start_date_to_measurements($_POST['start_date']);
	wp_redirect(get_current_url());
}

$measurements = get_my_measurements();
$measurements_date = get_my_measurements_date();
$lastWeek = count($measurements);

get_header('dashboard');

?>

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
                <form id="addStartDate" method="POST" action="<?= get_current_url() ?>">
                    <div class="form-item">
                        <input type="hidden" name="action" value="add_date">
                        <label class="label" for="start_date">Date Started</label>
                        <input class="input" type="text" id="start_date"
                               <?php if (!empty($measurements_date)): ?>
                               value="<?= carbon_parse(carbon_from_timestamp($measurements_date))->format('Y-m-d') ?>"
                               <?php endif; ?>
                               data-toggle="datepicker-measurement" name="start_date" placeholder="mm.dd.yyyy" />
                    </div>
                </form>
            </div>

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
			        <?php if ($measurements): ?>
				        <?php foreach ($measurements as $item): ?>
                            <form method="POST" action="<?= get_current_url() ?>">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                <ul class="progress-db__table-column">
                                    <li class="table-col__th">
                                        <span>Week <?= $item['id'] ?></span>
                                        <a href="javascript:void(0)" class="table-item__remove" style="display: block;"><i class="icon-close"></i></a>
                                    </li>
							        <?php foreach ($item['data'] as $key => $d): ?>
                                        <li class="table-col__td"><?= $d ?>
									        <?php if ($key == 0) {
										        if (!empty($d)) echo get_current_weight_unit($d);
									        } else {
										        if (!empty($d)) echo get_current_height_unit($d);
									        } ?>
                                        </li>
							        <?php endforeach; ?>
                                </ul>
                            </form>
				        <?php endforeach; ?>
			        <?php endif ?>
                    <form id="addColumn" method="POST" action="<?= get_current_url() ?>">
                        <input type="hidden" name="action" value="add">
                        <ul class="progress-db__table-column">
                            <li class="table-col__th">
                                <span>Week <?=$lastWeek + 1?></span>
                            </li>
					        <?php foreach ($default as $def): ?>
                                <li class="table-col__td">
                                    <input class="edit" type="number" value="" name="<?=$def?>" />
                                </li>
					        <?php endforeach; ?>
                        </ul>
                    </form>
                </div>
            </div>
            
            <div class="progress-db__table-btn">
                <a href="javascript:void(0)" class="btn btn-primary btn-solid btn-large">Add a week</a>
            </div>
        </div>
    </div>
</div>


<?php get_footer('dashboard'); ?>
