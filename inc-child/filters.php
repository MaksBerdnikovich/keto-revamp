<?php

function my_modify_main_query($query)
{
    if ($query->is_home() && $query->is_main_query()) {
        $query->query_vars['post_type'] = 'recipe';
        $query->query_vars['posts_per_page'] = '5';
        $query->query_vars['orderby'] = 'rand';
    }
}

add_action('pre_get_posts', 'my_modify_main_query');

function like_title_filter($where, $wp_query)
{
    global $wpdb;
    if ($search_term = $wp_query->get('like_title')) {
        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql($search_term) . '%\'';
    }

    return $where;
}


function where_title_filter($where, $wp_query)
{
    global $wpdb;
    if ($search_term = $wp_query->get('where_title')) {
        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'' . esc_sql($search_term) . '\'';
    }

    return $where;
}