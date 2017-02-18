<?php
/**
 * Total functions and definitions.
 * Text Domain: wpex
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * Total is a very powerful theme and virtually anything can be customized
 * via a child theme. If you need any help altering a function, just let us know!
 * Customizations aren't included for free but if it's a simple task I'll be sure to help :)
 *
 * @package   Total
 * @author    Alexander Clarke
 * @copyright Copyright (c) 2015, WPExplorer.com
 * @link      http://www.wpexplorer.com
 * @license   http://themeforest.net/licenses/terms/regular
 * @since     1.0.0
 * @version   2.1.3
 */

class WPEX_Theme_Setup {

	/**
	 * Main Theme Class Constructor
	 *
	 * Loads all necessary classes, functions, hooks, configuration files and actions for the theme.
	 * Everything starts here.
	 *
	 * @since   1.6.0
	 * @access  public
	 *
	 * @global  object $wpex_theme Main theme object.
	 */
	public function __construct() {

		// Define globals
		global $wpex_theme, $wpex_theme_mods;

		// Setup new empty object for the $wpex_theme var
		$wpex_theme = new stdClass;

		// Gets all theme mods and stores them in an easily accessable var
		$wpex_theme_mods = get_theme_mods();

		// Populate the global object
		// Must be done after all core functions are registered and after the WP object is set up
		// Priority of 20 is important so we can use filters at default priority via other classes
		add_action( 'template_redirect', array( $this, 'global_object' ), 20 );

		// Defines hooks and runs actions on init
		add_action( 'init', array( $this, 'actions' ), 0 );

		// Define constants
		add_action( 'after_setup_theme', array( $this, 'constants' ), 1 );

		// Load all the theme addons
		add_action( 'after_setup_theme', array( $this, 'addons' ), 2 );

		// Load configuration classes (post types & 3rd party plugins)
		// Must load first so it can use hooks defined in the classes
		add_action( 'after_setup_theme', array( $this, 'configs' ), 3 );

		// Load all core theme function files
		add_action( 'after_setup_theme', array( $this, 'include_functions' ), 4 );

		// Load framework classes
		add_action( 'after_setup_theme', array( $this, 'classes' ), 5 );

		// Load custom widgets
		add_action( 'after_setup_theme', array( $this, 'custom_widgets' ), 5 );

		// Actions & filters
		add_action( 'after_setup_theme', array( $this, 'add_theme_support' ) );

		// Flush rewrites after theme switch to prevent 404 errors
		add_action( 'after_switch_theme', array( $this, 'flush_rewrite_rules' ) );

		// Load scripts in the WP admin
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );

		// Load theme CSS
		add_action( 'wp_enqueue_scripts', array( $this, 'theme_css' ) );

		// Load responsive CSS - must be added last
		add_action( 'wp_enqueue_scripts', array( $this, 'responsive_css' ), 99 );

		// Load theme js
		add_action( 'wp_enqueue_scripts', array( $this, 'theme_js' ) );

		// Add meta viewport tag to header
		add_action( 'wp_head', array( $this, 'meta_viewport' ), 1 );

		// Add an X-UA-Compatible header
		add_filter( 'wp_headers', array( $this, 'x_ua_compatible_headers' ) );

		// Loads CSS for ie8
		add_action( 'wp_head', array( $this, 'ie8_css' ) );

		// Loads html5 shiv script
		add_action( 'wp_head', array( $this, 'html5_shiv' ) );

		// Adds tracking code to the site head
		add_action( 'wp_head', array( $this, 'tracking' ) );

		// Outputs custom CSS to the head
		add_action( 'wp_head', array( $this, 'custom_css' ), 9999 );

		// register sidebar widget areas
		add_action( 'widgets_init', array( $this, 'register_sidebars' ) );

		// Add gallery metabox to portfolio
		add_filter( 'wpex_gallery_metabox_post_types', array( $this, 'add_gallery_metabox' ), 10 );

		// Define the directory URI for the gallery metabox calss
		add_filter( 'wpex_gallery_metabox_dir_uri', array( $this, 'gallery_metabox_dir_uri' ) );

		// Alter tagcloud widget to display all tags with 1em font size
		add_filter( 'widget_tag_cloud_args', array( $this, 'widget_tag_cloud_args' ) );

		// Alter WP categories widget to display count inside a span
		add_filter( 'wp_list_categories', array( $this, 'wp_list_categories_args' ) );

		// Exclude categories from the blog page
		add_filter( 'pre_get_posts', array( $this, 'pre_get_posts' ) );

		// Add new social profile fields to the user dashboard
		add_filter( 'user_contactmethods', array( $this, 'add_user_social_fields' ) );

		// Add a responsive wrapper to the WordPress oembed output
		add_filter( 'embed_oembed_html', array( $this, 'add_responsive_wrap_to_oembeds' ), 99, 4 );

		// Allow for the use of shortcodes in the WordPress excerpt
		add_filter( 'the_excerpt', 'shortcode_unautop' );
		add_filter( 'the_excerpt', 'do_shortcode' );

		// Make sure the wp_get_attachment_url() function returns correct page request (HTTP or HTTPS)
		add_filter( 'wp_get_attachment_url', array( $this, 'honor_ssl_for_attachments' ) );

		// Tweak the default password protection output form
		add_filter( 'the_password_form', array( $this, 'custom_password_protected_form' ) );

		// Exclude posts with custom links from the next and previous post links
		add_filter( 'get_previous_post_join', array( $this, 'prev_next_join' ) );
		add_filter( 'get_next_post_join', array( $this, 'prev_next_join' ) );
		add_filter( 'get_previous_post_where', array( $this, 'prev_next_where' ) );
		add_filter( 'get_next_post_where', array( $this, 'prev_next_where' ) );

		// Redirect posts with custom links
		add_filter( 'template_redirect', array( $this, 'redirect_custom_links' ) );

		// Remove wpex_term_data when a term is removed
		add_action( 'delete_term', array( $this, 'delete_term' ), 5 );

