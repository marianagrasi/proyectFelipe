<?php

add_action('vc_before_init', 'dental_care_blog_carousel_VC');

function dental_care_blog_carousel_VC() {
    vc_map(array(
        "name" => esc_html__("Blog Carousel", 'dental-care'),
        "base" => "dental_care_blog_carousel",
        "class" => "",
        "category" => esc_html__('Dental Care', 'dental-care'),
        "params" => array(
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
                "heading" => esc_html__("Carousel Speed", 'dental-care'),
                "param_name" => "carousel_speed",
                "description" => esc_html__("Enter the number for the carousel speed. (Default: 5000)", 'dental-care')
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Number of carousel items", 'dental-care'),
                "param_name" => "carousel_items",
                "description" => esc_html__("Enter the number of blog posts columns to display in carousel.", 'dental-care')
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Enable Arrows", 'dental-care'),
                "param_name" => "arrows_en",
                "description" => esc_html__("Choose to enable or disable arrows on carousel.", 'dental-care'),
                "value" => array(
                    '' => '',
                    'On' => 'on',
                    'Off' => 'off',
                ),

            ),
        )
    ));
}

function dental_care_blog_carousel_shortcode($atts, $content = NULL) {
    global $post;
    extract(shortcode_atts(array(
        'param' => '',
        'title' => '',
        'carousel_speed' => '',
        'carousel_items' => '',
        'order_items' => '',
        'arrows_en' => '',
    ), $atts));

    if ($order_items == 'yes'){
        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'pagination' => true,
            'orderby' => 'title',
            'order'   => 'ASC',
            'posts_per_page' => -1
        );
    }else{
      $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'pagination' => true,
        'posts_per_page' => -1
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
    )
);

    // The Query
  $query = new WP_Query($args);
  if ($title != NULL) {
    $string = '<h3 class="dental-care-VC-title">' . esc_html($title) . '</h3>';
    $string .= '<div class="dental-care-blog-wrapper">';
} else {
    $string = '<div class="dental-care-blog-wrapper">';
}

if ($arrows_en == 'on') {
    $string .= '<div class="carousel_arrow_nav_top">';
    $string .= '<a class="btn arrow_prev_top"><i class="fa fa-chevron-left"></i></a>';
    $string .= '<a class="btn arrow_next_top"><i class="fa fa-chevron-right"></i></a>';
    $string .= '</div>';
}

$postcount = $query->post_count;

$string .= '<div class="dental-care-blog-items" data-speed="'.esc_attr($carousel_speed).'" data-items="'.esc_attr($carousel_items).'" data-count="'.esc_attr($postcount).'">';

while ($query->have_posts()) {
    $query->the_post();

    $post_thumbnail_url = wp_get_attachment_url(get_post_thumbnail_id());
    $blogtitle = get_the_title();
    $blogexcerpt = get_the_excerpt();
    $blogexcerpt = substr($blogexcerpt, 0, 150);
    $blogexcerpt .= "...";
    $bloglink = get_the_permalink();
    $blogimg = get_the_post_thumbnail($post->ID, 'dental-care-block-thumb');

    $string .= '<div class="dental-care-blog-item">';

    if (get_post_format() == 'gallery' || get_post_format() == 'video') {

        if (get_post_format() == 'gallery') {
            $images = explode(',', get_post_meta($post->ID, 'post_gallery_images_img', $single = true));
            if ($images) {
                $string .= '<div class="gallery-featured-index">';
                $string .= '<div class="blog-date-overlay"><span class="blog-overlay-day">' . esc_html(get_the_date('dS')) . '</span> <span class="blog-overlay-month">' . esc_html(get_the_date('M')) . '</span> </div>';

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
                $string .= '<div class="blog-date-overlay"><span class="blog-overlay-day">' . esc_html(get_the_date('dS')) . '</span> <span class="blog-overlay-month">' . esc_html(get_the_date('M')) . '</span> </div>';
                $string .= wp_kses($videourl, $allowed_html);
                $string .= '</div>';
            }
        }
    } else {
        $string .= '<div class="blog-index-featured"><a href="' . esc_url($bloglink) . '">' . $blogimg . '</a><div class="blog-date-overlay"><span class="blog-overlay-day">' . esc_html(get_the_date('dS')) . '</span> <span class="blog-overlay-month">' . esc_html(get_the_date('M')) . '</span> </div></div>';
    }
    $string .= '<div class="dental-care-blog-info">';
    $string .= '<h5><a href="' . esc_url($bloglink) . '">' . esc_html($blogtitle) . '</a></h5>';
    $string .= '<p class="">' . esc_html($blogexcerpt) . ' </p>';


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

}
wp_reset_postdata();
$string .= '</div></div> ';
return $string;
}
