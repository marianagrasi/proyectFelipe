<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Services
 */

class Dental_Care_Services_Grid_Filter extends Widget_Base
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
        return 'dental-care-services-grid-filter';
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
        return esc_html__('Services Grid Filter', 'dental-care');
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
     public function dental_care_extensions_allowed_html(){

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
            'featured_num',
            [
                'label' => esc_html__('Featured Items', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                "options" => array(
                    "" => "",
                    "one" => "One",
                    "two" => "Two",
                ),
                'description' => esc_html__('Number of featured items.', 'dental-care'),
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
            'service_excerpt_en',
            [
                'label' => esc_html__('Enable Service Excerpts', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'return_value' => 'true',

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

        $allowed_html = $this->dental_care_extensions_allowed_html();
        echo '<div class="stronghold-services-featured">';
        echo '<div class="row">';
        
        $col_val = "col-md-8";
        $items_offset = "1";
        
        if($settings['featured_num'] == ""){
            $featured_num = "one";
        }
        
        if($settings['featured_num'] == 'one'){
            $col_val = "col-md-8";
            $items_offset = '1';
        }else{
            $col_val = "col-md-4";
            $items_offset = "2";
        }
        
        echo '<div class="service-featured-item '.esc_attr($col_val).'">';
        
        if ($settings['order_items'] == true) {
            $args = array(
                'post_type' => 'service',
                'post_status' => 'publish',
                'pagination' => true,
                'orderby' => 'title',
                'order' => 'ASC',
                'posts_per_page' => 1,
                'ignore_sticky_posts' => 1,
                'meta_query' => array(
                    array(
                        'key' => '_thumbnail_id',
                        'compare' => 'EXISTS'
                    ),
                )
            );
        } else {
            $args = array(
                'post_type' => 'service',
                'post_status' => 'publish',
                'pagination' => true,
                'orderby' => 'title',
                'order' => 'ASC',
                'posts_per_page' => 1,
                'ignore_sticky_posts' => 1,
                'meta_query' => array(
                    array(
                        'key' => '_thumbnail_id',
                        'compare' => 'EXISTS'
                    ),
                )
            );
        }

        $query = new WP_Query($args);

        while ($query->have_posts()) {
            $query->the_post();
            
            if (has_post_thumbnail()) {

                $servicetitle = get_the_title();
                $servicelink = get_the_permalink();
                $serviceimg = get_the_post_thumbnail($post->ID, 'dental-care-carousel-thumb');
                $serviceexcerpt = get_the_excerpt();

                echo '<div class="service-item-img">';
                echo '<a href="'.esc_url($servicelink).'">';
                echo '<div class="item-overlay"><i class="fa fa-link"></i></div>';
                echo ''.$serviceimg.'';
                echo '</a>';
                echo '</div>';
                
                echo '<div class="service-item-title">';
                echo '<h5 class="service-main-name"><a href="' . esc_url( $servicelink) . '">' . esc_html($servicetitle) . '</a></h5>';  
                echo '</div>';
                
                if($settings['service_excerpt_en'] == true){
                    echo '<div class="service-item-desc">';
                    echo esc_html($serviceexcerpt);
                    echo '</div>';
                }
                
            } 
            
        }
        
        echo '</div>';
        
        if($settings['featured_num'] == 'two'){
            echo '<div class="service-featured-item '.esc_attr($col_val).'">';
            
            if ($settings['order_items'] == true) {
                $args = array(
                    'post_type' => 'service',
                    'post_status' => 'publish',
                    'pagination' => true,
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'posts_per_page' => 1,
                    'offset' => 1,
                    'ignore_sticky_posts' => 1,
                    'meta_query' => array(
                        array(
                            'key' => '_thumbnail_id',
                            'compare' => 'EXISTS'
                        ),
                    )
                );
            } else {
                $args = array(
                    'post_type' => 'service',
                    'post_status' => 'publish',
                    'pagination' => true,
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'posts_per_page' => 1,
                    'offset' => 1,
                    'ignore_sticky_posts' => 1,
                    'meta_query' => array(
                        array(
                            'key' => '_thumbnail_id',
                            'compare' => 'EXISTS'
                        ),
                    )
                );
            }

            $query = new WP_Query($args);

            while ($query->have_posts()) {
                $query->the_post();
                
                if (has_post_thumbnail()) {

                    $servicetitle = get_the_title();
                    $servicelink = get_the_permalink();
                    $serviceimg = get_the_post_thumbnail($post->ID, 'dental-care-carousel-thumb');
                    $serviceexcerpt = get_the_excerpt();

                    echo '<div class="service-item-img">';
                    echo '<a href="'.esc_url($servicelink).'">';
                    echo '<div class="item-overlay"><i class="fa fa-link"></i></div>';
                    echo ''.$serviceimg.'';
                    echo '</a>';
                    echo '</div>';
                    
                    echo '<div class="service-item-title">';
                    echo '<h5 class="service-main-name"><a href="' . esc_url( $servicelink) . '">' . esc_html($servicetitle) . '</a></h5>';  
                    echo '</div>';
                    
                    if($settings['service_excerpt_en'] == true){
                        echo '<div class="service-item-desc">';
                        echo esc_html($serviceexcerpt);
                        echo '</div>';
                    }
                    
                } 
                
            }
            
            echo '</div>';
        }
        
        
        echo '<div class="service-featured-items col-md-4">';
        
        if ($settings['order_items'] == true) {
            $args = array(
                'post_type' => 'service',
                'post_status' => 'publish',
                'pagination' => true,
                'orderby' => 'title',
                'order' => 'ASC',
                'posts_per_page' => 5,
                'offset' => $items_offset,
                'ignore_sticky_posts' => 1,
                'meta_query' => array(
                    array(
                        'key' => '_thumbnail_id',
                        'compare' => 'EXISTS'
                    ),
                )
            );
        } else {
            $args = array(
                'post_type' => 'service',
                'post_status' => 'publish',
                'pagination' => true,
                'posts_per_page' => 5,
                'offset' => $items_offset,
                'ignore_sticky_posts' => 1,
                'meta_query' => array(
                    array(
                        'key' => '_thumbnail_id',
                        'compare' => 'EXISTS'
                    ),
                )
            );
        }

        $query = new WP_Query($args);

        while ($query->have_posts()) {
            $query->the_post();
            
            if (has_post_thumbnail()) {

                $servicetitle = get_the_title();
                $servicelink = get_the_permalink();
                $serviceimg = get_the_post_thumbnail($post->ID, 'dental-care-carousel-thumb');
                $serviceexcerpt = get_the_excerpt();

                echo '<div class="service-item-row row">';
                
                echo '<div class="service-item-img-wrapper  col-md-4">';
                echo '<div class="service-item-img">';
                echo '<a href="'.esc_url($servicelink).'">';
                echo '<div class="item-overlay"><i class="fa fa-link"></i></div>';
                echo ''.$serviceimg.'';
                echo '</a>';
                echo '</div>';
                echo '</div>';
                
                echo '<div class="service-item-desc-wrapper col-md-8">';
                
                echo '<div class="service-item-title">';
                echo '<h5 class="service-main-name"><a href="' . esc_url( $servicelink) . '">' . esc_html($servicetitle) . '</a></h5>';  
                echo '</div>';
                
                if($settings['service_excerpt_en'] == true){
                    echo '<div class="service-item-desc">';
                    echo esc_html($serviceexcerpt);
                    echo '</div>';
                }
                
                echo '</div>';
                echo '</div>';
                
            }
            
        }
        
        echo '</div>';      
        echo '</div>';
        echo '</div>';
        

    }
}
