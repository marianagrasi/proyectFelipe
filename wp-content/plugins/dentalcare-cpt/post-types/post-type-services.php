<?php

add_action('init', 'services_post_type');

function services_post_type()
{
    $labels = array(
        'name' => 'Services',
        'singular_name' => 'Service',
        'menu_name' => 'Services',
        'all_items' => 'All Services',
        'add_new' => 'Add New ',
        'add_new_item' => 'Add New Service',
        'edit' => 'Edit',
        'edit_item' => 'Edit Service',
        'new_item' => 'New Service',
        'view' => 'View',
        'view_item' => 'View Service',
        'search_items' => 'Search Services',
        'not_found' => 'No Services found',
        'not_found_in_trash' => 'No Services found in Trash',
        'parent' => 'Parent Service',
    );

    $theme = wp_get_theme();
    $services_slug = 'service';
    if (($theme->get('Name') == 'Dental Care') || $theme->get('Template') == 'dental-care') {
        if (class_exists('OT_Loader')) {
            if (ot_get_option('services_slug')) {
                $services_slug = ot_get_option('services_slug');
            }
        }
    }

    $args = array(
        'labels' => $labels,
        'description' => 'Creates and edits Services',
        'public' => true,
        'show_ui' => true,
        'has_archive' => false,
        'show_in_menu' => true,
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => $services_slug, 'with_front' => true),
        'query_var' => true,
        'menu_position' => 16, 'menu_icon' => 'dashicons-thumbs-up', 'supports' => array('title', 'thumbnail', 'editor', 'excerpt', 'page-attributes'),
    );
    flush_rewrite_rules();
    register_post_type('service', $args);

    $labels = array(
        'name' => 'Service Categories',
        'singular_name' => 'Service Category',
        'search_items' => 'Search Service Categories',
        'all_items' => 'All Service Categories',
        'parent_item' => 'Parent Service Category',
        'parent_item_colon' => 'Parent Service Category:',
        'edit_item' => 'Edit Service Category',
        'update_item' => 'Update Service Category',
        'add_new_item' => 'Add New Service Category',
        'new_item_name' => 'New Topic Service Category',
        'menu_name' => 'Service Categories',
    );


    register_taxonomy('service-categories', array('service'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'services'),
    ));
}
