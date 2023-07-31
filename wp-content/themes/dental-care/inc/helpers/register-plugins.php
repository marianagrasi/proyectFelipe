<?php

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.5.2
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname(__FILE__) . '/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'dental_care_register_required_plugins');

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function dental_care_register_required_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // Include DentalCare Custom Post Types plugin.
        array(
            'name' => 'DentalCare CPT',
            'slug' => 'dentalcare-cpt',
            'source' => get_template_directory() . '/inc/plugins/dentalcare-cpt.zip',
            'required' => true,
            'force_activation' => false,
            'force_deactivation' => false,
            'version' => '15.3',
        ),
        array(
            'name' => 'WPBakery Page Builder',
            'slug' => 'js_composer',
            'source' => get_template_directory() . '/inc/plugins/js_composer.zip',
            'required' => false,
            'force_activation' => false,
            'force_deactivation' => false,
            'version' => '6.13.0',
        ),
        array(
            'name' => 'One Click Demo Import',
            'slug' => 'one-click-demo-import',
            'source' => get_template_directory() . '/inc/plugins/one-click-demo-import.zip',
            'required' => true,
            'force_activation' => false,
            'force_deactivation' => false,
            'version' => '3.1.1',
        ),
        array(
            'name' => 'Revolution Slider',
            'slug' => 'revslider',
            'source' => get_template_directory() . '/inc/plugins/revslider.zip',
            'required' => false,
            'force_activation' => false,
            'force_deactivation' => false,
            'version' => '6.6.14',
        ),
        array(
            'name' => 'Ultimate Addons for WPBakery Page Builder',
            'slug' => 'Ultimate_VC_Addons',
            'source' => get_template_directory() . '/inc/plugins/Ultimate_VC_Addons.zip',
            'required' => false,
            'force_activation' => false,
            'force_deactivation' => false,
            'version' => '3.19.15',
        ),
        //    array(
        //     'name' => 'Booked',
        //     'slug' => 'booked',
        //     'source' => get_template_directory() . '/inc/plugins/booked.zip',
        //     'required' => false,
        //     'force_activation' => false,
        //     'force_deactivation' => false,
        //     'version' => '2.4',
        // ),
        array(
            'name' => 'Envato Market',
            'slug' => 'envato-market',
            'source' => get_template_directory() . '/inc/plugins/envato-market.zip',
            'required' => false,
            'force_activation' => false,
            'force_deactivation' => false,
        ),
        // Include Contact Form 7 from the WordPress Plugin Repository.
        array(
            'name' => 'Contact Form 7',
            'slug' => 'contact-form-7',
            'required' => false,
        ),
        // Include WooCommerce from the WordPress Plugin Repository.
        array(
            'name' => 'WooCommerce',
            'slug' => 'woocommerce',
            'required' => false,
        ),
        array(
            'name' => 'Elementor',
            'slug' => 'elementor',
            'required' => false,
            'force_activation' => false,
            'force_deactivation' => false,
        ),

    );

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		'strings'      => array(
			'page_title'                      => esc_html__( 'Install Required Plugins', 'dental-care' ),
			'menu_title'                      => esc_html__( 'Install Plugins', 'dental-care' ),
			// <snip>...</snip>
			'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		)

	);

    tgmpa($plugins, $config);
}
