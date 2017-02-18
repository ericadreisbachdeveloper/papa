<?php
/**
 * Adds classes to the body tag for various page/post layout styles
 *
 * @package     Total
 * @subpackage  Framework
 * @author      Alexander Clarke
 * @copyright   Copyright (c) 2015, WPExplorer.com
 * @link        http://www.wpexplorer.com
 * @since       1.0.0
 * @version     2.1.0
 */

function wpex_body_classes( $classes ) {

    // Get global object
    $obj = wpex_global_obj();
    
    // WPExplorer class
    $classes[] = 'wpex-theme';

    // Responsive
    if ( $obj->responsive ) {
        $classes[] = 'wpex-responsive';
    }

    // Layout Style
    $classes[] = $obj->main_layout .'-main-layout';
    
    // Add skin to body classes
    $classes[] = 'skin-'. $obj->skin;

    // Check if the Visual Composer is being used on this page
    if ( $obj->has_composer ) {
        $classes[] = 'has-composer';
    } else {
        $classes[] = 'no-composer';
    }

    // Boxed Layout dropshadow
    if( 'boxed' == $obj->main_layout && wpex_get_mod( 'boxed_dropdshadow' ) && 'gaps' != $obj->skin ) {
        $classes[] = 'wrap-boxshadow';
    }

    // Content layout
    if ( $obj->post_layout ) {
        $classes[] = 'content-'. $obj->post_layout;
    }

    // Single Post cagegories
    if ( is_singular( 'post' ) ) {
        $cats = get_the_category( $obj->post_id );
        foreach ( $cats as $cat ) {
            $classes[] = 'post-in-category-'. $cat->category_nicename;
        }
    }

    // Breadcrumbs
    if ( $obj->has_breadcrumbs && 'default' == wpex_get_mod( 'breadcrumbs_position', 'default' ) ) {
        $classes[] = 'has-breadcrumbs';
    }

    // Shrink fixed header
    if ( $obj->has_fixed_header && 'one' == $obj->header_style && $obj->shrink_fixed_header ) {
        $classes[] = 'shrink-fixed-header';
    }

    // Topbar
    if ( $obj->has_top_bar ) {
        $classes[] = 'has-topbar';
    }

    // Widget Icons
    if ( wpex_get_mod( 'has_widget_icons', true ) ) {
        $classes[] = 'sidebar-widget-icons';
    }

    // Overlay header style
    if ( $obj->has_overlay_header ) {
        $classes[] = 'has-overlay-header';
    }

    // Footer reveal
    if ( $obj->has_footer_reveal ) {
        $classes[] = 'footer-has-reveal';
    }

    // Slider
    if ( $obj->has_post_slider ) {
        $classes[] = 'page-with-slider';
    }

    // No header margin
    if ( 'on' == get_post_meta( $obj->post_id, 'wpex_disable_header_margin', true ) ) {
        $classes[] = 'no-header-margin';
    }

    // Title with Background Image
    if ( 'background-image' == $obj->page_header_style ) {
        $classes[] = 'page-with-background-title';
    }

    // Disabled header
    if ( ! $obj->has_page_header ) {
        $classes[] = 'page-header-disabled';
    }

    // Page slider
    if ( $obj->has_post_slider && $slider_position = wpex_post_slider_position( $obj->post_id ) ) {
        $classes[] = 'has-post-slider';
        $slider_position = str_replace( '_', '-', $slider_position );
        $classes[] = 'post-slider-'. $slider_position;
    }

    // Font smoothing
    if ( wpex_get_mod( 'enable_font_smoothing' ) ) {
        $classes[] = 'smooth-fonts';
    }

    // Mobile menu style
    if ( 'disabled' == $obj->mobile_menu_style ) {
        $classes[] = 'mobile-menu-disabled';
    } else {
         $classes[] = 'has-mobile-menu';
    }
    
    // Return classes
    return $classes;

}
add_filter( 'body_class', 'wpex_body_classes' );