<?php
/**
 * Staff Customizer Options
 *
 * @package		Total
 * @subpackage	Framework/Customizer
 * @author		Alexander Clarke
 * @copyright	Copyright (c) 2015, WPExplorer.com
 * @link		http://www.wpexplorer.com
 * @since		1.6.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Return if post type is disabled
if ( ! WPEX_STAFF_IS_ACTIVE ) {
	return;
}

/*-----------------------------------------------------------------------------------*/
/*	- General
/*-----------------------------------------------------------------------------------*/
$wp_customize->add_section( 'wpex_staff_general' , array(
	'title'		=> __( 'General', 'wpex' ),
	'priority'	=> 1,
	'panel'		=> 'wpex_staff',
) );

$wp_customize->add_setting( 'staff_page', array(
	'type'		=> 'theme_mod',
	'default'	=> '',
	'sanitize_callback' => false,
) );
$wp_customize->add_control( 'staff_page', array(
	'label'			=> __( 'Main Page', 'wpex' ),
	'section'		=> 'wpex_staff_general',
	'settings'		=> 'staff_page',
	'priority'		=> 2,
	'type'			=> 'dropdown-pages',
	'description'	=> __( 'Used for breadcrumbs.', 'wpex' ),
) );

$wp_customize->add_setting( 'staff_custom_sidebar', array(
	'type'		=> 'theme_mod',
	'default'	=> '1',
	'sanitize_callback' => false,
) );
$wp_customize->add_control( 'staff_custom_sidebar', array(
	'label'			=> __( 'Custom Post Type Sidebar', 'wpex' ),
	'section'		=> 'wpex_staff_general',
	'settings'		=> 'staff_custom_sidebar',
	'priority'		=> 3,
	'type'			=> 'checkbox',
) );

$wp_customize->add_setting( 'breadcrumbs_staff_cat', array(
	'type'		=> 'theme_mod',
	'default'	=> '1',
	'sanitize_callback' => false,
) );
$wp_customize->add_control( 'breadcrumbs_staff_cat', array(
	'label'			=> __( 'Display Category In Breadcrumbs', 'wpex' ),
	'section'		=> 'wpex_staff_general',
	'settings'		=> 'breadcrumbs_staff_cat',
	'priority'		=> 4,
	'type'			=> 'checkbox',
) );

$wp_customize->add_setting( 'staff_search', array(
	'type'		=> 'theme_mod',
	'default'	=> '1',
	'sanitize_callback' => false,
) );
$wp_customize->add_control( 'staff_search', array(
	'label'			=> __( 'Include In Search', 'wpex' ),
	'section'		=> 'wpex_staff_general',
	'settings'		=> 'staff_search',
	'priority'		=> 5,
	'type'			=> 'checkbox',
) );

/*-----------------------------------------------------------------------------------*/
/*	- Archives
/*-----------------------------------------------------------------------------------*/
$wp_customize->add_section( 'wpex_staff_archives' , array(
	'title'			=> __( 'Archives', 'wpex' ),
	'priority'		=> 2,
	'panel'			=> 'wpex_staff',
	'description'	=> __( 'The following options are for the post type category and tag archives.', 'wpex' ),
) );

$wp_customize->add_setting( 'staff_archive_layout', array(
	'type'		=> 'theme_mod',
	'default'	=> 'full-width',
	'sanitize_callback' => false,
) );
$wp_customize->add_control( 'staff_archive_layout', array(
	'label'		=> __( 'Layout', 'wpex' ),
	'section'	=> 'wpex_staff_archives',
	'settings'	=> 'staff_archive_layout',
	'priority'	=> 1,
	'type'		=> 'select',
	'choices'	=> array(
		'right-sidebar'	=> __( 'Right Sidebar','wpex' ),
		'left-sidebar'	=> __( 'Left Sidebar','wpex' ),
		'full-width'	=> __( 'No Sidebar','wpex' ),
	),
) );

$wp_customize->add_setting( 'staff_archive_grid_style', array(
	'type'		=> 'theme_mod',
	'default'	=> 'fit-rows',
	'sanitize_callback' => false,
) );
$wp_customize->add_control( 'staff_archive_grid_style', array(
	'label'		=> __( 'Grid Style', 'wpex' ),
	'section'	=> 'wpex_staff_archives',
	'settings'	=> 'staff_archive_grid_style',
	'priority'	=> 2,
	'type'		=> 'select',
	'choices'	=> array(
		'fit-rows'		=> __( 'Fit Rows','wpex' ),
		'masonry'		=> __( 'Masonry','wpex' ),
		'no-margins'	=> __( 'No Margins','wpex' )
	),
) );

