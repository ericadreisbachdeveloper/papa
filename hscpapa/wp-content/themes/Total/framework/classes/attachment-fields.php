<?php
/**
 * Adds new fields for the media items
 *
 * @package    Total
 * @subpackage Framework
 * @author     Alexander Clarke
 * @copyright  Copyright (c) 2015, WPExplorer.com
 * @link       http://www.wpexplorer.com
 * @since      2.1.3
 * @version    1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Start Class
class WPEX_Media_Fields {

	/**
	 * Main constructor
	 *
	 * @since 2.0.0
	 */
	public function __construct() {
		add_filter( 'attachment_fields_to_edit', array( $this, 'edit_fields' ), null, 2 );
		add_filter( 'attachment_fields_to_save', array( $this, 'save_fields' ), null , 2 );
	}

	/**
	 * Adds new edit attachment fields
	 *
	 * @since  2.0.0
	 * @access public
	 *
	 * @link   https://codex.wordpress.org/Plugin_API/Filter_Reference/attachment_fields_to_edit
	 */
	public function edit_fields( $form_fields, $post ) {
		$form_fields['wpex_video_url'] = array(
			'label'	=> __( 'Video URL', 'wpex' ),
			'input'	=> 'text',
			'value'	=> get_post_meta( $post->ID, '_video_url', true ),
		);
	   return $form_fields;
	}

	/**
	 * Save new attachment fields
	 *
	 * @since  2.0.0
	 * @access public
	 *
	 * @link   https://codex.wordpress.org/Plugin_API/Filter_Reference/attachment_fields_to_save
	 */
	public function save_fields( $post, $attachment ) {
		if ( isset( $attachment['wpex_video_url'] ) ) {
			update_post_meta( $post['ID'], '_video_url', $attachment['wpex_video_url'] );
		}
		return $post;
	}

}
new WPEX_Media_Fields();