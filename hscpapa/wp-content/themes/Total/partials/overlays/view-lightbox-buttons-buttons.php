<?php
/**
 * Template for the Lightbox + View Butttons overlay style
 *
 * @package		Total
 * @subpackage	Partials/Overlays
 * @author		Alexander Clarke
 * @copyright	Copyright (c) 2015, WPExplorer.com
 * @link		http://www.wpexplorer.com
 * @since		1.6.0
 * @version		2.1.0
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

<div class="overlay-view-lightbox-buttons overlay-hide theme-overlay">
	<div class="overlay-view-lightbox-buttons-inner clr">
		<div class="overlay-view-lightbox-buttons-buttons clr">
			<a href="<?php wpex_lightbox_image(); ?>" class="wpex-lightbox" title="<?php wpex_esc_title(); ?>"><span class="fa fa-search"></span></a>
			<a href="<?php echo $link; ?>" class="view-post" title="<?php wpex_esc_title(); ?>"<?php echo $target; ?>><span class="fa fa-arrow-right"></span></a>
		</div><!-- .overlay-view-lightbox-buttons-buttons -->
	</div><!-- .overlay-view-lightbox-buttons-inner -->
</div><!-- .overlay-view-lightbox-buttons -->