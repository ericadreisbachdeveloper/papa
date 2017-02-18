<?php
/**
 * Template for Magnifying Hover overlay style
 *
 * @package    Total
 * @subpackage Partials/Overlays
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

// Only used for inside position
if ( 'inside_link' != $position ) {
	return;
} ?>

<div class="magnifying-hover overlay-hide theme-overlay"><span class="fa fa-search"></span></div>