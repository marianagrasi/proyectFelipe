<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Elementor_Custom_Controls {

	public function includes() {

		require_once( __DIR__ . '/icon-select-control.php' );
		 require_once( __DIR__ . '/blog-category-select-control.php' );
		 require_once( __DIR__ . '/team-category-select-control.php' );
		 require_once( __DIR__ . '/product-category-select-control.php' );
		 require_once( __DIR__ . '/service-category-select-control.php' );
		 require_once( __DIR__ . '/menu-select-control.php' );
		 require_once( __DIR__ . '/contact-form-select-control.php' );

	}

	public function register_controls() {
		$this->includes();
		$controls_manager = \Elementor\Plugin::$instance->controls_manager;

		$controls_manager->register_control(IconSelector_Control::IconSelector, new IconSelector_Control());
		 $controls_manager->register_control(BlogCategorySelect_Control::BlogCategorySelect, new BlogCategorySelect_Control());
		 $controls_manager->register_control(TeamCategorySelect_Control::TeamCategorySelect, new TeamCategorySelect_Control());
		 $controls_manager->register_control(ProductCategorySelect_Control::ProductCategorySelect, new ProductCategorySelect_Control());
		 $controls_manager->register_control(ServiceCategorySelect_Control::ServiceCategorySelect, new ServiceCategorySelect_Control());
		 $controls_manager->register_control(MenuSelect_Control::MenuSelect, new MenuSelect_Control());
		 $controls_manager->register_control(Contact_Form_Select_Control::Contact_Form_Select, new Contact_Form_Select_Control());

	}

	public function __construct() {
		add_action('elementor/controls/controls_registered', [$this, 'register_controls']);
	}

}
new Elementor_Custom_Controls();
