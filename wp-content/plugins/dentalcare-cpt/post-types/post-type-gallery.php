<?php

add_action('init', 'galleries_post_type');

function galleries_post_type() {
    $labels = array(
        'name' => 'Galleries',
        'singular_name' => 'Gallery',
        'menu_name' => 'Galleries',
        'all_items' => 'All Galleries',
        'add_new' => 'Add New ',
        'add_new_item' => 'Add New Gallery',
        'edit' => 'Edit',
        'edit_item' => 'Edit Gallery',
        'new_item' => 'New Gallery',
        'view' => 'View',
        'view_item' => 'View Gallery',
        'search_items' => 'Search Gallery',
        'not_found' => 'No Galleries found',
        'not_found_in_trash' => 'No Galleries found in Trash',
        'parent' => 'Parent Gallery',
    );

    $args = array(
        'labels' => $labels,
        'description' => 'Creates and edits Galleries',
        'public' => true,
        'show_ui' => true,
        'has_archive' => false,
        'show_in_menu' => true,
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'gallery', 'with_front' => false),
        'query_var' => true,
        'menu_position' => 13, 'menu_icon' => 'dashicons-format-gallery', 'supports' => array('title', 'thumbnail', 'page-attributes', 'editor'),);
     flush_rewrite_rules();
    register_post_type('gallery', $args);

    $labels = array(
        'name' => 'Gallery Categories',
        'singular_name' => 'Gallery Category',
        'search_items' => 'Search Gallery Categories',
        'all_items' => 'All Gallery Categories',
        'parent_item' => 'Parent Gallery Category',
        'parent_item_colon' => 'Parent Gallery Category:',
        'edit_item' => 'Edit Gallery Category',
        'update_item' => 'Update Gallery Category',
        'add_new_item' => 'Add New Gallery Category',
        'new_item_name' => 'New Topic Gallery Category',
        'menu_name' => 'Gallery Categories',
    );


    register_taxonomy('gallery-categories', array('gallery'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'galleries'),
    ));
}
