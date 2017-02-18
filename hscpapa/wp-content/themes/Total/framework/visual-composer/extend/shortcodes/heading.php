<?php
/**
 * Registers the bullets shortcode and adds it to the Visual Composer
 *
 * @package     Total
 * @subpackage  Framework/Visual Composer
 * @author      Alexander Clarke
 * @copyright   Copyright (c) 2015, WPExplorer.com
 * @link        http://www.wpexplorer.com
 * @since       Total 1.4.1
 * @version     2.0.0
 */

/**
 * Register shortcode with VC Composer
 *
 * @since 2.0.0
 */
class WPBakeryShortCode_vcex_heading extends WPBakeryShortCode {
	protected function content( $atts, $content = null ) {
		ob_start();
		include( locate_template( 'vcex_templates/vcex_heading.php' ) );
		return ob_get_clean();
	}
}

/**
 * Adds the shortcode to the Visual Composer
 *
 * @since Total 1.4.1
 */
if ( ! function_exists( 'vcex_heading_shortcode_vc_map' ) ) {
	function vcex_heading_shortcode_vc_map() {

		// Register to VC
		vc_map( array(
			'name'        => __( 'Heading', 'wpex' ),
			'description' => __( 'A better heading module', 'wpex' ),
			'base'        => 'vcex_heading',
			'category'    => WPEX_THEME_BRANDING,
			'icon'        => 'vcex-heading',
			'params'      => array(
				array(
					'type'        => 'dropdown',
					'heading'     => __( 'Visibility', 'wpex' ),
					'param_name'  => 'visibility',
					'value'       => vcex_visibility(),
					'description' => __( 'Choose when this module should display.', 'wpex' ),
				),
				array(
					'type'        => 'textarea',
					'heading'     => __( 'Text', 'wpex' ),
					'param_name'  => 'text',
					'admin_label' => true,
				),
				array(
					'type'        => 'dropdown',
					'heading'     => __( 'Font Family', 'wpex' ),
					'param_name'  => 'font_family',
					'std'         => '',
					'value'       => vcex_fonts_array(),
					'description' => __( 'After selecting a font click on the save changes button to preview your font.', 'wpex' ),
				),
				array(
					'type'              => 'dropdown',
					'heading'           => __( 'Tag', 'wpex' ),
					'param_name'        => 'tag',
					'value'     => array(
						__( 'Default', 'wpex' ) => '',
						'h1'                    => 'h1',
						'h2'                    => 'h2',
						'h3'                    => 'h3',
						'h4'                    => 'h4',
						'h5'                    => 'h5',
						'div'                   => 'div',
						'span'                  => 'span',
					),
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Font Size', 'wpex' ),
					'param_name'  => 'font_size',
					'description' => __( 'You can use em or px values, but you must define them.', 'wpex' ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Letter Spacing', 'wpex' ),
					'param_name'  => 'letter_spacing',
					'description' => __( 'Please enter a px value.', 'wpex' ),
				),
				array(
					'type'       => 'dropdown',
					'heading'    => __( 'Font Weight', 'wpex' ),
					'param_name' => 'font_weight',
					'value'      => vcex_font_weights(),
					'std'        => '',
				),
				array(
					'type'       => 'dropdown',
					'heading'    => __( 'Text Align', 'wpex' ),
					'param_name' => 'text_align',
					'value'      => vcex_alignments(),
					'std'        => '',
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => __( 'Color', 'wpex' ),
					'param_name'  => 'color',
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => __( 'Color: Hover', 'wpex' ),
					'param_name'  => 'color_hover',
				),

				// Link
				array(
					'type'       => 'vc_link',
					'heading'    => __( 'URL', 'wpex' ),
					'param_name' => 'link',
					'group'      => __( 'Link', 'wpex' ),
				),
				array(
					'type'       => 'dropdown',
					'heading'    => __( 'Link: Local Scroll', 'wpex' ),
					'param_name' => 'link_local_scroll',
					'value'      => array(
						__( 'False', 'wpex' ) => '',
						__( 'True', 'wpex' )  => 'true',
					),
					'group'      => __( 'Link', 'wpex' ),
				),

				// CSS
				array(
					'type'       => 'css_editor',
					'heading'    => __( 'Design', 'wpex' ),
					'param_name' => 'css',
					'group'      => __( 'Design', 'wpex' ),
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => __( 'Background: Hover', 'wpex' ),
					'param_name' => 'background_hover',
					'group'      => __( 'Design', 'wpex' ),
				),

			)
		) );
	}
}
add_action( 'vc_before_init', 'vcex_heading_shortcode_vc_map' );