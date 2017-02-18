<?php
/**
 * Custom WordPress password protection form output
 *
 * @package		Total
 * @subpackage	Template Parts
 * @author		Alexander Clarke
 * @copyright	Copyright (c) 2015, WPExplorer.com
 * @link		http://www.wpexplorer.com
 * @since		2.0.0
 * @version		2.1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Get global theme object
$wpex_theme = wpex_global_obj();

// Add label based on post ID
$label = 'pwbox-'.( empty( $wpex_theme->post_id ) ? rand() : $wpex_theme->post_id );

// Main classes
$classes = 'password-protection-box clr';

// Add container for full-screen layout to center it
if ( 'full-screen' == $wpex_theme->post_layout ) {
	$classes .= ' container';
} ?>

<div class="<?php echo esc_attr( $classes ); ?>">
	<form action="<?php echo esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ); ?>" method="post">
		<h2><?php echo __( 'Password Protected', 'wpex' ); ?></h2>
		<p><?php echo __( 'This content is password protected. To view it please enter your password below:', 'wpex' ); ?></p>
		<input name="post_password" id="<?php echo $label; ?>" type="password" size="20" maxlength="20" placeholder="<?php echo __( 'Password', 'wpex' ); ?>" /><input type="submit" name="Submit" value="<?php echo esc_attr__( 'Submit', 'wpex' ); ?>" />
	</form>
</div>