<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * IMPORTANT :  There isn't any need to modify this template file, most edits can't be done via hooks
 *              and filters or the partial template parts at partials/footer/.
 *
 * @package     Total
 * @subpackage  Templates
 * @author      Alexander Clarke
 * @copyright   Copyright (c) 2015, WPExplorer.com
 * @link        http://www.wpexplorer.com
 * @since       Total 1.0.0
 * @version     2.0.0
 */ ?>

            <?php wpex_hook_main_bottom(); ?>

        </div><!-- #main-content --><?php // main-content opens in header.php ?>

        <?php wpex_hook_main_after(); ?>

        <?php wpex_hook_wrap_bottom(); ?>

    </div><!-- #wrap -->

    <?php wpex_hook_wrap_after(); ?>

</div><!-- .outer-wrap -->

<?php wpex_outer_wrap_after(); ?>

<?php wp_footer(); ?>

<script type="text/javascript">
	jQuery( document ).ready(function() {
	    jQuery('.blogitems .vcex-blog-entry-details').prepend('<span class="title">Blog</span>');
      jQuery('.eventitems .vcex-post-type-entry-details').prepend('<span class="title">Event</span>');
	});
</script>
<script type="text/javascript">
jQuery( document ).ready(function() {
    jQuery('#Installment').removeAttr('checked');
});
</script>


<?php if(is_front_page()) : ?>
<script type="text/javascript">

  jQuery(document).ready(function() {
    var windoww = jQuery(window).width();
    if(windoww < 768) {
      var w = jQuery('.vc_single_image-wrapper').width();
      jQuery('.vc_single_image-wrapper').each(function(){
        jQuery(this).children('a').height(w);
        jQuery(this).children('a').children('img').height(w);
      });
    }
  });

  jQuery(window).resize(function() {
    var windoww = jQuery(window).width();
    if(windoww < 768) {
      var w = jQuery('.vc_single_image-wrapper').width();
      jQuery('.vc_single_image-wrapper').each(function(){
        jQuery(this).children('a').height(w);
        jQuery(this).children('a').children('img').height(w);
      });
    }
    else {
      jQuery('.vc_single_image-wrapper').each(function(){
        jQuery(this).children('a').height('auto');
        jQuery(this).children('a').children('img').height('auto');
      });
    }
  });

</script>
<?php endif; ?>



<script type="text/javascript">
  /*

  jQuery(document).ready(function(){
    if (  ) {
      var w = jQuery('.wpex-image-hover').width();
      jQuery('.wpex-image-hover').each(function(){
        jQuery(this).height(w);
      });
    }
  });

  jQuery(window).resize(function(){
    if (  ) {
      console.log('yes it exists')
      var w = jQuery('.wpex-image-hover').width();
      jQuery('.wpex-image-hover').each(function(){
        jQuery(this).height(w);
      });
    }
  });

  */

</script>



</body>
</html>
