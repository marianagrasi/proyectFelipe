<?php


class stronghold_mega_menu {

	/*--------------------------------------------*
	 * Constructor
	 *--------------------------------------------*/

	/**
	 * Initializes the plugin by setting localization, filters, and administration functions.
	 */
	function __construct() {
		
		// add custom menu fields to menu
		add_filter( 'wp_setup_nav_menu_item', array( $this, 'stronghold_mega_menu_add_custom_nav_fields' ) );

		// save menu custom fields
		add_action( 'wp_update_nav_menu_item', array( $this, 'stronghold_mega_menu_update_custom_nav_fields'), 10, 3 );
		
		// edit menu walker
		add_filter( 'wp_edit_nav_menu_walker', array( $this, 'stronghold_mega_menu_edit_walker'), 10, 2 );

	} // end constructor
	
	
	/**
	 * Add custom fields to $item nav object
	 * in order to be used in custom Walker
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function stronghold_mega_menu_add_custom_nav_fields( $menu_item ) {	
	    $menu_item->icon = get_post_meta( $menu_item->ID, '_menu_item_icon', true );          
            $menu_item->numcolumns = get_post_meta($menu_item->ID, '_menu_item_numcolumns', true);           
            $menu_item->shortcode = get_post_meta($menu_item->ID, '_menu_item_shortcode', true);            
            $menu_item->hidetitle = get_post_meta($menu_item->ID, '_menu_item_hidetitle', true);

	    return $menu_item;	    
	}
	
	/**
	 * Save menu custom fields
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function stronghold_mega_menu_update_custom_nav_fields( $menu_id, $menu_item_db_id, $args ) {
	
	    // Check if element is properly sent
            if (isset($_REQUEST['menu-item-icon']) ){
	    if ( is_array( $_REQUEST['menu-item-icon']) ) {
	        $icon_value = $_REQUEST['menu-item-icon'][$menu_item_db_id];
	        update_post_meta( $menu_item_db_id, '_menu_item_icon', $icon_value );
	    }
            }
            
            if (isset($_REQUEST['menu-item-numcolumns']) ){
            if ( is_array( $_REQUEST['menu-item-numcolumns']) ) {
	        $numcolumns_value = $_REQUEST['menu-item-numcolumns'][$menu_item_db_id];
	        update_post_meta( $menu_item_db_id, '_menu_item_numcolumns', $numcolumns_value );
	    }
            }
            
            if (isset($_REQUEST['menu-item-shortcode']) ){
             if ( is_array( $_REQUEST['menu-item-shortcode']) ) {
	        $shortcode_value = $_REQUEST['menu-item-shortcode'][$menu_item_db_id];
	        update_post_meta( $menu_item_db_id, '_menu_item_shortcode', $shortcode_value );
	    }
            }
            
            if (isset($_REQUEST['menu-item-hidetitle']) ){
            if ( is_array( $_REQUEST['menu-item-hidetitle']) ) {
	        $hidetitle_value = $_REQUEST['menu-item-hidetitle'][$menu_item_db_id];
	        update_post_meta( $menu_item_db_id, '_menu_item_hidetitle', $hidetitle_value );
	    }
            }
	    
	}
	
	/**
	 * Define new Walker edit
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function stronghold_mega_menu_edit_walker($walker,$menu_id) {
	
	    return 'Walker_Nav_Menu_Edit_Custom';
	    
	}

}

// instantiate plugin's class
$GLOBALS['stronghold_mega_menu'] = new stronghold_mega_menu();

include_once( 'edit_custom_walker.php' );
include_once( 'custom_walker.php' );