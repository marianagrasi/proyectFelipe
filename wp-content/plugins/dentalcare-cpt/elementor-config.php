<?php
function add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'dental-care',
		[
			'title' => __( 'Dental Care', 'dental-care' ),
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );
