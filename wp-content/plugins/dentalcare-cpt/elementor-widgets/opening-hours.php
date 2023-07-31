<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Opening Hours
 */

class Dental_Care_Opening_Hours extends Widget_Base
{

    /**
     * Retrieve the widget name.
     *    
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'dental-care-opening-hours';
    }

    /**
     * Retrieve the widget title.
     *     
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Opening Hours', 'dental-care');
    }

    /**
     * Retrieve the widget icon.
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-clock-o';
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
    public function get_categories()
    {
        return ['dental-care'];
    }

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'section_openhrs',
            [
                'label' => esc_html__('Opening Hours', 'dental-care'),
            ]
        );

        $this->add_control(
            'opening_hours_title',
            [
                'label' => esc_html_x('Title', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('Enter a title for the opening hours widget.', 'dental-care'),
            ]
        );

        $this->add_control(
            'opening_hours_desc',
            [
                'label' => esc_html_x('Description', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('Enter a description for the opening hours widget.', 'dental-care'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_openhrs_days',
            [
                'label' => esc_html__('Opening Hours Days', 'dental-care'),
            ]
        );

        $this->add_control(
            'monday_title',
            [
                'label' => esc_html_x('Monday Title', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter the title text for Monday.', 'dental-care'),
            ]
        );

        $this->add_control(
            'monday_text',
            [
                'label' => esc_html_x('Monday Text', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('Enter the title text for Monday.', 'dental-care'),
            ]
        );

        $this->add_control(
            'tuesday_title',
            [
                'label' => esc_html_x('Tuesday Title', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter the title text for Tuesday.', 'dental-care'),
            ]
        );

        $this->add_control(
            'tuesday_text',
            [
                'label' => esc_html_x('Tuesday Text', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('Enter the title text for Tuesday.', 'dental-care'),
            ]
        );

        $this->add_control(
            'wednesday_title',
            [
                'label' => esc_html_x('Wednesday Title', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter the title text for Wednesday.', 'dental-care'),
            ]
        );

        $this->add_control(
            'wednesday_text',
            [
                'label' => esc_html_x('Wednesday Text', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('Enter the title text for Wednesday.', 'dental-care'),
            ]
        );

        $this->add_control(
            'thursday_title',
            [
                'label' => esc_html_x('Thursday Title', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter the title text for Thursday.', 'dental-care'),
            ]
        );

        $this->add_control(
            'thursday_text',
            [
                'label' => esc_html_x('Thursday Text', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('Enter the title text for Thursday.', 'dental-care'),
            ]
        );

        $this->add_control(
            'friday_title',
            [
                'label' => esc_html_x('Friday Title', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter the title text for Friday.', 'dental-care'),
            ]
        );

        $this->add_control(
            'friday_text',
            [
                'label' => esc_html_x('Friday Text', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('Enter the title text for Friday.', 'dental-care'),
            ]
        );

        $this->add_control(
            'saturday_title',
            [
                'label' => esc_html_x('Saturday Title', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter the title text for Saturday.', 'dental-care'),
            ]
        );

        $this->add_control(
            'saturday_text',
            [
                'label' => esc_html_x('Saturday Text', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('Enter the title text for Saturday.', 'dental-care'),
            ]
        );

        $this->add_control(
            'sunday_title',
            [
                'label' => esc_html_x('Sunday Title', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter the title text for Sunday.', 'dental-care'),
            ]
        );

        $this->add_control(
            'sunday_text',
            [
                'label' => esc_html_x('Sunday Text', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('Enter the title text for Sunday.', 'dental-care'),
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_openhrs_icon',
            [
                'label' => esc_html__('Opening Hours Icon', 'dental-care'),
            ]
        );

        $this->add_control(
            'icon_en',
            [
                'label' => esc_html__('Use Custom Icon', 'dental-care'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'return_value' => 'true',
            ]
        );

        $this->add_control(
            'icon_source',
            [
                'label' => esc_html__('Icon Source', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                "options" => array(
                    "icon_library" => "Icon Library",
                    "icon_theme" => "Theme Icons",
                ),
                'condition' => [
                    'icon_en' => 'true',
                ],
            ]
        );

        $this->add_control(
            'icon_select_custom',
            [
                'label' => esc_html__('Icon', 'dental-care'),
                'type' => IconSelector_Control::IconSelector,
                'condition' => [
                    'icon_source' => 'icon_theme',
                ],
            ]
        );

        $this->add_control(
            'icon_select',
            [
                'label' => esc_html__('Icon', 'dental-care'),
                'type' => Controls_Manager::ICONS,
                'condition' => [
                    'icon_source' => 'icon_library',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_openhrs_style',
            [
                'label' => esc_html__('Opening Hours', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'opening_hours_title_color',
            [
                'label' => esc_html_x('Title Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose a title color.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .opening-hours-header-title' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'opening_hours_title_typography',
                'label' => esc_html_x('Title Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .opening-hours-header-title',
            ]
        );

        $this->add_control(
            'opening_hours_desc_color',
            [
                'label' => esc_html_x('Description Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose a description color.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .opening-hours-desc' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'opening_hours_desc_typography',
                'label' => esc_html_x('Description Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .opening-hours-desc',
            ]
        );

        $this->add_control(
            'opening_hours_text_color',
            [
                'label' => esc_html_x('Opening Hours Text Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose a text color.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .opening-hours-day' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .opening-hours-time' => 'color: {{VALUE}}',

                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'opening_hours_text_typography',
                'label' => esc_html_x('Opening Hours Text Typography', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .opening-hours-day' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .opening-hours-time' => 'color: {{VALUE}}',

                ]
            ]
        );

        $this->add_control(
            'opening_hours_icon_color',
            [
                'label' => esc_html_x('Icon Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose an icon color.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .opening-hours-icon' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'opening_hours_icon_size',
            [
                'label' => esc_html_x('Icon Font Size', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'selectors' => [
                    '{{WRAPPER}} .opening-hours-icon' => 'font-size: {{VALUE}}px',
                ]
            ]
        );

        $this->add_control(
            'opening_hours_box_shadow_en',
            [
                'label' => esc_html__('Enable Shadow', 'dental-care'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'return_value' => 'true',
                'description' => esc_html__('Choose to enable/disable box shadow.', 'dental-care'),

            ]
        );

        $this->add_control(
            'opening_hours_header_bgcolor',
            [
                'label' => esc_html_x('Header Background Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose a background color.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .opening-hours-header' => 'background-color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'opening_hours_headerbg_img',
            [
                'label' => __('Header Background Image', 'dental-care'),
                'type' => Controls_Manager::MEDIA,
                'description' => __('Choose an image for the background.', 'dental-care'),
                'dynamic' => [
                    'active' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .opening-hours-header' => 'background-image: url({{URL}})',
                ]
            ]
        );


        $this->add_control(
            'opening_hours_bg_color',
            [
                'label' => esc_html_x('Background Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose a background color or combine it with an image as an overlay.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .dental-care-opening-hours-widget' => 'background-color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'opening_hours_bg_img',
            [
                'label' => __('Background Image', 'dental-care'),
                'type' => Controls_Manager::MEDIA,
                'description' => __('Choose an image for the background.', 'dental-care'),
                'dynamic' => [
                    'active' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .dental-care-opening-hours-widget' => 'background-image: url({{URL}})',
                ]
            ]
        );


        $this->add_control(
            'opening_hours_border_color',
            [
                'label' => esc_html_x('Border Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose a border color.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .dental-care-opening-hours-widget' => 'border-color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'opening_hours_border_width',
            [
                'label' => esc_html_x('Border Width (px)', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'selectors' => [
                    '{{WRAPPER}} .dental-care-opening-hours-widget' => 'border-width: {{VALUE}}px',
                ]
            ]
        );

        $this->add_control(
            'opening_hours_border_style',
            [
                'label' => esc_html__('Border Style', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                'description' => esc_html__('Choose a border style.', 'dental-care'),
                "options" => array(
                    "" => "",
                    "solid" => "Solid",
                    "dotted" => "Dotted",
                    "dashed" => "Dashed",
                    "double" => "Double",
                    "none" => "None",
                ),
                'selectors' => [
                    '{{WRAPPER}} .dental-care-opening-hours-widget' => 'border-style: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'opening_hours_border_radius',
            [
                'label' => esc_html_x('Border Radius (px)', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Choose a border radius.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .dental-care-opening-hours-widget' => 'border-radius: {{VALUE}}px',
                ]
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_opening_hours_svg_style',
            [
                'label' => esc_html__('SVG Styling', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'icon_select[library]',
                            'operator' => '==',
                            'value' => 'svg',
                        ],
                    ],
                ],
            ]
        );

        $this->add_control(
            'svg_color',
            [
                'label' => esc_html_x('SVG Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .opening-hours-svg svg' => 'fill: {{VALUE}}; stroke: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'icon_select[library]',
                            'operator' => '==',
                            'value' => 'svg',
                        ],
                    ],
                ],
            ]
        );

        $this->add_control(
            'svg_size',
            [
                'label' => esc_html_x('SVG Size', 'dental-care'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 500,
                        'step' => 5,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .opening-hours-svg svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'icon_select[library]',
                            'operator' => '==',
                            'value' => 'svg',
                        ],
                    ],
                ],
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
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        if ($settings['opening_hours_bg_img'] != '') {
            $opening_hours_bg_img_src = $settings['opening_hours_bg_img']['url'];
        }
        if ($settings['opening_hours_headerbg_img'] != '') {
            $opening_hours_headerbg_img_src = $settings['opening_hours_headerbg_img']['url'];
        }

        echo '<div class="dental-care-opening-hours-widget" style="';


        if ($settings['opening_hours_box_shadow_en'] == true) {
            echo ' -webkit-box-shadow: 0 0 10px rgba(0,0,0,0.08);';
            echo ' box-shadow: 0 0 10px rgba(0,0,0,0.08);';
        }

        echo '"';

        echo '>';

        if ($settings['opening_hours_title'] != '') {
            echo '<div class="opening-hours-header" style="';

            echo '">';

            if ($settings['opening_hours_title'] != '') {
                echo '<h3 class="opening-hours-header-title" style="';

                echo '">' . esc_html($settings['opening_hours_title']) . '</h3>';
            }


            if ($settings['opening_hours_desc'] != '') {
                echo '<span class="opening-hours-desc" style="';

                echo '">' . esc_html($settings['opening_hours_desc']) . '</span>';
            }

            echo '</div>';
        }

        echo '<div class="opening-hours-items ';

        if ($settings['opening_hours_bg_color'] != '' || $settings['opening_hours_bg_img'] != '' || $settings['opening_hours_border_color'] != '') {
            echo 'info-item-padding';
        }

        echo '">';

        if (($settings['monday_title'] && $settings['monday_text']) != "") {

            echo '<div class="opening-hours-item">';

            if ($settings['icon_source'] == 'icon_library' || $settings['icon_source'] == 'icon_theme') {

                if ($settings['icon_source'] == 'icon_library') {

                    if ($settings['icon_select']['library'] == 'svg') {

                        echo '<div class="opening-hours-svg">';
                        echo file_get_contents(esc_attr($settings['icon_select']['value']['url']));
                        echo '</div>';
                    } else {

                        echo '<i class="opening-hours-icon ';

                        if ($settings['icon_select']['value']) {
                            echo esc_attr($settings['icon_select']['value']);
                        }

                        echo '"></i>';
                    }
                } else if ($settings['icon_source'] == 'icon_theme') {

                    echo '<i class="opening-hours-icon ';

                    if ($settings['icon_select_custom'] != '') {
                        echo esc_attr($settings['icon_select_custom']);
                    }

                    echo '"></i>';
                }
            }

            echo '<div class="opening-hours-day" style="';

            echo '">';
            echo '<span>' . esc_html($settings['monday_title']) . '</span>';
            echo '</div>';
            echo '<div class="opening-hours-time"  style="';

            echo '">';
            echo '<span>' . esc_html($settings['monday_text']) . '</span>';
            echo '</div>';
            echo '</div>';
        }

        if (($settings['tuesday_title'] && $settings['tuesday_text']) != "") {
            echo '<div class="opening-hours-item">';

            if ($settings['icon_source'] == 'icon_library' || $settings['icon_source'] == 'icon_theme') {

                if ($settings['icon_source'] == 'icon_library') {

                    if ($settings['icon_select']['library'] == 'svg') {

                        echo '<div class="opening-hours-svg">';
                        echo file_get_contents(esc_attr($settings['icon_select']['value']['url']));
                        echo '</div>';
                    } else {

                        echo '<i class="opening-hours-icon ';

                        if ($settings['icon_select']['value']) {
                            echo esc_attr($settings['icon_select']['value']);
                        }

                        echo '"></i>';
                    }
                } else if ($settings['icon_source'] == 'icon_theme') {

                    echo '<i class="opening-hours-icon ';

                    if ($settings['icon_select_custom'] != '') {
                        echo esc_attr($settings['icon_select_custom']);
                    }

                    echo '"></i>';
                }
            }

            echo '<div class="opening-hours-day" style="';

            echo '">';
            echo '<span>' . esc_html($settings['tuesday_title']) . '</span>';
            echo '</div>';
            echo '<div class="opening-hours-time"  style="';

            echo '">';
            echo '<span>' . esc_html($settings['tuesday_text']) . '</span>';
            echo '</div>';
            echo '</div>';
        }
        if (($settings['wednesday_title'] && $settings['wednesday_text']) != "") {
            echo '<div class="opening-hours-item">';

            if ($settings['icon_source'] == 'icon_library' || $settings['icon_source'] == 'icon_theme') {

                if ($settings['icon_source'] == 'icon_library') {

                    if ($settings['icon_select']['library'] == 'svg') {

                        echo '<div class="opening-hours-svg">';
                        echo file_get_contents(esc_attr($settings['icon_select']['value']['url']));
                        echo '</div>';
                    } else {

                        echo '<i class="opening-hours-icon ';

                        if ($settings['icon_select']['value']) {
                            echo esc_attr($settings['icon_select']['value']);
                        }

                        echo '"></i>';
                    }
                } else if ($settings['icon_source'] == 'icon_theme') {

                    echo '<i class="opening-hours-icon ';

                    if ($settings['icon_select_custom'] != '') {
                        echo esc_attr($settings['icon_select_custom']);
                    }

                    echo '"></i>';
                }
            }

            echo '<div class="opening-hours-day" style="';

            echo '">';
            echo '<span>' . esc_html($settings['wednesday_title']) . '</span>';
            echo '</div>';
            echo '<div class="opening-hours-time"  style="';

            echo '">';
            echo '<span>' . esc_html($settings['wednesday_text']) . '</span>';
            echo '</div>';
            echo '</div>';
        }
        if (($settings['thursday_title'] && $settings['thursday_text']) != "") {
            echo '<div class="opening-hours-item">';

            if ($settings['icon_source'] == 'icon_library' || $settings['icon_source'] == 'icon_theme') {

                if ($settings['icon_source'] == 'icon_library') {

                    if ($settings['icon_select']['library'] == 'svg') {

                        echo '<div class="opening-hours-svg">';
                        echo file_get_contents(esc_attr($settings['icon_select']['value']['url']));
                        echo '</div>';
                    } else {

                        echo '<i class="opening-hours-icon ';

                        if ($settings['icon_select']['value']) {
                            echo esc_attr($settings['icon_select']['value']);
                        }

                        echo '"></i>';
                    }
                } else if ($settings['icon_source'] == 'icon_theme') {

                    echo '<i class="opening-hours-icon ';

                    if ($settings['icon_select_custom'] != '') {
                        echo esc_attr($settings['icon_select_custom']);
                    }

                    echo '"></i>';
                }
            }

            echo '<div class="opening-hours-day" style="';

            echo '">';
            echo '<span>' . esc_html($settings['thursday_title']) . '</span>';
            echo '</div>';
            echo '<div class="opening-hours-time"  style="';

            echo '">';
            echo '<span>' . esc_html($settings['thursday_text']) . '</span>';
            echo '</div>';
            echo '</div>';
        }
        if (($settings['friday_title'] && $settings['friday_text']) != "") {
            echo '<div class="opening-hours-item">';

            if ($settings['icon_source'] == 'icon_library' || $settings['icon_source'] == 'icon_theme') {

                if ($settings['icon_source'] == 'icon_library') {

                    if ($settings['icon_select']['library'] == 'svg') {

                        echo '<div class="opening-hours-svg">';
                        echo file_get_contents(esc_attr($settings['icon_select']['value']['url']));
                        echo '</div>';
                    } else {

                        echo '<i class="opening-hours-icon ';

                        if ($settings['icon_select']['value']) {
                            echo esc_attr($settings['icon_select']['value']);
                        }

                        echo '"></i>';
                    }
                } else if ($settings['icon_source'] == 'icon_theme') {

                    echo '<i class="opening-hours-icon ';

                    if ($settings['icon_select_custom'] != '') {
                        echo esc_attr($settings['icon_select_custom']);
                    }

                    echo '"></i>';
                }
            }

            echo '<div class="opening-hours-day" style="';

            echo '">';
            echo '<span>' . esc_html($settings['friday_title']) . '</span>';
            echo '</div>';
            echo '<div class="opening-hours-time"  style="';

            echo '">';
            echo '<span>' . esc_html($settings['friday_text']) . '</span>';
            echo '</div>';
            echo '</div>';
        }
        if (($settings['saturday_title'] && $settings['saturday_text']) != "") {
            echo '<div class="opening-hours-item">';

            if ($settings['icon_source'] == 'icon_library' || $settings['icon_source'] == 'icon_theme') {

                if ($settings['icon_source'] == 'icon_library') {

                    if ($settings['icon_select']['library'] == 'svg') {

                        echo '<div class="opening-hours-svg">';
                        echo file_get_contents(esc_attr($settings['icon_select']['value']['url']));
                        echo '</div>';
                    } else {

                        echo '<i class="opening-hours-icon ';

                        if ($settings['icon_select']['value']) {
                            echo esc_attr($settings['icon_select']['value']);
                        }

                        echo '"></i>';
                    }
                } else if ($settings['icon_source'] == 'icon_theme') {

                    echo '<i class="opening-hours-icon ';

                    if ($settings['icon_select_custom'] != '') {
                        echo esc_attr($settings['icon_select_custom']);
                    }

                    echo '"></i>';
                }
            }

            echo '<div class="opening-hours-day" style="';

            echo '">';
            echo '<span>' . esc_html($settings['saturday_title']) . '</span>';
            echo '</div>';
            echo '<div class="opening-hours-time"  style="';

            echo '">';
            echo '<span>' . esc_html($settings['saturday_text']) . '</span>';
            echo '</div>';
            echo '</div>';
        }
        if (($settings['sunday_title'] && $settings['sunday_text']) != "") {
            echo '<div class="opening-hours-item">';

            if ($settings['icon_source'] == 'icon_library' || $settings['icon_source'] == 'icon_theme') {

                if ($settings['icon_source'] == 'icon_library') {

                    if ($settings['icon_select']['library'] == 'svg') {

                        echo '<div class="opening-hours-svg">';
                        echo file_get_contents(esc_attr($settings['icon_select']['value']['url']));
                        echo '</div>';
                    } else {

                        echo '<i class="opening-hours-icon ';

                        if ($settings['icon_select']['value']) {
                            echo esc_attr($settings['icon_select']['value']);
                        }

                        echo '"></i>';
                    }
                } else if ($settings['icon_source'] == 'icon_theme') {

                    echo '<i class="opening-hours-icon ';

                    if ($settings['icon_select_custom'] != '') {
                        echo esc_attr($settings['icon_select_custom']);
                    }

                    echo '"></i>';
                }
            }

            echo '<div class="opening-hours-day" style="';

            echo '">';
            echo '<span>' . esc_html($settings['sunday_title']) . '</span>';
            echo '</div>';
            echo '<div class="opening-hours-time"  style="';

            echo '">';
            echo '<span>' . esc_html($settings['sunday_text']) . '</span>';
            echo '</div>';
            echo '</div>';
        }

        echo '</div>';
        echo '</div>';
    }
}
