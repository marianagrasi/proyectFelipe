<?php

add_action('vc_before_init', 'dental_care_partners_VC');

function dental_care_partners_VC() {
    vc_map(array(
        "name" => esc_html__("Partners", 'dental-care'),
        "base" => "dental_care_partners",
        "class" => "",
        "show_settings_on_create" => true,
        "category" => esc_html__('Dental Care', 'dental-care'),
        "params" => array(
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Partners Display Type", 'dental-care'),
                "param_name" => "partners_display_type",
                "description" => esc_html__("Choose partners display type.", 'dental-care'),
                "value" => array(
                    "" => "",
                    "Image Carousel" => "img_carousel",
                    "Image Grid" => "img_grid",
                )
            ),
             array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Image Grid Columns", 'dental-care'),
                "param_name" => "image_grid",
                "description" => esc_html__("Choose the number of columns in grid", 'dental-care'),
                "dependency" => array("element" => "partners_display_type", "value" => array("img_grid")),
                "value" => array(
                    "" => "",
                    "2 Column" => "two_col",
                    "3 Column" => "three_col",
                    "4 Column" => "four_col",
                    "6 Column" => "six_col",
                )
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Carousel Speed", 'dental-care'),
                "param_name" => "carousel_speed",
                "description" => esc_html__("Enter the number for the carousel speed. (Default: 5000)", 'dental-care'),
                "dependency" => array("element" => "partners_display_type", "value" => array("img_carousel")),
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Number of carousel items", 'dental-care'),
                "param_name" => "carousel_items",
                "description" => esc_html__("Enter the number of partner columns to display in carousel.", 'dental-care'),
                "dependency" => array("element" => "partners_display_type", "value" => array("img_carousel")),
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Enable Partner Image Border", 'dental-care'),
                "param_name" => "partner_border_en",
                "description" => esc_html__("Enable border on each partner image", 'dental-care'),
                "value" => array(
                    "" => "",
                    "On" => "on",
                    "Off" => "off",
                )
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Border Color", 'dental-care'),
                "param_name" => "partner_border_color",
                "description" => esc_html__("Choose a border color.", 'dental-care'),
                "dependency" => array("element" => "partner_border_en", "value" => array("on")),
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Border Width", 'dental-care'),
                "param_name" => "partner_border_width",
                "description" => esc_html__("Choose a border width.", 'dental-care'),
                "dependency" => array("element" => "partner_border_en", "value" => array("on")),
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Border Style", 'dental-care'),
                "param_name" => "partner_border_style",
                "description" => esc_html__("Choose a border style.", 'dental-care'),
                "value" => array("" => "", "Solid" => "solid", "Dotted" => "dotted", "Dashed" => "dashed", "Double" => "double", "None" => "none"),
                "dependency" => array("element" => "partner_border_en", "value" => array("on")),
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Border Radius", 'dental-care'),
                "param_name" => "partner_border_radius",
                "description" => esc_html__("Choose a border radius.", 'dental-care'),
                "dependency" => array("element" => "partner_border_en", "value" => array("on")),
            ),
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Parners Info Set', 'dental-care'),
                'param_name' => 'partners_info',
                'value' => array(
                    'value' => urlencode(json_encode(array(
                    ))),
                ),
                'params' => array(
                    array(
                        "type" => "attach_image",
                        "holder" => "div",
                        "class" => "",
                        "heading" => esc_html__("Partner Image", 'dental-care'),
                        "param_name" => "partner_image",
                        'admin_label' => true,
                        "description" => esc_html__("Choose Partner Image", 'dental-care')
                    ),
                    array(
                        "type" => "vc_link",
                        "class" => "",
                        "heading" => esc_html__("Partner Link", "dental-care"),
                        "param_name" => "partner_link",
                        "value" => "",
                        "description" => esc_html__("Choose a link for the partner.", "dental-care"),
                    ),
                )
            ),

        )
            )
    );
}

