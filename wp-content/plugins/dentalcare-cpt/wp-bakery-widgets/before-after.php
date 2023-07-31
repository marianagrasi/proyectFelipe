<?php

add_action('vc_before_init', 'dental_care_before_after_VC');

function dental_care_before_after_VC() {
    vc_map(array(
        "name" => esc_html__("Before After", 'dental-care'),
        "base" => "dental_care_before_after",
        "class" => "",
        "category" => esc_html__('Dental Care', 'dental-care'),
        "params" => array(
            array(
                "type" => "attach_image",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Before Image", 'dental-care'),
                "param_name" => "before_img",
                "description" => esc_html__("Choose a before image.", 'dental-care'),
            ),
            array(
                "type" => "attach_image",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("After Image", 'dental-care'),
                "param_name" => "after_img",
                "description" => esc_html__("Choose an after image.", 'dental-care'),
            ),
        )
    ));
}

function dental_care_before_after_shortcode($atts, $content = NULL) {
    global $post;
    extract(shortcode_atts(array(
        'param' => '',
        'before_img' => '',
        'after_img' => '',
        
                    ), $atts));
    
    $before_img_src = '';
    $after_img_src = '';

    if ($before_img != '') {
        $before_img_src = wp_get_attachment_url($before_img, 'full', false, false);
    }
    if ($after_img != '') {
        $after_img_src = wp_get_attachment_url($after_img, 'full', false, false);
    }

    $string = '<div class="stronghold-before-after twentytwenty-container">';
    
    $string .= '<div class="stronghold-before-after-wrap">';
    $string .=  '<img src="'.esc_url($before_img_src).'" alt="Before Image">';
    $string .=  '<img src="'.esc_url($after_img_src).'" alt="After Image">';
    $string .= '</div>';
    
    $string .= '</div>';

    return $string;
}
