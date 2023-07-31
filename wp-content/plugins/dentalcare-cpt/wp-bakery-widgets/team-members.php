<?php

add_action('vc_before_init', 'dental_care_team_members_VC');

function dental_care_team_members_VC() {
    vc_map(array(
        "name" => esc_html__("Team Members", 'dental-care'),
        "base" => "dental_care_team_members",
        "class" => "",
        "category" => esc_html__('Dental Care', 'dental-care'),
        "params" => array(
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Title", 'dental-care'),
                "param_name" => "title",
                "description" => esc_html__("Title text Here. Leave blank if no title is needed.", 'dental-care')
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Image Width", 'dental-care'),
                "param_name" => "img_width",
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Image Height", 'dental-care'),
                "param_name" => "img_height",
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Team Display Type", 'dental-care'),
                "param_name" => "team_type",
                "description" => esc_html__("Choose a team type.", 'dental-care'),
                "value" => array("" => "", "Team Carousel" => "team_carousel", "Team Grid 3 Column" => "team_grid_three_col" , "Team Grid 4 Column" => "team_grid_four_col", "Team List" => "team_list"),
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Team Carousel Design", 'dental-care'),
                "param_name" => "team_member_carousel_design",
                "description" => esc_html__("Choose a team member carousel design.", 'dental-care'),
                "dependency" => array("element" => "team_type", "value" => array("team_carousel")),
                "value" => array(
                    '' => '',
                    'Design One' => 'design_one',
                    'Design Two' => 'design_two',
                ),
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Number of items", 'dental-care'),
                "param_name" => "num_items",
                "description" => esc_html__("Enter the number of team members to display. Enter -1 to display all items.", 'dental-care')
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Order by title", 'dental-care'),
                "param_name" => "order_items",
                "description" => esc_html__("Choose if to order items", 'dental-care'),
                "value" => array(
                    '' => '',
                    'Yes' => 'yes',
                    'No' => 'no',
                )
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Filter team member by category", 'dental-care'),
                "param_name" => "filter_team_members_en",
                "description" => esc_html__("Choose to filter team members by category.", 'dental-care'),
                "value" => array(
                    '' => '',
                    'On' => 'on',
                    'Off' => 'off',
                )
            ),
            array(
                "type" => "team_member_category",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Team Member Category", 'dental-care'),
                "param_name" => "team_member_category",
                "description" => esc_html__("Choose a team member category.", 'dental-care'),
                "dependency" => array("element" => "filter_team_members_en", "value" => array("on")),
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Enable Social ", 'dental-care'),
                "param_name" => "social_en",
                "description" => esc_html__("Choose to enable or disable team member social links.", 'dental-care'),
                "value" => array(
                    '' => '',
                    'On' => 'on',
                    'Off' => 'off',
                )
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Enable Team Links ", 'dental-care'),
                "param_name" => "links_en",
                "description" => esc_html__("Choose to enable or disable team member links.", 'dental-care'),
                "value" => array(
                    '' => '',
                    'On' => 'on',
                    'Off' => 'off',
                )
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Enable Detail Overlay ", 'dental-care'),
                "param_name" => "overlay_en",
                "description" => esc_html__("Choose to enable or disable the details overlay.", 'dental-care'),
                "value" => array(
                    '' => '',
                    'On' => 'on',
                    'Off' => 'off',
                )
            ),

            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Carousel Speed", 'dental-care'),
                "param_name" => "carousel_speed",
                "description" => esc_html__("Enter the number for the carousel speed. (Default: 5000)", 'dental-care'),
                "group" => "Carousel"
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Number of carousel items", 'dental-care'),
                "param_name" => "carousel_items",
                "description" => esc_html__("Enter the number of team members columns to display in carousel.", 'dental-care'),
                "group" => "Carousel"
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Enable Arrows", 'dental-care'),
                "param_name" => "arrows_en",
                "description" => esc_html__("Choose to enable or disable arrows on carousel.", 'dental-care'),
                "value" => array(
                    '' => '',
                    'On' => 'on',
                    'Off' => 'off',
                ),
                "group" => "Carousel"
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Info Area Background Color", 'dental-care'),
                "param_name" => "info_bgcolor",
                "description" => esc_html__("Choose a background color for the team member info area", 'dental-care'),
                "dependency" => array("element" => "team_member_carousel_design", "value" => array("design_one","")),
                "group" => "Design"
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Team Member Name Font Size", 'dental-care'),
                "param_name" => "team_name_size",
                "description" => esc_html__("Enter a team member name font size.", 'dental-care'),
                "group" => "Typography"
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Team Member Name Color", 'dental-care'),
                "param_name" => "team_name_color",
                "description" => esc_html__("Choose a color for team member name", 'dental-care'),
                "group" => "Typography"
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Team Member Position Font Size", 'dental-care'),
                "param_name" => "team_pos_size",
                "description" => esc_html__("Enter a team member position font size.", 'dental-care'),
                "group" => "Typography"
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Team Member Name Color", 'dental-care'),
                "param_name" => "team_pos_color",
                "description" => esc_html__("Choose a color for team member name", 'dental-care'),
                "group" => "Typography"
            ),
        )
    ));
}

