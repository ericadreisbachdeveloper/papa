<?php
/**
 * Registers the searchbar shortcode and adds it to the Visual Composer
 *
 * @package     Total
 * @subpackage  Framework/Visual Composer
 * @author      Alexander Clarke
 * @copyright   Copyright (c) 2015, WPExplorer.com
 * @link        http://www.wpexplorer.com
 * @since       2.1.0
 * @version     2.1.0
 */

/**
 * Register shortcode with VC Composer
 *
 * @since Total 2.1.0
 */
class WPBakeryShortCode_vcex_searchbar extends WPBakeryShortCode {
	protected function content( $atts, $content = null ) {
		ob_start();
		include( locate_template( 'vcex_templates/vcex_searchbar.php' ) );
		return ob_get_clean();
	}
}

/**
 * Adds the shortcode to the Visual Composer
 *
 * @since Total 2.1.0
 */
if ( ! function_exists( 'vcex_searchbar_shortcode_vc_map' ) ) {
	function vcex_searchbar_shortcode_vc_map() {

		// Add new shortcode to the Visual Composer
		vc_map( array(
			'name'                  => __( 'Search Bar', 'wpex' ),
			'description'           => __( 'Custom search form', 'wpex' ),
			'base'                  => 'vcex_searchbar',
			'icon'                  => 'vcex-searchbar',
			'category'              => WPEX_THEME_BRANDING,
			'params'                => array(

				// General
				array(
                    'type'          => 'textfield',
                    'admin_label'   => true,
                    'heading'       => __( 'Unique Id', 'wpex' ),
                    'description'   => __( 'Give your main element a unique ID.', 'wpex' ),
                    'param_name'    => 'unique_id',
                ),
                array(
                    'type'          => 'textfield',
                    'admin_label'   => true,
                    'heading'       => __( 'Classes', 'wpex' ),
                    'description'   => __( 'Add additonal classes to the main element.', 'wpex' ),
                    'param_name'    => 'classes',
                ),
                array(
                    'type'              => 'dropdown',
                    'heading'           => __( 'Visibility', 'wpex' ),
                    'param_name'        => 'visibility',
                    'edit_field_class'  => 'vc_col-sm-6 vc_column clear',
                    'value'             => vcex_visibility(),
                ),
                array(
                    'type'              => 'dropdown',
                    'heading'           => __( 'Appear Animation', 'wpex'),
                    'param_name'        => 'css_animation',
                    'edit_field_class'  => 'vc_col-sm-6 vc_column',
                    'value'             => vcex_css_animations(),
                ),
				array(
					'type'       => 'textfield',
					'heading'    => __( 'Placeholder', 'wpex' ),
					'param_name' => 'placeholder',
				),

				// Query
				array(
					'type'          => 'textfield',
					'heading'       => __( 'Advanced Search', 'wpex' ),
					'param_name'    => 'advanced_query',
					'group'         => __( 'Query', 'wpex' ),
					'description'	=> __( 'Example: ', 'wpex' ) . 'post_type=portfolio&taxonomy=portfolio_category&term=advertising',
				),

				// Widths
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Input Width', 'wpex' ),
					'param_name'  => 'input_width',
					'group'       => __( 'Widths', 'wpex' ),
					'description' => __( 'Default:', 'wpex' ) .'70%',
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Button Width', 'wpex' ),
					'param_name'  => 'button_width',
					'group'       => __( 'Widths', 'wpex' ),
					'description' => __( 'Default:', 'wpex' ) .'28%',
				),

				// Input
				array(
					'type'       => 'colorpicker',
					'heading'    => __( 'Color', 'wpex' ),
					'param_name' => 'input_color',
					'group'      => __( 'Input', 'wpex' ),
				),
				array(
                    'type'              => 'textfield',
                    'heading'           => __( 'Font Size', 'wpex' ),
                    'param_name'        => 'input_font_size',
                    'description'       => __( 'You can use em or px values, but you must define them.', 'wpex' ),
                    'group'             => __( 'Input', 'wpex' ),
                    'edit_field_class'  => 'vc_col-sm-6 vc_column clear',
                ),
                array(
                    'type'              => 'textfield',
                    'heading'           => __( 'Letter Spacing', 'wpex' ),
                    'param_name'        => 'input_letter_spacing',
                    'description'       => __( 'Please enter a px value.', 'wpex' ),
                    'group'             => __( 'Input', 'wpex' ),
                    'edit_field_class'  => 'vc_col-sm-6 vc_column',
                ),
                array(
                    'type'              => 'dropdown',
                    'heading'           => __( 'Text Transform', 'wpex' ),
                    'param_name'        => 'input_text_transform',
                    'group'             => __( 'Input', 'wpex' ),
                    'value'             => vcex_text_transforms(),
                    'std'               => '',
                    'edit_field_class'  => 'vc_col-sm-6 vc_column clear',
                ),
                array(
                    'type'              => 'dropdown',
                    'heading'           => __( 'Font Weight', 'wpex' ),
                    'param_name'        => 'input_font_weight',
                    'value'             => vcex_font_weights(),
                    'std'               => '',
                    'group'             => __( 'Input', 'wpex' ),
                    'edit_field_class'  => 'vc_col-sm-6 vc_column',
                ),
				array(
					'type'       => 'css_editor',
					'heading'    => __( 'Design', 'wpex' ),
					'param_name' => 'css',
					'group'      => __( 'Input', 'wpex' ),
				),

				// Submit
				array(
					'type'       => 'colorpicker',
					'heading'    => __( 'Background', 'wpex' ),
					'param_name' => 'button_bg',
					'group'      => __( 'Submit', 'wpex' ),
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => __( 'Background: Hover', 'wpex' ),
					'param_name' => 'button_bg_hover',
					'group'      => __( 'Submit', 'wpex' ),
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => __( 'Color', 'wpex' ),
					'param_name' => 'button_color',
					'group'      => __( 'Submit', 'wpex' ),
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => __( 'Color: Hover', 'wpex' ),
					'param_name' => 'button_color_hover',
					'group'      => __( 'Submit', 'wpex' ),
				),
				array(
                    'type'              => 'textfield',
                    'heading'           => __( 'Font Size', 'wpex' ),
                    'param_name'        => 'button_font_size',
                    'description'       => __( 'You can use em or px values, but you must define them.', 'wpex' ),
                    'group'             => __( 'Submit', 'wpex' ),
                    'edit_field_class'  => 'vc_col-sm-6 vc_column clear',
                ),
                array(
                    'type'              => 'textfield',
                    'heading'           => __( 'Letter Spacing', 'wpex' ),
                    'param_name'        => 'button_letter_spacing',
                    'description'       => __( 'Please enter a px value.', 'wpex' ),
                    'group'             => __( 'Submit', 'wpex' ),
                    'edit_field_class'  => 'vc_col-sm-6 vc_column',
                ),
                array(
                    'type'              => 'dropdown',
                    'heading'           => __( 'Text Transform', 'wpex' ),
                    'param_name'        => 'button_text_transform',
                    'group'             => __( 'Submit', 'wpex' ),
                    'value'             => vcex_text_transforms(),
                    'std'               => '',
                    'edit_field_class'  => 'vc_col-sm-6 vc_column clear',
                ),
                array(
                    'type'              => 'dropdown',
                    'heading'           => __( 'Font Weight', 'wpex' ),
                    'param_name'        => 'button_font_weight',
                    'value'             => vcex_font_weights(),
                    'std'               => '',
                    'group'             => __( 'Submit', 'wpex' ),
                    'edit_field_class'  => 'vc_col-sm-6 vc_column',
                ),
			)
		) );

	}
}
add_action( 'vc_before_init', 'vcex_searchbar_shortcode_vc_map' );