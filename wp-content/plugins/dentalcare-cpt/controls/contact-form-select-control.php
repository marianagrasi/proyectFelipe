<?php

use \Elementor\Base_Data_Control;

class Contact_Form_Select_Control extends Base_Data_Control {

    const Contact_Form_Select = 'contact_form_select';

    /**
     * Set control type.
     */
    public function get_type() {
        return self::Contact_Form_Select;
    }

    public static function get_contact_forms() {

        $args = array(
            'post_type' => 'wpcf7_contact_form',
            'post_status' => 'publish',
            'pagination' => true,
            'posts_per_page' => -1,
        );

        $contact_forms = get_posts($args);

        $contact_forms_array = [];

        foreach ($contact_forms as $item => $contact_form) {

            $contact_forms_array[$item]['id'] = $contact_form->ID;
            $contact_forms_array[$item]['title'] = $contact_form->post_title;
        }
        return $contact_forms_array;
    }

    /**
     * Enqueue control scripts and styles.
     */
    public function enqueue() {
        
    }

    /**
     * Set default settings
     */
    protected function get_default_settings() {
        return [
            'optionscat' => self::get_contact_forms(),
            'include' => '',
            'exclude' => '',
        ];
    }

    /**
     * control field markup
     */
    public function content_template() {

        $control_uid = $this->get_control_uid();
        ?>
        <div class="elementor-control-field">

            <# if ( data.label ) {#>         
            <label for="<?php echo esc_attr($control_uid); ?>" class="elementor-control-title">{{{ data.label }}}</label>
            <# } #>

            <div class="elementor-control-input-wrapper">

                <select id="<?php echo esc_attr($control_uid); ?>" data-setting="{{ data.name }}">
                    <# _.each( data.optionscat, function( optionscat, value ) { #>
                    <option value="{{ optionscat.id }}">{{{ optionscat.title }}}</option>
                    <# } ); #>
                </select>
            </div>

        </div>

        <# if ( data.description ) { #>
        <div class="elementor-control-field-description">{{ data.description }}</div>
        <# } #>
        <?php
    }

}
