<?php
/**
 * Page subheading output
 *
 * @package		Total
 * @subpackage	Partials
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

// Get global object
$wpex_theme = wpex_global_obj();

// Get subheading
$subheading = wpex_get_page_subheading( $wpex_theme->post_id );

// If subheading exists display it
if ( $subheading ) : ?>
	<div class="clr page-subheading">
		<?php echo do_shortcode( $subheading ); ?>
	</div>
<?php endif; ?>