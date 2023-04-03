<?php

require dirname(__FILE__) .'/vendor/autoload.php';

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

foreach (scandir(dirname(__FILE__) . '/inc-child/') as $filename) {
    $includesPath = dirname(__FILE__);
    $path = $includesPath . '/inc-child/' . $filename;
    if (is_file($path)) {
        require_once $path;
    }
}

require_once dirname(__FILE__) . '/services/loader.php';