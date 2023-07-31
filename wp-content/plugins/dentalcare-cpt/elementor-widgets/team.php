<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Team
 */

class Dental_Care_Team extends Widget_Base {

    /**
     * Retrieve the widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'dental-care-team';
    }

    /**
     * Retrieve the widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Team', 'dental-care');
    }

    /**
     * Retrieve the widget icon.
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-person';
    }

    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories() {
        return ['dental-care'];
    }

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @access protected
     */
    protected function register_controls() {


        $this->start_controls_section(
            'section_team_settings', [
                'label' => esc_html__('Team Settings', 'dental-care'),
            ]
        );

        $this->add_control(
            'team_type', [
                'label' => esc_html__('Team Display Type', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                "options" => array(
                    "" => "",
                    "team_carousel" => "Team Carousel",
                    "team_grid_three_col" => "Team Grid 3 Column",
                    "team_grid_four_col" => "Team Grid 4 Column",
                ),
                'description' => esc_html__('Choose a team type.', 'dental-care'),
            ]
        );


        $this->add_control(
            'team_member_carousel_design', [
                'label' => esc_html__('Team Carousel Design', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                "options" => array(
                    "" => "",
                    "design_one" => "Design One",
                    "design_two" => "Design Two",
                ),
                'description' => esc_html__('Choose a team member carousel design.', 'dental-care'),
                'condition' => [
                    'team_type' => 'team_carousel',
                ],
            ]
        );

        $this->add_control(
            'num_items', [
                'label' => esc_html_x('Number of items', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter the number of items to display. Enter -1 to display all.', 'dental-care'),
            ]
        );

        $this->add_control(
            'carousel_speed', [
                'label' => esc_html_x('Carousel Speed (ms)', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter the number for the carousel speed. (Default: 5000)', 'dental-care'),
                'condition' => [
                    'team_type' => 'team_carousel',
                ],
            ]
        );

        $this->add_control(
            'arrows_en', [
                'label' => esc_html__('Navigation Arrows', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'return_value' => 'true',
                'condition' => [
                    'team_type' => 'team_carousel',
                ],
            ]
        );

        $this->add_control(
            'carousel_items', [
                'label' => esc_html_x('Number of carousel items', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter the number of team columns to display in carousel.', 'dental-care'),
                'condition' => [
                    'team_type' => 'team_carousel',
                ],
            ]
        );

        $this->add_control(
            'order_items', [
                'label' => esc_html__('Order by title', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'description' => esc_html__('Choose if to order items', 'dental-care'),
                'return_value' => 'true',
            ]
        );

        $this->add_control(
            'filter_team_en', [
                'label' => esc_html__('Filter team by category', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'description' => esc_html__('Choose if to order items', 'dental-care'),
                'return_value' => 'true',
            ]
        );

        $this->add_control(
            'team_category', [
                'label' => esc_html__('Team Category', 'dental-care'),
                'type' => TeamCategorySelect_Control::TeamCategorySelect,
                'condition' => [
                    'filter_team_en' => 'true',
                ],
                'description' => esc_html__('Choose a team category.', 'dental-care'),
            ]
        );

        $this->add_control(
            'overlay_en', [
                'label' => esc_html__('Enable Detail Overlay', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'return_value' => 'true',

            ]
        );

        $this->add_control(
            'links_en', [
                'label' => esc_html__('Enable team member links', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'return_value' => 'true',
            ]
        );

        $this->add_control(
            'team_excerpts_en', [
                'label' => esc_html__('Enable team member excerpts', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'return_value' => 'true',
                'condition' => [
                    'team_member_carousel_design' => 'design_two',
                ],
            ]
        );

        $this->add_control(
            'social_links_en', [
                'label' => esc_html__('Enable team member social links', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'return_value' => 'true',
            ]
        );

       

        $this->end_controls_section();


        $this->start_controls_section(
            'section_team_style', [
                'label' => esc_html__('Team Style', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
         'img_width', [
             'label' => esc_html__('Image Width', 'dental-care'),
             'type' => Controls_Manager::TEXT,
             
         ]
     );

        $this->add_control(
          'img_height', [
              'label' => esc_html__('Image Height', 'dental-care'),
              'type' => Controls_Manager::TEXT,
              
          ]
      );

        $this->add_control(
            'info_bgcolor', [
                'label' => esc_html_x('Info Area Background Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'team_member_carousel_design' => 'design_one',
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-member-main-detail' => 'background-color: {{VALUE}}',
                ],
                
            ]
        );

        $this->add_control(
            'team_member_name_color', [
                'label' => esc_html_x('Team Member Name Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-member-main-name' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(), [
                'name' => 'team_member_name_typography',
                'label' => esc_html_x('Team Member Name Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .team-member-main-name',
            ]
        );

        $this->add_control(
            'team_member_pos_color', [
                'label' => esc_html_x('Team Member Position Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-member-main-pos' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(), [
                'name' => 'team_member_pos_typography',
                'label' => esc_html_x('Team Member Position Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .team-member-main-pos',
            ]
        );

        $this->end_controls_section();


    }

    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @access protected
     */
    protected function render() {


        $settings = $this->get_settings_for_display();
        global $post;

        $num_items = '';

        if ($settings['num_items'] == "") {
            $num_items = -1;
        }else{
            $num_items = $settings['num_items'];
        }

        if ($settings['order_items'] == true) {
            if ($settings['team_category'] != '') {
                $args = array(
                    'post_type' => 'team-member',
                    'post_status' => 'publish',
                    'pagination' => true,
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'posts_per_page' => $num_items,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'team-categories',
                            'field' => 'slug',
                            'terms' => $settings['team_category'],
                        ),
                    ),
                );
            } else {
                $args = array(
                    'post_type' => 'team-member',
                    'post_status' => 'publish',
                    'pagination' => true,
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'posts_per_page' => $num_items,
                );
            }
        } else {
            if ($settings['team_category'] != '') {
                $args = array(
                    'post_type' => 'team-member',
                    'post_status' => 'publish',
                    'pagination' => true,
                    'posts_per_page' => $num_items,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'team-categories',
                            'field' => 'slug',
                            'terms' => $settings['team_category'],
                        ),
                    ),
                );
            } else {
                $args = array(
                    'post_type' => 'team-member',
                    'post_status' => 'publish',
                    'pagination' => true,
                    'posts_per_page' => $num_items,
                );
            }
        }

        // The Query
        $query = new WP_Query($args);

        $carousel_id = 'carousel-'.mt_rand();


        echo '<div class="dental-care-team-wrapper">';

        if ($settings['arrows_en'] == true) {
            echo '<div class="carousel_arrow_nav_top">';
            echo '<a class="btn arrow_prev_top"><i class="fa fa-chevron-left"></i></a>';
            echo '<a class="btn arrow_next_top"><i class="fa fa-chevron-right"></i></a>';
            echo '</div>';
        }

        if ($settings['team_type'] == "team_carousel") {

            $postcount = $query->post_count;

            echo '<div id="'.esc_attr($carousel_id).'" class="dental-care-team-members-carousel" data-speed="'.esc_attr($settings['carousel_speed']).'" data-items="'.esc_attr($settings['carousel_items']).'" >';

            while ($query->have_posts()) {
                $query->the_post();

                $dental_care_team_member_pos = get_post_meta($post->ID, 'team_member_pos', $single = true);
                $dental_care_team_member_social = get_post_meta($post->ID, 'team_member_social_list', $single = true);
                $team_member_excerpt = get_the_excerpt();

                if ($settings['img_width'] != "" && $settings['img_height'] != "") {
                    $team_members_img = get_the_post_thumbnail($post->ID, array($settings['img_width'], $settings['img_height']));
                } else {
                    $team_members_img = get_the_post_thumbnail($post->ID, 'dental-care-block-thumb');
                }

                if($settings['team_member_carousel_design'] == 'design_one' || $settings['team_member_carousel_design'] == ''){

                    echo '<div class="team-member-block">';
                    if ($team_members_img != NULL) {
                        echo '<div class="team-member-block-img">';
                        if ($settings['links_en'] == false) {
                            echo $team_members_img;
                        } else {
                            echo '<a rel="external" href="' . get_the_permalink() . '">' . $team_members_img . '<br /></a>';
                        }

                        if ($settings['overlay_en'] == true) {
                            echo '<div class="team-member-block-img-overlay">';
                            if ($settings['social_links_en'] == false) {
                                echo '<a rel="external" href="' . get_the_permalink() . '">';
                                echo '<i class="fa fa-link"></i></a>';
                            } else {
                                echo '<div class="team-member-block-social">';

                                if (!empty($dental_care_team_member_social)) {
                                    echo '<ul class="team-member-block-social-list social-icons-list">';
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
                                            echo '<li>'
                                            . '<a class="" href="' . esc_url($link) . '" target="_blank" title="' . esc_attr($title) . '"></a>'
                                            . '</li>';
                                        }
                                    }
                                    echo '</ul>';
                                }

                                echo '</div>';
                            }
                            echo '</div>';
                        }
                        echo '</div>';
                    }

                    echo '<div class="team-member-main-detail" style="';

                    echo '">';
                    if ($settings['links_en'] == false) {
                        echo '<h5 class="team-member-main-name" style="';

                        echo '">' . get_the_title() . '</h5>';
                    }else {
                        echo '<h5 class="team-member-main-name">';

                        echo '<a href="' . get_the_permalink() . '" style="';

                        echo '">' . get_the_title() . '</a></h5>';
                    }
                    echo ' <span class="team-member-main-pos" style="';

                    echo '">' . esc_html($dental_care_team_member_pos) . '</span>';
                    echo ' </div>';

                    echo ' </div>';

                }else{


                    echo '<div class="team-member-block-two">';
                    if ($team_members_img != NULL) {
                        echo '<div class="team-member-block-img">';
                        if ($settings['links_en'] == false) {
                            echo $team_members_img;
                        } else {
                            echo '<a rel="external" href="' . get_the_permalink() . '">' . $team_members_img . '<br /></a>';
                        }

                        echo '</div>';
                    }

                    echo '<div class="team-member-main-detail">';
                    if ($settings['links_en'] == false) {
                        echo '<h5 class="team-member-main-name" style="';

                        echo '">' . get_the_title() . '</h5>';
                    }else {
                        echo '<h5 class="team-member-main-name">';

                        echo '<a href="' . get_the_permalink() . '" style="';

                        echo '">' . get_the_title() . '</a></h5>';
                    }
                    echo ' <span class="team-member-main-pos" style="';

                    echo '">' . esc_html($dental_care_team_member_pos) . '</span>';

                    if($settings['team_excerpts_en'] == true){
                        echo '<div class="team-member-excerpt">';
                        echo esc_html($team_member_excerpt);
                        echo '</div>';
                    }

                     if ($settings['social_links_en'] == true) {
                         
                                echo '<div class="team-member-block-social">';

                                if (!empty($dental_care_team_member_social)) {
                                    echo '<ul class="team-member-block-social-list social-icons-list">';
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
                                            echo '<li>'
                                            . '<a class="" href="' . esc_url($link) . '" target="_blank" title="' . esc_attr($title) . '"></a>'
                                            . '</li>';
                                        }
                                    }
                                    echo '</ul>';
                                }

                                echo '</div>';
                            }

                    echo ' </div>';

                    echo ' </div>';
                }

            }
            echo ' </div>';


        } else if ($settings['team_type'] == "team_grid_three_col" || $settings['team_type'] == "team_grid") {

            $team_member_count = 3;

            while ($query->have_posts()) {
                $query->the_post();

                $dental_care_team_member_pos = get_post_meta($post->ID, 'team_member_pos', $single = true);
                $dental_care_team_member_social = get_post_meta($post->ID, 'team_member_social_list', $single = true);

                if ($settings['img_width'] != "" && $settings['img_height'] != "") {
                    $team_members_img = get_the_post_thumbnail($post->ID, array($settings['img_width'], $settings['img_height']));
                } else {
                    $team_members_img = get_the_post_thumbnail($post->ID, 'dental-care-block-thumb');
                }

                if ($team_member_count == 3) {
                    $team_member_count = 0;
                    echo '<div class="row">';
                }
                $team_member_count++;

                echo '<div class="col-md-4 team-member-block-item">';
                echo '<div class="team-member-block">';
                if (get_the_post_thumbnail() != NULL) {
                    echo '<div class="team-member-block-img">';
                    if ($settings['links_en'] == false) {
                        echo $team_members_img;
                    } else {
                        echo '<a rel="external" href="' . get_the_permalink() . '">' . $team_members_img . '<br /></a>';
                    }

                    if ($settings['overlay_en'] == true) {
                        echo '<div class="team-member-block-img-overlay">';
                        if ($settings['social_links_en'] == false) {
                            echo '<a rel="external" href="' . get_the_permalink() . '">';
                            echo '<i class="fa fa-link"></i></a>';
                        } else {
                            echo '<div class="team-member-block-social">';

                            if (!empty($dental_care_team_member_social)) {
                                echo '<ul class="team-member-block-social-list social-icons-list">';
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

                                        echo '<li>';
                                        echo '<a class="" href="' . esc_url($link) . '" target="_blank" title="' . esc_attr($title) . '"></a>';
                                        echo '</li>';
                                    }
                                }
                                echo '</ul>';
                            }

                            echo '</div>';
                        }
                        echo '</div>';
                    }
                    echo '</div>';
                }

                echo '<div class="team-member-main-detail">';
                if ($settings['links_en'] == false) {
                    echo '<h5 class="team-member-main-name" style="';

                    echo '">' . get_the_title() . '</h5>';
                }else {
                    echo '<h5 class="team-member-main-name">';

                    echo '<a href="' . get_the_permalink() . '" style="';

                    echo '">' . get_the_title() . '</a></h5>';
                }
                echo ' <div class="team-member-main-pos" style="';

                echo '">' . esc_html($dental_care_team_member_pos) . '</div>';
                echo ' </div>';
                echo ' </div>';
                echo ' </div>';

                if ($team_member_count == 3) {
                    echo '</div>';
                }
            }
            if ($team_member_count < 3) {
                echo '</div>';
            }
        }else if ($settings['team_type'] == "team_grid_four_col") {

            $team_member_count = 4;

            while ($query->have_posts()) {
                $query->the_post();

                $dental_care_team_member_pos = get_post_meta($post->ID, 'team_member_pos', $single = true);
                $dental_care_team_member_social = get_post_meta($post->ID, 'team_member_social_list', $single = true);

                if ($settings['img_width'] != "" && $settings['img_height'] != "") {
                    $team_members_img = get_the_post_thumbnail($post->ID, array($settings['img_width'], $settings['img_height']));
                } else {
                    $team_members_img = get_the_post_thumbnail($post->ID, 'dental-care-block-thumb');
                }

                if ($team_member_count == 4) {
                    $team_member_count = 0;
                    echo '<div class="row">';
                }
                $team_member_count++;

                echo '<div class="col-md-3 team-member-block-item">';
                echo '<div class="team-member-block">';
                if (get_the_post_thumbnail() != NULL) {
                    echo '<div class="team-member-block-img">';
                    if ($settings['links_en'] == false) {
                        echo $team_members_img;
                    } else {
                        echo '<a rel="external" href="' . get_the_permalink() . '">' . $team_members_img . '<br /></a>';
                    }

                    if ($settings['overlay_en'] == true) {
                        echo '<div class="team-member-block-img-overlay">';
                        if ($settings['social_links_en'] == false) {
                            echo '<a rel="external" href="' . get_the_permalink() . '">';
                            echo '<i class="fa fa-link"></i></a>';
                        } else {
                            echo '<div class="team-member-block-social">';

                            if (!empty($dental_care_team_member_social)) {
                                echo '<ul class="team-member-block-social-list social-icons-list">';
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

                                        echo '<li>';
                                        echo '<a class="" href="' . esc_url($link) . '" target="_blank" title="' . esc_attr($title) . '"></a>';
                                        echo '</li>';
                                    }
                                }
                                echo '</ul>';
                            }

                            echo '</div>';
                        }
                        echo '</div>';
                    }
                    echo '</div>';
                }

                echo '<div class="team-member-main-detail">';
                if ($settings['links_en'] == false) {
                    echo '<h5 class="team-member-main-name" style="';

                    echo '">' . get_the_title() . '</h5>';
                }else {
                    echo '<h5 class="team-member-main-name">';

                    echo '<a href="' . get_the_permalink() . '" style="';

                    echo '">' . get_the_title() . '</a></h5>';
                }
                echo ' <div class="team-member-main-pos" style="';

                echo '">' . esc_html($dental_care_team_member_pos) . '</div>';
                echo ' </div>';
                echo ' </div>';
                echo ' </div>';

                if ($team_member_count == 4) {
                    echo '</div>';
                }
            }
            if ($team_member_count < 4) {
                echo '</div>';
            }
        }elseif ($settings['team_type'] == 'team_list') {

            while ($query->have_posts()) {
                $query->the_post();

                $dental_care_team_member_pos = get_post_meta($post->ID, 'team_member_pos', $single = true);
                $dental_care_team_member_social = get_post_meta($post->ID, 'team_member_social_list', $single = true);
                $dental_care_team_member_bio = get_post_meta($post->ID, 'team_member_bio', $single = true);

                if ($settings['img_width'] != "" && $settings['img_height'] != "") {
                    $team_members_img = get_the_post_thumbnail($post->ID, array($settings['img_width'], $settings['img_height']));
                } else {
                    $team_members_img = get_the_post_thumbnail($post->ID, 'dental-care-block-thumb');
                }

                echo '<div class="team-member-block-list row">';
                echo '<div class="col-md-4 team-member-block-list-img-wrapper">';
                if (get_the_post_thumbnail() != NULL) {
                    echo '<div class="team-member-block-img">';
                    if ($settings['links_en'] == false) {
                        echo $team_members_img;
                    } else {
                        echo '<a rel="external" href="' . get_the_permalink() . '">' . $team_members_img . '</a>';
                    }

                    if ($settings['overlay_en'] == true) {
                        if ($settings['links_en'] == false) {
                            echo '<span class="team-member-block-img-overlay"><i class="fa fa-link"></i></span>';
                        }else{
                            echo '<a rel="external" href="' . get_the_permalink() . '">';
                            echo '<span class="team-member-block-img-overlay"><i class="fa fa-link"></i></span>';
                            echo '</a>';
                        }
                    }

                    echo '</div>';
                }

                echo '</div>';
                echo '<div class="col-md-8">';
                echo '<div class="team-member-main-detail-list">';
                if ($settings['links_en'] == false) {
                    echo '<h5 class="team-member-main-name" style="';

                    echo '">' . get_the_title() . '</h5>';
                }else {
                    echo '<h5 class="team-member-main-name"';

                    echo '"><a href="' . get_the_permalink() . '" style="';

                    echo '">' . get_the_title() . '</a></h5>';
                }

                echo '<div class="team-member-main-pos" style="';

                echo'">' . esc_html($dental_care_team_member_pos) . '</div>';
                echo '</div>';


                echo '<div class="team-member-block-social">';

                if ($settings['social_links_en'] == true || "") {
                    if (!empty($dental_care_team_member_social)) {
                        echo '<ul class = "team-member-block-social-list team-member-block-list-social-list social-icons-list">';
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

                                echo '<li>';
                                echo '<a class = "" href = "' . esc_url($link) . '" target = "_blank" title = "' . esc_attr($title) . '"></a>';
                                echo '</li>';
                            }
                        }
                        echo '</ul>';
                    }
                }


                echo '</div>';
                echo '<div class="team-member-bio">';
                echo wp_kses($dental_care_team_member_bio, $allowed_html);
                echo '</div>';

                echo '<div class="view-team-member-btn-wrapper">';

                if ($settings['links_en'] == true || "") {
                    echo '<a class="btn view-team-member-btn" href="' . get_the_permalink() . '">' . esc_html('Read More', 'dental-care') . ' </a>';
                }

                echo '</div>';
                echo '</div>';

                echo '</div>';
            }
        }
        echo ' </div> ';

        if (is_admin()){

          $items = $settings['carousel_items'];
          $speed = $settings['carousel_speed'];

          if($items == NULL){
            $items = 2;
        }
        if($speed == NULL){
            $speed = 5000;
        }


        if(($items != NULL) && ($speed != NULL) && ($carousel_id != NULL)){

            echo
            "<script>

            'use strict';

            jQuery('#".$carousel_id."').slick({
              slidesToShow: ".$items.",
              autoplaySpeed: ".$speed.",
              autoplay: true,
              arrows: false,
              infinite: true,
              responsive: [
              {
                  breakpoint: 1100,
                  settings: {
                    slidesToShow: 2
                }
                },
                {
                  breakpoint: 800,
                  settings: {
                    slidesToShow: 1
                }
                },
                {
                  breakpoint: 480,
                  settings: {
                    slidesToShow: 1
                }
            }
            ]
            });
            </script>";

        }

    }

}

}
