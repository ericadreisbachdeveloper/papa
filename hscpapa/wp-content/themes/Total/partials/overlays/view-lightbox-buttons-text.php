<?php
/**
 * Template for the Lightbox + View Text overlay style
 *
 * @package		Total
 * @subpackage	Partials/Overlays
 * @author		Alexander Clarke
 * @copyright	Copyright (c) 2015, WPExplorer.com
 * @link		http://www.wpexplorer.com
 * @since		1.6.0
 * @version		2.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Only used for outside position
if ( 'outside_link' != $position ) {
	return;
}

// Load lightbox skin stylesheet
wpex_enqueue_ilightbox_skin();

// Declare vars
$target = '';
$link   = get_permalink();

// Tweak things based on args
if ( isset( $args['custom_link'] ) ) {
	$link = $args['custom_link'];
	//$target = 'target="_blank"';
} ?>

<div class="overlay-view-lightbox-text overlay-hide theme-overlay">
	<div class="overlay-view-lightbox-text-inner clr">
		<div class="overlay-view-lightbox-text-buttons clr">
			<a href="<?php wpex_lightbox_image(); ?>" class="wpex-lightbox" title="<?php wpex_esc_title(); ?>"><?php _e( 'Zoom', 'wpex' ); ?><span class="fa fa-search"></span></a>
			<a href="<?php echo $link; ?>" class="view-post" title="<?php wpex_esc_title(); ?>"<?php echo $target; ?>><?php _e( 'View', 'wpex' ); ?><span class="fa fa-arrow-right"></span></a>
		</div><!-- .overlay-view-lightbox-text-buttons -->
	</div><!-- .overlay-view-lightbox-text-inner -->
</div><!-- .overlay-view-lightbox-text -->