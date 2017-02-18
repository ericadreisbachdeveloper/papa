<?php
/**
 * Footer Builder Addon
 *
 * @package    Total
 * @subpackage Framework/Addons
 * @author     Alexander Clarke
 * @copyright  Copyright (c) 2015, WPExplorer.com
 * @link       http://www.wpexplorer.com
 * @since      2.0.0
 * @version    2.1.3
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Start Class
class WPEX_Footer_Builder {

	/**
	 * Start things up
	 */
	public function __construct() {

		// Define footer ID
		$this->footer_builder_id = get_theme_mod( 'footer_builder_page_id' );

		// Add admin page
		add_action( 'admin_menu', array( $this, 'add_page' ), 20 );

		// Register admin options
		add_action( 'admin_init', array( $this,'register_page_options' ) );

		// Run actions and filters if footer_builder ID is defined
		if ( $this->footer_builder_id ) {

			// Alter the footer on init
			add_action( 'init', array( $this,'alter_footer' ) );

			// Remove all actions from wp_head on footer builder page
			add_action( 'wp_head', array( $this,'remove_actions' ) );

			// Remove sidebar on footer builder page
			add_filter( 'wpex_post_layout_class', array( $this,'remove_sidebar_on_footer_builder' ) );

			// Remove footer customizer settings
			add_filter( 'wpex_customizer_panels', array( $this,'remove_customizer_footer_panel' ) );

		}

	}

	/**
	 * Add sub menu page
	 *
	 * @link    http://codex.wordpress.org/Function_Reference/add_theme_page
	 * @since   2.0.0
	 */
	public function add_page() {

		$my_admin_page = add_submenu_page(
			WPEX_THEME_PANEL_SLUG,
			__( 'Footer Builder', 'wpex' ),
			__( 'Footer Builder', 'wpex' ),
			'administrator',
			WPEX_THEME_PANEL_SLUG .'-footer-builder',
			array( $this, 'create_admin_page' )
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
		$content  = '<p><h3>'. __( 'Documentation', 'wpex' ) .'</h3><ul>';
			$content .= '<li><a href="http://wpexplorer-themes.com/total/docs/footer-builder/" target="_blank">http://wpexplorer-themes.com/total/docs/footer-builder/</a></li>';
		$content  .= '</ul></p>';

		// Add wpex_footer_builder help tab if current screen is My Admin Page
		$screen->add_help_tab( array(
			'id'      => 'wpex_footer_builder',
			'title'   => __( 'Documentation', 'wpex' ),
			'content' => $content,
		) );

	}

	/**
	 * Function that will register admin page options
	 *
	 * @link    http://codex.wordpress.org/Function_Reference/register_setting
	 * @link    http://codex.wordpress.org/Function_Reference/add_settings_section
	 * @link    http://codex.wordpress.org/Function_Reference/add_settings_field
	 * @since   2.0.0
	 */
	public function register_page_options() {

		// Register settings
		register_setting( 'wpex_footer_builder', 'footer_builder', array( $this, 'sanitize' ) );

		// Add main section to our options page
		add_settings_section( 'wpex_footer_builder_main', false, array( $this, 'section_main_callback' ), 'wpex-footer-builder-admin' );

		// Custom Page ID
		add_settings_field(
			'footer_builder_page_id',
			__( 'Footer Builder page', 'wpex' ),
			array( $this, 'content_id_field_callback' ),
			'wpex-footer-builder-admin',
			'wpex_footer_builder_main'
		);

	}

	/**
	 * Sanitization callback
	 *
	 * @since 2.0.0
	 */
	public function sanitize( $options ) {

		// Set theme mods
		if ( isset( $options['content_id'] ) ) {
			set_theme_mod( 'footer_builder_page_id', $options['content_id'] );
		}

		// Set options to nothing since we are storing in the theme mods
		$options = '';
		return $options;
	}

	/**
	 * Main Settings section callback
	 *
	 * @since 2.0.0
	 */
	public function section_main_callback( $options ) {
		// Leave blank
	}

	/**
	 * Fields callback functions
	 *
	 * @since 2.0.0
	 */

	// Footer Builder Page ID
	public function content_id_field_callback() { ?>

		<?php
		// Get footer builder page ID
		$page_id = wpex_get_mod( 'footer_builder_page_id' ); ?>

		<?php
		// Display dropdown of pages
		wp_dropdown_pages( array(
			'echo'              => true,
			'selected'          => $page_id,
			'name'              => 'footer_builder[content_id]',
			'show_option_none'  => __( 'None - Display Widgetized Footer', 'wpex' ),
		) ); ?>
		<br />

		<p class="description"><?php _e( 'Select your custom page for your footer layout.', 'wpex' ) ?></p>

		<?php
		// If page_id is defined display edit and preview links
		if ( $page_id ) { ?>

			<br />

			<a href="<?php echo admin_url( 'post.php?post='. $page_id .'&action=edit' ); ?>" class="button" target="_blank">
				<?php _e( 'Backend Edit', 'wpex' ); ?>
			</a>

			<?php if ( WPEX_VC_ACTIVE ) { ?>
				<a href="<?php echo admin_url( 'post.php?vc_action=vc_inline&post_id='. $page_id .'&post_type=page' ); ?>" class="button" target="_blank">
					<?php _e( 'Frontend Edit', 'wpex' ); ?>
				</a>
			<?php } ?>

			<a href="<?php echo get_permalink( $page_id ); ?>" class="button" target="_blank">
				<?php _e( 'Preview', 'wpex' ); ?>
			</a>

		<?php } ?>
		
	<?php }

	/**
	 * Settings page output
	 *
	 * @since 2.0.0
	 */
	public function create_admin_page() { ?>
		<div class="wrap">
			<h2><?php _e( 'Footer Builder', 'wpex' ); ?></h2>
			<p>
				<?php _e( 'By default the footer consists of a simple widgetized area. For more complex layouts you can use the option below to select a page which will hold the content and layout for your site footer.', 'wpex' ); ?>
				<br />
				<?php _e( 'Selecting a custom footer will remove all footer functions (footer widgets and footer customizer options) so you can create an entire footer using the Visual Composer and not load that extra functions.', 'wpex' ); ?>
			</p>
			<form method="post" action="options.php">
				<?php settings_fields( 'wpex_footer_builder' ); ?>
				<?php do_settings_sections( 'wpex-footer-builder-admin' ); ?>
				<?php submit_button(); ?>
			</form>
		</div><!-- .wrap -->
	<?php }

	/**
	 * Remove the footer and add custom footer if enabled
	 *
	 * @since 2.0.0
	 */
	public function alter_footer() {

		// Remove theme footer
		remove_action( 'wpex_hook_wrap_bottom', 'wpex_footer', 10 );

		// Add builder footer
		add_action( 'wpex_hook_wrap_bottom', array( $this, 'get_part' ), 10 );

		// Remove widgets
		unregister_sidebar( 'footer_one' );
		unregister_sidebar( 'footer_two' );
		unregister_sidebar( 'footer_three' );
		unregister_sidebar( 'footer_four' );

	}

	/**
	 * Remove all theme actions
	 *
	 * @since 2.0.0
	 */
	public function remove_actions() {

		// Remove all actions if the footer builder page is defined
		if ( is_page( $this->footer_builder_id ) ) {
			wpex_remove_actions();
		}

	}

	/**
	 * Remove the footer and add custom footer if enabled
	 *
	 * @since 2.0.0
	 */
	public function remove_customizer_footer_panel( $panels ) {

		// Remove footer panels from the customizer
		unset( $panels['footer'] );

		// Return panels
		return $panels;

	}

	/**
	 * Make Footer builder page full-width (no sidebar)
	 *
	 * @since 2.0.0
	 */
	public function remove_sidebar_on_footer_builder( $class ) {

		// Set the footer builder to "full-width" by default
		if ( is_page( $this->footer_builder_id ) ) {
			$class = 'full-width';
		}

		// Return correct class
		return $class;

	}

	/**
	 * Gets the footer builder template part
	 *
	 * @since 2.0.0
	 */
	public function get_part() {
		$obj = wpex_global_obj();
		if ( $obj->has_footer ) {
			get_template_part( 'partials/footer/footer-builder' );
		}
	}

}
new WPEX_Footer_Builder();