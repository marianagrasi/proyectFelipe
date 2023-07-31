<?php

add_action('vc_before_init', 'dental_care_custom_menu_VC');

function dental_care_custom_menu_VC() {
    vc_map(array(
        "name" => esc_html__("Custom Menu", 'dental-care'),
        "base" => "dental_care_custom_menu",
        "class" => "",
        "category" => esc_html__('Dental Care', 'dental-care'),
        "params" => array(
        
            array(
                "type" => "menu_select",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Select Menu", 'dental-care'),
                "param_name" => "menu_select",
                "description" => esc_html__("Choose a menu.", 'dental-care'),
            ),      

             array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Background Color", 'dental-care'),
                "param_name" => "menu_bg_color",
                "description" => esc_html__("Choose a background color or combine it with an image as an overlay.", 'dental-care'),
                "group" => "Design"
            ),
            array(
                "type" => "attach_image",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Background Image", 'dental-care'),
                "param_name" => "menu_bg_image",
                "description" => esc_html__("Choose an image for the background.", 'dental-care'),
                "group" => "Design"
            ),           
            
             array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Link Color", 'dental-care'),
                "param_name" => "menu_link_color",
                "description" => esc_html__("Choose a color for the links.", 'dental-care'),
                "group" => "Typography"
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Link Font Size", 'dental-care'),
                "param_name" => "menu_link_font_size",
                "description" => esc_html__("Enter link font size.", 'dental-care'),
                "group" => "Typography"
            ),

        )
    ));
}

function dental_care_custom_menu_shortcode($atts, $content = NULL) {
    global $post;
    extract(shortcode_atts(array(
        'param' => '',
        'menu_select' => '',
        'menu_bg_color' => '',
        'menu_bg_image' => '',
        'menu_link_color' => '',
        'menu_link_font_size' => '',
                
                    ), $atts));

    $menu_bg_image_src = '';
    
    $menu = $menu_select;
    $menuitems = wp_get_nav_menu_items($menu);
    
    if ($menu_bg_image != '') {
        $menu_bg_image_src = wp_get_attachment_url($menu_bg_image, 'full', false, false);
    }


    $string = '<div class="dental-care-custom-menu-wrap">';
    $string .= '<ul class="dental-care-custom-menu" style="';
    
    if ($menu_bg_color != ''){
        $string .= 'background:linear-gradient(
      ' . esc_attr($menu_bg_color) . ', 
      ' . esc_attr($menu_bg_color) . '
    ) ';
        if ($menu_bg_image_src != '') {
            $string .= ',url(' . esc_url($menu_bg_image_src) . ') no-repeat center center; background-size:cover;';
        } else {
            $string .= ';';
        }

    }
    
    $string .= '">';
    

    if($menuitems != NULL){
    foreach ($menuitems as $item) {
        $string .= '<li class="custom-menu-item"';
               
        $string .= '><a href="' . esc_url($item->url) . '" style="';
        
         if($menu_link_font_size != ''){
        $string .= 'font-size:' . esc_attr($menu_link_font_size) . 'px;';
        }

        if ($menu_link_color != ''){
        $string .= ' color:' . esc_attr($menu_link_color) . ';';
        }
        
        $string .= '">' . esc_html($item->title) . '</a></li>';
    }
    }

    $string .= '</ul>';
    $string .= '</div>';

    return $string;
}
