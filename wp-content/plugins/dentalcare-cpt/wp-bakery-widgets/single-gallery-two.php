<?php

add_action('vc_before_init', 'dental_care_single_gallery_two_VC');

function dental_care_single_gallery_two_VC() {

    vc_map(array(
        "name" => esc_html__("Single Gallery Two", 'dental-care'),
        "base" => "dental_care_single_gallery_two",
        "class" => "",
        "category" => esc_html__('Dental Care', 'dental-care'),
        "params" => array(
            array(
                "type" => "attach_images",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Gallery Images", 'dental-care'),
                "param_name" => "gallery_imgs",
                "description" => esc_html__("Choose images to add to gallery", 'dental-care'),
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Gallery Type", 'dental-care'),
                "param_name" => "gallery_type",
                "description" => esc_html__("Choose a gallery type", 'dental-care'),
                "value" => array(
                    '' => '',
                    esc_html__('Gallery Slider', 'dental-care') => 'gallery_slider',
                    esc_html__('Gallery Justified', 'dental-care') => 'gallery_justified',
                    esc_html__('Gallery Carousel', 'dental-care') => 'gallery_carousel',
                    esc_html__('Gallery Two Col', 'dental-care') => 'gallery_col_two',
                    esc_html__('Gallery Three Col', 'dental-care') => 'gallery_col_three',
                    esc_html__('Gallery Four Col', 'dental-care') => 'gallery_col_four',
                ),
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Enable Captions", 'dental-care'),
                "param_name" => "captions_en",
                "description" => esc_html__("Choose to enable captions", 'dental-care'),
                "value" => array(
                    '' => '',
                    'On' => 'on',
                    'Off' => 'off',
                ),
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Enable Lightbox", 'dental-care'),
                "param_name" => "lightbox_en",
                "description" => esc_html__("Choose to enable lightbox effect", 'dental-care'),
                "value" => array(
                    '' => '',
                    'On' => 'on',
                    'Off' => 'off',
                ),
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Carousel Speed", 'dental-care'),
                "param_name" => "carousel_speed",
                "description" => esc_html__("Enter the number for the carousel speed. (Default: 5000)", 'dental-care'),
                "dependency" => array("element" => "gallery_type", "value" => array("gallery_slider","gallery_carousel")),
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Number of gallery columns", 'dental-care'),
                "param_name" => "carousel_cols",
                "description" => esc_html__("Enter the number of image columns to display in carousel.", 'dental-care'),
                "dependency" => array("element" => "gallery_type", "value" => array("gallery_carousel")),
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Number of gallery columns(Tablet)", 'dental-care'),
                "param_name" => "carousel_cols_tablet",
                "description" => esc_html__("Enter the number of image columns to display in carousel on tablet.", 'dental-care'),
                "dependency" => array("element" => "gallery_type", "value" => array("gallery_carousel")),
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Number of gallery columns(Mobile)", 'dental-care'),
                "param_name" => "carousel_cols_mobile",
                "description" => esc_html__("Enter the number of image columns to display in carousel on mobile.", 'dental-care'),
                "dependency" => array("element" => "gallery_type", "value" => array("gallery_carousel")),
            ),
             array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Enable Arrows", 'dental-care'),
                "param_name" => "arrows_en",
                "description" => esc_html__("Choose to enable arrows", 'dental-care'),
                "dependency" => array("element" => "gallery_type", "value" => array("gallery_carousel")),
                "value" => array(
                    '' => '',
                    'On' => 'on',
                    'Off' => 'off',
                ),
            ),

        )
));
}

function dental_care_single_gallery_two_shortcode($atts, $content = NULL) {
    global $post;
    extract(shortcode_atts(array(
        'param' => '',
        'gallery_imgs' => '',
        'gallery_type' => '',
        'captions_en' => '',
        'lightbox_en' => '',
        'carousel_cols' => '',
        'carousel_cols_tablet' => '',
        'carousel_cols_mobile' => '',
        'carousel_speed' => '',
        'arrows_en' => ''
    ), $atts));


    $string = '<div class="dental-care-gallery-widget"> ';

    $dental_care_images = explode(',', $gallery_imgs);

    $dental_care_captions_en = $captions_en;
    $dental_care_lightbox_en = $lightbox_en;

    if ($dental_care_images) {
        if ($gallery_type == 'gallery_slider') {
            if ($dental_care_images) {

                if($dental_care_lightbox_en == 'on' || $dental_care_lightbox_en == NULL){
                    $string .= '<div class="gallery-slider gallery-lightbox-en" data-speed="'.esc_attr($carousel_speed).'">';
                }else{
                    $string .= '<div class="gallery-slider" data-speed="'.esc_attr($carousel_speed).'">';
                }
                foreach ($dental_care_images as $id) {
                    if (!empty($id)) {
                        $full_src = wp_get_attachment_image_src($id, 'full');
                        $gallery_img = wp_get_attachment_image($id, 'full');
                        $string .= '<div class="gallery-slider-img">';

                        $string .= '<a class="gallery-slide-img" href="' . esc_url($full_src[0]) . '"> ' . $gallery_img . ' ';
                        $string .= '</a>';
                        
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
            if($carousel_cols == ''){
                $carousel_cols = '3';
            }
            if ($dental_care_images) {

                if($dental_care_lightbox_en == 'on' || $dental_care_lightbox_en == NULL){
                    $string .= '<div class="gallery-lightbox-en gallery-carousel" data-speed="'.esc_attr($carousel_speed).'" data-items-tablet="'.esc_attr($carousel_cols_tablet).'" data-items-mobile="'.esc_attr($carousel_cols_mobile).'" data-items="'.esc_attr($carousel_cols).'" data-arrows="'.esc_attr($arrows_en).'">';
                }else{
                    $string .= '<div class="gallery-carousel" data-speed="'.esc_attr($carousel_speed).'" data-items-tablet="'.esc_attr($carousel_cols_tablet).'" data-items-mobile="'.esc_attr($carousel_cols_mobile).'" data-items="'.esc_attr($carousel_cols).'" data-arrows="'.esc_attr($arrows_en).'">';
                }
                foreach ($dental_care_images as $id) {
                    if (!empty($id)) {
                        $full_src = wp_get_attachment_image_src($id, 'full');
                        $gallery_img = wp_get_attachment_image($id, 'full');
                        $string .= '<div class="gallery-carousel-img">';

                        $string .= '<a class="gallery-slide-img" href="' . esc_url($full_src[0]) . '"> ' . $gallery_img . ' ';
                        $string .= '</a>';

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

               $string .= '<a href="' . esc_url($full_src[0]) . '"><span class="gallery-col-img-overlay">
               <i class="fa fa-link"></i>
               </span> ' . $gallery_img . ' ';

               $string .= '</a>';

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

           $string .= '<a href="' . esc_url($full_src[0]) . '"><span class="gallery-col-img-overlay">
           <i class="fa fa-link"></i>
           </span> ' . $gallery_img . ' ';

           $string .= '</a>';

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

            $string .= '<a href="' . esc_url($full_src[0]) . '"><span class="gallery-col-img-overlay">
            <i class="fa fa-link"></i>
            </span> ' . $gallery_img . ' ';

            $string .= '</a>';
            
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
}

}
$string .= ' </div>';
wp_reset_postdata();
return $string;
}
