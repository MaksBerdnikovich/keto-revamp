<?php
/**
 * Template Name: Subpage redirect
 *
 * Template for redirect to subpage.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$pagekids = get_pages("child_of=" . $post->ID . "&sort_column=menu_order");
if ($pagekids) {
    $firstchild = $pagekids[0];
    wp_redirect(get_permalink($firstchild->ID));
}