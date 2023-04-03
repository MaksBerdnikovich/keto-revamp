<?php
global $current_user;
wp_get_current_user();

?>
<div class="forMob">
    <div class="btn not-active">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div class="mobMenu-wrapper">
        <div class="left-menu">
            <div class="user-name-m"><?php echo $current_user->user_email ?></div>
            <ul class="m-menu">
                <ul class="m-menu">
                    <?php
                    foreach ($args['items'] as $item): ?>
                        <li><a href="<?php echo $item->url ?>"
                               class="<?php if (get_current_url() == rtrim($item->url, '/')): echo 'active'; endif; ?>">
                                <?php get_template_part('images/menu/item', $item->description) ?>
                                <?php echo $item->title ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </ul>
        </div>
    </div>
</div>