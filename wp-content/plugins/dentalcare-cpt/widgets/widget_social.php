<?php

add_action('widgets_init', 'dental_care_social_widget');

function dental_care_social_widget() {
    register_widget('dental_care_social');
}

class dental_care_social extends WP_Widget {

    /**
     * Widget constructor
     */
    function __construct() {
        $widget_ops = array('classname' => 'dental_care_social', 'description' => esc_html__('Displays social links.', 'dental-care'));
        $control_ops = array('width' => 350, 'height' => 400, 'id_base' => 'dental_care_social');
        parent::__construct('dental_care_social', esc_html__('Dental Care: Social', 'dental-care'), $widget_ops, $control_ops);
    }

    function widget($args, $instance) {
        extract($args);

        $title = apply_filters('widget_title', $instance['title']);

        echo $before_widget;

        if ($title)
            echo $before_title . $title . $after_title;
        ?>

        <div class="social-widget">
            <ul class="">
                <?php echo!empty($instance['facebook']) ? '<li class="social-widget-item social-fb"><a target="_blank" title="Facebook" href="' . esc_url($instance['facebook']) . '"><i class="fa fa-facebook"></i></a></li>' : '' ?>
                <?php echo!empty($instance['twitter']) ? '<li class="social-widget-item social-tw"><a target="_blank" title="Twitter" href="' . esc_url($instance['twitter']) . '"><i class="fa fa-twitter"></i></a></li>' : '' ?>
                <?php echo!empty($instance['googleplus']) ? '<li class="social-widget-item social-gp"><a target="_blank" title="Google+" href="' . esc_url($instance['googleplus']) . '"><i class="fa fa-google-plus"></i></a></li>' : '' ?>
                <?php echo!empty($instance['instagram']) ? '<li class="social-widget-item social-insta"><a target="_blank" title="Instagram" href="' . esc_url($instance['instagram']) . '"><i class="fa fa-instagram"></i></a></li>' : '' ?>
                <?php echo!empty($instance['tumblr']) ? '<li class="social-widget-item social-tb"><a target="_blank" title="Tumblr" href="' . esc_url($instance['tumblr']) . '"><i class="fa fa-tumblr"></i></a></li>' : '' ?>
                <?php echo!empty($instance['linkedin']) ? '<li class="social-widget-item social-li"><a target="_blank" title="Linkedin" href="' . esc_url($instance['linkedin']) . '"><i class="fa fa-linkedin"></i></a></li>' : '' ?>
                <?php echo!empty($instance['youtube']) ? '<li class="social-widget-item social-yt"><a target="_blank" title="Youtube" href="' . esc_url($instance['youtube']) . '"><i class="fa fa-youtube"></i></a></li>' : '' ?>
                <?php echo!empty($instance['flickr']) ? '<li class="social-widget-item social-fr"><a target="_blank" title="Flickr" href="' . esc_url($instance['flickr']) . '"><i class="fa fa-flickr"></i></a></li>' : '' ?>
                <?php echo!empty($instance['vimeo']) ? '<li class="social-widget-item social-vo"><a target="_blank" title="Vimeo" href="' . esc_url($instance['vimeo']) . '"><i class="fa fa-vimeo-square"></i></a></li>' : '' ?>
                <?php echo!empty($instance['pinterest']) ? '<li class="social-widget-item social-pn"><a target="_blank" title="Pinterest" href="' . esc_url($instance['pinterest']) . '"><i class="fa fa-pinterest"></i></a></li>' : '' ?>
                <?php echo!empty($instance['vk']) ? '<li class="social-widget-item social-vk"><a target="_blank" title="VK" href="' . esc_url($instance['vk']) . '"><i class="fa fa-vk"></i></a></li>' : '' ?>
                  <?php echo!empty($instance['ok']) ? '<li class="social-widget-item social-ok"><a target="_blank" title="OK" href="' . esc_url($instance['ok']) . '"><i class="fa fa-odnoklassniki"></i></a></li>' : '' ?>
            </ul>
        </div>      
        <?php
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['facebook'] = esc_url($new_instance['facebook']);
        $instance['twitter'] = esc_url($new_instance['twitter']);
        $instance['googleplus'] = esc_url($new_instance['googleplus']);
        $instance['instagram'] = esc_url($new_instance['instagram']);
        $instance['linkedin'] = esc_url($new_instance['linkedin']);
        $instance['tumblr'] = esc_url($new_instance['tumblr']);
        $instance['vimeo'] = esc_url($new_instance['vimeo']);
        $instance['youtube'] = esc_url($new_instance['youtube']);
        $instance['flickr'] = esc_url($new_instance['flickr']);
        $instance['pinterest'] = esc_url($new_instance['pinterest']);
        $instance['vk'] = esc_url($new_instance['vk']);
        $instance['ok'] = esc_url($new_instance['ok']);



        return $instance;
    }

