<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Number Block
 */

class Dental_Care_Number_Block extends Widget_Base
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
        return 'dental-care-number-block';
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
        return esc_html__('Number Block', 'dental-care');
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
        return 'eicon-number-field';
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
            'section_number_block_settings',
            [
                'label' => esc_html__('Number Block Settings', 'dental-care'),
            ]
        );

        $this->add_control(
            'number_block_number',
            [
                'label' => esc_html_x('Number', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'number_block_title',
            [
                'label' => esc_html_x('Title', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'number_block_desc',
            [
                'label' => esc_html_x('Description', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );


        $this->end_controls_section();


        $this->start_controls_section(
            'section_number_block_style',
            [
                'label' => esc_html__('Number Block Styling', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'number_block_number_color',
            [
                'label' => esc_html_x('Number Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose number color.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .number-icon' => 'color: {{VALUE}}',

                ]
            ]
        );

        $this->add_control(
            'number_block_number_bgcolor',
            [
                'label' => esc_html_x('Number Background Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose number background color.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .number-icon' => 'background-color: {{VALUE}}',

                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'number_block_number_typography',
                'label' => esc_html_x('Number Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .number-icon',
            ]
        );

        $this->add_control(
            'number_block_title_color',
            [
                'label' => esc_html_x('Title Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose title color.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .number-block-title' => 'color: {{VALUE}}',

                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'number_block_title_typography',
                'label' => esc_html_x('Title Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .number-block-title',
            ]
        );

        $this->add_control(
            'number_block_desc_color',
            [
                'label' => esc_html_x('Description Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose description color.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .number-block-desc' => 'color: {{VALUE}}',

                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'number_block_desc_typography',
                'label' => esc_html_x('Description Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .number-block-desc',
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


        echo '<div class="stronghold-number-block" style="';

        echo '">';


        echo '<div class="number-block-top">';

        if ($settings['number_block_number'] != '') {

            echo '<div class="number-icon" style="';

            echo '">';
            echo esc_html($settings['number_block_number']);
            echo '</div>';
        }

        echo '<div class="number-block-title">';

        echo '<h3 style="';

        echo '">' . esc_html($settings['number_block_title']) . ' </h3>';

        echo '</div>';

        echo '</div>';

        echo '<div class="number-block-desc">';
        echo '<div style="';

        echo '">' . wp_kses($settings['number_block_desc'], $allowed_html) . ' </div>';
        echo '</div>';

        echo '</div>';

    }
}
