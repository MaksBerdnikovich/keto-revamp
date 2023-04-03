<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$plan = get_user_workouts();
$w = $_GET['w'];
$d = $_GET['d'];
$workoutDay = $plan['weeks'][$w][$d] ?? false;

if (! $workoutDay) {
    echo 'Error';
    die();
}
?>

<div class="profile-header workout-day-header">
    <div class="weak-hdng"><?php echo $workoutDay['title'] ?> <span><?php echo $workoutDay['workoutTitle'] ?></span><img src="<?php echo get_image_url('dashboard/clk-ic.png') ?>"><p><?php echo $workoutDay['duration'] ?> min.</p></div>
    <a href="<?php echo get_workouts_url() ?>"><img src="<?php echo get_image_url('dashboard/bk-arw.png')?>" class="back-arw"></a>
</div>
<div class="about-work">
    <p class="restart-txt"><?php echo $workoutDay['description'] ?></p>
    <p class="restart-txt">Calories: <img src="<?php echo get_image_url('dashboard/calries-ic.png')?>"> <?php echo $workoutDay['cal'] ?> kcal.</p>
</div>

<div class="round-row">
    <p><?php echo $workoutDay['rounds'] ?> round(s)<img src="<?php echo get_image_url('dashboard/round-ic.png')?>"></p>
    <form method="POST" id="completeDayForm">
        <input id="dayInput" type="hidden" name="day" value="<?php echo $d ?>">
        <input id="weekInput" type="hidden" name="week" value="<?php echo $w ?>">
        <?php if ($workoutDay['complete'] === 0): ?>
            <button class="mark-complt not-complt">Mark as completed</button>
        <?php else: ?>
            <button class="mark-complt m-completed">Completed</button>
        <?php endif; ?>
    </form>
</div>

<div class="food-prefrnceBox">
    <?php foreach ($workoutDay['exercises'] as $exerciseId): ?>
        <?php
        $exercise = get_post($exerciseId);
        ?>
    <div class="workout-row" data-href="<?php echo get_permalink($exerciseId)?> ">
        <div class="work-img">
            <img src="<?php echo get_the_post_thumbnail_url($exercise, 'full') ?>">
        </div>
        <div class="work-content work-content-inr">
            <p class="work-day-time"><?php echo $exercise->post_title ?> <img src="<?php echo get_image_url('dashboard/clk-ic.png') ?>"><span><?php echo get_field('time', $exerciseId) ?></span></p>
            <div class="work-difficulty">Difficulty: <div class="difclty-progress"><span style="width: <?php echo get_field('difficulty', $exerciseId) ?>%"></span></div></div>
        </div>
        <img src="<?php echo get_image_url('dashboard/next.svg') ?>" class="meal-info-btn">
    </div>
    <?php endforeach; ?>
</div>

