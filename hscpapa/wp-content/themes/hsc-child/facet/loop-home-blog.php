<?php while ( have_posts() ) : the_post(); ?>
<div id="post-list-event" class="wpex-image-hover fade-in">
	<a class="event-link" href="<?php the_permalink(); ?>">
		<div class="event-thumb">
			<?php if ( has_post_thumbnail() ) { the_post_thumbnail('box-cropped'); } else { ?>
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/default-image.jpg" alt="<?php the_title(); ?>" />
		<?php } ?>
			</div>
		<div class="wpb_single_image_caption">
			<span class="wpb_heading wpb_singleimage_heading">BLOG</span>
			<h2 class="wpb_title"><?php the_title(); ?></h2>
		</div>
	</a>

</div>

<div class="clearfix"></div>
<?php endwhile; ?>
