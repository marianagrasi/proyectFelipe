<?php

add_action('vc_before_init', 'dental_care_icon_box_VC');

function dental_care_icon_box_VC() {
    vc_map(array(
        "name" => esc_html__("Icon Box", 'dental-care'),
        "base" => "dental_care_icon_box",
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
                "heading" => esc_html__("Icon Alignment", 'dental-care'),
                "param_name" => "icon_alignment",
                "description" => esc_html__("Choose icon alignment.", 'dental-care'),
                "value" => array("" => "", "Left" => "left", "Center" => "center", "Right" => "right"),
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Enable Flip Effect", 'dental-care'),
                "param_name" => "icon_flip_en",
                "description" => esc_html__("Choose to enable icon box flip effect.", 'dental-care'),
                "value" => array("" => "", "Yes" => "yes", "No" => "no"),
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Enable Hover Effect", 'dental-care'),
                "param_name" => "icon_hover_en",
                "description" => esc_html__("Choose to enable hover effect.", 'dental-care'),
                "value" => array("" => "", "Yes" => "yes", "No" => "no"),
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Enable Slider Overlay", 'dental-care'),
                "param_name" => "icon_slider_overlay",
                "description" => esc_html__("Choose to enable slider overlay.", 'dental-care'),
                "value" => array("" => "", "Yes" => "yes", "No" => "no"),
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Negative Margin", 'dental-care'),
                "param_name" => "icon_margin",
                "description" => esc_html__("Choose a negative margin value.", 'dental-care'),
                "dependency" => array("element" => "icon_slider_overlay", "value" => array("yes")),

            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Top/Bottom Padding", 'dental-care'),
                "param_name" => "icon_top_bottom_padding",
                "description" => esc_html__("Choose a top/bottom padding value", 'dental-care'),
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Left/Right Padding", 'dental-care'),
                "param_name" => "icon_left_right_padding",
                "description" => esc_html__("Choose a left/right padding value", 'dental-care'),
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Apply Link to", 'dental-care'),
                "param_name" => "icon_link_select",
                "description" => esc_html__("Choose where to apply link.", 'dental-care'),
                "value" => array("" => "", "Box" => "box", "Read More Button" => "read_button", "None" => "none"),
            ),
            array(
                "type" => "vc_link",
                "class" => "",
                "heading" => __("Link", "dental-care"),
                "param_name" => "icon_link",
                "value" => "",
                "description" => __("Choose a link for the icon box.", "dental-care"),
            ),
            array(
                "type" => "textarea",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Javascript onClick Action", 'dental-care'),
                "param_name" => "icon_onclick",
                "description" => esc_html__("Enter inline onclick javascript action", 'dental-care'),
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Title", 'dental-care'),
                "param_name" => "icon_title_front",
                "description" => esc_html__("Enter a title", 'dental-care'),
                "group" => "Front"
            ),
            array(
                "type" => "textarea",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Description", 'dental-care'),
                "param_name" => "icon_desc_front",
                "description" => esc_html__("Enter a description", 'dental-care'),
                "group" => "Front"
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Content Alignment", 'dental-care'),
                "param_name" => "content_alignment",
                "description" => esc_html__("Choose content alignment.", 'dental-care'),
                "value" => array("" => "", "Left" => "left", "Center" => "center", "Right" => "right"),
                "group" => "Front"
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Text Color", 'dental-care'),
                "param_name" => "icon_text_color_front",
                "description" => esc_html__("Choose a color for the text.", 'dental-care'),
                "group" => "Front"
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Background Color", 'dental-care'),
                "param_name" => "icon_bg_color_front",
                "description" => esc_html__("Choose a background color or combine it with an image as an overlay.", 'dental-care'),
                "group" => "Front"
            ),
            array(
                "type" => "attach_image",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Background Image", 'dental-care'),
                "param_name" => "icon_bg_img_front",
                "description" => esc_html__("Choose an image for the background.", 'dental-care'),
                "group" => "Front"
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Background Hover Color", 'dental-care'),
                "param_name" => "icon_bg_hover_color_front",
                "description" => esc_html__("Choose a background hover color.", 'dental-care'),
                "group" => "Front"
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Title", 'dental-care'),
                "param_name" => "icon_title_back",
                "description" => esc_html__("Enter a title", 'dental-care'),
                "group" => "Back"
            ),
            array(
                "type" => "textarea",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Description", 'dental-care'),
                "param_name" => "icon_desc_back",
                "description" => esc_html__("Enter a description", 'dental-care'),
                "group" => "Back"
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Text Color", 'dental-care'),
                "param_name" => "icon_text_color_back",
                "description" => esc_html__("Choose a color for the text.", 'dental-care'),
                "group" => "Back"
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Background Color", 'dental-care'),
                "param_name" => "icon_bg_color_back",
                "description" => esc_html__("Choose a background color or combine it with an image as an overlay.", 'dental-care'),
                "group" => "Back"
            ),
            array(
                "type" => "attach_image",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Background Image", 'dental-care'),
                "param_name" => "icon_bg_img_back",
                "description" => esc_html__("Choose an image for the background.", 'dental-care'),
                "group" => "Back"
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Button Text", 'dental-care'),
                "param_name" => "icon_btn_text",
                "description" => esc_html__("Enter button text.", 'dental-care'),
                "group" => "Button"
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Button Text Color", 'dental-care'),
                "param_name" => "icon_btn_text_color",
                "description" => esc_html__("Choose a color for the button text.", 'dental-care'),
                "group" => "Button"
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Button Background Color", 'dental-care'),
                "param_name" => "icon_btn_bg_color",
                "description" => esc_html__("Choose a background color for the button.", 'dental-care'),
                "group" => "Button"
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
        )
));
}

