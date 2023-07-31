<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Flip Icon Box
 */

class Dental_Care_Flip_Icon_Box extends Widget_Base
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
        return 'dental-care-flip-icon-box';
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
        return esc_html__('Flip Icon Box', 'dental-care');
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
        return 'eicon-flip-box';
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
            'section_flip_icon_box_settings',
            [
                'label' => esc_html__('Flip Icon Box Settings', 'dental-care'),
            ]
        );


        $this->add_control(
            'flip_direction',
            [
                'label' => esc_html__('Flip Direction', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                "options" => array(
                    "" => "",
                    "horizontal" => "Horizontal",
                    "vertical" => "Vertical",
                ),
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'section_flip_icon_box_icon_settings',
            [
                'label' => esc_html__('Flip Icon Box Icon', 'dental-care'),
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
            'section_flip_icon_box_content_settings',
            [
                'label' => esc_html__('Flip Icon Box Content', 'dental-care'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html_x('Title', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );
        $this->add_control(
            'desc',
            [
                'label' => esc_html__('Description', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );


        $this->add_control(
            'flip_link',
            [
                'label' => esc_html__('Fip Icon Box Link', 'dental-care'),
                'type' => Controls_Manager::URL,
                'placeholder' => 'http://your-link.com',
                'description' => __('Choose a link for the flip icon box.', 'dental-care'),
                'default' => [
                    'url' => '',
                ],
            ]
        );

        $this->add_control(
            'flip_link_title',
            [
                'label' => esc_html__('Flip Icon Box Link Title', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__('Read More', 'dental-care'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_flip_icon_box_style',
            [
                'label' => esc_html__('Flip Icon Box Styling', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'box_height',
            [
                'label' => esc_html_x('Flip Icon Box Height (px)', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'selectors' => [
                    '{{WRAPPER}} .stronghold-flip-icon-box-wrapper' => 'height: {{VALUE}}px',
                ]
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
            'icon_box_padding',
            [
                'label' => esc_html__('Icon Box Padding', 'dental-care'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .flip-icon-box-front' => '
                    padding-top: {{TOP}}{{UNIT}}; 
                    padding-right: {{RIGHT}}{{UNIT}}; 
                    padding-bottom: {{BOTTOM}}{{UNIT}}; 
                    padding-left:{{LEFT}}{{UNIT}};',
                ]

            ]
        );

        $this->add_control(
            'border_color',
            [
                'label' => esc_html_x('Border Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose a border color.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .flip-icon-box-front' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .flip-icon-box-back' => 'border-color: {{VALUE}}',

                ]
            ]
        );

        $this->add_control(
            'border_width',
            [
                'label' => esc_html_x('Border Width (px)', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'selectors' => [
                    '{{WRAPPER}} .flip-icon-box-front' => 'border-width: {{VALUE}}px',
                    '{{WRAPPER}} .flip-icon-box-back' => 'border-width: {{VALUE}}px',

                ]
            ]
        );

        $this->add_control(
            'border_style',
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
                    '{{WRAPPER}} .flip-icon-box-front' => 'border-style: {{VALUE}}',
                    '{{WRAPPER}} .flip-icon-box-back' => 'border-style: {{VALUE}}',

                ]
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label' => esc_html_x('Border Radius (px)', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Choose a border radius.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .flip-icon-box-front' => 'border-radius: {{VALUE}}px',
                    '{{WRAPPER}} .flip-icon-box-back' => 'border-radius: {{VALUE}}px',

                ]
            ]
        );

        $this->add_control(
            'bg_color_front',
            [
                'label' => esc_html_x('Front Background Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose a background color or combine it with an image as an overlay.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .flip-icon-box-front' => 'background-color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'bg_img_front',
            [
                'label' => __('Front Background Image', 'dental-care'),
                'type' => Controls_Manager::MEDIA,
                'description' => __('Choose an image for the background', 'dental-care'),
                'dynamic' => [
                    'active' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .flip-icon-box-front' => 'background-image: url({{URL}})',
                ]
            ]
        );

        $this->add_control(
            'bg_color_back',
            [
                'label' => esc_html_x('Back Background Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose a background color or combine it with an image as an overlay.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .flip-icon-box-back' => 'background-color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'bg_img_back',
            [
                'label' => __('Back Background Image', 'dental-care'),
                'type' => Controls_Manager::MEDIA,
                'description' => __('Choose an image for the background', 'dental-care'),
                'dynamic' => [
                    'active' => true,
                ],
                'selectors' => [
                    '{{WRAPPER}} .flip-icon-box-back' => 'background-image: url({{URL}})',
                ]
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'section_flip_icon_box_icon_style',
            [
                'label' => esc_html__('Flip Icon Box Icon Styling', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html_x('Icon Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flip-icon-box-icon-element' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'icon_font_size',
            [
                'label' => esc_html_x('Icon Font Size(px)', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'selectors' => [
                    '{{WRAPPER}} .flip-icon-box-icon-element' => 'font-size: {{VALUE}}px',
                ]
            ]
        );

        $this->add_control(
            'icon_hover_color',
            [
                'label' => esc_html_x('Icon Hover Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .stronghold-flip-icon-box-wrapper:hover .flip-icon-box-icon-element' => 'color: {{VALUE}}',
                ]
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_flip_icon_svg_style',
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
                    '{{WRAPPER}} .flip-icon-box-svg svg' => 'fill: {{VALUE}}; stroke: {{VALUE}}',
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
                    '{{WRAPPER}} .flip-icon-box-svg svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
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
            'section_flip_icon_box_content_style',
            [
                'label' => esc_html__('Flip Icon Box Content Styling', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html_x('Title Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .flip-icon-box-title-element',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => esc_html_x('Title Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flip-icon-box-title-element' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typography',
                'label' => esc_html_x('Description Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .flip-icon-box-desc',
            ]
        );
        $this->add_control(
            'desc_color',
            [
                'label' => esc_html_x('Description Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flip-icon-box-desc' => 'color: {{VALUE}}',
                ]
            ]
        );


        $this->add_control(
            'title_hover_color',
            [
                'label' => esc_html_x('Title Hover Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .stronghold-flip-icon-box-wrapper:hover .flip-icon-box-title-element' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'desc_hover_color',
            [
                'label' => esc_html_x('Description Hover Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .stronghold-flip-icon-box-wrapper:hover .flip-icon-box-desc' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'btn_text_color',
            [
                'label' => esc_html_x('Button Text Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flip-icon-box-btn' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'btn_bg_color',
            [
                'label' => esc_html_x('Button Background Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .flip-icon-box-btn' => 'background-color: {{VALUE}}',
                ]
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

        $link_url = $settings['flip_link']['url'];
        $link_target = $settings['flip_link']['is_external'];
        $link_rel = $settings['flip_link']['nofollow'];

        echo '<div class="stronghold-flip-icon-box-wrapper" style="';

        echo '">';

        echo '<div class="stronghold-flip-icon-box';

        if ($settings['flip_direction'] == 'vertical') {
            echo ' flip-vertical';
        } else {
            echo ' flip-horizontal';
        }

        echo '" style="';

        echo '">';

        echo '<div class="flip-icon-box-front"';


        echo ' style="';

        if ($settings['box_shadow_en'] != '' || $settings['box_shadow_en'] == true) {
            echo ' box-shadow: 0px 8px 11px 4px rgba(158, 158, 158, 0.1); -webkit-box-shadow: 0px 8px 11px 4px rgba(158, 158, 158, 0.1);';
        }


        echo '">';

        echo '<div class="flip-icon-box-icon';

        echo '">';


        if ($settings['icon_source'] == 'icon_library') {

            if ($settings['icon_select']['library'] == 'svg') {

                echo '<div class="flip-icon-box-svg">';
                echo file_get_contents(esc_attr($settings['icon_select']['value']['url']));
                echo '</div>';
            } else {

                echo '<i class="flip-icon-box-icon-element ';

                if ($settings['icon_select']['value']) {
                    echo esc_attr($settings['icon_select']['value']);
                }

                echo '"></i>';
            }
        } elseif ($settings['icon_source'] == 'icon_theme') {

            echo '<i class="flip-icon-box-icon-element ';

            if ($settings['icon_select_custom'] != '') {
                echo esc_attr($settings['icon_select_custom']);
            }

            echo '"></i>';
        }


        echo '</div>';

        echo '<div class="flip-box-content-wrap" style="';

        echo '">';
        echo '<div class="flip-icon-box-title">';
        echo '<h4 class="flip-icon-box-title-element" style="';

        echo '">' . wp_kses($settings['title'], $allowed_html) . ' </h4>';

        echo '</div>';
        echo '<div class="flip-icon-box-desc" style="';

        echo '">' . wp_kses($settings['desc'], $allowed_html);
        echo '</div>';
        echo '</div>';

        echo '</div>';


        echo '<div class="flip-icon-box-back" style="';


        if ($settings['box_shadow_en'] != '' || $settings['box_shadow_en'] == true) {
            echo ' box-shadow: 0px 8px 11px 4px rgba(158, 158, 158, 0.1); -webkit-box-shadow: 0px 8px 11px 4px rgba(158, 158, 158, 0.1);';
        }


        echo '">';

        if ($link_url != '') {
            echo '<div class="flip-icon-box-btn-wrapper">';

            echo '<a href="' . esc_url($link_url) . '"';

            if ($link_target == 'on') {
                echo ' target="_blank"';
            }

            if ($link_rel == 'on') {
                echo ' rel="nofollow"';
            }

            echo ' class="flip-icon-box-btn btn" style="';

            echo '">';

            if ($settings['flip_link_title'] != "") {
                echo esc_html($settings['flip_link_title']);
            }

            echo '</a>';

            echo '</div>';
        }

        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}
