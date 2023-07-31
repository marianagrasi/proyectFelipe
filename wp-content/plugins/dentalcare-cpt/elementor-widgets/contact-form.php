<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Contact Form
 */

class Dental_Care_Contact_Form extends Widget_Base {

    /**
     * Retrieve the widget name.
     *    
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'dental-care-contact-form';
    }

    /**
     * Retrieve the widget title.
     *     
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Contact Form', 'dental-care');
    }

    /**
     * Retrieve the widget icon.
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-mail';
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
            'section_product_settings', [
                'label' => esc_html__('Contact Form Settings', 'dental-care'),
            ]
        );

        $this->add_control(
            'contact_form', [
                'label' => esc_html__('Contact Form', 'dental-care'),
                'type' => Contact_Form_Select_Control::Contact_Form_Select,
                'description' => esc_html__('Choose a contact form.', 'dental-care'),
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
        global $post;


        if (class_exists('WPCF7')) {
            ?>           
            <div class="contact-form-wrapper">
                <?php echo(do_shortcode('[contact-form-7 id="' . esc_attr($settings['contact_form']) . '" title="' . esc_html(get_the_title($settings['contact_form'])) . '"]')); ?>
            </div>
            <?php
        }       

    }


}



