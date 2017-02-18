<?php

/* ---------------------------------------------------------------------------
 * Child Theme URI | DO NOT CHANGE
 * --------------------------------------------------------------------------- */
define( 'CHILD_THEME_URI', get_stylesheet_directory_uri() );


/* ---------------------------------------------------------------------------
 * Define | YOU CAN CHANGE THESE
 * --------------------------------------------------------------------------- */

// White Label --------------------------------------------
define( 'WHITE_LABEL', false );

// Static CSS is placed in Child Theme directory ----------
define( 'STATIC_IN_CHILD', false );


/* ---------------------------------------------------------------------------
 * Enqueue Style
 * --------------------------------------------------------------------------- */
add_action( 'wp_enqueue_scripts', 'enqueue_parent_theme_style', 101 );
function enqueue_parent_theme_style() {

	// Enqueue the parent stylesheet
	wp_enqueue_style( 'style', get_template_directory_uri() .'/style.css' );

	// Enqueue the parent rtl stylesheet
	if ( is_rtl() ) {
		wp_enqueue_style( 'mfn-rtl', get_template_directory_uri() . '/rtl.css' );
	}

	// Enqueue the child stylesheet
	wp_enqueue_style( 'mfn-child-style', get_stylesheet_directory_uri() .'/style.css' );

}

?>
<?
// Remove certain plugins
function my_recommended_plugins( $plugins ) {

    // Remove notice to install WooCommerce
    unset( $plugins['woocommerce'] );

    // Return plugins
    return $plugins;

}
add_filter( 'wpex_recommended_plugins', 'my_recommended_plugins' );

// Remove all plugins
function my_remove_recommended_plugins() {
    return array();
}
add_filter( 'wpex_recommended_plugins', 'my_remove_recommended_plugins' );

// start - added to test full search result
function my_custom_search_style() {
    return 'blog';
}
add_filter( 'wpex_search_results_style', 'my_custom_search_style' );
// end

// Add Shortcode
function upcoming_events( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'hsc_program' => '',
		), $atts )
	);
}
add_shortcode( 'upcoming-events', 'upcoming_events' );

// Add custom thumbnail sizes
add_image_size( 'box-cropped', 333, 333, true ); // 333 pixels wide by 333 pixels tall, hard crop mode

add_image_size( 'large-box-cropped', 412, 412, true ); // 412 pixels wide by 412 pixels tall, hard crop mode


// Remove unnecessary styling from post editor
add_filter('tiny_mce_before_init', 'tiny_mce_remove_unused_formats' );

function tiny_mce_remove_unused_formats($init) {
	// Add block format elements you want to show in dropdown
	$init['block_formats'] = 'Paragraph=p;Heading 1=h1;Heading 2=h2;Heading 3=h3;Pre=pre';
	return $init;
}
