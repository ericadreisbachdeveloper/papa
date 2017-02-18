<?php
/**
 * Single portfolio meta
 *
 * @package    Total
 * @subpackage Partials/Portfolio
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

// Get meta sections
$sections = wpex_portfolio_single_meta_sections();

// Make sure the meta should display
if (
	empty( $sections )
	|| post_password_required()
) {
	return;
} ?>

<ul class="meta clr">

	<?php
	// Loop through meta sections
	foreach ( $sections as $section ) : ?>

		<?php if ( 'date' == $section ) : ?>
			<li class="meta-date"><span class="fa fa-clock-o"></span><span class="updated"><?php echo get_the_date(); ?></span></li>
		<?php endif; ?>

		<?php if ( 'author' == $section ) : ?>
			<li class="meta-author"><span class="fa fa-user"></span><span class="vcard author"><?php the_author_posts_link(); ?></span></li>
		<?php endif; ?>

		<?php if ( 'categories' == $section && $terms = wpex_get_list_post_terms( 'portfolio_category' ) ) : ?>
			<li class="meta-category"><span class="fa fa-folder-o"></span><?php echo $terms; ?></li>
		<?php endif; ?>

		<?php if ( 'comments' == $section && comments_open() && ! post_password_required() ): ?>
			<li class="meta-comments comment-scroll"><span class="fa fa-comment-o"></span><?php comments_popup_link( __( '0 Comments', 'wpex' ), __( '1 Comment',  'wpex' ), __( '% Comments', 'wpex' ), 'comments-link' ); ?></li>
		<?php endif; ?>

	<?php endforeach; ?>

</ul><!-- .meta -->