function dental_care_partners_shortcode($atts, $content = NULL) {

    extract(shortcode_atts(array(
        'param' => '',
        'partners_display_type' => '',
        'partner_border_en' => '',
        'partner_border_color' => '',
        'partner_border_width' => '',
        'partner_border_style' => '',
        'partner_border_radius' => '',
        'carousel_speed' => '',
        'carousel_items' => '',
        'image_grid' => '',
                    ), $atts));


    if($partners_display_type != ''){
    $partners_info = (array) vc_param_group_parse_atts($atts['partners_info']);
    }

    $postcount = 0;
    $href['url'] = '';
    $partner_img_src = '';

    if ($partners_display_type == 'img_carousel') {
        foreach ($partners_info as $item) {
            if ($item['partner_image'] != '') {
                $postcount++;
            }
        }
    }

    $string = '<div class="dental-care-partners-widget"> ';

    if ($partners_display_type == "img_carousel") {

        $string .= '<div class="partners-carousel" ';
        $string .= 'data-speed="' . esc_attr($carousel_speed) . '"';
        $string .= 'data-items="' . esc_attr($carousel_items) . '"';
        $string .= 'data-count="' . esc_attr($postcount) . '"';
        $string .= '>';

        foreach ($partners_info as $item) {

            if ($item['partner_image'] != '') {
                $partner_img_src = wp_get_attachment_url($item['partner_image'], 'full', false, false);
                $partner_link_set = '';
                $href['url'] = '';

                if (isset($item['partner_link'])) {
                    $partner_link_set = true;
                } else {
                    $partner_link_set = false;
                }


                if ($partner_link_set == true) {
                    $href = vc_build_link($item['partner_link']);
                }

                $string .= '<div class="partner-item" style="';

                $string .= '">';

                if ($href['url'] != '') {

                    $string .= '<a class="partner-link" href="' . esc_html($href['url']) . '"><img class="partner-img" src="' . esc_html($partner_img_src) . '" alt="Partner Image" style="';

                    if ($partner_border_color != "") {
                        $string .= ' border-color:' . esc_attr($partner_border_color) . ';';
                        $string .= ' padding: 20px;';
                    }

                    if ($partner_border_radius != "") {
                        $string .= ' border-radius:' . esc_attr($partner_border_radius) . 'px;';
                    }

                    if ($partner_border_style != "") {
                        $string .= ' border-style:' . esc_attr($partner_border_style) . ';';
                    }

                    if ($partner_border_width != "") {
                        $string .= ' border-width:' . esc_attr($partner_border_width) . 'px;';
                    }

                    $string .= '"></a>';
                } else {
                    $string .= '<img class="partner-img" src="' . esc_html($partner_img_src) . '" alt="Partner Image" style="';

                    if ($partner_border_color != "") {
                        $string .= ' border-color:' . esc_attr($partner_border_color) . ';';
                        $string .= ' padding: 20px;';
                    }

                    if ($partner_border_radius != "") {
                        $string .= ' border-radius:' . esc_attr($partner_border_radius) . 'px;';
                    }

                    if ($partner_border_style != "") {
                        $string .= ' border-style:' . esc_attr($partner_border_style) . ';';
                    }

                    if ($partner_border_width != "") {
                        $string .= ' border-width:' . esc_attr($partner_border_width) . 'px;';
                    }

                    $string .= '">';
                }
                $string .= '</div>';
            }
        }
        $string .= '</div>';
   } elseif ($partners_display_type == "img_grid") {

        if ($image_grid == 'two_col') {

            $colset = 'col-md-6';
            $partner_count = 0;


            $string .= '<div class="partners-grid-two-col">';

            foreach ($partners_info as $item) {

                if ($partner_count == 0) {
                    $string .= '<div class="row">';
                }

                if ($item['partner_image'] != '') {
                    $partner_img_src = wp_get_attachment_url($item['partner_image'], 'full', false, false);
                    $partner_link_set = '';
                    $href['url'] = '';

                    if (isset($item['partner_link'])) {
                        $partner_link_set = true;
                    } else {
                        $partner_link_set = false;
                    }

                    if ($partner_link_set == true) {
                        $href = vc_build_link($item['partner_link']);
                    }

                    $string .= '<div class="partner-item ' . esc_attr($colset) . '" style="';

                    $string .= '">';

                    if ($href['url'] != '') {

                        $string .= '<a class="partner-link" href="' . esc_html($href['url']) . '"><img class="partner-img" src="' . esc_html($partner_img_src) . '" alt="Partner Image" style="';

                        if ($partner_border_color != "") {
                            $string .= ' border-color:' . esc_attr($partner_border_color) . ';';
                            $string .= ' padding: 20px;';
                        }

                        if ($partner_border_radius != "") {
                            $string .= ' border-radius:' . esc_attr($partner_border_radius) . 'px;';
                        }

                        if ($partner_border_style != "") {
                            $string .= ' border-style:' . esc_attr($partner_border_style) . ';';
                        }

                        if ($partner_border_width != "") {
                            $string .= ' border-width:' . esc_attr($partner_border_width) . 'px;';
                        }

                        $string .= '"></a>';
                    } else {
                        $string .= '<img class="partner-img" src="' . esc_html($partner_img_src) . '" alt="Partner Image" style="';

                        if ($partner_border_color != "") {
                            $string .= ' border-color:' . esc_attr($partner_border_color) . ';';
                            $string .= ' padding: 20px;';
                        }

                        if ($partner_border_radius != "") {
                            $string .= ' border-radius:' . esc_attr($partner_border_radius) . 'px;';
                        }

                        if ($partner_border_style != "") {
                            $string .= ' border-style:' . esc_attr($partner_border_style) . ';';
                        }

                        if ($partner_border_width != "") {
                            $string .= ' border-width:' . esc_attr($partner_border_width) . 'px;';
                        }

                        $string .= '">';
                    }
                    $string .= '</div>';
                }
                $partner_count++;
                if ($partner_count == 2) {
                    $partner_count = 0;
                    $string .= '</div>';
                }
            }
            if ($partner_count < 2) {
                $string .= '</div>';
            }

            $string .= '</div>';
        } else if ($image_grid == 'three_col') {

            $colset = 'col-md-4';
            $partner_count = 0;


            $string .= '<div class="partners-grid-three-col">';


            foreach ($partners_info as $item) {

                if ($partner_count == 0) {
                    $string .= '<div class="row">';
                }

                if ($item['partner_image'] != '') {
                    $partner_img_src = wp_get_attachment_url($item['partner_image'], 'full', false, false);
                    $partner_link_set = '';
                    $href['url'] = '';

                    if (isset($item['partner_link'])) {
                        $partner_link_set = true;
                    } else {
                        $partner_link_set = false;
                    }

                    if ($partner_link_set == true) {
                        $href = vc_build_link($item['partner_link']);
                    }

                    $string .= '<div class="partner-item ' . esc_attr($colset) . '" style="';

                    $string .= '">';

                    if ($href['url'] != '') {

                        $string .= '<a class="partner-link" href="' . esc_html($href['url']) . '"><img class="partner-img" src="' . esc_html($partner_img_src) . '" alt="Partner Image" style="';

                        if ($partner_border_color != "") {
                            $string .= ' border-color:' . esc_attr($partner_border_color) . ';';
                            $string .= ' padding: 20px;';
                        }

                        if ($partner_border_radius != "") {
                            $string .= ' border-radius:' . esc_attr($partner_border_radius) . 'px;';
                        }

                        if ($partner_border_style != "") {
                            $string .= ' border-style:' . esc_attr($partner_border_style) . ';';
                        }

                        if ($partner_border_width != "") {
                            $string .= ' border-width:' . esc_attr($partner_border_width) . 'px;';
                        }

                        $string .= '"></a>';
                    } else {
                        $string .= '<img class="partner-img" src="' . esc_html($partner_img_src) . '" alt="Partner Image" style="';

                        if ($partner_border_color != "") {
                            $string .= ' border-color:' . esc_attr($partner_border_color) . ';';
                            $string .= ' padding: 20px;';
                        }

                        if ($partner_border_radius != "") {
                            $string .= ' border-radius:' . esc_attr($partner_border_radius) . 'px;';
                        }

                        if ($partner_border_style != "") {
                            $string .= ' border-style:' . esc_attr($partner_border_style) . ';';
                        }

                        if ($partner_border_width != "") {
                            $string .= ' border-width:' . esc_attr($partner_border_width) . 'px;';
                        }

                        $string .= '">';
                    }
                    $string .= '</div>';
                }
                $partner_count++;
                if ($partner_count == 3) {
                    $partner_count = 0;
                    $string .= '</div>';
                }
            }
            if ($partner_count < 3) {
                $string .= '</div>';
            }

            $string .= '</div>';
        } else if ($image_grid == 'four_col') {

            $colset = 'col-md-3';
            $partner_count = 0;


            $string .= '<div class="partners-grid-four-col">';


            foreach ($partners_info as $item) {

                if ($partner_count == 0) {
                    $string .= '<div class="row">';
                }

                if ($item['partner_image'] != '') {
                    $partner_img_src = wp_get_attachment_url($item['partner_image'], 'full', false, false);
                    $partner_link_set = '';
                    $href['url'] = '';

                    if (isset($item['partner_link'])) {
                        $partner_link_set = true;
                    } else {
                        $partner_link_set = false;
                    }

                    if ($partner_link_set == true) {
                        $href = vc_build_link($item['partner_link']);
                    }

                    $string .= '<div class="partner-item ' . esc_attr($colset) . '" style="';

                    $string .= '">';

                    if ($href['url'] != '') {

                        $string .= '<a class="partner-link" href="' . esc_html($href['url']) . '"><img class="partner-img" src="' . esc_html($partner_img_src) . '" alt="Partner Image" style="';

                        if ($partner_border_color != "") {
                            $string .= ' border-color:' . esc_attr($partner_border_color) . ';';
                            $string .= ' padding: 20px;';
                        }

                        if ($partner_border_radius != "") {
                            $string .= ' border-radius:' . esc_attr($partner_border_radius) . 'px;';
                        }

                        if ($partner_border_style != "") {
                            $string .= ' border-style:' . esc_attr($partner_border_style) . ';';
                        }

                        if ($partner_border_width != "") {
                            $string .= ' border-width:' . esc_attr($partner_border_width) . 'px;';
                        }

                        $string .= '"></a>';
                    } else {
                        $string .= '<img class="partner-img" src="' . esc_html($partner_img_src) . '" alt="Partner Image" style="';

                        if ($partner_border_color != "") {
                            $string .= ' border-color:' . esc_attr($partner_border_color) . ';';
                            $string .= ' padding: 20px;';
                        }

                        if ($partner_border_radius != "") {
                            $string .= ' border-radius:' . esc_attr($partner_border_radius) . 'px;';
                        }

                        if ($partner_border_style != "") {
                            $string .= ' border-style:' . esc_attr($partner_border_style) . ';';
                        }

                        if ($partner_border_width != "") {
                            $string .= ' border-width:' . esc_attr($partner_border_width) . 'px;';
                        }

                        $string .= '">';
                    }
                    $string .= '</div>';
                }
                $partner_count++;
                if ($partner_count == 4) {
                    $partner_count = 0;
                    $string .= '</div>';
                }
            }
            if ($partner_count < 4) {
                $string .= '</div>';
            }

            $string .= '</div>';
        } else if ($image_grid == 'six_col') {

            $colset = 'col-md-2';
            $partner_count = 0;

            $string .= '<div class="partners-grid-six-col">';


            foreach ($partners_info as $item) {

                if ($partner_count == 0) {
                    $string .= '<div class="row">';
                }

                if ($item['partner_image'] != '') {
                    $partner_img_src = wp_get_attachment_url($item['partner_image'], 'full', false, false);
                    $partner_link_set = '';
                    $href['url'] = '';

                    if (isset($item['partner_link'])) {
                        $partner_link_set = true;
                    } else {
                        $partner_link_set = false;
                    }


                    if ($partner_link_set == true) {
                        $href = vc_build_link($item['partner_link']);
                    }

                    $string .= '<div class="partner-item ' . esc_attr($colset) . '" style="';

                    $string .= '">';

                    if ($href['url'] != '') {

                        $string .= '<a class="partner-link" href="' . esc_html($href['url']) . '"><img class="partner-img" src="' . esc_html($partner_img_src) . '" alt="Partner Image" style="';

                        if ($partner_border_color != "") {
                            $string .= ' border-color:' . esc_attr($partner_border_color) . ';';
                            $string .= ' padding: 20px;';
                        }

                        if ($partner_border_radius != "") {
                            $string .= ' border-radius:' . esc_attr($partner_border_radius) . 'px;';
                        }

                        if ($partner_border_style != "") {
                            $string .= ' border-style:' . esc_attr($partner_border_style) . ';';
                        }

                        if ($partner_border_width != "") {
                            $string .= ' border-width:' . esc_attr($partner_border_width) . 'px;';
                        }

                        $string .= '"></a>';
                    } else {
                        $string .= '<img class="partner-img" src="' . esc_html($partner_img_src) . '" alt="Partner Image" style="';

                        if ($partner_border_color != "") {
                            $string .= ' border-color:' . esc_attr($partner_border_color) . ';';
                            $string .= ' padding: 20px;';
                        }

                        if ($partner_border_radius != "") {
                            $string .= ' border-radius:' . esc_attr($partner_border_radius) . 'px;';
                        }

                        if ($partner_border_style != "") {
                            $string .= ' border-style:' . esc_attr($partner_border_style) . ';';
                        }

                        if ($partner_border_width != "") {
                            $string .= ' border-width:' . esc_attr($partner_border_width) . 'px;';
                        }

                        $string .= '">';
                    }
                    $string .= '</div>';
                }
                $partner_count++;
                if ($partner_count == 6) {
                    $partner_count = 0;
                    $string .= '</div>';
                }
            }
            if ($partner_count < 6) {
                $string .= '</div>';
            }

            $string .= '</div>';
        }
    }
    $string .= '</div>';

    return $string;
}
