<?php

add_action('widgets_init', 'dental_care_recent_widget');

function dental_care_recent_widget() {
    register_widget('dental_care_recent');
}

class dental_care_recent extends WP_Widget {

    /**
     * Widget constructor
     */
    function __construct() {
        $widget_ops = array('classname' => 'dental_care_recent', 'description' => esc_html__('Displays the recent posts.', 'dental-care'));
        $control_ops = array('width' => 350, 'height' => 400, 'id_base' => 'dental_care_recent');
        parent::__construct('dental_care_recent', esc_html__('Dental Care: Recent Posts', 'dental-care'), $widget_ops, $control_ops);
    }

    function widget($args, $instance) {
        extract($args);


        $title = apply_filters('widget_title', $instance['title']);
        $categories = $instance['categories'];
        $num_posts = $instance['num_posts'];

        $post_args = array('showposts' => $num_posts, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1, 'cat' => $categories);

        $post_query = new WP_Query($post_args);
        if ($post_query->have_posts()) :

            echo $before_widget;

            if ($title)
                echo $before_title . $title . $after_title;
            ?>

            <div class="recent-widget">
                <ul>

                    <?php while ($post_query->have_posts()) : $post_query->the_post(); ?>

                        <li class="recent-post-item">																				
                            <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) : ?>
                                <div class="recent-post-img">
                                    <a href="<?php echo get_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                                </div>
                            <?php endif; ?>
                            <div class="recent-post-text">
                                <div class="recent-post-title"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
                                <span class="recent-post-date"><?php the_time(get_option('date_format')); ?></span>
                            </div>									
                        </li>

                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
                <?php endif; ?>
            </ul>
        </div>

        <?php
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['categories'] = $new_instance['categories'];
        $instance['num_posts'] = strip_tags($new_instance['num_posts']);

        return $instance;
    }

    function form($instance) {

        /* defaults */
        $defaults = array('title' => 'Recent Posts', 'num_posts' => '5', 'categories' => '');
        $instance = wp_parse_args((array) $instance, $defaults);
        ?>

        <!-- Widget Title -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'dental-care'); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" style="width:100%;"/>
        </p>

        <!-- Category -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php esc_html_e('Filter Posts by Category:', 'dental-care'); ?></label> 
            <select id="<?php echo esc_attr($this->get_field_id('categories')); ?>" name="<?php echo esc_attr($this->get_field_name('categories')); ?>" style="width:100%;">
                <option value='all' <?php if ('all' == $instance['categories']) echo 'selected="selected"'; ?>><?php echo esc_html__('All categories', 'dental-care)'); ?></option>

                <?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
                <?php foreach ($categories as $category) { ?>
                    <option value='<?php echo esc_attr($category->term_id); ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php echo esc_attr($category->cat_name); ?></option>
                <?php } ?>
            </select>
        </p>

        <!-- Number of posts -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('num_posts')); ?>"><?php esc_html_e('Number of posts to show:', 'dental-care'); ?></label>
            <input  type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('num_posts')); ?>" name="<?php echo esc_attr($this->get_field_name('num_posts')); ?>" value="<?php echo esc_attr($instance['num_posts']); ?>" size="3" />
        </p>
        <?php
    }

}
?>