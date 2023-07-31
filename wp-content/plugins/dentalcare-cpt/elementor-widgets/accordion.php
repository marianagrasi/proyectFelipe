<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Accordion
 */

class Dental_Care_Accordion extends Widget_Base
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
        return 'dental-care-accordion';
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
        return esc_html__('Accordion', 'dental-care');
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
        return 'eicon-accordion';
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
            'section_accordion_settings',
            [
                'label' => esc_html__('Accordion Settings', 'dental-care'),
            ]
        );

        $this->add_control(
            'accordion_main_title',
            [
                'label' => esc_html_x('Accordion Title', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => __('Enter a title for the accordion.', 'dental-care'),
            ]
        );

        $this->add_control(
            'accordion_main_tag',
            [
                'label' => esc_html__('Title Tag', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                "options" => array(
                    "" => "",
                    "h1" => "h1",
                    "h2" => "h2",
                    "h3" => "h3",
                    "h4" => "h4",
                    "h5" => "h5",
                    "h6" => "h6",
                    "p" => "p"
                ),
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'section_accordion_items',
            [
                'label' => esc_html__('Accordion Items', 'dental-care'),
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'icon_en',
            [
                'label' => esc_html__('Enable Custom Icon', 'dental-care'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'return_value' => 'true',
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
            ]
        );

        $repeater->add_control(
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

        $repeater->add_control(
            'icon_select_custom',
            [
                'label' => esc_html__('Icon', 'dental-care'),
                'type' => IconSelector_Control::IconSelector,
                'condition' => [
                    'icon_source' => 'icon_theme',
                ],
            ]
        );

        $repeater->add_control(
            'icon_select',
            [
                'label' => esc_html__('Icon', 'dental-care'),
                'type' => Controls_Manager::ICONS,
                'condition' => [
                    'icon_source' => 'icon_library',
                ],
            ]
        );

        $repeater->add_control(
            'item_title',
            [
                'label' => esc_html_x('Title', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );
        $repeater->add_control(
            'item_desc',
            [
                'label' => esc_html__('Description', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'accordion_items',
            [
                'type' => Controls_Manager::REPEATER,
                'show_label' => true,
                'fields' => $repeater->get_controls(),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_accordion_main_style',
            [
                'label' => esc_html__('Accordion Settings', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'accordion_main_typography',
                'label' => esc_html_x('Accordion Main Title Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .accordion-main-title-element',
            ]
        );

        $this->add_control(
            'accordion_main_color',
            [
                'label' => esc_html_x('Accordion Main Title Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-main-title h1' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .accordion-main-title h2' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .accordion-main-title h3' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .accordion-main-title h4' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .accordion-main-title h5' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .accordion-main-title h6' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .accordion-main-title p' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'accordion_full_bgcolor',
            [
                'label' => esc_html_x('Accordion Background Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .stronghold-accordion-wrapper' => 'background: {{VALUE}}; padding: 30px',
                ]
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'section_accordion_style',
            [
                'label' => esc_html__('Accordion Items', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html_x('Icon Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-icon' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'icon_hover_color',
            [
                'label' => esc_html_x('Icon Hover Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-item-title-area:hover .accordion-icon' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'icon_font_size',
            [
                'label' => esc_html_x('Icon Font Size', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'selectors' => [
                    '{{WRAPPER}} .accordion-icon' => 'font-size: {{VALUE}}px',
                ]
            ]
        );

        $this->add_control(
            'svg_color',
            [
                'label' => esc_html_x('SVG Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-svg svg' => 'fill: {{VALUE}}; stroke: {{VALUE}}',
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
                    '{{WRAPPER}} .accordion-svg svg' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'accordion_bgcolor',
            [
                'label' => esc_html_x('Accordion Item Background Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => __('Choose background color of accordion item.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .accordion-item-title-area' => 'background: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'accordion_titlecolor',
            [
                'label' => esc_html_x('Accordion Title Text Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => __('Choose accordion title text color.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .accordion-item-title' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'accordion_titlehovercolor',
            [
                'label' => esc_html_x('Accordion Title Text Hover Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => __('Choose accordion title text hover color.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .accordion-item:hover .accordion-item-title' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'accordion_titlebghovercolor',
            [
                'label' => esc_html_x('Accordion Title Background Hover Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => __('Choose accordion title background hover color.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .accordion-item-title-area:hover' => 'background: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'accordion_desccolor',
            [
                'label' => esc_html_x('Accordion Description Text Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => __('Choose accordion text color.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .accordion-item-content' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'accordion_box_shadow_en',
            [
                'label' => esc_html__('Enable Shadow', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'return_value' => 'true',
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

        echo '<div class="stronghold-accordion-wrapper"';

        echo '">';

        echo '<div class="accordion-main-title">';

        if ($settings['accordion_main_tag'] == 'h1') {
            echo '<h1 class="accordion-main-title-element"';
        } elseif ($settings['accordion_main_tag'] == 'h2') {
            echo '<h2 class="accordion-main-title-element"';
        } elseif ($settings['accordion_main_tag'] == 'h3') {
            echo '<h3 class="accordion-main-title-element"';
        } elseif ($settings['accordion_main_tag'] == 'h5') {
            echo '<h5 class="accordion-main-title-element"';
        } elseif ($settings['accordion_main_tag'] == 'h6') {
            echo '<h6 class="accordion-main-title-element"';
        } elseif ($settings['accordion_main_tag'] == 'p') {
            echo '<p class="accordion-main-title-element"';
        } else {
            echo '<h4 class="accordion-main-title-element"';
        }

        echo '">' . esc_html($settings['accordion_main_title']);

        if ($settings['accordion_main_tag'] == 'h1') {
            echo '</h1>';
        } elseif ($settings['accordion_main_tag'] == 'h2') {
            echo '</h2>';
        } elseif ($settings['accordion_main_tag'] == 'h3') {
            echo '</h3>';
        } elseif ($settings['accordion_main_tag'] == 'h5') {
            echo '</h5>';
        } elseif ($settings['accordion_main_tag'] == 'h6') {
            echo '</h6>';
        } elseif ($settings['accordion_main_tag'] == 'p') {
            echo '</p>';
        } else {
            echo '</h4>';
        }

        echo '</div>';


        foreach ($settings['accordion_items'] as $item) {

            $item_id = mt_rand();

            echo '<div class="accordion-item"';

            if ($settings['accordion_bgcolor'] != '' || $settings['accordion_box_shadow_en'] == true) {
                echo ' style="';
            }

            if ($settings['accordion_box_shadow_en'] == true) {
                echo ' -webkit-box-shadow: 0 0 10px rgba(0,0,0,0.08);';
                echo ' box-shadow: 0 0 10px rgba(0,0,0,0.08);';
            }

            if ($settings['accordion_bgcolor'] != '' || $settings['accordion_box_shadow_en'] == true) {
                echo '"';
            }

            echo '>';

            if ($item_id) {
                echo '<a class="accordion-item-title-area" href="#item' . esc_attr($item_id) . '" data-ll="collapsed">';


                if ($item['icon_en'] == true) {

                    if ($item['icon_source'] == 'icon_library') {

                        if ($item['icon_select']['library'] == 'svg') {

                            echo '<div class="accordion-svg">';
                            echo file_get_contents(esc_attr($item['icon_select']['value']['url']));
                            echo '</div>';
                        } else {

                            echo '<i class="accordion-icon ';

                            if ($item['icon_select']['value']) {
                                echo esc_attr($item['icon_select']['value']);
                            }

                            echo '"></i>';
                        }
                    } elseif ($item['icon_source'] == 'icon_theme') {

                        echo '<i class="accordion-icon ';

                        if ($item['icon_select_custom'] != '') {
                            echo esc_attr($item['icon_select_custom']);
                        }

                        echo '"></i>';
                    }
                }

                if ($item['item_title'] != '') {
                    echo '<h6 class="accordion-item-title">';
                    echo '' . esc_html($item['item_title']);
                    echo '</h6>';
                }

                echo '</a>';
            }

            if ($item_id != '') {
                echo '<div id="item' . esc_attr($item_id) . '" class="accordion-item-content" style="';

                echo '">';

                if ($item['item_desc']) {
                    echo '' . esc_html($item['item_desc']);
                }

                echo '</div>';
            }

            echo '</div>';
        }
        echo '</div>';
    }
}
