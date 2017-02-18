<?php
/**
 * Adds favicons and mobile icon meta to the wp_head
 *
 * @package		Total
 * @subpackage	Framework/Addons
 * @author		Alexander Clarke
 * @copyright	Copyright (c) 2015, WPExplorer.com
 * @link		http://www.wpexplorer.com
 * @since		1.6.0
 * @version		2.1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Start Class
if ( ! class_exists( 'WPEX_Favicons' ) ) {
	class WPEX_Favicons {

		/**
		 * Start things up
		 */
		public function __construct() {
			add_action( 'admin_menu', array( $this, 'add_page' ) );
			add_action( 'admin_init', array( $this,'register_page_options' ) );
			add_action( 'admin_enqueue_scripts',array( $this,'scripts' ) );
			add_action( 'wp_head', array( $this, 'output_favicons' ) );
		}

		/**
		 * Add sub menu page
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_page
		 */
		public function add_page() {
			add_submenu_page(
				WPEX_THEME_PANEL_SLUG,
				__( 'Favicons', 'wpex' ),
				__( 'Favicons', 'wpex' ),
				'administrator',
				WPEX_THEME_PANEL_SLUG .'-favicons',
				array( $this, 'create_admin_page' )
			);
		}

		/**
		 * Load scripts
		 *
		 * @link http://codex.wordpress.org/Plugin_API/Action_Reference/admin_enqueue_scripts
		 */
		public function scripts( $hook ) {

			// Only load scripts when needed
			if( WPEX_ADMIN_PANEL_HOOK_PREFIX . '-favicons' != $hook ) {
				return;
			}

			// Media Uploader
			wp_enqueue_media();
			wp_enqueue_script(
				'wpex-media-uploader-field',
				WPEX_FRAMEWORK_DIR_URI .'addons/assets/admin-fields/media-uploader.js',
				array( 'media-upload' ),
				false,
				true
			);

			// CSS
			wp_enqueue_style(
				'wpex-admin',
				WPEX_FRAMEWORK_DIR_URI .'addons/assets/admin-fields/admin.css'
			);

		}

		/**
		 * Function that will register admin page options.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/register_setting
		 * @link http://codex.wordpress.org/Function_Reference/add_settings_section
		 * @link http://codex.wordpress.org/Function_Reference/add_settings_field
		 */
		public function register_page_options() {

			// Register Setting
			register_setting( 'wpex_favicons', 'wpex_favicons', array( $this, 'sanitize' ) );

			// Add main section to our options page
			add_settings_section( 'wpex_favicons_main', false, array( $this, 'section_main_callback' ), 'wpex-favicons' );

			// Favicon
			add_settings_field(
				'wpex_favicon',
				__( 'Favicon', 'wpex' ),
				array( $this, 'favicon_callback' ),
				'wpex-favicons',
				'wpex_favicons_main'
			);

			// iPhone
			add_settings_field(
				'wpex_iphone_icon',
				__( 'Apple iPhone Icon ', 'wpex' ),
				array( $this, 'iphone_icon_callback' ),
				'wpex-favicons',
				'wpex_favicons_main'
			);

			// Ipad
			add_settings_field(
				'wpex_ipad_icon',
				__( 'Apple iPad Icon ', 'wpex' ),
				array( $this, 'ipad_icon_callback' ),
				'wpex-favicons',
				'wpex_favicons_main'
			);

			// iPhone Retina
			add_settings_field(
				'wpex_iphone_icon_retina',
				__( 'Apple iPhone Retina Icon ', 'wpex' ),
				array( $this, 'iphone_icon_retina_callback' ),
				'wpex-favicons',
				'wpex_favicons_main'
			);

			// iPad Retina
			add_settings_field(
				'wpex_ipad_icon_retina',
				__( 'Apple iPad Retina Icon ', 'wpex' ),
				array( $this, 'ipad_icon_retina_callback' ),
				'wpex-favicons',
				'wpex_favicons_main'
			);

		}

		/**
		 * Sanitization callback
		 */
		public function sanitize( $options ) {

			// Set all options to theme_mods
			if ( is_array( $options ) && ! empty( $options ) ) {
				foreach ( $options as $key => $value ) {
					set_theme_mod( $key, $value );
				}
			}

			// Set options to nothing since we are storing in the theme mods
			$options = '';
			return $options;
		}

		/**
		 * Main Settings section callback
		 */
		public function section_main_callback( $options ) {
			// Leave blank
		}

		/* Returns correct value for preview
		 */
		public function sanitize_val( $val, $instance = 'mod' ) {
			
			if ( 'image' == $instance && is_numeric( $val ) ) {
				$val = wp_get_attachment_image_src( $val, 'full' );
				$val = $val[0];
			} elseif( is_numeric( $val ) ) {
				$val = absint( $val );
			} else {
				$val = esc_url( $val );
			}

			return $val;

		}
	

		/**
		 * Fields callback functions
		 */

		// Favicon
		public function favicon_callback() {
			$val     = wpex_get_mod( 'favicon' );
			$val     = $this->sanitize_val( $val );
			$preview = $this->sanitize_val( $val, 'image' );
			$output	= '<input type="text" name="wpex_favicons[favicon]" value="'. $val .'" class="wpex-image-input">';
			$output .= ' <input class="wpex-media-upload-button button-secondary" name="login_page_design_bg_img_button" type="button" value="'. __( 'Upload', 'wpex' ) .'" />';
			$output .= '<p class="description">32x32</p>';
			$output .= '<div class="wpex-media-live-preview"><img src="'. $preview .'" /></div>';
			echo $output;
		}

		// iPhone
		public function iphone_icon_callback() {
			$val	 = wpex_get_mod( 'iphone_icon' );
			$val     = $this->sanitize_val( $val );
			$preview = $this->sanitize_val( $val, 'image' );
			$output	= '<input type="text" name="wpex_favicons[iphone_icon]" value="'. $val .'">';
			$output .= ' <input class="wpex-media-upload-button button-secondary" name="login_page_design_bg_img_button" type="button" value="'. __( 'Upload', 'wpex' ) .'" />';
			$output .= '<p class="description">57x57</p>';
			$output .= '<div class="wpex-media-live-preview"><img src="'. $preview .'" /></div>';
			echo $output;
		}

		// iPad
		public function ipad_icon_callback() {
			$val	 = wpex_get_mod( 'ipad_icon' );
			$val     = $this->sanitize_val( $val );
			$preview = $this->sanitize_val( $val, 'image' );
			$output	= '<input type="text" name="wpex_favicons[ipad_icon]" value="'. $val .'">';
			$output .= ' <input class="wpex-media-upload-button button-secondary" name="login_page_design_bg_img_button" type="button" value="'. __( 'Upload', 'wpex' ) .'" />';
			$output .= '<p class="description">76x76</p>';
			$output .= '<div class="wpex-media-live-preview"><img src="'. $preview .'" /></div>';
			echo $output;
		}

		// iPhone Retina
		public function iphone_icon_retina_callback() {
			$val	 = wpex_get_mod( 'iphone_icon_retina' );
			$val     = $this->sanitize_val( $val );
			$preview = $this->sanitize_val( $val, 'image' );
			$output	= '<input type="text" name="wpex_favicons[iphone_icon_retina]" value="'. $val .'">';
			$output .= ' <input class="wpex-media-upload-button button-secondary" name="login_page_design_bg_img_button" type="button" value="'. __( 'Upload', 'wpex' ) .'" />';
			$output .= '<p class="description">120x120</p>';
			$output .= '<div class="wpex-media-live-preview"><img src="'. $preview .'" /></div>';
			echo $output;
		}

		// iPad Retina
		public function ipad_icon_retina_callback() {
			$val	 = wpex_get_mod( 'ipad_icon_retina' );
			$val     = $this->sanitize_val( $val );
			$preview = $this->sanitize_val( $val, 'image' );
			$output	= '<input type="text" name="wpex_favicons[ipad_icon_retina]" value="'. $val .'">';
			$output .= ' <input class="wpex-media-upload-button button-secondary" name="login_page_design_bg_img_button" type="button" value="'. __( 'Upload', 'wpex' ) .'" />';
			$output .= '<p class="description">152x152</p>';
			$output .= '<div class="wpex-media-live-preview"><img src="'. $preview .'" /></div>';
			echo $output;
		}

		/**
		 * Settings page output
		 */
		public function create_admin_page() { ?>
			<div class="wrap">
				<h2 style="padding-right:0;">
					<?php _e( 'Favicons', 'wpex' ); ?>
				</h2>
				<form method="post" action="options.php">
					<?php settings_fields( 'wpex_favicons' ); ?>
					<?php do_settings_sections( 'wpex-favicons' ); ?>
					<?php submit_button(); ?>
				</form>
			</div><!-- .wrap -->
		<?php }

		/**
		 * Settings page output
		 */
		public function output_favicons() {

			$output = '';

			// Favicon - Standard
			if ( $icon = wpex_get_mod( 'favicon' ) ) {
				$output .= '<link rel="shortcut icon" href="'. esc_url( $this->sanitize_val( $icon, 'image' ) ) .'">';
			}

			// Apple iPhone Icon - 57px
			if ( $icon = wpex_get_mod( 'iphone_icon' ) ) {
				$output .= '<link rel="apple-touch-icon-precomposed" href="'. esc_url( $this->sanitize_val( $icon, 'image' ) ) .'">';
			}

			// Apple iPad Icon - 76px
			if ( $icon = wpex_get_mod( 'ipad_icon' ) ) {
				$output .= '<link rel="apple-touch-icon-precomposed" sizes="76x76" href="'. esc_url( $this->sanitize_val( $icon, 'image' ) ) .'">';
			}

			// Apple iPhone Retina Icon - 120px
			if ( $icon = wpex_get_mod( 'iphone_icon_retina' ) ) {
				$output .= '<link rel="apple-touch-icon-precomposed" sizes="120x120" href="'. esc_url( $this->sanitize_val( $icon, 'image' ) ) .'">';
			}

			// Apple iPad Retina Icon - 114px
			if ( $icon = wpex_get_mod( 'ipad_icon_retina' ) ) {
				$output .= '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="'. esc_url( $this->sanitize_val( $icon, 'image' ) ) .'">';
			}

			// Output favicons into the WP_Head
			echo $output;

		}
	}
}
new WPEX_Favicons();