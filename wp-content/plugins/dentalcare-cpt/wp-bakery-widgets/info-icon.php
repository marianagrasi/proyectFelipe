<?php

add_action('vc_before_init', 'dental_care_info_icon_VC');

function dental_care_info_icon_VC() {
    vc_map(array(
        "name" => esc_html__("Info Icon", 'dental-care'),
        "base" => "dental_care_info_icon",
        "class" => "",
        "category" => esc_html__('Dental Care', 'dental-care'),
        "params" => array(

            array(
                "type" => "icon",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Icon", 'dental-care'),
                "param_name" => "icon_class",
                "description" => esc_html__("Choose an icon.", "dental-care"),
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
                "value" => array("" => "", "Icon Top" => "icon_top", "Icon Left" => "icon_left"),
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Content Alignment", 'dental-care'),
                "param_name" => "icon_content_alignment",
                "description" => esc_html__("Choose content alignment.", 'dental-care'),
                "value" => array("" => "", "Left" => "left", "Center" => "center", "Right" => "right"),
                "group" => "Content"
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Apply Link to:", 'dental-care'),
                "param_name" => "icon_link_position",
                "description" => esc_html__("Choose where link should appear.", 'dental-care'),
                "value" => array("" => "", "Title" => "title", "Title & Icon" => "title_icon"),
            ),
            array(
                "type" => "vc_link",
                "class" => "",
                "heading" => __("Link", "dental-care"),
                "param_name" => "icon_link",
                "value" => "",
                "description" => __("Choose a link for the info icon.", "dental-care"),
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Title", 'dental-care'),
                "param_name" => "icon_title",
                "description" => esc_html__("Enter a title", 'dental-care'),
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
                "heading" => esc_html__("Title Font Size", 'dental-care'),
                "param_name" => "icon_title_font_size",
                "min" => 1,
                "max" => 100,
                "suffix" => "px",
                "description" => esc_html__("Enter title font size.", 'dental-care'),
                "group" => "Typography"
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Title Color", 'dental-care'),
                "param_name" => "icon_title_color",
                "description" => esc_html__("Choose a color for the title.", 'dental-care'),
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

function dental_care_info_icon_shortcode($atts, $content = NULL) {
    global $post;
    extract(shortcode_atts(array(
        'param' => '',
        'icon_class' => '',
        'icon_font_size' => '',
        'icon_class' => '',
        'icon_class' => '',
        'icon_color' => '',
        'icon_position_select' => '',
        'icon_bg_color' => '',
        'icon_link' => '',
        'icon_link_position' => '',
        'icon_title' => '',
        'icon_desc' => '',
        'icon_title_font_size' => '',
        'icon_title_color' => '',
        'icon_desc_font_size' => '',
        'icon_desc_color' => '',
        'icon_content_alignment' => ''
    ), $atts));

    $info_icon = '';
    $icon_position = '';
    $content_position = '';
    $href['url'] = '';

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

    if ($icon_link != '') {
        $href = vc_build_link($icon_link);
    }

    if ($icon_class != '') {
        $info_icon = $icon_class;
    }

    $string = '<div class="stronghold-info-icon-wrapper ';

    if ($icon_position_select == 'icon_left') {
     $string.= ' icon-left-wrapper';
 }

 $string .= '">';

 $string .= '<div class="stronghold-info-icon" style="';

 $string .= '">';

 if ($href['url'] != '') {
    if ($icon_link_position == 'title_icon') {
        $string .= '<a href="' . esc_url($href['url']) . '">';
        $string .= '<i class="' . esc_attr($info_icon) . '" style="font-size:' . esc_attr($icon_font_size) . 'px;';

        if ($icon_color != ''):
            $string .= ' color:' . esc_attr($icon_color) . ';';
        endif;

        if ($icon_bg_color != ''):
            $string .= ' background:' . esc_attr($icon_bg_color) . ';';
        endif;

        $string .= '"></i>';
        $string .= '</a>';
    }else if ($icon_link_position == '') {
        $string .= '<i class="' . esc_attr($info_icon) . '" style="font-size:' . esc_attr($icon_font_size) . 'px;';

        if ($icon_color != ''):
            $string .= ' color:' . esc_attr($icon_color) . ';';
        endif;

        if ($icon_bg_color != ''):
            $string .= ' background:' . esc_attr($icon_bg_color) . ';';
        endif;

        $string .= '"></i>';
    }
}else {
    $string .= '<i class="' . esc_attr($info_icon) . '" style="font-size:' . esc_attr($icon_font_size) . 'px;';

    if ($icon_color != ''):
        $string .= ' color:' . esc_attr($icon_color) . ';';
    endif;

    if ($icon_bg_color != ''):
        $string .= ' background:' . esc_attr($icon_bg_color) . ';';
    endif;

    $string .= '"></i>';
}
$string .= '</div>';

$string .= '<div class="stronghold-info-icon-content" style="';

if($icon_content_alignment != ''){
  $string .= 'text-align:'.esc_attr($icon_content_alignment).';';
}
$string .= '">';

$string .= '<div class="stronghold-info-icon-title">';

if ($href['url'] == '') {
    $string .= '<h3 style="';
    if ($icon_title_font_size != ''):
        $string .= 'font-size:' . esc_attr($icon_title_font_size) . 'px;';
    endif;

    if ($icon_title_color != ''):
        $string .= 'color:' . esc_attr($icon_title_color) . ';';
    endif;
    $string .= '">';

    $string .= esc_html($icon_title) . '</h3>';
} else {

    $string .= '<a href="' . esc_url($href['url']) . '"><h3 style="';
    if ($icon_title_font_size != ''):
        $string .= 'font-size:' . esc_attr($icon_title_font_size) . 'px;';
    endif;

    if ($icon_title_color != ''):
        $string .= ' color:' . esc_attr($icon_title_color) . ';';
    endif;
    $string .= '">';

    $string .= esc_html($icon_title) . '</h3></a>';

}
$string .= '</div>';
$string .= '<div class="stronghold-info-icon-desc">';
$string .= '<div style="';
if ($icon_desc_font_size != ''):
    $string .= 'font-size:' . esc_attr($icon_desc_font_size) . 'px;';
endif;

if ($icon_desc_color != ''):
    $string .= ' color:' . esc_attr($icon_desc_color) . ';';
endif;

$string .= '">' . wp_kses($icon_desc, $allowed_html) . ' </div>';
$string .= '</div>';
$string .= '</div>';

$string .= '</div>';

return $string;
}
