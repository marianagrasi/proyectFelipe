<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Before After
 */

class Dental_Care_Before_After extends Widget_Base {

    /**
     * Retrieve the widget name.
     *    
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'dental-care-before-after';
    }

    /**
     * Retrieve the widget title.
     *     
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Before After', 'dental-care');
    }

    /**
     * Retrieve the widget icon.
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-image-before-after';
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
            'section_before_after', [
                'label' => esc_html__('Before After', 'dental-care'),
            ]
        );

        $this->add_control(
            'before_img', [
                'label' => __('Before Image', 'dental-care'),
                'type' => Controls_Manager::MEDIA,
                'description' => __('Choose a before image.', 'dental-care'),
                'dynamic' => [
                    'active' => true,
                ],            
            ]
        );

        $this->add_control(
            'after_img', [
                'label' => __('After Image', 'dental-care'),
                'type' => Controls_Manager::MEDIA,
                'description' => __('Choose an after image.', 'dental-care'),
                'dynamic' => [
                    'active' => true,
                ],            
            ]
        );

        $this->add_control(
            'orientation', [
                'label' => esc_html__('Orientation', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                "options" => array(
                    "" => "",
                    "vertical" => "Vertical",
                    "horizontal" => "Horizontal"
                ),
            ]
        );

        $this->add_control(
            'before_after_height', [
                'label' => esc_html_x('Max Height (px)', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter a height.', 'dental-care'),
                'selectors' =>[
                    '{{WRAPPER}} .stronghold-before-after' => 'max-height: {{VALUE}}px',
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_before_after_style', [
                'label' => esc_html__('Before After Style', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'before_after_border_color', [
                'label' => esc_html_x('Border Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose a border color.', 'dental-care'),
                'selectors' =>[
                    '{{WRAPPER}} .stronghold-before-after' => 'border-color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'before_after_border_width', [
                'label' => esc_html_x('Border Width (px)', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Choose a border width.', 'dental-care'),
                'selectors' =>[
                    '{{WRAPPER}} .stronghold-before-after' => 'border-width: {{VALUE}}px',
                ]
            ]
        );

        $this->add_control(
            'before_after_border_style', [
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
                'selectors' =>[
                    '{{WRAPPER}} .stronghold-before-after' => 'border-style: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'before_after_border_radius', [
                'label' => esc_html_x('Border Radius (px)', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Choose a border radius.', 'dental-care'),
                'selectors' =>[
                    '{{WRAPPER}} .stronghold-before-after' => 'border-radius: {{VALUE}}px',
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
    protected function render() {


        $settings = $this->get_settings_for_display();

        $before_img_src = '';
        $after_img_src = '';

        if ($settings['before_img'] != '') {
            $before_img_src = $settings['before_img']['url'];
        }
        if ($settings['after_img'] != '') {
            $after_img_src = $settings['after_img']['url'];
        }

        echo '<div class="stronghold-before-after twentytwenty-container" data-orientation="'.esc_attr($settings['orientation']).'">';

        echo '<div class="stronghold-before-after-wrap">';
        if($before_img_src != ''){
            echo  '<img src="'.esc_url($before_img_src).'" alt="Before Image">';
        }
        if($after_img_src != ''){
            echo  '<img src="'.esc_url($after_img_src).'" alt="After Image">';
        }
        echo '</div>';

        echo '</div>';
    }

}
