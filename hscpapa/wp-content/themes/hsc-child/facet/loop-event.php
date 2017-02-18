<?php while ( have_posts() ) : the_post(); ?>
<div id="post-list-event" class="wpex-image-hover fade-in">
		<?php

	 if(get_field('event_url'))
	{
		echo '<a class="event-link thumb-link" href="' . get_field('event_url') . '" target="_blank">';
	}
	else
	{
		echo '<a class="event-link thumb-link" href="' . get_post_permalink() . '">';
	}
	?>

		<div class="event-thumb thumb-div">
			<?php if ( has_post_thumbnail() ) {the_post_thumbnail('box-cropped');}
			else { ?>
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/default-image.jpg" alt="<?php the_title(); ?>" />
			<?php } ?>


			<div class="wpb_single_image_caption">
				<span class="wpb_date"><?php
				$date = get_field('date_of_event');
				$time = strtotime("$date");
				echo date('F j, Y', $time);?></span>
				<h2 class="wpb_title"><?php the_title(); ?></h2>
			</div>

		</div>

	</a>

	<div class="clearfix"></div>

</div>

<?php endwhile; ?>
