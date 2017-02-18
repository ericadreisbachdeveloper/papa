<?php
/**
 * Footer Customizer Options
 *
 * @package		Total
 * @subpackage	Customizer
 * @author		Alexander Clarke
 * @copyright	Copyright (c) 2015, WPExplorer.com
 * @link		http://www.wpexplorer.com
 * @since		1.6.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*-----------------------------------------------------------------------------------*/
/*  - General
/*-----------------------------------------------------------------------------------*/
$this->sections['wpex_callout_general'] = array(
	'title'     => __( 'General', 'wpex' ),
	'panel'     => 'wpex_callout',
	'settings'  => array(
		array(
			'id'      => 'callout',
			'default' => '1',
			'control' => array (
				'label' => __( 'Enable', 'wpex' ),
				'type'  => 'checkbox',
			),
		),
		array(
			'id'      => 'callout_visibility',
			'control' => array (
				'label'   => __( 'Visibility', 'wpex' ),
				'type'    => 'select',
				'choices' => wpex_visibility(),
			),
		),
	),
);


/*-----------------------------------------------------------------------------------*/
/*	- Text
/*-----------------------------------------------------------------------------------*/
$this->sections['wpex_callout_content'] = array(
	'title'     => __( 'Text', 'wpex' ),
	'panel'     => 'wpex_callout',
	'settings'  => array(
		array(
			'id'      => 'callout_text',
			'default' => 'I am the footer call-to-action block, here you can add some relevant/important information about your company or product. I can be disabled in the theme options.',
			'control' => array (
				'label' => __( 'Enable', 'wpex' ),
				'type'  => 'textarea',
			),
		),
	),
);

/*-----------------------------------------------------------------------------------*/
/*	- Link / Button
/*-----------------------------------------------------------------------------------*/
$this->sections['wpex_callout_button'] = array(
	'title'     => __( 'Button', 'wpex' ),
	'panel'     => 'wpex_callout',
	'settings'  => array(
		array(
			'id'      => 'callout_link',
			'default' => 'http://www.wpexplorer.com',
			'control' => array (
				'label' => __( 'Link URL', 'wpex' ),
				'type'  => 'text',
			),
		),
		array(
			'id'      => 'callout_link_txt',
			'default' => 'Get In Touch',
			'control' => array (
				'label' => __( 'Link Text', 'wpex' ),
				'type'  => 'text',
			),
		),
		array(
			'id'      => 'callout_link_txt',
			'default' => 'Get In Touch',
			'control' => array (
				'label' => __( 'Link Text', 'wpex' ),
				'type'  => 'text',
			),
		),
		array(
			'id'      => 'callout_button_target',
			'default' => 'blank',
			'control' => array (
				'label'   => __( 'Link Target', 'wpex' ),
				'type'    => 'select',
				'choices' => array(
					'blank'	=> __( 'Blank', 'wpex' ),
					'self'	=> __( 'Self', 'wpex' ),
				),
			),
		),
		array(
			'id'      => 'callout_button_rel',
			'control' => array (
				'label'   => __( 'Link Rel', 'wpex' ),
				'type'    => 'select',
				'choices'		=> array(
					''			=> __( 'None', 'wpex' ),
					'nofollow'	=> __( 'Nofollow', 'wpex' ),
				),
			),
		),
	),
);