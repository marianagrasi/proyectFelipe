<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Blog
 */

class Dental_Care_Blog extends Widget_Base {

    /**
     * Retrieve the widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'dental-care-blog';
    }

    /**
     * Retrieve the widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Blog', 'dental-care');
    }

    /**
     * Retrieve the widget icon.
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-posts-group';
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

            return apply_filters('dental_care_extensions_allowed_html', $allowed);
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
            'section_blog_settings', [
                'label' => esc_html__('Blog Settings', 'dental-care'),
            ]
        );


        $this->add_control(
            'blog_type', [
                'label' => esc_html__('Blog Display Type', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                "options" => array(
                    "blog_carousel" => "Blog Carousel",
                    "blog_grid" => "Blog Grid",
                ),
                'description' => esc_html__('Choose blog display type.', 'dental-care'),
            ]
        );

        $this->add_control(
            'blog_grid_design',
            [
                'label' => esc_html__('Blog Design', 'dental-care'),
                'type' => Controls_Manager::SELECT,
                "options" => array(
                    "" => "",
                    "design_one" => "Design One",
                    "design_two" => "Design Two",
                ),
                'condition' => [
                    'blog_type' => 'blog_grid',
                ],
                'description' => esc_html__('Choose services widget design.', 'dental-care'),
            ]
        );

        $this->add_control(
            'blog_excerpt_en', [
                'label' => esc_html__('Post Excerpt', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'return_value' => 'true',
            ]
        );

        $this->add_control(
            'carousel_speed', [
                'label' => esc_html_x('Carousel Speed (ms)', 'dental-care'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter the number for the carousel speed. (Default: 5000)', 'dental-care'),
                'condition' => [
                    'blog_type' => 'blog_carousel',
                ],
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
                'description' => esc_html__('Enter the number of blog columns to display in carousel.', 'dental-care'),
                'condition' => [
                    'blog_type' => 'blog_carousel',
                ],
            ]
        );

        $this->add_control(
            'order_items', [
                'label' => esc_html__('Order by title', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'description' => esc_html__('Choose if to order items', 'dental-care'),
                'return_value' => 'true',
            ]
        );

        $this->add_control(
            'arrows_en', [
                'label' => esc_html__('Navigation Arrows', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'return_value' => 'true',
                'condition' => [
                    'blog_type' => 'blog_carousel',
                ],
            ]
        );


        $this->add_control(
            'filter_blog_en', [
                'label' => esc_html__('Filter blog items by category', 'dental-care'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('ON', 'dental-care'),
                'label_off' => esc_html__('OFF', 'dental-care'),
                'description' => esc_html__('Choose if to filter items', 'dental-care'),
                'return_value' => 'true',
            ]
        );

        $this->add_control(
            'blog_category', [
                'label' => esc_html__('Blog Category', 'dental-care'),
                'type' => BlogCategorySelect_Control::BlogCategorySelect,
                'condition' => [
                    'filter_blog_en' => 'true',
                ],
                'description' => esc_html__('Choose a blog category.', 'dental-care'),
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_blog_style', [
                'label' => esc_html__('Blog Style', 'dental-care'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'blog_post_title_color', [
                'label' => esc_html_x('Post Title Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' =>[
                    '{{WRAPPER}} .entry-title-link' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'blog_post_content_color', [
                'label' => esc_html_x('Post Content Color', 'dental-care'),
                'type' => Controls_Manager::COLOR,
                'selectors' =>[
                    '{{WRAPPER}} .post-excerpt' => 'color: {{VALUE}}',
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
        global $post;

        $allowed_html = $this->dental_care_extensions_allowed_html();
        $num_items = '';

        $carousel_id = 'carousel-'.mt_rand();


        if ($settings['num_items'] == "") {
            $num_items = -1;
        }else{
            $num_items = $settings['num_items'];
        }

        if ($settings['order_items'] == true) {
            if ($settings['blog_category'] != '') {
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'pagination' => true,
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'posts_per_page' => $num_items,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'field' => 'slug',
                            'terms' => $settings['blog_category'],
                        ),
                    ),
                );
            } else {
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'pagination' => true,
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'posts_per_page' => $num_items,
                );
            }
        } else {
            if ($settings['blog_category'] != '') {
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'pagination' => true,
                    'posts_per_page' => $num_items,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'field' => 'slug',
                            'terms' => $settings['blog_category'],
                        ),
                    ),
                );
            } else {
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'pagination' => true,
                    'posts_per_page' => $num_items,
                );
            }
        }


        // The Query
        $query = new WP_Query($args);

        if($settings['blog_type'] == 'blog_carousel'){

            echo '<div class="stronghold-blog-wrapper">';

            if($settings['arrows_en'] == true){
               echo '<div class="carousel_arrow_nav_top">';
               echo '<a class="btn arrow_prev_top"><i class="fa fa-chevron-left"></i></a>';
               echo '<a class="btn arrow_next_top"><i class="fa fa-chevron-right"></i></a>';
               echo '</div>';
           }

           echo '<div id="'.esc_attr($carousel_id).'" class="stronghold-blog-carousel dental-care-blog-items" data-speed="' . esc_attr($settings['carousel_speed']) . '" data-items="' . esc_attr($settings['carousel_items']) . '">';


           while ($query->have_posts()) {
            $query->the_post();

            $post_thumbnail_url = wp_get_attachment_url(get_post_thumbnail_id());
            $blogtitle = get_the_title();
            $blogexcerpt = get_the_excerpt();
            $blogexcerpt = substr($blogexcerpt, 0, 150);
            $blogexcerpt .= "...";
            $bloglink = get_the_permalink();
            $blogimg = get_the_post_thumbnail($post->ID, 'dental-care-block-thumb');

            echo '<div class="dental-care-blog-item">';

            if (get_post_format() == 'gallery' || get_post_format() == 'video') {

                if (get_post_format() == 'gallery') {
                    $images = explode(',', get_post_meta($post->ID, 'post_gallery_images_img', $single = true));
                    if ($images) {
                        echo '<div class="gallery-featured-index">';
                        echo '<div class="blog-date-overlay"><span class="blog-overlay-day">' . esc_html(get_the_date('dS')) . '</span> <span class="blog-overlay-month">' . esc_html(get_the_date('M')) . '</span> </div>';

                        echo '<div class="gallery-featured-slider">';

                        foreach ($images as $id) {
                            if (!empty($id)) {
                                $blog_img = wp_get_attachment_image($id, 'dental-care-block-thumb');
                                echo '<a class="gallery-slide-img" href="' . esc_url($bloglink) . '"> ' . $blog_img . ' ';
                                echo '</a>';
                            }
                        }
                        echo '</div></div>';
                    }
                } if (get_post_format() == 'video') {
                    $videourl = get_post_meta($post->ID, 'video_url', $single = true);
                    if ($videourl) {
                        echo '<div class="video-featured-index">';
                        echo '<div class="blog-date-overlay"><span class="blog-overlay-day">' . esc_html(get_the_date('dS')) . '</span> <span class="blog-overlay-month">' . esc_html(get_the_date('M')) . '</span> </div>';
                        echo wp_kses($videourl, $allowed_html);
                        echo '</div>';
                    }
                }
            } else {
                echo '<div class="blog-index-featured"><a href="' . esc_url($bloglink) . '">' . $blogimg . '</a><div class="blog-date-overlay"><span class="blog-overlay-day">' . esc_html(get_the_date('dS')) . '</span> <span class="blog-overlay-month">' . esc_html(get_the_date('M')) . '</span> </div></div>';
            }
            echo '<div class="dental-care-blog-info">';
            echo '<h5><a class="entry-title-link" href="' . esc_url($bloglink) . '">' . esc_html($blogtitle) . '</a></h5>';

            if ($settings['blog_excerpt_en'] == true) {
                echo '<div class="post-excerpt">' . esc_html($blogexcerpt) . ' </div>';
            }


            echo '<div class="entry-meta entry-meta-bottom">';
            echo '<div class="author-info">';
            echo '<img src="' . esc_url(get_avatar_url(get_the_author_meta('ID'))) . '" alt="Author Image">';
            echo '<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">';
            echo esc_html(get_the_author());
            echo '</a>';
            echo '</div>';
            echo '</div>';

            echo '</div>';
            echo '</div>';

        }

        wp_reset_postdata();

        echo '</div>';

        echo '</div>';

    }else if ($settings['blog_type'] == 'blog_grid'){

        if ($settings['blog_grid_design'] == 'design_one' || $settings['blog_grid_design'] == '') {



            $post_counter = 2;
            $row_check = "right";

            while ($query->have_posts()) {
                $query->the_post();

                if (has_post_thumbnail()) {
                    if ($post_counter == 2) {
                        echo '<div class="row blog-grid-widget-row">';
                        if ($row_check == "left") {
                            $row_check = "right";
                        } elseif ($row_check == "right") {
                            $row_check = "left";
                        }
                        $post_counter = 0;
                    }

                    $post_counter++;
                    $blogtitle = get_the_title();
                    $blogexcerpt = get_the_excerpt();
                    $blogexcerpt = substr($blogexcerpt, 0, 250);
                    $bloglink = get_the_permalink();
                    $blogimg = get_the_post_thumbnail($post->ID, 'dental-care-blog-grid-widget-thumb');

                    if ($row_check == "left") {
                        echo '<div class="col-md-6 col-sm-12 col-xs-12  blog-grid-widget-item-left">';
                    } else if ($row_check == "right") {
                        echo '<div class="col-md-6 col-sm-12 col-xs-12  blog-grid-widget-item-right">';
                    }

                    if (get_post_format() == 'gallery' || get_post_format() == 'video') {

                        if (get_post_format() == 'gallery') {
                            $images = explode(',', get_post_meta($post->ID, 'post_gallery_images_img', $single = true));
                            if ($images) {
                                echo '<div class="col-md-6 col-sm-12 col-xs-12 no-padding blog-grid-widget-featured">';
                                echo '<div class="gallery-featured-index">';
                                echo '<div class="blog-date-overlay"><span class="blog-overlay-day">' . esc_html(get_the_date('dS')) . '</span> <span class="blog-overlay-month">' . esc_html(get_the_date('M')) . '</span> </div>';

                                echo '<div class="gallery-featured-slider-grid-widget">';

                                foreach ($images as $id) {
                                    if (!empty($id)) {
                                        $blog_img = wp_get_attachment_image($id, 'dental-care-carousel-thumb');
                                        echo '<a class="gallery-slide-img" href="' . esc_url($bloglink) . '"> ' . $blog_img . ' ';
                                        echo '</a>';
                                    }
                                }
                                echo '</div></div>';
                            }
                        } else if (get_post_format() == 'video') {
                            $videourl = get_post_meta($post->ID, 'video_url', $single = true);
                            if ($videourl) {
                                echo '<div class="col-md-6 col-sm-12 col-xs-12 no-padding blog-grid-widget-featured">';
                                echo '<div class="video-featured-index">';
                                echo '<div class="blog-date-overlay"><span class="blog-overlay-day">' . esc_html(get_the_date('dS')) . '</span> <span class="blog-overlay-month">' . esc_html(get_the_date('M')) . '</span> </div>';
                                echo wp_kses($videourl, $allowed_html);
                                echo '</div>';
                            }
                        }
                    } else {
                        echo '<div class="col-md-6 col-sm-12 col-xs-12 no-padding blog-grid-widget-featured">';
                        echo '<div class="blog-index-featured"><a href="' . esc_url($bloglink) . '">' . $blogimg . '</a><div class="blog-date-overlay"><span class="blog-overlay-day">' . esc_html(get_the_date('dS')) . '</span> <span class="blog-overlay-month">' . esc_html(get_the_date('M')) . '</span> </div></div>';
                    }

                    echo '</div>';
                    echo '<div class="col-md-6 col-sm-12 col-xs-12  blog-grid-widget-info">';

                    echo '<h6><a class="entry-title-link" href="' . esc_url($bloglink) . '">' . esc_html($blogtitle) . '</a></h6>';
                    echo '<div class="entry-meta">';
                    $dental_care_categories_list = get_the_category_list(esc_html__(', ', 'dental-care'));
                    if ($dental_care_categories_list && dental_care_categorized_blog()) {
                        echo '<span class="cat-links">in: ' . wp_kses($dental_care_categories_list, $allowed_html) . '</span>';
                    }
                    echo '</div>';
                    echo '<div class="post-excerpt">' . esc_html($blogexcerpt) . ' </div>';

                    echo '</div>';
                    echo '</div>';

                    if ($post_counter >= 2) {
                        echo '</div>';
                    }
                }
            }

            wp_reset_postdata();

            if ($post_counter < 2) {
                echo '</div>';
            }


            echo '</div> ';


        }else if ($settings['blog_grid_design'] == 'design_two') {


           echo '<div class="dental-care-blog-grid-wrapper">';

           $blog_count = 0;
           echo '<div class="row">';

           while ($query->have_posts()) {
            $query->the_post();

            $post_thumbnail_url = wp_get_attachment_url(get_post_thumbnail_id());
            $blogtitle = get_the_title();

            if ($settings['blog_excerpt_en'] == true) {
                $blogexcerpt = get_the_excerpt();
                $blogexcerpt = substr($blogexcerpt, 0, 150);
                $blogexcerpt .= "...";
            }

            $bloglink = get_the_permalink();
            $blogimg = get_the_post_thumbnail($post->ID, 'dental-care-block-thumb');

            echo '<div class="dental-care-blog-item col-md-4">';

            if (get_post_format() == 'gallery' || get_post_format() == 'video') {

                if (get_post_format() == 'gallery') {
                    $images = explode(',', get_post_meta($post->ID, 'post_gallery_images_img', $single = true));
                    if ($images) {
                        echo '<div class="gallery-featured-index">';        
                        echo '<div class="gallery-featured-slider">';

                        foreach ($images as $id) {
                            if (!empty($id)) {
                                $blog_img = wp_get_attachment_image($id, 'dental-care-block-thumb');
                                echo '<a class="gallery-slide-img" href="' . esc_url($bloglink) . '"> ' . $blog_img . ' ';
                                echo '</a>';
                            }
                        }
                        echo '</div></div>';
                    }
                } if (get_post_format() == 'video') {
                    $videourl = get_post_meta($post->ID, 'video_url', $single = true);
                    if ($videourl) {
                        echo '<div class="video-featured-index">';
                        echo wp_kses($videourl, $allowed_html);
                        echo '</div>';
                    }
                }
            } else {
                echo '<div class="blog-index-featured"><a href="' . esc_url($bloglink) . '">' . $blogimg . '</a><div class="blog-date-overlay"><span class="blog-overlay-day">' . esc_html(get_the_date('dS')) . '</span> <span class="blog-overlay-month">' . esc_html(get_the_date('M')) . '</span> </div></div>';
            }
            echo '<div class="dental-care-blog-info">';
            echo '<h5><a class="entry-title-link" href="' . esc_url($bloglink) . '">' . esc_html($blogtitle) . '</a></h5>';

            if ($settings['blog_excerpt_en'] == true) {
                echo '<div class="post-excerpt">' . esc_html($blogexcerpt) . ' </div>';
            }


            echo '<div class="entry-meta entry-meta-bottom">';
            echo '<div class="author-info">';
            echo '<img src="' . esc_url(get_avatar_url(get_the_author_meta('ID'))) . '" alt="Author Image">';
            echo '<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">';
            echo esc_html(get_the_author());
            echo '</a>';
            echo '</div>';
            echo '</div>';

            echo '</div>';
            echo '</div>';

            $blog_count++;

            if ($blog_count == 3) {
                $blog_count = 0;
                echo '</div>';
                echo '<div class="row">';
            }
        }

        if ($blog_count < 3) {
            echo '</div>';
        }

        echo '</div> ';


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
