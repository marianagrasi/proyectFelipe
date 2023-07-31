<?php

add_action('vc_before_init', 'dental_care_testimonial_VC');

function dental_care_testimonial_VC() {

    vc_map(array(
        "name" => esc_html__("Testimonials", 'dental-care'),
        "base" => "dental_care_testimonials",
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
                "heading" => esc_html__("Testimonial Display Type", 'dental-care'),
                "param_name" => "testimonial_type",
                "description" => esc_html__("Choose a testimonial type.", 'dental-care'),
                "value" => array("" => "", "Testimonial Carousel" => "testimonial_carousel", "Testimonial Slider" => "testimonial_slider"),
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Testimonial Carousel Design", 'dental-care'),
                "param_name" => "testimonial_carousel_design",
                "description" => esc_html__("Choose a testimonial carousel design.", 'dental-care'),
                "dependency" => array("element" => "testimonial_type", "value" => array("testimonial_carousel")),
                "value" => array(
                    '' => '',
                    'Design One' => 'design_one',
                    'Design Two' => 'design_two',
                ),
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Slide Speed", 'dental-care'),
                "param_name" => "carousel_speed",
                "description" => esc_html__("Enter the number for the carousel speed. (Default: 5000)", 'dental-care')
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
                "heading" => esc_html__("Filter testimonials by category", 'dental-care'),
                "param_name" => "filter_testimonial_en",
                "description" => esc_html__("Choose to filter testimonials by category.", 'dental-care'),
                "value" => array(
                    '' => '',
                    'On' => 'on',
                    'Off' => 'off',
                )
            ),
            array(
                "type" => "testimonial_category",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Testimonial Category", 'dental-care'),
                "param_name" => "testimonial_category",
                "description" => esc_html__("Choose a testimonial category.", 'dental-care'),
                "dependency" => array("element" => "filter_testimonial_en", "value" => array("on")),
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Number of carousel items", 'dental-care'),
                "param_name" => "carousel_items",
                "description" => esc_html__("Enter the number of testimonials columns to display in carousel.", 'dental-care'),
                "group" => "Carousel",
                "dependency" => array("element" => "testimonial_type", "value" => array("testimonial_carousel")),
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Enable Arrows", 'dental-care'),
                "param_name" => "arrows_en",
                "description" => esc_html__("Choose to enable or disable arrows on carousel.", 'dental-care'),
                "value" => array(
                    '' => '',
                    'On' => 'on',
                    'Off' => 'off',
                ),
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Background Color", 'dental-care'),
                "param_name" => "testimonial_bg_color",
                "description" => esc_html__("Choose a color for the background of each item.", 'dental-care'),
                "group" => "Carousel",
                "dependency" => array("element" => "testimonial_type", "value" => array("testimonial_carousel")),
            ),

            array(
      "type" => "colorpicker",
      "class" => "",
      "heading" => esc_html__("Border Color", 'dental-care'),
      "param_name" => "testimonial_border_color",
      "description" => esc_html__("Choose a border color.", 'dental-care'),
    ),
    array(
      "type" => "textfield",
      "class" => "",
      "heading" => esc_html__("Border Width", 'dental-care'),
      "param_name" => "testimonial_border_width",
      "description" => esc_html__("Choose a border width.", 'dental-care'),
    ),
    array(
      "type" => "dropdown",
      "holder" => "div",
      "class" => "",
      "heading" => esc_html__("Border Style", 'dental-care'),
      "param_name" => "testimonial_border_style",
      "description" => esc_html__("Choose a border style.", 'dental-care'),
      "value" => array("" => "", "Solid" => "solid", "Dotted" => "dotted", "Dashed" => "dashed", "Double" => "double", "None" => "none"),
    ),
    array(
      "type" => "textfield",
      "class" => "",
      "heading" => esc_html__("Border Radius", 'dental-care'),
      "param_name" => "testimonial_border_radius",
      "description" => esc_html__("Choose a border radius.", 'dental-care'),
    ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Enable Box Shadow", 'dental-care'),
                "param_name" => "shadow_en",
                "description" => esc_html__("Choose to enable or disable box shadow.", 'dental-care'),
                "group" => "Carousel",
                "value" => array(
                    '' => '',
                    'On' => 'on',
                    'Off' => 'off',
                ),
               "dependency" => array("element" => "testimonial_carousel_design", "value" => array("design_one")),
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Text Color", 'dental-care'),
                "param_name" => "testimonial_text_color",
                "description" => esc_html__("Choose a color for the text.", 'dental-care'),
                "group" => "Typography"
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Text Font Size", 'dental-care'),
                "param_name" => "testimonial_text_font_size",
                "description" => esc_html__("Enter text font size.", 'dental-care'),
                "group" => "Typography"
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Author Color", 'dental-care'),
                "param_name" => "testimonial_author_color",
                "description" => esc_html__("Choose a color for the author title.", 'dental-care'),
                "group" => "Typography"
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Author Font Size", 'dental-care'),
                "param_name" => "testimonial_author_font_size",
                "description" => esc_html__("Enter author title font size.", 'dental-care'),
                "group" => "Typography"
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Position Color", 'dental-care'),
                "param_name" => "testimonial_pos_color",
                "description" => esc_html__("Choose a color for the position title.", 'dental-care'),
                "group" => "Typography"
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Position Font Size", 'dental-care'),
                "param_name" => "testimonial_pos_font_size",
                "description" => esc_html__("Enter position title font size.", 'dental-care'),
                "group" => "Typography"
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Quote Icon Color", 'dental-care'),
                "param_name" => "testimonial_quote_icon_color",
                "description" => esc_html__("Choose a color for the quote icon.", 'dental-care'),
                "group" => "Typography"
            ),

        )
    ));
}

