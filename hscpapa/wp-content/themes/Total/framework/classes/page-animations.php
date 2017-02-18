<?php
/**
 * Page Animation Functions
 *
 * @package		Total
 * @subpackage	Framework
 * @author		Alexander Clarke
 * @copyright	Copyright (c) 2015, WPExplorer.com
 * @link		http://www.wpexplorer.com
 * @since		2.1.0
 * @version		1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Start Class
if ( ! class_exists( 'WPEX_Page_Animations' ) ) {

	class WPEX_Page_Animations {

		/**
		 * Main constructor
		 *
		 * @access public
		 * @since  2.1.0
		 */
		public function __construct() {

			// Animations disabled by default
			$this->enabled = false;

			// Get animations
			$this->animate_in  = wpex_get_mod( 'page_animation_in' );
			$this->animate_in  = apply_filters( 'wpex_page_animation_in', $this->animate_in );
			$this->animate_out = wpex_get_mod( 'page_animation_out' );
			$this->animate_out = apply_filters( 'wpex_page_animation_out', $this->animate_out );

			// Set enabled to true
			if ( $this->animate_in || $this->animate_out ) {
				$this->enabled = true;
			}

			// If page animations is enabled lets do things
			if ( $this->enabled ) {

				// Load scripts
				add_filter( 'wp_enqueue_scripts', array( $this, 'get_css' ) );

				// Open wrapper
				add_action( 'wpex_outer_wrap_before', array( $this, 'open_wrapper' ) );

				// Close wrapper
				add_action( 'wpex_outer_wrap_after', array( $this, 'close_wrapper' ) );
			   
				// Add to localize array
				add_action( 'wpex_localize_array', array( $this, 'localize' ) );

			}

		}

		/**
		 * Retrieves cached CSS or generates the responsive CSS
		 *
		 * @access public
		 * @link   http://codex.wordpress.org/Plugin_API/Action_Reference/after_setup_theme
		 * @since  2.1.0
		 */
		public function get_css() {
			wp_enqueue_style( 'animsition', WPEX_CSS_DIR_URI .'animsition.css' );
		}

		/**
		 * Localize script
		 *
		 * @access public
		 * @since  2.1.0
		 */
		public function localize( $array ) {

			// Set animation to true
			$array['pageAnimation'] = true;

			// Animate In
			if ( $this->animate_in && array_key_exists( $this->animate_in, $this->in_transitions() ) ) {
				$array['pageAnimationIn'] = $this->animate_in;
			}

			// Animate out
			if ( $this->animate_out && array_key_exists( $this->animate_out, $this->out_transitions() ) ) {
				$array['pageAnimationOut'] = $this->animate_out;
			}

			// Animation Speeds
			$speed = wpex_get_mod( 'page_animation_speed' );
			$speed = $speed ? $speed : 400;
			$array['pageAnimationInDuration']  = $speed;
			$array['pageAnimationOutDuration'] = $speed;

			// Loading text
			$text = wpex_get_mod( 'page_animation_loading' );
			$text = $text ? $text : __( 'Loading...', 'wpex' );
			$array['pageAnimationLoadingText'] = $text;

	
			// Output opening div
			return $array;

		}

		/**
		 * Open wrapper
		 *
		 * @access public
		 * @since  2.1.0
		 *
		 */
		public function open_wrapper() {
			echo '<div class="wpex-page-animation-wrap animsition clr">';
		}

		/**
		 * Close Wrapper
		 *
		 * @access public
		 * @since  2.1.0
		 *
		 */
		public function close_wrapper() {
			echo '</div><!-- .animsition -->';
		}

		/**
		 * In Transitions
		 *
		 * @access public
		 * @return array
		 *
		 * @since  2.1.0
		 *
		 */
		public static function in_transitions() {
			return array(
				''              => __( 'None', 'wpex' ),
				'fade-in'       => __( 'Fade In', 'wpex' ),
				'fade-in-up'    => __( 'Fade In Up', 'wpex' ),
				'fade-in-down'  => __( 'Fade In Down', 'wpex' ),
				'fade-in-left'  => __( 'Fade In Left', 'wpex' ),
				'fade-in-right' => __( 'Fade In Right', 'wpex' ),
				'rotate-in'     => __( 'Rotate In', 'wpex' ),
				'flip-in-x'     => __( 'Flip In X', 'wpex' ),
				'flip-in-y'     => __( 'Flip In Y', 'wpex' ),
				'zoom-in'       => __( 'Zoom In', 'wpex' ),
			);
		}

		/**
		 * Out Transitions
		 *
		 * @access public
		 * @return array
		 *
		 * @since  2.1.0
		 */
		public static function out_transitions() {
			return array(
				''               => __( 'None', 'wpex' ),
				'fade-out'       => __( 'Fade Out', 'wpex' ),
				'fade-out-up'    => __( 'Fade Out Up', 'wpex' ),
				'fade-out-down'  => __( 'Fade Out Down', 'wpex' ),
				'fade-out-left'  => __( 'Fade Out Left', 'wpex' ),
				'fade-out-right' => __( 'Fade Out Right', 'wpex' ),
				'rotate-out'     => __( 'Rotate Out', 'wpex' ),
				'flip-out-x'     => __( 'Flip Out X', 'wpex' ),
				'flip-out-y'     => __( 'Flip Out Y', 'wpex' ),
				'zoom-out'       => __( 'Zoom Out', 'wpex' ),
			);
		}

	}

}

$wpex_page_transitions = new WPEX_Page_Animations();