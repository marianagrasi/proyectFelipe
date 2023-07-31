<?php

add_action('vc_before_init', 'dental_care_number_block_VC');

function dental_care_number_block_VC() {
    vc_map(array(
        "name" => esc_html__("Number Block", 'dental-care'),
        "base" => "dental_care_number_block",
        "class" => "",
        "category" => esc_html__('Dental Care', 'dental-care'),
        "params" => array(
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Number", 'dental-care'),
                "param_name" => "number_block_number",
                "description" => esc_html__("Enter number.", 'dental-care'),
            ),
             array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Title", 'dental-care'),
                "param_name" => "number_block_title",
                "description" => esc_html__("Enter a title", 'dental-care'),
            ),
            array(
                "type" => "textarea",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Description", 'dental-care'),
                "param_name" => "number_block_desc",
                "description" => esc_html__("Enter a description", 'dental-care'),
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Icon Box Number Color", 'dental-care'),
                "param_name" => "number_block_number_color",
                "description" => esc_html__("Choose number color", 'dental-care'),
                "group" => "Design"
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Icon Box Number Background Color", 'dental-care'),
                "param_name" => "number_block_number_bgcolor",
                "description" => esc_html__("Choose number background color", 'dental-care'),
                "group" => "Design"
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Title Font Size", 'dental-care'),
                "param_name" => "number_block_title_font_size",
                "description" => esc_html__("Enter title font size.", 'dental-care'),
                "group" => "Typography"
            ),
               array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Title Color", 'dental-care'),
                "param_name" => "number_block_title_color",
                "description" => esc_html__("Choose a color for the title.", 'dental-care'),
                "group" => "Typography"
            ),
           array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Text Font Size", 'dental-care'),
                "param_name" => "number_block_text_font_size",
                "description" => esc_html__("Enter text font size.", 'dental-care'),
                "group" => "Typography"
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Text Color", 'dental-care'),
                "param_name" => "number_block_text_color",
                "description" => esc_html__("Choose a color for the text.", 'dental-care'),
                "group" => "Typography"
            ),
        )
    ));
}

function dental_care_number_block_shortcode($atts, $content = NULL) {
    global $post;
    extract(shortcode_atts(array(
        'param' => '',
        'number_block_number' => '',
        'number_block_title' => '',
        'number_block_desc' => '',
        'number_block_number_color' => '',
        'number_block_number_bgcolor' => '',
        'number_block_title_font_size' => '',
        'number_block_title_color' => '',
        'number_block_text_font_size' => '',
        'number_block_text_color' => '',

                    ), $atts));


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



        $string = '<div class="stronghold-number-block" style="';

        $string .= '">';


            $string .= '<div class="number-block-top">';

            if ($number_block_number != '') {

                $string .= '<div class="number-icon" style="';


                if ($number_block_number_color != '') {
                    $string .= ' color:' . esc_attr($number_block_number_color) . ';';
                }

                if ($number_block_number_bgcolor != '') {
                    $string .= ' background:' . esc_attr($number_block_number_bgcolor) . ';';
                }

                $string .= '">';
                $string .= esc_html($number_block_number);
                $string .= '</div>';
            }

            $string .= '<div class="number-block-title">';

            $string .= '<h3 style="';

            if ($number_block_title_font_size != ''){
                $string .= 'font-size:' . esc_attr($number_block_title_font_size) . 'px;';
            }

               if ($number_block_title_color != '') {
                    $string .= ' color:' . esc_attr($number_block_title_color) . ';';
                }

            $string .= '">' . esc_html($number_block_title) . ' </h3>';

            $string .= '</div>';

            $string .= '</div>';

            $string .= '<div class="number-block-desc">';
            $string .= '<div style="';

            if ($number_block_text_font_size != ''){
                $string .= 'font-size:' . esc_attr($number_block_text_font_size) . 'px;';
            }

            if ($number_block_text_color != ''){
                $string .= ' color:' . esc_attr($number_block_text_color) . ';';
            }

            $string .= '">' . wp_kses($number_block_desc, $allowed_html) . ' </div>';
            $string .= '</div>';

            $string .= '</div>';

    return $string;
}
