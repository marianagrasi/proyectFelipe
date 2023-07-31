<?php

/**
 * Demo
 */
function dental_care_ocdi_import_files() {
    return array(
        array(
            'import_file_name' => 'Demo 1',
            'local_import_file' => trailingslashit(get_template_directory()) . 'demo/dental-care-data.xml',
            'local_import_widget_file' => trailingslashit(get_template_directory()) . 'demo/widgets.json',
            'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . '/demo/demo1/demo1.jpg',
            'import_notice' => esc_html__('After you import this demo, you will have to setup the slider separately.', 'dental-care'),
        ),
        array(
            'import_file_name' => 'Demo 2',
            'local_import_file' => trailingslashit(get_template_directory()) . 'demo/dental-care-data.xml',
            'local_import_widget_file' => trailingslashit(get_template_directory()) . 'demo/widgets.json',
            'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . '/demo/demo2/demo2.jpg',
            'import_notice' => esc_html__('After you import this demo, you will have to setup the slider separately.', 'dental-care'),
        ),
        array(
            'import_file_name' => 'Demo 3',
            'local_import_file' => trailingslashit(get_template_directory()) . 'demo/dental-care-data.xml',
            'local_import_widget_file' => trailingslashit(get_template_directory()) . 'demo/widgets.json',
            'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . '/demo/demo3/demo3.jpg',
            'import_notice' => esc_html__('After you import this demo, you will have to setup the slider separately.', 'dental-care'),
        ),
        array(
            'import_file_name' => 'Demo 4',
            'local_import_file' => trailingslashit(get_template_directory()) . 'demo/dental-care-data.xml',
            'local_import_widget_file' => trailingslashit(get_template_directory()) . 'demo/widgets.json',
            'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . '/demo/demo4/demo4.jpg',
            'import_notice' => esc_html__('After you import this demo, you will have to setup the slider separately.', 'dental-care'),
        )
        // array(
        //     'import_file_name' => 'Demo 5',
        //     'local_import_file' => trailingslashit(get_template_directory()) . 'demo/dental-care-data.xml',
        //     'local_import_widget_file' => trailingslashit(get_template_directory()) . 'demo/widgets.json',
        //     'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . '/demo/demo5/demo5.jpg',
        //     'import_notice' => esc_html__('After you import this demo, you will have to setup the slider separately.', 'dental-care'),
        // ),
        // array(
        //     'import_file_name' => 'Demo 6',
        //     'local_import_file' => trailingslashit(get_template_directory()) . 'demo/dental-care-data.xml',
        //     'local_import_widget_file' => trailingslashit(get_template_directory()) . 'demo/widgets.json',
        //     'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . '/demo/demo6/demo6.jpg',
        //     'import_notice' => esc_html__('After you import this demo, you will have to setup the slider separately.', 'dental-care'),
        // ),
    );
}

add_filter('pt-ocdi/import_files', 'dental_care_ocdi_import_files');

