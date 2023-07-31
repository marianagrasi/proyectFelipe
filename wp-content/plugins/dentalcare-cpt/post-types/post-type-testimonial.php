<?php

add_action('init', 'testimonials_post_type');

function testimonials_post_type() {
    $labels = array(
        'name' => 'Testimonials',
        'singular_name' => 'Testimonial',
        'menu_name' => 'Testimonials',
        'all_items' => 'All Testimonials',
        'add_new' => 'Add New ',
        'add_new_item' => 'Add New Testimonial',
        'edit' => 'Edit',
        'edit_item' => 'Edit Testimonial',
        'new_item' => 'New Testimonial',
        'view' => 'View',
        'view_item' => 'View Testimonial',
        'search_items' => 'Search Testimonial',
        'not_found' => 'No Testimonials found',
        'not_found_in_trash' => 'No Testimonials found in Trash',
        'parent' => 'Parent Testimonial',
    );

    $args = array(
        'labels' => $labels,
        'description' => 'Creates and edits Testimonials',
        'public' => false,
        'show_ui' => true,
        'has_archive' => false,
        'show_in_menu' => true,
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'publicly_queryable' => false,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'testimonial', 'with_front' => false),
        'query_var' => true,
        'menu_position' => 14, 'menu_icon' => 'dashicons-format-quote', 'supports' => array('title', 'thumbnail'),);
     flush_rewrite_rules();
    register_post_type('testimonial', $args);
    
    $labels = array(
        'name' => 'Testimonial Categories',
        'singular_name' => 'Testimonial Category',
        'search_items' => 'Search Testimonial Categories',
        'all_items' => 'All Testimonial Categories',
        'parent_item' => 'Parent Testimonial Category',
        'parent_item_colon' => 'Parent Testimonial Category:',
        'edit_item' => 'Edit Testimonial Category',
        'update_item' => 'Update Testimonial Category',
        'add_new_item' => 'Add New Testimonial Category',
        'new_item_name' => 'New Topic Testimonial Category',
        'menu_name' => 'Testimonial Categories',
    );


    register_taxonomy('testimonial-categories', array('testimonial'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'testimonial'),
        ));
    
 
}
