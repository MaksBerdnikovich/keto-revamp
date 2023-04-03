<div class="profile-header workout-day-header">
    <div class="weak-hdng"><?php echo get_the_title() ?> <img src="<?php echo get_image_url('dashboard/clk-ic.png')?>"><p><?php echo get_field('time')?> </p></div>
    <div class="difficulty-inr-line">Difficulty: <div class="difclty-progress"><span style="width:<?php echo get_field('difficulty') ?>%;"></span></div></div>
    <img onclick="window.history.back()" src="<?php echo get_image_url('dashboard/bk-arw.png')?>" class="back-arw">
</div>
<div class="workout-inr-details">
    <div class="b-workout-video">
        <iframe src="<?php echo get_field('vimeo_embed') ?>" width="610" height="360" frameborder="0"
                allow="autoplay; fullscreen" allowfullscreen title="<?php echo get_the_title() ?>"></iframe>
    </div>
    <ul class="video-list">
        <?php the_content(); ?>
    </ul>
</div>