function dental_care_team_members_shortcode($atts, $content = NULL) {
    global $post;
    extract(shortcode_atts(array(
        'param' => '',
        'title' => '',
        'num_items' => ' ',
        'carousel_speed' => '',
        'team_type' => '',
        'carousel_items' => '',
        'social_en' => '',
        'links_en' => '',
        'overlay_en' => '',
        'order_items' => '',
        'team_member_category' => '',
        'arrows_en' => '',
        'img_width' => '',
        'img_height' => '',
        'team_pos_color' => '',
        'team_pos_size' => '',
        'team_name_color' => '',
        'team_name_size' => '',
        'info_bgcolor' => '',
        'team_member_carousel_design' => '',
                    ), $atts));

    if ($num_items == NULL) {
        $num_items = 3;
    }

    if($team_member_category == NULL){
    if ($order_items == 'yes') {
        $args = array(
            'post_type' => 'team-member',
            'post_status' => 'publish',
            'pagination' => true,
            'orderby' => 'title',
            'order' => 'ASC',
            'posts_per_page' => $num_items,
        );
    } else {
        $args = array(
            'post_type' => 'team-member',
            'post_status' => 'publish',
            'pagination' => true,
            'posts_per_page' => $num_items,
        );
    }
    }else{
        if ($order_items == 'yes') {
            $args = array(
                'post_type' => 'team-member',
                'post_status' => 'publish',
                'pagination' => true,
                'orderby' => 'title',
                'order' => 'ASC',
                'posts_per_page' => $num_items,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'team-member-categories',
                        'field' => 'slug',
                        'terms' => $team_member_category,
                    ),
                ),
            );
        } else {

            $args = array(
                'post_type' => 'team-member',
                'post_status' => 'publish',
                'pagination' => true,
                'posts_per_page' => $num_items,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'team-member-categories',
                        'field' => 'slug',
                        'terms' => $team_member_category,
                    ),
                ),
            );
        }
    }


