<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Feature Box
 */

class Dental_Care_Feature_Box extends Widget_Base
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
        return 'dental-care-feature-box';
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
        return esc_html__('Feature Box', 'dental-care');
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
        return 'eicon-image-box';
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
            'section_feature_box_settings',
            [
                'label' => esc_html__('Feature Box Settings', 'dental-care'),
            ]
        );

        $this->add_control(
            'feature_box_img',
            [
                'label' => __('Feature Box Image', 'dental-care'),
                'type' => Controls_Manager::MEDIA,
                'description' => __('Choose an image for the feature box', 'dental-care'),
                'dynamic' => [
                    'active' => true,
                ],                
            ]
        );


        $this->add_control(
            'feature_box_design',
            [
                'label' => esc_html__('Feature Box Design', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                "options" => array(
                    "" => "",
                    "design_one" => "Design One",
                ),
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'section_feature_box_icon_settings',
            [
                'label' => esc_html__('Feature Box Icon', 'dental-care'),
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
            'section_feature_box_content_settings',
            [
                'label' => esc_html__('Feature Box Content', 'dental-care'),
            ]
        );

        $this->add_control(
            'feature_title',
            [
                'label' => esc_html_x('Title', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );
        $this->add_control(
            'feature_desc',
            [
                'label' => esc_html__('Description', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );


        $this->add_control(
            'feature_link',
            [
                'label' => esc_html__('Feature Box Link', 'dental-care'),
                'type' => Controls_Manager::URL,
                'placeholder' => 'http://your-link.com',
                'description' => __('Choose a link for the feature box.', 'dental-care'),
                'default' => [
                    'url' => '',
                ],
            ]
        );

        $this->add_control(
            'feature_link_title',
            [
                'label' => esc_html__('Feature Box Link Title', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__('Read More', 'dental-care'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_feature_box_style',
            [
                'label' => esc_html__('Feature Box Styling', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'feature_box_bg_color',
            [
                'label' => esc_html_x('Background Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose a background color.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .feature-box-design-one .feature-box-info-wrapper' => 'background-color: {{VALUE}}',
                ]
            ]
        );


        $this->add_control(
            'feature_box_box_shadow_en',
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
            'feature_box_translate_en',
            [
                'label' => esc_html__('Enable Translate on Hover', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'description' => __('Choose to enable/disable icon box translate on hover.', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'return_value' => 'true',
            ]
        );


        $this->add_control(
            'feature_box_padding',
            [
                'label' => esc_html__('Feature Box Padding', 'dental-care'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .feature-box-design-one .feature-box-info-wrapper' => '
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
                    '{{WRAPPER}} .feature-box-design-one .feature-box-info-wrapper' => 'border-color: {{VALUE}}',

                ]
            ]
        );

        $this->add_control(
            'border_width',
            [
                'label' => esc_html_x('Border Width (px)', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'selectors' => [
                    '{{WRAPPER}} .feature-box-design-one .feature-box-info-wrapper' => 'border-width: {{VALUE}}px',

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
                    '{{WRAPPER}} .feature-box-design-one .feature-box-info-wrapper' => 'border-style: {{VALUE}}',

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
                    '{{WRAPPER}} .feature-box-design-one .feature-box-info-wrapper' => 'border-bottom-right-radius: {{VALUE}}px; border-bottom-left-radius: {{VALUE}}px;',
                    '{{WRAPPER}} .feature-box-design-one .feature-box-img' => 'border-top-right-radius: {{VALUE}}px; border-top-left-radius: {{VALUE}}px;',

                ]
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'section_feature_box_icon_style',
            [
                'label' => esc_html__('Feature Box Icon Styling', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html_x('Icon Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-box-icon-element' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'icon_bgcolor',
            [
                'label' => esc_html_x('Icon Background Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-box-icon-element' => 'background-color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'icon_hover_color',
            [
                'label' => esc_html_x('Icon Hover Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .stronghold-feature-box-wrapper:hover .feature-box-icon-element' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'icon_hover_bgcolor',
            [
                'label' => esc_html_x('Icon Background Hover Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .stronghold-feature-box-wrapper:hover .feature-box-icon-element' => 'background-color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'icon_font_size',
            [
                'label' => esc_html_x('Icon Font Size(px)', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'selectors' => [
                    '{{WRAPPER}} .stronghold-feature-box-wrapper .feature-box-icon-element' => 'font-size: {{VALUE}}px',
                ]
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_feature_box_icon_svg_style',
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
                    '{{WRAPPER}} .feature-box-svg svg' => 'fill: {{VALUE}}; stroke: {{VALUE}}',
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
                    '{{WRAPPER}} .feature-box-svg svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
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
            'section_feature_box_content_style',
            [
                'label' => esc_html__('Feature Box Content Styling', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html_x('Title Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .feature-box-title-element',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => esc_html_x('Title Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-box-title-element' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typography',
                'label' => esc_html_x('Description Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .feature-box-desc',
            ]
        );
        $this->add_control(
            'desc_color',
            [
                'label' => esc_html_x('Description Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-box-desc' => 'color: {{VALUE}}',
                ]
            ]
        );


        $this->add_control(
            'title_hover_color',
            [
                'label' => esc_html_x('Title Hover Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .stronghold-feature-box-wrapper:hover .feature-box-title-element' => 'color: {{VALUE}}',
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

        $link_url = $settings['feature_link']['url'];
        $link_target = $settings['feature_link']['is_external'];
        $link_rel = $settings['feature_link']['nofollow'];

        if(isset($settings['feature_box_img']['url'])){
            $feature_box_img_src = $settings['feature_box_img']['url'];
        }



        echo '<div class="stronghold-feature-box-wrapper ';

        if($settings['feature_box_translate_en'] == true){
            echo ' feature-box-translate ';
        }


        echo '" style="';

        if ($settings['feature_box_design'] == 'design_one') {
            echo ' overflow: initial;';
        }
        

        echo '">';

        if ($settings['feature_box_design'] == 'design_one' || $settings['feature_box_design'] == '') {

            echo ' <div class="feature-box-design-one">';

            echo '<div class="icon-wrapper ';

            echo '">';


            if ($settings['icon_source'] == 'icon_library') {

                if ($settings['icon_select']['library'] == 'svg') {

                    echo '<div class="feature-box-svg">';
                    echo file_get_contents(esc_attr($settings['icon_select']['value']['url']));
                    echo '</div>';
                } else {

                    echo '<i class="feature-box-icon-element ';

                    if ($settings['icon_select']['value']) {
                        echo esc_attr($settings['icon_select']['value']);
                    }

                    echo '"></i>';
                }
            } elseif ($settings['icon_source'] == 'icon_theme') {

                echo '<i class="feature-box-icon-element ';

                if ($settings['icon_select_custom'] != '') {
                    echo esc_attr($settings['icon_select_custom']);
                }

                echo '"></i>';
            }


            echo '</div>';

            if($feature_box_img_src != ''){
                echo '<div class="feature-box-img">'; 

                if ($link_url != '') {
                    echo '<a href="' . esc_url($link_url) . '">';
                }


                echo '<img src="' . esc_html($feature_box_img_src) . '" alt="Feature Image">';

                if ($link_url != '') {
                    echo '</a>';
                }

                echo '</div>';
            }

            echo '<div class="feature-box-info-wrapper" style="';

            if ($settings['feature_box_box_shadow_en'] == true) {
              echo ' box-shadow: 0px 8px 11px 4px rgba(158, 158, 158, 0.1); -webkit-box-shadow: 0px 8px 11px 4px rgba(158, 158, 158, 0.1);';
          }

          echo '">';

          echo '<div class="feature-box-title">';
          if ($link_url == '') {
            echo '<h5 class="feature-box-title-element" style="">';

            echo esc_html($settings['feature_title']) . '</h5>';
        } else {
            echo '<a class="feature-box-title-element" href="' . esc_url($link_url) . '"><h5 class="feature-box-title-element" style="';

            echo '">';

            echo esc_html($settings['feature_title']) . '</h5></a>';
        }
        echo '</div>';

        echo '<div class="feature-box-desc" style="';
        
        echo '">';

        echo esc_html($settings['feature_desc']);
        
        echo '</div>';

        echo '</div>';

        echo '</div>';
    }

    echo '</div>';


}
}
