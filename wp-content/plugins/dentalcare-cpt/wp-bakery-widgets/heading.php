<?php

add_action('vc_before_init', 'dental_care_heading_VC');

function dental_care_heading_VC() {
    vc_map(array(
        "name" => esc_html__("Heading", 'dental-care'),
        "base" => "dental_care_heading",
        "class" => "",
        "category" => esc_html__('Dental Care', 'dental-care'),
        "params" => array(
            array(
                "type" => "textarea",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Title", 'dental-care'),
                "param_name" => "title",
                "description" => esc_html__("Enter text for title.", 'dental-care')
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Title Tag", 'dental-care'),
                "param_name" => "title_tag",
                "description" => esc_html__("Choose title tag.", 'dental-care'),
                "value" => array(
                    "" => "",
                    "h1" => "h1",
                    "h2 " => "h2",
                    "h3" => "h3",
                    "h4" => "h4",
                    "h5" => "h5",
                    "h6" => "h6",
                    "p" => "p"
                )
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Title Color", 'dental-care'),
                "param_name" => "title_color",
                "description" => esc_html__("Choose a color for the title.", 'dental-care'),
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Title Font Size", 'dental-care'),
                "param_name" => "title_font_size",
                "description" => esc_html__("Enter title font size.", 'dental-care'),
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Title Font Weight", 'dental-care'),
                "param_name" => "title_font_weight",
                "description" => esc_html__("Enter title font weight.", 'dental-care'),
            ),
            array(
                "type" => "textarea",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Sub Title", 'dental-care'),
                "param_name" => "sub_title",
                "description" => esc_html__("Enter text for sub title.", 'dental-care')
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Sub Title Tag", 'dental-care'),
                "param_name" => "subtitle_tag",
                "description" => esc_html__("Choose title tag.", 'dental-care'),
                "value" => array(
                    "" => "",
                    "h1" => "h1",
                    "h2 " => "h2",
                    "h3" => "h3",
                    "h4" => "h4",
                    "h5" => "h5",
                    "h6" => "h6",
                    "p" => "p"
                )
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Sub Title Color", 'dental-care'),
                "param_name" => "sub_title_color",
                "description" => esc_html__("Choose a color for the sub title.", 'dental-care'),
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Sub Title Font Size", 'dental-care'),
                "param_name" => "sub_title_font_size",
                "description" => esc_html__("Enter sub title font size.", 'dental-care'),
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Sub Title Font Weight", 'dental-care'),
                "param_name" => "sub_title_font_weight",
                "description" => esc_html__("Enter sub title font weight.", 'dental-care'),
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Title Align", 'dental-care'),
                "param_name" => "title_align_select",
                "description" => esc_html__("Choose title alignment.", 'dental-care'),
                "value" => array(
                    "" => "",
                    "Left" => "align_left ",
                    "Center " => "align_center",
                    "Right " => "align_right",
                )
            ),
               array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Separator", 'dental-care'),
                "param_name" => "separator_en",
                "description" => esc_html__("Choose to enable separator.", 'dental-care'),
                "value" => array(
                    "" => "",
                    "On" => "on",
                    "Off" => "off",
                )
            ),
        )
    ));
}

