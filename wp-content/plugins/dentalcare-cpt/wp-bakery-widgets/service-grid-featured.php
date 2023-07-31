<?php

add_action('vc_before_init', 'dental_care_service_grid_featured_VC');

function dental_care_service_grid_featured_VC() {
    vc_map(array(
        "name" => esc_html__("Service Grid Featured", 'dental-care'),
        "base" => "dental_care_service_grid_featured",
        "class" => "",
        "category" => esc_html__('Dental Care', 'dental-care'),
        "params" => array(
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Featured Items", 'dental-care'),
                "param_name" => "featured_num",
                "description" => esc_html__("Number of featured items.", 'dental-care'),
                "value" => array(
                    "" => "",
                    "One" => "one",
                    "Two" => "two",
                )
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Number of items", 'dental-care'),
                "param_name" => "items_num",
                "description" => esc_html__("Enter the number of service items to display. Enter -1 to display all posts.", 'dental-care')
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Enable Service Excerpts", 'dental-care'),
                "param_name" => "service_excerpt_en",
                "description" => esc_html__("Enable service excerpts.", 'dental-care'),
                "value" => array(
                    "" => "",
                    "On" => "on",
                    "Off" => "off",
                )
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
        )
    ));
}

function dental_care_service_grid_featured_shortcode($atts, $content = NULL) {
    global $post;
    extract(shortcode_atts(array(
        'param' => '',
        'items_num' => '',
        'order_items' => '',
        'featured_num' => '',
        'service_excerpt_en' => ''
                    ), $atts));


    $dental_care_allowed_html = array(
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

    $string = '<div class="stronghold-services-featured">';
    $string .= '<div class="row">';
    
    $col_val = "col-md-8";
    $items_offset = "1";
    
    if($featured_num == ""){
        $featured_num = "one";
    }
    
    if($featured_num == 'one'){
        $col_val = "col-md-8";
        $items_offset = '1';
    }else{
        $col_val = "col-md-4";
        $items_offset = "2";
    }
    
    $string .= '<div class="service-featured-item '.esc_attr($col_val).'">';
    
        if ($order_items == 'yes') {
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

                $string .= '<div class="service-item-img">';
                $string .= '<a href="'.esc_url($servicelink).'">';
                $string .= '<div class="item-overlay"><i class="fa fa-link"></i></div>';
                $string .= ''.$serviceimg.'';
                $string .= '</a>';
                $string .= '</div>';
                
                $string .= '<div class="service-item-title">';
                $string .= '<h5 class="service-main-name"><a href="' . esc_url( $servicelink) . '">' . esc_html($servicetitle) . '</a></h5>';  
                $string .= '</div>';
                
                if($service_excerpt_en == 'on'){
                $string .= '<div class="service-item-desc">';
                $string .= esc_html($serviceexcerpt);
                $string .= '</div>';
                }
                
                } 
    
}
    
    $string .= '</div>';
    
    if($featured_num == 'two'){
    $string .= '<div class="service-featured-item '.esc_attr($col_val).'">';
    
            if ($order_items == 'yes') {
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

                $string .= '<div class="service-item-img">';
                $string .= '<a href="'.esc_url($servicelink).'">';
                $string .= '<div class="item-overlay"><i class="fa fa-link"></i></div>';
                $string .= ''.$serviceimg.'';
                $string .= '</a>';
                $string .= '</div>';
                
                $string .= '<div class="service-item-title">';
                $string .= '<h5 class="service-main-name"><a href="' . esc_url( $servicelink) . '">' . esc_html($servicetitle) . '</a></h5>';  
                $string .= '</div>';
                
                if($service_excerpt_en == 'on'){
                $string .= '<div class="service-item-desc">';
                $string .= esc_html($serviceexcerpt);
                $string .= '</div>';
                }
                
                } 
    
}
    
    $string .= '</div>';
    }
    
   
    $string .= '<div class="service-featured-items col-md-4">';
    
        if ($order_items == 'yes') {
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

                $string .= '<div class="service-item-row row">';
                
                $string .= '<div class="service-item-img-wrapper  col-md-4">';
                $string .= '<div class="service-item-img">';
                $string .= '<a href="'.esc_url($servicelink).'">';
                $string .= '<div class="item-overlay"><i class="fa fa-link"></i></div>';
                $string .= ''.$serviceimg.'';
                $string .= '</a>';
                $string .= '</div>';
                $string .= '</div>';
                
                $string .= '<div class="service-item-desc-wrapper col-md-8">';
                
                 $string .= '<div class="service-item-title">';
                $string .= '<h5 class="service-main-name"><a href="' . esc_url( $servicelink) . '">' . esc_html($servicetitle) . '</a></h5>';  
                $string .= '</div>';
                
                if($service_excerpt_en == 'on'){
                $string .= '<div class="service-item-desc">';
                $string .= esc_html($serviceexcerpt);
                $string .= '</div>';
                }
                
                $string .= '</div>';
                $string .= '</div>';
                
         }
        
    }
    
    $string .= '</div>';      
    $string .= '</div>';
    $string .= '</div>';
    return $string;

}
 