    function form($instance) {

        /* defaults */
        $defaults = array('title' => 'Follow Us');
        $instance = wp_parse_args((array) $instance, $defaults);

        $facebook = !empty($instance['facebook']) ? $instance['facebook'] : '';
        $twitter = !empty($instance['twitter']) ? $instance['twitter'] : '';
        $googleplus = !empty($instance['googleplus']) ? $instance['googleplus'] : '';
        $instagram = !empty($instance['instagram']) ? $instance['instagram'] : '';
        $tumblr = !empty($instance['tumblr']) ? $instance['tumblr'] : '';
        $linkedin = !empty($instance['linkedin']) ? $instance['linkedin'] : '';
        $vimeo = !empty($instance['vimeo']) ? $instance['vimeo'] : '';
        $youtube = !empty($instance['youtube']) ? $instance['youtube'] : '';
        $flickr = !empty($instance['flickr']) ? $instance['flickr'] : '';
        $pinterest = !empty($instance['pinterest']) ? $instance['pinterest'] : '';
        $vk = !empty($instance['vk']) ? $instance['vk'] : '';
        $ok = !empty($instance['ok']) ? $instance['ok'] : '';


        ?>

        <!-- Widget Title -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'dental-care'); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" style="width:100%;"/>
        </p>

        <p><?php echo esc_html__('Paste the links to your social networks in the fields below.', 'dental-care'); ?></p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('facebook')); ?>"><?php esc_html_e('Facebook:', 'dental-care'); ?></label><br>
            <input style="width:100%;" id="<?php echo esc_attr($this->get_field_id('facebook')); ?>" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>" value="<?php echo esc_attr($facebook); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('twitter')); ?>"><?php esc_html_e('Twitter:', 'dental-care'); ?></label><br>
            <input style="width:100%;" id="<?php echo esc_attr($this->get_field_id('twitter')); ?>" name="<?php echo esc_attr($this->get_field_name('twitter')); ?>" value="<?php echo esc_attr($twitter); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('googleplus')); ?>"><?php esc_html_e('Google+:', 'dental-care'); ?></label><br>
            <input style="width:100%;" id="<?php echo esc_attr($this->get_field_id('googleplus')); ?>" name="<?php echo esc_attr($this->get_field_name('googleplus')); ?>" value="<?php echo esc_attr($googleplus); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('instagram')); ?>"><?php esc_html_e('Instagram:', 'dental-care'); ?></label><br>
            <input style="width:100%;" id="<?php echo esc_attr($this->get_field_id('instagram')); ?>" name="<?php echo esc_attr($this->get_field_name('instagram')); ?>" value="<?php echo esc_attr($instagram); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('linkedin')); ?>"><?php esc_html_e('LinkedIn:', 'dental-care'); ?></label><br>
            <input style="width:100%;" id="<?php echo esc_attr($this->get_field_id('linkedin')); ?>" name="<?php echo esc_attr($this->get_field_name('linkedin')); ?>" value="<?php echo esc_attr($linkedin); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('vimeo')); ?>"><?php esc_html_e('Vimeo:', 'dental-care'); ?></label><br>
            <input style="width:100%;" id="<?php echo esc_attr($this->get_field_id('vimeo')); ?>" name="<?php echo esc_attr($this->get_field_name('vimeo')); ?>" value="<?php echo esc_attr($vimeo); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('youtube')); ?>"><?php esc_html_e('Youtube:', 'dental-care'); ?></label><br>
            <input style="width:100%;" id="<?php echo esc_attr($this->get_field_id('youtube')); ?>" name="<?php echo esc_attr($this->get_field_name('youtube')); ?>" value="<?php echo esc_attr($youtube); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('tumblr')); ?>"><?php esc_html_e('Tumblr:', 'dental-care'); ?></label><br>
            <input style="width:100%;" id="<?php echo esc_attr($this->get_field_id('tumblr')); ?>" name="<?php echo esc_attr($this->get_field_name('tumblr')); ?>" value="<?php echo esc_attr($tumblr); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('flickr')); ?>"><?php esc_html_e('Flickr:', 'dental-care'); ?></label><br>
            <input style="width:100%;" id="<?php echo esc_attr($this->get_field_id('flickr')); ?>" name="<?php echo esc_attr($this->get_field_name('flickr')); ?>" value="<?php echo esc_attr($flickr); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('pinterest')); ?>"><?php esc_html_e('Pinterest:', 'dental-care'); ?></label><br>
            <input style="width:100%;" id="<?php echo esc_attr($this->get_field_id('pinterest')); ?>" name="<?php echo esc_attr($this->get_field_name('pinterest')); ?>" value="<?php echo esc_attr($pinterest); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('vk')); ?>"><?php esc_html_e('VK:', 'dental-care'); ?></label><br>
            <input style="width:100%;" id="<?php echo esc_attr($this->get_field_id('vk')); ?>" name="<?php echo esc_attr($this->get_field_name('vk')); ?>" value="<?php echo esc_attr($vk); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('ok')); ?>"><?php esc_html_e('OK:', 'dental-care'); ?></label><br>
            <input style="width:100%;" id="<?php echo esc_attr($this->get_field_id('ok')); ?>" name="<?php echo esc_attr($this->get_field_name('ok')); ?>" value="<?php echo esc_attr($ok); ?>">
        </p>

        <?php
    }

}
?>