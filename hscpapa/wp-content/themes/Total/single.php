<?php
/**
 * The Template for displaying all single posts.
 *
 * @package     Total
 * @subpackage  Templates
 * @author      Alexander Clarke
 * @copyright   Copyright (c) 2015, WPExplorer.com
 * @link        http://www.wpexplorer.com
 * @since       1.0.0
 * @version     2.1.0
 */

get_header(); ?>

    <?php
    // Standard post template file
    if ( is_singular( 'post' ) ) : ?>
    
        <?php get_template_part( 'single-standard' ); ?>

    <?php
    /**
     * Third party post type template file
     * You can create a file called single-post_type.php in your child theme and it will use that instead
     */
    else : ?>

        <?php get_template_part( 'single-other' ); ?>

    <?php endif; ?>

<?php get_footer(); ?>