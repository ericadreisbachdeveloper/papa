<?php
/**
 * Outputs the testimonial entry content
 *
 * @package    Total
 * @subpackage Partials/Testimonials
 * @author     Alexander Clarke
 * @copyright  Copyright (c) 2015, WPExplorer.com
 * @link       http://www.wpexplorer.com
 * @since      1.6.0
 * @version    2.1.3
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<div class="testimonial-entry-content clr">

	<span class="testimonial-caret"></span>

	<?php if ( wpex_get_mod( 'testimonial_entry_title', false ) ) : ?>
		<h2 class="testimonial-entry-title entry-title clr">
			<?php the_title(); ?>
		</h2><!-- .testimonial-entry-title -->
	<?php endif; ?>

	<?php the_content(); ?>

</div><!-- .home-testimonial-entry-content-->