$wp_customize->add_setting( 'staff_archive_grid_equal_heights', array(
	'type'		=> 'theme_mod',
	'default'	=> '',
	'sanitize_callback' => false,
) );
$wp_customize->add_control( 'staff_archive_grid_equal_heights', array(
	'label'		=> __( 'Equal Heights', 'wpex' ),
	'section'	=> 'wpex_staff_archives',
	'settings'	=> 'staff_archive_grid_equal_heights',
	'priority'	=> 3,
	'description'   => __( 'Displays the content containers (with the title and excerpt) in equal heights. Will NOT work with the "Masonry" layouts.', 'wpex' ),
) );

$wp_customize->add_setting( 'staff_entry_columns', array(
	'type'		=> 'theme_mod',
	'default'	=> '3',
	'sanitize_callback' => false,
) );
$wp_customize->add_control( 'staff_entry_columns', array(
	'label'		=> __( 'Columns', 'wpex' ), 
	'section'	=> 'wpex_staff_archives',
	'settings'	=> 'staff_entry_columns',
	'priority'	=> 4,
	'type'		=> 'select',
	'choices'	=> wpex_grid_columns(),
) );

$wp_customize->add_setting( 'staff_archive_posts_per_page', array(
	'type'		=> 'theme_mod',
	'default'	=> '12',
	'sanitize_callback' => false,
) );
$wp_customize->add_control( 'staff_archive_posts_per_page', array(
	'label'		=> __( 'Posts Per Page', 'wpex' ), 
	'section'	=> 'wpex_staff_archives',
	'settings'	=> 'staff_archive_posts_per_page',
	'priority'	=> 5,
	'type'		=> 'text'
) );

$wp_customize->add_setting( 'staff_entry_overlay_style', array(
	'type'		=> 'theme_mod',
	'default'	=> 'none',
	'sanitize_callback' => false,
) );
$wp_customize->add_control( 'staff_entry_overlay_style', array(
	'label'		=> __( 'Archives Entry: Overlay Style', 'wpex' ), 
	'section'	=> 'wpex_staff_archives',
	'settings'	=> 'staff_entry_overlay_style',
	'priority'	=> 6,
	'type'		=> 'select',
	'choices'	=> wpex_overlay_styles_array()
) );

$wp_customize->add_setting( 'staff_entry_details', array(
	'type'		=> 'theme_mod',
	'default'	=> '1',
	'sanitize_callback' => false,
) );
$wp_customize->add_control( 'staff_entry_details', array(
	'label'		=> __( 'Archives Entry: Details', 'wpex' ), 
	'section'	=> 'wpex_staff_archives',
	'settings'	=> 'staff_entry_details',
	'priority'	=> 7,
	'type'		=> 'checkbox',
) );

$wp_customize->add_setting( 'staff_entry_position', array(
	'type'		=> 'theme_mod',
	'default'	=> '1',
	'sanitize_callback' => false,
) );
$wp_customize->add_control( 'staff_entry_position', array(
	'label'		=> __( 'Archives Entry: Position', 'wpex' ), 
	'section'	=> 'wpex_staff_archives',
	'settings'	=> 'staff_entry_position',
	'priority'	=> 8,
	'type'		=> 'checkbox',
) );

$wp_customize->add_setting( 'staff_entry_excerpt_length', array(
	'type'		=> 'theme_mod',
	'default'	=> '20',
	'sanitize_callback' => false,
) );
$wp_customize->add_control( 'staff_entry_excerpt_length', array(
	'label'			=> __( 'Archives Entry: Excerpt Length', 'wpex' ), 
	'section'		=> 'wpex_staff_archives',
	'settings'		=> 'staff_entry_excerpt_length',	 
	'priority'		=> 9,
	'type'			=> 'text',
	'description'	=> __( 'Enter 0 or leave blank to disable', 'wpex' ),
) );

$wp_customize->add_setting( 'staff_entry_social', array(
	'type'		=> 'theme_mod',
	'default'	=> '1',
	'sanitize_callback' => false,
) );
$wp_customize->add_control( 'staff_entry_social', array(
	'label'		=> __( 'Archives Entry: Social Links', 'wpex' ), 
	'section'	=> 'wpex_staff_archives',
	'settings'	=> 'staff_entry_social',
	'priority'	=> 10,
	'type'		=> 'checkbox',
) );


/*-----------------------------------------------------------------------------------*/
/*	- Single
/*-----------------------------------------------------------------------------------*/
$wp_customize->add_section( 'wpex_staff_single' , array(
	'title'		=> __( 'Single', 'wpex' ),
	'priority'	=> 3,
	'panel'		=> 'wpex_staff',
) );

