<?php

add_action('init', 'brands_post_type');

function brands_post_type() {
    $labels = array(
        'name' => 'Brands',
        'singular_name' => 'Brand',
        'menu_name' => 'Brands',
        'all_items' => 'All Brands',
        'add_new' => 'Add New ',
        'add_new_item' => 'Add New Brand',
        'edit' => 'Edit',
        'edit_item' => 'Edit Brand',
        'new_item' => 'New Brand',
        'view' => 'View',
        'view_item' => 'View Brand',
        'search_items' => 'Search Brand',
        'not_found' => 'No Brands found',
        'not_found_in_trash' => 'No Brands found in Trash',
        'parent' => 'Parent Brand',
    );

    $args = array(
        'labels' => $labels,
        'description' => 'Creates and edits Brands',
        'public' => true,
        'show_ui' => true,
        'has_archive' => false,
        'show_in_menu' => true,
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'brand', 'with_front' => true),
        'query_var' => true,
        'menu_position' => 10, 'menu_icon' => 'dashicons-star-filled', 'supports' => array('title', 'thumbnail'),);
     flush_rewrite_rules();
    register_post_type('brand', $args);
}