function dental_care_ocdi_after_import($selected_import) {

    if ('Demo 1' === $selected_import['import_file_name']) {
        $file = trailingslashit(get_template_directory()) . 'demo/demo1/themeoptions.txt';

        // Get file contents and decode
        $data = dental_care_get_local_file_contents($file);

        $func = 'base64' . '_decode';
        $prepared_data = maybe_unserialize($func($data));

        update_option(ot_options_id(), $prepared_data);

        // Assign menus to their locations.
        $main_menu = get_term_by('name', 'Main Menu', 'nav_menu');

        set_theme_mod('nav_menu_locations', array(
            'primary' => $main_menu->term_id,
            'mobile-menu' => $main_menu->term_id,
                )
        );

        // Assign front page and posts page (blog page).
        $front_page = get_page_by_title('Home 1');
        if (isset($front_page->ID)) {
            update_option('show_on_front', 'page');
            update_option('page_on_front', $front_page->ID);
        }

        //Import Revolution Slider
        if (class_exists('RevSlider')) {
            $slider_array = array(
                get_template_directory() . "/demo/sliders/home1.zip",
            );

            $slider = new RevSlider();

            foreach ($slider_array as $filepath) {
                $slider->importSliderFromPost(true, true, $filepath);
            }

            echo ' Slider processed';
        }
    } elseif ('Demo 2' === $selected_import['import_file_name']) {
        $file = trailingslashit(get_template_directory()) . 'demo/demo2/themeoptions.txt';

        // Get file contents and decode
        $data = dental_care_get_local_file_contents($file);

        $func = 'base64' . '_decode';
        $prepared_data = maybe_unserialize($func($data));

        update_option(ot_options_id(), $prepared_data);

        // Assign menus to their locations.
        $main_menu = get_term_by('name', 'Main Menu', 'nav_menu');

        set_theme_mod('nav_menu_locations', array(
            'primary' => $main_menu->term_id,
            'mobile-menu' => $main_menu->term_id,
                )
        );

        // Assign front page and posts page (blog page).
        $front_page = get_page_by_title('Home 2');
        if (isset($front_page->ID)) {
            update_option('show_on_front', 'page');
            update_option('page_on_front', $front_page->ID);
        }

        //Import Revolution Slider
        if (class_exists('RevSlider')) {
            $slider_array = array(
                get_template_directory() . "/demo/sliders/home2.zip",
            );

            $slider = new RevSlider();

            foreach ($slider_array as $filepath) {
                $slider->importSliderFromPost(true, true, $filepath);
            }

            echo ' Slider processed';
        }
    } elseif ('Demo 3' === $selected_import['import_file_name']) {
        $file = trailingslashit(get_template_directory()) . 'demo/demo3/themeoptions.txt';

        // Get file contents and decode
        $data = dental_care_get_local_file_contents($file);

        $func = 'base64' . '_decode';
        $prepared_data = maybe_unserialize($func($data));

        update_option(ot_options_id(), $prepared_data);

        // Assign menus to their locations.
        $main_menu = get_term_by('name', 'Main Menu', 'nav_menu');

        set_theme_mod('nav_menu_locations', array(
            'primary' => $main_menu->term_id,
            'mobile-menu' => $main_menu->term_id,
                )
        );

        // Assign front page and posts page (blog page).
        $front_page = get_page_by_title('Home 3');
        if (isset($front_page->ID)) {
            update_option('show_on_front', 'page');
            update_option('page_on_front', $front_page->ID);
        }

        //Import Revolution Slider
        if (class_exists('RevSlider')) {
            $slider_array = array(
                get_template_directory() . "/demo/sliders/home3.zip",
            );

            $slider = new RevSlider();

            foreach ($slider_array as $filepath) {
                $slider->importSliderFromPost(true, true, $filepath);
            }

            echo ' Slider processed';
        }
    }
    elseif ('Demo 4' === $selected_import['import_file_name']) {
        $file = trailingslashit(get_template_directory()) . 'demo/demo4/themeoptions.txt';
    
        // Get file contents and decode
        $data = dental_care_get_local_file_contents($file);
    
        $func = 'base64' . '_decode';
        $prepared_data = maybe_unserialize($func($data));
    
        update_option(ot_options_id(), $prepared_data);
    
    
        // Assign menus to their locations.
        $main_menu = get_term_by('name', 'Main Menu', 'nav_menu');
    
        set_theme_mod('nav_menu_locations', array(
            'primary' => $main_menu->term_id,
            'mobile-menu' => $main_menu->term_id,
                )
        );
    
        // Assign front page and posts page (blog page).
        $front_page = get_page_by_title('Home 4');
        if (isset($front_page->ID)) {
            update_option('show_on_front', 'page');
            update_option('page_on_front', $front_page->ID);
        }
    
        //Import Revolution Slider
        if (class_exists('RevSlider')) {
            $slider_array = array(
                get_template_directory() . "/demo/sliders/home4.zip",
            );
    
            $slider = new RevSlider();
    
            foreach ($slider_array as $filepath) {
                $slider->importSliderFromPost(true, true, $filepath);
            }
    
            echo ' Slider processed';
        }
    }
    //  elseif ('Demo 5' === $selected_import['import_file_name']) {
    //     $file = trailingslashit(get_template_directory()) . 'demo/demo5/themeoptions.txt';
    
    //     // Get file contents and decode
    //     $data = dental_care_get_local_file_contents($file);
    
    //     $func = 'base64' . '_decode';
    //     $prepared_data = maybe_unserialize($func($data));
    
    //     update_option(ot_options_id(), $prepared_data);
    
    
    //     // Assign menus to their locations.
    //     $main_menu = get_term_by('name', 'Main Menu 2', 'nav_menu');
    
    //     set_theme_mod('nav_menu_locations', array(
    //         'primary' => $main_menu->term_id,
    //         'mobile-menu' => $main_menu->term_id,
    //             )
    //     );
    
    //     // Assign front page and posts page (blog page).
    //     $front_page = get_page_by_title('Home 5');
    //     if (isset($front_page->ID)) {
    //         update_option('show_on_front', 'page');
    //         update_option('page_on_front', $front_page->ID);
    //     }
    
    //     //Import Revolution Slider
    //     if (class_exists('RevSlider')) {
    //         $slider_array = array(
    //             get_template_directory() . "/demo/sliders/home5.zip",
    //         );
    
    //         $slider = new RevSlider();
    
    //         foreach ($slider_array as $filepath) {
    //             $slider->importSliderFromPost(true, true, $filepath);
    //         }
    
    //         echo ' Slider processed';
    //     }
    // }elseif ('Demo 6' === $selected_import['import_file_name']) {
    //     $file = trailingslashit(get_template_directory()) . 'demo/demo6/themeoptions.txt';
    
    //     // Get file contents and decode
    //     $data = dental_care_get_local_file_contents($file);
    
    //     $func = 'base64' . '_decode';
    //     $prepared_data = maybe_unserialize($func($data));
    
    //     update_option(ot_options_id(), $prepared_data);
    
    
    //     // Assign menus to their locations.
    //     $main_menu = get_term_by('name', 'Main Menu 2', 'nav_menu');
    
    //     set_theme_mod('nav_menu_locations', array(
    //         'primary' => $main_menu->term_id,
    //         'mobile-menu' => $main_menu->term_id,
    //             )
    //     );
    
    //     // Assign front page and posts page (blog page).
    //     $front_page = get_page_by_title('Home 6');
    //     if (isset($front_page->ID)) {
    //         update_option('show_on_front', 'page');
    //         update_option('page_on_front', $front_page->ID);
    //     }
    
    //     //Import Revolution Slider
    //     if (class_exists('RevSlider')) {
    //         $slider_array = array(
    //             get_template_directory() . "/demo/sliders/home4.zip",
    //         );
    
    //         $slider = new RevSlider();
    
    //         foreach ($slider_array as $filepath) {
    //             $slider->importSliderFromPost(true, true, $filepath);
    //         }
    
    //         echo ' Slider processed';
    //     }
    // }
}

add_action('pt-ocdi/after_import', 'dental_care_ocdi_after_import');

function dental_care_ocdi_plugin_page_setup($default_settings) {
    $default_settings['parent_slug'] = 'themes.php';
    $default_settings['page_title'] = esc_html__('One Click Demo Import', 'dental-care');
    $default_settings['menu_title'] = esc_html__('Dental Care Demo Data Import', 'dental-care');
    $default_settings['capability'] = 'import';

    return $default_settings;
}

add_filter('pt-ocdi/plugin_page_setup', 'dental_care_ocdi_plugin_page_setup');
