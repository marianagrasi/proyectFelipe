<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Button
 */

class Dental_Care_Button extends Widget_Base
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
        return 'dental-care-button';
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
        return esc_html__('Button', 'dental-care');
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
        return 'eicon-button';
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
            'section_link',
            [
                'label' => esc_html__('Link', 'dental-care'),
            ]
        );

        $this->add_control(
            'btn_link',
            [
                'label' => esc_html__('Button Link', 'dental-care'),
                'type' => Controls_Manager::URL,
                'placeholder' => 'http://your-link.com',
                'default' => [
                    'url' => '',
                ],
            ]
        );

        $this->add_control(
            'btn_title',
            [
                'label' => esc_html_x('Button Title', 'dental-care'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'btn_type',
            [
                'label' => esc_html__('Button Type', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                "options" => array(
                    "" => "",
                    "link" => "Link",
                    "btn" => "Button",
                ),
                'description' => esc_html__('Choose a button type.', 'dental-care'),
            ]
        );

        $this->add_responsive_control(
            'btn_align_select',
            [
                'label' => esc_html_x('Button Alignment', 'dental-care'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html_x('Left', 'dental-care', 'dental-care'),
                        'icon' => 'lnr lnr-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html_x('Center', 'dental-care', 'dental-care'),
                        'icon' => 'lnr lnr-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html_x('Right', 'dental-care', 'dental-care'),
                        'icon' => 'lnr lnr-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .stronghold-btn' => 'text-align: {{VALUE}}',
                    '{{WRAPPER}} .stronghold-btn-link' => 'text-align: {{VALUE}}',
                ],
                'description' => esc_html__('Choose button alignment.', 'dental-care'),
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'section_icon',
            [
                'label' => esc_html__('Icon', 'dental-care'),
            ]
        );

        $this->add_control(
            'icon_en',
            [
                'label' => esc_html__('Use Icon', 'dental-care'),
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
                    'icon_en' => 'true',
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
                    'icon_en' => 'true',
                ],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_btn_style',
            [
                'label' => esc_html__('Button', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'btn_title_color',
            [
                'label' => esc_html_x('Title Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose a color for the button title.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .stronghold-btn-link-url' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'btn_bg_color',
            [
                'label' => esc_html_x('Background Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose a color for the button title.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .stronghold-btn-link-url' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'btn_type' => 'btn',
                ],
            ]
        );

        $this->add_control(
            'btn_border_color',
            [
                'label' => esc_html_x('Border Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose a border color.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .stronghold-btn-link-url' => 'border-color: {{VALUE}}',
                ],
                'condition' => [
                    'btn_type' => 'btn',
                ],
            ]
        );

        $this->add_control(
            'btn_border_width',
            [
                'label' => esc_html_x('Border Width (px)', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'selectors' => [
                    '{{WRAPPER}} .stronghold-btn-link-url' => 'border-width: {{VALUE}}px',
                ],
                'condition' => [
                    'btn_type' => 'btn',
                ],
            ]
        );

        $this->add_control(
            'btn_border_style',
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
                    '{{WRAPPER}} .stronghold-btn-link-url' => 'border-style: {{VALUE}}',
                ],
                'condition' => [
                    'btn_type' => 'btn',
                ],
            ]
        );

        $this->add_control(
            'btn_border_radius',
            [
                'label' => esc_html_x('Border Radius (px)', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Choose a border radius.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .stronghold-btn-link-url' => 'border-radius: {{VALUE}}px',
                ],
                'condition' => [
                    'btn_type' => 'btn',
                ],
            ]
        );

        $this->add_control(
            'btn_padding',
            [
                'label' => __('Button Padding', 'dental-care'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'condition' => [
                    'btn_type' => 'btn',
                ],
                'selectors' => [
                    '{{WRAPPER}} .stronghold-btn-link-url' => '
                    padding-top: {{TOP}}{{UNIT}};
                    padding-right: {{RIGHT}}{{UNIT}};
                    padding-bottom: {{BOTTOM}}{{UNIT}};
                    padding-left:{{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control(
            'btn_title_hover_color',
            [
                'label' => esc_html_x('Title Hover Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose a hover color for the button title.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .stronghold-btn-link-url:hover' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'btn_hover_bgcolor',
            [
                'label' => esc_html_x('Button Hover Background Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose a hover background color for the button', 'dental-care'),
                'condition' => [
                    'btn_type' => 'btn',
                ],
                'selectors' => [
                    '{{WRAPPER}} .stronghold-btn-link-url:hover' => 'background-color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'btn_hover_border_color',
            [
                'label' => esc_html_x('Button Hover Border Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose a hover border color for the button.', 'dental-care'),
                'condition' => [
                    'btn_type' => 'btn',
                ],
                'selectors' => [
                    '{{WRAPPER}} .stronghold-btn-link-url:hover' => 'border-color: {{VALUE}}',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typography',
                'label' => esc_html_x('Button Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .stronghold-btn-link-url',
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_Content_style',
            [
                'label' => esc_html__('Icon', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html_x('Icon Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-icon' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'icon_font_size',
            [
                'label' => esc_html_x('Icon Font Size', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'selectors' => [
                    '{{WRAPPER}} .btn-icon' => 'font-size: {{VALUE}}px',
                ]
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_btn_svg_style',
            [
                'label' => esc_html__('Button SVG Styling', 'dental-care'),
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
                    '{{WRAPPER}} .btn-svg svg' => 'fill: {{VALUE}}; stroke: {{VALUE}}',
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
                    '{{WRAPPER}} .btn-svg svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
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

        $link_url = $settings['btn_link']['url'];
        $link_target = $settings['btn_link']['is_external'];
        $link_rel = $settings['btn_link']['nofollow'];

        if ($settings['btn_type'] == 'btn') {
            echo '<div class="stronghold-btn" style="';
        } else {
            echo '<div class="stronghold-btn-link" style="';
        }

        echo '">';
        if ($link_url != '') {

            if ($settings['btn_type'] == 'btn') {
                echo '<a class="stronghold-btn-link-url btn" href="' . esc_url($link_url) . '"';

                if ($link_target == 'on') {
                    echo ' target="_blank"';
                }

                if ($link_rel == 'on') {
                    echo ' rel="nofollow"';
                }

                echo ' class="btn"';
            } else {
                echo '<a class="stronghold-btn-link-url" href="' . esc_url($link_url) . '"';

                if ($link_target == 'on') {
                    echo ' target="_blank"';
                }

                if ($link_rel == 'on') {
                    echo ' rel=”nofollow”';
                }
            }

            echo '>' . esc_html($settings['btn_title']) . '';

            if ($settings['btn_type'] == 'btn') {
                if ($settings['icon_en'] == true) {

                    if ($settings['icon_source'] == 'icon_library') {

                        if ($settings['icon_select']['library'] == 'svg') {

                            echo '<div class="btn-svg">';
                            echo file_get_contents(esc_attr($settings['icon_select']['value']['url']));
                            echo '</div>';
                        } else {

                            echo '<i class="btn-icon ';

                            if ($settings['icon_select']['value']) {
                                echo esc_attr($settings['icon_select']['value']);
                            }

                            echo '"></i>';
                        }
                    } elseif ($settings['icon_source'] == 'icon_theme') {

                        echo '<i class="btn-icon ';

                        if ($settings['icon_select_custom'] != '') {
                            echo esc_attr($settings['icon_select_custom']);
                        }

                        echo '"></i>';
                    }
                }
            }

            echo '</a>';

            if ($settings['btn_type'] == 'link' || $settings['btn_type'] == '') {
                if ($settings['icon_en'] == true) {

                    if ($settings['icon_source'] == 'icon_library') {

                        if ($settings['icon_select']['library'] == 'svg') {

                            echo '<div class="btn-svg">';
                            echo file_get_contents(esc_attr($settings['icon_select']['value']['url']));
                            echo '</div>';
                        } else {

                            echo '<i class="btn-icon ';

                            if ($settings['icon_select']['value']) {
                                echo esc_attr($settings['icon_select']['value']);
                            }

                            echo '"></i>';
                        }
                    } elseif ($settings['icon_source'] == 'icon_theme') {

                        echo '<i class="btn-icon ';

                        if ($settings['icon_select_custom'] != '') {
                            echo esc_attr($settings['icon_select_custom']);
                        }

                        echo '"></i>';
                    }

                }
            }
        }
        echo '</div>';
    }
}