function dental_care_heading_shortcode($atts, $content = NULL) {
    extract(shortcode_atts(array(
        'param' => '',
        'title' => '',
        'title_tag' => '',
        'title_color' => '',
        'title_font_size' => '',
        'title_font_weight' => '',
        'sub_title' => '',
        'subtitle_tag' => '',
        'sub_title_color' => '',
        'sub_title_font_size' => '',
        'sub_title_font_weight' => '',
        'title_align_select' => '',
        'separator_en' => ''
                    ), $atts));

    $string = '<div class="stronghold-heading">';

    if ($sub_title != ''):

        if($subtitle_tag == 'h1'){
        $string .= '<h1 class="heading-subtitle" style="';
        }elseif ($subtitle_tag == 'h2') {
            $string .= '<h2 class="heading-subtitle" style="';
        }elseif ($subtitle_tag == 'h3') {
            $string .= '<h3 class="heading-subtitle" style="';
        }elseif ($subtitle_tag == 'h5') {
            $string .= '<h5 class="heading-subtitle" style="';
        }elseif ($subtitle_tag == 'h6') {
            $string .= '<h6 class="heading-subtitle" style="';
        }elseif ($subtitle_tag == 'h4') {
            $string .= '<h4 class="heading-subtitle" style="';
        }elseif ($subtitle_tag == 'p') {
            $string .= '<p class="heading-subtitle" style="';
        }else{
            $string .= '<span class="heading-subtitle" style="display:block;';
        }


        if ($sub_title_color != ''):
            $string .= 'color:' . esc_attr($sub_title_color) . ';';
        endif;
        if ($sub_title_font_size != ''):
            $string .= ' font-size:' . esc_attr($sub_title_font_size) . 'px;';
        endif;
        if ($sub_title_font_weight != ''):
            $string .= ' font-weight:' . esc_attr($sub_title_font_weight) . ';';
        endif;
        if ($title_align_select == 'align_left') {
            $string .= ' text-align: left;';
        } else
        if ($title_align_select == 'align_center') {
            $string .= ' text-align: center;';
        } else
        if ($title_align_select == 'align_right') {
            $string .= ' text-align: right;';
        }

        $string .= '">' . esc_html($sub_title);

        if($subtitle_tag == 'h1'){
        $string .= '</h1>';
        }elseif ($subtitle_tag == 'h2') {
            $string .= '</h2>';
        }elseif ($subtitle_tag == 'h3') {
            $string .= '</h3>';
        }elseif ($subtitle_tag == 'h5') {
            $string .= '</h5>';
        }elseif ($subtitle_tag == 'h6') {
            $string .= '</h6>';
        }elseif ($subtitle_tag == 'h4') {
            $string .= '</h4>';
        }elseif ($subtitle_tag == 'p') {
            $string .= '</p>';
        }else{
            $string .= '</span>';
        }

    endif;

        $string .= '<div class="heading-title">';

        if($title_tag == 'h1'){
        $string .= '<h1 style="';
        }elseif ($title_tag == 'h2') {
            $string .= '<h2 style="';
        }elseif ($title_tag == 'h5') {
            $string .= '<h5 style="';
        }elseif ($title_tag == 'h6') {
            $string .= '<h6 style="';
        }elseif ($title_tag == 'h4') {
            $string .= '<h4 style="';
        }elseif ($title_tag == 'p') {
            $string .= '<p style="';
        }else{
            $string .= '<h3 style="';
        }

    if ($title_color != ''):
        $string .= 'color:' . esc_attr($title_color) . ';';
    endif;
    if ($title_font_size != ''):
        $string .= ' font-size:' . esc_attr($title_font_size) . 'px;';
    endif;
    if ($title_font_weight != ''):
        $string .= ' font-weight:' . esc_attr($title_font_weight) . ';';
    endif;
    if ($title_align_select == 'align_left') {
        $string .= ' text-align: left;';
    } else
    if ($title_align_select == 'align_center') {
        $string .= ' text-align: center;';
    } else
    if ($title_align_select == 'align_right') {
        $string .= ' text-align: right;';
    }

    $string .= '">' . esc_html($title);

    if($title_tag == 'h1'){
        $string .= '</h1>';
        }elseif ($title_tag == 'h2') {
            $string .= '</h2>';
        }elseif ($title_tag == 'h5') {
            $string .= '</h5>';
        }elseif ($title_tag == 'h6') {
            $string .= '</h6>';
        }elseif ($title_tag == 'h4') {
            $string .= '</h4>';
        }elseif ($title_tag == 'p') {
            $string .= '</p>';
        }else{
            $string .= '</h3>';
        }
$string .= '</div>';

if($separator_en == 'on'){
$string .= '<div class="heading-separator" style="';

if ($title_align_select == 'align_left') {
    $string .= ' margin: 0 auto 0 0;';
} else
if ($title_align_select == 'align_center') {
    $string .= ' margin: 0 auto;';
} else
if ($title_align_select == 'align_right') {
    $string .= ' margin: 0 0 0 auto;';
}

$string.= '">';
$string .= '<span> </span>';
$string .= '</div>';
}

    $string .= '</div>';
    return $string;
}