// The Query
    $query = new WP_Query($args);
    $string = '<div class="dental-care-team-wrapper">';

    if ($arrows_en == 'on') {
        $string .= '<div class="carousel_arrow_nav_top">';
        $string .= '<a class="btn arrow_prev_top"><i class="fa fa-chevron-left"></i></a>';
        $string .= '<a class="btn arrow_next_top"><i class="fa fa-chevron-right"></i></a>';
        $string .= '</div>';
    }

    if ($title != NULL) {
        $string .= '<h3 class="dental-care-VC-title">' . esc_html($title) . '</h3>';
    }

    if ($team_type == "team_carousel") {

        $postcount = $query->post_count;

        $string .= '<div class="dental-care-team-members-carousel" data-speed="'.esc_attr($carousel_speed).'" data-items="'.esc_attr($carousel_items).'" data-count="'.esc_attr($postcount).'">';

        while ($query->have_posts()) {
            $query->the_post();

            $dental_care_team_member_pos = get_post_meta($post->ID, 'team_member_pos', $single = true);
            $dental_care_team_member_social = get_post_meta($post->ID, 'team_member_social_list', $single = true);
            $team_member_excerpt = get_the_excerpt();

            if ($img_width != "" && $img_height != "") {
                $team_members_img = get_the_post_thumbnail($post->ID, array($img_width, $img_height));
            } else {
                $team_members_img = get_the_post_thumbnail($post->ID, 'dental-care-block-thumb');
            }

           if($team_member_carousel_design == 'design_one' || $team_member_carousel_design == ''){

            $string .= '<div class="team-member-block">';
            if ($team_members_img != NULL) {
                $string .= '<div class="team-member-block-img">';
                if ($links_en == "off") {
                    $string .= $team_members_img;
                } else {
                    $string .= '<a rel="external" href="' . get_the_permalink() . '">' . $team_members_img . '<br /></a>';
                }

                if ($overlay_en == "on" || $overlay_en == "") {
                    $string .= '<div class="team-member-block-img-overlay">';
                    if ($social_en == 'off') {
                        $string .= '<a rel="external" href="' . get_the_permalink() . '">';
                        $string .= '<i class="fa fa-link"></i></a>';
                    } else {
                        $string .= '<div class="team-member-block-social">';

                        if (!empty($dental_care_team_member_social)) {
                            $string .= '<ul class="team-member-block-social-list social-icons-list">';
                            foreach ($dental_care_team_member_social as $socialnetwork) {
                                if (isset($socialnetwork['title']) && !empty($socialnetwork['title'])) {
                                    $title = $socialnetwork['title'];
                                } else
                                    $title = '';
                                if (isset($socialnetwork['team_member_social_link']) && !empty($socialnetwork['team_member_social_link'])) {
                                    $link = $socialnetwork['team_member_social_link'];
                                } else
                                    $link = '';
                                if (isset($socialnetwork['title']) && !empty($socialnetwork['title']) && isset($socialnetwork['team_member_social_link']) && !empty($socialnetwork['team_member_social_link'])) {
                                    $string .= '<li>'
                                            . '<a class="" href="' . esc_url($link) . '" target="_blank" title="' . esc_attr($title) . '"></a>'
                                            . '</li>';
                                }
                            }
                            $string .= '</ul>';
                        }

                        $string .= '</div>';
                    }
                    $string .= '</div>';
                }
                $string .= '</div>';
            }

            $string .= '<div class="team-member-main-detail" style="';

            if($info_bgcolor != ''){
                $string .= 'background:' . esc_attr($info_bgcolor) . ';';
            }

            $string .= '">';
            if ($links_en == "off") {
                $string .= '<h5 class="team-member-main-name" style="';

                if ($team_name_size != ''):
                    $string .= 'font-size:' . esc_attr($team_name_size) . 'px;';
                endif;

                if ($team_name_color != ''):
                    $string .= ' color:' . esc_attr($team_name_color) . ';';
                endif;

                $string .= '">' . get_the_title() . '</h5>';
            }else {
                $string .= '<h5 class="team-member-main-name">';

                $string .= '<a href="' . get_the_permalink() . '" style="';

                if ($team_name_size != ''):
                    $string .= 'font-size:' . esc_attr($team_name_size) . 'px;';
                endif;

                if ($team_name_color != ''):
                    $string .= ' color:' . esc_attr($team_name_color) . ';';
                endif;

                $string .= '">' . get_the_title() . '</a></h5>';
            }
            $string .= ' <span class="team-member-main-pos" style="';

            if ($team_pos_size != ''):
                $string .= 'font-size:' . esc_attr($team_pos_size) . 'px;';
            endif;

            if ($team_pos_color != ''):
                $string .= ' color:' . esc_attr($team_pos_color) . ';';
            endif;

            $string .= '">' . esc_html($dental_care_team_member_pos) . '</span>';
            $string .= ' </div>';

            $string .= ' </div>';

        }else{


            $string .= '<div class="team-member-block-two">';
            if ($team_members_img != NULL) {
                $string .= '<div class="team-member-block-img">';
                if ($links_en == "off") {
                    $string .= $team_members_img;
                } else {
                    $string .= '<a rel="external" href="' . get_the_permalink() . '">' . $team_members_img . '<br /></a>';
                }

                $string .= '</div>';
            }

            $string .= '<div class="team-member-main-detail">';
            if ($links_en == "off") {
                $string .= '<h5 class="team-member-main-name" style="';

                if ($team_name_size != ''):
                    $string .= 'font-size:' . esc_attr($team_name_size) . 'px;';
                endif;

                if ($team_name_color != ''):
                    $string .= ' color:' . esc_attr($team_name_color) . ';';
                endif;

                $string .= '">' . get_the_title() . '</h5>';
            }else {
                $string .= '<h5 class="team-member-main-name">';

                $string .= '<a href="' . get_the_permalink() . '" style="';

                if ($team_name_size != ''):
                    $string .= 'font-size:' . esc_attr($team_name_size) . 'px;';
                endif;

                if ($team_name_color != ''):
                    $string .= ' color:' . esc_attr($team_name_color) . ';';
                endif;

                $string .= '">' . get_the_title() . '</a></h5>';
            }
            $string .= ' <span class="team-member-main-pos" style="';

            if ($team_pos_size != ''):
                $string .= 'font-size:' . esc_attr($team_pos_size) . 'px;';
            endif;

            if ($team_pos_color != ''):
                $string .= ' color:' . esc_attr($team_pos_color) . ';';
            endif;

            $string .= '">' . esc_html($dental_care_team_member_pos) . '</span>';

            $string .= '<div class="team-member-excerpt">';
            $string .= esc_html($team_member_excerpt);
            $string .= '</div>';

            $string .= ' </div>';

            $string .= ' </div>';
        }

        }
        $string .= ' </div>';


    } else if ($team_type == "team_grid_three_col" || $team_type == "team_grid") {

        $team_member_count = 3;

        while ($query->have_posts()) {
            $query->the_post();

            $dental_care_team_member_pos = get_post_meta($post->ID, 'team_member_pos', $single = true);
            $dental_care_team_member_social = get_post_meta($post->ID, 'team_member_social_list', $single = true);

            if ($img_width != "" && $img_height != "") {
                $team_members_img = get_the_post_thumbnail($post->ID, array($img_width, $img_height));
            } else {
                $team_members_img = get_the_post_thumbnail($post->ID, 'dental-care-block-thumb');
            }

            if ($team_member_count == 3) {
                $team_member_count = 0;
                $string .= '<div class="row">';
            }
            $team_member_count++;

            $string .= '<div class="col-md-4 team-member-block-item">';
            $string .= '<div class="team-member-block">';
            if (get_the_post_thumbnail() != NULL) {
                $string .= '<div class="team-member-block-img">';
                if ($links_en == "off") {
                    $string .= $team_members_img;
                } else {
                    $string .= '<a rel="external" href="' . get_the_permalink() . '">' . $team_members_img . '<br /></a>';
                }

                if ($overlay_en == "on" || $overlay_en == "") {
                    $string .= '<div class="team-member-block-img-overlay">';
                    if ($social_en == 'off') {
                        $string .= '<a rel="external" href="' . get_the_permalink() . '">';
                        $string .= '<i class="fa fa-link"></i></a>';
                    } else {
                        $string .= '<div class="team-member-block-social">';

                        if (!empty($dental_care_team_member_social)) {
                            $string .= '<ul class="team-member-block-social-list social-icons-list">';
                            foreach ($dental_care_team_member_social as $socialnetwork) {
                                if (isset($socialnetwork['title']) && !empty($socialnetwork['title'])) {
                                    $title = $socialnetwork['title'];
                                } else
                                    $title = '';
                                if (isset($socialnetwork['team_member_social_link']) && !empty($socialnetwork['team_member_social_link'])) {
                                    $link = $socialnetwork['team_member_social_link'];
                                } else
                                    $link = '';
                                if (isset($socialnetwork['title']) && !empty($socialnetwork['title']) && isset($socialnetwork['team_member_social_link']) && !empty($socialnetwork['team_member_social_link'])) {

                                    $string .= '<li>';
                                    $string .= '<a class="" href="' . esc_url($link) . '" target="_blank" title="' . esc_attr($title) . '"></a>';
                                    $string .= '</li>';
                                }
                            }
                            $string .= '</ul>';
                        }

                        $string .= '</div>';
                    }
                    $string .= '</div>';
                }
                $string .= '</div>';
            }

            $string .= '<div class="team-member-main-detail">';
            if ($links_en == "off") {
                $string .= '<h5 class="team-member-main-name" style="';

                if ($team_name_size != ''):
                    $string .= 'font-size:' . esc_attr($team_name_size) . 'px;';
                endif;

                if ($team_name_color != ''):
                    $string .= ' color:' . esc_attr($team_name_color) . ';';
                endif;

                $string .= '">' . get_the_title() . '</h5>';
            }else {
                $string .= '<h5 class="team-member-main-name">';

                $string .= '<a href="' . get_the_permalink() . '" style="';

                if ($team_name_size != ''):
                    $string .= 'font-size:' . esc_attr($team_name_size) . 'px;';
                endif;

                if ($team_name_color != ''):
                    $string .= ' color:' . esc_attr($team_name_color) . ';';
                endif;

                $string .= '">' . get_the_title() . '</a></h5>';
            }
            $string .= ' <div class="team-member-main-pos" style="';

            if ($team_pos_size != ''):
                $string .= 'font-size:' . esc_attr($team_pos_size) . 'px;';
            endif;

            if ($team_pos_color != ''):
                $string .= ' color:' . esc_attr($team_pos_color) . ';';
            endif;

            $string .= '">' . esc_html($dental_care_team_member_pos) . '</div>';
            $string .= ' </div>';
            $string .= ' </div>';
            $string .= ' </div>';

            if ($team_member_count == 3) {
                $string .= '</div>';
            }
        }
        if ($team_member_count < 3) {
            $string .= '</div>';
        }
    }else if ($team_type == "team_grid_four_col") {

        $team_member_count = 4;

        while ($query->have_posts()) {
            $query->the_post();

            $dental_care_team_member_pos = get_post_meta($post->ID, 'team_member_pos', $single = true);
            $dental_care_team_member_social = get_post_meta($post->ID, 'team_member_social_list', $single = true);

            if ($img_width != "" && $img_height != "") {
                $team_members_img = get_the_post_thumbnail($post->ID, array($img_width, $img_height));
            } else {
                $team_members_img = get_the_post_thumbnail($post->ID, 'dental-care-block-thumb');
            }

            if ($team_member_count == 4) {
                $team_member_count = 0;
                $string .= '<div class="row">';
            }
            $team_member_count++;

            $string .= '<div class="col-md-3 team-member-block-item">';
            $string .= '<div class="team-member-block">';
            if (get_the_post_thumbnail() != NULL) {
                $string .= '<div class="team-member-block-img">';
                if ($links_en == "off") {
                    $string .= $team_members_img;
                } else {
                    $string .= '<a rel="external" href="' . get_the_permalink() . '">' . $team_members_img . '<br /></a>';
                }

                if ($overlay_en == "on" || $overlay_en == "") {
                    $string .= '<div class="team-member-block-img-overlay">';
                    if ($social_en == 'off') {
                        $string .= '<a rel="external" href="' . get_the_permalink() . '">';
                        $string .= '<i class="fa fa-link"></i></a>';
                    } else {
                        $string .= '<div class="team-member-block-social">';

                        if (!empty($dental_care_team_member_social)) {
                            $string .= '<ul class="team-member-block-social-list social-icons-list">';
                            foreach ($dental_care_team_member_social as $socialnetwork) {
                                if (isset($socialnetwork['title']) && !empty($socialnetwork['title'])) {
                                    $title = $socialnetwork['title'];
                                } else
                                    $title = '';
                                if (isset($socialnetwork['team_member_social_link']) && !empty($socialnetwork['team_member_social_link'])) {
                                    $link = $socialnetwork['team_member_social_link'];
                                } else
                                    $link = '';
                                if (isset($socialnetwork['title']) && !empty($socialnetwork['title']) && isset($socialnetwork['team_member_social_link']) && !empty($socialnetwork['team_member_social_link'])) {

                                    $string .= '<li>';
                                    $string .= '<a class="" href="' . esc_url($link) . '" target="_blank" title="' . esc_attr($title) . '"></a>';
                                    $string .= '</li>';
                                }
                            }
                            $string .= '</ul>';
                        }

                        $string .= '</div>';
                    }
                    $string .= '</div>';
                }
                $string .= '</div>';
            }

            $string .= '<div class="team-member-main-detail">';
            if ($links_en == "off") {
                $string .= '<h5 class="team-member-main-name" style="';

                if ($team_name_size != ''):
                    $string .= 'font-size:' . esc_attr($team_name_size) . 'px;';
                endif;

                if ($team_name_color != ''):
                    $string .= ' color:' . esc_attr($team_name_color) . ';';
                endif;

                $string .= '">' . get_the_title() . '</h5>';
            }else {
                $string .= '<h5 class="team-member-main-name">';

                $string .= '<a href="' . get_the_permalink() . '" style="';

                if ($team_name_size != ''):
                    $string .= 'font-size:' . esc_attr($team_name_size) . 'px;';
                endif;

                if ($team_name_color != ''):
                    $string .= ' color:' . esc_attr($team_name_color) . ';';
                endif;

                $string .= '">' . get_the_title() . '</a></h5>';
            }
            $string .= ' <div class="team-member-main-pos" style="';

            if ($team_pos_size != ''):
                $string .= 'font-size:' . esc_attr($team_pos_size) . 'px;';
            endif;

            if ($team_pos_color != ''):
                $string .= ' color:' . esc_attr($team_pos_color) . ';';
            endif;

            $string .= '">' . esc_html($dental_care_team_member_pos) . '</div>';
            $string .= ' </div>';
            $string .= ' </div>';
            $string .= ' </div>';

            if ($team_member_count == 4) {
                $string .= '</div>';
            }
        }
        if ($team_member_count < 4) {
            $string .= '</div>';
        }
    }elseif ($team_type == 'team_list') {

        while ($query->have_posts()) {
            $query->the_post();

            $dental_care_team_member_pos = get_post_meta($post->ID, 'team_member_pos', $single = true);
            $dental_care_team_member_social = get_post_meta($post->ID, 'team_member_social_list', $single = true);
            $dental_care_team_member_bio = get_post_meta($post->ID, 'team_member_bio', $single = true);

            if ($img_width != "" && $img_height != "") {
                $team_members_img = get_the_post_thumbnail($post->ID, array($img_width, $img_height));
            } else {
                $team_members_img = get_the_post_thumbnail($post->ID, 'dental-care-block-thumb');
            }

            $string .= '<div class="team-member-block-list row">';
            $string .= '<div class="col-md-4 team-member-block-list-img-wrapper">';
            if (get_the_post_thumbnail() != NULL) {
                $string .= '<div class="team-member-block-img">';
                if ($links_en == "off") {
                    $string .= $team_members_img;
                } else {
                    $string .= '<a rel="external" href="' . get_the_permalink() . '">' . $team_members_img . '</a>';
                }


                if ($overlay_en == "on" || $overlay_en == "") {
                    if ($links_en == "off") {
                $string .= '<span class="team-member-block-img-overlay"><i class="fa fa-link"></i></span>';
                    }else{
                $string .= '<a rel="external" href="' . get_the_permalink() . '">';
                $string .= '<span class="team-member-block-img-overlay"><i class="fa fa-link"></i></span>';
                $string .= '</a>';
                    }
                }

                $string .= '</div>';
            }

            $string .= '</div>';
            $string .= '<div class="col-md-8">';
            $string .= '<div class="team-member-main-detail-list">';
            if ($links_en == "off") {
                $string .= '<h5 class="team-member-main-name" style="';

                if ($team_name_size != ''):
                    $string .= 'font-size:' . esc_attr($team_name_size) . 'px;';
                endif;

                if ($team_name_color != ''):
                    $string .= ' color:' . esc_attr($team_name_color) . ';';
                endif;

                $string .= '">' . get_the_title() . '</h5>';
            }else {
                $string .= '<h5 class="team-member-main-name"';

                $string .= '"><a href="' . get_the_permalink() . '" style="';

                if ($team_name_size != ''):
                    $string .= 'font-size:' . esc_attr($team_name_size) . 'px;';
                endif;

                if ($team_name_color != ''):
                    $string .= ' color:' . esc_attr($team_name_color) . ';';
                endif;

                $string .= '">' . get_the_title() . '</a></h5>';
            }

            $string .= '<div class="team-member-main-pos" style="';

            if ($team_pos_size != ''):
                $string .= 'font-size:' . esc_attr($team_pos_size) . 'px;';
            endif;

            if ($team_pos_color != ''):
                $string .= ' color:' . esc_attr($team_pos_color) . ';';
            endif;

            $string .='">' . esc_html($dental_care_team_member_pos) . '</div>';
            $string .= '</div>';


            $string .= '<div class="team-member-block-social">';

            if ($social_en == 'on' || "") {
            if (!empty($dental_care_team_member_social)) {
                $string .= '<ul class = "team-member-block-social-list team-member-block-list-social-list social-icons-list">';
                foreach ($dental_care_team_member_social as $socialnetwork) {
                    if (isset($socialnetwork['title']) && !empty($socialnetwork['title'])) {
                        $title = $socialnetwork['title'];
                    } else
                        $title = '';
                    if (isset($socialnetwork['team_member_social_link']) && !empty($socialnetwork['team_member_social_link'])) {
                        $link = $socialnetwork['team_member_social_link'];
                    } else
                        $link = '';
                    if (isset($socialnetwork['title']) && !empty($socialnetwork['title']) && isset($socialnetwork['team_member_social_link']) && !empty($socialnetwork['team_member_social_link'])) {

                        $string .= '<li>';
                        $string .= '<a class = "" href = "' . esc_url($link) . '" target = "_blank" title = "' . esc_attr($title) . '"></a>';
                        $string .= '</li>';
                    }
                }
                $string .= '</ul>';
            }
            }


            $string .= '</div>';
            $string .= '<div class="team-member-bio">';
            $string .= wp_kses($dental_care_team_member_bio, $allowed_html);
            $string .= '</div>';

            $string .= '<div class="view-team-member-btn-wrapper">';

            if ($links_en == "on" || "") {
            $string .= '<a class="btn view-team-member-btn" href="' . get_the_permalink() . '">' . esc_html('Read More', 'dental-care') . ' </a>';
            }

            $string .= '</div>';
            $string .= '</div>';

            $string .= '</div>';
        }
    }
    $string .= ' </div> ';
    wp_reset_postdata();
    return $string;
}