$wp_customize->add_setting( 'staff_single_layout', array(
	'type'		=> 'theme_mod',
	'default'	=> 'right-sidebar',
	'sanitize_callback' => false,
) );
$wp_customize->add_control( 'staff_single_layout', array(
	'label'		=> __( 'Layout', 'wpex' ), 
	'section'	=> 'wpex_staff_single',
	'settings'	=> 'staff_single_layout',
	'priority'	=> 1,
	'type'		=> 'select',
	'choices'	=> array(
		'right-sidebar'	=> __( 'Right Sidebar','wpex' ),
		'left-sidebar'	=> __( 'Left Sidebar','wpex' ),
		'full-width'	=> __( 'No Sidebar','wpex' ),
	),
) );

$wp_customize->add_setting( 'staff_next_prev', array(
	'type'		=> 'theme_mod',
	'default'	=> '1',
	'sanitize_callback' => false,
) );
$wp_customize->add_control( 'staff_next_prev', array(
	'label'		=> __( 'Next & Previous Links', 'wpex' ),
	'section'	=> 'wpex_staff_single',
	'settings'	=> 'staff_next_prev',
	'priority'	=> 3,
	'type'		=> 'checkbox',
) );

$wp_customize->add_setting( 'staff_related_title', array(
	'type'		=> 'theme_mod',
	'default'	=> '',
	'sanitize_callback' => false,
) );
$wp_customize->add_control( 'staff_related_title', array(
	'label'		=> __( 'Related Posts Title', 'wpex' ),
	'section'	=> 'wpex_staff_single',
	'settings'	=> 'staff_related_title',
	'priority'	=> 5,
	'type'		=> 'text',
) );

$wp_customize->add_setting( 'staff_related_count', array(
	'type'		=> 'theme_mod',
	'default'	=> '3',
	'sanitize_callback' => false,
) );
$wp_customize->add_control( 'staff_related_count', array(
	'label'		=> __( 'Related Posts Count', 'wpex' ),
	'section'	=> 'wpex_staff_single',
	'settings'	=> 'staff_related_count',
	'priority'	=> 6,
	'type'		=> 'text',
) );

$wp_customize->add_setting( 'staff_related_columns', array(
	'type'		=> 'theme_mod',
	'default'	=> '3',
	'sanitize_callback' => false,
) );
$wp_customize->add_control( 'staff_related_columns', array(
	'label'		=> __( 'Related Posts Columns', 'wpex' ), 
	'section'	=> 'wpex_staff_single',
	'settings'	=> 'staff_related_columns',
	'priority'	=> 7,
	'type'		=> 'select',
	'choices'	=> wpex_grid_columns(),
) );

$wp_customize->add_setting( 'staff_related_excerpts', array(
	'type'		=> 'theme_mod',
	'default'	=> '1',
	'sanitize_callback' => false,
) );
$wp_customize->add_control( 'staff_related_excerpts', array(
	'label'		=> __( 'Related Posts Content', 'wpex' ),
	'section'	=> 'wpex_staff_single',
	'settings'	=> 'staff_related_excerpts',
	'priority'	=> 8,
	'type'		=> 'checkbox',
) );

/*-----------------------------------------------------------------------------------*/
/*  - Single Blocks
/*-----------------------------------------------------------------------------------*/
$wp_customize->add_section( 'wpex_staff_single_builder' , array(
    'title'     => __( 'Single Builder', 'wpex' ),
    'priority'  => 3,
    'panel'     => 'wpex_staff',
) );

$blocks = array (
	'title'    => __( 'Post Title', 'wpex' ),
    'media'    => __( 'Media', 'wpex' ),
    'content'  => __( 'Content', 'wpex' ),
    'share'    => __( 'Social Share', 'wpex' ),
    'comments' => __( 'Comments', 'wpex' ),
    'related'  => __( 'Related Posts', 'wpex' ),
);
$blocks = apply_filters( 'wpex_staff_single_blocks', $blocks );

$wp_customize->add_setting( 'staff_post_composer', array(
    'type'              => 'theme_mod',
    'default'           => 'content,related',
    'sanitize_callback' => false,
) );
$wp_customize->add_control( new WPEX_Customize_Control_Sorter( $wp_customize, 'staff_post_composer', array(
    'label'   => __( 'Post Layout Elements', 'wpex' ),
    'type'    => 'wpex-sortable',
    'section' => 'wpex_staff_single_builder',
    'choices' => $blocks,
    'desc'    => __( 'Click and drag and drop elements to re-order them. Click the "x" to disable any element. You can not disable all elements, if you do so it will display them all', 'wpex' ),
) ) );