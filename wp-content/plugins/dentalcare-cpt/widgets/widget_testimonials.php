<?php

add_action('widgets_init', 'dental_care_testimonials_widget');

function dental_care_testimonials_widget() {
    register_widget('dental_care_testimonials');
}

class dental_care_testimonials extends WP_Widget {

    /**
     * Widget constructor
     */
    function __construct() {
        $widget_ops = array('classname' => 'dental_care_testimonials', 'description' => esc_html__('Displays testimonials.', 'dental-care'));
        $control_ops = array('width' => 350, 'height' => 400, 'id_base' => 'dental_care_testimonials');
        parent::__construct('dental_care_testimonials', esc_html__('Dental Care: Testimonials', 'dental-care'), $widget_ops, $control_ops);
    }

    function widget($args, $instance) {
        extract($args);


        $title = apply_filters('widget_title', $instance['title']);
        $carousel_speed = $instance['carousel_speed'];
        $order_items = $instance['order_items'];

        if($carousel_speed == NULL || $carousel_speed == ''){
            $carousel_speed = 5000;
        }

          if ($order_items == 'yes'){
         $args = array(
        'post_type' => 'testimonial',
        'post_status' => 'publish',
        'pagination' => true,
        'orderby' => 'title',
	'order'   => 'ASC',
        'posts_per_page' => -1,
    );
    }else{
     $args = array(
        'post_type' => 'testimonial',
        'post_status' => 'publish',
        'pagination' => true,
        'posts_per_page' => -1,
    );
    }

            $allowed_html = array(
            'p' => array(
                'class' => array(),
                'style' => array(),
            )
        );

        $post_query = new WP_Query($args);

        if ($post_query->have_posts()) :

            echo $before_widget;

            if ($title)
                echo $before_title . $title . $after_title;
            ?>


<div class="dental-care-testimonials-wrapper">
   <ul class="dental-care-testimonials-widget" data-speed="<?php echo $carousel_speed;?>">
<?php

    while ($post_query->have_posts()) {

        $post_query->the_post();

        $testimonytext = "" . get_post_meta(get_the_ID(), 'testimonialtext', $single = true);
        $testimonyname = get_post_meta(get_the_ID(), 'testimonialname', $single = true);
        $testimonypos = get_post_meta(get_the_ID(), 'testimonialposition', $single = true);
        $testimonypic = get_the_post_thumbnail(get_the_ID(), 'thumbnail');

?>
        <li class="dental-care-testimonials-item"> <i class="fa fa-quote-left"></i><div class="dental-care-testim-text"><?php echo wp_kses($testimonytext, $allowed_html); ?> </div>
        <div class="dental-care-author">
            <?php
        if ($testimonypic != NULL) {
            echo $testimonypic;
        }
        ?>
        <ul class="dental-care-author-info">  <li class="dental-care-testim-name"><?php echo esc_html($testimonyname);?></li>
        <li class="dental-care-testim-position"><?php echo esc_html($testimonypos);?></li>  </ul> </div>   </li>
   <?php
        }
        ?>

    </ul>

</div>
<?php wp_reset_query();
 endif;

        echo $after_widget;
}

    function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['carousel_speed'] = $new_instance['carousel_speed'];
        $instance['order_items'] = strip_tags($new_instance['order_items']);

        return $instance;
    }

    function form($instance) {

        /* defaults */
        $defaults = array('title' => 'Testimonials', 'carousel_speed' => '5000', 'order_items' => '');
        $instance = wp_parse_args((array) $instance, $defaults);
        ?>

        <!-- Widget Title -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'dental-care'); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" style="width:100%;"/>
        </p>

        <!-- Carousel Speed -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('carousel_speed')); ?>"><?php esc_html_e('Carousel Speed:', 'dental-care'); ?></label>
            <input  type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('carousel_speed')); ?>" name="<?php echo esc_attr($this->get_field_name('carousel_speed')); ?>" value="<?php echo esc_attr($instance['carousel_speed']); ?>" size="3" />
        </p>

        <!-- Order -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('order_items')); ?>"><?php esc_html_e('Order testimonials by title:', 'dental-care'); ?></label>
            <select id="<?php echo esc_attr($this->get_field_id('order_items')); ?>" name="<?php echo esc_attr($this->get_field_name('order_items')); ?>" style="width:100%;">
                <option value='yes' <?php if ('yes' == $instance['order_items']) echo 'selected="selected"'; ?>><?php echo esc_html__('Yes', 'dental-care)'); ?></option>
                <option value='no' <?php if ('no' == $instance['order_items']) echo 'selected="selected"'; ?>><?php echo esc_html__('No', 'dental-care)'); ?></option>
            </select>
        </p>


        <?php
    }



}
