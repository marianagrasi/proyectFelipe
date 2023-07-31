<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Info Icon 
 */

class Dental_Care_Info_Icon extends Widget_Base
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
        return 'dental-care-info-icon';
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
        return esc_html__('Info Icon', 'dental-care');
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
        return 'eicon-favorite';
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
    public function Dental_Care_extensions_allowed_html()
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

        return apply_filters('Dental_Care_extensions_allowed_html', $allowed);
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
            'section_icon',
            [
                'label' => esc_html__('Icon', 'dental-care'),
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
                    "icon_img" => "Icon Image",
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

        $this->add_control(
            'info_icon_img_select',
            [
                'label' => __('Use Image', 'dental-care'),
                'type' => Controls_Manager::MEDIA,
                'description' => __('Use Image instead of icon', 'dental-care'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'icon_source' => 'icon_img',
                ],
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Content', 'dental-care'),
            ]
        );

        $this->add_control(
            'icon_title',
            [
                'label' => esc_html_x('Title', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );
        $this->add_control(
            'icon_desc',
            [
                'label' => esc_html__('Description', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'section_link',
            [
                'label' => esc_html__('Link', 'dental-care'),
            ]
        );

        $this->add_control(
            'icon_link',
            [
                'label' => esc_html__('Info Link', 'dental-care'),
                'type' => Controls_Manager::URL,
                'placeholder' => 'http://your-link.com',
                'default' => [
                    'url' => '',
                ],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_Icon_style',
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
                    '{{WRAPPER}} .info-icon-element' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'icon_font_size',
            [
                'label' => esc_html_x('Icon Font Size', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'selectors' => [
                    '{{WRAPPER}} .info-icon-element' => 'font-size: {{VALUE}}px',
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
                    '{{WRAPPER}} .info-icon-element' => 'background-color: {{VALUE}}',
                ]
            ]
        );
        $this->add_control(
            'icon_position_select',
            [
                'label' => esc_html__('Icon Position', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                "options" => array(
                    "icon_top" => "Icon Top",
                    "icon_left" => "Icon Left",
                ),
            ]
        );
        $this->add_control(
            'icon_right_margin',
            [
                'label' => esc_html_x('Icon Right Margin', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'condition' => [
                    'icon_position_select' => 'icon_left'
                ],
            ]
        );
        $this->add_control(
            'icon_shadow',
            [
                'label' => esc_html__('Info Icon Box Shadow', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'return_value' => 'true',
            ]
        );
        $this->add_control(
            'icon_translate',
            [
                'label' => esc_html__('Info Icon Translate', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'return_value' => 'true',
            ]
        );
        $this->add_control(
            'icon_zoom',
            [
                'label' => esc_html__('Info Icon Zoom', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'return_value' => 'true',
            ]
        );


        $this->add_control(
            'icon_hover_color',
            [
                'label' => esc_html_x('Icon Hover Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .stronghold-info-icon-wrapper:hover .info-icon-element' => 'color: {{VALUE}}',
                ]
            ]
        );
        $this->add_control(
            'icon_hover_bgcolor',
            [
                'label' => esc_html_x('Icon Hover Background Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .stronghold-info-icon-wrapper:hover .info-icon-element' => 'background-color: {{VALUE}}',
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_info_icon_svg_style',
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
                    '{{WRAPPER}} .info-icon-svg svg' => 'fill: {{VALUE}}; stroke: {{VALUE}}',
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
                    '{{WRAPPER}} .info-icon-svg svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
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
            'section_Content_style',
            [
                'label' => esc_html__('Content', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'icon_title_typography',
                'label' => esc_html_x('Title Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .stronghold-info-icon-title-element',
            ]
        );
        $this->add_control(
            'icon_title_color',
            [
                'label' => esc_html_x('Icon Title Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .stronghold-info-icon-title-element' => 'color: {{VALUE}}',
                ]
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

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'icon_desc_typography',
                'label' => esc_html_x('Description Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .stronghold-info-icon-desc',
            ]
        );
        $this->add_control(
            'icon_desc_color',
            [
                'label' => esc_html_x('Icon Description Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .stronghold-info-icon-desc' => 'color: {{VALUE}}',
                ]
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

        $allowed_html = $this->Dental_Care_extensions_allowed_html();

        if(isset($settings['info_icon_img_select']['url'])){
            $infoicon_img_src = $settings['info_icon_img_select']['url'];
        }
        

        $link_url = $settings['icon_link']['url'];
        $link_target = $settings['icon_link']['is_external'];
        $link_rel = $settings['icon_link']['nofollow'];

        echo '<div class="stronghold-info-icon-wrapper"';

        echo '>';
        if ($settings['icon_position_select'] == 'icon_left') {

            echo '<div class="stronghold-info-icon-content info-icon-left" style="text-align: left;">';

            echo '<div class="stronghold-info-icon';


            if ($settings['icon_zoom'] == false) {
                echo ' info-icon-zoom-off';
            }

            echo '" style="';

            if ($settings['icon_right_margin'] == '') {
                echo ' margin-right: 20px;';
            } else {
                echo ' margin-right:' . esc_attr($settings['icon_right_margin']) . 'px;';
            }

            echo '">';

            if ($settings['icon_source'] == 'icon_library' || $settings['icon_source'] == 'icon_theme') {

                if ($settings['icon_source'] == 'icon_library') {

                    if ($settings['icon_select']['library'] == 'svg') {

                        echo '<div class="info-icon-svg">';
                        echo file_get_contents(esc_attr($settings['icon_select']['value']['url']));
                        echo '</div>';
                    } else {

                        echo '<div class="icon-wrapper';

                        
                        if ($settings['icon_translate'] == true) {
                            echo ' info-icon-translate';
                        }

                        echo '" style="';

                        echo '">';

                        echo '<i class="info-icon-element ' . esc_attr($settings['icon_select']['value']);

                        if ($settings['icon_shadow'] == true) {
                            echo ' info-icon-box-shadow';
                        }

                        echo '"';

                        echo '" style="';


                        if ($settings['icon_bg_color'] != '') :
                            echo ' height: ' . esc_attr($settings['icon_font_size'] * 2.0) . 'px !important;';
                            echo ' line-height: ' . esc_attr(($settings['icon_font_size'] * 2.0)) . 'px !important;';
                            echo ' width: ' . esc_attr($settings['icon_font_size'] * 2.0) . 'px !important;';
                            echo ' border-radius: 6px;';
                            echo ' padding: 0px !important;';

                            if ($settings['icon_bg_select'] == 'circle') :
                                echo ' border-radius: 50%;';
                            endif;
                        endif;

                        echo '"></i>';

                        echo '</div>';
                    }
                } else if ($settings['icon_source'] == 'icon_theme') {

                    echo '<div class="icon-wrapper';

                    if ($settings['icon_translate'] == true) {
                        echo ' info-icon-translate';
                    }                       

                    echo '" style="';

                    echo '">';

                    echo '<i class="info-icon-element ' . esc_attr($settings['icon_select_custom']);

                    if ($settings['icon_shadow'] == true) {
                        echo ' info-icon-box-shadow';
                    }


                    echo '"';

                    echo '" style="';


                    if ($settings['icon_bg_color'] != '') :
                        echo ' height: ' . esc_attr($settings['icon_font_size'] * 2.0) . 'px !important;';
                        echo ' line-height: ' . esc_attr(($settings['icon_font_size'] * 2.0)) . 'px !important;';
                        echo ' width: ' . esc_attr($settings['icon_font_size'] * 2.0) . 'px !important;';
                        echo ' border-radius: 6px;';
                        echo ' padding: 0px !important;';

                        if ($settings['icon_bg_select'] == 'circle') :
                            echo ' border-radius: 50%;';
                        endif;
                    endif;

                    echo '"></i>';

                    echo '</div>';
                }
                
            } else if ($settings['icon_source'] == 'icon_img') {

                if ($infoicon_img_src != NULL) {
                    echo '<div class="info-icon-img ';

                    echo '"><img src="' . esc_url($infoicon_img_src) . '" width="135" height="135" alt="Counter Image"/></div>';
                }
            }

            echo '</div>';

            echo '<div class="stronghold-content-wrap">';
            echo '<div class="stronghold-info-icon-title">';
            if ($link_url == '') {
                echo '<h4 class="stronghold-info-icon-title-element" style=" ';

                echo '">';

                echo wp_kses($settings['icon_title'], $allowed_html) . '</h4>';
            } else {
                echo '<a href="' . esc_url($link_url) . '"';

                if ($link_target == 'on') {
                    echo ' target="_blank"';
                }

                if ($link_rel == 'on') {
                    echo ' rel="nofollow"';
                }

                echo '><h4 class="stronghold-info-icon-title-element" style="';

                echo '">';

                echo wp_kses($settings['icon_title'], $allowed_html) . '</h4></a>';
            }
            echo '</div>';

            if ($settings['icon_desc'] != '') {
                echo '<div class="stronghold-info-icon-desc">';
                echo '<p style="';

                echo '">' . wp_kses($settings['icon_desc'], $allowed_html) . ' </p>';
                echo '</div>';
            }
            echo '</div>';
            echo '</div>';
        } else {

            echo '<div class="stronghold-info-icon';

            if ($settings['icon_zoom'] == false) {
                echo ' info-icon-zoom-off';
            }

            echo '">';


            if ($settings['icon_source'] == 'icon_library' || $settings['icon_source'] == 'icon_theme') {

                if ($settings['icon_source'] == 'icon_library') {

                    if ($settings['icon_select']['library'] == 'svg') {

                        echo '<div class="info-icon-svg">';
                        echo file_get_contents(esc_attr($settings['icon_select']['value']['url']));
                        echo '</div>';
                    } else {

                        echo '<div class="icon-wrapper';

                        if ($settings['icon_translate'] == true) {
                            echo ' info-icon-translate';
                        }

                        echo '" style="';

                        echo ' margin: 0 auto;';
                        
                        echo '">';

                        echo '<i class="info-icon-element ' . esc_attr($settings['icon_select']['value']);

                        if ($settings['icon_shadow'] == true) {
                            echo ' info-icon-box-shadow';
                        }

                        echo '"';

                        echo '" style="';


                        if ($settings['icon_bg_color'] != '') :
                            echo ' height: ' . esc_attr($settings['icon_font_size'] * 2.0) . 'px !important;';
                            echo ' line-height: ' . esc_attr(($settings['icon_font_size'] * 2.0)) . 'px !important;';
                            echo ' width: ' . esc_attr($settings['icon_font_size'] * 2.0) . 'px !important;';
                            echo ' border-radius: 6px;';
                            echo ' padding: 0px !important;';

                            if ($settings['icon_bg_select'] == 'circle') :
                                echo ' border-radius: 50%;';
                            endif;
                        endif;

                        echo '"></i>';
                        echo '</div>';
                    }
                } else if ($settings['icon_source'] == 'icon_theme') {

                    echo '<div class="icon-wrapper';

                    if ($settings['icon_translate'] == true) {
                        echo ' info-icon-translate';
                    }

                    echo '" style="';

                    echo ' margin: 0 auto;';

                    echo '">';

                    echo '<i class="info-icon-element ' . esc_attr($settings['icon_select_custom']);

                    if ($settings['icon_shadow'] == true) {
                        echo ' info-icon-box-shadow';
                    }

                    echo '"';

                    echo '" style="';


                    if ($settings['icon_bg_color'] != '') :
                        echo ' height: ' . esc_attr($settings['icon_font_size'] * 2.0) . 'px !important;';
                        echo ' line-height: ' . esc_attr(($settings['icon_font_size'] * 2.0)) . 'px !important;';
                        echo ' width: ' . esc_attr($settings['icon_font_size'] * 2.0) . 'px !important;';
                        echo ' border-radius: 6px;';
                        echo ' padding: 0px !important;';

                        if ($settings['icon_bg_select'] == 'circle') :
                            echo ' border-radius: 50%;';
                        endif;
                    endif;

                    echo '"></i>';
                    echo '</div>';
                }
                
            } else if ($settings['icon_source'] == 'icon_img') {

                if ($infoicon_img_src != NULL) {
                    echo '<div class="info-icon-img ';

                    if ($settings['icon_shadow'] == true) {
                        echo ' info-icon-box-shadow';
                    }

                    if ($settings['icon_translate'] == true) {
                        echo ' info-icon-translate';
                    }

                    if ($settings['icon_zoom'] == false) {
                        echo ' info-icon-zoom-off';
                    }

                    echo '"><img src="' . esc_url($infoicon_img_src) . '" width="135" height="135" alt="Counter Image"/></div>';
                }
            }

            echo '</div>';

            if ($settings['icon_title'] != "") {
                echo '<div class="stronghold-info-icon-content">';
                echo '<div class="stronghold-info-icon-title">';
                if ($link_url == '') {
                    echo '<h4 class="stronghold-info-icon-title-element" style="';

                    echo '">';

                    echo wp_kses($settings['icon_title'], $allowed_html) . '</h4>';
                } else {
                    echo '<a href="' . esc_url($link_url) . '"';

                    if ($link_target == 'on') {
                        echo ' target="_blank"';
                    }

                    if ($link_rel == 'on') {
                        echo ' rel=”nofollow”';
                    }

                    echo '><h4 class="stronghold-info-icon-title-element" style="';

                    echo '">';

                    echo wp_kses($settings['icon_title'], $allowed_html) . '</h4></a>';
                }
                echo '</div>';
                echo '<div class="stronghold-info-icon-desc">';
                echo '<p style="';

                echo '">' . wp_kses($settings['icon_desc'], $allowed_html) . ' </p>';
                echo '</div>';
                echo '</div>';
            }
        }

        echo '</div>';
    }
}
