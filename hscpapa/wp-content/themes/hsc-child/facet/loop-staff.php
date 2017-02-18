<?php while ( have_posts() ) : the_post(); ?>
<div id="post-list-event" class="wpex-image-hover fade-in">
	<a class="event-link thumb-link" href="<?php the_permalink(); ?>">

		<div class="event-thumb thumb-div">
			<?php if ( has_post_thumbnail() ) {
		the_post_thumbnail('box-cropped');
		} else { ?>
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/default-image.jpg" alt="<?php the_title(); ?>" />
		<?php } ?>

			<div class="wpb_single_image_caption">
				<span class="wpb_heading wpb_singleimage_heading wpb_jobtitle"><?php echo types_render_field("staff-possition");?></span>
				<h2 class="wpb_name"><?php the_title(); ?></h2>
			</div>

		</div>
	</a>
</div>

<?php endwhile; ?>