		// Remove emoji scripts
		if ( $this->wpex_get_mod( 'remove_emoji_scripts_enable', true ) ) {
			remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
			remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
			remove_action( 'wp_print_styles', 'print_emoji_styles' );
			remove_action( 'admin_print_styles', 'print_emoji_styles' );
		}

	} // End constructor

	/**
	 * Helper function for loading theme mods before core.php is loaded.
	 * Returns theme_mods within this class
	 *
	 * @since   2.0.2
	 * @access  public
	 */
	public function wpex_get_mod( $id, $default = '' ) {

		// Get global object
		global $wpex_theme_mods;

		// Return data from global object
		if ( ! empty( $wpex_theme_mods ) ) {

			// Return value
			if ( isset( $wpex_theme_mods[$id] ) ) {
				return $wpex_theme_mods[$id];
			}

			// Return default
			else {
				return $default;
			}

		}

		// Global object not found return using get_theme_mod
		else {
			return get_theme_mod( $id, $default );
		}

	}

	/**
	 * Defines the constants for use within the theme.
	 *
	 * @since   2.0.0
	 * @access  public
	 */
	public function constants() {

		// Theme version
		define( 'WPEX_THEME_VERSION', '2.1.3' );

		// Visual Composer supported version
		define( 'WPEX_VC_SUPPORTED_VERSION', '4.5.2' );

		// Define branding constant based on theme options
		define( 'WPEX_THEME_BRANDING', $this->wpex_get_mod( 'theme_branding', 'Total' ) );

		// Theme Panel slug
		define( 'WPEX_THEME_PANEL_SLUG', 'wpex-panel' );
		define( 'WPEX_ADMIN_PANEL_HOOK_PREFIX', 'theme-panel_page_'. WPEX_THEME_PANEL_SLUG );

		// Paths to the parent theme directory
		define( 'WPEX_THEME_DIR', get_template_directory() );
		define( 'WPEX_THEME_URI', get_template_directory_uri() );

		// Javascript and CSS Paths
		define( 'WPEX_JS_DIR_URI', WPEX_THEME_URI .'/js/' );
		define( 'WPEX_CSS_DIR_URI', WPEX_THEME_URI .'/css/' );

		// Skins Paths
		define( 'WPEX_SKIN_DIR', WPEX_THEME_DIR .'/skins/' );
		define( 'WPEX_SKIN_DIR_URI', WPEX_THEME_URI .'/skins/' );

		// Framework Paths
		define( 'WPEX_FRAMEWORK_DIR', WPEX_THEME_DIR .'/framework/' );
		define( 'WPEX_FRAMEWORK_DIR_URI', WPEX_THEME_URI .'/framework/' );
		define( 'WPEX_ClASSES', WPEX_FRAMEWORK_DIR .'/classes/' );

		// Classes directory
		define( 'WPEX_ClASSES_DIR', WPEX_FRAMEWORK_DIR .'/classes/' );

		// Check if plugins are active
		define( 'WPEX_VC_ACTIVE', class_exists( 'Vc_Manager' ) );
		define( 'WPEX_BBPRESS_ACTIVE', class_exists( 'bbPress' ) );
		define( 'WPEX_WOOCOMMERCE_ACTIVE', class_exists( 'WooCommerce' ) );
		define( 'WPEX_REV_SLIDER_ACTIVE', class_exists( 'RevSlider' ) );
		define( 'WPEX_LAYERSLIDER_ACTIVE', function_exists( 'lsSliders' ) );
		define( 'WPEX_WPML_ACTIVE', class_exists( 'SitePress' ) );
		define( 'WPEX_TRIBE_EVENTS_CALENDAR_ACTIVE', class_exists( 'TribeEvents' ) );

		// Active post types
		define( 'WPEX_PORTFOLIO_IS_ACTIVE', $this->wpex_get_mod( 'portfolio_enable', true ) );
		define( 'WPEX_STAFF_IS_ACTIVE', $this->wpex_get_mod( 'staff_enable', true ) );
		define( 'WPEX_TESTIMONIALS_IS_ACTIVE', $this->wpex_get_mod( 'testimonials_enable', true ) );

		// Visual Composer
		define( 'WPEX_VCEX_DIR', WPEX_FRAMEWORK_DIR .'visual-composer/extend/' );
		define( 'WPEX_VCEX_DIR_URI', WPEX_FRAMEWORK_DIR_URI .'visual-composer/extend/' );

	}

	/**
	 * Defines all theme hooks and runs all needed actions for theme hooks.
	 *
	 * @since   2.0.0
	 * @access  public
	 */
	public function actions() {

		// Front-end functions only
		if ( ! is_admin() ) {

			// Registers all hooks
			require_once( WPEX_FRAMEWORK_DIR .'hooks/hooks.php' );

			// Adds actions to run functions into theme hooks
			require_once( WPEX_FRAMEWORK_DIR .'hooks/actions.php' );

			// Partial functions, these are hooked into the theme actions
			require_once( WPEX_FRAMEWORK_DIR .'hooks/partials.php' );

		}

		// Update theme version
		update_option( 'total_version', WPEX_THEME_VERSION );

	}

	/**
	 * Theme addons.
	 *
	 * @since   2.0.0
	 * @access  public
	 */
	public function addons() {

		// Main Theme Panel
		if ( is_admin() ) {
			require_once( WPEX_FRAMEWORK_DIR .'addons/theme-panel.php' );
		}

		// Under Construction
		if ( $this->wpex_get_mod( 'under_construction_enable', true ) ) {
			require_once( WPEX_FRAMEWORK_DIR .'addons/under-construction.php' );
		}

		// Custom Favicons
		if ( $this->wpex_get_mod( 'favicons_enable', true ) ) {
			require_once( WPEX_FRAMEWORK_DIR .'addons/favicons.php' );
		}

		// Custom 404
		if ( $this->wpex_get_mod( 'custom_404_enable', true ) ) {
			require_once( WPEX_FRAMEWORK_DIR .'addons/custom-404.php' );
		}

		// Custom widget areas
		if ( $this->wpex_get_mod( 'widget_areas_enable', true ) ) {
			require_once( WPEX_FRAMEWORK_DIR .'addons/widget-areas.php' );
		}

		// Custom Login
		if ( $this->wpex_get_mod( 'custom_admin_login_enable', true ) ) {
			require_once( WPEX_FRAMEWORK_DIR .'addons/custom-login.php' );
		}

		// Footer builder
		if ( $this->wpex_get_mod( 'footer_builder_enable', true ) ) {
			require_once( WPEX_FRAMEWORK_DIR .'addons/footer-builder.php' );
		}

		// Custom WordPress gallery output
		if ( $this->wpex_get_mod( 'custom_wp_gallery_enable', true ) ) {
			require_once( WPEX_FRAMEWORK_DIR .'addons/custom-wp-gallery.php' );
		}

		// Custom CSS
		if ( $this->wpex_get_mod( 'custom_css_enable', true ) ) {
			require_once( WPEX_FRAMEWORK_DIR .'addons/custom-css.php' );
		}

		// Skins
		if ( $this->wpex_get_mod( 'skins_enable', true ) ) {
			require_once( WPEX_SKIN_DIR . 'skins.php' );
		}

		// Customizer
		require_once( WPEX_FRAMEWORK_DIR .'customizer/customizer.php' );

		// Import Export Functions
		if ( is_admin() ) {
			require_once( WPEX_FRAMEWORK_DIR .'addons/import-export.php' );
		}

	}

	/**
	 * Configs for post types and 3rd party plugins.
	 *
	 * @since   2.0.0
	 * @access  public
	 */
	public function configs() {

		// Post Series
		if ( $this->wpex_get_mod( 'post_series_enable', true ) ) {
			require_once( WPEX_FRAMEWORK_DIR .'post-series/post-series-config.php' );
		}

		// Portfolio config
		if ( WPEX_PORTFOLIO_IS_ACTIVE ) {
			require_once( WPEX_FRAMEWORK_DIR .'portfolio/portfolio-config.php' );
		}

		// Staff config
		if ( WPEX_STAFF_IS_ACTIVE ) {
			require_once( WPEX_FRAMEWORK_DIR .'staff/staff-config.php' );
		}

		// Testimonials config
		if ( WPEX_TESTIMONIALS_IS_ACTIVE ) {
			require_once( WPEX_FRAMEWORK_DIR .'testimonials/testimonials-config.php' );
		}

		// WooCommerce config
		if ( WPEX_WOOCOMMERCE_ACTIVE ) {

			// WooCommerce core tweaks
			require_once( WPEX_FRAMEWORK_DIR .'woocommerce/woocommerce-config.php' );

		}

		// Visual composer config
		if ( WPEX_VC_ACTIVE ) {
			require_once( WPEX_FRAMEWORK_DIR .'visual-composer/visual-composer-config.php' );
		}

		// Tribe events config
		if ( WPEX_TRIBE_EVENTS_CALENDAR_ACTIVE ) {
			require_once( WPEX_FRAMEWORK_DIR .'config/tribe-events.php' );
		}

		// Revolution slider config
		if ( WPEX_REV_SLIDER_ACTIVE ) {
			require_once( WPEX_FRAMEWORK_DIR .'config/revslider.php' );
		}

		// WPML Config
		if ( WPEX_WPML_ACTIVE ) {
			require_once( WPEX_FRAMEWORK_DIR .'config/wpml.php' );
		}

		// Polylang Config
		if ( class_exists( 'Polylang' ) ) {
			require_once( WPEX_FRAMEWORK_DIR .'config/polylang.php' );
		}

		// BBPress
		if ( WPEX_BBPRESS_ACTIVE ) {
			require_once( WPEX_FRAMEWORK_DIR .'config/bbpress.php' );
		}

	}

	/**
	 * Framework functions
	 *
	 * @since  2.0.0
	 * @access public
	 */
	public function include_functions() {

		// Display warnings for deprecated functions
		require_once( WPEX_FRAMEWORK_DIR .'deprecated.php' );

		// Core functions used throughout the theme
		require_once( WPEX_FRAMEWORK_DIR .'core.php' );

		// Conditional functions
		require_once( WPEX_FRAMEWORK_DIR .'conditionals.php' );

		// Useful arrays
		require_once( WPEX_FRAMEWORK_DIR .'arrays.php' );

		// Custom fonts and typography functions
		require_once( WPEX_FRAMEWORK_DIR .'fonts.php' );

		// Meta
		require_once( WPEX_FRAMEWORK_DIR .'category-meta.php');

		// Add some basic shortcodes
		require_once( WPEX_FRAMEWORK_DIR .'shortcodes/shortcodes.php' );

		// Image overlays
		require_once( WPEX_FRAMEWORK_DIR .'overlays.php' );

		/*** Front end only ***/
		if ( ! is_admin() ) {

			// Add classes to the body tag
			require_once( WPEX_FRAMEWORK_DIR .'body-classes.php' );

			// Toggle bar functions
			require_once( WPEX_FRAMEWORK_DIR .'togglebar.php' );

			// Topbar functions
			require_once( WPEX_FRAMEWORK_DIR .'topbar.php' );

			// Header functions
			require_once( WPEX_FRAMEWORK_DIR .'header-functions.php' );

			// Search functions
			require_once( WPEX_FRAMEWORK_DIR .'search-functions.php' );

			// Returns correct title name for any page/post
			require_once( WPEX_FRAMEWORK_DIR .'title.php' );

			// Page header / Title functions
			require_once( WPEX_FRAMEWORK_DIR .'page-header.php' );

			// Main header menu functions
			require_once( WPEX_FRAMEWORK_DIR .'menu-functions.php' );

			// Post layouts
			require_once( WPEX_FRAMEWORK_DIR .'post-layout.php' );

			// Custom excerpt functions and WordPress Excerpt tweaks
			require_once( WPEX_FRAMEWORK_DIR .'excerpts.php' );

			// Custom comments callback
			require_once( WPEX_FRAMEWORK_DIR .'comments-callback.php');

			// Post slider functions and output
			require_once( WPEX_FRAMEWORK_DIR .'post-slider.php' );

			// Social sharing output
			require_once( WPEX_FRAMEWORK_DIR .'social-share.php' );

			// Main blog functions
			require_once( WPEX_FRAMEWORK_DIR .'blog/blog-functions.php' );

			// Main footer functions
			require_once( WPEX_FRAMEWORK_DIR .'footer-functions.php' );

			// Pagination functions
			require_once( WPEX_FRAMEWORK_DIR .'pagination.php' );

		}

		/*** Backend only ***/

		else {

			// Dashboard thumbnails
			if ( $this->wpex_get_mod( 'blog_dash_thumbs', true ) ) {
				require_once( WPEX_FRAMEWORK_DIR .'thumbnails/dashboard-thumbnails.php' );
			}

			// TinyMCE editor tweaks and addons
			require_once( WPEX_FRAMEWORK_DIR .'tinymce.php' );

		}

	}

	/**
	 * Framework Classes.
	 *
	 * @since   2.0.0
	 * @access  public
	 */
	public function classes() {

		// Automatic updates
		if ( $this->wpex_get_mod( 'envato_license_key' ) ) {
			require_once(  WPEX_FRAMEWORK_DIR .'classes/wp-updates-theme.php');
		}

		// Migrate old redux options to new Customizer
		if ( ! get_option( 'wpex_customizer_migration_complete' ) ) {
			require_once( WPEX_FRAMEWORK_DIR .'classes/migrate.php' );
		}

		// Sanitize data
		require_once( WPEX_FRAMEWORK_DIR .'classes/sanitize-data.php');

		// Recommends plugins for use with the theme
		if ( $this->wpex_get_mod( 'recommend_plugins_enable', true ) ) {
			require_once( WPEX_FRAMEWORK_DIR .'classes/class-tgm-plugin-activation.php' );
			require_once( WPEX_FRAMEWORK_DIR .'config/tgm-plugin-activation.php' );
		}

		// Taxonomy thumbnails
		if ( $this->wpex_get_mod( 'term_thumbnails_enable', true ) ) {
			require_once( WPEX_FRAMEWORK_DIR .'classes/tax-thumbnails.php' );
		}

		// iLightbox
		require_once( WPEX_FRAMEWORK_DIR .'classes/ilightbox.php' );

		// Image resizer class
		require_once( WPEX_FRAMEWORK_DIR .'classes/image-resize.php' );

		// Adds a gallery metabox to posts
		require_once( WPEX_FRAMEWORK_DIR .'classes/gallery-metabox/gallery-metabox.php' );

		// Remove post type slugs if enabled
		if ( $this->wpex_get_mod( 'remove_posttype_slugs' ) ) {
			require_once( WPEX_ClASSES_DIR .'remove-post-type-slugs.php' );
		}

		// Add image Sizes
		if ( $this->wpex_get_mod( 'image_sizes_enable', true ) ) {
			require_once( WPEX_FRAMEWORK_DIR .'classes/image-sizes.php');
		}

		// Custom Header
		require_once( WPEX_FRAMEWORK_DIR .'classes/custom-header.php');

		// Page animations
		require_once( WPEX_FRAMEWORK_DIR .'classes/page-animations.php' );

		/*** Admin end only ***/
		if ( is_admin() ) {

			// Define page settings metabox
			require_once( WPEX_FRAMEWORK_DIR .'classes/post-metaboxes/post-metaboxes.php');

			// Editor Formats
			if ( $this->wpex_get_mod( 'editor_formats_enable', true ) ) {
				require_once( WPEX_FRAMEWORK_DIR .'classes/editor-formats.php' );
			}

			// Adds new media fields to the WP media library items
			require_once( WPEX_FRAMEWORK_DIR .'classes/attachment-fields.php' );

		}

		/*** Front end only ***/
		else {

			//Accent Colors
			require_once( WPEX_FRAMEWORK_DIR .'classes/accent-color.php' );

			// Custom site layouts
			require_once( WPEX_FRAMEWORK_DIR .'classes/site-layouts.php' );

			// Custom backgrounds
			require_once( WPEX_FRAMEWORK_DIR .'classes/site-backgrounds.php' );

			// Advanced styling output for customizer settings
			require_once( WPEX_FRAMEWORK_DIR .'classes/advanced-styling.php' );

			// Site breadcrumbs
			require_once( WPEX_FRAMEWORK_DIR .'classes/breadcrumbs.php' );

		}

	}

	/**
	 * Include all custom widget classes
	 *
	 * @since   2.0.0
	 * @access  public
	 */
	public function custom_widgets() {

		// Define array of custom widgets for the theme
		$widgets = array(
			'social-fontawesome',
			'social',
			'simple-menu',
			'modern-menu',
			'flickr',
			'video',
			'posts-thumbnails',
			'posts-grid',
			'posts-icons',
			'comments-avatar',
		);

		// Apply filters so you can remove custom widgets via a child theme if wanted
		$widgets = apply_filters( 'wpex_custom_widgets', $widgets );

		// Loop through widgets and load their files
		foreach ( $widgets as $widget ) {
			$widget_file = WPEX_FRAMEWORK_DIR .'classes/widgets/'. $widget .'.php';
			if ( file_exists( $widget_file ) ) {
				require_once( $widget_file );
			}
		}

	}

	/**
	 * Populate the $wpex_theme global object.
	 *
	 * This helps speed things up by calling specific functions only once rather then multiple times.
	 *
	 * @since   2.0.0
	 * @access  public
	 *
	 * @global  object $wpex_theme Main theme object.
	 */
	public function global_object() {

		// Get global object
		global $wpex_theme;

		// Array of all theme hooks
		$wpex_theme->hooks                      = wpex_theme_hooks();

		// Main
		$wpex_theme->skin                       = function_exists( 'wpex_active_skin' ) ? wpex_active_skin() : 'base';
		$wpex_theme->post_id                    = wpex_get_the_id();
		$wpex_theme->main_layout                = wpex_main_layout( $wpex_theme->post_id );
		$wpex_theme->responsive                 = $this->wpex_get_mod( 'responsive', true );
		$wpex_theme->post_layout                = wpex_post_layout( $wpex_theme->post_id );
		$wpex_theme->has_site_header            = wpex_has_header( $wpex_theme->post_id );
		$wpex_theme->has_overlay_header         = $wpex_theme->has_site_header ? wpex_has_header_overlay( $wpex_theme->post_id ) : false;
		$wpex_theme->header_overlay_style       = get_post_meta( $wpex_theme->post_id, 'wpex_overlay_header_style', true );
		$wpex_theme->header_style               = wpex_get_header_style( $wpex_theme->post_id );
		$wpex_theme->header_logo                = wpex_header_logo_img();
		$wpex_theme->page_header_style          = wpex_page_header_style( $wpex_theme->post_id );
		$wpex_theme->lightbox_skin              = wpex_ilightbox_skin();
		$wpex_theme->mobile_menu_style          = wpex_mobile_menu_style();
		$wpex_theme->header_search_style        = wpex_header_search_style();
		$wpex_theme->sidr_menu_source           = wpex_mobile_menu_source();
		$wpex_theme->post_slider_position       = wpex_post_slider_position( $wpex_theme->post_id );
		$wpex_theme->fixed_header_custom_logo   = wpex_fixed_header_logo( $wpex_theme->post_id );
		$wpex_theme->shrink_fixed_header        = $this->wpex_get_mod( 'shink_fixed_header' );
		$wpex_theme->has_composer               = wpex_has_composer( $wpex_theme->post_id );
		$wpex_theme->has_top_bar                = wpex_has_top_bar( $wpex_theme->post_id );
		$wpex_theme->toggle_bar_content_id      = wpex_toggle_bar_content_id();
		$wpex_theme->has_togglebar              = wpex_has_togglebar( $wpex_theme->post_id );
		$wpex_theme->has_page_header            = wpex_has_page_header( $wpex_theme->post_id );
		$wpex_theme->has_page_header_title      = wpex_has_page_header_title( $wpex_theme->post_id );
		$wpex_theme->has_page_header_subheading = wpex_has_page_header_subheading( $wpex_theme->post_id );
		$wpex_theme->has_post_slider            = wpex_has_post_slider( $wpex_theme->post_id );
		$wpex_theme->has_breadcrumbs            = wpex_has_breadcrumbs( $wpex_theme->post_id );
		$wpex_theme->has_fixed_header           = wpex_has_fixed_header();
		$wpex_theme->has_footer                 = wpex_has_footer( $wpex_theme->post_id );
		$wpex_theme->has_footer_widgets         = wpex_has_footer_widgets( $wpex_theme->post_id );
		$wpex_theme->has_footer_reveal          = wpex_has_footer_reveal( $wpex_theme->post_id );
		$wpex_theme->has_footer_callout         = wpex_has_footer_callout( $wpex_theme->post_id );
		$wpex_theme->has_social_share           = wpex_has_social_share( $wpex_theme->post_id );

		// Store term data
		if ( is_tax() ) {
			$wpex_theme->term_data = get_option( 'wpex_term_data' );
		}

		// No longer in use but keep to prevent errors if people used them in template parts
		$wpex_theme->is_mobile = false;

	}

	/**
	 * Adds basic theme support functions and registers the nav menus
	 *
	 * @since   1.6.0
	 * @access  public
	 *
	 * @var     integer $content_width WP global variable.
	 */
	public function add_theme_support() {

		// Get globals
		global $content_width;

		// Set content width based on theme's default design
		if ( ! isset( $content_width ) ) {
			$content_width = 980;
		}

		// Register navigation menus
		register_nav_menus (
			array(
				'topbar_menu'     => __( 'Top Bar', 'wpex' ),
				'main_menu'       => __( 'Main', 'wpex' ),
				'mobile_menu'     => __( 'Mobile Icons', 'wpex' ),
				'mobile_menu_alt' => __( 'Mobile Menu Alternative', 'wpex' ),
				'footer_menu'     => __( 'Footer', 'wpex' ),
			)
		);

		// Load text domain
		load_theme_textdomain( 'wpex', WPEX_THEME_DIR .'/languages' );

		// Enable some useful post formats for the blog
		add_theme_support( 'post-formats', array( 'video', 'gallery', 'audio', 'quote', 'link' ) );

		// Add automatic feed links in the header - for themecheck nagg
		add_theme_support( 'automatic-feed-links' );

		// Enable featured image support
		add_theme_support( 'post-thumbnails' );

		// And HTML5 support
		add_theme_support( 'html5' );

		// Enable excerpts for pages.
		add_post_type_support( 'page', 'excerpt' );

		// Add support for WooCommerce - Yay!
		add_theme_support( 'woocommerce' );

		// Add styles to the WP editor
		add_editor_style( 'css/editor-style.css' );

		// Title tag
		add_theme_support( 'title-tag' );

	}

	/**
	 * Functions called after theme switch
	 *
	 * @since   1.6.0
	 * @access  public
	 *
	 * @link    http://codex.wordpress.org/Plugin_API/Action_Reference/after_switch_theme
	 */
	public function flush_rewrite_rules() {
		flush_rewrite_rules();
	}

	/**
	 * Adds the meta tag to the site header
	 *
	 * @since   1.6.0
	 * @access  public
	 *
	 * @global  object $wpex_theme Main theme object.
	 */
	public function meta_viewport() {

		// Get global object
		global $wpex_theme;

		// Responsive viewport viewport
		if ( ! empty( $wpex_theme->responsive ) ) {
			$viewport = '<meta name="viewport" content="width=device-width, initial-scale=1">';
		}

		// Non responsive meta viewport
		else {
			$width    = intval( $this->wpex_get_mod( 'main_container_width', '980' ) );
			$width    = $width ? $width: '980';
			$viewport = '<meta name="viewport" content="width='. $width .'" />';
		}

		// Apply filters to the meta viewport for child theme tweaking
		echo apply_filters( 'wpex_meta_viewport', $viewport );

	}

	/**
	 * Load scripts in the WP admin
	 *
	 * @since   1.6.0
	 * @access  public
	 *
	 * @link    http://codex.wordpress.org/Plugin_API/Action_Reference/admin_enqueue_scripts
	 */
	public function admin_scripts() {
		wp_enqueue_style( 'wpex-font-awesome', WPEX_CSS_DIR_URI .'font-awesome.min.css' );
	}

	/**
	 * Returns all CSS needed for the front-end
	 *
	 * @since  1.6.0
	 * @access public
	 *
	 * @global object $wpex_theme Main theme object.
	 */
	public function theme_css() {

		// Front end only
		if ( is_admin() ) {
			return;
		}

		// Get global object
		global $wpex_theme;

		// Font Awesome
		wp_deregister_style( 'font-awesome' );
		wp_deregister_style( 'fontawesome' );
		wp_enqueue_style( 'wpex-font-awesome', WPEX_CSS_DIR_URI .'font-awesome.min.css', false, '4.3.0' );

		// Register hover-css
		wp_register_style( 'wpex-hover-animations', WPEX_CSS_DIR_URI .'hover-css.min.css', false, '2.0.1' );

		// Main Style.css File
		wp_enqueue_style( 'wpex-style', get_stylesheet_uri(), false, WPEX_THEME_VERSION );

		// Load RTL.css first
		if ( is_RTL() ) {
			wp_enqueue_style( 'wpex-rtl', WPEX_CSS_DIR_URI .'rtl.css', array( 'wpex-style' ), false );
		}

	}

	/**
	 * Loads responsive css very last after all styles.
	 *
	 * @since  1.6.0
	 * @access public
	 */
	public function responsive_css() {
		if ( wpex_is_responsive() ) {
			wp_enqueue_style( 'wpex-responsive', WPEX_CSS_DIR_URI .'responsive.css' );
		}
	}

	/**
	 * Returns all js needed for the front-end
	 *
	 * @since  1.6.0
	 * @access public
	 *
	 * @global object $wpex_theme Main theme object.
	 */
	public function theme_js() {

		// Front end only
		if ( is_admin() ) {
			return;
		}

		// Get global object
		global $wpex_theme;

		// Make sure the core jQuery script is loaded
		wp_enqueue_script( 'jquery' );

		// Retina.js
		if ( wpex_is_retina_enabled() ) {
			wp_enqueue_script( 'retina', WPEX_JS_DIR_URI .'retina.js', array( 'jquery' ), '0.0.2', true );
		}

		// Comment reply
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// Localize data
		$localize_array = array(
			'isRTL'                  => is_rtl(),
			'mainLayout'             => $wpex_theme->main_layout,
			'mobileMenuStyle'        => $wpex_theme->mobile_menu_style,
			'sidrSource'             => $wpex_theme->sidr_menu_source,
			'sidrDisplace'           => true,
			'sidrSide'               => $this->wpex_get_mod( 'mobile_menu_sidr_direction', 'left' ),
			'headerSeachStyle'       => $wpex_theme->header_search_style,
			'wooCartStyle'           => $this->wpex_get_mod( 'woo_menu_icon_style', 'drop-down' ),
			'superfishDelay'         => 600,
			'superfishSpeed'         => 'fast',
			'superfishSpeedOut'      => 'fast',
			'localScrollSpeed'       => 1000,
			'overlayHeaderStickyTop' => 0,
			'siteHeaderStyle'        => $wpex_theme->header_style,
			'hasFixedMobileHeader'   => $this->wpex_get_mod( 'fixed_header_mobile', false ),
			'hasFixedHeader'         => $wpex_theme->has_fixed_header,
			'fixedHeaderBreakPoint'  => 960,
			'hasTopBar'              => $wpex_theme->has_top_bar,
			'hasFooterReveal'        => $wpex_theme->has_footer_reveal,
			'hasHeaderOverlay'       => $wpex_theme->has_overlay_header,
			'fixedHeaderCustomLogo'  => $wpex_theme->fixed_header_custom_logo,
			'retinaLogo'             => $this->wpex_get_mod( 'retina_logo' ),
			'carouselSpeed'		     => 150,
			'iLightbox'              => $this->ilightbox_localize_array(),
		);

		$localize_array = apply_filters( 'wpex_localize_array', $localize_array );

		// Load minified global scripts
		if ( $this->wpex_get_mod( 'minify_js_enable', true ) ) {

			wp_enqueue_script( 'total-min', WPEX_JS_DIR_URI .'total-min.js', array( 'jquery' ), '2.0.1', true );
			wp_localize_script( 'total-min', 'wpexLocalize', $localize_array );

		}

		// Load all non-minified js
		else {

			// Superfish used for menu dropdowns
			wp_enqueue_script( 'wpex-superfish', WPEX_JS_DIR_URI .'lib/superfish.js', array( 'jquery' ), false, true );
			wp_enqueue_script( 'wpex-supersubs', WPEX_JS_DIR_URI .'lib/supersubs.js', array( 'jquery' ), false, true );
			wp_enqueue_script( 'wpex-hoverintent', WPEX_JS_DIR_URI .'lib/hoverintent.js', array( 'jquery' ), false, true );

			// Sticky header
			wp_enqueue_script( 'wpex-sticky', WPEX_JS_DIR_URI .'lib/sticky.js', array( 'jquery' ), false, true );
			wp_localize_script( 'wpex-sticky', 'wpexLocalize', array( 'retinaLogo' => $localize_array['retinaLogo'] ) );

			// Page animations
			wp_enqueue_script( 'wpex-animsition', WPEX_JS_DIR_URI .'lib/animsition.js', array( 'jquery' ), false, true );

			// Tooltips
			wp_enqueue_script( 'wpex-tipsy', WPEX_JS_DIR_URI .'lib/tipsy.js', array( 'jquery' ), false, true );

			// Checks if images are loaded within an element
			wp_enqueue_script( 'wpex-images-loaded', WPEX_JS_DIR_URI .'lib/images-loaded.js', array( 'jquery' ), false, true );

			// Main masonry script
			wp_enqueue_script( 'wpex-isotope', WPEX_JS_DIR_URI .'lib/isotope.js', array( 'jquery' ), false, true );

			// Leaner modal used for search/woo modals
			wp_enqueue_script( 'wpex-leanner-modal', WPEX_JS_DIR_URI .'lib/leanner-modal.js', array( 'jquery' ), false, true );

			// Slider Pro
			wp_enqueue_script( 'wpex-sliderpro', WPEX_JS_DIR_URI .'lib/jquery.sliderPro.js', array( 'jquery' ), false, true );
			wp_enqueue_script( 'wpex-sliderpro-customthumbnails', WPEX_JS_DIR_URI .'lib/jquery.sliderProCustomThumbnails.js', array( 'jquery' ), false, true );

			// Touch Swipe - do we need it?
			wp_enqueue_script( 'wpex-touch-swipe', WPEX_JS_DIR_URI .'lib/touch-swipe.js', array( 'jquery' ), false, true );

			// Carousels
			wp_enqueue_script( 'wpex-owl-carousel', WPEX_JS_DIR_URI .'lib/owl.carousel.js', array( 'jquery' ), false, true );

			// Used for milestones
			wp_enqueue_script( 'wpex-count-to', WPEX_JS_DIR_URI .'lib/count-to.js', array( 'jquery' ), false, true );
			wp_enqueue_script( 'wpex-appear', WPEX_JS_DIR_URI .'lib/appear.js', array( 'jquery' ), false, true );

			// Mobile menu
			wp_enqueue_script( 'wpex-sidr', WPEX_JS_DIR_URI .'lib/sidr.js', array( 'jquery' ), false, true );

			// Custom Selects
			wp_enqueue_script( 'wpex-custom-select', WPEX_JS_DIR_URI .'lib/jquery.customSelect.js', array( 'jquery' ), false, true );

			// Equal Heights
			wp_enqueue_script( 'wpex-match-height', WPEX_JS_DIR_URI .'lib/jquery.matchHeight.js', array( 'jquery' ), false, true );

			// Not sure if needed, lets check on that and removed if not!
			wp_enqueue_script( 'wpex-mousewheel', WPEX_JS_DIR_URI .'lib/jquery.mousewheel.js', array( 'jquery' ), false, true );

			// Parallax bgs
			wp_enqueue_script( 'wpex-scrolly', WPEX_JS_DIR_URI .'lib/scrolly.js', array( 'jquery' ), false, true );

			// iLightbox
			wp_enqueue_script( 'wpex-ilightbox', WPEX_JS_DIR_URI .'lib/ilightbox.js', array( 'jquery' ), false, true );

			// WooCommerce quanity buttons
			if ( WPEX_WOOCOMMERCE_ACTIVE ) {
				wp_enqueue_script( 'wc-quantity-increment', WPEX_JS_DIR_URI .'lib/wc-quantity-increment.js', array( 'jquery' ), false, true );
			}

			// Core global functions
			wp_enqueue_script( 'wpex-functions', WPEX_JS_DIR_URI .'functions.js', array( 'jquery' ), false, true );

			// Localize script
			wp_localize_script( 'wpex-functions', 'wpexLocalize', $localize_array );

		}

	}

	/**
	 * iLightbox array for wpex_localize
	 *
	 * @access  public
	 * @since   1.6.0
	 *
	 * @return  sring
	 */
	public function ilightbox_localize_array() {

		$wpex_theme = wpex_global_obj();

		$array = array(
			'skin'     => $wpex_theme->lightbox_skin,
			'controls' => array(
				'arrows'     => $this->wpex_get_mod( 'lightbox_arrows', true ),
				'thumbnail'  => $this->wpex_get_mod( 'lightbox_thumbnails', true ),
				'fullscreen' => $this->wpex_get_mod( 'lightbox_fullscreen', true ),
				'mousewheel' => $this->wpex_get_mod( 'lightbox_mousewheel', false ),
			),
			'effects'  => array(
				'loadedFadeSpeed' => 50,
				'fadeSpeed'       => 500,
			),
			'show'     => array(
				'title' => $this->wpex_get_mod( 'lightbox_titles', true ),
				'speed' => 200,
			),
			'hide'     => array(
				'speed' => 200,
			),
			'overlay' => array(
				'blur'    => true,
				'opacity' => 0.9,
			),
			'social' => array(
				'start'   => true,
				'show'    => 'mouseenter',
				'hide'    => 'mouseleave',
				'buttons' => false,
			),
			/*'social' => array(
				'buttons' => array(
					'facebook' => array(
						'text' => 'Facebook'
					),
					'twitter' => array(
						'text' => 'Twitter'
					),
					'googleplus' => array(
						'text' => 'Google Plus'
					),
					'pinterest' => array(
						'text'   => 'Pinterest',
						'source' => 'https://www.pinterest.com/pin/create/button/?url={URL}',
					),
				),
			),*/
		);
		return $array;
	}

	/**
	 * Add headers for IE to override IE's Compatibility View Settings
	 *
	 * @access public
	 * @since  2.1.0
	 *
	 */
	public function x_ua_compatible_headers( $headers ) {
		$headers['X-UA-Compatible'] = 'IE=edge,chrome=1';
		return $headers;
	}

	/**
	 * Adds CSS for ie8
	 * Applies the wpex_ie_8_url filter so you can alter your IE8 stylesheet URL
	 *
	 * @access  public
	 * @since   1.6.0
	 *
	 * @return  sring
	 */
	public function ie8_css() {
		$ie_8_url = WPEX_CSS_DIR_URI .'ie8.css';
		$ie_8_url = apply_filters( 'wpex_ie_8_url', $ie_8_url );
		echo '<!--[if IE 8]><link rel="stylesheet" type="text/css" href="'. $ie_8_url .'" media="screen"><![endif]-->';
	}

	/**
	 * Load HTML5 dependencies for IE8
	 *
	 * @since   1.6.0
	 * @access  public
	 *
	 * @link    https://github.com/aFarkas/html5shiv
	 */
	public function html5_shiv() {
		echo '<!--[if lt IE 9]>
			<script src="'. WPEX_JS_DIR_URI .'html5.js"></script>
		<![endif]-->';
	}

	/**
	 * Outputs tracking code in the header when not logged in
	 *
	 * @since   1.6.0
	 * @access  public
	 */
	public function tracking() {
		if ( ! is_user_logged_in() && $tracking = $this->wpex_get_mod( 'tracking' ) ) {
			echo $tracking;
		}
	}

	/**
	 * Registers the theme sidebars (widget areas)
	 *
	 * @since   1.6.0
	 * @access  public
	 *
	 * @link    http://codex.wordpress.org/Function_Reference/register_sidebar
	 */
	public function register_sidebars() {

		// Heading element type
		$sidebar_headings = $this->wpex_get_mod( 'sidebar_headings', 'div' );
		$sidebar_headings = $sidebar_headings ? $sidebar_headings : 'div';
		$footer_headings  = $this->wpex_get_mod( 'footer_headings', 'div' );
		$footer_headings  = $footer_headings ? $footer_headings : 'div';

		// Main Sidebar
		register_sidebar( array (
			'name'          => __( 'Main Sidebar', 'wpex' ),
			'id'            => 'sidebar',
			'description'   => __( 'Widgets in this area are used in the default sidebar. This sidebar will be used for your standard blog posts.', 'wpex' ),
			'before_widget' => '<div class="sidebar-box %2$s clr">',
			'after_widget'  => '</div>',
			'before_title'  => '<'. $sidebar_headings .' class="widget-title">',
			'after_title'   => '</'. $sidebar_headings .'>',
		) );

		// Pages Sidebar
		if ( $this->wpex_get_mod( 'pages_custom_sidebar', true ) ) {
			register_sidebar( array (
				'name'          => __( 'Pages Sidebar', 'wpex' ),
				'id'            => 'pages_sidebar',
				'before_widget' => '<div class="sidebar-box %2$s clr">',
				'after_widget'  => '</div>',
				'before_title'  => '<'. $sidebar_headings .' class="widget-title">',
				'after_title'   => '</'. $sidebar_headings .'>',
			) );
		}

		// Search Results Sidebar
		if ( $this->wpex_get_mod( 'search_custom_sidebar', true ) ) {
			register_sidebar( array (
				'name'          => __( 'Search Results Sidebar', 'wpex' ),
				'id'            => 'search_sidebar',
				'before_widget' => '<div class="sidebar-box %2$s clr">',
				'after_widget'  => '</div>',
				'before_title'  => '<'. $sidebar_headings .' class="widget-title">',
				'after_title'   => '</'. $sidebar_headings .'>',
			) );
		}

		// Testimonials Sidebar
		if ( post_type_exists( 'testimonials' ) && $this->wpex_get_mod( 'testimonials_custom_sidebar', true ) ) {
			$obj            = get_post_type_object( 'testimonials' );
			$post_type_name = $obj->labels->name;
			register_sidebar( array (
				'name'          => $post_type_name .' '. __( 'Sidebar', 'wpex' ),
				'id'            => 'testimonials_sidebar',
				'before_widget' => '<div class="sidebar-box %2$s clr">',
				'after_widget'  => '</div>',
				'before_title'  => '<'. $sidebar_headings .' class="widget-title">',
				'after_title'   => '</'. $sidebar_headings .'>',
			) );
		}

		// Footer Sidebars
		if ( $this->wpex_get_mod( 'footer_widgets', true ) ) {

			// Footer widget columns
			$footer_columns = $this->wpex_get_mod( 'footer_widgets_columns', '4' );

			// Footer 1
			register_sidebar( array (
				'name'          => __( 'Footer Column 1', 'wpex' ),
				'id'            => 'footer_one',
				'before_widget' => '<div class="footer-widget %2$s clr">',
				'after_widget'  => '</div>',
				'before_title'  => '<'. $footer_headings .' class="widget-title">',
				'after_title'   => '</'. $footer_headings .'>',
			) );

			// Footer 2
			if ( $footer_columns > '1' ) {
				register_sidebar( array (
					'name'          => __( 'Footer Column 2', 'wpex' ),
					'id'            => 'footer_two',
					'before_widget' => '<div class="footer-widget %2$s clr">',
					'after_widget'  => '</div>',
					'before_title'  => '<'. $footer_headings .' class="widget-title">',
					'after_title'   => '</'. $footer_headings .'>'
				) );
			}

			// Footer 3
			if ( $footer_columns > '2' ) {
				register_sidebar( array (
					'name'          => __( 'Footer Column 3', 'wpex' ),
					'id'            => 'footer_three',
					'before_widget' => '<div class="footer-widget %2$s clr">',
					'after_widget'  => '</div>',
					'before_title'  => '<'. $footer_headings .' class="widget-title">',
					'after_title'   => '</'. $footer_headings .'>',
				) );
			}

			// Footer 4
			if ( $footer_columns > '3' ) {
				register_sidebar( array (
					'name'          => __( 'Footer Column 4', 'wpex' ),
					'id'            => 'footer_four',
					'before_widget' => '<div class="footer-widget %2$s clr">',
					'after_widget'  => '</div>',
					'before_title'  => '<'. $footer_headings .' class="widget-title">',
					'after_title'   => '</'. $footer_headings .'>',
				) );
			}

			// Footer 5
			if ( $footer_columns > '4' ) {
				register_sidebar( array (
					'name'          => __( 'Footer Column 5', 'wpex' ),
					'id'            => 'footer_five',
					'before_widget' => '<div class="footer-widget %2$s clr">',
					'after_widget'  => '</div>',
					'before_title'  => '<'. $footer_headings .' class="widget-title">',
					'after_title'   => '</'. $footer_headings .'>',
				) );
			}

		}

	}

	/**
	 * Add the gallery metabox to more post types
	 *
	 * @since   2.0.0
	 * @access  public
	 */
	public function add_gallery_metabox( $types ) {
		$types[] = 'page';
		return $types;
	}

	/**
	 * Defines the directory URI for the gallery metabox class.
	 *
	 * @since   1.6.3
	 * @access  public
	 *
	 * @var     string $url The directory url for the gallery metabox assets.
	 */
	public function gallery_metabox_dir_uri( $url ) {
		$url = WPEX_FRAMEWORK_DIR_URI .'classes/gallery-metabox/';
		return $url;
	}

	/**
	 * All theme functions hook into the wpex_head_css filter for this function.
	 * This way all dynamic CSS is minified and outputted in one location in the site header.
	 *
	 * @since   1.6.0
	 * @access  public
	 *
	 * @var     string $output Returns the CSS output for the wp_head.
	 */
	public function custom_css( $output = NULL ) {

		// Add filter for adding custom css via other functions
		$output = apply_filters( 'wpex_head_css', $output );

		// Minify and output CSS in the wp_head
		if ( ! empty( $output ) ) {
			$output = wpex_minify_css( $output );
			$output = "<!-- TOTAL CSS -->\n<style type=\"text/css\">\n" . $output . "\n</style>";
			echo $output;
		}

	}

	/**
	 * Alters the default WordPress tag cloud widget arguments.
	 * Makes sure all font sizes for the cloud widget are set to 1em.
	 *
	 * @since   1.6.0
	 * @access  public
	 *
	 * @link    https://developer.wordpress.org/reference/hooks/widget_tag_cloud_args/
	 */
	public function widget_tag_cloud_args( $args ) {
		$args['largest']  = '0.923em';
		$args['smallest'] = '0.923em';
		$args['unit']     = 'em';
		return $args;
	}

	/**
	 * Alter wp list categories arguments.
	 * Adds a span around the counter for easier styling.
	 *
	 * @since   1.6.0
	 * @access  public
	 *
	 * @link    https://developer.wordpress.org/reference/functions/wp_list_categories/
	 */
	public function wp_list_categories_args( $links ) {
		$links  = str_replace( '</a> (', '</a> <span class="cat-count-span">(', $links );
		$links  = str_replace( ')', ')</span>', $links );
		return $links;
	}

	/**
	 * This function runs before the main query.
	 *
	 * @since  1.6.0
	 * @access public
	 *
	 * @link   http://codex.wordpress.org/Plugin_API/Action_Reference/pre_get_posts
	 */
	public function pre_get_posts( $query ) {

		// Lets not break stuff
		if ( is_admin() || ! $query->is_main_query() ) {
			return;
		}

		// Search pagination
		if ( is_search() ) {
			$query->set( 'posts_per_page', $this->wpex_get_mod( 'search_posts_per_page', '10' ) );
			return;
		}

		// Exclude categories from the main blog
		if ( ( is_home() || is_page_template( 'templates/blog.php' ) ) && function_exists( 'wpex_blog_exclude_categories' ) ) {
			wpex_blog_exclude_categories( false );
			return;
		}

		// Category pagination
		$terms = get_terms( 'category' );
		if ( ! empty( $terms ) ) {
			foreach ( $terms as $term ) {
				if ( is_category( $term->slug ) ) {
					$term_id    = $term->term_id;
					$term_data  = get_option( "category_$term_id" );
					if ( $term_data ) {
						if ( ! empty( $term_data['wpex_term_posts_per_page'] ) ) {
							$query->set( 'posts_per_page', $term_data['wpex_term_posts_per_page'] );
							return;
						}
					}
				}
			}
		}

	}

	/**
	 * Add new user fields / user meta
	 *
	 * @since  1.6.0
	 * @access public
	 *
	 * @link   http://codex.wordpress.org/Plugin_API/Filter_Reference/user_contactmethods
	 */
	public function add_user_social_fields( $contactmethods ) {

		// Add Twitter
		if ( ! isset( $contactmethods['wpex_twitter'] ) ) {
			$contactmethods['wpex_twitter'] = WPEX_THEME_BRANDING .' - Twitter';
		}
		// Add Facebook
		if ( ! isset( $contactmethods['wpex_facebook'] ) ) {
			$contactmethods['wpex_facebook'] = WPEX_THEME_BRANDING .' - Facebook';
		}
		// Add GoglePlus
		if ( ! isset( $contactmethods['wpex_googleplus'] ) ) {
			$contactmethods['wpex_googleplus'] = WPEX_THEME_BRANDING .' - Google+';
		}
		// Add LinkedIn
		if ( ! isset( $contactmethods['wpex_linkedin'] ) ) {
			$contactmethods['wpex_linkedin'] = WPEX_THEME_BRANDING .' - LinkedIn';
		}
		// Add Pinterest
		if ( ! isset( $contactmethods['wpex_pinterest'] ) ) {
			$contactmethods['wpex_pinterest'] = WPEX_THEME_BRANDING .' - Pinterest';
		}
		// Add Pinterest
		if ( ! isset( $contactmethods['wpex_instagram'] ) ) {
			$contactmethods['wpex_instagram'] = WPEX_THEME_BRANDING .' - Instagram';
		}

		// Return contact methods
		return $contactmethods;

	}

	/**
	 * Alters the default oembed output.
	 * Adds special classes for responsive oembeds via CSS.
	 *
	 * @since  1.6.0
	 * @access public
	 *
	 * @link   https://developer.wordpress.org/reference/hooks/embed_oembed_html/
	 */
	public function add_responsive_wrap_to_oembeds( $html, $url, $attr, $post_id ) {
		$html = '<div class="responsive-video-wrap entry-video">' . $html . '</div>';
		return $html;
	}

	/**
	 * The wp_get_attachment_url() function doesn't distinguish whether a page request arrives via HTTP or HTTPS.
	 * Using wp_get_attachment_url filter, we can fix this to avoid the dreaded mixed content browser warning
	 *
	 * @since  1.6.0
	 * @access public
	 *
	 * @link   http://codex.wordpress.org/Plugin_API/Filter_Reference/wp_get_attachment_url
	 */
	public function honor_ssl_for_attachments( $url ) {
		$http     = site_url( FALSE, 'http' );
		$https    = site_url( FALSE, 'https' );
		$isSecure = false;
		if ( ! empty( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443 ) {
			$isSecure = true;
		}
		if ( $isSecure ) {
			return str_replace( $http, $https, $url );
		} else {
			return $url;
		}
	}

	/**
	 * Alters the default WordPress password protected form so it's easier to style
	 *
	 * @since  2.0.0
	 * @access public
	 *
	 * @link   http://codex.wordpress.org/Using_Password_Protection
	 */
	public function custom_password_protected_form() {
		ob_start();
		include( locate_template( 'partials/password-protection-form.php' ) );
		return ob_get_clean();
	}


	/**
	 * Modify JOIN in the next/prev function
	 *
	 * @since  2.0.0
	 * @access public
	 *
	 * @link   https://core.trac.wordpress.org/browser/tags/4.1.1/src/wp-includes/link-template.php
	 */
	public function prev_next_join( $join ) {
		global $wpdb;
		$join .= " LEFT JOIN $wpdb->postmeta AS m ON ( p.ID = m.post_id AND m.meta_key = 'wpex_post_link' )";
		return $join;
	}

	/**
	 * Modify WHERE in the next/prev function
	 *
	 * @since  2.0.0
	 * @access public
	 *
	 * @link   https://core.trac.wordpress.org/browser/tags/4.1.1/src/wp-includes/link-template.php
	 */
	public function prev_next_where( $where ) {
		global $wpdb;
		$where .= " AND ( (m.meta_key = 'wpex_post_link' AND CAST(m.meta_value AS CHAR) = '') OR m.meta_id IS NULL ) ";
		return $where;
	}

	/**
	 * Redirect posts using custom links
	 *
	 * @since  2.0.0
	 * @access public
	 *
	 * @link   http://codex.wordpress.org/Using_Password_Protection
	 */
	public function redirect_custom_links() {
		if ( is_singular() && $custom_link = wpex_get_custom_permalink() ) {
			wp_redirect( $custom_link, 301 );
		}
	}

	/**
	 * When a term is deleted, delete its data.
	 *
	 * @access public
	 * @since  2.1.0
	 */
	public function delete_term( $term_id ) {

		// If term id is defined
		if ( $term_id = absint( $term_id ) ) {

			// Get terms data
			$term_data = get_option( 'wpex_term_data' );

			// Remove key with term data
			if ( $term_data && isset( $term_data[$term_id] ) ) {
				unset( $term_data[$term_id] );
				update_option( 'wpex_term_data', $term_data );
			}

		}

	}

}
new WPEX_Theme_Setup;
