<?php

add_action('widgets_init', 'dental_care_opening_widget');

function dental_care_opening_widget() {
    register_widget('dental_care_opening');
}

class dental_care_opening extends WP_Widget {

    /**
     * Widget constructor
     */
    function __construct() {
        $widget_ops = array('classname' => 'dental_care_opening', 'description' => esc_html__('Displays the office opening hours.', 'dental-care'));
        $control_ops = array('width' => 350, 'height' => 400, 'id_base' => 'dental_care_opening');
        parent::__construct('dental_care_opening', esc_html__('Dental Care: Opening Hours', 'dental-care'), $widget_ops, $control_ops);
    }

    function widget($args, $instance) {
        extract($args);

        $title = apply_filters('widget_title', $instance['title']);

        $monday_text = $instance['monday_text'];
        $monday_time = $instance['monday_time'];
        $tuesday_text = $instance['tuesday_text'];
        $tuesday_time = $instance['tuesday_time'];
        $wednesday_text = $instance['wednesday_text'];
        $wednesday_time = $instance['wednesday_time'];
        $thursday_text = $instance['thursday_text'];
        $thursday_time = $instance['thursday_time'];       
        $friday_text = $instance['friday_text'];
        $friday_time = $instance['friday_time'];
        $saturday_text = $instance['saturday_text'];
        $saturday_time = $instance['saturday_time'];
        $sunday_text = $instance['sunday_text'];
        $sunday_time = $instance['sunday_time'];
   
        echo $before_widget;

        if ($title)
            echo $before_title . $title . $after_title;
        ?>

        <ul class="opening-hours-wid">
            <?php if ($monday_text && $monday_time): ?>
            <li class="monday-detail opening-hours-detail"><div class="opening-hours-icon-text-wrapper"><span class="opening-hours-icon"><i class="fa fa-clock-o"></i></span><span class="opening-hours-text"><?php echo esc_html($monday_text); ?></span></div><span class="opening-hours-time"><?php echo esc_html($monday_time); ?></span></li>
            <?php endif; ?>
            <?php if ($tuesday_text && $tuesday_time): ?>
                <li class="tuesday-detail opening-hours-detail"><div class="opening-hours-icon-text-wrapper"><span class="opening-hours-icon"><i class="fa fa-clock-o"></i></span><span class="opening-hours-text"><?php echo esc_html($tuesday_text); ?></span></div><span class="opening-hours-time"><?php echo esc_html($tuesday_time); ?></span></li>
            <?php endif; ?>
            <?php if ($wednesday_text && $wednesday_time): ?>
                <li class="wednesday-detail opening-hours-detail"><div class="opening-hours-icon-text-wrapper"><span class="opening-hours-icon"><i class="fa fa-clock-o"></i></span><span class="opening-hours-text"><?php echo esc_html($wednesday_text); ?></span></div><span class="opening-hours-time"><?php echo esc_html($wednesday_time); ?></span></li>
            <?php endif; ?>
            <?php if ($thursday_text && $thursday_time): ?>
                <li class="thursday-detail opening-hours-detail"><div class="opening-hours-icon-text-wrapper"><span class="opening-hours-icon"><i class="fa fa-clock-o"></i></span><span class="opening-hours-text"><?php echo esc_html($thursday_text); ?></span></div><span class="opening-hours-time"><?php echo esc_html($thursday_time); ?></span></li>
            <?php endif; ?>
            <?php if ($friday_text && $friday_time): ?>
                <li class="friday-detail opening-hours-detail"><div class="opening-hours-icon-text-wrapper"><span class="opening-hours-icon"><i class="fa fa-clock-o"></i></span><span class="opening-hours-text"><?php echo esc_html($friday_text); ?></span></div><span class="opening-hours-time"><?php echo esc_html($friday_time); ?></span></li>
            <?php endif; ?>
            <?php if ($saturday_text && $saturday_time): ?>
                <li class="saturday-detail opening-hours-detail"><div class="opening-hours-icon-text-wrapper"><span class="opening-hours-icon"><i class="fa fa-clock-o"></i></span><span class="opening-hours-text"><?php echo esc_html($saturday_text); ?></span></div><span class="opening-hours-time"><?php echo esc_html($saturday_time); ?></span></li>
            <?php endif; ?>
            <?php if ($sunday_text && $sunday_time): ?>
                <li class="sunday-detail opening-hours-detail"><div class="opening-hours-icon-text-wrapper"><span class="opening-hours-icon"><i class="fa fa-clock-o"></i></span><span class="opening-hours-text"><?php echo esc_html($sunday_text); ?></span></div><span class="opening-hours-time"><?php echo esc_html($sunday_time); ?></span></li>
            <?php endif; ?>


        </ul>


        <?php
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['monday_text'] = strip_tags($new_instance['monday_text']);
        $instance['monday_time'] = strip_tags($new_instance['monday_time']);
        $instance['tuesday_text'] = strip_tags($new_instance['tuesday_text']);
        $instance['tuesday_time'] = strip_tags($new_instance['tuesday_time']);
        $instance['wednesday_text'] = strip_tags($new_instance['wednesday_text']);
        $instance['wednesday_time'] = strip_tags($new_instance['wednesday_time']);
        $instance['thursday_text'] = strip_tags($new_instance['thursday_text']);
        $instance['thursday_time'] = strip_tags($new_instance['thursday_time']);
        $instance['friday_text'] = strip_tags($new_instance['friday_text']);
        $instance['friday_time'] = strip_tags($new_instance['friday_time']);
        $instance['saturday_text'] = strip_tags($new_instance['saturday_text']);
        $instance['saturday_time'] = strip_tags($new_instance['saturday_time']);
        $instance['sunday_text'] = strip_tags($new_instance['sunday_text']);
        $instance['sunday_time'] = strip_tags($new_instance['sunday_time']);

        return $instance;
    }

