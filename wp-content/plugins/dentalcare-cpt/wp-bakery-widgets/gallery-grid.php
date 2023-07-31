<?php

add_action('vc_before_init', 'dental_care_gallery_grid_VC');


function dental_care_gallery_grid_VC() {
    
    
    vc_map(array(
        "name" => esc_html__("Gallery Grid", 'dental-care'),
        "base" => "dental_care_gallery_grid",
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
                "heading" => esc_html__("Number of Columns", 'dental-care'),
                "param_name" => "num_columns",
                "description" => esc_html__("Choose the number of columns to display", 'dental-care'),
                "value" => array(
                    'Two Columns' => 'two_columns',
                    'Three Columns' => 'three_col',
                    'Four Columns' => 'four_col',
                ),
                 "dependency" => array("element" => "filter_gallery_en", "value" => array("off", "")),
            ),
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Filter gallery category", 'dental-care'),
                "param_name" => "filter_gallery_en",
                "description" => esc_html__("Choose to filter gallery category.", 'dental-care'),
                "value" => array(
                    '' => '',
                    'On' => 'on',
                    'Off' => 'off',
                )
            ),
            array(
                "type" => "gallery_category",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Gallery Category", 'dental-care'),
                "param_name" => "gallery_category",
                "description" => esc_html__("Choose a gallery category.", 'dental-care'),
                "dependency" => array("element" => "filter_gallery_en", "value" => array("on")),
            ),
        )
    ));
    
}

function dental_care_gallery_grid_shortcode($atts, $content = NULL) {
    global $post;
    extract(shortcode_atts(array(
        'param' => '',
        'title' => '',
        'num_columns' => '',
        'gallery_category' => '',
        'filter_gallery_en' => '',
                    ), $atts));
    
    
    if($filter_gallery_en == 'on'){
        
        if ($title != NULL && isset($title)) {
        $string = '<h3 class="dental-care-VC-title">' . esc_html($title) . '</h3>';
        $string .= '<div class="gallery-grid">';
        } else {
        $string = '<div class="gallery-grid">';
        }
        
        
       $g_args = array(
        'post_type' => 'gallery',
        'post_status' => 'publish',
        'posts_per_page' => 9999,
        'tax_query' => array(
            array(
                'taxonomy' => 'gallery-categories',
                'field' => 'slug',
                'terms' => $gallery_category,
            ),
        ),
    );
       
    $query = new WP_Query($g_args);
        
    $gallery_count = 3;
        while ($query->have_posts()) {
            $query->the_post();
            
            $galleryimg = get_the_post_thumbnail($post->ID, 'dental-care-gallery-thumb');
            if ($gallery_count == 3) {
                 $gallery_count = 0;
                 $string .= '<div class="row">';
            }
            $gallery_count++;
            

            $string .= '<div class="col-md-4 gallery-grid-item">';
            
            $string .= '<div class="gallery-col-item">';
            
           $gallerytitle = get_the_title();
                       
            if ($galleryimg != NULL) {
                
                $string .='<div class="gallery-img">';
                $string .= '<a rel="external" href="' . get_the_permalink() . '">';
                    
                $string .= $galleryimg;
                      
                $string .= '<div class="gallery-grid-overlay">';
                $string .= '<div class="gallery-grid-title">'. $gallerytitle .'</div>';
                $string .= '<i class="fa fa-link"></i>';
                $string .= '</div>';
                
                $string .= '</a>';
                
                $string .= '</div>';
            }
     
            $string .= '</div> </div>';
            if ($gallery_count == 3) {
                $string .= '</div>';
            }
        }
        if ($gallery_count < 3) {
            $string .= '</div>';
        }
    
    $string .= '</div>';
        
    }elseif($filter_gallery_en == 'off' || $filter_gallery_en == ' ' || $filter_gallery_en == NULL){
        
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
    if ($title != NULL && isset($title)) {
        $string = '<h3 class="dental-care-VC-title">' . esc_html($title) . '</h3>';
        $string .= '<div class="isotope-filter classcatFilter gallerycatFilter">';
    } else {
        $string = '<div class="isotope-filter classcatFilter">';
    }

    $string .= ' <a href="#" data-filter="*" class="current">' . esc_html__('All Galleries', 'dental-care') . '</a>';

    foreach ($categories as $cat) {
        $string .= '<a href="#" data-filter=".' . esc_attr($cat->slug) . '">' . esc_html($cat->name) . '</a>';
    }
    $string .= '</div>';

    $g_args = array(
        'post_type' => 'gallery',
        'post_status' => 'publish',
        'pagination' => true,
        'posts_per_page' => 9999
    );

    if ($num_columns == 'three_col') {
        $col_width = '33.3333333%';
        $title_font = '24px';
        $icon_font = '25px';
    } else if ($num_columns == 'four_col') {
        $col_width = '25%';
        $title_font = '16px';
        $icon_font = '18px';
    } else {
        $col_width = ' ';
        $title_font = '24px';
        $icon_font = '25px';
    }

    //The Query
    $query = new WP_Query($g_args);
    $string .= '<div class="isotope-cat-container">';
    while ($query->have_posts()) {
        $query->the_post();
        if (has_post_thumbnail()) {
            $gallerytitle = get_the_title();
            $gallerylink = get_the_permalink();
            $galleryimg = get_the_post_thumbnail($post->ID, 'dental-care-gallery-thumb');
            $term = wp_get_post_terms($post->ID, 'gallery-categories');

            $string .= '<div style="width:' . esc_attr($col_width) . ';" class="iso-cat-item ';
            foreach ($term as $val) {
                $string .= '' . esc_attr($val->slug) . '';
                $string .= ' ';
            }
            $string .= '">';
            $string .= '<div class="iso-cat-img-wrapper"><a href="' . esc_url($gallerylink) . '"><span class="iso-overlay"><h6 style="font-size:' . esc_attr($title_font) . ';" class="iso-overlay-title">' . esc_html($gallerytitle) . '</h6> <i style="font-size:' . esc_attr($icon_font) . ';" class="fa fa-link"></i></span>' . $galleryimg . '</a></div>';
            $string .= '  </div>';
        }
    }
    $string .= '</div>';    
        
    }
           
wp_reset_postdata();
    return $string;
}
