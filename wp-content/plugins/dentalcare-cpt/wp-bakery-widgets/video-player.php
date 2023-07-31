<?php

add_action('vc_before_init', 'dental_care_video_player_VC');

function dental_care_video_player_VC() {
    vc_map(array(
        "name" => esc_html__("Video Player", 'dental-care'),
        "base" => "dental_care_video_player",
        "class" => "",
        "category" => esc_html__('Dental Care', 'dental-care'),
        "params" => array(
           array(
                "type" => "attach_image",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Thumbnail Image", 'dental-care'),
                "param_name" => "thumbnail_img",
                "description" => esc_html__("Choose an image for the thumbnail.", 'dental-care'),
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Video Link", 'dental-care'),
                "param_name" => "video_link",
                "description" => esc_html__("Enter a youtube or vimeo link", 'dental-care'),
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Play Button Color", 'dental-care'),
                "param_name" => "play_btn_color",
                "description" => esc_html__("Choose a color for the play button.", 'dental-care'),
            ),

        )
    ));
}

function dental_care_video_player_shortcode($atts, $content = NULL) {
    global $post;
    extract(shortcode_atts(array(
        'param' => '',
        'thumbnail_img' => '',
        'video_link' => '',
        'play_btn_color' => ''
                    ), $atts));


        $video_img_src = '';
        $video_img_src = wp_get_attachment_url($thumbnail_img, 'full', false, false);

    $string = '<div class="stronghold-video-player-widget">';

    if($video_img_src == ''){
    $string .= '<a class="video-play" href="'. esc_url($video_link ).'" data-lity>';
    }else{
    $string .= '<a class="video-play-img" href="'. esc_url($video_link ).'" data-lity>';
    }
    
    
    if($video_img_src != ''){
    $string .= '<div class="video-thumbnail-wrapper">';
    }else{
    $string .= '<div class="video-play-wrapper">';
    }
    
 if($video_img_src != ''){
    $string .= '<img src="' . esc_html($video_img_src) . '" alt="Video Thumbnail">';
   
    $string .= '<div class="video-play-icon">';
        $string .= '<i class="fa fa-play-circle-o" style="';
    
    if($play_btn_color != ''){
        $string .= ' color:'.esc_attr($play_btn_color).';';
    }
    
    
    $string .= '"></i>';   
    $string .= '</div>';
    

    }else{
    $string .= '<div class="video-play-icon">';
    $string .= '<i class="fa fa-play-circle-o" style="';
    
    if($play_btn_color != ''){
        $string .= ' color:'.esc_attr($play_btn_color).';';
    }
    
    
    $string .= '"></i>';    
    $string .= '</div>';
    }
    
        $string .= '</div>';
    
    $string .= '</a>';
    
    $string .= '</div>';

    return $string;
}
