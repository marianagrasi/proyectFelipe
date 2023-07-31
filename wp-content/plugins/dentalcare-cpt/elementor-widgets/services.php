<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Services
 */

class Dental_Care_Services extends Widget_Base
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
        return 'dental-care-services';
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
        return esc_html__('Services', 'dental-care');
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
        return 'eicon-settings';
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
    protected function register_controls()
    {


        $this->start_controls_section(
            'section_services_settings',
            [
                'label' => esc_html__('Services Settings', 'dental-care'),
            ]
        );

        $this->add_control(
            'services_type',
            [
                'label' => esc_html__('Services Display Type', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                "options" => array(
                    "" => "",
                    "service_carousel" => "Services Carousel",
                    "service_grid_three_col" => "Services Grid 3 Column",
                    "service_grid_four_col" => "Services Grid 4 Column",
                    //"service_filter" => "Services Grid Filter",
                ),
                'description' => esc_html__('Choose service display type.', 'dental-care'),
            ]
        );

        $this->add_control(
            'carousel_speed',
            [
                'label' => esc_html_x('Carousel Speed (ms)', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter the number for the carousel speed. (Default: 5000)', 'dental-care'),
                'condition' => [
                    'services_type' => 'service_carousel',
                ],
            ]
        );

        $this->add_control(
            'arrows_en',
            [
                'label' => esc_html__('Navigation Arrows', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'return_value' => 'true',
                'condition' => [
                    'services_type' => 'service_carousel',
                ],
            ]
        );

        $this->add_control(
            'order_items',
            [
                'label' => esc_html__('Order by title', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'description' => esc_html__('Choose if to order items', 'dental-care'),
                'return_value' => 'true',
            ]
        );

        $this->add_control(
            'filter_services_en',
            [
                'label' => esc_html__('Filter services by category', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'description' => esc_html__('Choose if to filter items', 'dental-care'),
                'return_value' => 'true',
            ]
        );

        $this->add_control(
            'service_category',
            [
                'label' => esc_html__('Service Category', 'dental-care'),
                'type' => ServiceCategorySelect_Control::ServiceCategorySelect,
                'condition' => [
                    'filter_services_en' => 'true',
                ],
                'description' => esc_html__('Choose a service category.', 'dental-care'),
            ]
        );

        $this->add_control(
            'num_items',
            [
                'label' => esc_html_x('Number of items', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter the number of items to display. Enter -1 to display all.', 'dental-care'),
            ]
        );

        $this->add_control(
            'carousel_items',
            [
                'label' => esc_html_x('Number of carousel items', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter the number of service columns to display in carousel.', 'dental-care'),
                'condition' => [
                    'services_type' => 'service_carousel',
                ],
            ]
        );

        $this->add_control(
            'links_en',
            [
                'label' => esc_html__('Enable services links', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'description' => esc_html__('Choose to enable services links.', 'dental-care'),
                'return_value' => 'true',
            ]
        );

        $this->add_control(
            'custom_links_en',
            [
                'label' => esc_html__('Enable custom service links', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'description' => esc_html__('Choose to enable custom service links.', 'dental-care'),
                'return_value' => 'true',
            ]
        );


        $this->add_control(
            'servicedesc_en',
            [
                'label' => esc_html__('Enable services description', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'description' => esc_html__('Choose to enable services description.', 'dental-care'),
                'return_value' => 'true',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_services_style',
            [
                'label' => esc_html__('Services Style', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'service_infobg_color',
            [
                'label' => esc_html_x('Info Background Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose a background color', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .service-main-detail' => 'background-color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'service_title_color',
            [
                'label' => esc_html_x('Title Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose a text color for the title.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .service-main-name' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .service-main-name a' => 'color: {{VALUE}}',

                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'service_title_typography',
                'label' => esc_html_x('Title Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .service-main-name',
            ]
        );

        $this->add_control(
            'service_desc_color',
            [
                'label' => esc_html_x('Description Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose a text color for the title.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .service-desc' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'service_desc_typography',
                'label' => esc_html_x('Description Typography', 'dental-care'),
                'selector' => '{{WRAPPER}} .service-desc',
            ]
        );

        $this->add_control(
            'service_shadow_en',
            [
                'label' => esc_html__('Enable box shadow on hover', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'description' => esc_html__('Choose to enable box shadow on hover.', 'dental-care'),
                'return_value' => 'true',
                'condition' => [
                    'services_design' => 'design_one',
                ],
            ]
        );

        $this->add_control(
            'service_translate_en',
            [
                'label' => esc_html__('Enable translate on hover', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'description' => esc_html__('Choose to enable translate on hover.', 'dental-care'),
                'return_value' => 'true',
            ]
        );

        $this->add_control(
            'service_hover',
            [
                'label' => esc_html__('Service Hover Style', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                "options" => array(
                    "" => "",
                    "overlay" => "Overlay",
                    "zoom" => "Zoom",
                ),
                'description' => esc_html__('Choose service hover style.', 'dental-care'),
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
        global $post;

        $allowed_html = $this->Dental_Care_extensions_allowed_html();
        $num_items = '';

        if ($settings['num_items'] == "") {
            $num_items = -1;
        } else {
            $num_items = $settings['num_items'];
        }

        if ($settings['services_type'] == 'service_carousel' || $settings['services_type'] == 'service_grid_three_col' || $settings['services_type'] == 'service_grid_four_col' || $settings['services_type'] == 'service_filter') {


            if ($settings['order_items'] == true) {
                if ($settings['service_category'] != '') {
                    $args = array(
                        'post_type' => 'service',
                        'post_status' => 'publish',
                        'pagination' => true,
                        'orderby' => 'title',
                        'order' => 'ASC',
                        'posts_per_page' => $num_items,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'service-categories',
                                'field' => 'slug',
                                'terms' => $settings['service_category'],
                            ),
                        ),
                    );
                } else {
                    $args = array(
                        'post_type' => 'service',
                        'post_status' => 'publish',
                        'pagination' => true,
                        'orderby' => 'title',
                        'order' => 'ASC',
                        'posts_per_page' => $num_items,
                    );
                }
            } else {
                if ($settings['service_category'] != '') {
                    $args = array(
                        'post_type' => 'service',
                        'post_status' => 'publish',
                        'pagination' => true,
                        'posts_per_page' => $num_items,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'service-categories',
                                'field' => 'slug',
                                'terms' => $settings['service_category'],
                            ),
                        ),
                    );
                } else {
                    $args = array(
                        'post_type' => 'service',
                        'post_status' => 'publish',
                        'pagination' => true,
                        'posts_per_page' => $num_items,
                    );
                }
            }

            $carousel_id = 'carousel-'.mt_rand();

            $query = new WP_Query($args);


            if ($settings['services_type'] == 'service_carousel') {

                echo '<div class="stronghold-products-wrapper">';

                if ($settings['arrows_en'] == true) {
                    echo '<div class="carousel_arrow_nav_top">';
                    echo '<a class="btn arrow_prev_top"><i class="fa fa-chevron-left"></i></a>';
                    echo '<a class="btn arrow_next_top"><i class="fa fa-chevron-right"></i></a>';
                    echo '</div>';
                }
                
                echo '<div id="'.esc_attr($carousel_id).'" class="dental-care-service-carousel" data-speed="'.esc_attr($settings['carousel_speed']).'" data-items="'.esc_attr($settings['carousel_items']).'">';
                while ($query->have_posts()) {
                    $query->the_post();
                    $dental_care_service_desc = get_post_meta($post->ID, 'service_desc', $single = true);
                    $service_img = get_the_post_thumbnail($post->ID, 'dental-care-block-thumb');

                    echo '<div class="service-block';

                    if($settings['service_translate_en'] == false){
                      echo ' no-translate';
                  }

                  echo '">';

                  if ($service_img != NULL) {

                     if($settings['service_hover'] == 'zoom'){
                        echo'<div class="service-block-img service-zoom">';
                    }else{
                        echo'<div class="service-block-img">';
                    }

                    if ($settings['links_en'] == true) {
                        if ($settings['custom_links_en'] == true) {
                            $dental_care_custom_link = get_post_meta($post->ID, 'service_custom_link', $single = true);

                            if ($dental_care_custom_link == "") {
                                $dental_care_custom_link = "#";
                            }

                            echo '<a rel="external" href="' . esc_url($dental_care_custom_link) . '">' . $service_img . '</a>';
                            echo '<a rel="external" href="' . esc_url($dental_care_custom_link) . '">';
                        } else {
                            echo '<a rel="external" href="' . get_the_permalink() . '">' . $service_img . '</a>';
                            echo '<a rel="external" href="' . get_the_permalink() . '">';
                        }
                    } else {
                        echo $service_img;
                    }

                    if($settings['service_hover'] == 'overlay'){
                        echo '<span class="service-block-img-overlay">';
                        echo '<i class="fa fa-link"></i>';
                        echo '</span>';
                    }
                    echo '</a>';

                    echo '</div>';
                }
                echo '<div class="service-main-detail">';
                if ($settings['links_en'] == true) {
                    if ($settings['custom_links_en'] == true) {
                        $dental_care_custom_link = get_post_meta($post->ID, 'service_custom_link', $single = true);

                        if ($dental_care_custom_link == "") {
                            $dental_care_custom_link = "#";
                        }

                        echo '<h5 class="service-main-name"><a href="' . esc_url($dental_care_custom_link) . '">' . get_the_title() . '</a></h5>';
                    } else {
                        echo '<h5 class="service-main-name"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h5>';
                    }
                } else {
                    echo '<h5 class="service-main-name">' . get_the_title() . '</h5>';
                }

                if($settings['servicedesc_en'] == true){
                    echo '<div class="service-desc">' . wp_kses($dental_care_service_desc, $allowed_html) . '</div>';
                }
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';

        } elseif ($settings['services_type'] == 'service_grid_three_col') {


            $services_count = 3;
            while ($query->have_posts()) {
                $query->the_post();
                $dental_care_service_desc = get_post_meta($post->ID, 'service_desc', $single = true);
                $service_img = get_the_post_thumbnail($post->ID, 'dental-care-block-thumb');
                if ($services_count == 3) {
                    $services_count = 0;
                    echo '<div class="row">';
                }
                $services_count++;

                echo '<div class="col-md-4 service-block-block-item">';

                echo '<div class="service-block';

                if($settings['service_translate_en'] == false){
                  echo ' no-translate';
              }

              echo '">';

              if ($service_img != NULL) {
                if($settings['service_hover'] == 'zoom'){
                    echo'<div class="service-block-img service-zoom">';
                }else{
                    echo'<div class="service-block-img">';
                }
                if ($settings['links_en'] == true) {
                    if ($settings['custom_links_en'] == true) {
                        $dental_care_custom_link = get_post_meta($post->ID, 'service_custom_link', $single = true);

                        if ($dental_care_custom_link == "") {
                            $dental_care_custom_link = "#";
                        }

                        echo '<a rel="external" href="' . esc_url($dental_care_custom_link) . '">' . $service_img . '</a>';
                        echo '<a rel="external" href="' . esc_url($dental_care_custom_link) . '">';
                    } else {
                        echo '<a rel="external" href="' . get_the_permalink() . '">' . $service_img . '</a>';
                        echo '<a rel="external" href="' . get_the_permalink() . '">';
                    }
                } else {
                    echo $service_img;
                }
                if($settings['service_hover'] == 'overlay'){
                    echo '<span class="service-block-img-overlay">';
                    echo '<i class="fa fa-link"></i>';
                    echo '</span>';
                }
                echo '</a>';

                echo '</div>';
            }
            echo '<div class="service-main-detail">';
            if ($settings['links_en'] == true) {
                if ($settings['custom_links_en'] == true) {
                    $dental_care_custom_link = get_post_meta($post->ID, 'service_custom_link', $single = true);

                    if ($dental_care_custom_link == "") {
                        $dental_care_custom_link = "#";
                    }

                    echo '<h5 class="service-main-name"><a href="' . esc_url($dental_care_custom_link) . '">' . get_the_title() . '</a></h5>';
                } else {
                    echo '<h5 class="service-main-name"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h5>';
                }
            } else {
                echo '<h5 class="service-main-name">' . get_the_title() . '</h5>';
            }
            if($settings['servicedesc_en'] == true){
                echo '<div class="service-desc">' . wp_kses($dental_care_service_desc, $allowed_html) . '</div>';
            }
            echo '</div> </div></div>';
            if ($services_count == 3) {
                echo '</div>';
            }
        }
        if ($services_count < 3) {
            echo '</div>';
        }


    } elseif ($settings['services_type'] == 'service_grid_four_col') {

       $services_count = 4;
       while ($query->have_posts()) {
        $query->the_post();
        $dental_care_service_desc = get_post_meta($post->ID, 'service_desc', $single = true);
        $service_img = get_the_post_thumbnail($post->ID, 'dental-care-block-thumb');
        if ($services_count == 4) {
            $services_count = 0;
            echo '<div class="row">';
        }
        $services_count++;

        echo '<div class="col-md-3 service-block-block-item">';

        echo '<div class="service-block';

        if($settings['service_translate_en'] == false){
          echo ' no-translate';
      }

      echo '">';
      
      if ($service_img != NULL) {
        if($settings['service_hover'] == 'zoom'){
            echo'<div class="service-block-img service-zoom">';
        }else{
            echo'<div class="service-block-img">';
        }
        if ($settings['links_en'] == true) {
            if ($settings['custom_links_en'] == true) {
                $dental_care_custom_link = get_post_meta($post->ID, 'service_custom_link', $single = true);

                if ($dental_care_custom_link == "") {
                    $dental_care_custom_link = "#";
                }

                echo '<a rel="external" href="' . esc_url($dental_care_custom_link) . '">' . $service_img . '</a>';
                echo '<a rel="external" href="' . esc_url($dental_care_custom_link) . '">';
            } else {
                echo '<a rel="external" href="' . get_the_permalink() . '">' . $service_img . '</a>';
                echo '<a rel="external" href="' . get_the_permalink() . '">';
            }
        } else {
            echo $service_img;
        }
        if($settings['service_hover'] == 'overlay'){
            echo '<span class="service-block-img-overlay">';
            echo '<i class="fa fa-link"></i>';
            echo '</span>';
        }
        echo '</a>';

        echo '</div>';
    }
    echo '<div class="service-main-detail">';
    if ($settings['links_en'] == true) {
        if ($settings['custom_links_en'] == true) {
            $dental_care_custom_link = get_post_meta($post->ID, 'service_custom_link', $single = true);

            if ($dental_care_custom_link == "") {
                $dental_care_custom_link = "#";
            }

            echo '<h5 class="service-main-name"><a href="' . esc_url($dental_care_custom_link) . '">' . get_the_title() . '</a></h5>';
        } else {
            echo '<h5 class="service-main-name"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h5>';
        }
    } else {
        echo '<h5 class="service-main-name">' . get_the_title() . '</h5>';
    }
    if($settings['servicedesc_en'] == true){
        echo '<div class="service-desc">' . wp_kses($dental_care_service_desc, $allowed_html) . '</div>';
    }
    echo '</div> </div></div>';
    if ($services_count == 4) {
        echo '</div>';
    }
}
if ($services_count < 4) {
    echo '</div>';
}
} 
}

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
