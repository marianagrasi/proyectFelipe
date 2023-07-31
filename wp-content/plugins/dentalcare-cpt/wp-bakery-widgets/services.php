<?php

add_action('vc_before_init', 'dental_care_services_VC');

function dental_care_services_VC() {

    vc_map(array(
        "name" => esc_html__("Services", 'dental-care'),
        "base" => "dental_care_services",
        "class" => "",
        "category" => esc_html__('Dental Care', 'dental-care'),
        "params" => array(
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Title", 'dental-care'),
                "param_name" => "title",
                "description" => esc_html__("Title text Here. Leave blank if no title is needed.", 'dental-care')
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Service Display Type", 'dental-care'),
                "param_name" => "service_type",
                "description" => esc_html__("Choose a service type.", 'dental-care'),
                "value" => array(
                    "" => "",
                    "Services Carousel" => "service_carousel",
                    "Services Grid 3 Column" => "service_grid_three_col",
                    "Services Grid 4 Column" => "service_grid_four_col"
                    ),
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Order by title", 'dental-care'),
                "param_name" => "order_items",
                "description" => esc_html__("Choose if to order items", 'dental-care'),
                "value" => array(
                    '' => '',
                    'Yes' => 'yes',
                    'No' => 'no',
                )
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Enable services links", 'dental-care'),
                "param_name" => "links_en",
                "description" => esc_html__("Choose to enable services links.", 'dental-care'),
                "value" => array(
                    '' => '',
                    'On' => 'on',
                    'Off' => 'off',
                )
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Enable services description", 'dental-care'),
                "param_name" => "service_desc_en",
                "description" => esc_html__("Choose to enable services links.", 'dental-care'),
                "value" => array(
                    '' => '',
                    'On' => 'on',
                    'Off' => 'off',
                ),
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Enable custom service links", 'dental-care'),
                "param_name" => "custom_links_en",
                "description" => esc_html__("Choose to enable custom service links.", 'dental-care'),
                "value" => array(
                    '' => '',
                    'On' => 'on',
                    'Off' => 'off',
                )
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Service Hover Style", 'dental-care'),
                "param_name" => "service_hover",
                "description" => esc_html__("Select service hover style.", 'dental-care'),
                "value" => array(
                    '' => '',
                    'Overlay' => 'overlay',
                    'Zoom' => 'zoom',
                )
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Filter services by category", 'dental-care'),
                "param_name" => "filter_services_en",
                "description" => esc_html__("Choose to filter services by category.", 'dental-care'),
                "value" => array(
                    '' => '',
                    'On' => 'on',
                    'Off' => 'off',
                )
            ),
            array(
                "type" => "service_category",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Service Category", 'dental-care'),
                "param_name" => "service_category",
                "description" => esc_html__("Choose a service category.", 'dental-care'),
                "dependency" => array("element" => "filter_services_en", "value" => array("on")),
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Number of items", 'dental-care'),
                "param_name" => "num_items",
                "description" => esc_html__("Enter the number of services to display. Enter -1 to display all items.", 'dental-care')
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Carousel Speed", 'dental-care'),
                "param_name" => "carousel_speed",
                "description" => esc_html__("Enter the number for the carousel speed. (Default: 5000)", 'dental-care'),
                "dependency" => array("element" => "service_type", "value" => array("service_carousel")),
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Number of carousel items", 'dental-care'),
                "param_name" => "carousel_items",
                "description" => esc_html__("Enter the number of services columns to display in carousel.", 'dental-care'),
                "dependency" => array("element" => "service_type", "value" => array("service_carousel")),
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Enable Arrows", 'dental-care'),
                "param_name" => "arrows_en",
                "description" => esc_html__("Choose to enable or disable arrows on carousel.", 'dental-care'),
                "dependency" => array("element" => "service_type", "value" => array("service_carousel")),
                "value" => array(
                    '' => '',
                    'On' => 'on',
                    'Off' => 'off',
                ),
            ),
        )
    ));
}

