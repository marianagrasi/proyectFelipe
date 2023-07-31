<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Gallery
 */

class Dental_Care_Gallery extends Widget_Base
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
        return 'dental-care-gallery';
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
        return esc_html__('Gallery', 'dental-care');
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
        return 'eicon-gallery-justified';
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
            'section_gallery',
            [
                'label' => esc_html__('Gallery', 'dental-care'),
            ]
        );

        $this->add_control(
            'gallery_imgs',
            [
                'label' => __('Gallery Images', 'dental-care'),
                'type' => Controls_Manager::GALLERY,
                'description' => __('Choose images', 'dental-care'),
            ]
        );

        $this->add_control(
            'gallery_type',
            [
                'label' => esc_html__('Gallery Type', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                "options" => array(
                    "" => "",
                    "masonry" => "Masonry",
                    "slider" => "Slider",
                    "justified" => "Justified",
                    "carousel" => "Carousel",
                    "two_col" => "Two Col Grid",
                    "three_col" => "Three Col Grid",
                    "four_col" => "Four Col Grid",

                ),
            ]
        );

        $this->add_control(
            'carousel_speed',
            [
                'label' => esc_html_x('Carousel Speed (ms)', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter the number for the carousel speed. (Default: 5000)', 'dental-care'),
                'condition' => [
                    'gallery_type' => ['carousel', 'slider'],
                ],
            ]
        );

        $this->add_control(
            'carousel_cols',
            [
                'label' => esc_html_x('Number of gallery columns', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter the number of gallery columns to display in carousel.', 'dental-care'),
                'condition' => [
                    'gallery_type' => 'carousel',
                ],
            ]
        );

        $this->add_control(
            'carousel_cols_tablet',
            [
                'label' => esc_html_x('Number of gallery columns(Tablet)', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter the number of gallery columns to display in carousel on tablet.', 'dental-care'),
                'condition' => [
                    'gallery_type' => 'carousel',
                ],
            ]
        );

        $this->add_control(
            'carousel_cols_mobile',
            [
                'label' => esc_html_x('Number of gallery columns(Mobile)', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter the number of gallery columns to display in carousel on mobile.', 'dental-care'),
                'condition' => [
                    'gallery_type' => 'carousel',
                ],
            ]
        );

        $this->add_control(
            'arrows_en',
            [
                'label' => esc_html__('Arrows', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'return_value' => 'true',
                'condition' => [
                    'gallery_type' => 'carousel',
                ],
            ]
        );

        $this->add_control(
            'gutter_size',
            [
                'label' => esc_html_x('Gutter Size', 'dental-care'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}' => '',
                ],
                'condition' => [
                    'gallery_type' => 'masonry',
                ],
            ]
        );

        $this->add_control(
            'row_height',
            [
                'label' => esc_html_x('Row Height', 'dental-care'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 150,
                ],
                'condition' => [
                    'gallery_type' => 'masonry',
                ],
            ]
        );

        $this->add_control(
            'lightbox_en',
            [
                'label' => esc_html__('Lightbox', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'return_value' => 'true',
            ]
        );

        $this->add_control(
            'caption_en',
            [
                'label' => esc_html__('Caption', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'return_value' => 'true',
            ]
        );

        $this->add_control(
            'custom_imgsize_en',
            [
                'label' => esc_html__('Custom Image Size', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'return_value' => 'true',
            ]
        );

        $this->add_control(
            'custom_img_height',
            [
                'label' => esc_html_x('Image Height', 'dental-care'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 2000,
                        'step' => 5,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 150,
                ],
                'condition' => [
                    'custom_imgsize_en' => 'true',
                ],
            ]
        );

        $this->add_control(
            'custom_img_width',
            [
                'label' => esc_html_x('Image Width', 'dental-care'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 2000,
                        'step' => 5,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 150,
                ],
                'condition' => [
                    'custom_imgsize_en' => 'true',
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
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        echo '<div class="stronghold-gallery-wrapper">';


        if ($settings['gallery_type'] == 'masonry') {

            echo '<div class="stronghold-masonry-gallery-widget"';

            echo 'data-gutter-size="';
            if ($settings['gutter_size'] != '') {
                echo esc_attr($settings['gutter_size']['size']);
            }
            echo '"';

            echo 'data-row-height="';
            if ($settings['row_height'] != '') {
                echo esc_attr($settings['row_height']['size']);
            }

            echo '">';

            echo '<div class="stronghold-masonry-gallery">';

            foreach ($settings['gallery_imgs'] as $image) {

                $img_url = '';
                $img_id = $image['id'];
                $img_caption = '';

                if($settings['caption_en'] == true){
                    $img_caption = wp_get_attachment_caption($image['id']);
                }

                if ($settings['custom_imgsize_en'] == true) {
                    $img_width = strval($settings['custom_img_width']['size']);
                    $img_height = strval($settings['custom_img_height']['size']);
                    $img_url = wp_get_attachment_image($img_id, array($img_width, $img_height));
                } else {
                    $img_url = wp_get_attachment_image($img_id, 'full');
                }

                echo '<div class="masonry-gallery-item">';

                echo  '<div class="masonry-img">';

                if ($settings['lightbox_en'] == true) {
                    echo '<a rel="external" href="' . esc_url($image['url']) . ' ">';

                    if($settings['caption_en'] == true){

                        if($img_caption != ''){
                            echo '<div class="gallery-img-caption-wrap">';

                            echo '<div class="gallery-img-caption">';
                            echo esc_html($img_caption);
                            echo '</div>';

                            echo '</div>';
                        }
                    }

                    echo $img_url;
                    echo '</a>';
                } else {

                    if($settings['caption_en'] == true){

                        if($img_caption != ''){
                            echo '<div class="gallery-img-caption-wrap">';

                            echo '<div class="gallery-img-caption">';
                            echo esc_html($img_caption);
                            echo '</div>';

                            echo '</div>';
                        }
                    }

                    echo $img_url;
                }

                echo '</div>';
                echo '</div>';
            }

            echo '</div>';
            echo '</div>';

        }else if($settings['gallery_type'] == 'slider'){

         echo '<div class="gallery-slider" data-speed="'.esc_attr($settings['carousel_speed']).'">';


         foreach ($settings['gallery_imgs'] as $image) {

            $img_url = '';
            $img_id = $image['id'];
            $img_caption = '';

            if($settings['caption_en'] == true){
                $img_caption = wp_get_attachment_caption($image['id']);
            }


            if ($settings['custom_imgsize_en'] == true) {
                $img_width = strval($settings['custom_img_width']['size']);
                $img_height = strval($settings['custom_img_height']['size']);
                $img_url = wp_get_attachment_image($img_id, array($img_width, $img_height));
            } else {
                $img_url = wp_get_attachment_image($img_id, 'full');
            }

            echo '<div class="gallery-item">';

            echo  '<div class="gallery-img">';

            if ($settings['lightbox_en'] == true) {
                echo '<a rel="external" href="' . esc_url($image['url']) . ' ">';

                if($settings['caption_en'] == true){

                    if($img_caption != ''){
                        echo '<div class="gallery-img-caption-wrap">';

                        echo '<div class="gallery-img-caption">';
                        echo esc_html($img_caption);
                        echo '</div>';

                        echo '</div>';
                    }
                }

                echo $img_url;
                echo '</a>';
            } else {

                if($settings['caption_en'] == true){

                    if($img_caption != ''){
                        echo '<div class="gallery-img-caption-wrap">';

                        echo '<div class="gallery-img-caption">';
                        echo esc_html($img_caption);
                        echo '</div>';

                        echo '</div>';
                    }
                }

                echo $img_url;
            }

            echo '</div>';
            echo '</div>';
        }

        echo '</div>'; 

    }else if($settings['gallery_type'] == 'carousel'){


        echo '<div class="gallery-carousel" data-speed="'.esc_attr($settings['carousel_speed']).'" data-items-tablet="'.esc_attr($settings['carousel_cols_tablet']).'" data-items-mobile="'.esc_attr($settings['carousel_cols_mobile']).'" data-items="'.esc_attr($settings['carousel_cols']).'" data-arrows="'.esc_attr($settings['arrows_en']).'">';


        foreach ($settings['gallery_imgs'] as $image) {

            $img_url = '';
            $img_id = $image['id'];
            $img_caption = '';

            if($settings['caption_en'] == true){
                $img_caption = wp_get_attachment_caption($image['id']);
            }


            if ($settings['custom_imgsize_en'] == true) {
                $img_width = strval($settings['custom_img_width']['size']);
                $img_height = strval($settings['custom_img_height']['size']);
                $img_url = wp_get_attachment_image($img_id, array($img_width, $img_height));
            } else {
                $img_url = wp_get_attachment_image($img_id, 'full');
            }

            echo '<div class="gallery-item">';

            echo  '<div class="gallery-img">';

            if ($settings['lightbox_en'] == true) {
                echo '<a rel="external" href="' . esc_url($image['url']) . ' ">';

                if($settings['caption_en'] == true){

                    if($img_caption != ''){
                        echo '<div class="gallery-img-caption-wrap">';

                        echo '<div class="gallery-img-caption">';
                        echo esc_html($img_caption);
                        echo '</div>';

                        echo '</div>';
                    }
                }

                echo $img_url;
                echo '</a>';
            } else {

                if($settings['caption_en'] == true){

                    if($img_caption != ''){
                        echo '<div class="gallery-img-caption-wrap">';

                        echo '<div class="gallery-img-caption">';
                        echo esc_html($img_caption);
                        echo '</div>';

                        echo '</div>';
                    }
                }

                echo $img_url;
            }

            echo '</div>';
            echo '</div>';
        }

        echo '</div>';

    }else if($settings['gallery_type'] == 'justified'){



        echo '<div class="gallery-justified" data-caps="'. esc_attr($settings['caption_en']).'">';


        foreach ($settings['gallery_imgs'] as $image) {

            $img_url = '';
            $img_id = $image['id'];
            $img_caption = '';

            if($settings['caption_en'] == true){
                $img_caption = wp_get_attachment_caption($image['id']);
            }


            if ($settings['custom_imgsize_en'] == true) {
                $img_width = strval($settings['custom_img_width']['size']);
                $img_height = strval($settings['custom_img_height']['size']);
                $img_url = wp_get_attachment_image($img_id, array($img_width, $img_height));
            } else {
                $img_url = wp_get_attachment_image($img_id, 'full');
            }

            echo '<div class="gallery-item">';

            echo  '<div class="gallery-img">';

            if ($settings['lightbox_en'] == true) {
                echo '<a rel="external" href="' . esc_url($image['url']) . ' ">';

                if($settings['caption_en'] == true){

                    if($img_caption != ''){
                        echo '<div class="gallery-img-caption-wrap">';

                        echo '<div class="gallery-img-caption">';
                        echo esc_html($img_caption);
                        echo '</div>';

                        echo '</div>';
                    }
                }

                echo $img_url;
                echo '</a>';
            } else {

                if($settings['caption_en'] == true){

                    if($img_caption != ''){
                        echo '<div class="gallery-img-caption-wrap">';

                        echo '<div class="gallery-img-caption">';
                        echo esc_html($img_caption);
                        echo '</div>';

                        echo '</div>';
                    }
                }

                echo $img_url;
            }

            echo '</div>';
            echo '</div>';
        }

        echo '</div>';

    }else if ($settings['gallery_type'] == 'two_col' || $settings['gallery_type'] == 'three_col' || $settings['gallery_type'] == 'four_col') {

        $gallery_class = '';
        $gallery_num = '';
        $gallery_count = '';

        if ($settings['gallery_type'] == 'two_col'){
            $gallery_class = 'gallery-two-col-grid col-md-6';
            $gallery_num = 2;
            $gallery_count = 2;
        }else if ($settings['gallery_type'] == 'three_col'){
            $gallery_class = 'gallery-three-col-grid col-md-4';
            $gallery_num = 3;
            $gallery_count = 3;
        }else if ($settings['gallery_type'] == 'four_col'){
            $gallery_class = 'gallery-four-col-grid col-md-3';
            $gallery_num = 4;
            $gallery_count = 4;
        }

        echo '<div class="stronghold-gallery-grid">';

        foreach ($settings['gallery_imgs'] as $image) {

            $img_url = '';
            $img_id = $image['id'];
            $img_caption = '';

            if($settings['caption_en'] == true){
                $img_caption = wp_get_attachment_caption($image['id']);
            }


            if ($settings['custom_imgsize_en'] == true) {
                $img_width = strval($settings['custom_img_width']['size']);
                $img_height = strval($settings['custom_img_height']['size']);
                $img_url = wp_get_attachment_image($img_id, array($img_width, $img_height));
            } else {
                $img_url = wp_get_attachment_image($img_id, 'full');
            }

            if ($gallery_count == $gallery_num) {
                $gallery_count = 0;
                echo '<div class="row gallery-row">';
            }

            $gallery_count++;

            echo '<div class="gallery-col-item '.esc_attr($gallery_class).'">';

            echo  '<div class="gallery-img">';

            if ($settings['lightbox_en'] == true) {

                echo '<a rel="external" href="' . esc_url($image['url']) . ' ">';

                if($settings['caption_en'] == true){

                    if($img_caption != ''){
                        echo '<div class="gallery-img-caption-wrap">';

                        echo '<div class="gallery-img-caption">';
                        echo esc_html($img_caption);
                        echo '</div>';

                        echo '</div>';
                    }
                }

                echo $img_url;

                echo '</a>';
            } else {

                if($settings['caption_en'] == true){

                    if($img_caption != ''){
                        echo '<div class="gallery-img-caption-wrap">';

                        echo '<div class="gallery-img-caption">';
                        echo esc_html($img_caption);
                        echo '</div>';

                        echo '</div>';
                    }
                }

                echo $img_url;
            }

            echo '</div>';
            echo '</div>';



            if ($gallery_count == $gallery_num) {
                echo '</div>';
            }              

        }

        echo '</div>';
    } 

    echo '</div>';
}
}
