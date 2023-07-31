<?php

add_action('vc_before_init', 'dental_care_shop_VC');

function dental_care_shop_VC() {
    vc_map(array(
        "name" => esc_html__("Product Carousel", 'dental-care'),
        "base" => "dental_care_shop_carousel",
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
                "description" => esc_html__("Enter the number of products to display. Enter -1 to display all items.", 'dental-care')
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
                "description" => esc_html__("Enter the number of products columns to display in carousel.", 'dental-care')
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
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Slider Type", 'dental-care'),
                "param_name" => "slider_type",
                "description" => esc_html__("Choose to display either Recent or Featured products", 'dental-care'),
                "value" => array(
                    'Recent Products' => 'recent_products',
                    'Featured Products' => 'featured_products',
                ),
            ),
        )
    ));
}

function dental_care_shop_shortcode($atts, $content = NULL) {
    global $post;
    extract(shortcode_atts(array(
        'param' => '',
        'title' => '',
        'num_items' => ' ',
        'slider_type' => '',
        'carousel_speed' => '',
        'carousel_items' => '',
        'arrows_en' => '',
                    ), $atts));

    if ($num_items == NULL) {
        $num_items = -1;
    }

    if ($slider_type == 'featured_products') {
        $args = array(
            'post_status' => 'publish',
            'post_type' => 'product',
            'ignore_sticky_posts' => 1,
            'posts_per_page' => $num_items,
            'order' => 'DESC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_visibility',
                    'field' => 'name',
                    'terms' => 'featured',
                    'operator' => 'IN'
                ),
            ),
        );
    } else {
        $args = array(
            'post_status' => 'publish',
            'post_type' => 'product',
            'ignore_sticky_posts' => 1,
            'posts_per_page' => $num_items,
        );
    }

    // The Query
    $query = new WP_Query($args);

    global $woocommerce;

    if (class_exists('WooCommerce')) {
        $string = '<div class="products-wrapper">';
        if ($title != NULL) {
            $string .= '<h3 class="dental-care-VC-title">' . esc_html($title) . '</h3>';
        }

        if ($arrows_en == 'on') {
            $string .= '<div class="carousel_arrow_nav_top">';
            $string .= '<a class="btn arrow_prev_top"><i class="fa fa-chevron-left"></i></a>';
            $string .= '<a class="btn arrow_next_top"><i class="fa fa-chevron-right"></i></a>';
            $string .= '</div>';
        }

        $postcount = $query->post_count;

        $string .= '<div class="dental-care-products" data-speed="' . esc_attr($carousel_speed) . '" data-items="' . esc_attr($carousel_items) . '" data-count="' . esc_attr($postcount) . '">';

        while ($query->have_posts()) {
            $query->the_post();
            if (has_post_thumbnail()) {
                global $product;
                $productname = get_the_title();
                $productlink = get_the_permalink();
                $productimg = get_the_post_thumbnail($post->ID, 'dental-care-product-carousel-thumb');
                $price = get_post_meta(get_the_ID(), '_price', true);
                $productcat = wc_get_product_category_list($product->get_id());
                $attachment_img_ids = $product->get_gallery_image_ids();

                $string .= ' <div class="dental-care-product-item"><div class="product_img_container_sc"><a href="' . esc_url($productlink) . '"><div class="product_img_front_sc"> ' . $productimg . ' </div>';
                if ($attachment_img_ids) {

                    foreach ($attachment_img_ids as $attachment_id) {
                        $img_link = wp_get_attachment_url($attachment_id);
                        if (!$img_link)
                            continue;

                        $string .= '<div class="product_img_back_sc">' . wp_get_attachment_image($attachment_id, 'dental-care-product-carousel-thumb') . '</div>';
                    }
                }

                $string .= '  </a></div>';
                $string .= '  <div class="product-info-sc" ><div class="product-name-sc-wrap"><h6 class="product-name-sc"><a href="' . esc_url($productlink) . '"> ' . esc_html($productname) . '</a></h6></div> ';
                $string .= '<div class="product-category">' . $productcat . '</div>';
                $string .= '<div class="product-price">' . get_woocommerce_currency_symbol() . esc_html($price) . '</div>';

                $string .= '  </div></div>';
            }
        }

        $string .= '</div>   </div> ';

        wp_reset_query();
        return $string;
    }
}
