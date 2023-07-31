<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;


if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Testimonials
 */

class Dental_Care_Testimonials_Two extends Widget_Base {

    /**
     * Retrieve the widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'dental-care-testimonials';
    }

    /**
     * Retrieve the widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Testimonials', 'dental-care');
    }

    /**
     * Retrieve the widget icon.
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-testimonial-carousel';
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
     * Allowed HTML
     * @access public
     */
      public function Dental_Care_extensions_allowed_html(){

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
    protected function register_controls() {


        $this->start_controls_section(
            'section_testimonial_settings', [
                'label' => esc_html__('Testimonial Settings', 'dental-care'),
            ]
        );

        $this->add_control(
            'testimonial_type', [
                'label' => esc_html__('Testimonials Display Type', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                "options" => array(
                    "" => "",
                    "testimonial_carousel" => "Testimonial Carousel",
                    "testimonial_slider" => "Testimonial Slider",
                ),
                'description' => esc_html__('Choose testimonial display type.', 'dental-care'),
            ]
        );

        $this->add_control(
            'testimonial_design', [
                'label' => esc_html__('Testimonial Design', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                "options" => array(
                    "" => "",
                    "design_one" => "Design 1",
                    "design_two" => "Design 2",
                ),
                'description' => esc_html__('Choose testimonial display type.', 'dental-care'),
                'condition' => [
                    'testimonial_type' => 'testimonial_carousel',
                ],
            ]
        );


        $this->add_control(
            'carousel_speed', [
                'label' => esc_html_x('Carousel Speed (ms)', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter the number for the carousel speed. (Default: 5000)', 'dental-care'),                
            ]
        );

        $this->add_control(
            'arrows_en', [
                'label' => esc_html__('Enable Arrows', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'return_value' => 'true',
                'condition' => [
                    'testimonial_type' => 'testimonial_carousel',
                ],
            ]
        );

        $this->add_control(
            'author_img_en', [
                'label' => esc_html__('Author Images', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'description' => esc_html__('Choose if to enable or disable author image.', 'dental-care'),
                'return_value' => 'true',
            ]
        );

        $this->add_control(
            'num_items', [
                'label' => esc_html_x('Number of items', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter the number of items to display. Enter -1 to display all.', 'dental-care'),
            ]
        );

        $this->add_control(
            'carousel_items', [
                'label' => esc_html_x('Number of carousel items', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter the number of testimonials columns to display in carousel.', 'dental-care'),
                'condition' => [
                    'testimonial_type' => 'testimonial_carousel',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_testimonial_items', [
                'label' => esc_html__('Testimonial Items', 'dental-care'),
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'testimonial_image', [
                'label' => __('Testimonial Image', 'dental-care'),
                'type' => Controls_Manager::MEDIA,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $repeater->add_control(
            'testimonial_name',
            [
                'label' => esc_html_x('Testimonial Name', 'dental-care'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'testimonial_position',
            [
                'label' => esc_html_x('Testimonial Position', 'dental-care'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'testimonial_text',
            [
                'label' => esc_html_x('Testimonial Text', 'dental-care'),
                'type' => Controls_Manager::TEXTAREA,
            ]
        );

        $repeater->add_control(
            'testimonial_rating',
            [
                'label' => esc_html__('Star Rating', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                "options" => array(
                  'one_star'  => __('One Star', 'dental-care'),
                  'two_star' => __( 'Two Star', 'dental-care'),
                  'three_star' => __( 'Three Star', 'dental-care'),
                  'four_star' => __( 'Four Star', 'dental-care'),
                  'five_star' => __( 'Five Star', 'dental-care'),
              ),
            ]
        );

        $this->add_control(
            'testimonial_items',
            [
                'type' => Controls_Manager::REPEATER,
                'show_label' => true,
                'fields' => $repeater->get_controls(),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_Testimonial_style', [
                'label' => esc_html__('Testimonials Style', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'testimonial_bg_color', [
                'label' => esc_html_x('Background Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'testimonial_design' => ['design_one','design_two'],
                ],
                'selectors' => [
                    '{{WRAPPER}} .dental-care-testimonials-item-two .dental-care-testim-text' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .dental-care-testimonials-item-two .dental-care-testim-text .testimonial-bottom-arrow' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .dental-care-testimonials .dental-care-testimonials-item' => 'background-color: {{VALUE}}',

                ]
            ]
        );

        $this->add_control(
            'testimonial_border_color',
            [
                'label' => esc_html_x('Border Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose a border color.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .dental-care-testimonials-item-two .dental-care-testim-text' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .dental-care-testimonials .dental-care-testimonials-item' => 'border-color: {{VALUE}}',
                     '{{WRAPPER}} .testimonials-slider .dental-care-testimonials-item' => 'border-color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'testimonial_border_width',
            [
                'label' => esc_html_x('Border Width (px)', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'selectors' => [
                    '{{WRAPPER}} .dental-care-testimonials-item-two .dental-care-testim-text' => 'border-width: {{VALUE}}px',
                    '{{WRAPPER}} .dental-care-testimonials .dental-care-testimonials-item' => 'border-width: {{VALUE}}px',
                    '{{WRAPPER}} .testimonials-slider .dental-care-testimonials-item' => 'border-width: {{VALUE}}px',
                ]
            ]
        );

        $this->add_control(
            'testimonial_border_style',
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
                    '{{WRAPPER}} .dental-care-testimonials-item-two .dental-care-testim-text' => 'border-style: {{VALUE}}',
                    '{{WRAPPER}} .dental-care-testimonials .dental-care-testimonials-item' => 'border-style: {{VALUE}}',
                    '{{WRAPPER}} .testimonials-slider .dental-care-testimonials-item' => 'border-style: {{VALUE}}',

                ]
            ]
        );

        $this->add_control(
            'testimonial_border_radius',
            [
                'label' => esc_html_x('Border Radius (px)', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Choose a border radius.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .dental-care-testimonials-item-two .dental-care-testim-text' => 'border-radius: {{VALUE}}px',
                    '{{WRAPPER}} .dental-care-testimonials .dental-care-testimonials-item' => 'border-radius: {{VALUE}}px',
                    '{{WRAPPER}} .testimonials-slider .dental-care-testimonials-item' => 'border-radius: {{VALUE}}px',
                    

                ]
            ]
        );

        $this->add_control(
            'testimonial_text_color', [
                'label' => esc_html_x('Text Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dental-care-testim-text' => 'color: {{VALUE}}',

                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(), [
                'name' => 'text_typography',
                'label' => esc_html_x('Text Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .dental-care-testim-text',
            ]
        );

        $this->add_control(
            'testimonial_author_color', [
                'label' => esc_html_x('Author Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dental-care-testim-name' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .dental-care-testim-name h6' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(), [
                'name' => 'author_typography',
                'label' => esc_html_x('Author Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .dental-care-testim-name',
            ]
        );

        $this->add_control(
            'testimonial_pos_color', [
                'label' => esc_html_x('Position Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dental-care-testim-position' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(), [
                'name' => 'position_typography',
                'label' => esc_html_x('Position Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .dental-care-testim-position',
            ]
        );

        $this->add_control(
            'testimonial_icon_color', [
                'label' => esc_html_x('Testimonial Icon Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quote-icon' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'testimonial_star_icon_color', [
                'label' => esc_html_x('Testimonial Star Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-rating i' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'testimonial_box_shadow', [
                'label' => esc_html__('Box Shadow', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'description' => esc_html__('Choose if to enable or disable box shadow.', 'dental-care'),
                'return_value' => 'true',
                'condition' => [
                    'testimonial_design' => ['design_one','design_two'],
                ],
            ]
        );

        $this->add_responsive_control(
            'testimonial_text_align',
            [
                'label' => esc_html__('Text Align', 'dental-care'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'dental-care'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'dental-care'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'dental-care'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .dental-care-testimonials-item-two .dental-care-testim-text' => 'text-align: {{VALUE}}',
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
    protected function render() {


        $settings = $this->get_settings_for_display();
        global $post;

        $allowed_html = $this->Dental_Care_extensions_allowed_html();

        $Dental_Care_allowed_html = array(
            'p' => array(
                'class' => array(),
                'style' => array(),
            )
        );

        $carousel_id = 'carousel-'.mt_rand();

        echo '<div class="dental-care-testimonials-wrapper">';

        if ($settings['arrows_en'] == true) {
            echo '<div class="carousel_arrow_nav_top">';
            echo '<a class="btn arrow_prev_top"><i class="fa fa-chevron-left"></i></a>';
            echo '<a class="btn arrow_next_top"><i class="fa fa-chevron-right"></i></a>';
            echo '</div>';
        }


        if ($settings['testimonial_type'] == 'testimonial_carousel') {

            echo '<div id="'.esc_attr($carousel_id).'" class="dental-care-testimonials" data-speed="' . esc_attr($settings['carousel_speed']) . '" data-items="' . esc_attr($settings['carousel_items']) . '">';

            foreach ($settings['testimonial_items'] as $testimonial) {

                $testimonytext = $testimonial['testimonial_text'];
                $testimonyname = $testimonial['testimonial_name'];
                $testimonypos = $testimonial['testimonial_position'];
                $testimonypic = $testimonial['testimonial_image']['url'];
                $testimonyrating =  $testimonial['testimonial_rating'];

                if($settings['testimonial_design'] == 'design_one' || $settings['testimonial_design'] == ''){
                    echo '<div class="dental-care-testimonials-item" style="';

                    if($settings['testimonial_box_shadow'] == false){
                        echo '  box-shadow: none';
                    }

                    echo '"> <i class="fa fa-quote-left quote-icon" style="';
                    
                    echo '"></i>';
                    echo '<div class="dental-care-testim-text" style="';

                    echo '">' . wp_kses($testimonytext, $allowed_html) . ' </div>';
                    echo '<div class="dental-care-author">';
                    if ($testimonypic != NULL) {
                        echo '<img src="'.esc_url($testimonypic).'" alt="'.esc_html__("Testimonial Image", "dental-care").'">';
                    }
                    echo '<ul class="dental-care-author-info">';
                    echo '<li class="dental-care-testim-name" style="';

                    echo '"><h6 class="dental-care-testim-name" style="';

                    echo '">' . esc_html($testimonyname) . '</h6></li> ';
                    echo '<li class="dental-care-testim-position" style="';

                    echo '">' . esc_html($testimonypos) . '</li>';

                    if ($testimonyrating != '') {
                        echo ' <li class="testimonial-rating">';
                        if ($testimonyrating == 'one_star') {
                            echo '<i class="fa fa-star "></i>';
                        }if ($testimonyrating == 'two_star') {
                            echo '<i class="fa fa-star "></i>';
                            echo '<i class="fa fa-star "></i>';
                        }if ($testimonyrating == 'three_star') {
                            echo '<i class="fa fa-star "></i>';
                            echo '<i class="fa fa-star "></i>';
                            echo '<i class="fa fa-star "></i>';
                        }if ($testimonyrating == 'four_star') {
                            echo '<i class="fa fa-star "></i>';
                            echo '<i class="fa fa-star "></i>';
                            echo '<i class="fa fa-star "></i>';
                            echo '<i class="fa fa-star "></i>';
                        }if ($testimonyrating == 'five_star') {
                            echo '<i class="fa fa-star "></i>';
                            echo '<i class="fa fa-star "></i>';
                            echo '<i class="fa fa-star "></i>';
                            echo '<i class="fa fa-star "></i>';
                            echo '<i class="fa fa-star "></i>';
                        }
                        echo '</li>';
                    }

                    echo '</ul>';
                    echo '</div>';
                    echo '</div>';
                }else{

                    echo '<div class="dental-care-testimonials-item-two">';

                    echo '<div class="dental-care-testim-text" style="';

                    if($settings['testimonial_box_shadow'] == false){
                        echo '  box-shadow: none';
                    }

                    echo '">';

                    echo ' <i class="fa fa-quote-left quote-icon" style="';

                    echo '"></i>';

                    echo ''. wp_kses($testimonytext, $allowed_html) . '';

                    echo '<span class="testimonial-bottom-arrow" style="';

                    echo '"></span>';

                    echo '</div>';
                    echo '<div class="dental-care-author">';
                    if ($testimonypic != NULL) {
                        echo '<img src="'.esc_url($testimonypic).'" alt="'.esc_html__("Testimonial Image", "dental-care").'">';
                    }
                    echo '<ul class="dental-care-author-info">';
                    echo '<li class="dental-care-testim-name" style="';

                    echo '<h6 style="';

                    echo '">' . esc_html($testimonyname) . '<h6></li> ';
                    echo '<li class="dental-care-testim-position" style="';

                    echo '">' . esc_html($testimonypos) . '</li>';

                    if ($testimonyrating != '') {
                        echo ' <li class="testimonial-rating">';
                        if ($testimonyrating == 'one_star') {
                            echo '<i class="fa fa-star "></i>';
                        }if ($testimonyrating == 'two_star') {
                            echo '<i class="fa fa-star "></i>';
                            echo '<i class="fa fa-star "></i>';
                        }if ($testimonyrating == 'three_star') {
                            echo '<i class="fa fa-star "></i>';
                            echo '<i class="fa fa-star "></i>';
                            echo '<i class="fa fa-star "></i>';
                        }if ($testimonyrating == 'four_star') {
                            echo '<i class="fa fa-star "></i>';
                            echo '<i class="fa fa-star "></i>';
                            echo '<i class="fa fa-star "></i>';
                            echo '<i class="fa fa-star "></i>';
                        }if ($testimonyrating == 'five_star') {
                            echo '<i class="fa fa-star "></i>';
                            echo '<i class="fa fa-star "></i>';
                            echo '<i class="fa fa-star "></i>';
                            echo '<i class="fa fa-star "></i>';
                            echo '<i class="fa fa-star "></i>';
                        }
                        echo '</li>';
                    }

                    echo '</ul>';
                    echo '</div>';
                    echo '</div>';

                }

            }

            echo '</div>';
        } else if ($settings['testimonial_type'] == 'testimonial_slider') {

            $carousel_items = 1;

            echo '<div id="'.esc_attr($carousel_id).'" class="testimonials-slider" data-speed="' . esc_attr($settings['carousel_speed']) . '" data-items="1">';


            foreach ($settings['testimonial_items'] as $testimonial) {


                $testimonytext = $testimonial['testimonial_text'];
                $testimonyname = $testimonial['testimonial_name'];
                $testimonypos = $testimonial['testimonial_position'];
                $testimonypic = $testimonial['testimonial_image']['url'];
                $testimonyrating =  $testimonial['testimonial_rating'];

                echo '<div class="dental-care-testimonials-item" style="';

                echo '"> <i class="fa fa-quote-left quote-icon" style="';

                echo '"></i><div class="dental-care-testim-text" style="';

                echo '">' . wp_kses($testimonytext, $allowed_html) . ' </div>';
                echo '<div class="dental-care-author">';
                if ($testimonypic != NULL) {
                    echo '<img src="'.esc_url($testimonypic).'" alt="'.esc_html__("Testimonial Image", "dental-care").'">';
                }
                echo '<div class="dental-care-author-info">';

                echo '<div class="dental-care-testim-name" style="';

                echo '"><h6 style="';

                echo '">' . esc_html($testimonyname) . '</h6></div> ';
                echo '<div class="dental-care-testim-position" style="';

                echo '">' . esc_html($testimonypos) . '</div>';

                if ($testimonyrating != '') {
                    echo ' <li class="testimonial-rating">';
                    if ($testimonyrating == 'one_star') {
                        echo '<i class="fa fa-star "></i>';
                    }if ($testimonyrating == 'two_star') {
                        echo '<i class="fa fa-star "></i>';
                        echo '<i class="fa fa-star "></i>';
                    }if ($testimonyrating == 'three_star') {
                        echo '<i class="fa fa-star "></i>';
                        echo '<i class="fa fa-star "></i>';
                        echo '<i class="fa fa-star "></i>';
                    }if ($testimonyrating == 'four_star') {
                        echo '<i class="fa fa-star "></i>';
                        echo '<i class="fa fa-star "></i>';
                        echo '<i class="fa fa-star "></i>';
                        echo '<i class="fa fa-star "></i>';
                    }if ($testimonyrating == 'five_star') {
                        echo '<i class="fa fa-star "></i>';
                        echo '<i class="fa fa-star "></i>';
                        echo '<i class="fa fa-star "></i>';
                        echo '<i class="fa fa-star "></i>';
                        echo '<i class="fa fa-star "></i>';
                    }
                    echo '</li>';
                }

                echo '</div>';
                echo '</div>';
                echo '</div>';

            }

            echo '</div>';
        }



        echo '</div>';

        if (is_admin()){

          $items = $settings['carousel_items'];
          $speed = $settings['carousel_speed'];

          if($items == NULL){
            $items = 2;
        }
        if($speed == NULL){
            $speed = 5000;
        }

        if(($items != NULL) && ($speed != NULL) && ($carousel_id != NULL)){

            echo
            "<script>

            'use strict';

            jQuery('#".$carousel_id."').slick({
              slidesToShow: ".$items.",
              autoplaySpeed: ".$speed.",
              autoplay: true,
              arrows: false,
              infinite: true,
              responsive: [
              {
                  breakpoint: 1100,
                  settings: {
                    slidesToShow: 2
                }
                },
                {
                  breakpoint: 800,
                  settings: {
                    slidesToShow: 1
                }
                },
                {
                  breakpoint: 480,
                  settings: {
                    slidesToShow: 1
                }
            }
            ]
            });
            </script>";

        }

    }


}

}
