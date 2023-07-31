<?php

use \Elementor\Base_Data_Control;

class MenuSelect_Control extends Base_Data_Control {

    const MenuSelect = 'menu_select';

    /**
     * Set control type.
     */
    public function get_type() {
        return self::MenuSelect;
    }

    public static function get_menus() {

        $categories = get_terms('nav_menu');

        $categories_array = [];

        foreach ($categories as $item => $category) {

            $categories_array[$item]['slug'] = $category->slug;
            $categories_array[$item]['name'] = $category->name;
        }
        return $categories_array;
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
            'optionscat' => self::get_menus(),
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
                    <option value="{{ optionscat.slug }}">{{{ optionscat.name }}}</option>
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
