<?php

add_action('vc_before_init', 'dental_care_feature_box_VC');

function dental_care_feature_box_VC() {
    vc_map(array(
        "name" => esc_html__("Feature Box", 'dental-care'),
        "base" => "dental_care_feature_box",
        "class" => "",
        "category" => esc_html__('Dental Care', 'dental-care'),
        "params" => array(
            array(
                "type" => "attach_image",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Feature Box Image", 'dental-care'),
                "param_name" => "feature_box_img",
                "description" => esc_html__("Choose an image.", 'dental-care'),
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Feature Box Design", 'dental-care'),
                "param_name" => "feature_box_design",
                "description" => esc_html__("Choose a feature design.", 'dental-care'),
                "value" => array(
                    "" => "",
                    "Design 1" => "design_one",
                )
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Use Icon", 'dental-care'),
                "param_name" => "icon_en",
                "description" => esc_html__("Choose if to use an icon.", 'dental-care'),
                "value" => array(
                    "" => "",
                    "Yes" => "yes",
                    "No" => "no",
                )
            ),
            array(
                "type" => "icon",
                "holder" => "div",
                "class" => "",
                "param_name" => "icon_select",
                "description" => esc_html__("Choose an icon.", 'dental-care'),
                "dependency" => array("element" => "icon_en", "value" => array("yes")),
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Icon Font Size", 'dental-care'),
                "param_name" => "icon_font_size",
                "description" => esc_html__("Enter icon font size.", 'dental-care'),
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Icon Color", 'dental-care'),
                "param_name" => "icon_color",
                "description" => esc_html__("Choose icon color", 'dental-care'),
            ),
             array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Icon Background Color", 'dental-care'),
                "param_name" => "feature_box_icon_bg_color",
                "description" => esc_html__("Choose an icon background color.", 'dental-care'),
                "group" => "Design",
                "dependency" => array("element" => "feature_box_design", "value" => array("design_one"))
            ),
            array(
                "type" => "vc_link",
                "class" => "",
                "heading" => esc_html__("Link", "dental-care"),
                "param_name" => "icon_link",
                "value" => "",
                "description" => esc_html__("Choose a link.", "dental-care"),
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Title", 'dental-care'),
                "param_name" => "feature_title",
                "description" => esc_html__("Enter a title", 'dental-care'),
                "group" => "Content"
            ),
            array(
                "type" => "textarea",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Description", 'dental-care'),
                "param_name" => "feature_desc",
                "description" => esc_html__("Enter a description", 'dental-care'),
                "group" => "Content"
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Background Color", 'dental-care'),
                "param_name" => "feature_box_background_color",
                "description" => esc_html__("Choose a background color.", 'dental-care'),
                "group" => "Design",
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Border Radius", 'dental-care'),
                "param_name" => "feature_box_border_radius",
                "description" => esc_html__("Choose a border radius.", 'dental-care'),
                "group" => "Design",
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Box Shadow", 'dental-care'),
                "param_name" => "feature_box_shadow",
                "description" => esc_html__("Choose to enable/disable box shadow.", 'dental-care'),
               "value" => array("" => "", "On" => "on", "Off" => "off"),
                "group" => "Design",
            ),
             array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Enable Translate on Hover", 'dental-care'),
                "param_name" => "feature_box_translate_en",
                "description" => esc_html__("Choose to enable/disable translate on hover.", 'dental-care'),
                "value" => array("" => "", "On" => "on", "Off" => "off"),
                "group" => "Design"
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Title Font Size", 'dental-care'),
                "param_name" => "title_font_size",
                "description" => esc_html__("Enter title font size.", 'dental-care'),
                "group" => "Typography"
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Title Color", 'dental-care'),
                "param_name" => "title_color",
                "description" => esc_html__("Choose a color for the title.", 'dental-care'),
                "group" => "Typography"
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Description Font Size", 'dental-care'),
                "param_name" => "desc_font_size",
                "description" => esc_html__("Enter description font size.", 'dental-care'),
                "group" => "Typography"
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Description Color", 'dental-care'),
                "param_name" => "desc_color",
                "description" => esc_html__("Choose a color for the description.", 'dental-care'),
                "group" => "Typography"
            ),
               array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Button Color", 'dental-care'),
                "param_name" => "btn_color",
                "description" => esc_html__("Choose a color for the button.", 'dental-care'),
                "group" => "Typography",
                "dependency" => array("element" => "feature_box_design", "value" => array("design_one")),
            ),
        )
    ));
}

