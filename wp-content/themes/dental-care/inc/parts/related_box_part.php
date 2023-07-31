<?php
/**
 * 
 * Displays related posts 
 *
 * @package Dental_Care
 */
$orig_post = $post;
global $post;
$dental_care_categories = get_the_category($post);

if ($dental_care_categories) {
    $category_ids = array();

    foreach ($dental_care_categories as $individual_category)
        $category_ids[] = $individual_category->term_id;

    $args = array(
        'category__in' => $category_ids,
        'post__not_in' => array($post->ID),
        'posts_per_page' => 3,
        'ignore_sticky_posts' => 1
    );

    $my_query = new wp_query($args);

    if ($my_query->have_posts()) {
        ?>
        <div class="row related-posts-wrapper">    
            <div class="related-posts col-md-12">
              
                <?php
                if (class_exists('OT_Loader')) {

                    if (ot_get_option('related_articles_title') == '') {

                        ?>
                        <h4><?php echo esc_html__('Related Articles', 'dental-care'); ?> </h4>
                    <?php } else { ?>
                        <h4><?php echo esc_html(ot_get_option('related_articles_title')); ?> </h4>
                        <?php

                    }
                }else{
                    ?>
                    <h4><?php echo esc_html__('Related Articles', 'dental-care'); ?> </h4>
                    <?php
                }

                ?>
                
                <ul class="related-items">

                    <?php
                    while ($my_query->have_posts()) {
                        $my_query->the_post();
                        if (has_post_thumbnail()) {
                            ?>
                            <li class="col-md-4 col-sm-12 col-xs-12">
                                <div class="related-thumbnail">
                                    <div class="blog-date-overlay"><span class="blog-overlay-day"><?php echo get_the_date('dS'); ?></span> <span class="blog-overlay-month"><?php echo get_the_date('M') ?></span> </div>
                                    <a rel="external" href="<?php echo the_permalink(); ?>"><span class="related-img-wrapper"><?php the_post_thumbnail('dental-care-related-thumb'); ?></span><br />  
                                    </a>

                                </div>
                                <div class="related-info">
                                    <h6 class="related-title"><?php the_title(); ?></h6>
                                </div>
                            </li>           
                            <?php
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
        <?php
    }
}

$post = $orig_post;
wp_reset_query();
?>
