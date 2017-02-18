<?php
/**
 * The Scroll-Top / Back-To-Top Scrolling Button
 *
 * @package		Total
 * @subpackage	Partials
 * @author		Alexander Clarke
 * @copyright	Copyright (c) 2015, WPExplorer.com
 * @link		http://www.wpexplorer.com
 * @since		2.0.0
 * @version		2.1.2
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Disabled if post is password protected
if ( post_password_required() ) {
	return;
}

// Get global object
$wpex_theme = wpex_global_obj();

// Return if disabled
if ( ! $wpex_theme->has_social_share ) {
	return;
}

// Get sharing sites
$sites = wpex_social_share_sites();

// Return if there aren't any sites enabled
if ( empty( $sites ) ) {
	return;
}

// Get sharing settings
$position = wpex_social_share_position();
$style    = wpex_social_share_style();

// Get heading
$heading = wpex_social_share_heading();

// Get and encode permalink
$permalink	= get_permalink( $wpex_theme->post_id );
$url		= urlencode( $permalink );

// Get and encode title
$args = array(
	'before'	=> false,
	'after'		=> false,
	'echo'		=> false,
	'post'		=> $wpex_theme->post_id,
);
$title = urlencode( esc_attr( the_title_attribute( $args ) ) );

// Get and encode summary
$args = array(
	'length'			=> '40',
	'echo'				=> false,
	'ignore_more_tag'	=> true,
);
$summary = urlencode( wpex_get_excerpt( $args ) );

// Get image
$img = wp_get_attachment_url( get_post_thumbnail_id( $wpex_theme->post_id ) );
$img = esc_url( $img );

// Source URL
$source = home_url();

// Tooltip Style
if ( is_rtl() ) {
	$tooltip_class = 'tooltip-right';
} elseif ( $position == 'horizontal' ) {
	$tooltip_class = 'tooltip-up';
} else {
	if ( $wpex_theme->post_layout == 'left-sidebar' ) {
		$tooltip_class ='tooltip-left';
	} else {
		$tooltip_class ='tooltip-right';
	}
} ?>

<div class="social-share-wrap clr position-<?php echo $position; ?><?php if ( 'full-screen' == $wpex_theme->post_layout ) echo ' container'; ?>">

	<?php wpex_heading( array(
		'content'		=> $heading,
		'tag'			=> 'div',
		'classes'		=> array( 'social-share-title' ),
		'apply_filters'	=> 'social_share',
	) ); ?>

	<ul class="social-share-buttons position-<?php echo $position; ?> style-<?php echo $style; ?> clr">

		<?php foreach ( $sites as $site ) : ?>

			<?php
			// Twitter
			if ( 'twitter' == $site ) {

				// Get SEO meta and use instead if they exist
				if ( defined( 'WPSEO_VERSION' ) ) {
					if ( $meta = get_post_meta( $wpex_theme->post_id, '_yoast_wpseo_twitter-title', true ) ) {
						$title = urlencode( $meta );
					}
					if ( $meta = get_post_meta( $wpex_theme->post_id, '_yoast_wpseo_twitter-description', true ) ) {
						$title = $title .': '. $meta;
						$title = urlencode( $title );
					}
				} ?>

				<li class="share-twitter">
					<a href="http://twitter.com/share?text=<?php echo $title; ?>&amp;url=<?php echo $url; ?>" target="_blank" title="<?php _e( 'Share on Twitter', 'wpex' ); ?>" rel="nofollow" class="<?php echo $tooltip_class; ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
						<span class="fa fa-twitter"></span>
						<span class="social-share-button-text"><?php _e('Tweet','wpex'); ?></span>
					</a>
				</li>

			<?php }
			// Facebook
			elseif ( 'facebook' == $site ) { ?>

				<li class="share-facebook">
					<a href="http://www.facebook.com/share.php?u=<?php echo $url; ?>" target="_blank" title="<?php _e( 'Share on Facebook', 'wpex' ); ?>" rel="nofollow" class="<?php echo $tooltip_class; ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
						<span class="fa fa-facebook"></span>
						<span class="social-share-button-text"><?php _e('Like','wpex'); ?></span>
					</a>
				</li>

			<?php }
			// Google+
			elseif ( 'google_plus' == $site ) { ?>

				<li class="share-googleplus">
					<a href="https://plus.google.com/share?url=<?php echo $url; ?>" title="<?php _e( 'Share on Google+', 'wpex' ); ?>" rel="nofollow" class="<?php echo $tooltip_class; ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
						<span class="fa fa-google-plus"></span>
						<span class="social-share-button-text"><?php _e('Plus one','wpex'); ?></span>
					</a>
				</li>

			<?php }
			// Pinterest
			elseif ( 'pinterest' == $site ) { ?>

				<li class="share-pinterest">
					<a href="https://www.pinterest.com/pin/create/button/?url=<?php echo $url; ?>&amp;media=<?php echo $img; ?>&amp;description=<?php echo $summary; ?>" target="_blank" title="<?php _e( 'Share on Pinterest', 'wpex' ); ?>" rel="nofollow" class="<?php echo $tooltip_class; ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
						<span class="fa fa-pinterest"></span>
						<span class="social-share-button-text"><?php _e('Pin It','wpex'); ?></span>
					</a>
				</li>

			<?php }
			// LinkedIn
			elseif ( 'linkedin' == $site ) { ?>

				<li class="share-linkedin">
					<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $url; ?>&amp;title=<?php echo $title; ?>&amp;summary=<?php echo $summary; ?>&amp;source=<?php echo $source; ?>" title="<?php _e( 'Share on LinkedIn', 'wpex' ); ?>" target="_blank" rel="nofollow" class="<?php echo $tooltip_class; ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
						<span class="fa fa-linkedin"></span>
						<span class="social-share-button-text"><?php _e('Share','wpex'); ?></span>
					</a>
				</li>

			<?php } ?>

		<?php endforeach; ?>

	</ul><!-- .social-share-buttons -->

</div>