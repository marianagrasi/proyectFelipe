<?php

add_action('vc_before_init', 'dental_care_brands_VC');

function dental_care_brands_VC() {
    vc_map(array(
        "name" => esc_html__("Brands", 'dental-care'),
        "base" => "dental_care_brands",
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
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Number of items", 'dental-care'),
                "param_name" => "num_items",
                "description" => esc_html__("Enter the number of brands to display. Enter -1 to display all items.", 'dental-care')
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
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Carousel Speed", 'dental-care'),
                "param_name" => "carousel_speed",
                "description" => esc_html__("Enter the number for the carousel speed. (Default: 5000)", 'dental-care')
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Number of carousel items", 'dental-care'),
                "param_name" => "carousel_items",
                "description" => esc_html__("Enter the number of brands columns to display in carousel.", 'dental-care')
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
        )
    ));
}

function dental_care_brands_shortcode($atts, $content = NULL) {
    global $post;
    extract(shortcode_atts(array(
        'param' => '',
        'title' => '',
        'num_items' => ' ',
        'carousel_speed' => '',
        'carousel_items' => '',
        'order_items' => '',
        'arrows_en' => '',
                    ), $atts));

    if ($num_items == NULL) {
        $num_items = -1;
    }

     if ($order_items == 'yes'){
         $args = array(
        'post_type' => 'brand',
        'post_status' => 'publish',
        'pagination' => true,
        'orderby' => 'title',
	'order'   => 'ASC',
        'posts_per_page' => $num_items,
    );
    }else{
         $args = array(
        'post_type' => 'brand',
        'post_status' => 'publish',
        'pagination' => true,
        'posts_per_page' => $num_items,
    );
    }

    // The Query
    $query = new WP_Query($args);

    $string = '<div class="dental-care-brands-wrapper">';

    if ($arrows_en == 'on') {
            $string .= '<div class="carousel_arrow_nav_top">';
            $string .= '<a class="btn arrow_prev_top"><i class="fa fa-chevron-left"></i></a>';
            $string .= '<a class="btn arrow_next_top"><i class="fa fa-chevron-right"></i></a>';
            $string .= '</div>';
    }

    if ($title != NULL) {
        $string .= '<h3 class="dental-care-VC-title">' . esc_html($title) . '</h3>';
    }

    $postcount = $query->post_count;

    $string .= '<div class="dental-care-brands" data-speed="'.esc_attr($carousel_speed).'" data-items="'.esc_attr($carousel_items).'" data-count="'.esc_attr($postcount).'">';


    while ($query->have_posts()) {
        $query->the_post();

        if (has_post_thumbnail()) {
            $brandpic = get_the_post_thumbnail($post->ID, 'dental-care-brand-thumb');
            $brandlink = get_post_meta($post->ID, 'brand_link', $single = true);
            $string .= '  <a href="' . esc_url($brandlink) . '" target="_blank">' . $brandpic . ' </a>';
        }
    }
wp_reset_postdata();
    $string .= '</div></div>';
    return $string;
}
