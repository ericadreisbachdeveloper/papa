<?php
/**
 * Toggle Bar helpter Functions
 *
 * @package		Total
 * @subpackage	Framework
 * @author		Alexander Clarke
 * @copyright	Copyright (c) 2015, WPExplorer.com
 * @link		http://www.wpexplorer.com
 * @since		1.0.0
 * @version		2.1.0
 */


/**
 * Returns the correct togglebar ID
 *
 * @since Total 1.0.0
 */
function wpex_toggle_bar_content_id() {
	
	// Get toggle bar page content based on ID
	$id = wpex_get_mod( 'toggle_bar_page' );

	// Apply filters
	$id	= apply_filters( 'wpex_toggle_bar_content_id', $id );

	// Return the ID
	return $id;

}


/**
 * Checks if the toggle bar is enabled
 *
 * @since	Total 1.0.0
 * @return	bool
 */
function wpex_has_togglebar( $post_id = NULL ) {

	// Get global object
	$wpex_theme = wpex_global_obj();

	// Return if toggle bar page is not defined
	if ( ! $wpex_theme->toggle_bar_content_id ) {
		return false;
	}

	// Return true by default
	$return = true;

	// Disabled for front-end composer
	if ( wpex_is_front_end_composer() ) {
		$return = false;
	}

	// Return false if disabled via the Customizer
	if ( ! wpex_get_mod( 'toggle_bar' ) ) {
		$return = false;
	}

	// Return false if disabled via the page settings
	if ( 'enable' == get_post_meta( $post_id, 'wpex_disable_toggle_bar', true ) ) {
		$return = true;
	}

	// Return trie if enabled via the page settings
	if ( 'on' == get_post_meta( $post_id, 'wpex_disable_toggle_bar', true ) ) {
		$return = false;
	}

	// Apply filters for child theming
	$return = apply_filters( 'wpex_toggle_bar_active', $return );

	// Return
	return $return;

}

/**
 * Returns correct togglebar classes
 *
 * @since Total 1.0.0
 */
function wpex_toggle_bar_classes() {

	// Add default classes
	$classes = array( 'clr' );

	// Add animation classes
	if ( $animation = wpex_get_mod( 'toggle_bar_animation', 'fade' ) ) {
		$classes[] = 'toggle-bar-'. $animation;
	}

	// Add visibility classes
	if ( $visibility = wpex_get_mod( 'toggle_bar_visibility', 'always-visible' ) ) {
		$classes[] = $visibility;
	}

	// Apply filters for child theming
	$classes = apply_filters( 'wpex_toggle_bar_active', $classes );

	// Turn classes into space seperated string
	$classes = implode( ' ', $classes );

	// Return classes
	return $classes;

}