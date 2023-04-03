<ul class="menu">
    <?php
    foreach ($args['items'] as $item): ?>
        <li>
            <a href="<?php echo $item->url ?>" class="<?=$item->classes[0]?> <?php if (get_current_url() == rtrim($item->url, '/')): echo 'active'; endif;?>">
                <span><?php echo $item->title ?></span>
            </a>
        </li>
    <?php endforeach; ?>
</ul>