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
<style>
/*
#think-wrap {max-width:1300px; width:100%; margin: 0 auto; margin-bottom: 40px;}
@media only screen and (max-width: 1400px) {
.event_header_img {padding-left: 3%;}
}
@media only screen and (max-width: 1024px) {
	 body.single-hsc-event .content-area {width: 62% !important;}
	 .event-white-box {margin-top: 100px;}
	 .event_header_img {padding-left: 10px !important;}
}
@media only screen and (max-width: 900px) {
	 body.single-hsc-event .content-area {width: 100% !important;}
	 #sidebar {width: 100%; float: none; max-width:430px;}
 }
 @media only screen and (max-width: 420px) {
	 .event-white-box {margin-top: 0px;}
	 .event_header_img {padding-left: 6%; padding-right: 6%;}
 } */

</style>


	<div class="stretch_row header-image" style="background-image: url(<?php the_field('header_background'); ?>); background-color: #86c9a6; padding: 20px 0;">

		<div id="content-wrap" class="header-image clr container">
		<header class="single-blog-header clr bannertext wpb_column">
			<div class="header-box event-white-box shadow">
				<div class="wpb_wrapper">
						<?php get_template_part( 'partials/blog/blog-single', 'title' ); ?>
						<p><?php
										$date = get_field('date_of_event');
										$time = strtotime("$date");
										echo date('F j, Y', $time);?>
						</p>
						<p style="margin-bottom:0px;"><?php the_field('text_area'); ?></p>
						<?php
							if(get_field('map_link'))
							{
								echo '<p><a class="event-map" href="' . get_field('map_link') . '">Map</a></p>';
							}
							?>
					</div>
			</div>
		</header>
	</div>
	</div>

   <div id="content-wrap" class="container clr blog-head event-single-content-wrap">

    <?php wpex_hook_primary_before(); ?>

    <div id="primary" class="content-area clr">

        <?php wpex_hook_content_before(); ?>

        <main id="content" class="site-content clr" role="main">

            <?php wpex_hook_content_top(); ?>

            <?php while ( have_posts() ) : the_post(); ?>

                <article class="single-blog-article clr">
					<div class="entry clr">
						<?php the_content(); ?>
					</div><!-- .entry -->
					<?php get_template_part( 'partials/social', 'share' ); ?>
					<?php comments_template(); ?>
                </article><!-- .entry -->

            <?php endwhile; ?>

            <?php wpex_hook_content_bottom(); ?>

        </main><!-- #content -->

        <?php wpex_hook_content_after(); ?>

    </div><!-- #primary -->

	 <aside id="sidebar" class="sidebar-container sidebar-primary" role="complementary">

	<?php wpex_hook_sidebar_top(); ?>

	<div id="sidebar-inner" class="clr">

		<?php dynamic_sidebar( 'events' ); ?>

	</div><!-- #sidebar-inner -->

	<?php wpex_hook_sidebar_bottom(); ?>

</aside><!-- #sidebar -->

</div><!-- .container -->

<?php get_footer(); ?>