function dental_care_services_shortcode($atts, $content = NULL) {
    global $post;
    extract(shortcode_atts(array(
        'param' => '',
        'title' => '',
        'num_items' => ' ',
        'carousel_items' => '',
        'service_type' => '',
        'service_desc_en' => '',
        'carousel_speed' => '',
        'service_hover' => '',
        'order_items' => '',
        'links_en' => '',
        'custom_links_en' => '',
        'service_category' => '',
        'arrows_en' => '',
                    ), $atts));

    if ($num_items == NULL) {
        $num_items = -1;
    }

    if ($service_category == NULL) {
        if ($order_items == 'yes') {
            $args = array(
                'post_type' => 'service',
                'post_status' => 'publish',
                'pagination' => true,
                'orderby' => 'title',
                'order' => 'ASC',
                'posts_per_page' => $num_items,
            );
        } else {

            $args = array(
                'post_type' => 'service',
                'post_status' => 'publish',
                'pagination' => true,
                'posts_per_page' => $num_items,
            );
        }
    } else {
        if ($order_items == 'yes') {
            $args = array(
                'post_type' => 'service',
                'post_status' => 'publish',
                'pagination' => true,
                'orderby' => 'title',
                'order' => 'ASC',
                'posts_per_page' => $num_items,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'service-categories',
                        'field' => 'slug',
                        'terms' => $service_category,
                    ),
                ),
            );
        } else {

            $args = array(
                'post_type' => 'service',
                'post_status' => 'publish',
                'pagination' => true,
                'posts_per_page' => $num_items,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'service-categories',
                        'field' => 'slug',
                        'terms' => $service_category,
                    ),
                ),
            );
        }
    }

    $allowed_html = array(
        'abbr' => array(
            'title' => true,
        ),
        'acronym' => array(
            'title' => true,
        ),
        'b' => array(),
        'blockquote' => array(
            'cite' => true,
        ),
        'cite' => array(),
        'code' => array(),
        'em' => array(),
        'i' => array(),
        'q' => array(
            'cite' => true,
        ),
        'strike' => array(),
        'strong' => array(),
        'i' => array(
            'class' => array(),
            'title' => array(),
            'style' => array(),
        ),
        'a' => array(
            'href' => array(),
            'rel' => array(),
            'class' => array(),
            'style' => array(),
            'onclick' => array(),
        ),
        'p' => array(
            'class' => array(),
            'style' => array(),
        ),
        'ul' => array(
            'class' => array(),
            'style' => array(),
        ),
        'ol' => array(
            'class' => array(),
            'style' => array(),
        ),
        'li' => array(
            'class' => array(),
            'style' => array(),
        )
    );

    // The Query
    $query = new WP_Query($args);

    $string = '<div class="dental-care-services-wrapper">';

    if ($arrows_en == 'on') {
        $string .= '<div class="carousel_arrow_nav_top">';
        $string .= '<a class="btn arrow_prev_top"><i class="fa fa-chevron-left"></i></a>';
        $string .= '<a class="btn arrow_next_top"><i class="fa fa-chevron-right"></i></a>';
        $string .= '</div>';
    }

    if ($title != NULL) {
        $string .= '<h3 class="dental-care-VC-title">' . esc_html($title) . '</h3>';
    }


    if ($service_type == "service_carousel") {

        $postcount = $query->post_count;

        $string .= '<div class="dental-care-service-carousel" data-speed="'.esc_attr($carousel_speed).'" data-items="'.esc_attr($carousel_items).'" data-count="'.esc_attr($postcount).'">';
        while ($query->have_posts()) {
            $query->the_post();
            $dental_care_service_desc = get_post_meta($post->ID, 'service_desc', $single = true);
            $service_img = get_the_post_thumbnail($post->ID, 'dental-care-block-thumb');

            $string .= '<div class="service-block">';
            if ($service_img != NULL) {

               if($service_hover == 'zoom'){
                    $string .='<div class="service-block-img service-zoom">';
                }else{
                $string .='<div class="service-block-img">';
                }

                if ($links_en == "on" || $links_en == "") {
                    if ($custom_links_en == "on") {
                        $dental_care_custom_link = get_post_meta($post->ID, 'service_custom_link', $single = true);

                        if ($dental_care_custom_link == "") {
                            $dental_care_custom_link = "#";
                        }

                        $string .= '<a rel="external" href="' . esc_url($dental_care_custom_link) . '">' . $service_img . '</a>';
                        $string .= '<a rel="external" href="' . esc_url($dental_care_custom_link) . '">';
                    } else {
                        $string .= '<a rel="external" href="' . get_the_permalink() . '">' . $service_img . '</a>';
                        $string .= '<a rel="external" href="' . get_the_permalink() . '">';
                    }
                } else {
                    $string .= $service_img;
                }

                if($service_hover == 'overlay'){
                $string .= '<span class="service-block-img-overlay">';
                $string .= '<i class="fa fa-link"></i>';
                $string .= '</span>';
                }
                $string .= '</a>';

                $string .= '</div>';
            }
            $string .= '<div class="service-main-detail">';
            if ($links_en == "on" || $links_en == "") {
                if ($custom_links_en == "on") {
                    $dental_care_custom_link = get_post_meta($post->ID, 'service_custom_link', $single = true);

                    if ($dental_care_custom_link == "") {
                        $dental_care_custom_link = "#";
                    }

                    $string .= '<h5 class="service-main-name"><a href="' . esc_url($dental_care_custom_link) . '">' . get_the_title() . '</a></h5>';
                } else {
                    $string .= '<h5 class="service-main-name"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h5>';
                }
            } else {
                $string .= '<h5 class="service-main-name">' . get_the_title() . '</h5>';
            }

            if($service_desc_en == 'on'){
            $string .= '<div class="service-desc">' . wp_kses($dental_care_service_desc, $allowed_html) . '</div>';
            }
            $string .= '</div>';
            $string .= '</div>';
        }
        $string .= '</div>';
    }
    else if ($service_type == "service_grid_three_col" || "service_grid_four_col") {
        if ($service_type == "service_grid_three_col") {

        $services_count = 3;
        while ($query->have_posts()) {
            $query->the_post();
            $dental_care_service_desc = get_post_meta($post->ID, 'service_desc', $single = true);
            $service_img = get_the_post_thumbnail($post->ID, 'dental-care-block-thumb');
            if ($services_count == 3) {
                $services_count = 0;
                $string .= '<div class="row">';
            }
            $services_count++;

            $string .= '<div class="col-md-4 service-block-block-item">';
            $string .= '<div class="service-block">';
            if ($service_img != NULL) {
                if($service_hover == 'zoom'){
                    $string .='<div class="service-block-img service-zoom">';
                }else{
                $string .='<div class="service-block-img">';
                }
                if ($links_en == "on" || $links_en == "") {
                    if ($custom_links_en == "on") {
                        $dental_care_custom_link = get_post_meta($post->ID, 'service_custom_link', $single = true);

                        if ($dental_care_custom_link == "") {
                            $dental_care_custom_link = "#";
                        }

                        $string .= '<a rel="external" href="' . esc_url($dental_care_custom_link) . '">' . $service_img . '</a>';
                        $string .= '<a rel="external" href="' . esc_url($dental_care_custom_link) . '">';
                    } else {
                        $string .= '<a rel="external" href="' . get_the_permalink() . '">' . $service_img . '</a>';
                        $string .= '<a rel="external" href="' . get_the_permalink() . '">';
                    }
                } else {
                    $string .= $service_img;
                }
                if($service_hover == 'overlay'){
                $string .= '<span class="service-block-img-overlay">';
                $string .= '<i class="fa fa-link"></i>';
                $string .= '</span>';
                }
                $string .= '</a>';

                $string .= '</div>';
            }
            $string .= '<div class="service-main-detail">';
            if ($links_en == "on" || $links_en == "") {
                if ($custom_links_en == "on") {
                    $dental_care_custom_link = get_post_meta($post->ID, 'service_custom_link', $single = true);

                    if ($dental_care_custom_link == "") {
                        $dental_care_custom_link = "#";
                    }

                    $string .= '<h5 class="service-main-name"><a href="' . esc_url($dental_care_custom_link) . '">' . get_the_title() . '</a></h5>';
                } else {
                    $string .= '<h5 class="service-main-name"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h5>';
                }
            } else {
                $string .= '<h5 class="service-main-name">' . get_the_title() . '</h5>';
            }
             if($service_desc_en == 'on'){
            $string .= '<div class="service-desc">' . wp_kses($dental_care_service_desc, $allowed_html) . '</div>';
            }
            $string .= '</div> </div></div>';
            if ($services_count == 3) {
                $string .= '</div>';
            }
        }
        if ($services_count < 3) {
            $string .= '</div>';
        }
    }else if ($service_type == "service_grid_four_col") {

        $services_count = 4;
        while ($query->have_posts()) {
            $query->the_post();
            $dental_care_service_desc = get_post_meta($post->ID, 'service_desc', $single = true);
            $service_img = get_the_post_thumbnail($post->ID, 'dental-care-block-thumb');
            if ($services_count == 4) {
                $services_count = 0;
                $string .= '<div class="row">';
            }
            $services_count++;

            $string .= '<div class="col-md-3 service-block-block-item">';
            $string .= '<div class="service-block">';
            if ($service_img != NULL) {
                if($service_hover == 'zoom'){
                    $string .='<div class="service-block-img service-zoom">';
                }else{
                $string .='<div class="service-block-img">';
                }
                if ($links_en == "on" || $links_en == "") {
                    if ($custom_links_en == "on") {
                        $dental_care_custom_link = get_post_meta($post->ID, 'service_custom_link', $single = true);

                        if ($dental_care_custom_link == "") {
                            $dental_care_custom_link = "#";
                        }

                        $string .= '<a rel="external" href="' . esc_url($dental_care_custom_link) . '">' . $service_img . '</a>';
                        $string .= '<a rel="external" href="' . esc_url($dental_care_custom_link) . '">';
                    } else {
                        $string .= '<a rel="external" href="' . get_the_permalink() . '">' . $service_img . '</a>';
                        $string .= '<a rel="external" href="' . get_the_permalink() . '">';
                    }
                } else {
                    $string .= $service_img;
                }
                if($service_hover == 'overlay'){
                $string .= '<span class="service-block-img-overlay">';
                $string .= '<i class="fa fa-link"></i>';
                $string .= '</span>';
                }
                $string .= '</a>';

                $string .= '</div>';
            }
            $string .= '<div class="service-main-detail">';
            if ($links_en == "on" || $links_en == "") {
                if ($custom_links_en == "on") {
                    $dental_care_custom_link = get_post_meta($post->ID, 'service_custom_link', $single = true);

                    if ($dental_care_custom_link == "") {
                        $dental_care_custom_link = "#";
                    }

                    $string .= '<h5 class="service-main-name"><a href="' . esc_url($dental_care_custom_link) . '">' . get_the_title() . '</a></h5>';
                } else {
                    $string .= '<h5 class="service-main-name"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h5>';
                }
            } else {
                $string .= '<h5 class="service-main-name">' . get_the_title() . '</h5>';
            }
             if($service_desc_en == 'on'){
            $string .= '<div class="service-desc">' . wp_kses($dental_care_service_desc, $allowed_html) . '</div>';
            }
            $string .= '</div> </div></div>';
            if ($services_count == 4) {
                $string .= '</div>';
            }
        }
        if ($services_count < 4) {
            $string .= '</div>';
        }

    }
    }

    wp_reset_postdata();
    $string .= '</div> ';
    return $string;
    }
