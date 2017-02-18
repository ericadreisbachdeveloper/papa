<?php
global $post;
get_post( $post )->post_name;
$page_slug = $post->post_name;
get_post( $post )->post_title;
$page_title = $post->post_title;
include( get_stylesheet_directory() . '/facet/loop-upcoming.php' );
?><br /><br />
<div class="wpb_text_column wpb_content_element ">
<div class="wpb_wrapper">
<p><a href="/events/?fwp_hsc_programs=<?php echo $page_slug; ?>">See All <?php echo $page_title; ?> Events</a></p>
</div>
</div>
