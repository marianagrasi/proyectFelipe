<?php

add_action( 'vc_before_init', 'vc_before_init_actions' );

function vc_before_init_actions() {

    if( function_exists('vc_set_shortcodes_templates_dir') ){

        $dir = DENTALCARE_DIR . '/vc_templates';
        vc_set_shortcodes_templates_dir( $dir );

    }

}

add_action('vc_before_init', 'dental_care_params_VC');

function dental_care_params_VC() {

    function service_category_field_list($settings, $value) {

        $categories = get_terms('service-categories');

        $data = '<select name="' . esc_attr($settings['param_name']) . '" class="wpb_vc_param_value wpb-input wpb-select ' . esc_attr($settings['param_name']) . ' ' . esc_attr($settings['type']) . '">';

        foreach ($categories as $category) {
            $selected = '';
            if ($value !== '' && $category->slug === $value) {
                $selected = ' selected="selected"';
            }
            $data .= '<option value="' . esc_attr($category->slug) . '"' . $selected . '>' . esc_attr($category->name) . ' </option>';
        }
        $data .= '</select>';
        return $data;
    }

    vc_add_shortcode_param('service_category', 'service_category_field_list');

     function dental_care_team_member_category_field($settings, $value) {

        $categories = get_terms('team-member-categories');

        $data = '<select name="' . esc_attr($settings['param_name']) . '" class="wpb_vc_param_value wpb-input wpb-select ' . esc_attr($settings['param_name']) . ' ' . esc_attr($settings['type']) . '">';

        foreach ($categories as $category) {
            $selected = '';
            if ($value !== '' && $category->slug === $value) {
                $selected = ' selected="selected"';
            }
            $data .= '<option value="' . esc_attr($category->slug) . '"' . esc_attr($selected) . '>' . esc_attr($category->name) . ' </option>';
        }
        $data .= '</select>';
        return $data;
    }

    vc_add_shortcode_param('team_member_category', 'dental_care_team_member_category_field');


    function dental_care_testimoial_category_field($settings, $value) {

        $categories = get_terms('testimonial-categories');

        $data = '<select name="' . esc_attr($settings['param_name']) . '" class="wpb_vc_param_value wpb-input wpb-select ' . esc_attr($settings['param_name']) . ' ' . esc_attr($settings['type']) . '">';

        foreach ($categories as $category) {
            $selected = '';
            if ($value !== '' && $category->slug === $value) {
                $selected = ' selected="selected"';
            }
            $data .= '<option value="' . esc_attr($category->slug) . '"' . esc_attr($selected) . '>' . esc_attr($category->name) . ' </option>';
        }
        $data .= '</select>';
        return $data;
    }

    vc_add_shortcode_param('testimonial_category', 'dental_care_testimoial_category_field');


       function dental_care_gallery_category_field($settings, $value) {
       $categories = get_terms('gallery-categories');

        $data = '<select name="' . esc_attr($settings['param_name']) . '" class="wpb_vc_param_value wpb-input wpb-select ' . esc_attr($settings['param_name']) . ' ' . esc_attr($settings['type']) . '">';

        foreach ($categories as $category) {
            $selected = '';
            if ($value !== '' && $category->slug === $value) {
                $selected = ' selected="selected"';
            }
            $data .= '<option value="' . esc_attr($category->slug) . '"' . esc_attr($selected) . '>' . esc_attr($category->name) . ' </option>';
        }
        $data .= '</select>';
        return $data;
    }

    vc_add_shortcode_param('gallery_category', 'dental_care_gallery_category_field');


function dental_care_gallery_field($settings, $value) {

        $args = array(
            'post_type' => 'gallery',
            'post_status' => 'publish',
            'pagination' => true,
            'posts_per_page' => -1,
        );

        $galleries = get_posts($args);


        $data = '<select name="' . esc_attr($settings['param_name']) . '" class="wpb_vc_param_value wpb-input wpb-select ' . esc_attr($settings['param_name']) . ' ' . esc_attr($settings['type']) . '">';

        foreach ($galleries as $gallery) {
            $selected = '';
            if ($value !== '' && $gallery->ID == $value) {
                $selected = ' selected="selected"';
            }
            $data .= '<option value="' . esc_attr($gallery->ID) . '"' . esc_attr($selected) . '>' . esc_attr($gallery->post_title) . ' </option>';
        }
        $data .= '</select>';
        return $data;
    }

    vc_add_shortcode_param('gallery_select', 'dental_care_gallery_field');




        function dental_care_custom_menu_field($settings, $value) {

        $menus = get_terms('nav_menu');

        $data = '<select name="' . esc_attr($settings['param_name']) . '" class="wpb_vc_param_value wpb-input wpb-select ' . esc_attr($settings['param_name']) . ' ' . esc_attr($settings['type']) . '">';

        foreach ($menus as $menu) {
            $selected = '';
            if ($value !== '' && $menu->slug === $value) {
                $selected = ' selected="selected"';
            }
            $data .= '<option value="' . esc_attr($menu->slug) . '"' . esc_attr($selected) . '>' . esc_attr($menu->name) . ' </option>';
        }
        $data .= '</select>';
        return $data;
    }

    vc_add_shortcode_param('menu_select', 'dental_care_custom_menu_field');

  function dental_care_icon_field($settings, $value) {
        $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
        $type = isset($settings['type']) ? $settings['type'] : '';
        $class = isset($settings['class']) ? $settings['class'] : '';

        $icons_themify = dental_care_themify_array();
        $icons_linear = dental_care_linearicons_array();
        $icons_dental = dental_care_dentalicons_array();
        $icons_dental2 = dental_care_dental2icons_array();
        $icons_awesome = dental_care_fontawesomeicons_array();

        $string = '<input type="hidden" name="' . esc_attr($param_name) . '" class="wpb_vc_param_value ' . esc_attr($param_name) . ' ' . esc_attr($type) . ' ' . esc_attr($class) . '" value="' . esc_attr($value) . '" id="icon-select"/>
				<div class="icon-selected"><i class="' . esc_attr($value) . '"></i><label>' . esc_attr($value) . '</label></div>';
        $string .='<input class="search" type="text" placeholder="Search for an icon" />';
        $string .='<div id="icon-list-wrapper" >';

        $string .= '<span class="">Dental Icons</span>';
        $string .= '<ul class="icon-list">';
        foreach ($icons_dental as $icon) {
            $selected = ($icon == $value) ? 'class="selected"' : '';
            $string .= '<li ' . esc_attr($selected) . ' data-ico="' . esc_attr($icon) . '"><i class="' . esc_attr($icon) . '"></i><label class="icon">' . esc_attr($icon) . '</label></li>';
        }
        $string .='</ul>';

        $string .= '<span class="">Dental Icons 2 <strong>(Designed by Freepik from www.flaticon.com)</strong></span>';
        $string .= '<ul class="icon-list">';
        foreach ($icons_dental2 as $icon) {
            $selected = ($icon == $value) ? 'class="selected"' : '';
            $string .= '<li ' . esc_attr($selected) . ' data-ico="' . esc_attr($icon) . '"><i class="' . esc_attr($icon) . '"></i><label class="icon">' . esc_attr($icon) . '</label></li>';
        }
        $string .='</ul>';

        $string .= '<span class="">Font Awesome</span>';
        $string .= '<ul class="icon-list">';
        foreach ($icons_awesome as $icon) {
            $selected = ($icon == $value) ? 'class="selected"' : '';
            $string .= '<li ' . esc_attr($selected) . ' data-ico="' . esc_attr($icon) . '"><i class="' . esc_attr($icon) . '"></i><label class="icon">' . esc_attr($icon) . '</label></li>';
        }
        $string .='</ul>';

        $string .= '<span class="">Themify</span>';
        $string .= '<ul class="icon-list">';
        foreach ($icons_themify as $icon) {
            $selected = ($icon == $value) ? 'class="selected"' : '';
            $string .= '<li ' . esc_attr($selected) . ' data-ico="' . esc_attr($icon) . '"><i class="' . esc_attr($icon) . '"></i><label class="icon">' . esc_attr($icon) . '</label></li>';
        }
        $string .='</ul>';

            $string .= '<span class="">Linear Icons</span>';
        $string .= '<ul class="icon-list">';
        foreach ($icons_linear as $icon) {
            $selected = ($icon == $value) ? 'class="selected"' : '';
            $string .= '<li ' . esc_attr($selected) . ' data-ico="' . esc_attr($icon) . '"><i class="' . esc_attr($icon) . '"></i><label class="icon">' . esc_attr($icon) . '</label></li>';
        }
        $string .='</ul>';

        $string .='</div>';

        $string .= '<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery(".search").keyup(function(){

					var searchVal = jQuery(this).val();

					jQuery(".icon-list li").each(function(){
						if (jQuery(this).text().search(new RegExp(searchVal, "i")) < 0) {
							jQuery(this).fadeOut();
						} else {
							jQuery(this).show();
						}
					});
				});
			});

			jQuery("#icon-list-wrapper li").click(function() {
				jQuery(this).attr("class","selected").siblings().removeAttr("class");
				var icon = jQuery(this).attr("data-ico");
				jQuery("#icon-select").val(icon);
				jQuery(".icon-selected").html("<i class=\'icon "+icon+"\'></i><label>"+icon+"</label>");
			});
	</script>';
        return $string;
    }

    vc_add_shortcode_param('icon', 'dental_care_icon_field');
}
