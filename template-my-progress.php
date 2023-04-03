<?php
/**
 * Template Name: Progress
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
if (! is_user_logged_in()) {
    wp_redirect(home_url());
    exit();
}
if ($_POST && $_POST['action'] == 'add') {
    add_to_progress($_POST['weight']);
}
if ($_POST && $_POST['action'] == 'delete') {
    delete_from_progress($_POST['id']);
}

get_header('dashboard');
$progress = get_my_progress();
$userKey = 'user_' . get_current_user_id();
$currentWeight = get_field('weight', $userKey);
$startingWeight = get_field('starting_weight', $userKey);
$targetWeight = get_field('target_weight', $userKey);
?>

<div class="dashboard-container">
    <div class="dashboard-box dashboard-box-inr">
        <div class="profile-header">
            <p class="profile-prdName">My progress</p>
        </div>
        <div class="profile-box">
            <ul class="cycle-list">
                <li>Starting weight<br><strong><?php echo $startingWeight . ' ' . get_current_weight_unit($startingWeight) ?></strong></li>
                <li>Current weight<br><strong><?php echo $currentWeight . ' ' . get_current_weight_unit($currentWeight) ?></strong></li>
                <li>Target weight<br><strong><?php echo $targetWeight . ' ' . get_current_weight_unit($targetWeight) ?></strong></li>
                <li class="forMob">Progress<br><strong>0%</strong></li>
            </ul>
        </div>
        <div class="progress-weight-box">
            <div class="weight-chartbx">
                <canvas id="weightChart"></canvas>
            </div>
            <form class="weight-form" method="POST" action="<?php get_current_url() ?>">
                <h3>Enter your current weight</h3>
                <input type="hidden" name="action" value="add">
                <div class="weight-input">
                    <input min="0" required name="weight" type="number" class="form-control"
                           placeholder="Your current weight (<?php echo get_current_weight_unit() ?>)"/>
                </div>
                <button type="submit" class="printBtn">Save weight entry</button>
                <div class="weight-error">Please enter a valid weight value.</div>
            </form>

            <div class="weight-history">
                <p class="weght-txt">Weight history</p>
                <div class="weight-history-row weight-history-row-hdng">
                    <div class="weight-col-1">Timestamp</div>
                    <div class="weight-col-2">Weight</div>
                    <div class="weight-col-3">Action</div>
                </div>
                <?php foreach ($progress as $item): ?>
                    <div class="weight-history-row">
                        <div class="weight-col-1"><?php echo carbon_parse($item['date'])->format('Y-m-d') ?></div>
                        <div class="weight-col-2"><?php echo $item['weight'] . ' ' . get_current_weight_unit($item['weight']) ?></div>
                        <div class="weight-col-3">
                            <form method="POST" action="<?php echo get_current_url() ?>">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?php echo $item['id'] ?>">
                                <input type="submit" class="remove" value="Remove">
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</div>


<?php get_footer('dashboard'); ?>
