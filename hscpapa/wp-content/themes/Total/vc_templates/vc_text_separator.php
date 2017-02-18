<?php
extract( shortcode_atts( array(
	'title'             => '',
	'element_type'      => 'div',
	'title_align'       => 'separator_align_center',
	'el_class'          => '',
	'font_size'         => '',
	'font_weight'       => '',
	'style'             => 'one',
	'margin_bottom'     => '',
	'span_background'   => '',
	'span_color'        => '',
	'border_color'      => '',
	'align'             => 'align_center',
	'el_width'          => '',
	'border_width'      => '',
	'color'             => '',
	'accent_color'      => '',
	'layout'            => 'separator_with_text'
), $atts ) );

/*-----------------------------------------------------------------------------------*/
/*  - Modified Seperator With Text
/*  - Would be nice to "un-modify", but will screw up current customers...
/*-----------------------------------------------------------------------------------*/
if ( 'separator_with_text' == $layout ) :

	// Add extra classes
	$el_class = $this->getExtraClass( $el_class );

	// Main Style
	$main_style = vcex_inline_style( array(
		'font_size'     => $font_size,
		'font_weight'   => $font_weight,
		'margin_bottom' => $margin_bottom,
	) );

	// Span Style
	$span_style = vcex_inline_style( array(
		'background'   => $span_background,
		'color'        => $span_color,
		'border_color' => $border_color,
	) );

	// Get css class
	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'vc_text_separator wpb_content_element '.$title_align.$el_class, $this->settings['base'] ); ?>

	<<?php echo $element_type; ?> class="<?php echo $css_class; ?> vc_text_separator_<?php echo $style; ?>" <?php echo $main_style; ?>>
		<span class="vc_text_separator_inner" <?php echo $span_style; ?>><?php echo $title; ?></span>
	</<?php echo $element_type; ?>>

<?php else :

	/*-----------------------------------------------------------------------------------*/
	/*  - Unmodified Seperator with text
	/*  - Currently used for the simply seperator without text only
	/*-----------------------------------------------------------------------------------*/
	$class = "vc_separator wpb_content_element";
	$class .= ($title_align!='') ? ' vc_'.$title_align : '';
	$class .= ($el_width!='') ? ' vc_sep_width_'.$el_width : ' vc_sep_width_100';
	$class .= ($style!='') ? ' vc_sep_'.$style : '';
	$class .= ($border_width!='') ? ' vc_sep_border_width_'.$border_width : '';
	$class .= ($align!='') ? ' vc_sep_pos_'.$align : '';
	$class .= ($layout=='separator_no_text') ? ' vc_separator_no_text' : '';
	if( $color!= '' && 'custom' != $color ) {
		$class .= ' vc_sep_color_' . $color;
	}
	$inline_css = ( 'custom' == $color && $accent_color!='') ? ' style="'.vc_get_css_color('border-color', $accent_color).'"' : '';
	$class .= $this->getExtraClass($el_class);
	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class, $this->settings['base'], $atts );
	?>
	<div class="<?php echo esc_attr(trim($css_class)); ?>">
		<span class="vc_sep_holder vc_sep_holder_l"><span<?php echo $inline_css; ?> class="vc_sep_line"></span></span>
		<?php if($title!=''): ?><h4><?php echo $title; ?></h4><?php endif; ?>
		<span class="vc_sep_holder vc_sep_holder_r"><span<?php echo $inline_css; ?> class="vc_sep_line"></span></span>
	</div><!-- .vc_separator -->

<?php endif; ?>