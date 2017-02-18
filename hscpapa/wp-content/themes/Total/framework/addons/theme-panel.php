<?php
/**
 * Used for the main Add Ons dashboard menu and page
 *
 * @package    Total
 * @subpackage Framework/Addons
 * @author     Alexander Clarke
 * @copyright  Copyright (c) 2015, WPExplorer.com
 * @link       http://www.wpexplorer.com
 * @since      1.6.0
 * @version    2.1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Start Class
if ( ! class_exists( 'WPEX_Theme_Panel' ) ) {

	class WPEX_Theme_Panel {

		/**
		 * Start things up
		 */
		public function __construct() {

			// Array of theme "parts/addons" that can be enabled/disabled
			$this->theme_parts = array(
				'recommend_plugins' => array(
					'enabled' => true,
					'label'   => __( 'Recommend Plugins', 'wpex' ),
				),
				'post_series' => array(
					'enabled' => true,
					'label'   => __( 'Blog Post Series', 'wpex' ),
				),
				'portfolio' => array(
					'enabled' => true,
					'label'   => __( 'Portfolio', 'wpex' ),
				),
				'staff' => array(
					'enabled' => true,
					'label'   => __( 'Staff', 'wpex' ),
				),
				'testimonials' => array(
					'enabled' => true,
					'label'   => __( 'Testimonials', 'wpex' ),
				),
				'custom_css' => array(
					'enabled' => true,
					'label'   => __( 'Custom CSS', 'wpex' ),
				),
				'under_construction' => array(
					'enabled' => true,
					'label'   => __( 'Under Construction', 'wpex' ),
				),
				'favicons' => array(
					'enabled' => true,
					'label'   => __( 'Favicons', 'wpex' ),
				),
				'footer_builder' => array(
					'enabled' => true,
					'label'   => __( 'Footer Builder', 'wpex' ),
				),
				'custom_admin_login'  => array(
					'enabled' => true,
					'label'   => __( 'Login Page', 'wpex' ),
				),
				'custom_404' => array(
					'enabled' => true,
					'label'   => __( '404 Page', 'wpex' ),
				),
				'custom_wp_gallery' => array(
					'enabled' => true,
					'label'   => __( 'Custom WordPress Gallery', 'wpex' ),
				),
				'widget_areas' => array(
					'enabled' => true,
					'label'   => __( 'Widget Areas', 'wpex' ),
				),
				'term_thumbnails' => array(
					'enabled' => true,
					'label'   => __( 'Category Thumbnails', 'wpex' ),
				),
				'editor_formats' => array(
					'enabled' => true,
					'label'   => __( 'Editor Formats', 'wpex' ),
				),
				'remove_emoji_scripts' => array(
					'enabled' => true,
					'label'   => __( 'Remove Emoji Scripts', 'wpex' ),
				),
				'image_sizes' => array(
					'enabled' => true,
					'label'   => __( 'Image Sizes', 'wpex' ),
				),
				'skins' => array(
					'enabled' => true,
					'label'   => __( 'Skins', 'wpex' ),
				),
				'minify_js' => array(
					'enabled' => true,
					'label'   => __( 'Minify Javascript', 'wpex' ),
				),
				'remove_posttype_slugs' => array(
					'enabled'   => false,
					'label'     => __( 'Remove Custom Post Type Slugs (Experimental)', 'wpex' ),
					'desc'      => __( 'Toggle the slug on/off for your custom post types (portfolio, staff, testimonials). Custom Post Types in WordPress by default should have a slug to prevent conflicts, you can use this setting to disable them, but be careful.', 'wpex' ) .  __( 'Please make sure to re-save your WordPress permalinks settings whenever changing this option.', 'wpex' ),
					'custom_id' => true, 
				),
			);

			// Add menu page
			add_action( 'admin_menu', array( $this, 'add_menu_page' ) );

			// Add menu subpage
			add_action( 'admin_menu', array( $this, 'add_menu_subpage' ) );

			// Register settings
			add_action( 'admin_init', array( $this,'register_settings' ) );


		}

		/**
		 * Registers a new menu page
		 *
		 * @link    http://codex.wordpress.org/Function_Reference/add_menu_page
		 * @since   1.6.0
		 */
		function add_menu_page() {

		   $my_admin_page = add_menu_page(
				__( 'Theme Panel', 'wpex' ),
				'Theme Panel', // menu title - can't be translated because it' used for the $hook prefix
				'manage_options',
				WPEX_THEME_PANEL_SLUG,
				'',
				'dashicons-admin-generic',
				null
			);

			// Adds my_help_tab when my_admin_page loads
			if ( get_theme_mod( 'help_tabs_enable', true ) ) {
				add_action( 'load-'. $my_admin_page, array( $this, 'help_tab' ) );
			}

		}

		/**
		 * Adds help tab to this admin page
		 *
		 * @link  https://codex.wordpress.org/Class_Reference/WP_Screen/add_help_tab
		 * @since 2.0.0
		 */
		public function help_tab() {

			// Get current screen
			$screen = get_current_screen();

			// Define content
			$content  = '<p><h3>'. __( 'Useful Links', 'wpex' ) .'</h3><ul>';
				$content .= '<li><a href="http://wpexplorer-themes.com/total/changelog/" target="_blank">'. __( 'Changelog', 'wpex' ) .'</a></li>';
				$content .= '<li><a href="http://wpexplorer-themes.com/total/docs/" target="_blank">'. __( 'Documentation', 'wpex' ) .'</a></li>';
				$content .= '<li><a href="http://wpexplorer-themes.com/total/docs-category/sample-data/" target="_blank">'. __( 'Sample Data', 'wpex' ) .'</a></li>';
				$content .= '<li><a href="http://wpexplorer-themes.com/total/snippets/" target="_blank">'. __( 'Snippets', 'wpex' ) .'</a></li>';
				$content .= '<li><a href="http://themeforest.net/item/total-responsive-multipurpose-wordpress-theme/6339019/comments?ref=WPExplorer" target="_blank">'. __( 'Support', 'wpex' ) .'</a></li>';
			$content  .= '</ul></p>';

			// Add wpex_footer_builder help tab if current screen is My Admin Page
			$screen->add_help_tab( array(
				'id'      => 'wpex_theme_panel',
				'title'   => __( 'Useful Links', 'wpex' ),
				'content' => $content,
			) );

		}

		/**
		 * Registers a new submenu page
		 *
		 * @link    http://codex.wordpress.org/Function_Reference/add_submenu_page
		 * @since   1.6.0
		 */
		function add_menu_subpage(){
			add_submenu_page(
				'wpex-general',
				__( 'General', 'wpex' ),
				__( 'General', 'wpex' ),
				'manage_options',
				WPEX_THEME_PANEL_SLUG,
				array( $this, 'create_admin_page' )
			);
		}

		/**
		 * Register a setting and its sanitization callback.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/register_setting
		 */
		function register_settings() {
			register_setting( 'wpex_tweaks', 'wpex_tweaks', array( $this, 'admin_sanitize' ) ); 
		}

		/**
		 * Main Sanitization callback
		 */
		function admin_sanitize( $options ) {

			// Check options first
			if ( ! is_array( $options ) || empty( $options ) || ( false === $options ) ) {
				return array();
			}

			// Save checkboxes
			$checkboxes = array( 'post_series_enable', 'visual_composer_theme_mode', 'extend_visual_composer' );

			// Add theme parts
			foreach ( $this->theme_parts as $key => $val ) {
				if ( isset( $val['custom_id'] ) ) {
					$checkboxes[] = $key;
				} else {
					$checkboxes[] = $key .'_enable';
				}
			}

			// Remove thememods for checkboxes not in array
			foreach ( $checkboxes as $checkbox ) {
				if ( isset( $options[$checkbox] ) ) {
					set_theme_mod( $checkbox, 1 );
				} else {
					set_theme_mod( $checkbox, 0 );
				}
			}

			// Standard options
			foreach( $options as $key => $value ) {
				if ( in_array( $key, $checkboxes ) ) {
					continue; // checkboxes already done
				}
				if ( ! empty( $value ) ) {
					set_theme_mod( $key, $value );
				} else {
					remove_theme_mod( $key );
				}
			}

			// No need to save in options table
			$options = '';
			return $options;

		}

		/**
		 * Settings page output
		 */
		function create_admin_page() { ?>

			<div class="wrap">

				<h2><?php _e( 'Theme Panel', 'wpex' ); ?></h2>

				<form method="post" action="options.php">

					<?php settings_fields( 'wpex_tweaks' ); ?>

					<table class="form-table">

						<tr valign="top">
							<th scope="row"><?php _e( 'Theme Branding', 'wpex' ); ?></th>
							<td>
								<fieldset>
									<input type="text" name="wpex_tweaks[theme_branding]" value="<?php echo wpex_get_mod( 'theme_branding', 'Total' ); ?>" style="width:25em;">
								</fieldset>
							</td>
						</tr>

						<tr valign="top">
							<th scope="row"><?php _e( 'Purchase Code', 'wpex' ); ?></th>
							<td>
								<fieldset>
									<input type="text" name="wpex_tweaks[envato_license_key]" value="<?php echo wpex_get_mod( 'envato_license_key', '' ); ?>" style="width:25em;"><p class="description"><?php _e( 'Enter your Envato license key here if you wish to receive auto updates for your theme.', 'wpex' ); ?></p>
								</fieldset>
							</td>
						</tr>

						<tr valign="top">
							<th scope="row"><?php _e( 'Theme Features', 'wpex' ); ?></th>
							<td>
								<fieldset>
									<?php
									// Loop through theme pars and add checkboxes
									foreach ( $this->theme_parts as $key => $val ) {

										$enabled   = isset ( $val['enabled'] ) ? $val['enabled'] : true;
										$label     = isset ( $val['label'] ) ? $val['label'] : '';

										// Set id
										if ( isset( $val['custom_id'] ) ) {
											$key = $key;
										} else {
											$key = $key .'_enable';
										}

										// Get theme option
										$theme_mod = wpex_get_mod( $key, $enabled ); ?>

										<label><input type="checkbox" name="wpex_tweaks[<?php echo $key; ?>]" value="<?php echo $theme_mod; ?>" <?php checked( $theme_mod, true ); ?>> <?php echo $label; ?></label>
										<?php if ( isset( $val['desc'] ) ) { ?>
											<p class="description"><?php echo $val['desc']; ?></p>
										<?php } else { ?>
											<br />
										<?php } ?>
									<?php } ?>
								</fieldset>
							</td>
						</tr>

						<?php
						// Post Series Settings
						if ( wpex_get_mod( 'post_series_enable', true ) ) { ?>
							<tr valign="top">
								<th scope="row"><?php _e( 'Post Series Labels', 'wpex' ); ?></th>
								<td>
								<input type="text" name="wpex_tweaks[post_series_labels]" value="<?php echo wpex_get_mod( 'post_series_labels', __( 'Post Series', 'wpex' ) ); ?>" style="width:25em;">
								</td>
							</tr>
							<tr valign="top">
								<th scope="row"><?php _e( 'Post Series Slug', 'wpex' ); ?></th>
								<td>
								<input type="text" name="wpex_tweaks[post_series_slug]" value="<?php echo wpex_get_mod( 'post_series_slug', 'post-series' ); ?>" style="width:25em;">
								</td>
							</tr>
						<?php } ?>

						<?php
						// Visual Composer Settings
						if ( WPEX_VC_ACTIVE ) { ?>

							<tr valign="top">
								<th scope="row"><?php _e( 'Visual Composer', 'wpex' ); ?></th>
								<td>
									<fieldset>
										<label><input type="checkbox" name="wpex_tweaks[visual_composer_theme_mode]" <?php checked( wpex_get_mod( 'visual_composer_theme_mode', true ) ); ?>> <?php _e( ' Run Visual Composer In Theme Mode', 'wpex' ); ?></label><p class="description"><?php _e( 'Please keep this option enabled unless you have purchased a full copy of the Visual Composer plugin directly from the author.', 'wpex' ); ?></p>
										<br />
										<label><input type="checkbox" name="wpex_tweaks[extend_visual_composer]" <?php checked( wpex_get_mod( 'extend_visual_composer', true ) ); ?>> <?php _e( ' Extend The Visual Composer?', 'wpex' ); ?></label><p class="description"><?php _e( 'This theme includes many extensions (more modules) for the Visual Composer plugin. If you do not wish to use any disable them here.', 'wpex' ); ?></p>
									</fieldset>
								</td>
							</tr>

							<tr valign="top">
								<th scope="row"><?php _e( 'Analytics Tracking Code', 'wpex' ); ?></th>
								<td>
									<fieldset>
										<textarea type="text" name="wpex_tweaks[tracking]" rows="5" style="width:25em;"><?php echo wpex_get_mod( 'tracking', false ); ?></textarea><p class="description"><?php _e( 'Enter your entire tracking code (javascript).', 'wpex' ); ?></p>
									</fieldset>
								</td>
							</tr>

						<?php } ?>

					</table>

					<?php submit_button(); ?>

				</form>

			</div><!-- .wrap -->

		<?php
		}

	}

}
new WPEX_Theme_Panel();