<?php

add_action('vc_before_init', 'dental_care_blog_grid_VC');

function dental_care_blog_grid_VC() {
    vc_map(array(
        "name" => esc_html__("Blog Grid", 'dental-care'),
        "base" => "dental_care_blog_grid",
        "class" => "",
        "category" => esc_html__('Dental Care', 'dental-care'),
        "params" => array(
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Blog Grid Design", 'dental-care'),
                "param_name" => "blog_grid_design",
                "description" => esc_html__("Choose a blog grid design", 'dental-care'),
                "value" => array(
                    '' => '',
                    'Design 1' => 'design_one',
                    'Design 2' => 'design_two',
                )
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Post Excerpt", 'dental-care'),
                "param_name" => "blog_excerpt_en",
                "description" => esc_html__("Enable post excerpts.", 'dental-care'),
                "value" => array(
                    "" => "",
                    "On" => "on",
                    "Off" => "off",
                ),
                "dependency" => array("element" => "blog_grid_design", "value" => array("design_two")),
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Title", 'dental-care'),
                "param_name" => "title",
                "description" => esc_html__("Title text Here. Leave blank if no title is needed.", 'dental-care')
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Order by title", 'dental-care'),
                "param_name" => "order_items",
                "description" => esc_html__("Choose if to order items", 'dental-care'),
                "value" => array(
                    '' => '',
                    'Yes' => 'yes',
                    'No' => 'no',
                )
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Number of grid items", 'dental-care'),
                "param_name" => "grid_items",
                "description" => esc_html__("Enter the number of blog posts to display. -1 to display all posts.", 'dental-care')
            ),
        )
    ));
}