function dental_care_icon_box_shortcode($atts, $content = NULL) {
    global $post;
    extract(shortcode_atts(array(
        'param' => '',
        'icon_class' => '',
        'icon_font_size' => '',
        'icon_class' => '',
        'icon_class' => '',
        'icon_color' => '',
        'icon_bg_color' => '',
        'icon_flip_en' => '',
        'icon_hover_en' => '',
        'icon_slider_overlay'  => '',
        'icon_margin' => '',
        'icon_top_bottom_padding' => '',
        'icon_left_right_padding' => '',
        'icon_link_select' => '',
        'icon_link' => '',
        'icon_title_front' => '',
        'icon_desc_front' => '',
        'icon_text_color_front' => '',
        'icon_bg_color_front' => '',
        'icon_bg_img_front' => '',
        'icon_bg_hover_color_front' => '',
        'icon_title_back' => '',
        'icon_desc_back' => '',
        'icon_text_color_back' => '',
        'icon_bg_color_back' => '',
        'icon_bg_img_back' => '',
        'icon_btn_text_color' => '',
        'icon_btn_bg_color' => '',
        'icon_title_font_size' => '',
        'icon_desc_font_size' => '',
        'icon_onclick' => '',
        'icon_btn_text' => '',
        'icon_alignment' => '',
        'content_alignment' => ''

    ), $atts));

    $info_icon = '';
    $icon_position = '';
    $content_position = '';
    $icon_bg_img_front_src = '';
    $icon_bg_img_back_src = '';
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

    if($icon_btn_text == ''){
        $icon_btn_text = 'Read More';
    }

    if ($icon_bg_img_front != '') {
        $icon_bg_img_front_src = wp_get_attachment_url($icon_bg_img_front, 'full', false, false);
    }
    if ($icon_bg_img_back != '') {
        $icon_bg_img_back_src = wp_get_attachment_url($icon_bg_img_back, 'full', false, false);
    }

     if ($icon_class != '') {
        $info_icon = $icon_class;
    }



    $string = '<div class="';
    if ($icon_flip_en == 'no' || $icon_flip_en == ''):
        $string .= 'single-icon-box ';
    endif;

    if($icon_slider_overlay == 'yes'){
        $string .= ' icon-box-slider-overlay ';
    }

    $string .='stronghold-icon-box-wrapper" style="';
    if (($icon_flip_en == 'no' || $icon_flip_en == '') && $icon_link_select == 'box'):
        $string .= 'cursor: pointer;';
    endif;

    if($icon_slider_overlay == 'yes'){
        $string .= ' margin-top: -'.esc_attr($icon_margin).'px;';
    }

    $string .='"';

    if($icon_hover_en == 'yes'){
        $string .= 'data-hoveren="yes"';
    }else{
       $string .= 'data-hoveren="on"';
   }

   $string .= '>';

   if ($href['url'] != NULL && $icon_link_select == 'box'){
    $string .= '<a class="icon-boxlink-wrap" href="'.esc_attr($href['url']).'"';

    if ($icon_onclick != ''):
        $string .= ' onclick="'.esc_attr($icon_onclick).'"';
    endif;


    $string .= '>';
}


$string .= '<div class="stronghold-icon-box-front" style="';
if ($icon_flip_en == 'no' || $icon_flip_en == ''):
    $string .= 'transform: none;';
endif;
if ($icon_bg_color_front != ''):
    $string .= 'background:linear-gradient(
    ' . esc_attr($icon_bg_color_front) . ',
    ' . esc_attr($icon_bg_color_front) . '
) ';
if ($icon_bg_img_front_src != '') {
    $string .= ',url(' . esc_url($icon_bg_img_front_src) . ') no-repeat center center; background-size:cover;';
} else {
    $string .= ';';
}