function dental_care_testimonial_shortcode($atts, $content = NULL) {
    global $post;
    extract(shortcode_atts(array(
        'param' => '',
        'title' => '',
        'testimonial_type' => '',
        'carousel_speed' => '',
        'carousel_items' => '',
        'order_items' => '',
        'arrows_en' => '',
        'testimonial_bg_color' => '',
        'shadow_en' => '',
        'testimonial_text_color' => '',
        'testimonial_text_font_size' => '',
        'testimonial_author_color' => '',
        'testimonial_author_font_size' => '',
        'testimonial_pos_color' => '',
        'testimonial_pos_font_size' => '',
        'testimonial_category' => '',
        'testimonial_carousel_design' => '',
        'testimonial_bg_color' => '',
        'testimonial_border_color' => '',
        'testimonial_border_width' => '',
        'testimonial_border_style' => '',
        'testimonial_border_radius' => '',
        'testimonial_quote_icon_color' => '',
                    ), $atts));


    if ($order_items == 'yes') {
        if ($testimonial_category != '') {
            $args = array(
                'post_type' => 'testimonial',
                'post_status' => 'publish',
                'pagination' => true,
                'orderby' => 'title',
                'order' => 'ASC',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'testimonial-categories',
                        'field' => 'slug',
                        'terms' => $testimonial_category,
                    ),
                ),
            );
        } else {
            $args = array(
                'post_type' => 'testimonial',
                'post_status' => 'publish',
                'pagination' => true,
                'orderby' => 'title',
                'order' => 'ASC',
                'posts_per_page' => -1,
            );
        }
    } else {
        if ($testimonial_category != '') {
            $args = array(
                'post_type' => 'testimonial',
                'post_status' => 'publish',
                'pagination' => true,
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'testimonial-categories',
                        'field' => 'slug',
                        'terms' => $testimonial_category,
                    ),
                ),
            );
        } else {
            $args = array(
                'post_type' => 'testimonial',
                'post_status' => 'publish',
                'pagination' => true,
                'posts_per_page' => -1,
            );
        }
    }

    $allowed_html = array(
        'p' => array(
            'class' => array(),
            'style' => array(),
        )
    );

    // The Query
    $query = new WP_Query($args);

    $string = '<div class="dental-care-testimonials-wrapper">';

    if ($arrows_en == 'on') {
        $string .= '<div class="carousel_arrow_nav_top">';
        $string .= '<a class="btn arrow_prev_top"><i class="fa fa-chevron-left"></i></a>';
        $string .= '<a class="btn arrow_next_top"><i class="fa fa-chevron-right"></i></a>';
        $string .= '</div>';
    }

    if ($title != NULL) {
        $string .= '<h3 class="dental-care-VC-title">' . esc_html($title) . '</h3>';
    }

    if ($testimonial_type == 'testimonial_carousel') {
        $postcount = $query->post_count;

        $string .= '<div class="dental-care-testimonials" data-speed="' . esc_attr($carousel_speed) . '" data-items="' . esc_attr($carousel_items) . '" data-count="' . esc_attr($postcount) . '">';

        while ($query->have_posts()) {
            $query->the_post();

            $testimonytext = "" . get_post_meta($post->ID, 'testimonialtext', $single = true);
            $testimonyname = get_post_meta($post->ID, 'testimonialname', $single = true);
            $testimonypos = get_post_meta($post->ID, 'testimonialposition', $single = true);
            $testimonyrating = get_post_meta($post->ID, 'testimonialrating', $single = true);
            $testimonypic = get_the_post_thumbnail($post->ID, 'thumbnail');

            if($testimonial_carousel_design == 'design_one' || $testimonial_carousel_design == ''){
            $string .= '<div class="dental-care-testimonials-item" style="';

            if ($testimonial_bg_color != '') {
                $string .= ' background: ' . esc_attr($testimonial_bg_color) . ';';
            }

            if($shadow_en == 'on'){
                $string .= '  box-shadow: 0 0 9px rgba(129, 129, 129, 0.09); -webkit-box-shadow: 0 0 9px rgba(129, 129, 129, 0.09); ';
            }

            if ($testimonial_text_color != '') {
                $string .= ' color: ' . esc_attr($testimonial_text_color) . ';';
            }

            if ($testimonial_border_color != "") {
              $string .= ' border-color:' . esc_attr($testimonial_border_color) . ';';
            }

            if ($testimonial_border_radius != "") {
              $string .= ' border-radius:' . esc_attr($testimonial_border_radius) . 'px;';
            }

            if ($testimonial_border_style != "") {
              $string .= ' border-style:' . esc_attr($testimonial_border_style) . ';';
            }

            if ($testimonial_border_width != "") {
              $string .= ' border-width:' . esc_attr($testimonial_border_width) . 'px;';
            }

            $string .= '"> <i class="fa fa-quote-left" style="';

            if ($testimonial_quote_icon_color != '') {
                $string .= ' color: ' . esc_attr($testimonial_quote_icon_color) . ';';
            }
            
            $string .= '"></i>';
            $string .= '<div class="dental-care-testim-text" style="';

            if ($testimonial_text_color != '') {
                $string .= ' color: ' . esc_attr($testimonial_text_color) . ';';
            }

            if ($testimonial_text_font_size != '') {
                $string .= 'font-size:' . esc_attr($testimonial_text_font_size) . 'px;';
            }

            $string .= '">' . wp_kses($testimonytext, $allowed_html) . ' </div>';
            $string .= '<div class="dental-care-author">';
            if ($testimonypic != NULL) {
                $string .= $testimonypic;
            }
            $string .= '<ul class="dental-care-author-info">';
            $string .= '<li class="dental-care-testim-name" style="';

            if ($testimonial_author_font_size != '') {
                $string .= 'font-size:' . esc_attr($testimonial_author_font_size) . 'px;';
            }

            $string .= '"><h6 style="';

            if ($testimonial_author_color != '') {
                $string .= ' color: ' . esc_attr($testimonial_author_color) . ';';
            }

            $string .= '">' . esc_html($testimonyname) . '</h6></li> ';
            $string .= '<li class="dental-care-testim-position" style="';

            if ($testimonial_pos_color != '') {
                $string .= ' color: ' . esc_attr($testimonial_pos_color) . ';';
            }

            if ($testimonial_pos_font_size != '') {
                $string .= 'font-size:' . esc_attr($testimonial_pos_font_size) . 'px;';
            }

            $string .= '">' . esc_html($testimonypos) . '</li>';

            if ($testimonyrating != '') {
                $string .= ' <li class="testimonial-rating">';
                if ($testimonyrating == 'one_star') {
                    $string .= '<i class="fa fa-star "></i>';
                }if ($testimonyrating == 'two_star') {
                    $string .= '<i class="fa fa-star "></i>';
                    $string .= '<i class="fa fa-star "></i>';
                }if ($testimonyrating == 'three_star') {
                    $string .= '<i class="fa fa-star "></i>';
                    $string .= '<i class="fa fa-star "></i>';
                    $string .= '<i class="fa fa-star "></i>';
                }if ($testimonyrating == 'four_star') {
                    $string .= '<i class="fa fa-star "></i>';
                    $string .= '<i class="fa fa-star "></i>';
                    $string .= '<i class="fa fa-star "></i>';
                    $string .= '<i class="fa fa-star "></i>';
                }if ($testimonyrating == 'five_star') {
                    $string .= '<i class="fa fa-star "></i>';
                    $string .= '<i class="fa fa-star "></i>';
                    $string .= '<i class="fa fa-star "></i>';
                    $string .= '<i class="fa fa-star "></i>';
                    $string .= '<i class="fa fa-star "></i>';
                }
                $string .= '</li>';
            }

            $string .= '</ul>';
            $string .= '</div>';
            $string .= '</div>';
        }else{

            $string .= '<div class="dental-care-testimonials-item-two">';

            $string .= '<div class="dental-care-testim-text" style="';


            if ($testimonial_text_color != '') {
                $string .= ' color: ' . esc_attr($testimonial_text_color) . ';';
            }

            if ($testimonial_text_font_size != '') {
                $string .= 'font-size:' . esc_attr($testimonial_text_font_size) . 'px;';
            }

            if ($testimonial_bg_color != '') {
                $string .= ' background: ' . esc_attr($testimonial_bg_color) . ';';
            }


           $string .= '">';

           $string .= ' <i class="fa fa-quote-left" style="';

           if ($testimonial_quote_icon_color != '') {
               $string .= ' color: ' . esc_attr($testimonial_quote_icon_color) . ';';
           }

           $string .= '"></i>';

            $string .= ''. wp_kses($testimonytext, $allowed_html) . '';

            $string .= '<span class="testimonial-bottom-arrow" style="';

            if ($testimonial_bg_color != '') {
                $string .= ' background: ' . esc_attr($testimonial_bg_color) . ';';
            }

            $string .= '"></span>';

            $string .= '</div>';
            $string .= '<div class="dental-care-author">';
            if ($testimonypic != NULL) {
                $string .= $testimonypic;
            }
            $string .= '<ul class="dental-care-author-info">';
            $string .= '<li class="dental-care-testim-name" style="';

            if ($testimonial_author_font_size != '') {
                $string .= 'font-size:' . esc_attr($testimonial_author_font_size) . 'px;';
            }

            $string .= '"><h6 style="';

            if ($testimonial_author_color != '') {
                $string .= ' color: ' . esc_attr($testimonial_author_color) . ';';
            }

            $string .= '">' . esc_html($testimonyname) . '<h6></li> ';
            $string .= '<li class="dental-care-testim-position" style="';

            if ($testimonial_pos_color != '') {
                $string .= ' color: ' . esc_attr($testimonial_pos_color) . ';';
            }

            if ($testimonial_pos_font_size != '') {
                $string .= 'font-size:' . esc_attr($testimonial_pos_font_size) . 'px;';
            }

            $string .= '">' . esc_html($testimonypos) . '</li>';

            if ($testimonyrating != '') {
                $string .= ' <li class="testimonial-rating">';
                if ($testimonyrating == 'one_star') {
                    $string .= '<i class="fa fa-star "></i>';
                }if ($testimonyrating == 'two_star') {
                    $string .= '<i class="fa fa-star "></i>';
                    $string .= '<i class="fa fa-star "></i>';
                }if ($testimonyrating == 'three_star') {
                    $string .= '<i class="fa fa-star "></i>';
                    $string .= '<i class="fa fa-star "></i>';
                    $string .= '<i class="fa fa-star "></i>';
                }if ($testimonyrating == 'four_star') {
                    $string .= '<i class="fa fa-star "></i>';
                    $string .= '<i class="fa fa-star "></i>';
                    $string .= '<i class="fa fa-star "></i>';
                    $string .= '<i class="fa fa-star "></i>';
                }if ($testimonyrating == 'five_star') {
                    $string .= '<i class="fa fa-star "></i>';
                    $string .= '<i class="fa fa-star "></i>';
                    $string .= '<i class="fa fa-star "></i>';
                    $string .= '<i class="fa fa-star "></i>';
                    $string .= '<i class="fa fa-star "></i>';
                }
                $string .= '</li>';
            }

            $string .= '</ul>';
            $string .= '</div>';
            $string .= '</div>';

        }

        }

        $string .= '</div>';
    } else if ($testimonial_type == 'testimonial_slider') {

        $carousel_items = 1;
        $postcount = $query->post_count;

        $string .= '<div class="testimonials-slider" data-speed="' . esc_attr($carousel_speed) . '" data-items="' . esc_attr($carousel_items) . '" data-count="' . esc_attr($postcount) . '">';


        while ($query->have_posts()) {
            $query->the_post();

            $testimonytext = "" . get_post_meta($post->ID, 'testimonialtext', $single = true);
            $testimonyname = get_post_meta($post->ID, 'testimonialname', $single = true);
            $testimonypos = get_post_meta($post->ID, 'testimonialposition', $single = true);
            $testimonyrating = get_post_meta($post->ID, 'testimonialrating', $single = true);
            $testimonypic = get_the_post_thumbnail($post->ID, 'thumbnail');

            $string .= '<div class="dental-care-testimonials-item" style="';

            if ($testimonial_border_color != "") {
              $string .= ' border-color:' . esc_attr($testimonial_border_color) . ';';
            }

            if ($testimonial_border_radius != "") {
              $string .= ' border-radius:' . esc_attr($testimonial_border_radius) . 'px;';
            }

            if ($testimonial_border_style != "") {
              $string .= ' border-style:' . esc_attr($testimonial_border_style) . ';';
            }

            if ($testimonial_border_width != "") {
              $string .= ' border-width:' . esc_attr($testimonial_border_width) . 'px;';
            }

            $string .= '"> <i class="fa fa-quote-left" style="';

            if ($testimonial_quote_icon_color != '') {
                $string .= ' color: ' . esc_attr($testimonial_quote_icon_color) . ';';
            }

            $string .= '"></i><div class="dental-care-testim-text" style="';

            if ($testimonial_text_color != '') {
                $string .= ' color: ' . esc_attr($testimonial_text_color) . ';';
            }

            if ($testimonial_text_font_size != '') {
                $string .= 'font-size:' . esc_attr($testimonial_text_font_size) . 'px;';
            }

            $string .= '">' . wp_kses($testimonytext, $allowed_html) . ' </div>';
            $string .= '<div class="dental-care-author">';
            if ($testimonypic != NULL) {
                $string .= $testimonypic;
            }
            $string .= '<div class="dental-care-author-info">';

            $string .= '<div class="dental-care-testim-name" style="';

            if ($testimonial_author_font_size != '') {
                $string .= 'font-size:' . esc_attr($testimonial_author_font_size) . 'px;';
            }

            $string .= '"><h6 style="';

            if ($testimonial_author_color != '') {
                $string .= ' color: ' . esc_attr($testimonial_author_color) . ';';
            }

            $string .= '">' . esc_html($testimonyname) . '</h6></div> ';
            $string .= '<div class="dental-care-testim-position" style="';

            if ($testimonial_pos_color != '') {
                $string .= ' color: ' . esc_attr($testimonial_pos_color) . ';';
            }

            if ($testimonial_pos_font_size != '') {
                $string .= 'font-size:' . esc_attr($testimonial_pos_font_size) . 'px;';
            }

            $string .= '">' . esc_html($testimonypos) . '</div>';

            if ($testimonyrating != '') {
                $string .= ' <li class="testimonial-rating">';
                if ($testimonyrating == 'one_star') {
                    $string .= '<i class="fa fa-star "></i>';
                }if ($testimonyrating == 'two_star') {
                    $string .= '<i class="fa fa-star "></i>';
                    $string .= '<i class="fa fa-star "></i>';
                }if ($testimonyrating == 'three_star') {
                    $string .= '<i class="fa fa-star "></i>';
                    $string .= '<i class="fa fa-star "></i>';
                    $string .= '<i class="fa fa-star "></i>';
                }if ($testimonyrating == 'four_star') {
                    $string .= '<i class="fa fa-star "></i>';
                    $string .= '<i class="fa fa-star "></i>';
                    $string .= '<i class="fa fa-star "></i>';
                    $string .= '<i class="fa fa-star "></i>';
                }if ($testimonyrating == 'five_star') {
                    $string .= '<i class="fa fa-star "></i>';
                    $string .= '<i class="fa fa-star "></i>';
                    $string .= '<i class="fa fa-star "></i>';
                    $string .= '<i class="fa fa-star "></i>';
                    $string .= '<i class="fa fa-star "></i>';
                }
                $string .= '</li>';
            }

            $string .= '</div>';
            $string .= '</div>';
            $string .= '</div>';

        }

        $string .= '</div>';
    }


    $string .= '</div>';
    wp_reset_postdata();
    return $string;
}
