<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Counter
 */

class Dental_Care_Counter extends Widget_Base
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
        return 'dental-care-counter';
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
        return esc_html__('Counter', 'dental-care');
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
        return 'eicon-counter';
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
            'section_counter_icon',
            [
                'label' => esc_html__('Counter Icon', 'dental-care'),
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
                    "icon_img" => "Icon Image",
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

        $this->add_control(
            'counter_img_select',
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
            'section_counter_content',
            [
                'label' => esc_html__('Counter Content', 'dental-care'),
            ]
        );

        $this->add_control(
            'icon_number',
            [
                'label' => esc_html_x('Number', 'dental-care'),
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
            'section_counter_icon_style',
            [
                'label' => esc_html__('Counter Icon', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html_x('Icon Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .stronghold-info-icon-element' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'icon_font_size',
            [
                'label' => esc_html_x('Icon Font Size', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'selectors' => [
                    '{{WRAPPER}} .stronghold-info-icon-element' => 'font-size: {{VALUE}}px',
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
                    '{{WRAPPER}} .stronghold-info-icon-element' => 'background-color: {{VALUE}}',
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
            'icon_hover_color',
            [
                'label' => esc_html_x('Icon Hover Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .stronghold-info-icon-element:hover' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'icon_hover_bgcolor',
            [
                'label' => esc_html_x('Icon Hover Background Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .stronghold-info-icon-element:hover' => 'background: {{VALUE}}; !important',
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_counter_svg_style',
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
                    '{{WRAPPER}} .counter-svg svg' => 'fill: {{VALUE}}; stroke: {{VALUE}}',
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
                    '{{WRAPPER}} .counter-svg svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
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
            'section_counter_content_style',
            [
                'label' => esc_html__('Counter Content', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'number_color',
            [
                'label' => esc_html_x('Number Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .stronghold-info-number-element' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'number_typography',
                'label' => esc_html_x('Number Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .stronghold-info-number-element',
            ]
        );

        $this->add_control(
            'desc_color',
            [
                'label' => esc_html_x('Description Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .stronghold-info-icon-desc' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typography',
                'label' => esc_html_x('Description Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .stronghold-info-icon-desc',
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

        if(isset($settings['counter_img_select']['url'])){
            $counter_img_src = $settings['counter_img_select']['url'];
        }else{
            $counter_img_src = '';
        }

        echo '<div class="stronghold-counter-wrapper" ';

        echo '>';
        if ($settings['icon_position_select'] == 'icon_left') {

            echo '<div class="stronghold-info-icon-content icon-counter-left" style="text-align: left;">';

            echo '<span class="stronghold-info-icon" style="padding-right: 20px;">';

            if ($settings['icon_en'] == true) :

                if ($settings['icon_source'] == 'icon_library') {

                    if ($settings['icon_select']['library'] == 'svg') {

                        echo '<div class="counter-svg">';
                        echo file_get_contents(esc_attr($settings['icon_select']['value']['url']));
                        echo '</div>';
                        
                    } else {

                        echo '<i class="stronghold-info-icon-element ';

                        if ($settings['icon_select']['value']) {
                            echo esc_attr($settings['icon_select']['value']);
                        }

                        echo '" style="';

                        if ($settings['icon_bg_color'] != '') :
                            echo ' background:' . esc_attr($settings['icon_bg_color']) . ';';
                            echo ' height: ' . esc_attr($settings['icon_font_size'] * 1.8) . 'px !important;';
                            echo ' line-height: ' . esc_attr($settings['icon_font_size'] * 1.8) . 'px !important;';
                            echo ' width: ' . esc_attr($settings['icon_font_size'] * 1.8) . 'px !important;';

                            if ($settings['icon_bg_select'] == 'circle') :
                                echo ' border-radius: 50%;';
                            endif;
                        endif;

                        echo '"></i>';
                    }


                } else if ($settings['icon_source'] == 'icon_theme') {

                    echo '<i class="stronghold-info-icon-element ';

                    if ($settings['icon_select_custom'] != '') {
                        echo esc_attr($settings['icon_select_custom']);
                    }

                    echo '" style="';

                    if ($settings['icon_bg_color'] != '') :
                        echo ' background:' . esc_attr($settings['icon_bg_color']) . ';';
                        echo ' height: ' . esc_attr($settings['icon_font_size'] * 1.8) . 'px !important;';
                        echo ' line-height: ' . esc_attr($settings['icon_font_size'] * 1.8) . 'px !important;';
                        echo ' width: ' . esc_attr($settings['icon_font_size'] * 1.8) . 'px !important;';

                        if ($settings['icon_bg_select'] == 'circle') :
                            echo ' border-radius: 50%;';
                        endif;
                    endif;

                    echo '"></i>';

                }

                if ($settings['icon_source'] == 'icon_img') {

                    if ($counter_img_src != NULL) {
                        echo '<div class="info-icon-img ';

                        echo '"><img src="' . esc_url($counter_img_src) . '" width="135" height="135" alt="Counter Image"/></div>';
                    }
                }

            endif;
            echo '</span>';

            echo '<div class="stronghold-content-wrap" style="">';
            echo '<div class="stronghold-info-number">';

            echo '<h4 class="stronghold-info-number-element" style="';

            echo '">';

            echo '<input type="text" value="' . esc_attr($settings['icon_number']) . '">';
            echo '<span data-from="0" data-to="' . esc_attr($settings['icon_number']) . '" class="counter-number-val"> 0 </span></h4>';

            echo '</div>';

            echo '<div class="stronghold-info-icon-desc">';
            echo '<p style="';

            echo '">' . esc_html($settings['icon_desc']) . ' </p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        } else {

            if ($settings['icon_en'] == true) {

                if ($settings['icon_source'] == 'icon_img') {

                    if ($counter_img_src != NULL) {
                        echo '<div class="counter-img"><img src="' . esc_url($counter_img_src) . '" width="135" height="135" alt="Counter Image"/></div>';
                    }
                }

                if ($settings['icon_source'] == 'icon_library' || $settings['icon_source'] == 'icon_theme') {

                    echo '<div class="stronghold-info-icon">';

                    if ($settings['icon_source'] == 'icon_library') {

                        if ($settings['icon_select']['library'] == 'svg') {

                            echo '<div class="counter-svg">';
                            echo file_get_contents(esc_attr($settings['icon_select']['value']['url']));
                            echo '</div>';
                            
                        } else {
    
                            echo '<i class="stronghold-info-icon-element ';
    
                            if ($settings['icon_select']['value']) {
                                echo esc_attr($settings['icon_select']['value']);
                            }
    
                            echo '" style="';
    
                            if ($settings['icon_bg_color'] != '') :
                                echo ' background:' . esc_attr($settings['icon_bg_color']) . ';';
                                echo ' height: ' . esc_attr($settings['icon_font_size'] * 1.8) . 'px !important;';
                                echo ' line-height: ' . esc_attr($settings['icon_font_size'] * 1.8) . 'px !important;';
                                echo ' width: ' . esc_attr($settings['icon_font_size'] * 1.8) . 'px !important;';
    
                                if ($settings['icon_bg_select'] == 'circle') :
                                    echo ' border-radius: 50%;';
                                endif;
                            endif;
    
                            echo '"></i>';
                        }


                    } else if ($settings['icon_source'] == 'icon_theme') {

                        echo '<i class="stronghold-info-icon-element ';

                        if ($settings['icon_select_custom'] != '') {
                            echo esc_attr($settings['icon_select_custom']);
                        }
    
                        echo '" style="';
    
                        if ($settings['icon_bg_color'] != '') :
                            echo ' background:' . esc_attr($settings['icon_bg_color']) . ';';
                            echo ' height: ' . esc_attr($settings['icon_font_size'] * 1.8) . 'px !important;';
                            echo ' line-height: ' . esc_attr($settings['icon_font_size'] * 1.8) . 'px !important;';
                            echo ' width: ' . esc_attr($settings['icon_font_size'] * 1.8) . 'px !important;';
    
                            if ($settings['icon_bg_select'] == 'circle') :
                                echo ' border-radius: 50%;';
                            endif;
                        endif;
    
                        echo '"></i>';

                    }


                    echo '</div>';
                }
            }
            echo '<div class="stronghold-info-icon-content">';
            echo '<div class="stronghold-info-number">';

            echo '<h4 class="stronghold-info-number-element" style="';

            echo '">';

            echo '<input type="text" value="' . esc_attr($settings['icon_number']) . '">';
            echo '<span data-from="0" data-to="' . esc_attr($settings['icon_number']) . '" class="counter-number-val"> 0 </span></h4>';

            echo '</div>';

            echo '<div class="stronghold-info-icon-desc">';
            echo '<p style="';

            echo '">' . esc_html($settings['icon_desc']) . ' </p>';
            echo '</div>';
            echo '</div>';
        }

        echo '</div>';
    }
}