endif;

if($icon_top_bottom_padding != ''){
  $string .= ' padding-top:'.esc_attr($icon_top_bottom_padding).'px;';
  $string .= ' padding-bottom:'.esc_attr($icon_top_bottom_padding).'px;';
}
if($icon_left_right_padding != ''){
  $string .= ' padding-left:'.esc_attr($icon_left_right_padding).'px;';
  $string .= ' padding-right:'.esc_attr($icon_left_right_padding).'px;';
}

$string .= '"';

if($icon_bg_color_front != ''):
    $string .= 'data-color="'.$icon_bg_color_front.'"';
endif;

if($icon_bg_hover_color_front != ''):
    $string .= 'data-hoverColor="'.$icon_bg_hover_color_front.'"';
endif;

if($icon_bg_img_front_src != ''):
    $string .= ' data-bgImg="'.$icon_bg_img_front_src.'"';
endif;

$string .= '>';

if($icon_bg_hover_color_front != ''){

    $string .= '<div class="iconbox-overlay" style="';

    if ($icon_bg_color_front != ''){
        $string .= 'background:linear-gradient(
        ' . esc_attr($icon_bg_hover_color_front) . ',
        ' . esc_attr($icon_bg_hover_color_front) . '
    ) ';
    if ($icon_bg_img_front_src != '') {
        $string .= ',url(' . esc_url($icon_bg_img_front_src) . ') no-repeat center center; background-size:cover;';
    } else {
        $string .= ';';
    }

}

$string .='"></div>';
}

if($info_icon != ''){
    $string .= '<div class="stronghold-info-icon" style="';

    if($icon_alignment != ''){
      $string .= ' text-align:'.esc_attr($icon_alignment).';';
    }

    $string .= '">';
    $string .= '<i class="' . esc_attr($info_icon) . '" style="font-size:' . esc_attr($icon_font_size) . 'px;';

    if($icon_color != ''):
        $string .= ' color:' . esc_attr($icon_color) . ';';
    endif;

    if($icon_bg_color != ''):
        $string .= ' background:' . esc_attr($icon_bg_color) . ';';
    endif;

    $string .= '"></i>';
    $string .= '</div>';
}

$string .= '<div class="stronghold-info-icon-content-front" style="';

if($content_alignment != ''){
  $string .= ' text-align:'.esc_attr($content_alignment).';';
}

$string .= '">';
$string .= '<div class="stronghold-info-icon-title">';
$string .= '<h3 style="';

if($icon_title_font_size != ''):
    $string .= 'font-size:' . esc_attr($icon_title_font_size) . 'px;';
endif;

if ($icon_text_color_front != ''):
    $string .= ' color:' . esc_attr($icon_text_color_front) . ';';
endif;

$string .= '">' . esc_html($icon_title_front) . ' </h3>';

$string .= '</div>';
$string .= '<div class="stronghold-info-icon-desc">';
$string .= '<div style="';

