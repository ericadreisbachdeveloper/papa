<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="event-results">
	<p><?php
$date = get_field('date_of_event');
$time = strtotime("$date");
echo date('F j, Y', $time); ?></p>
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</div>
<?php endwhile; else : ?>
<?php _e( 'Sorry, no upcoming events.' ); ?>
<!--hide box when no events -->
<script type="text/javascript">
	jQuery( document ).ready(function() {
		jQuery('.sidebar-event').hide();
	});
</script>
<?php endif; ?>
