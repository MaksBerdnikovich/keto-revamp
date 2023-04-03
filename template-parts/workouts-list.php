<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$plan = get_user_workouts();
$firstWeekProgress = get_week_progress('week_1');
?>

<div class="profile-header">
    <p class="progress-txt">Week progress: <span id="progress-val"><?php echo $firstWeekProgress; ?></span>% completed</p>
    <div class="progress-bar"><span style="width: <?php echo $firstWeekProgress; ?>%"></span></div>
    <div class="four-weeks">
        <?php foreach ($plan['weeks'] as $key => $item): ?>
            <a href="#" data-day="<?php echo $key ?>" class="<?php if ($key == 'week_1'): echo 'active'; endif; ?>" data-progress="<?php echo get_week_progress($key); ?>">
                <?php echo ucfirst(str_replace('_', ' ', $key)) ?>
            </a>
        <?php endforeach; ?>

        <img src="<?php echo get_image_url('dashboard/back.svg')?>" class="week-arrow-left week-change">
        <img src="<?php echo get_image_url('dashboard/next.svg')?>" class="week-arrow-rght week-change">
    </div>
</div>

<div class="food-prefrnceBox">
    <?php foreach ($plan['weeks'] as $key => $item): ?>
    <div class="each-week-opt <?php echo $key ?>" <?php if ($key!='week_1'): ?> style="display:none;" <?php endif; ?>>
        <?php foreach ($item as $dayKey => $day): ?>
        <div class="workout-row" data-href="<?php echo add_query_arg(['w' => $key,'d' => $dayKey,], get_current_url()) ?>">
            <div class="work-img">
                <img src="<?php echo $day['thumb'] ?>">
            </div>
            <div class="work-content">
                <p class="work-day-time"><?php echo ucfirst(str_replace('_', ' ', $dayKey)) ?> <?php echo $day['workoutTitle'] ?> <img src="<?php echo get_image_url('dashboard/clk-ic.png')?>"><span><?php echo $day['duration'] ?> min.</span></p>
                <p class="work-calory">Calories: <img src="<?php echo  get_image_url('dashboard/calries-ic.png') ?>"> <?php echo $day['cal'] ?> kcal.</p>
            </div>
            <img src="<?php echo get_image_url('dashboard/next.svg')?>" class="meal-info-btn">
        </div>
        <?php endforeach; ?>
    </div>
    <?php endforeach; ?>
</div>
