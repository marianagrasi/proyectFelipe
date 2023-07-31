<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;


if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Partners
 */

class Dental_Care_Partners extends Widget_Base {

    /**
     * Retrieve the widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'dental-care-partners';
    }

    /**
     * Retrieve the widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Partners', 'dental-care');
    }

    /**
     * Retrieve the widget icon.
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-review';
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
            'section_partners_settings', [
                'label' => esc_html__('Partners Settings', 'dental-care'),
            ]
        );

        $this->add_control(
            'partners_display_type', [
                'label' => esc_html__('Partners Display Type', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                "options" => array(
                    "" => "",
                    "img_carousel" => "Image Carousel",
                    "img_grid" => "Image Grid",
                ),
                'description' => esc_html__('Choose partners display type.', 'dental-care'),      ]
            );

        $this->add_control(
            'image_grid', [
                'label' => esc_html__('Image Grid Columns', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                "options" => array(
                    "" => "",
                    "two_col" => "2 Column",
                    "three_col" => "3 Column",
                    "four_col" => "4 Column",
                    "six_col" => "6 Column",
                ),
                'condition' => [
                    'partners_display_type' => 'img_grid',
                ],
                'description' => esc_html__('Choose partners display type.', 'dental-care'),
            ]
        );

        $this->add_control(
            'carousel_speed', [
                'label' => esc_html_x('Carousel Speed (ms)', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter the number for the carousel speed. (Default: 5000)', 'dental-care'),
                'condition' => [
                    'partners_display_type' => 'img_carousel',
                ],
            ]
        );

        $this->add_control(
            'carousel_items', [
                'label' => esc_html_x('Number of carousel items', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter the number of partner columns to display in carousel.', 'dental-care'),
                'condition' => [
                    'partners_display_type' => 'img_carousel',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_partners_items', [
                'label' => esc_html__('Partners Items', 'dental-care'),
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'partner_image', [
                'label' => __('Partner Image', 'dental-care'),
                'type' => Controls_Manager::MEDIA,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $repeater->add_control(
            'partner_link', [
                'label' => esc_html__('Partner Link', 'dental-care'),
                'type' => Controls_Manager::URL,
                'placeholder' => 'http://your-link.com',
                'default' => [
                    'url' => '',
                ],
            ]
        );

        $this->add_control(
            'partner_items',
            [
                'type' => Controls_Manager::REPEATER,
                'show_label' => true,
                'fields' => $repeater->get_controls(),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_partner_style', [
                'label' => esc_html__('Partner', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'partner_border_en', [
                'label' => esc_html__('Enable Partner Image Border', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'description' => esc_html__('Enable border on each partner image', 'dental-care'),
                'return_value' => 'true',
            ]
        );

        $this->add_control(
            'partner_border_color', [
                'label' => esc_html_x('Border Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'partner_border_en' => 'true',
                ],
                'selectors' => [
                    '{{WRAPPER}} .partner-img' => 'border-color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'partner_border_width', [
                'label' => esc_html_x('Border Width', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'condition' => [
                    'partner_border_en' => 'true',
                ],
                'selectors' => [
                    '{{WRAPPER}} .partner-img' => 'border-width: {{VALUE}}px',
                ]
            ]
        );

        $this->add_control(
            'partner_border_style', [
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
                'condition' => [
                    'partner_border_en' => 'true',
                ],
                'selectors' => [
                    '{{WRAPPER}} .partner-img' => 'border-style: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'partner_border_radius', [
                'label' => esc_html_x('Border Radius (px)', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Choose a border radius.', 'dental-care'),
                'condition' => [
                    'partner_border_en' => 'true',
                ],
                'selectors' => [
                    '{{WRAPPER}} .partner-img' => 'border-radius: {{VALUE}}px',
                ]
            ]
        );

        $this->add_control(
            'partner_greyscale_en', [
                'label' => esc_html__('Enable Image Greyscale', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'description' => esc_html__('Enable greyscale on each partner image', 'dental-care'),
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
    protected function render() {


        $settings = $this->get_settings_for_display();

        $carousel_id = 'carousel-'.mt_rand();

        echo '<div class="dental-care-partners-widget"> ';

        if ($settings['partners_display_type'] == "img_carousel") {

            echo '<div id="'.esc_attr($carousel_id).'" class="partners-carousel" ';
            echo ' data-speed="' . esc_attr($settings['carousel_speed']) . '"';
            echo ' data-items="' . esc_attr($settings['carousel_items']) . '"';
            echo '>';

            foreach ($settings['partner_items'] as $partner) {

                if ($partner['partner_image']['url'] != '') {
                    $partner_img_src = $partner['partner_image']['url'];

                    $link_url = $partner['partner_link']['url'];
                    $link_target = $partner['partner_link']['is_external'];
                    $link_rel = $partner['partner_link']['nofollow'];

                    echo '<div class="partner-item';

                    if ($settings['partner_greyscale_en'] == true) {
                        echo ' img-grey';
                    }

                    echo '" style="';

                    echo '">';

                    if ($link_url != '') {

                        echo '<a class="partner-link"';

                        if ($link_url != '') {
                            echo ' href="' . esc_url($link_url) . '"';
                        }

                        if ($link_target == 'on') {
                            echo ' target="_blank"';
                        }

                        if ($link_rel == 'on') {
                            echo ' rel="nofollow"';
                        }

                        echo '>';

                        echo '<img class="partner-img" src="' . esc_html($partner_img_src) . '" alt="Partner Image" style="';

                        if ($settings['partner_border_color'] != "") {
                            echo ' padding: 10px;';
                        }

                        echo '">';

                        echo '</a>';
                    } else {
                        echo '<img class="partner-img" src="' . esc_html($partner_img_src) . '" alt="Partner Image" style="';

                        if ($settings['partner_border_color'] != "") {
                            echo ' padding: 10px;';
                        }

                        echo '">';
                    }
                    echo '</div>';
                }
            }
            echo '</div>';
        } elseif ($settings['partners_display_type'] == "img_grid") {

            if ($settings['image_grid'] == 'two_col') {

                $colset = 'col-md-6';
                $partner_count = 0;


                echo '<div class="partners-grid-two-col">';


                foreach ($settings['partner_items'] as $partner) {

                    if ($partner_count == 0) {
                        echo '<div class="row">';
                    }

                    if ($partner['partner_image']['url'] != '') {
                        $partner_img_src = $partner['partner_image']['url'];
                        $link_url = $partner['partner_link']['url'];
                        $link_target = $partner['partner_link']['is_external'];
                        $link_rel = $partner['partner_link']['nofollow'];

                        echo '<div class="partner-item ' . esc_attr($colset) . '" style="';

                        echo '">';

                        if ($link_url != '') {

                            echo '<a class="partner-link" href="' . esc_html($link_url) . '"';

                            if ($link_target == 'on') {
                                echo ' target="_blank"';
                            }

                            if ($link_rel == 'on') {
                                echo ' rel=”nofollow”';
                            }

                            echo '><img class="partner-img" src="' . esc_html($partner_img_src) . '" alt="Partner Image" style="';

                            if ($settings['partner_border_color'] != "") {
                                echo ' padding: 10px;';
                            }

                            echo '"></a>';
                        } else {
                            echo '<img class="partner-img" src="' . esc_html($partner_img_src) . '" alt="Partner Image" style="';

                            if ($settings['partner_border_color'] != "") {
                                echo ' padding: 10px;';
                            }

                            echo '">';
                        }
                        echo '</div>';
                    }
                    $partner_count++;
                    if ($partner_count == 2) {
                        $partner_count = 0;
                        echo '</div>';
                    }
                }
                if ($partner_count < 2) {
                    echo '</div>';
                }
            } else if ($settings['image_grid'] == 'three_col') {

                $colset = 'col-md-4';
                $partner_count = 0;

                echo '<div class="partners-grid-three-col">';

                foreach ($settings['partner_items'] as $partner) {

                    if ($partner_count == 0) {
                        echo '<div class="row">';
                    }

                    if ($partner['partner_image']['url'] != '') {
                        $partner_img_src = $partner['partner_image']['url'];
                        $link_url = $partner['partner_link']['url'];
                        $link_target = $partner['partner_link']['is_external'];
                        $link_rel = $partner['partner_link']['nofollow'];

                        echo '<div class="partner-item ' . esc_attr($colset) . '" style="';

                        echo '">';

                        if ($link_url != '') {

                            echo '<a class="partner-link" href="' . esc_html($link_url) . '"><img class="partner-img" src="' . esc_html($partner_img_src) . '" alt="Partner Image" style="';

                            if ($settings['partner_border_color'] != "") {
                                echo ' padding: 10px;';
                            }

                            echo '"></a>';
                        } else {
                            echo '<img class="partner-img" src="' . esc_html($partner_img_src) . '" alt="Partner Image" style="';

                            if ($settings['partner_border_color'] != "") {
                                echo ' padding: 10px;';
                            }

                            echo '">';
                        }
                        echo '</div>';
                    }
                    $partner_count++;
                    if ($partner_count == 3) {
                        $partner_count = 0;
                        echo '</div>';
                    }
                }
                if ($partner_count < 3) {
                    echo '</div>';
                }
            } else if ($settings['image_grid'] == 'four_col') {

                $colset = 'col-md-3';
                $partner_count = 0;


                echo '<div class="partners-grid-four-col">';


                foreach ($settings['partner_items'] as $partner) {

                    if ($partner_count == 0) {
                        echo '<div class="row">';
                    }

                    if ($partner['partner_image']['url'] != '') {
                        $partner_img_src = $partner['partner_image']['url'];
                        $link_url = $partner['partner_link']['url'];
                        $link_target = $partner['partner_link']['is_external'];
                        $link_rel = $partner['partner_link']['nofollow'];

                        echo '<div class="partner-item ' . esc_attr($colset) . '" style="';

                        echo '">';

                        if ($link_url != '') {

                            echo '<a class="partner-link" href="' . esc_html($link_url) . '"><img class="partner-img" src="' . esc_html($partner_img_src) . '" alt="Partner Image" style="';

                            if ($settings['partner_border_color'] != "") {
                                echo ' padding: 10px;';
                            }

                            echo '"></a>';
                        } else {
                            echo '<img class="partner-img" src="' . esc_html($partner_img_src) . '" alt="Partner Image" style="';

                            if ($settings['partner_border_color'] != "") {
                                echo ' padding: 10px;';
                            }

                            echo '">';
                        }
                        echo '</div>';
                    }
                    $partner_count++;
                    if ($partner_count == 4) {
                        $partner_count = 0;
                        echo '</div>';
                    }
                }
                if ($partner_count < 4) {
                    echo '</div>';
                }
            } else if ($settings['image_grid'] == 'six_col') {

                $colset = 'col-md-2';
                $partner_count = 0;

                echo '<div class="partners-grid-six-col">';


                foreach ($settings['partner_items'] as $partner) {

                    if ($partner_count == 0) {
                        echo '<div class="row">';
                    }

                    if ($partner['partner_image']['url'] != '') {
                        $partner_img_src = $partner['partner_image']['url'];
                        $link_url = $partner['partner_link']['url'];
                        $link_target = $partner['partner_link']['is_external'];
                        $link_rel = $partner['partner_link']['nofollow'];

                        echo '<div class="partner-item ' . esc_attr($colset) . '" style="';

                        echo '">';

                        if ($link_url != '') {

                            echo '<a class="partner-link" href="' . esc_html($link_url) . '"><img class="partner-img" src="' . esc_html($partner_img_src) . '" alt="Partner Image" style="';

                            if ($settings['partner_border_color'] != "") {
                                echo ' padding: 10px;';
                            }

                            echo '"></a>';
                        } else {
                            echo '<img class="partner-img" src="' . esc_html($partner_img_src) . '" alt="Partner Image" style="';

                            if ($settings['partner_border_color'] != "") {
                                echo ' padding: 10px;';
                            }

                            echo '">';
                        }
                        echo '</div>';
                    }
                    $partner_count++;
                    if ($partner_count == 6) {
                        $partner_count = 0;
                        echo '</div>';
                    }
                }
                if ($partner_count < 6) {
                    echo '</div>';
                }
            }
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
