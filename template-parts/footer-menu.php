<?php

$count = count($args['items']) - 1;

?>

<ul>
    <?php foreach ($args['items'] as $key => $item): ?>
        <li>
            <a href="<?php echo $item->url ?>"><?php echo $item->title ?></a>
        </li>
    <?php endforeach; ?>
</ul>
