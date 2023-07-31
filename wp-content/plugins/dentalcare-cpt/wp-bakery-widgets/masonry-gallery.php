<?php

add_action('vc_before_init', 'dental_care_masonry_gallery_VC');

function dental_care_masonry_gallery_VC() {
    vc_map(array(
        "name" => esc_html__("Masonry Gallery", 'dental-care'),
        "base" => "dental_care_masonry_gallery",
        "class" => "",
        "category" => esc_html__('Dental Care', 'dental-care'),
        "params" => array(
            array(
                "type" => "attach_images",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Gallery Images", 'dental-care'),
                "param_name" => "gallery_imgs",
                "description" => esc_html__("Choose images to add to gallery", 'dental-care'),
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Enable Captions", 'dental-care'),
                "param_name" => "captions_en",
                "description" => esc_html__("Choose to enable captions", 'dental-care'),
                "value" => array(
                    '' => '',
                    'On' => 'on',
                    'Off' => 'off',
                ),
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Gutter Size", 'dental-care'),
                "param_name" => "gutter_size",
                "description" => esc_html__("Enter a number for grid gutter size (px).", 'dental-care'),
            ),
        )
    ));
}

function dental_care_masonry_gallery_shortcode($atts, $content = NULL) {
    global $post;
    extract(shortcode_atts(array(
        'param' => '',
        'gallery_imgs' => '',
        'captions_en' => '',
        'gutter_size' => '',
                    ), $atts));


    $image_ids = explode(',', $gallery_imgs);

    $string = '<div class="stronghold-masonry-gallery-widget" data-gutter-size="';

    if ($gutter_size != '') {
        $string .= esc_attr($gutter_size);
    }

    $string .= '">';

    $string .= '<div class="stronghold-masonry-gallery">';

    foreach ($image_ids as $image_id) {
        $thumbnail_url = wp_get_attachment_image_src($image_id, 'full', true);

        $string .= '<div class="masonry-gallery-item">';

        $string .= '<div class="masonry-img">';

        $string .= '<a rel="external" href="' . esc_url($thumbnail_url[0]) . ' ">';

        if ($captions_en == "on") {
            $caption = get_the_excerpt($image_id);
            
                if ($caption != "") {
                    $string .= '<h5 class="masonry-gallery-caption">' . esc_html($caption) . '</h5>';
                }
        } 

        $string .= '</a>';

        $string .= '<a rel="external" href="' . esc_url($thumbnail_url[0]) . ' ">';
        $string .= '<img src="' . esc_url($thumbnail_url[0]) . '" alt="Gallery Image">';
        $string .= '</a>';

        $string .= '</div>';
        $string .= '</div>';
    }

    $string .= '</div>';
    $string .= '</div>';

    return $string;
}
