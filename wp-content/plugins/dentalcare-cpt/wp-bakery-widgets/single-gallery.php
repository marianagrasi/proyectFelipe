<?php

add_action('vc_before_init', 'dental_care_single_gallery_VC');

function dental_care_single_gallery_VC() {

    $args = array(
        'post_type' => 'gallery',
        'post_status' => 'publish',
        'pagination' => true,
        'posts_per_page' => -1
    );
    $galleries = get_posts($args);

    $gallerylist = array();
    $gallerylist[] = " ";

    foreach ($galleries as $gallery) {
        $gallerylist[] = $gallery->post_title;
    }

    vc_map(array(
        "name" => esc_html__("Single Gallery", 'dental-care'),
        "base" => "dental_care_single_gallery",
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
                "type" => "gallery_select",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Select Gallery", 'dental-care'),
                "param_name" => "gallery_select",
                "description" => esc_html__("Choose a gallery.", 'dental-care'),
                "value" => $gallerylist,
            ),
        )
    ));
}

function dental_care_single_gallery_shortcode($atts, $content = NULL) {
    global $post;
    extract(shortcode_atts(array(
        'param' => '',
        'title' => '',
        'gallery_select' => ''
                    ), $atts));


    $args = array(
        'post_type' => 'gallery',
        'post_status' => 'publish',
        'pagination' => true,
        'p' => $gallery_select
    );

    // The Query
    $query = new WP_Query($args);
    if ($title != NULL && isset($title)) {
        $string = '<h3 class="gl-VC-title">' . esc_html($title) . '</h3>';
        $string .= '<div class="dental-care-gallery-widget"> ';
    } else {
        $string = '<div class="dental-care-gallery-widget"> ';
    }

    $query->the_post();

    $gallery_type = get_post_meta($post->ID, 'gallery_select', $single = true);
    $dental_care_images = explode(',', get_post_meta($post->ID, 'gallery_images_img', $single = true));
    $dental_care_video_gallery_list = get_post_meta($post->ID, 'video_gallery_list', $single = true);
    $dental_care_filter_gallery_list = get_post_meta($post->ID, 'filter_gallery_list', $single = true);
    $dental_care_captions_en = get_post_meta($post->ID, 'image_captions_en', $single = true);
    $dental_care_lightbox_en = get_post_meta($post->ID, 'image_lightbox_en', $single = true);
    $dental_care_links_en = get_post_meta($post->ID, 'image_links_en', $single = true);


    if ($dental_care_images) {
        if ($gallery_type == 'gallery_slider') {
            if ($dental_care_images) {

                if($dental_care_lightbox_en == 'on' || $dental_care_lightbox_en == NULL){
                    $string .= '<div class="gallery-slider gallery-lightbox-en">';
                }else{
                    $string .= '<div class="gallery-slider">';
                }
                foreach ($dental_care_images as $id) {
                    if (!empty($id)) {
                        $full_src = wp_get_attachment_image_src($id, 'full');
                        $gallery_img = wp_get_attachment_image($id, 'full');
                        $string .= '<div class="gallery-slider-img">';

                        if ($dental_care_links_en == 'on' || $dental_care_links_en == NULL) {
                                        $string .= '<a class="gallery-slide-img" href="' . esc_url($full_src[0]) . '"> ' . $gallery_img . ' ';
                                        $string .= '</a>';
                                    } else {
                                        $string .= $gallery_img;
                                    }

                                    if ($dental_care_captions_en == "on") {

                                        if (wp_get_attachment_caption($id) != NULL) {
                                            $caption = wp_get_attachment_caption($id);
                                        } else {
                                            $caption = ' ';
                                        }

                        $string .= '<div class="gallery-img-caption">' . esc_html($caption) . '</div>';
                    }
                     $string .= '</div>';

                    }
                }
                $string .= '</div>';
            }
        } else if ($gallery_type == 'gallery_carousel') {
            if ($dental_care_images) {

                        if($dental_care_lightbox_en == 'on' || $dental_care_lightbox_en == NULL){
                                $string .= '<div class="gallery-lightbox-en gallery-carousel">';
                            }else{
                                $string .= '<div class="gallery-carousel">';
                            }
                foreach ($dental_care_images as $id) {
                    if (!empty($id)) {
                        $full_src = wp_get_attachment_image_src($id, 'full');
                        $gallery_img = wp_get_attachment_image($id, 'full');
                        $string .= '<div class="gallery-carousel-img">';

                        if ($dental_care_links_en == 'on' || $dental_care_links_en == NULL) {
                                        $string .= '<a class="gallery-slide-img" href="' . esc_url($full_src[0]) . '"> ' . $gallery_img . ' ';
                                        $string .= '</a>';
                                    } else {
                                        $string .= $gallery_img;
                                    }

                                    if ($dental_care_captions_en == "on") {
                                        if (wp_get_attachment_caption($id) != NULL) {
                                            $caption = wp_get_attachment_caption($id);
                                        } else {
                                            $caption = ' ';
                                        }

                        $string .= '<div class="gallery-img-caption">' . esc_html($caption) . '</div>';
                    }
                    $string .= '</div>';
                    }
                }
                $string .= '</div>';
            }
        } else if ($gallery_type == "gallery_justified") {
            
                        if($dental_care_lightbox_en == 'on' || $dental_care_lightbox_en == NULL){
                                $string .= '<div class="gallery-lightbox-en gallery-justified">';
                            }else{
                               $string .= '<div class="gallery-justified" data-caps="'. esc_attr($caps_en).'">';
                            }
            foreach ($dental_care_images as $id) {
                if (!empty($id)) {
                    $full_src = wp_get_attachment_image_src($id, 'full');
                        $gallery_img = wp_get_attachment_image($id, 'full');
                        if ($dental_care_links_en == 'on' || $dental_care_links_en == NULL) {
                                        $string .= '<a href="' . esc_url($full_src[0]) . '"> <img src="' . esc_url($full_src[0]) . '" alt="';

                                        if ($dental_care_captions_en == "on") {

                                            if (wp_get_attachment_caption($id) != NULL) {
                                                $caption = wp_get_attachment_caption($id);
                                            } else {
                                                $caption = ' ';
                                            }

                                            $string .= esc_attr($caption);
                                        }

                                        $string .= '"/> ';

                                        $string .= '</a>';
                                    } else {

                                        $string .= '<img src="' . esc_url($full_src[0]) . '" alt="';

                                        if ($dental_care_captions_en == "on") {

                                            if (wp_get_attachment_caption($id) != NULL) {
                                                $caption = wp_get_attachment_caption($id);
                                            } else {
                                                $caption = ' ';
                                            }

                                            $string .= esc_attr($caption);
                                        }

                                        $string .='"/> ';
                                    }
                }
            }
            $string .= '</div>';
        } else if ($gallery_type == "gallery_col_two") {
            $img_count = 0;
                        if($dental_care_lightbox_en == 'on' || $dental_care_lightbox_en == NULL){
                                $string .= '<div class="gallery-lightbox-en gallery-two-col">';
                            }else{
                                $string .= '<div class="gallery-two-col">';
                            }
            $string .= '<div class="row">';
            foreach ($dental_care_images as $id) {
                if (!empty($id)) {
                     $full_src = wp_get_attachment_image_src($id, 'full');
                    $gallery_img = wp_get_attachment_image($id, 'full');
                    $string .= '<div class="col-md-6 gallery-col-item">';
                    $string .= '<div class="gallery-col-img-wrapper">';

                   if ($dental_care_links_en == 'on' || $dental_care_links_en == NULL) {
                                        $string .= '<a href="' . esc_url($full_src[0]) . '"><span class="gallery-col-img-overlay">
                                  <i class="fa fa-link"></i>
                                   </span> ' . $gallery_img . ' ';

                                        $string .= '</a>';
                                    } else {
                                        $string .= '<span class="gallery-col-img-overlay">
                                   <i class="fa fa-link"></i>
                                   </span> ' . $gallery_img . ' ';
                                    }

                    $string .= '</div>';

                    if ($dental_care_captions_en == "on") {

                     if (wp_get_attachment_caption($id) != NULL) {
                                            $caption = wp_get_attachment_caption($id);
                                        } else {
                                            $caption = ' ';
                                        }

                    $string .= '<div class="gallery-img-caption">' . esc_html($caption) . '</div>';
                }

                    $string .= '</div>';
                    $img_count++;
                    if ($img_count == 2) {
                        $img_count = 0;
                        $string .= '</div>';
                        $string .= '<div class="row">';
                    }
                }
            }
            if ($img_count < 2) {

                $string .= '</div>';
            }
            $string .= '</div>';
        }
        else if ($gallery_type == "gallery_col_three") {
            $img_count = 0;
                        if($dental_care_lightbox_en == 'on' || $dental_care_lightbox_en == NULL){
                                $string .= '<div class="gallery-lightbox-en gallery-three-col">';
                            }else{
                                $string .= '<div class="gallery-three-col">';
                            }
            $string .= '<div class="row">';
            foreach ($dental_care_images as $id) {
                if (!empty($id)) {
                     $full_src = wp_get_attachment_image_src($id, 'full');
                                    $gallery_img = wp_get_attachment_image($id, 'full');
                                    $string .= '<div class="col-md-4 gallery-col-item">';
                                    $string .= '<div class="gallery-col-img-wrapper">';

                                    if ($dental_care_links_en == 'on' || $dental_care_links_en == NULL) {
                                        $string .= '<a href="' . esc_url($full_src[0]) . '"><span class="gallery-col-img-overlay">
                                <i class="fa fa-link"></i>
                                   </span> ' . $gallery_img . ' ';

                                        $string .= '</a>';
                                    } else {

                                        $string .= '<span class="gallery-col-img-overlay">
                                   <i class="fa fa-link"></i>
                                   </span> ' . $gallery_img . ' ';
                                    }

                                    $string .= '</div>';

                                    if ($dental_care_captions_en == "on") {

                                     if (wp_get_attachment_caption($id) != NULL) {
                                            $caption = wp_get_attachment_caption($id);
                                        } else {
                                            $caption = ' ';
                                        }

                                    $string .= '<div class="gallery-img-caption">' . esc_html($caption) . '</div>';
                                }

                                    $string .= '</div>';
                                    $img_count++;
                                    if ($img_count == 3) {
                                        $img_count = 0;
                                        $string .= '</div>';
                                        $string .= '<div class="row">';
                                    }
                }
            }
            if ($img_count < 3) {

                $string .= '</div>';
            }
            $string .= '</div>';
        } else if ($gallery_type == "gallery_col_four") {
            $img_count = 0;
                        if($dental_care_lightbox_en == 'on' || $dental_care_lightbox_en == NULL){
                                $string .= '<div class="gallery-lightbox-en gallery-four-col">';
                            }else{
                                $string .= '<div class="gallery-four-col">';
                            }
            $string .= '<div class="row">';
            foreach ($dental_care_images as $id) {
                if (!empty($id)) {
                    $full_src = wp_get_attachment_image_src($id, 'full');
                    $gallery_img = wp_get_attachment_image($id, 'full');
                    $string .= '<div class="col-md-3 gallery-col-item">';
                    $string .= '<div class="gallery-col-img-wrapper">';

                    if ($dental_care_links_en == 'on' || $dental_care_links_en == NULL) {
                                        $string .= '<a href="' . esc_url($full_src[0]) . '"><span class="gallery-col-img-overlay">
                                <i class="fa fa-link"></i>
                                   </span> ' . $gallery_img . ' ';

                                        $string .= '</a>';
                                    } else {

                                        $string .= '<span class="gallery-col-img-overlay">
                                   <i class="fa fa-link"></i>
                                   </span> ' . $gallery_img . ' ';
                                    }

                    $string .= '</div>';

                    if ($dental_care_captions_en == "on") {

                    if (wp_get_attachment_caption($id) != NULL) {
                                            $caption = wp_get_attachment_caption($id);
                                        } else {
                                            $caption = ' ';
                                        }

                    $string .= '<div class="gallery-img-caption">' . esc_html($caption) . '</div>';
                }

                    $string .= '</div>';
                    $img_count++;
                    if ($img_count == 4) {
                        $img_count = 0;
                        $string .= '</div>';
                        $string .= '<div class="row">';
                    }
                }
            }
            if ($img_count < 4) {

                $string .= '</div>';
            }
            $string .= '</div>';
        } else if ($gallery_type == "gallery_video") {
            $video_count = 0;
            $string .= '<div class="video-gallery-wrapper">';
            $string .= '<div class="row">';
            if (!empty($dental_care_video_gallery_list)) {

                foreach ($dental_care_video_gallery_list as $video_item) {
                    if (isset($video_item['title']) && !empty($video_item['title'])) {
                        $url = $video_item['title'];
                    } else
                        $url = '';
                    if (isset($video_item['video_thumb']) && !empty($video_item['video_thumb'])) {
                        $image = $video_item['video_thumb'];
                    } else
                        $image = '';
                    if (isset($video_item['title']) && !empty($video_item['title']) && isset($video_item['video_thumb']) && !empty($video_item['video_thumb'])) {

                        $string .= '<div class="col-md-4 video-item-wrapper">';
                        $string .= '<div class="video-item">';
                        $string .= '<a href="' . esc_url($url) . '&width=960&height=580' . '" data-rel="prettyPhoto" title="Video Link"><span class="gallery-col-img-overlay"><i class="fa fa-play"></i>
                                    </span><img src="' . esc_url($image) . '" alt="Video Thumb" /></a>'
                                . '</div></div>';
                    }
                    $video_count++;
                    if ($video_count == 3) {
                        $video_count = 0;
                        $string .= '</div>';
                        $string .= '<div class="row">';
                    }
                }
                if ($video_count < 3) {

                    $string .= '</div>';
                }
            }

            $string .= '</div>';
        }else if ($gallery_type == 'gallery_filter_category') {
             $string .= '<div class="filter-gallery-wrapper">';

                        $args = array(
                            'type' => 'post',
                            'child_of' => 0,
                            'parent' => '',
                            'orderby' => 'name',
                            'order' => 'ASC',
                            'hide_empty' => 0,
                            'hierarchical' => 1,
                            'number' => '9999',
                            'taxonomy' => 'gallery-categories',
                            'pad_counts' => false,
                        );
                        $categories = get_categories($args);

                        $string .= '<div class="isotope-filter classcatFilter">';
                        $string .= ' <a href="#" data-filter="*" class="current">' . esc_html__('All Images', 'dental-care') . '</a>';
                        foreach ($categories as $cat) {
                            $string .= '<a href="#" data-filter=".' . esc_attr($cat->slug) . '">' . esc_html($cat->name) . '</a>';
                        }
                        $string .= '</div>';
                        if($dental_care_lightbox_en == 'on' || $dental_care_lightbox_en == NULL){
                                $string .= '<div class="gallery-lightbox-en isotope-images-container">';
                            }else{
                                $string .= '<div class="isotope-images-container">';
                            }
                        if (!empty($dental_care_filter_gallery_list)) {
                            foreach ($dental_care_filter_gallery_list as $gallery_image) {

                                $string .= '<div style="width:32.5%;" class="iso-cat-item ';

                                if(isset($gallery_image['gallery_cat'])){
                                foreach ($gallery_image['gallery_cat'] as $category) {
                                    $string .= $category . " ";
                                }
                                }
                                $string .= '">';

                                if ($dental_care_links_en == 'on' || $dental_care_links_en == NULL) {

                                    $string .= '<div class="iso-cat-img-wrapper"><a href="' . esc_url($gallery_image['gallery_cat_img']) . '"><span class="iso-overlay"><span class="cat-img-title">' . esc_html($gallery_image['title']) . '</span></span><img src="' . esc_url($gallery_image['gallery_cat_img']) . '" alt="Gallery Image"></a></div>';
                                } else {

                                    $string .= '<div class="iso-cat-img-wrapper"><span class="iso-overlay"><span class="cat-img-title">' . esc_html($gallery_image['title']) . '</span></span><img src="' . esc_url($gallery_image['gallery_cat_img']) . '" alt="Gallery Image"></div>';
                                }
                                $string .= '  </div>';
                    }
                        }

                        $string .= '</div>';
                        $string .= '</div>';
        }
    }
    $string .= ' </div>';
wp_reset_postdata();
    return $string;
}
