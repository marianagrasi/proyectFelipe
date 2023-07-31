<?php

add_action('vc_before_init', 'dental_care_row_edit');

function dental_care_row_edit() {

    $newParams = array(
        array(
            "type" => "dropdown",
            "group" => "Background",
            "class" => "",
            "heading" => "Background Style",
            "param_name" => "bg_style",
            "value" => array(
                "Default" => "bg_default",
                "Fixed Parallax" => "bg_fixed_parallax",
                "Scroll Parallax" => "bg_scroll_parallax"
            )
        ),
        array(
            "type" => "attach_image",
            "group" => "Background",
            "class" => "",
            "heading" => esc_html__("Background Image", 'dental-care'),
            "param_name" => "row_bg_image",
            "description" => esc_html__("Choose an image for the background", 'dental-care')
        ),
        array(
            "type" => "colorpicker",
            "group" => "Background",
            "class" => "",
            "heading" => esc_html__("Background Overlay Color", 'dental-care'),
            "param_name" => "row_bg_overlay",
            "description" => esc_html__("Choose a color for the background", 'dental-care')
        ),
    );

    vc_add_params("vc_row", $newParams);
    vc_add_params("vc_row_inner", $newParams);
}
