<?php
/**
 * Topbar layout
 *
 * @package		Total
 * @subpackage	Partials/Topbar
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

// Classes
$classes = 'clr';
if ( $visibility = wpex_get_mod( 'top_bar_visibility' ) ) {
	$classes .= ' '. $visibility;
} ?>

<?php wpex_hook_topbar_before(); ?>

	<div id="top-bar-wrap" class="<?php echo $classes; ?>">

		<div id="top-bar" class="clr container">

			<?php
			// Get content
			get_template_part( 'partials/topbar/topbar-content' ); ?>
			
			<?php
			// Get social
			if ( wpex_get_mod( 'top_bar_social', true ) )  {
				get_template_part( 'partials/topbar/topbar-social' );
			} ?>

		</div><!-- #top-bar -->

	</div><!-- #top-bar-wrap -->

<?php wpex_hook_topbar_after(); ?>