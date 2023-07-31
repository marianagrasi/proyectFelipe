<?php

/**
 * Plugin Name: Dental Care CPT
 * Description: Includes custom post types and Elementor/WPBakery Page Builder Addons for the Dental Care theme.
 * Version: 15.3
 * Author: Stronghold Themes
 * Author URI:
 * Text Domain: dental-care
 */

 define( 'DENTALCARE_DIR', plugin_dir_path( __FILE__ ) );


if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Main Dental Care CPT Class
 *
 */

final class Dental_Care_CPT{

    /**
     * Constructor
     *
     * @access public
     */
    public function __construct() {

        // Load translation
        add_action('init', array($this, 'dental_care_cpt_i18n'));

        // Init Plugin
        add_action('plugins_loaded', array($this, 'dental_care_cpt_init'));
    }

    /**
     * Load Textdomain
     *
     * Load plugin localization files.
     * Fired by `init` action hook.
     *
     * @access public
     */
    public function dental_care_cpt_i18n() {
        load_plugin_textdomain('dental-care');
    }

    /**
     *
     * @access public
     */
    public function dental_care_cpt_init() {

        require_once( 'plugin.php' );
        require_once( 'admin/ot-loader.php' );
        require_once( 'elementor-config.php' );
        require_once( 'controls/custom-control-init.php' );
        require_once( 'icons.php' );

    }


}

// Instantiate Dental Care CPT.
new Dental_Care_CPT();
