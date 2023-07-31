<?php

add_action('vc_before_init', 'dental_care_counter_VC');

function dental_care_counter_VC() {
    vc_map(array(
        "name" => esc_html__("Counter", 'dental-care'),
        "base" => "dental_care_counter",
        "class" => "",
        "category" => esc_html__('Dental Care', 'dental-care'),
        "params" => array(
          
            array(
                "type" => "icon",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Icon", 'dental-care'),
                "param_name" => "icon_class",
                "description" => esc_html__("Select an icon.", "dental-care"),
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Icon Font Size", 'dental-care'),
                "param_name" => "icon_font_size",
                "value" => 50,
                "min" => 1,
                "max" => 100,
                "suffix" => "px",
                "description" => esc_html__("Enter icon font size.", 'dental-care')
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Icon Color", 'dental-care'),
                "param_name" => "icon_color",
                "description" => esc_html__("Choose icon color", 'dental-care')
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Icon Position", 'dental-care'),
                "param_name" => "icon_position_select",
                "description" => esc_html__("Choose an icon position.", 'dental-care'),
                "value" => array("Icon Top" => "icon_top", "Icon Left" => "icon_left"),
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Number", 'dental-care'),
                "param_name" => "icon_number",
                "description" => esc_html__("Enter a number to count up to.", 'dental-care'),
                "group" => "Content"
            ),
            array(
                "type" => "textarea",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Description", 'dental-care'),
                "param_name" => "icon_desc",
                "description" => esc_html__("Enter a description", 'dental-care'),
                "group" => "Content"
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Number Font Size", 'dental-care'),
                "param_name" => "icon_number_font_size",
                "min" => 1,
                "max" => 100,
                "suffix" => "px",
                "description" => esc_html__("Enter title font size.", 'dental-care'),
                "group" => "Typography"
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Number Color", 'dental-care'),
                "param_name" => "icon_number_color",
                "description" => esc_html__("Choose a color for the number.", 'dental-care'),
                "group" => "Typography"
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Description Font Size", 'dental-care'),
                "param_name" => "icon_desc_font_size",
                "min" => 1,
                "max" => 100,
                "suffix" => "px",
                "description" => esc_html__("Enter description font size.", 'dental-care'),
                "group" => "Typography"
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Description Color", 'dental-care'),
                "param_name" => "icon_desc_color",
                "description" => esc_html__("Choose a color for the description.", 'dental-care'),
                "group" => "Typography"
            ),
        )
    ));
}

function dental_care_counter_shortcode($atts, $content = NULL) {
    global $post;
    extract(shortcode_atts(array(
        'param' => '',
        'icon_font_size' => '',
        'icon_class' => '',
        'icon_color' => '',
        'icon_position_select' => '',
        'icon_bg_color' => '',
        'icon_number' => '',
        'icon_desc' => '',
        'icon_number_font_size' => '',
        'icon_desc_font_size' => '',
        'icon_number_color' => '',
        'icon_desc_color' => ''
                    ), $atts));

    $info_icon = '';
    $icon_position = '';
    $content_position = '';

    if ($icon_class != '') {
        $info_icon = $icon_class;
    }

    if ($icon_position_select == 'icon_left') {
        $icon_position = 'float: left; width: 15%; padding-right:10px;';
        $content_position = 'float: left; width: 80%; text-align: left; padding: 20px 0;';
    }

    $string = '<div class="stronghold-counter-wrapper style="';

    if($icon_position_select == 'icon_left'):
        $string .= 'overflow: auto;';
    endif;

    $string .= '">';

    $string .= '<div class="stronghold-info-icon" style="';
    if ($icon_position_select == 'icon_left'):
        $string .= esc_attr($icon_position);
    endif;
    $string .= '">';

    $string .= '<i class="' . esc_attr($info_icon) . '" style="font-size:' . esc_attr($icon_font_size) . 'px;';

    if ($icon_color != ''):
        $string .= ' color:' . esc_attr($icon_color) . ';';
    endif;

    if ($icon_bg_color != ''):
        $string .= ' background:' . esc_attr($icon_bg_color) . ';';
    endif;

    $string .= '"></i>';
    $string .= '</div>';

    $string .= '<div class="stronghold-info-icon-content" style="';
    if ($icon_position_select == 'icon_left'):
        $string .= esc_attr($content_position);
    endif;
    $string .= '">';
    $string .= '<div class="stronghold-info-number">';

    $string .= '<h3 style="';
    if ($icon_number_font_size != ''):
        $string .= 'font-size:' . esc_attr($icon_number_font_size) . 'px;';
    endif;

    if ($icon_number_color != ''):
        $string .= 'color:' . esc_attr($icon_number_color) . ';';
    endif;
    $string .= '">';

    $string .= '<input type="text" value="' . esc_attr($icon_number) . '">';
    $string .= '<span data-from="0" data-to="' . esc_attr($icon_number) . '" class="counter-number-val"> 0 </span></h3>';

    $string .= '</div>';
    $string .= '<div class="stronghold-info-icon-desc">';
    $string .= '<p style="';
    if ($icon_desc_font_size != ''):
        $string .= 'font-size:' . esc_attr($icon_desc_font_size) . 'px;';
    endif;

    if ($icon_desc_color != ''):
        $string .= ' color:' . esc_attr($icon_desc_color) . ';';
    endif;

    $string .= '">' . esc_html($icon_desc) . ' </p>';
    $string .= '</div>';
    $string .= '</div>';

    $string .= '</div>';

    return $string;
}
