<?php

use \Elementor\Base_Data_Control;

class IconSelector_Control extends Base_Data_Control {

    const IconSelector = 'icon_selector';

    /**
     * Set control type.
     */
    public function get_type() {
        return self::IconSelector;
    }

    public static function get_icons_dentalicons_two() {

        $icons = dental_care_dentalicons_two_array_extensions();

        return $icons;

    }

    public static function get_icons_dentalicons() {

        $icons = dental_care_dentalicons_array_extensions();

        return $icons;

    }

    public static function get_icons_linear() {

        $icons = dental_care_linearicons_array_extensions();

        return $icons;

    }

    public static function get_icons_stroke() {

        $icons = dental_care_stroke_array_extensions();

        return $icons;
    }

    public static function get_icons_themify() {

        $icons = dental_care_themify_array_extensions();

        return $icons;
    }

    /**
     * Enqueue control scripts and styles.
     */
    public function enqueue() {
        wp_enqueue_style('stroke', plugin_dir_url(__DIR__) . 'controls/css/stroke.min.css');
        wp_enqueue_style('linearicons', plugin_dir_url(__DIR__) . 'controls/css/linear-icons.min.css');
        wp_enqueue_style('themify', plugin_dir_url(__DIR__) . 'controls/css/themify.min.css');
        wp_enqueue_style('dental-care-icon', plugin_dir_url(__DIR__) . 'controls/css/dentalcarefont.min.css');
        wp_enqueue_style('dental-care-icon-two', plugin_dir_url(__DIR__) . 'controls/css/dentalcarefont2.min.css');
        wp_enqueue_style('dental-care-admin-style', plugin_dir_url(__DIR__) . 'controls/css/icon-selector.css');
    }

    /**
     * Set default settings
     */
    protected function get_default_settings() {
        return [
           'optionsdental' => self::get_icons_dentalicons(),
           'optionsdental2' => self::get_icons_dentalicons_two(),
           'optionslinear' => self::get_icons_linear(),
           'optionsstroke' => self::get_icons_stroke(),
           'optionsthemify' => self::get_icons_themify(),
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
        <label for="<?php echo esc_attr($control_uid); ?>" class="elementor-control-title">{{{ data.label }}}</label>

        <div class="elementor-control-field elementor-icon-selector-control-field">

             <div class="icon-selector-wrapper">
                <div class="icon-list-title"><strong>Dental</strong></div>

                <# _.each( data.optionsdental, function( optionsdental, value ) { #>
                <div class="icon-select-item">
                    <input class="input-hidden" id="{{ optionsdental.icon }}" type="radio" name="<?php echo esc_attr($control_uid); ?>" value="{{ value }}" data-setting="{{ data.name }}">

                    <label class="elementor-choices-label elementor-icon-selector-label" for="{{ optionsdental.icon }}" title="{{ optionsdental.title }}">
                        <i class="{{ optionsdental.icon }}" aria-hidden="true"></i>

                        <span class="elementor-screen-only">{{{ optionsdental.title }}}</span>
                    </label>
                </div>

                <# } ); #>
            </div> 


             <div class="icon-selector-wrapper">
                <div class="icon-list-title"><strong>Dental (Designed by Freepik from www.flaticon.com)</strong></div>

                <# _.each( data.optionsdental2, function( optionsdental2, value ) { #>
                <div class="icon-select-item">
                    <input class="input-hidden" id="{{ optionsdental2.icon }}" type="radio" name="<?php echo esc_attr($control_uid); ?>" value="{{ value }}" data-setting="{{ data.name }}">

                    <label class="elementor-choices-label elementor-icon-selector-label" for="{{ optionsdental2.icon }}" title="{{ optionsdental2.title }}">
                        <i class="{{ optionsdental2.icon }}" aria-hidden="true"></i>

                        <span class="elementor-screen-only">{{{ optionsdental2.title }}}</span>
                    </label>
                </div>

                <# } ); #>
            </div> 

            <div class="icon-selector-wrapper">
                <div class="icon-list-title"><strong>Linear Icons</strong></div>

                <# _.each( data.optionslinear, function( optionslinear, value ) { #>
                <div class="icon-select-item">
                    <input class="input-hidden" id="{{ optionslinear.icon }}" type="radio" name="<?php echo esc_attr($control_uid); ?>" value="{{ value }}" data-setting="{{ data.name }}">

                    <label class="elementor-choices-label elementor-icon-selector-label" for="{{ optionslinear.icon }}" title="{{ optionslinear.title }}">
                        <i class="{{ optionslinear.icon }}" aria-hidden="true"></i>

                        <span class="elementor-screen-only">{{{ optionslinear.title }}}</span>
                    </label>
                </div>

                <# } ); #>
            </div>

            <div class="icon-selector-wrapper">
                <div class="icon-list-title"><strong>Themify</strong></div>

                <# _.each( data.optionsthemify, function( optionsthemify, value ) { #>
                <div class="icon-select-item">
                    <input class="input-hidden" id="{{ optionsthemify.icon }}" type="radio" name="<?php echo esc_attr($control_uid); ?>" value="{{ value }}" data-setting="{{ data.name }}">

                    <label class="elementor-choices-label elementor-icon-selector-label" for="{{ optionsthemify.icon }}" title="{{ optionsthemify.title }}">
                        <i class="{{ optionsthemify.icon }}" aria-hidden="true"></i>

                        <span class="elementor-screen-only">{{{ optionsthemify.title }}}</span>
                    </label>
                </div>

                <# } ); #>
            </div>

            <div class="icon-selector-wrapper">
                <div class="icon-list-title"><strong>Stroke 7</strong></div>

                <# _.each( data.optionsstroke, function( optionsstroke, value ) { #>
                <div class="icon-select-item">
                    <input class="input-hidden" id="{{ optionsstroke.icon }}" type="radio" name="<?php echo esc_attr($control_uid); ?>" value="{{ value }}" data-setting="{{ data.name }}">

                    <label class="elementor-choices-label elementor-icon-selector-label" for="{{ optionsstroke.icon }}" title="{{ optionsstroke.title }}">
                        <i class="{{ optionsstroke.icon }}" aria-hidden="true"></i>

                        <span class="elementor-screen-only">{{{ optionsstroke.title }}}</span>
                    </label>
                </div>

                <# } ); #>
            </div>



        </div>
        <# if ( data.description ) { #>
        <div class="elementor-control-field-description">{{ data.description }}</div>
        <# } #>
        <?php
    }

}
