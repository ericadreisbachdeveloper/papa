<div class="white-posted-in shadow">
<h3 style="margin-top:0px;">Posted In </h3>
Topics: <?php 
$categories = get_the_category($queried_object);
$separator = ', ';
$output = '';
if ( ! empty( $categories ) ) {
    foreach( $categories as $category ) {
        $output .= '<a href="/blog/?fwp_category=' . $category->slug . '" alt="' . '">' . esc_html( $category->name ) . '</a>' . $separator;
    }
    echo trim( $output, $separator );
} ?>
<br /><br />
Related Programs: <?php 
$terms = get_the_terms( $queried_object, 'hsc-programs' );						
$separator = ', ';
$output = '';
if ( $terms && ! is_wp_error( $terms ) ) : 
	foreach($terms as $term) {
    	$output .= '<a href="/blog/?fwp_hsc_programs=' . $term->slug . '" alt="' . '">' . esc_html( $term->name ) . '</a>' . $separator;
    }
    echo trim( $output, $separator );
?>
<?php endif; ?>
<br /><br />
Tags:  <?php 
$posttags = get_the_tags($queried_object);
$separator = ', ';
$output = '';
if ($posttags) {
	foreach($posttags as $tag) {
    	$output .= '<a href="/blog/?fwp_tags=' . $tag->slug . '" alt="' . '">' . esc_html( $tag->name ) . '</a>' . $separator;
    }
    echo trim( $output, $separator );
} ?>
</div>

