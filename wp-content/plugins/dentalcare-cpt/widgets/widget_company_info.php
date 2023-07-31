<?php

add_action('widgets_init', 'dental_care_company_info_widget');

function dental_care_company_info_widget() {
    register_widget('dental_care_company');
}

class dental_care_company extends WP_Widget {

    /**
     * Widget constructor
     */
    function __construct() {
        $widget_ops = array('classname' => 'dental_care_company', 'description' => esc_html__('Displays company info.', 'dental-care'));
        $control_ops = array('width' => 350, 'height' => 400, 'id_base' => 'dental_care_company');
        parent::__construct('dental_care_company', esc_html__('Dental Care: Company Info', 'dental-care'), $widget_ops, $control_ops);
    }

    function widget($args, $instance) {
        extract($args);

        $title = apply_filters('widget_title', $instance['title']);

        $address = $instance['address'];
        $phone = $instance['phone'];
        $mobile = $instance['mobile'];
        $fax = $instance['fax'];
        $email = $instance['email'];



        echo $before_widget;

        if ($title)
            echo $before_title . $title . $after_title;
        ?>

        <ul class="company-info-wid">
            <?php if ($address): ?>
                <li><i class="fa fa-map-marker"></i> <?php echo esc_html($address); ?></li>
            <?php endif; ?>
            <?php if ($phone): ?>
                <li><i class="fa fa-phone"></i><a href="tel:<?php echo esc_html($phone); ?>"> <?php echo esc_html($phone); ?></a></li>
            <?php endif; ?>
            <?php if ($mobile): ?>
                <li><i class="fa fa-mobile"></i><a href="tel:<?php echo esc_html($mobile); ?>"> <?php echo esc_html($mobile); ?></a></li>
            <?php endif; ?>    
            <?php if ($fax): ?>
                <li><i class="fa fa-fax"></i> <?php echo esc_html($fax); ?></li>
            <?php endif; ?>
            <?php if ($email): ?>
                <li><i class="fa fa-envelope-o"></i><a href="mailto:<?php echo esc_html($email); ?>?subject=<?php esc_html_e('Contact Us', 'dental-care'); ?>" target='_blank'> <?php echo esc_html($email); ?> </a></li>
            <?php endif; ?>



        </ul>


        <?php
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['address'] = strip_tags($new_instance['address']);
        $instance['phone'] = strip_tags($new_instance['phone']);
        $instance['mobile'] = strip_tags($new_instance['mobile']);
        $instance['fax'] = strip_tags($new_instance['fax']);
        $instance['email'] = strip_tags($new_instance['email']);


        return $instance;
    }

    function form($instance) {

        /* defaults */
        $defaults = array(
            'title' => 'About Us',
            'address' => '',
            'phone' => '',
            'mobile' => '',
            'fax' => '',
            'email' => '',
        );
        $instance = wp_parse_args((array) $instance, $defaults);
        ?>

        <!-- Widget Title -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html__("Title: ", "dental-care"); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" style="width:100%;"/>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php echo esc_html__("Address: ", "dental-care"); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" value="<?php echo esc_attr($instance['address']); ?>" style="width:100%;"/><br />

        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php echo esc_html__("Phone: ", "dental-care"); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" value="<?php echo esc_attr($instance['phone']); ?>" style="width:100%;"/><br />

        </p>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('mobile')); ?>"><?php echo esc_html__("Mobile: ", "dental-care"); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('mobile')); ?>" name="<?php echo esc_attr($this->get_field_name('mobile')); ?>" value="<?php echo esc_attr($instance['mobile']); ?>" style="width:100%;"/><br />

        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('fax')); ?>"><?php echo esc_html__("Fax: ", "dental-care"); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('fax')); ?>" name="<?php echo esc_attr($this->get_field_name('fax')); ?>" value="<?php echo esc_attr($instance['fax']); ?>" style="width:100%;"/><br />

        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php echo esc_html__("Email: ", "dental-care"); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" value="<?php echo esc_attr($instance['email']); ?>" style="width:100%;"/><br />

        </p>


        <?php
    }

}
?>