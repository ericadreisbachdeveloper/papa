<?php
/**
 * Footer Layout
 *
 * @package     Total
 * @subpackage  Partials/Footer
 * @author      Alexander Clarke
 * @copyright   Copyright (c) 2015, WPExplorer.com
 * @link        http://www.wpexplorer.com
 * @since       1.6.0
 * @version     2.1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Get global object
$wpex_theme = wpex_global_obj(); ?>

<?php wpex_hook_footer_before(); ?>

<?php if ( $wpex_theme->has_footer_widgets ) : ?>

    <footer id="footer" class="site-footer">

        <?php wpex_hook_footer_top(); ?>

        <div id="footer-inner" class="container clr">

            <?php wpex_hook_footer_inner(); // widgets are added via this hook ?>
            
        </div><!-- #footer-widgets -->

        <?php wpex_hook_footer_bottom(); ?>

    </footer><!-- #footer -->

<?php endif; ?>

<?php wpex_hook_footer_after(); ?>