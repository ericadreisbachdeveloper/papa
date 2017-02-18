<?php
/**
 * iLightbox class
 *
 * @package     Total
 * @subpackage  Framework
 * @author      Alexander Clarke
 * @copyright   Copyright (c) 2015, WPExplorer.com
 * @link        http://www.wpexplorer.com
 * @since       2.1.0
 * @version     2.1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Start Class
if ( ! class_exists( 'WPEX_iLightbox' ) ) {
	
	class WPEX_iLightbox {

		/**
		 * Main constructor
		 *
		 * @access public
		 * @since  2.1.0
		 */
		public function __construct() {
			add_action( 'wp_enqueue_scripts', array( $this, 'register_style_sheets' ), 20 );
		}

		/**
		 * Holds an array of lightbox skins
		 *
		 * @access public
		 * @since  2.1.0
		 */
		public static function skins() {

			$skins = array(
				'minimal'     => __( 'Minimal', 'wpex' ),
				'dark'        => __( 'Dark', 'wpex' ),
				'light'       => __( 'Light', 'wpex' ),
				'mac'         => __( 'Mac', 'wpex' ),
				'metro-black' => __( 'Metro Black', 'wpex' ),
				'metro-white' => __( 'Metro White', 'wpex' ),
				'parade'      => __( 'Parade', 'wpex' ),
				'smooth'      => __( 'Smooth', 'wpex' ),
			);
			return apply_filters( 'wpex_ilightbox_skins', $skins );

		}

		/**
		 * Returns active lightbox skin
		 *
		 * @access public
		 * @since  2.1.0
		 */
		public static function active_skin() {

			// Get skin from Customizer setting
			$skin = wpex_get_mod( 'lightbox_skin', 'minimal' );

			// Sanitize
			$skin = $skin ? $skin : 'minimal';
				
			// Apply filters
			$skin = apply_filters( 'wpex_lightbox_skin', $skin );

			// Return
			return $skin;

		}

		/**
		 * Returns correct skin stylesheet
		 *
		 * @access public
		 * @since  2.1.0
		 */
		public static function skin_style( $skin = null ) {

			// Sanitize skin
			if ( ! $skin ) {
				$skin = self::active_skin();
			}

			// Loop through skins
			$stylesheet = WPEX_CSS_DIR_URI .'ilightbox/'. $skin .'/skin.css';

			// Apply filters
			$stylesheet = apply_filters( 'wpex_ilightbox_stylesheet', $stylesheet );

			// Return directory uri
			return $stylesheet;

		}

		 /**
		 * Enqueues iLightbox skin stylesheet
		 *
		 * @access public
		 * @since  2.1.0
		 */
		public static function enqueue_style( $skin = null ) {

			// Get default skin if custom skin not defined
			if ( ! $skin ) {
				$skin = self::active_skin();
			}

			// Enqueue stylesheet
			wp_enqueue_style( 'wpex-ilightbox-'. $skin );

		}

		/**
		 * Registers all stylesheets for quick usage
		 *
		 * @access public
		 * @since  2.1.0
		 */
		public function register_style_sheets() {

			// Register stylesheets
			foreach( self::skins() as $key => $val ) {
				wp_register_style( 'wpex-ilightbox-'. $key, $this->skin_style( $key ), false, WPEX_THEME_VERSION );
			}

		}

		/**
		 * Loads the stylesheet
		 *
		 * @access public
		 * @since  2.1.0
		 */
		public function load_css() {
			self::enqueue_style();
		}

	}

}
new WPEX_iLightbox();


/* Helper functions
-------------------------------------------------------------------------------*/

/**
 * Returns array of ilightbox Skins
 *
 * @since   2.0.0
 * @return  array
 */
function wpex_ilightbox_skins() {
	return WPEX_iLightbox::skins();
}

/**
 * Returns lightbox skin
 *
 * @return  $skin
 * @since   Total 1.3.3
 */
function wpex_ilightbox_skin() {
	return WPEX_iLightbox::active_skin();
}

/**
 * Returns lightbox skin stylesheet
 *
 * @return  $skin
 * @since   Total 1.3.3
 */
function wpex_ilightbox_stylesheet( $skin = null ) {
	return WPEX_iLightbox::skin_style( $skin );
}

/**
 * Enqueues lightbox stylesheet
 *
 * @return  $skin
 * @since   Total 1.3.3
 */
function wpex_enqueue_ilightbox_skin( $skin = null ) {
	return WPEX_iLightbox::enqueue_style( $skin );
}

/**
 * Echo lightbox image URL
 *
 * @since   2.0.0
 * @return  string
 */
function wpex_lightbox_image( $attachment = '' ) {
	echo wpex_get_lightbox_image( $attachment );
}

/**
 * Returns lightbox image URL.
 *
 * @since   2.0.0
 * @return  string
 */
function wpex_get_lightbox_image( $attachment = '' ) {

	// If attachment is empty lets set it to the post thumbnail id
	if ( ! $attachment ) {
		$attachment = get_post_thumbnail_id();
	}

	// Set default size
	$size = apply_filters( 'wpex_get_lightbox_image_size', 'large' );

	// If the attachment is an ID lets get the URL
	if ( is_numeric( $attachment ) ) {
		$image = wp_get_attachment_image_src( $attachment, $size );
	} elseif ( is_array( $attachment ) ) {
		$image = $attachment[0];
	} else {
		$image = $attachment;
	}

	// Sanitize data
	if ( ! empty( $image[0] ) ) {
		$image = $image[0];
	} else {
		$image = wp_get_attachment_url( $attachment );   
	}

	// Return escaped image
	return esc_url( $image );
}