    function form($instance) {

        /* defaults */
        $defaults = array(
            'title' => 'Opening Hours',    
            'monday_text' => 'Monday',
            'monday_time' => '8:00 AM - 9:00 PM',
            'tuesday_text' => 'Tuesday',
            'tuesday_time' => '8:00 AM - 9:00 PM',
            'wednesday_text' => 'Wednesday',
            'wednesday_time' => '8:00 AM - 9:00 PM',
            'thursday_text' => 'Thursday',
            'thursday_time' => '8:00 AM - 9:00 PM',
            'friday_text' => 'Friday',
            'friday_time' => '8:00 AM - 9:00 PM',
            'saturday_text' => 'Saturday',
            'saturday_time' => '9:00 AM - 6:00 PM',
            'sunday_text' => 'Sunday',
            'sunday_time' => 'CLOSED',
        );
        $instance = wp_parse_args((array) $instance, $defaults);
        ?>

        <!-- Widget Title -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'dental-care'); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" style="width:100%;"/>
        </p>

        <!-- Monday Time -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('monday_text')); ?>"><?php esc_html_e('Monday:', 'dental-care'); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('monday_text')); ?>" name="<?php echo esc_attr($this->get_field_name('monday_text')); ?>" value="<?php echo esc_attr($instance['monday_text']); ?>" style="width:100%;"/><br />
            <input id="<?php echo esc_attr($this->get_field_id('monday_time')); ?>" name="<?php echo esc_attr($this->get_field_name('monday_time')); ?>" value="<?php echo esc_attr($instance['monday_time']); ?>" style="width:100%;"/><br />

        </p>

        <!-- Tuesday Time -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('tuesday_text')); ?>"><?php esc_html_e('Tuesday:', 'dental-care'); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('tuesday_text')); ?>" name="<?php echo esc_attr($this->get_field_name('tuesday_text')); ?>" value="<?php echo esc_attr($instance['tuesday_text']); ?>" style="width:100%;"/><br />
            <input id="<?php echo esc_attr($this->get_field_id('tuesday_time')); ?>" name="<?php echo esc_attr($this->get_field_name('tuesday_time')); ?>" value="<?php echo esc_attr($instance['tuesday_time']); ?>" style="width:100%;"/><br />

        </p>

        <!-- Wednesday Time -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('wednesday_text')); ?>"><?php esc_html_e('Wednesday:', 'dental-care'); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('wednesday_text')); ?>" name="<?php echo esc_attr($this->get_field_name('wednesday_text')); ?>" value="<?php echo esc_attr($instance['wednesday_text']); ?>" style="width:100%;"/><br />
            <input id="<?php echo esc_attr($this->get_field_id('wednesday_time')); ?>" name="<?php echo esc_attr($this->get_field_name('wednesday_time')); ?>" value="<?php echo esc_attr($instance['wednesday_time']); ?>" style="width:100%;"/><br />

        </p>

        <!-- Thursday Time -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('thursday_text')); ?>"><?php esc_html_e('Thursday:', 'dental-care'); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('thursday_text')); ?>" name="<?php echo esc_attr($this->get_field_name('thursday_text')); ?>" value="<?php echo esc_attr($instance['thursday_text']); ?>" style="width:100%;"/><br />
            <input id="<?php echo esc_attr($this->get_field_id('thursday_time')); ?>" name="<?php echo esc_attr($this->get_field_name('thursday_time')); ?>" value="<?php echo esc_attr($instance['thursday_time']); ?>" style="width:100%;"/><br />

        </p>

        <!-- Friday Time -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('friday_text')); ?>"><?php esc_html_e('Friday:', 'dental-care'); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('friday_text')); ?>" name="<?php echo esc_attr($this->get_field_name('friday_text')); ?>" value="<?php echo esc_attr($instance['friday_text']); ?>" style="width:100%;"/><br />
            <input id="<?php echo esc_attr($this->get_field_id('friday_time')); ?>" name="<?php echo esc_attr($this->get_field_name('friday_time')); ?>" value="<?php echo esc_attr($instance['friday_time']); ?>" style="width:100%;"/><br />

        </p>

        <!-- Saturday Time -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('saturday_text')); ?>"><?php esc_html_e('Saturday:', 'dental-care'); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('saturday_text')); ?>" name="<?php echo esc_attr($this->get_field_name('saturday_text')); ?>" value="<?php echo esc_attr($instance['saturday_text']); ?>" style="width:100%;"/><br />
            <input id="<?php echo esc_attr($this->get_field_id('saturday_time')); ?>" name="<?php echo esc_attr($this->get_field_name('saturday_time')); ?>" value="<?php echo esc_attr($instance['saturday_time']); ?>" style="width:100%;"/><br />

        </p>

        <!-- Sunday Time -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('sunday_text')); ?>"><?php esc_html_e('Sunday:', 'dental-care'); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('sunday_text')); ?>" name="<?php echo esc_attr($this->get_field_name('sunday_text')); ?>" value="<?php echo esc_attr($instance['sunday_text']); ?>" style="width:100%;"/><br />
            <input id="<?php echo esc_attr($this->get_field_id('sunday_time')); ?>" name="<?php echo esc_attr($this->get_field_name('sunday_time')); ?>" value="<?php echo esc_attr($instance['sunday_time']); ?>" style="width:100%;"/><br />

        </p>

        <?php
    }

}
?>