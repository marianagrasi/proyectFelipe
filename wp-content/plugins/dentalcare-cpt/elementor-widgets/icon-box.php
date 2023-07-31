<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Icon Box
 */

class Dental_Care_Icon_Box extends Widget_Base
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
        return 'dental-care-icon-box';
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
        return esc_html__('Icon Box', 'dental-care');
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
        return 'eicon-icon-box';
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
     * Allowed HTML
     * @access public
     */
    public function dental_care_extensions_allowed_html()
    {

        $allowed = array(
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
            'br' => array(),
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
            ),
            'img' => array(
                'src' => array(),
                'class' => array(),
                'style' => array(),
            ),
            'h1' => array(
                'class' => array(),
                'style' => array(),
            ),
            'h2' => array(
                'class' => array(),
                'style' => array(),
            ),
            'h3' => array(
                'class' => array(),
                'style' => array(),
            ),
            'h4' => array(
                'class' => array(),
                'style' => array(),
            ),
            'h5' => array(
                'class' => array(),
                'style' => array(),
            ),
            'h6' => array(
                'class' => array(),
                'style' => array(),
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

        return apply_filters('dental_care_extensions_allowed_html', $allowed);
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
            'section_icon_box_settings',
            [
                'label' => esc_html__('Icon Box Settings', 'dental-care'),
            ]
        );


        $this->add_control(
            'icon_box_design',
            [
                'label' => esc_html__('Design', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                "options" => array(
                    "" => "",
                    "design_one" => "Design One",

                ),
            ]
        );

        $this->add_control(
            'icon_box_onclick', [
                'label' => esc_html__('Javascript onClick Action', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'section_icon_box_icon_settings',
            [
                'label' => esc_html__('Icon Box Icon', 'dental-care'),
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
            'section_icon_box_content_settings',
            [
                'label' => esc_html__('Icon Box Content', 'dental-care'),
            ]
        );



        $this->add_control(
            'icon_title_front',
            [
                'label' => esc_html_x('Title', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );
        $this->add_control(
            'icon_desc_front',
            [
                'label' => esc_html__('Description', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );


        $this->add_control(
            'icon_link_select',
            [
                'label' => esc_html__('Apply Link to', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                "options" => array(
                    "" => "",
                    "box" => "Box",
                    "read_more" => "Read More",
                    "none" => "None",
                ),
            ]
        );

        $this->add_control(
            'icon_link',
            [
                'label' => esc_html__('Icon Box Link', 'dental-care'),
                'type' => Controls_Manager::URL,
                'placeholder' => 'http://your-link.com',
                'description' => __('Choose a link for the icon box.', 'dental-care'),
                'default' => [
                    'url' => '',
                ],
            ]
        );

        $this->add_control(
            'icon_link_read',
            [
                'label' => esc_html_x('Read More Title', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html_x('read more', 'dental-care'),
                'condition' => [
                    'icon_link_select' => 'read_more',
                ],

            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_icon_box_style',
            [
                'label' => esc_html__('Icon Box Styling', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'box_shadow_en',
            [
                'label' => esc_html__('Enable Box Shadow', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'description' => __('Choose to enable box shadow.', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'return_value' => 'true',
            ]
        );

        $this->add_control(
            'icon_translate_en',
            [
                'label' => esc_html__('Enable Icon Box Translate on Hover', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'description' => __('Choose to enable/disable icon box translate on hover.', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'return_value' => 'true',
            ]
        );

        $this->add_control(
            'icon_zoom_en',
            [
                'label' => esc_html__('Enable Icon Zoom on Hover', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'return_value' => 'true',
            ]
        );


        $this->add_control(
            'icon_box_padding',
            [
                'label' => esc_html__('Icon Box Padding', 'dental-care'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .stronghold-icon-box-front' => '
                    padding-top: {{TOP}}{{UNIT}};
                    padding-right: {{RIGHT}}{{UNIT}};
                    padding-bottom: {{BOTTOM}}{{UNIT}};
                    padding-left:{{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .iconbox-overlay' => '
                    padding-top: {{TOP}}{{UNIT}};
                    padding-right: {{RIGHT}}{{UNIT}};
                    padding-bottom: {{BOTTOM}}{{UNIT}};
                    padding-left:{{LEFT}}{{UNIT}};',
                ]

            ]
        );

        $this->add_control(
            'icon_border_color_front',
            [
                'label' => esc_html_x('Border Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose a border color.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .stronghold-icon-box-front' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .iconbox-overlay' => 'border-color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'icon_border_width_front',
            [
                'label' => esc_html_x('Border Width (px)', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'selectors' => [
                    '{{WRAPPER}} .stronghold-icon-box-front' => 'border-width: {{VALUE}}px',
                    '{{WRAPPER}} .iconbox-overlay' => 'border-width: {{VALUE}}px',
                ]
            ]
        );

        $this->add_control(
            'icon_border_style_front',
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
                    '{{WRAPPER}} .stronghold-icon-box-front' => 'border-style: {{VALUE}}',
                    '{{WRAPPER}} .iconbox-overlay' => 'border-style: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'icon_border_radius_front',
            [
                'label' => esc_html_x('Border Radius (px)', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Choose a border radius.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .stronghold-icon-box-front' => 'border-radius: {{VALUE}}px',
                    '{{WRAPPER}} .iconbox-overlay' => 'border-radius: {{VALUE}}px',
                ]
            ]
        );

        $this->add_control(
            'f',
            [
                'label' => esc_html_x('Background Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose a background color or combine it with an image as an overlay.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .stronghold-icon-box-front' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .iconbox-overlay' => 'background-color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'icon_bg_img_front',
            [
                'label' => __('Background Image', 'dental-care'),
                'type' => Controls_Manager::MEDIA,
                'description' => __('Choose an image for the background', 'dental-care'),
                'dynamic' => [
                    'active' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .stronghold-icon-box-front' => 'background-image: url({{URL}})',
                    '{{WRAPPER}} .iconbox-overlay' => 'background-image: url({{URL}})',
                ]
            ]
        );

        $this->add_control(
            'icon_box_bg_hover_color_front',
            [
                'label' => esc_html_x('Icon Box Background Hover Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose a background hover color for the icon box.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .stronghold-icon-box-front:hover' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .iconbox-overlay:hover' => 'background-color: {{VALUE}}',
                ]
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_icon_box_svg_style',
            [
                'label' => esc_html__('Icon Box SVG Styling', 'dental-care'),
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
                    '{{WRAPPER}} .stronghold-info-icon .icon-box-svg svg' => 'fill: {{VALUE}}; stroke: {{VALUE}}',
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
                    '{{WRAPPER}} .stronghold-info-icon .icon-box-svg svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
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

        $this->start_controls_section(
            'section_icon_box_icon_style',
            [
                'label' => esc_html__('Icon Box Icon Styling', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'icon_select[library]',
                            'operator' => '!=',
                            'value' => 'svg',
                        ],
                    ],
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html_x('Icon Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon-box-icon' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_responsive_control(
            'icon_alignment',
            [
                'label' => esc_html_x('Icon Alignment', 'dental-care'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => esc_html_x('Left', 'dental-care', 'dental-care'),
                        'icon' => 'lnr lnr-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html_x('Center', 'dental-care', 'dental-care'),
                        'icon' => 'lnr lnr-text-align-center',
                    ],
                    'flex-end' => [
                        'title' => esc_html_x('Right', 'dental-care', 'dental-care'),
                        'icon' => 'lnr lnr-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-box-icon' => 'justify-content: {{VALUE}}',
                ],
                'description' => esc_html__('Choose title alignment.', 'dental-care'),
            ]
        );

        $this->add_control(
            'icon_font_size',
            [
                'label' => esc_html_x('Icon Font Size', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'selectors' => [
                    '{{WRAPPER}} .icon-box-icon' => 'font-size: {{VALUE}}px',
                ]
            ]
        );


        $this->add_control(
            'icon_bg_select',
            [
                'label' => esc_html__('Background Type', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                "options" => array(
                    "" => "",
                    "circle" => "Circle",
                    "square" => "Square",
                ),
            ]
        );
        $this->add_control(
            'icon_bg_color',
            [
                'label' => esc_html_x('Icon Background Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'icon_bg_select' => [
                        'circle',
                        'square',
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-box-icon' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .icon-box-icon' => 'padding: 10px',
                ]
            ]
        );

        $this->add_control(
            'icon_position_select',
            [
                'label' => esc_html__('Icon Position', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                'condition' => [
                    'icon_box_design' => 'design_one',
                ],
                "options" => array(
                    "icon_top" => "Icon Top",
                    "icon_left" => "Icon Left",
                ),
            ]
        );

        $this->add_control(
            'icon_position2_select',
            [
                'label' => esc_html__('Icon Position', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                'condition' => [
                    'icon_box_design' => 'design_two',
                ],
                "options" => array(
                    "icon_right" => "Icon Right",
                    "icon_left" => "Icon Left",
                ),

            ]
        );

        $this->add_control(
            'icon_hover_color',
            [
                'label' => esc_html_x('Icon Hover Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .stronghold-icon-box-front:hover .icon-box-icon' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'icon_hover_bgcolor',
            [
                'label' => esc_html_x('Icon Hover Background Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .stronghold-icon-box-front:hover .icon-box-icon' => 'background-color: {{VALUE}}',
                ]
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'section_icon_box_content_style',
            [
                'label' => esc_html__('Icon Box Content Styling', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'icon_title_front_typography',
                'label' => esc_html_x('Title Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .stronghold-info-icon-title-element',
            ]
        );
        $this->add_responsive_control(
            'icon_title_alignment',
            [
                'label' => esc_html_x('Title Alignment', 'dental-care'),
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
                    '{{WRAPPER}} .stronghold-info-icon-title-element' => 'text-align: {{VALUE}}',
                ],
                'description' => esc_html__('Choose title alignment.', 'dental-care'),
            ]
        );
        $this->add_control(
            'icon_title_color_front',
            [
                'label' => esc_html_x('Title Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .stronghold-info-icon-title-element' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'icon_desc_front_typography',
                'label' => esc_html_x('Description Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .stronghold-info-icon-desc',
            ]
        );
        $this->add_responsive_control(
            'icon_desc_alignment',
            [
                'label' => esc_html_x('Description Alignment', 'dental-care'),
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
                    '{{WRAPPER}} .stronghold-info-icon-desc' => 'text-align: {{VALUE}}',
                ],
                'description' => esc_html__('Choose description alignment.', 'dental-care'),
            ]
        );
        $this->add_control(
            'icon_desc_color_front',
            [
                'label' => esc_html_x('Description Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .stronghold-info-icon-desc' => 'color: {{VALUE}}',
                ]
            ]
        );


        $this->add_control(
            'icon_box_title_hover_color',
            [
                'label' => esc_html_x('Title Hover Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .stronghold-icon-box-wrapper:hover .stronghold-info-icon-title-element' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'icon_box_desc_hover_color',
            [
                'label' => esc_html_x('Description Hover Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .stronghold-icon-box-wrapper:hover .stronghold-info-icon-desc' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'icon_read_more_color',
            [
                'label' => esc_html_x('Link Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon-box-read-more' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'icon_read_more_hover_color',
            [
                'label' => esc_html_x('Link Hover Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon-box-read-more:hover' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'icon_read_more_typography',
                'label' => esc_html_x('Link Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .icon-box-read-more',
            ]
        );
        $this->add_responsive_control(
            'icon_read_more_alignment',
            [
                'label' => esc_html_x('Link Alignment', 'dental-care'),
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
                    '{{WRAPPER}} .icon-box-read-more' => 'text-align: {{VALUE}}',
                ],
                'description' => esc_html__('Choose link alignment.', 'dental-care'),
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

        $allowed_html = $this->dental_care_extensions_allowed_html();

        $link_url = $settings['icon_link']['url'];

        echo '<div class="single-icon-box';

        if ($settings['icon_translate_en'] == true) {
            echo ' icon-box-translate ';
        }

        if ($settings['icon_box_design'] == 'design_one') {
            echo ' icon-box-design-one';
        } 

        echo ' stronghold-icon-box-wrapper icon-box-no-rotate" style="';
        if ($settings['icon_link_select'] == 'box') :
            echo 'cursor: pointer;';
        endif;

        echo '"';

        if ($settings['icon_link_select'] == 'box') :
            if ($link_url != '') :
                echo ' onclick="javascript:location.href=\'' . esc_attr($link_url) . '\'"';
            endif;
        endif;

        if ($settings['icon_box_onclick'] != '') :
          echo ' onclick="'.esc_attr($settings['icon_box_onclick']).'"';
      endif;

      echo '>';

      if ($settings['icon_box_design'] == 'design_one' || $settings['icon_box_design'] == '') {

        if ($settings['icon_position_select'] == 'icon_left') {

            echo '<div class="stronghold-info-icon-content-front icon-box-left" style="text-align: left;">';

            echo '<div class="stronghold-icon-box-front';

            echo '" style="padding: 15px; ';
            // if ($settings['icon_flip_en'] == true || $settings['icon_flip_en'] == '') :
            //     echo 'transform: none;';
            // endif;

            echo ' display: -webkit-flex; display: flex;';

            if ($settings['box_shadow_en'] == true) {
                echo ' box-shadow: 0px 8px 11px 4px rgba(158, 158, 158, 0.1); -webkit-box-shadow: 0px 8px 11px 4px rgba(158, 158, 158, 0.1);';
                echo ' -moz-transition: all .4s ease-in-out; -webkit-transition: all .4s ease-in-out; -o-transition: all .4s ease-in-out; transition: all .4s ease-in-out;';
            }


            echo '"';

            echo '>';

            if ($settings['icon_box_bg_hover_color_front'] != '') {

                echo '<div class="iconbox-overlay" style="';

                if ($settings['box_shadow_en'] != false) {
                    echo ' box-shadow: 0px 8px 11px 4px rgba(158, 158, 158, 0.1); -webkit-box-shadow: 0px 8px 11px 4px rgba(158, 158, 158, 0.1);';
                    echo ' -moz-transition: all .4s ease-in-out; -webkit-transition: all .4s ease-in-out; -o-transition: all .4s ease-in-out; transition: all .4s ease-in-out;';
                    echo ' border: 1px solid #F4F4F4;';
                }


                echo '"></div>';
            }

            echo '<span class="stronghold-info-icon';

            if ($settings['icon_zoom_en'] == true) {
                echo ' icon-box-zoom';
            }

            echo '">';


            if ($settings['icon_source'] == 'icon_library') {

                if ($settings['icon_select']['library'] == 'svg') {

                    echo '<div class="icon-box-svg">';
                    echo file_get_contents(esc_attr($settings['icon_select']['value']['url']));
                    echo '</div>';
                } else {

                    echo '<i class="icon-box-icon ';

                    if ($settings['icon_select']['value']) {
                        echo esc_attr($settings['icon_select']['value']);
                    }

                    echo '" style="';

                    if ($settings['icon_bg_color'] != '') :
                        echo ' background:' . esc_attr($settings['icon_bg_color']) . ';';
                        echo ' height: ' . esc_attr($settings['icon_font_size'] * 1.8) . 'px !important;';
                        echo ' line-height: ' . esc_attr($settings['icon_font_size'] * 1.8) . 'px !important;';
                        echo ' width: ' . esc_attr($settings['icon_font_size'] * 1.8) . 'px !important;';
                        echo ' padding: 0px !important;';

                        if ($settings['icon_bg_select'] == 'circle') :
                            echo ' border-radius: 50%;';
                        endif;
                    endif;

                    echo '"></i>';
                }
            } elseif ($settings['icon_source'] == 'icon_theme') {

                echo '<i class="icon-box-icon ';

                if ($settings['icon_select_custom'] != '') {
                    echo esc_attr($settings['icon_select_custom']);
                }

                echo '" style="';

                if ($settings['icon_bg_color'] != '') :
                    echo ' background:' . esc_attr($settings['icon_bg_color']) . ';';
                    echo ' height: ' . esc_attr($settings['icon_font_size'] * 1.8) . 'px !important;';
                    echo ' line-height: ' . esc_attr($settings['icon_font_size'] * 1.8) . 'px !important;';
                    echo ' width: ' . esc_attr($settings['icon_font_size'] * 1.8) . 'px !important;';
                    echo ' padding: 0px !important;';

                    if ($settings['icon_bg_select'] == 'circle') :
                        echo ' border-radius: 50%;';
                    endif;
                endif;

                echo '"></i>';
            }

            echo '</span>';

            echo '<div class="stronghold-content-wrap" style=" ">';
            echo '<div class="stronghold-info-icon-title">';
            echo '<h4 class="stronghold-info-icon-title-element" style="';

            echo '">' . wp_kses($settings['icon_title_front'], $allowed_html) . ' </h4>';

            echo '</div>';
            echo '<div class="stronghold-info-icon-desc">';
            echo '<p style="';

            echo '">' . wp_kses($settings['icon_desc_front'], $allowed_html) . ' </p>';
            echo '</div>';

            if($settings['icon_link_select'] == 'read_more'){
                if($settings['icon_link_read'] != ''){
                    echo '<a class="icon-box-read-more" href="'.esc_url($link_url).'">'.esc_html($settings["icon_link_read"]).'</a>';
                }else{
                    echo '<a class="icon-box-read-more" href="'.esc_url($link_url).'">'.esc_html__("Learn More", "dental-care").'</a>';
                }
            }

            echo '</div>';
            echo '</div>';

            echo '</div>';
        } else {

            echo '<div class="stronghold-icon-box-front';

            echo '" style="';

            if ($settings['box_shadow_en'] == true) {
                echo ' box-shadow: 0px 8px 11px 4px rgba(158, 158, 158, 0.1); -webkit-box-shadow: 0px 8px 11px 4px rgba(158, 158, 158, 0.1);';
                echo ' -moz-transition: all .4s ease-in-out; -webkit-transition: all .4s ease-in-out; -o-transition: all .4s ease-in-out; transition: all .4s ease-in-out;';
            }

            echo '"';

            echo '>';

            if ($settings['icon_box_bg_hover_color_front'] != '') {

                echo '<div class="iconbox-overlay" style="';

                if ($settings['box_shadow_en'] == true) {
                    echo ' box-shadow: 0px 8px 11px 4px rgba(158, 158, 158, 0.1); -webkit-box-shadow: 0px 8px 11px 4px rgba(158, 158, 158, 0.1);';
                    echo ' -moz-transition: all .4s ease-in-out; -webkit-transition: all .4s ease-in-out; -o-transition: all .4s ease-in-out; transition: all .4s ease-in-out;';
                    echo ' border: 1px solid #F4F4F4;';
                }

                echo '"></div>';
            }


            echo '<div class="stronghold-info-icon';

            if ($settings['icon_zoom_en'] == true) {
                echo ' icon-box-zoom';
            }

            echo '">';


            if ($settings['icon_source'] == 'icon_library') {

                if ($settings['icon_select']['library'] == 'svg') {

                    echo '<div class="icon-box-svg">';
                    echo file_get_contents(esc_attr($settings['icon_select']['value']['url']));
                    echo '</div>';
                } else {

                    echo '<i class="icon-box-icon ';

                    if ($settings['icon_select']['value']) {
                        echo esc_attr($settings['icon_select']['value']);
                    }

                    echo '" style="';

                    if ($settings['icon_bg_color'] != '') :
                        echo ' background:' . esc_attr($settings['icon_bg_color']) . ';';
                        echo ' height: ' . esc_attr($settings['icon_font_size'] * 1.8) . 'px !important;';
                        echo ' line-height: ' . esc_attr($settings['icon_font_size'] * 1.8) . 'px !important;';
                        echo ' width: ' . esc_attr($settings['icon_font_size'] * 1.8) . 'px !important;';
                        echo ' padding: 0px !important;';

                        if ($settings['icon_bg_select'] == 'circle') :
                            echo ' border-radius: 50%;';
                        endif;
                    endif;

                    echo '"></i>';
                }
            } elseif ($settings['icon_source'] == 'icon_theme') {

                echo '<i class="icon-box-icon ';

                if ($settings['icon_select_custom'] != '') {
                    echo esc_attr($settings['icon_select_custom']);
                }

                echo '" style="';

                if ($settings['icon_bg_color'] != '') :
                    echo ' background:' . esc_attr($settings['icon_bg_color']) . ';';
                    echo ' height: ' . esc_attr($settings['icon_font_size'] * 1.8) . 'px !important;';
                    echo ' line-height: ' . esc_attr($settings['icon_font_size'] * 1.8) . 'px !important;';
                    echo ' width: ' . esc_attr($settings['icon_font_size'] * 1.8) . 'px !important;';
                    echo ' padding: 0px !important;';

                    if ($settings['icon_bg_select'] == 'circle') :
                        echo ' border-radius: 50%;';
                    endif;
                endif;

                echo '"></i>';
            }

            echo '</div>';

            echo '<div class="stronghold-info-icon-content-front" style="">';
            echo '<div class="stronghold-info-icon-title" style="margin-bottom: 15px;">';
            echo '<h4 class="stronghold-info-icon-title-element" style="';

            echo '">' . wp_kses($settings['icon_title_front'], $allowed_html) . ' </h4>';

            echo '</div>';
            echo '<div class="stronghold-info-icon-desc">';
            echo '<p style="';

            echo '">' . wp_kses($settings['icon_desc_front'], $allowed_html) . ' </p>';
            echo '</div>';

            if($settings['icon_link_select'] == 'read_more'){
                if($settings['icon_link_read'] != ''){
                    echo '<a class="icon-box-read-more" href="'.esc_url($link_url).'">'.esc_html($settings["icon_link_read"]).'</a>';
                }else{
                    echo '<a class="icon-box-read-more" href="'.esc_url($link_url).'">'.esc_html__("Learn More", "dental-care").'</a>';
                }
            }


            echo '</div>';

            echo '</div>';
        }
    } 
    
    echo '</div>';
}
}