function dental_care_feature_box_shortcode($atts, $content = NULL) {
    extract(shortcode_atts(array(
        'param' => '',
        'feature_box_img' => '',
        'feature_box_design' => '',
        'icon_select' => '',
        'icon_font_size' => '',
        'icon_color' => '',
        'icon_link' => '',
        'feature_title' => '',
        'feature_desc' => '',
        'feature_box_background_color' => '',
        'feature_box_border_radius' => '',
        'feature_box_shadow' => '',
        'feature_box_translate_en' => '',
        'feature_box_icon_bg_color' => '',
        'title_font_size' => '',
        'title_color' => '',
        'desc_font_size' => '',
        'desc_color' => '',
        'btn_color' => '',
                    ), $atts));

    $href['url'] = '';
    $href['title'] = '';
    $feature_box_img_src = '';

    $feature_box_img_src = wp_get_attachment_url($feature_box_img, 'full', false, false);

    if ($icon_link != '') {
        $href = vc_build_link($icon_link);
    }

    
    $string = '<div class="stronghold-feature-box-wrapper ';
       
        if($feature_box_translate_en == 'on'){
        $string .= ' feature-box-translate ';
    }

    
    $string .= '" style="';
    
    if ($feature_box_design == 'design_one') {
        $string .= ' overflow: initial;';
    }
        
        if ($feature_box_border_radius != "") {
                    $string .= ' border-radius:' . esc_attr($feature_box_border_radius) . 'px; overflow: hidden;';
                }
               
    
    $string .= '">';
    
    if ($feature_box_design == 'design_one' || $feature_box_design == '') {
        
    $string .= ' <div class="feature-box-design-one" ';
    

    $string .= '>';
    
    $string .= ' <div class="icon-wrapper" style="';
    
    if($feature_box_icon_bg_color != ''){
        $string .= ' background:' . esc_attr($feature_box_icon_bg_color) . ';';
    }
    
    $string .= '"><i class=" ';
    
    if($icon_select != ''){
    $string .= esc_attr($icon_select);
    }else{
        $string .= ' icon-house';
    }
    
    $string .= '" style="';
    
        if ($icon_font_size != '') {
        $string .= 'font-size:' . esc_attr($icon_font_size) . 'px;';
         }

    if ($icon_color != ''){
        $string .= ' color:' . esc_attr($icon_color) . ';';
    }

    $string .= '"></i></div>';
    
   if($feature_box_img_src != ''){
    $string .= '<div class="feature-box-img">'; 
    
    if ($href['url'] != '') {
    $string .= '<a href="' . esc_url($href['url']) . '">';
    }


    $string .= '<img src="' . esc_html($feature_box_img_src) . '" alt="Feature Image">';
    
    if ($href['url'] != '') {
    $string .= '</a>';
    }
    
    $string .= '</div>';
    }
    
    $string .= '<div class="feature-box-info-wrapper" style="';
    
    if ($feature_box_background_color != ''){
          $string .= ' background:' . esc_attr($feature_box_background_color) . ';';
    }
    
    if ($feature_box_shadow == "on") {
          $string .= ' box-shadow: 0px 8px 11px 4px rgba(158, 158, 158, 0.1); -webkit-box-shadow: 0px 8px 11px 4px rgba(158, 158, 158, 0.1);';
     }
    
    
    $string .= '">';
    
            $string .= '<div class="feature-box-title">';
        if ($href['url'] == '') {
            $string .= '<h5 style="';
            if ($title_font_size != ''):
                $string .= 'font-size:' . esc_attr($title_font_size) . 'px;';
            endif;

            if ($title_color != ''):
                $string .= 'color:' . esc_attr($title_color) . ';';
            endif;
            $string .= '">';

            $string .= esc_html($feature_title) . '</h5>';
        } else {
            $string .= '<a href="' . esc_url($href['url']) . '"><h5 style="';
            if ($title_font_size != ''):
                $string .= 'font-size:' . esc_attr($title_font_size) . 'px;';
            endif;

            if ($title_color != ''):
                $string .= ' color:' . esc_attr($title_color) . ';';
            endif;
            $string .= '">';

            $string .= esc_html($feature_title) . '</h5></a>';
        }
        $string .= '</div>';

        $string .= '<div class="feature-box-desc" style="';

        if ($desc_font_size != ''):
            $string .= ' font-size:' . esc_attr($desc_font_size) . 'px;';
        endif;

        if ($desc_color != ''):
            $string .= ' color:' . esc_attr($desc_color) . ';';
        endif;
        
        $string .= '">';

        $string .= esc_html($feature_desc);
        
        $string .= '</div>';
       
        $string .= '</div>';
    
       $string .= '</div>';
    }

    $string .= '</div>';

    return $string;

}
