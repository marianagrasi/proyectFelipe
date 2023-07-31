<?php

/**
 * 
 * Initializes meta boxes
 *
 * @package Dental_Care
 */
add_action('admin_init', 'custom_ot_meta_boxes');

function custom_ot_meta_boxes() {
    $page_layout = array(
        'id' => 'page_layout',
        'title' => esc_html__('Page Layout', 'dental-care'),
        'desc' => '',
        'pages' => array('page', 'post', 'team-member', 'service', 'gallery'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'label' => esc_html__('Layout', 'dental-care'),
                'id' => 'page_layout',
                'type' => 'radio-image',
                'desc' => esc_html__('Sets layout for pages', 'dental-care'),
                'std' => 'no-sidebar',
                'choices' => array(
                    array(
                        'value' => 'no-sidebar',
                        'label' => esc_html__('Without Sidebar - Fullwide', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/layout/full-width.png'
                    ),
                    array(
                        'value' => 'sidebar-right',
                        'label' => esc_html__('Sidebar Right', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/layout/right-sidebar.png'
                    ),
                    array(
                        'value' => 'sidebar-left',
                        'label' => esc_html__('Sidebar Left', 'dental-care'),
                        'src' => plugins_url() . '/dentalcare-cpt/admin/assets/images/layout/left-sidebar.png'
                    ),
                )
            ),
            array(
                'label' => esc_html__('Primary Sidebar', 'dental-care'),
                'id' => 'primary_sidebar',
                'type' => 'sidebar-select',
                'std' => '',
                'desc' => esc_html__('Overrides the default sidebar for this page.', 'dental-care')
            ),
        )
    );

    $post_options = array(
        'id' => 'post_options',
        'title' => esc_html__('Post Options', 'dental-care'),
        'desc' => '',
        'pages' => array('post'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'label' => esc_html__('Video URL', 'dental-care'),
                'id' => 'video_url',
                'desc' => esc_html__('Paste iframe embed code to YouTube or Vimeo video.', 'dental-care'),
                'std' => '',
                'type' => 'text'
            ),
            array(
                'id' => 'post_gallery_images_img',
                'label' => esc_html__('Choose images for Gallery Post', 'dental-care'),
                'std' => '',
                'type' => 'gallery',
                'choices' => array()
            )
        )
    );
    

    $layout_options = array(
        'id' => 'page_options',
        'title' => esc_html__('Page Options', 'dental-care'),
        'desc' => '',
        'pages' => array('page', 'post', 'team-member', 'service', 'gallery', 'product'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'label' => esc_html__('Page Class', 'dental-care'),
                'desc' => esc_html__('Enter a class to use for custom CSS styling of this page.', 'dental-care'),
                'id' => 'page_class',
                'type' => 'text',
                'std' => ""
            ),
            array(
                'label' => esc_html__('Page Header', 'dental-care'),
                'id' => 'page_header_en',
                'std' => 'on',
                'type' => 'on-off'
            ),
            array(
                'label' => esc_html__('Page Title', 'dental-care'),
                'id' => 'page_title_en',
                'std' => 'on',
                'type' => 'on-off'
            ),
            array(
                'label' => esc_html__('Page Padding', 'dental-care'),
                'id' => 'page_padding_en',
                'std' => 'on',
                'type' => 'on-off'
            ),
            array(
                'label' => esc_html__('Page Title Alignment', 'dental-care'),
                'id' => 'page_title_align',
                'desc' => esc_html__('Choose the alignment for the page title.', 'dental-care'),
                'std' => 'page_title_left',
                'type' => 'select',
                'choices' => array(
                    array(
                        'value' => 'page_title_left',
                        'label' => esc_html__('Left', 'dental-care')
                    ),
                    array(
                        'value' => 'page_title_center',
                        'label' => esc_html__('Center', 'dental-care')
                    )
                )
            ),
            array(
                'label' => esc_html__('Page Title Tag', 'dental-care'),
                'id' => 'page_title_tag',
                'desc' => esc_html__('Choose the tag for the page title.', 'dental-care'),
                'std' => 'h1',
                'type' => 'select',
                'choices' => array(
                    array(
                        'value' => 'h1',
                        'label' => esc_html__('h1', 'dental-care')
                    ),
                    array(
                        'value' => 'h2',
                        'label' => esc_html__('h2', 'dental-care')
                    ),
                    array(
                        'value' => 'h3',
                        'label' => esc_html__('h3', 'dental-care')
                    ),
                    array(
                        'value' => 'h4',
                        'label' => esc_html__('h4', 'dental-care')
                    ),
                    array(
                        'value' => 'h5',
                        'label' => esc_html__('h5', 'dental-care')
                    ),
                    array(
                        'value' => 'h6',
                        'label' => esc_html__('h6', 'dental-care')
                    ),
                    array(
                        'value' => 'div',
                        'label' => esc_html__('div', 'dental-care')
                    ),
                    array(
                        'value' => 'span',
                        'label' => esc_html__('span', 'dental-care')
                    ),
                    array(
                        'value' => 'p',
                        'label' => esc_html__('p', 'dental-care')
                    )

                )
            ),
            array(
                'label' => esc_html__('Page Header Type', 'dental-care'),
                'id' => 'page_header_select',
                'desc' => esc_html__('Choose a page header type.', 'dental-care'),
                'std' => 'page_header_std',
                'type' => 'select',
                'choices' => array(
                    array(
                        'value' => 'page_header_std',
                        'label' => esc_html__('Standard Page Header', 'dental-care')
                    ),
                    array(
                        'value' => 'page_header_bg',
                        'label' => esc_html__('Background Page Header', 'dental-care')
                    )
                )
            ),
            array(
                'label' => esc_html__('Page Header Style', 'dental-care'),
                'id' => 'page_header_style',
                'desc' => esc_html__('Choose a page header style.', 'dental-care'),
                'std' => 'page_header_stnd',
                'type' => 'select',
                'choices' => array(
                    array(
                        'value' => 'page_header_stnd',
                        'label' => esc_html__('Standard Page Header', 'dental-care')
                    ),
                    array(
                        'value' => 'page_header_trsp',
                        'label' => esc_html__('Transparent Page Header', 'dental-care')
                    )
                )
            ),
            array(
                'id' => 'page_header_bg_overlay',
                'label' => esc_html__('Page Header Overlay Color', 'dental-care'),
                'desc' => esc_html__('Choose an overlay color for the page header background.', 'dental-care'),
                'std' => '',
                'type' => 'colorpicker-opacity',
            ),
            array(
                'id' => 'page_header_bg_img',
                'label' => esc_html__('Page Header Background Image', 'dental-care'),
                'desc' => esc_html__('Choose an image for the page header.', 'dental-care'),
                'std' => '',
                'type' => 'upload',
            ),
            array(
                'label' => esc_html__('Header Revolution Slider', 'dental-care'),
                'id' => 'head_slider_en',
                'desc' => esc_html__('Adds a Revolution Slider to the header of the page or sets a fullscreen slider for the homepage.', 'dental-care'),
                'std' => 'off',
                'type' => 'on-off'
            ),
            array(
                'id' => 'head_slider_select',
                'label' => esc_html__('Choose your Revolution Slider.', 'dental-care'),
                'type' => 'revslider-select',
                'choices' => array()
            ),
            array(
                'label' => esc_html__('Page Breadcrumb', 'dental-care'),
                'id' => 'page_breadcrumben',
                'std' => 'on',
                'type' => 'on-off'
            ),
        )
    );


    $team_member_options = array(
        'id' => 'team_member_options',
        'title' => esc_html__('Team Member Options', 'dental-care'),
        'desc' => '',
        'pages' => array('team-member'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'id' => 'team_member_pos',
                'label' => esc_html__('Position', 'dental-care'),
                'desc' => esc_html__('Enter a job title.', 'dental-care'),
                'std' => '',
                'type' => 'text',
                'choices' => array()
            ),
            array(
                'id' => 'team_member_bio',
                'label' => esc_html__('Team Member Bio', 'dental-care'),
                'desc' => esc_html__('Enter a short bio for the team member. This will be shown on the team member list page only.', 'dental-care'),
                'std' => '',
                'type' => 'textarea',
                'choices' => array()
            ),
            array(
                'id' => 'team_member_social_list',
                'label' => esc_html__('Team Member Social Network List', 'dental-care'),
                'desc' => esc_html__('Enter a title and profile link for each team member social network.', 'dental-care'),
                'type' => 'list-item',
                'choices' => array(),
                'settings' => array(
                    array(
                        'id' => 'team_member_social_link',
                        'label' => esc_html__('Link URL', 'dental-care'),
                        'desc' => esc_html__('Enter the link to the social profile.', 'dental-care'),
                        'std' => '',
                        'type' => 'text',
                        'choices' => array()
                    ),
                )
            ),
            array(
                'id' => 'team_member_details_list',
                'label' => esc_html__('Team Member Details List', 'dental-care'),
                'desc' => esc_html__('Enter a title and description for each team member detail.', 'dental-care'),
                'type' => 'list-item',
                'choices' => array(),
                'settings' => array(
                    array(
                        'id' => 'team_member_desc',
                        'label' => esc_html__('Description', 'dental-care'),
                        'desc' => esc_html__('Enter a description for this item.', 'dental-care'),
                        'std' => '',
                        'type' => 'textarea',
                        'choices' => array()
                    ),
                )
            ),
        )
    );

    $service_options = array(
        'id' => 'service_options',
        'title' => esc_html__('Service Options', 'dental-care'),
        'desc' => '',
        'pages' => array('service'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'id' => 'service_desc',
                'label' => esc_html__('Service Description', 'dental-care'),
                'desc' => esc_html__('Enter a short description of this service. This will be shown on the service grid page only.', 'dental-care'),
                'std' => '',
                'type' => 'textarea',
                'choices' => array()
            ),
            array(
                'id' => 'service_custom_link',
                'label' => esc_html__('Custom Service Link', 'dental-care'),
                'desc' => esc_html__('Enter a custom link for this service instead of the default one generated. N.B. This link will only be available by using the Services widget found inside Visual Composer.', 'dental-care'),
                'std' => '',
                'type' => 'text',
                'choices' => array()
            ),
        )
    );

    $gallery_options = array(
        'id' => 'gallery_options',
        'title' => esc_html__('Gallery Options', 'dental-care'),
        'desc' => '',
        'pages' => array('gallery'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'id' => 'gallery_images_img',
                'label' => esc_html__('Choose images for gallery', 'dental-care'),
                'std' => '',
                'type' => 'gallery',
                'choices' => array()
            ),
            array(
                'id' => 'gallery_select',
                'label' => esc_html__('Gallery Type', 'dental-care'),
                'std' => 'gallery_slider',
                'type' => 'select',
                'choices' => array(
                    array(
                        'value' => 'gallery_slider',
                        'label' => esc_html__('Image Slider', 'dental-care')
                    ),
                    array(
                        'value' => 'gallery_carousel',
                        'label' => esc_html__('Image Carousel', 'dental-care')
                    ),
                    array(
                        'value' => 'gallery_justified',
                        'label' => esc_html__('Justified Gallery', 'dental-care')
                    ),
                    array(
                        'value' => 'gallery_col_two',
                        'label' => esc_html__('2 Column Tile Gallery', 'dental-care')
                    ),
                    array(
                        'value' => 'gallery_col_three',
                        'label' => esc_html__('3 Column Tile Gallery', 'dental-care')
                    ),
                    array(
                        'value' => 'gallery_col_four',
                        'label' => esc_html__('4 Column Tile Gallery', 'dental-care')
                    ),
                    array(
                        'value' => 'gallery_video',
                        'label' => esc_html__('Video Gallery', 'dental-care')
                    ),
                    array(
                        'value' => 'gallery_filter_category',
                        'label' => esc_html__('Filter Category Gallery', 'dental-care')
                    ),
                )
            ),
            array(
                'label' => esc_html__('Image Captions', 'dental-care'),
                'id' => 'image_captions_en',
                'std' => 'off',
                'type' => 'on-off'
            ),
            array(
                'label' => esc_html__('Image LightBox', 'dental-care'),
                'id' => 'image_lightbox_en',
                'std' => 'on',
                'type' => 'on-off'
            ),
            array(
                'label' => esc_html__('Image Links', 'dental-care'),
                'id' => 'image_links_en',
                'std' => 'on',
                'type' => 'on-off'
            ),
        )
    );

    $video_gallery_options = array(
        'id' => 'video_gallery_options',
        'title' => esc_html__('Video Gallery Options', 'dental-care'),
        'desc' => '',
        'pages' => array('gallery'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'id' => 'video_gallery_list',
                'label' => esc_html__('Video List', 'dental-care'),
                'desc' => esc_html__('Enter a YouTube/Vimeo link and a thumbnail for each image.', 'dental-care'),
                'type' => 'list-item',
                'choices' => array(),
                'settings' => array(
                    array(
                        'id' => 'video_thumb',
                        'label' => esc_html__('Video Thumbnail', 'dental-care'),
                        'std' => '',
                        'type' => 'upload',
                        'choices' => array()
                    ),
                )
            ),
        )
    );

    $filter_gallery_options = array(
        'id' => 'filter_gallery_options',
        'title' => esc_html__('Category Filter Gallery Options', 'dental-care'),
        'desc' => '',
        'pages' => array('gallery'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'id' => 'filter_gallery_list',
                'label' => esc_html__('Image List', 'dental-care'),
                'desc' => esc_html__('Select each of your images and their categories.', 'dental-care'),
                'type' => 'list-item',
                'choices' => array(),
                'settings' => array(
                    array(
                        'id' => 'gallery_cat_img',
                        'label' => esc_html__('Gallery Image', 'dental-care'),
                        'std' => '',
                        'type' => 'upload',
                        'choices' => array()
                    ),
                    array(
                        'id' => 'gallery_cat',
                        'label' => __('Gallery Image Categories', 'dental-care'),
                        'type' => 'gallery-categories-select',
                    ),
                )
            ),
        )
    );

    $brands_options = array(
        'id' => 'brands_images',
        'title' => esc_html__('Brands Options', 'dental-care'),
        'desc' => '',
        'pages' => array('brand'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'id' => 'brand_link',
                'label' => esc_html__('Brand External Link', 'dental-care'),
                'desc' => esc_html__('Enter a link for the brand image', 'dental-care'),
                'std' => '',
                'type' => 'text',
                'choices' => array()
            ),
        )
    );

    $testimonial_options = array(
        'id' => 'testimonial_opt',
        'title' => esc_html__('Testimonial Information', 'dental-care'),
        'desc' => '',
        'pages' => array('testimonial'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'id' => 'testimonialname',
                'label' => esc_html__('Name', 'dental-care'),
                'desc' => esc_html__('Enter the name of the person giving testimony.', 'dental-care'),
                'std' => '',
                'type' => 'text',
                'choices' => array()
            ),
            array(
                'id' => 'testimonialposition',
                'label' => esc_html__('Position', 'dental-care'),
                'desc' => esc_html__('Enter the position of the person giving testimony.', 'dental-care'),
                'std' => '',
                'type' => 'text',
                'choices' => array()
            ),
            array(
                'id' => 'testimonialtext',
                'label' => esc_html__('Testimonial Text', 'dental-care'),
                'desc' => esc_html__('Enter the testimony.', 'dental-care'),
                'std' => '',
                'type' => 'textarea',
                'choices' => array()
            ),
            array(
                'label' => esc_html__('Star Rating', 'dental-care'),
                'id' => 'testimonialrating',
                'desc' => esc_html__('Select a rating', 'dental-care'),
                'type' => 'select',
                'choices' => array(
                    array(
                        'value' => '',
                        'label' => esc_html__('Select a rating', 'dental-care')
                    ),
                    array(
                        'value' => 'one_star',
                        'label' => esc_html__('One Star', 'dental-care')
                    ),
                    array(
                        'value' => 'two_star',
                        'label' => esc_html__('Two Star', 'dental-care')
                    ),
                    array(
                        'value' => 'three_star',
                        'label' => esc_html__('Three Star', 'dental-care')
                    ),
                    array(
                        'value' => 'four_star',
                        'label' => esc_html__('Four Star', 'dental-care')
                    ),
                    array(
                        'value' => 'five_star',
                        'label' => esc_html__('Five Star', 'dental-care')
                    ),
                )
            ),
        )
    );

    if (class_exists('OT_Loader')) {

    ot_register_meta_box($testimonial_options);
    ot_register_meta_box($brands_options);
    ot_register_meta_box($gallery_options);
    ot_register_meta_box($video_gallery_options);
    ot_register_meta_box($filter_gallery_options);
    ot_register_meta_box($service_options);
    ot_register_meta_box($team_member_options);
    ot_register_meta_box($layout_options);
    ot_register_meta_box($page_layout);
    ot_register_meta_box($post_options);
    }
}
