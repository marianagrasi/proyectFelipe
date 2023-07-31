<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Custom Menu
 */

class Dental_Care_Custom_Menu extends Widget_Base
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
        return 'dental-care-custom-menu';
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
        return esc_html__('Custom Menu', 'dental-care');
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
        return 'eicon-menu-toggle';
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
            'section_menu_settings',
            [
                'label' => esc_html__('Menu Settings', 'dental-care'),
            ]
        );

        $this->add_control(
            'menu_select',
            [
                'label' => esc_html__('Menu Select', 'dental-care'),
                'type' => MenuSelect_Control::MenuSelect,
                'description' => esc_html__('Choose a menu.', 'dental-care'),
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_icon',
            [
                'label' => esc_html__('Menu Icon', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
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
            'section_menu_style',
            [
                'label' => esc_html__('Menu Style', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'menu_icon_color',
            [
                'label' => esc_html_x('Icon Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .custom-menu-icon' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'menu_icon_size',
            [
                'label' => esc_html_x('Icon Font Size', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'selectors' => [
                    '{{WRAPPER}} .custom-menu-icon' => 'font-size: {{VALUE}}px',
                ]
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_menu_svg_style',
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
                    '{{WRAPPER}} .custom-menu-svg svg' => 'fill: {{VALUE}}; stroke: {{VALUE}}',
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
                    '{{WRAPPER}} .custom-menu-svg svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
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

        $menu = $settings['menu_select'];
        $menuitems = wp_get_nav_menu_items($menu);

        if ($settings['icon_en'] == true) {
            if ($settings['icon_source'] == 'icon_library') {
                $menu_icon = $settings['icon_select']['value'];
            } else if ($settings['icon_source'] == 'icon_theme') {
                $menu_icon = $settings['icon_select_custom'];
            }
        }


        echo '<div class="dental-care-custom-menu-wrap">';
        echo '<ul class="dental-care-custom-menu" style="';

        echo '">';
        if ($menuitems != NULL) {
            foreach ($menuitems as $item) {

                echo '<li class="custom-menu-item"';

                echo '>';

                echo '<a href="' . esc_url($item->url) . '" style="';

                echo '">' . esc_html($item->title) . '</a>';


                if ($settings['icon_en'] == true || $menuicon_set == true) {

                    if ($settings['icon_en'] == true) {

                        if ($settings['icon_source'] == 'icon_library') {

                            if ($settings['icon_select']['library'] == 'svg') {

                                echo '<div class="custom-menu-svg">';
                                echo file_get_contents(esc_attr($settings['icon_select']['value']['url']));
                                echo '</div>';
                            } else {
                                
                                echo '<i class="custom-menu-icon ';
                                
                                if ($settings['icon_select']['value']) {
                                    echo esc_attr($settings['icon_select']['value']);
                                }
                                
                                echo '"></i>';
                            }

                        } else if ($settings['icon_source'] == 'icon_theme') {


                            echo '<i class="custom-menu-icon ';

                            if ($settings['icon_select_custom'] != '') {
                                echo esc_attr($settings['icon_select_custom']);
                            }
                            
                            echo '"></i>';

                        }
                    }

                }
                echo '</li>';
            }
        }

        echo '</ul>';
        echo '</div>';
    }
}
