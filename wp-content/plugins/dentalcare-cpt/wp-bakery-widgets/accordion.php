<?php

add_action('vc_before_init', 'dental_care_accordion_VC');

function dental_care_accordion_VC() {
    vc_map(array(
        "name" => esc_html__("Accordion", 'dental-care'),
        "base" => "dental_care_accordion",
        "class" => "",
        "category" => esc_html__('Dental Care', 'dental-care'),
        'admin_label' => false,
        "params" => array(
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
                'type' => 'param_group',
                'heading' => esc_html__('Accordion Items', 'dental-care'),
                'param_name' => 'accordion_items',
                'value' => array(
                    'value' => urlencode(json_encode(array(
                    ))),
                ),
                'params' => array(
                  
              array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Title", 'dental-care'),
                "param_name" => "item_title",
                "description" => esc_html__("Enter a title", 'dental-care'),
                "admin_label" => true,
            ),
            array(
                "type" => "textarea",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Description", 'dental-care'),
                "param_name" => "item_desc",
                "description" => esc_html__("Enter a description", 'dental-care'),
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Section ID", 'dental-care'),
                "param_name" => "item_id",
                "description" => esc_html__("Enter a unique id for this item.", 'dental-care'),
            ),
                )
            ),
          array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Icon Font Size", 'dental-care'),
                "param_name" => "icon_font_size",
                "description" => esc_html__("Enter icon font size.", 'dental-care'),
              "group" => "Design"
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Icon Color", 'dental-care'),
                "param_name" => "icon_color",
                "description" => esc_html__("Choose icon color", 'dental-care'),
                "group" => "Design"
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Accordion Background Color", 'dental-care'),
                "param_name" => "accordion_full_bgcolor",
                "description" => esc_html__("Choose background color of accordion.", 'dental-care'),
                "group" => "Design"
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Accordion Item Background Color", 'dental-care'),
                "param_name" => "accordion_bgcolor",
                "description" => esc_html__("Choose background color of accordion item.", 'dental-care'),
                "group" => "Design"
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Accordion Title Text Color", 'dental-care'),
                "param_name" => "accordion_titlecolor",
                "description" => esc_html__("Choose accordion title text color.", 'dental-care'),
                "group" => "Design"
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Accordion Description Text Color", 'dental-care'),
                "param_name" => "accordion_desccolor",
                "description" => esc_html__("Choose accordion text color.", 'dental-care'),
                "group" => "Design"
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Enable Shadow", 'dental-care'),
                "param_name" => "accordion_box_shadow_en",
                "description" => esc_html__("Choose to enable/disable box shadow", 'dental-care'),
                "value" => array("" => "", "On" => "on", "Off" => "off"),
                "group" => "Design"
            ),


        )
    ));
}

function dental_care_accordion_shortcode($atts, $content) {
    global $post;
    extract(shortcode_atts(array(
        'param' => '', 
        'icon_en' => '',
        'icon_select' => '',
        'icon_font_size' => '',
        'icon_color' => '',
        'accordion_bgcolor' => '',
        'accordion_full_bgcolor' => '',
        'accordion_box_shadow_en' => '',
        'accordion_titlecolor' => '',
        'accordion_desccolor' => '',
                    ), $atts));

    $accordion_items = (array) vc_param_group_parse_atts($atts['accordion_items']);

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

    $string = '<div class="stronghold-accordion-wrapper" style="';

      if ($accordion_full_bgcolor != '') {
        $string .= 'background: ' . esc_attr($accordion_full_bgcolor) . ';';
        $string .= 'padding: 30px;';
    }

    $string .= '">';

    foreach ($accordion_items as $item) {
        $icon_select_set = '';
        $item_title_set = '';
        $item_desc_set = '';
        $item_id_set = '';

        if (isset($icon_select)) {
            $icon_select_set = true;
        } else {
            $icon_select_set = false;
        }

        if (isset($item['item_title'])) {
            $item_title_set = true;
        } else {
            $item_title_set = false;
        }

        if (isset($item['item_desc'])) {
            $item_desc_set = true;
        } else {
            $item_desc_set = false;
        }

        if (isset($item['item_id'])) {
            $item_id_set = true;
        } else {
            $item_id_set = false;
        }

    $string .= '<div class="accordion-item" style="';

    if ($accordion_bgcolor != '') {
        $string .= 'background: ' . esc_attr($accordion_bgcolor) . ';';
    }

    if ($accordion_box_shadow_en == "on") {
        $string .= ' -webkit-box-shadow: 0 0 10px rgba(0,0,0,0.08);';
        $string .= ' box-shadow: 0 0 10px rgba(0,0,0,0.08);';
    }

    $string .= '">';

    if($item_id_set != false){
    $string .= '<a class="accordion-item-title-area" href="#' . esc_attr($item['item_id']) . '" data-ll="collapsed" style="';

    if ($accordion_titlecolor != '') {
        $string .= 'color: ' . esc_attr($accordion_titlecolor) . ';';
    }

    $string .= '">';

    if($icon_select_set != false){
        $string .= '<i class="accordion-icon ' . esc_attr($icon_select) . '" style="';

        if($icon_font_size != ''){
        $string .= 'font-size:' . esc_attr($icon_font_size) . 'px;';
        }

        if ($icon_color != ''){
            $string .= ' color:' . esc_attr($icon_color) . ';';
        }

        $string .= '"> </i>';
    }

 if($item_title_set != false){
     $string .= '<h6 class="accordion-item-title">';
    $string .= '' . esc_html($item['item_title']);
    $string .= '</h6>';
    }

    $string .= '</a>';
    }

    if($item_id_set != false){
    $string .= '<div id="' . esc_attr($item['item_id']) . '" class="accordion-item-content" style="';

    if ($accordion_bgcolor != '') {
        $string .= 'background: ' . esc_attr($accordion_bgcolor) . ';';
    }

    if ($accordion_desccolor != '') {
        $string .= 'color: ' . esc_attr($accordion_desccolor) . ';';
    }

    $string .= '">';

     if($item_desc_set != false){
    $string .= '' . wp_kses($item['item_desc'], $allowed_html);
     }

    $string .= '</div>';
    }

    $string .= '</div>';

}
    $string .= '</div>';

    return $string;
}