function dental_care_blog_grid_shortcode($atts, $content = NULL) {
    global $post;
    extract(shortcode_atts(array(
        'param' => '',
        'title' => '',
        'grid_items' => '',
        'order_items' => '',
        'blog_grid_design' => '',
        'blog_excerpt_en' => '',
                    ), $atts));

    if ($grid_items == NULL) {
        $grid_items = -1;
    }

    if ($order_items == 'yes') {
        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'pagination' => true,
            'orderby' => 'title',
            'order' => 'ASC',
            'posts_per_page' => $grid_items
        );
    } else {
        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'pagination' => true,
            'posts_per_page' => $grid_items
        );
    }

    $allowed_html = array(
        'webkitallowfullscreen' => array(),
        'mozallowfullscreen' => array(),
        'allowfullscreen' => array(),
        'iframe' => array(
            'src' => array(),
            'width' => array(),
            'height' => array(),
            'frameborder' => array(),
        ),
        'a' => array(
            'href' => array(),
            'rel' => array(),
            'class' => array(),
            'style' => array(),
        ),
    );

    // The Query
    $query = new WP_Query($args);

    if ($blog_grid_design == 'design_one' || $blog_grid_design == '') {

        if ($title != NULL) {
            $string = '<h3 class="dental-care-VC-title">' . esc_html($title) . '</h3>';
            $string .= '<div class="dental-care-blog-grid-widget col-md-12">';
        } else {
            $string = '<div class="dental-care-blog-grid-widget col-md-12">';
        }


        $post_counter = 2;
        $row_check = "right";

        while ($query->have_posts()) {
            $query->the_post();

            if (has_post_thumbnail()) {
                if ($post_counter == 2) {
                    $string .= '<div class="row blog-grid-widget-row">';
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
                    $string .= '<div class="col-md-6 col-sm-12 col-xs-12  blog-grid-widget-item-left">';
                } else if ($row_check == "right") {
                    $string .= '<div class="col-md-6 col-sm-12 col-xs-12  blog-grid-widget-item-right">';
                }

                if (get_post_format() == 'gallery' || get_post_format() == 'video') {

                    if (get_post_format() == 'gallery') {
                        $images = explode(',', get_post_meta($post->ID, 'post_gallery_images_img', $single = true));
                        if ($images) {
                            $string .= '<div class="col-md-6 col-sm-12 col-xs-12 no-padding blog-grid-widget-featured">';
                            $string .= '<div class="gallery-featured-index">';
                            $string .= '<div class="blog-date-overlay"><span class="blog-overlay-day">' . esc_html(get_the_date('dS')) . '</span> <span class="blog-overlay-month">' . esc_html(get_the_date('M')) . '</span> </div>';

                            $string .= '<div class="gallery-featured-slider-grid-widget">';

                            foreach ($images as $id) {
                                if (!empty($id)) {
                                    $blog_img = wp_get_attachment_image($id, 'dental-care-carousel-thumb');
                                    $string .= '<a class="gallery-slide-img" href="' . esc_url($bloglink) . '"> ' . $blog_img . ' ';
                                    $string .= '</a>';
                                }
                            }
                            $string .= '</div></div>';
                        }
                    } else if (get_post_format() == 'video') {
                        $videourl = get_post_meta($post->ID, 'video_url', $single = true);
                        if ($videourl) {
                            $string .= '<div class="col-md-6 col-sm-12 col-xs-12 no-padding blog-grid-widget-featured">';
                            $string .= '<div class="video-featured-index">';
                            $string .= '<div class="blog-date-overlay"><span class="blog-overlay-day">' . esc_html(get_the_date('dS')) . '</span> <span class="blog-overlay-month">' . esc_html(get_the_date('M')) . '</span> </div>';
                            $string .= wp_kses($videourl, $allowed_html);
                            $string .= '</div>';
                        }
                    }
                } else {
                    $string .= '<div class="col-md-6 col-sm-12 col-xs-12 no-padding blog-grid-widget-featured">';
                    $string .= '<div class="blog-index-featured"><a href="' . esc_url($bloglink) . '">' . $blogimg . '</a><div class="blog-date-overlay"><span class="blog-overlay-day">' . esc_html(get_the_date('dS')) . '</span> <span class="blog-overlay-month">' . esc_html(get_the_date('M')) . '</span> </div></div>';
                }

                $string .= '</div>';
                $string .= '<div class="col-md-6 col-sm-12 col-xs-12  blog-grid-widget-info">';

                $string .= '<h6><a href="' . esc_url($bloglink) . '">' . esc_html($blogtitle) . '</a></h6>';
                $string .= '<div class="entry-meta">';
                $dental_care_categories_list = get_the_category_list(esc_html__(', ', 'dental-care'));
                if ($dental_care_categories_list && dental_care_categorized_blog()) {
                    $string .= '<span class="cat-links">in: ' . wp_kses($dental_care_categories_list, $allowed_html) . '</span>';
                }
                $string .= '</div>';
                $string .= '<p class="">' . esc_html($blogexcerpt) . ' </p>';

                $string .= '</div>';
                $string .= '</div>';

                if ($post_counter >= 2) {
                    $string .= '</div>';
                }
            }
        }

        wp_reset_postdata();

        if ($post_counter < 2) {
            $string .= '</div>';
        }


        $string .= '</div> ';
    } else if ($blog_grid_design == 'design_two') {
        $string = '<div class="dental-care-blog-grid-wrapper">';

        $blog_count = 0;
        $string .= '<div class="row">';

        while ($query->have_posts()) {
            $query->the_post();

                $post_thumbnail_url = wp_get_attachment_url(get_post_thumbnail_id());
                $blogtitle = get_the_title();

                if ($blog_excerpt_en == 'on') {
                    $blogexcerpt = get_the_excerpt();
                    $blogexcerpt = substr($blogexcerpt, 0, 150);
                    $blogexcerpt .= "...";
                }

                $bloglink = get_the_permalink();
                $blogimg = get_the_post_thumbnail($post->ID, 'dental-care-block-thumb');

                $string .= '<div class="dental-care-blog-item col-md-4">';

                if (get_post_format() == 'gallery' || get_post_format() == 'video') {

                    if (get_post_format() == 'gallery') {
                        $images = explode(',', get_post_meta($post->ID, 'post_gallery_images_img', $single = true));
                        if ($images) {
                            $string .= '<div class="gallery-featured-index">';

                            $string .= '<div class="gallery-featured-slider">';

                            foreach ($images as $id) {
                                if (!empty($id)) {
                                    $blog_img = wp_get_attachment_image($id, 'dental-care-block-thumb');
                                    $string .= '<a class="gallery-slide-img" href="' . esc_url($bloglink) . '"> ' . $blog_img . ' ';
                                    $string .= '</a>';
                                }
                            }
                            $string .= '</div></div>';
                        }
                    } if (get_post_format() == 'video') {
                        $videourl = get_post_meta($post->ID, 'video_url', $single = true);
                        if ($videourl) {
                            $string .= '<div class="video-featured-index">';

                            $string .= wp_kses($videourl, $allowed_html);
                            $string .= '</div>';
                        }
                    }
                } else {
                    $string .= '<div class="blog-index-featured"><a href="' . esc_url($bloglink) . '">' . $blogimg . '</a><div class="blog-date-overlay"><span class="blog-overlay-day">' . esc_html(get_the_date('dS')) . '</span> <span class="blog-overlay-month">' . esc_html(get_the_date('M')) . '</span> </div></div>';
                }
                $string .= '<div class="dental-care-blog-info">';
                $string .= '<h5><a href="' . esc_url($bloglink) . '">' . esc_html($blogtitle) . '</a></h5>';

                if ($blog_excerpt_en == 'on') {
                    $string .= '<p class="">' . esc_html($blogexcerpt) . ' </p>';
                }


                $string .= '<div class="entry-meta entry-meta-bottom">';
                $string .= '<div class="author-info">';
                $string .= '<img src="' . esc_url(get_avatar_url(get_the_author_meta('ID'))) . '" alt="Author Image">';
                $string .= '<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">';
                $string .= esc_html(get_the_author());
                $string .= '</a>';
                $string .= '</div>';
                $string .= '</div>';

                $string .= '</div>';
                $string .= '</div>';

            $blog_count++;

            if ($blog_count == 3) {
                $blog_count = 0;
                $string .= '</div>';
                $string .= '<div class="row">';
            }
        }

        if ($blog_count < 3) {
            $string .= '</div>';
        }

        $string .= '</div> ';
    }

    return $string;
}
