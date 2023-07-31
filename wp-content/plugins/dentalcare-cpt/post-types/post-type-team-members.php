<?php

add_action('init', 'team_members_post_type');

function team_members_post_type()
{
    $labels = array(
        'name' => 'Team Members',
        'singular_name' => 'Team Member',
        'menu_name' => 'Team Members',
        'all_items' => 'All Team Members',
        'add_new' => 'Add New ',
        'add_new_item' => 'Add New Team Member',
        'edit' => 'Edit',
        'edit_item' => 'Edit Team Member',
        'new_item' => 'New Team Member',
        'view' => 'View',
        'view_item' => 'View Team Member',
        'search_items' => 'Search Team Members',
        'not_found' => 'No Team Members found',
        'not_found_in_trash' => 'No Team Members found in Trash',
        'parent' => 'Parent Team Member',
    );

    $theme = wp_get_theme();
    $team_member_slug = 'team';
    if (($theme->get('Name') == 'Dental Care') || $theme->get('Template') == 'dental-care') {
        if (class_exists('OT_Loader')) {
            if (ot_get_option('team_members_slug')) {
                $team_member_slug = ot_get_option('team_members_slug');
            }
        }
    }

    $args = array(
        'labels' => $labels,
        'description' => 'Creates and edits Team Members',
        'public' => true,
        'show_ui' => true,
        'has_archive' => false,
        'show_in_menu' => true,
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => $team_member_slug, 'with_front' => true),
        'query_var' => true,
        'menu_position' => 15, 'menu_icon' => 'dashicons-groups', 'supports' => array('title', 'thumbnail', 'editor', 'excerpt', 'page-attributes'),
    );
    flush_rewrite_rules();
    register_post_type('team-member', $args);

    $labels = array(
        'name' => 'Team Member Categories',
        'singular_name' => 'Team Member Category',
        'search_items' => 'Search Team Member Categories',
        'all_items' => 'All Team Member Categories',
        'parent_item' => 'Parent Team Member Category',
        'parent_item_colon' => 'Parent Team Member Category:',
        'edit_item' => 'Edit Team Member Category',
        'update_item' => 'Update Team Member Category',
        'add_new_item' => 'Add New Team Member Category',
        'new_item_name' => 'New Topic Team Member Category',
        'menu_name' => 'Team Member Categories',
    );


    register_taxonomy('team-member-categories', array('team-member'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'team-member'),
    ));
}
