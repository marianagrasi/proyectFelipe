<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Video Player
 */

class Dental_Care_Video_Player extends Widget_Base {

    /**
     * Retrieve the widget name.
     *    
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'dental-care-video-player';
    }

    /**
     * Retrieve the widget title.
     *     
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Video Player', 'dental-care');
    }

    /**
     * Retrieve the widget icon.
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-slider-video';
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
            'section_video_player', [
                'label' => esc_html__('Video Player Settings', 'dental-care'),
            ]
        );
        
        $this->add_control(
            'thumbnail_img', [
                'label' => __('Thumbnail Image', 'dental-care'),
                'type' => Controls_Manager::MEDIA,
                'description' => __('Choose an image for the thumbnail.', 'dental-care'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'video_link', [
                'label' => esc_html__('Video Link', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                
            ]
        );         


        $this->end_controls_section();

        
        
        $this->start_controls_section(
            'section_video_style', [
                'label' => esc_html__('Video Player', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'play_btn_color', [
                'label' => esc_html_x('Play Button Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => __('Choose a color for the play button.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .video-play-icon-element' => 'color: {{VALUE}}',
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
        
        $video_img_src = '';
        $video_img_src = $settings['thumbnail_img']['url'];

        echo '<div class="stronghold-video-player-widget">';

        if($video_img_src == ''){
            echo '<a class="video-play"';


            echo ' href="'. esc_url($settings['video_link']).'"'; 

            echo ' data-lity>';
        }else{
            echo '<a class="video-play-img"';

            echo ' href="'. esc_url($settings['video_link']).'" data-lity>';
        }


        if($video_img_src != ''){
            echo '<div class="video-thumbnail-wrapper">';
        }else{
            echo '<div class="video-play-wrapper">';
        }

        if($video_img_src != ''){
            echo '<img src="' . esc_html($video_img_src) . '" alt="Video Thumbnail">';

            echo '<div class="video-play-icon">';
            echo '<i class="video-play-icon-element fa fa-play-circle" style="';

            if($settings['play_btn_color'] != ''){
                echo ' color:'.esc_attr($settings['play_btn_color']).';';
            }

            echo '"></i>';   
            echo '</div>';

        }else{
            echo '<div class="video-play-icon">';
            echo '<i class="fa fa-play-circle" style="';

            if($settings['play_btn_color'] != ''){
                echo ' color:'.esc_attr($settings['play_btn_color']).';';
            }

            echo '"></i>';    
            echo '</div>';
        }

        echo '</div>';
        echo '</a>';
        echo '</div>';

    }

}
