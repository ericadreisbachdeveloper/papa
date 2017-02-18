<?php
/**
 * Testimonials Customizer Options
 *
 * @package    Total
 * @subpackage Customizer
 * @author     Alexander Clarke
 * @copyright  Copyright (c) 2015, WPExplorer.com
 * @link       http://www.wpexplorer.com
 * @since      1.6.0
 * @version    2.1.3
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Return if testimonials post type isn't enabled
if ( ! WPEX_TESTIMONIALS_IS_ACTIVE ) {
	return;
}

// General
$this->sections['wpex_testimonials_general'] = array(
	'title'    => __( 'General', 'wpex' ),
	'panel'    => 'wpex_testimonials',
	'settings' => array(
		array(
			'id'      => 'testimonials_page',
			'control' => array (
				'label'       => __( 'Main Page', 'wpex' ),
				'type'        => 'dropdown-pages',
				'description' => __( 'Used for breadcrumbs.', 'wpex' ),
			),
		),
		array(
			'id'      => 'testimonials_custom_sidebar',
			'default' => 1,
			'control'   => array (
				'label' => __( 'Custom Post Type Sidebar', 'wpex' ),
				'type'  => 'checkbox',
				'desc'  => __( 'Enter the ID\'s of categories to exclude from the blog template or homepage blog seperated by a comma (no spaces).' ),
			),
		),
		array(
			'id'      => 'breadcrumbs_testimonials_cat',
			'default' => 1,
			'control'   => array (
				'label' => __( 'Display Category In Breadcrumbs', 'wpex' ),
				'type'  => 'checkbox',
			),
		),
		array(
			'id'      => 'testimonials_search',
			'default' => 1,
			'control'   => array (
				'label' => __( 'Include In Search', 'wpex' ),
				'type'  => 'checkbox',
			),
		),
	),
);

// Archives
$this->sections['wpex_testimonials_archives'] = array(
	'title'    => __( 'Archives', 'wpex' ),
	'panel'    => 'wpex_testimonials',
	'settings' => array(
		array(
			'id'      => 'testimonials_archive_layout',
			'default' => 'full-width',
			'control' => array (
				'label'   => __( 'Layout', 'wpex' ),
				'type'    => 'select',
				'choices' => array(
					'right-sidebar'	=> __( 'Right Sidebar','wpex' ),
					'left-sidebar'	=> __( 'Left Sidebar','wpex' ),
					'full-width'	=> __( 'No Sidebar','wpex' ),
				),
			),
		),
		array(
			'id'      => 'testimonials_entry_columns',
			'default' => '4',
			'control' => array (
				'label'   => __( 'Columns', 'wpex' ), 
				'type'    => 'select',
				'choices' => wpex_grid_columns(),
			),
		),
		array(
			'id'      => 'testimonials_archive_posts_per_page',
			'default' => '12',
			'control' => array (
				'label' => __( 'Posts Per Page', 'wpex' ),
				'type'  => 'number',
			),
		),
		array(
			'id'      => 'testimonial_entry_title',
			'control' => array (
				'label' => __( 'Entry Title', 'wpex' ), 
				'type'  => 'checkbox',
			),
		),
	),
);

// Single
$this->sections['wpex_testimonials_single'] = array(
	'title'    => __( 'Single', 'wpex' ),
	'panel'    => 'wpex_testimonials',
	'settings' => array(
		array(
			'id'      => 'testimonial_post_style',
			'default' => 'blockquote',
			'control' => array (
				'label'   => __( 'Layout', 'wpex' ),
				'type'    => 'select',
				'choices' => array(
					'blockquote' => __( 'Blockquote', 'wpex' ),
					'standard'   => __( 'Standard', 'wpex' ),
				),
			),
		),
		array(
			'id'      => 'testimonials_single_layout',
			'default' => 'right-sidebar',
			'control' => array (
				'label'   => __( 'Layout', 'wpex' ),
				'type'    => 'select',
				'choices' => array(
					'right-sidebar'	=> __( 'Right Sidebar','wpex' ),
					'left-sidebar'	=> __( 'Left Sidebar','wpex' ),
					'full-width'	=> __( 'No Sidebar','wpex' ),
				),
			),
		),
		array(
			'id'      => 'testimonials_comments',
			'control' => array (
				'label' => __( 'Comments', 'wpex' ), 
				'type'  => 'checkbox',
			),
		),
		array(
			'id'      => 'testimonials_next_prev',
			'default' => 1,
			'control' => array (
				'label' => __( 'Next & Previous Links', 'wpex' ),
				'type'  => 'checkbox',
			),
		),
	),
);