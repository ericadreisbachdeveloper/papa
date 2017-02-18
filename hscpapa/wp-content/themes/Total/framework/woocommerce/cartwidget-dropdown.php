<?php
/**
 * Add Menu Cart to menu
 *
 * @package     Total
 * @subpackage  Framework/WooCommerce
 * @author      Alexander Clarke
 * @copyright   Copyright (c) 2015, WPExplorer.com
 * @link        http://www.wpexplorer.com
 * @since       1.0.0
 * @version     2.1.0
 */

// Hook droodown into theme hooks
add_action( 'wpex_hook_header_inner', 'wpex_cart_widget_dropdown', 40 );
add_action( 'wpex_hook_main_menu_bottom', 'wpex_cart_widget_dropdown' );

function wpex_cart_widget_dropdown() {
    
    // Check to see if we should add the cart dropdown
    if ( ! wpex_get_mod( 'woo_menu_icon', true ) || 'drop-down' != wpex_get_mod( 'woo_menu_icon_style', 'drop-down' ) || is_cart() || is_checkout() ) {
        return;
    }

    // Get global object
    $obj = wpex_global_obj();

    // Should we get the template part?
    $get = false;

    // Get current filter against header style
    if ( 'wpex_hook_header_inner' == current_filter() && 'one' == $obj->header_style ) {
       $get = true;
    }
    if ( 'wpex_hook_main_menu_bottom' == current_filter() && in_array( $obj->header_style, array( 'two', 'three', 'four' ) ) ) {
        $get = true;
    }

    // Globals & vars
    if ( $get ) :

        get_template_part( 'partials/cart/cart', 'dropdown' );

    endif;

}