if($icon_desc_font_size != ''):
    $string .= 'font-size:' . esc_attr($icon_desc_font_size) . 'px;';
endif;

if ($icon_text_color_front != ''):
    $string .= ' color:' .esc_attr($icon_text_color_front) . ';';
endif;

$string .= '">' . wp_kses($icon_desc_front, $allowed_html) . ' </div>';
$string .= '</div>';
$string .= '</div>';

if($icon_link_select == 'read_button' &&  $href['url'] != NULL){


    $string .= '<div class="stronghold-info-icon-link"';

    if($icon_flip_en == 'yes'){
        $string .= 'style="visibility: hidden;"';
    }

    $string.= '>';

    $string .= '<a class="stronghold-info-icon-link-btn btn" href="' . esc_url($href['url']) . '" style="';

    if ($icon_btn_text_color != ''):
        $string .= ' color:' . esc_attr($icon_btn_text_color) . ';';
    endif;
    if ($icon_btn_bg_color != ''):
        $string .= ' background:' . esc_attr($icon_btn_bg_color) . ';';
    endif;

    $string .= '"';

    if ($icon_onclick != '' && $icon_link_select == 'read_button'):
        $string .= ' onclick="'.esc_attr($icon_onclick).'"';
    endif;


    $string .= '>'.esc_html($icon_btn_text).'</a>';

    $string .= '</div>';


    if ($href['url'] != NULL && $icon_link_select == 'read_button'){
        $string .= '</a>';
    }

}

$string .= '</div>';

 if ($href['url'] != NULL && $icon_link_select == 'box'){
    $string .= '</a>';
}


$string .= '<div class="stronghold-icon-box-back" style="';
if ($icon_flip_en == 'no' || $icon_flip_en == ''):
    $string .= 'display: none;';
endif;
if ($icon_bg_color_back != ''):
    $string .= 'background:linear-gradient(
    ' . esc_attr($icon_bg_color_back) . ',
    ' . esc_attr($icon_bg_color_back) . '
) ';
if ($icon_bg_img_back_src != '') {
    $string .= ',url(' . esc_url($icon_bg_img_back_src) . ') no-repeat center center; background-size:cover;';
} else {
    $string .= ';';
}

endif;
$string .= '">';

$string .= '<div class="stronghold-info-icon-content-back" style="';

if($content_alignment != ''){
  $string .= ' text-align:'.esc_attr($content_alignment).';';
}

$string .= '">';
$string .= '<div class="stronghold-info-icon-title">';

$string .= '<h3 style="';

if($icon_title_font_size != ''):
    $string .= 'font-size:' . esc_attr($icon_title_font_size) . 'px;';
endif;

if ($icon_text_color_back != ''):
    $string .= ' color:' . esc_attr($icon_text_color_back) . ';';
endif;

$string .= '">' . esc_html($icon_title_back) . ' </h3>';

$string .= '</div>';
$string .= '<div class="stronghold-info-icon-desc">';
$string .= '<div style="';

if($icon_desc_font_size != ''):
    $string .= 'font-size:' . esc_attr($icon_desc_font_size) . 'px;';
endif;


if ($icon_text_color_back != ''):
    $string .= ' color:' . esc_attr($icon_text_color_back) . ';';
endif;

$string .= '">' . wp_kses($icon_desc_back, $allowed_html) . ' </div>';
$string .= '</div>';

if($icon_link_select == 'read_button' && $icon_flip_en == 'yes' && $href['url'] != ''){
    $string .= '<div class="stronghold-info-icon-link">';

    $string .= '<a class="stronghold-info-icon-link-btn" href="' . esc_url($href['url']) . '" style="';

    if ($icon_btn_text_color != ''):
        $string .= ' color:' . esc_attr($icon_btn_text_color) . ';';
    endif;
    if ($icon_btn_bg_color != ''):
        $string .= ' background:' . esc_attr($icon_btn_bg_color) . ';';
    endif;

    $string .= '">'.esc_html__("Read More", "dental-care").'</a>';

    $string .= '</div>';
}

$string .= '</div>';

$string .= '</div>';

$string .= '</div>';

return $string;
}
