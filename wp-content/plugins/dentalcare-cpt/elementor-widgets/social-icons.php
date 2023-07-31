<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Social Icons
 */

class Dental_Care_Social_Icons extends Widget_Base {

    /**
     * Retrieve the widget name.
     *    
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'dental-care-social-icons';
    }

    /**
     * Retrieve the widget title.
     *     
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Social Icons', 'dental-care');
    }

    /**
     * Retrieve the widget icon.
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-social-icons';
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
            'section_sociallinks', [
                'label' => esc_html__('Social Links', 'dental-care'),
            ]
        );

        $this->add_control(
            'facebook_link', [
                'label' => esc_html_x('Facebook', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter social network link.', 'dental-care'),
            ]
        );

        $this->add_control(
            'twitter_link', [
                'label' => esc_html_x('Twitter', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter social network link.', 'dental-care'),
            ]
        );

        $this->add_control(
            'googleplus_link', [
                'label' => esc_html_x('Google Plus', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter social network link.', 'dental-care'),
            ]
        );

        $this->add_control(
            'instagram_link', [
                'label' => esc_html_x('Instagram', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter social network link.', 'dental-care'),
            ]
        );

        $this->add_control(
            'linkedin_link', [
                'label' => esc_html_x('Linkedin', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter social network link.', 'dental-care'),
            ]
        );

        $this->add_control(
            'vimeo_link', [
                'label' => esc_html_x('Vimeo', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter social network link.', 'dental-care'),
            ]
        );

        $this->add_control(
            'youtube_link', [
                'label' => esc_html_x('Youtube', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter social network link.', 'dental-care'),
            ]
        );

        $this->add_control(
            'tumblr_link', [
                'label' => esc_html_x('Tumblr', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter social network link.', 'dental-care'),
            ]
        );

        $this->add_control(
            'flickr_link', [
                'label' => esc_html_x('Flickr', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter social network link.', 'dental-care'),
            ]
        );

        $this->add_control(
            'pinterest_link', [
                'label' => esc_html_x('Pinterest', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter social network link.', 'dental-care'),
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_sociallink_style', [
                'label' => esc_html__('Social Links', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'social_icon_color', [
                'label' => esc_html_x('Icon Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose an icon color.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .social-icon-item' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'social_icon_bg_color', [
                'label' => esc_html_x('Icon Background Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose an icon background color.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .social-icon-item' => 'background-color: {{VALUE}}',
                ]
                ]
        );

        $this->add_control(
            'social_icon_hover_icon_color', [
                'label' => esc_html_x('Icon Hover Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose an icon hover color.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .social-widget-item:hover .social-icon-item' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'social_icon_hover_bg_color', [
                'label' => esc_html_x('Icon Hover Background Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'description' => esc_html__('Choose icon hover background color.', 'dental-care'),
                'selectors' => [
                    '{{WRAPPER}} .social-widget-item:hover .social-icon-item' => 'background-color: {{VALUE}}',
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

        echo '<div class="dental-care-social-icons-widget">';

        echo '<div class="social-widget">';
        echo '<ul class="">';

        if($settings['facebook_link'] != ''){
            echo '<li class="social-widget-item social-fb"><a class="social-icon-item" target="_blank" title="Facebook" href="' . esc_url($settings['facebook_link']) . '" style="';

            echo'"><i class="social-icon-element fa fa-facebook" style="';

            echo '"></i></a></li>';
        }

        if($settings['twitter_link'] != ''){
            echo '<li class="social-widget-item social-tw"><a class="social-icon-item" target="_blank" title="Twitter" href="' . esc_url($settings['twitter_link']) . '" style="';

            echo '"><i class="social-icon-element fa fa-twitter" style="';

            echo '"></i></a></li>';
        }

        if($settings['googleplus_link'] != ''){
            echo '<li class="social-widget-item social-gp"><a class="social-icon-item" target="_blank" title="Google+" href="' . esc_url($settings['googleplus_link']) . '" style="';

            echo '"><i class="social-icon-element fa fa-google-plus-g" style="';

            echo '"></i></a></li>';
        }

        if($settings['instagram_link'] != ''){
            echo '<li class="social-widget-item social-insta"><a class="social-icon-item" target="_blank" title="Instagram" href="' . esc_url($settings['instagram_link']) . '" style="';

            echo '"><i class="social-icon-element fa fa-instagram" style="';

            echo '"></i></a></li>';
        }

        if($settings['linkedin_link'] != ''){
            echo '<li class="social-widget-item social-li"><a class="social-icon-item" target="_blank" title="Linkedin" href="' . esc_url($settings['linkedin_link']) . '" style="';

            echo '"><i class="social-icon-element fa fa-linkedin-in" style="';

            echo '"></i></a></li>';
        }

        if($settings['vimeo_link'] != ''){
            echo '<li class="social-widget-item social-vo"><a class="social-icon-item" target="_blank" title="Vimeo" href="' . esc_url($settings['vimeo_link']) . '" style="';

            echo '"><i class="social-icon-element fa fa-vimeo-v" style="';

            echo '"></i></a></li>';
        }

        if($settings['youtube_link'] != ''){
            echo '<li class="social-widget-item social-yt">';

            echo '<a class="social-icon-item" target="_blank" title="Youtube" href="' . esc_url($settings['youtube_link']) . '" style="';

            echo '"><i class="social-icon-element fa fa-youtube" style="';

            echo '"></i></a></li>';
        }

        if($settings['tumblr_link'] != ''){
            echo '<li class="social-widget-item social-tb">';

            echo'<a class="social-icon-item" target="_blank" title="Tumblr" href="' . esc_url($settings['tumblr_link']) . '" style="';

            echo '"><i class="social-icon-element fa fa-tumblr" style="';

            echo '"></i></a></li>';
        }

        if($settings['flickr_link'] != ''){
            echo '<li class="social-widget-item social-fr">';

            echo '<a class="social-icon-item" target="_blank" title="Flickr" href="' . esc_url($settings['flickr_link']) . '" style="';

            echo '"><i class="social-icon-element fa fa-flickr" style="';

            echo '"></i></a></li>';
        }

        if($settings['pinterest_link'] != ''){
            echo '<li class="social-widget-item social-pn">';
            echo '<a class="social-icon-item" target="_blank" title="Pinterest" href="' . esc_url($settings['pinterest_link']) . '" style="';

            echo '"><i class="social-icon-element fa fa-pinterest-p" style="';

            echo '"></i></a></li>';
        }

        echo '</ul>';
        echo '</div>';
        echo '</div>';
    }
}
