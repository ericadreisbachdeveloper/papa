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

   <div id="content-wrap-staff-singl" class="clr">

    <?php wpex_hook_primary_before(); ?>

    <div id="primary-staff-single" class="clr">

        <?php wpex_hook_content_before(); ?>

        <main id="content" class="site-content clr" role="main">

            <?php wpex_hook_content_top(); ?>

            <?php while ( have_posts() ) : the_post(); ?>

                <article class="entry entry-content clr">
                    <?php the_content(); ?>
                </article><!-- .entry -->

                <?php
                // Link pages when using <!--nextpage-->
                wp_link_pages( array(
                    'before'        => '<div class="page-links clr">',
                    'after'         => '</div>',
                    'link_before'   => '<span>',
                    'link_after'    => '</span>',
                ) );

                 get_template_part( 'partials/social', 'share' ); // Social sharing links - disabled by default

               ?>

                <?php wpex_hook_content_bottom(); ?>

            <?php endwhile; ?>

        </main><!-- #content -->

        <?php wpex_hook_content_after(); ?>

    </div><!-- #primary -->

</div><!-- .container -->

<?php get_footer(); ?>
