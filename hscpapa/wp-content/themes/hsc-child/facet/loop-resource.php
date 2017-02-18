<?php while ( have_posts() ) : the_post(); ?>
	<div id="resource_list">
<div class="vc_row wpb_row">
    <div class="clr vc_row-fluid">            
	<div class="vc_col-sm-3 wpb_column clr column_container" style="margin-bottom:0px;">	
	<div class="wpb_text_column wpb_content_element ">
		<div class="wpb_wrapper">
			<?php
            $file_type2 = types_render_field("file-type", array("raw"=>"true"));
			$img = '/wp-content/uploads/2015/06/xml.jpg';
			$img2 = '/wp-content/uploads/2015/06/file.jpg';
			$img3 = '/wp-content/uploads/2015/07/pdf.png.png';
			$img5 = '/wp-content/uploads/2015/07/ppt.png';
			$img6 = '/wp-content/uploads/2015/07/doc.png';
			$img7 = '/wp-content/uploads/2015/07/play.png';
			$img4 = types_render_field("image-other", array("raw"=>"true"));
			$img8 = types_render_field("image-pdf", array("raw"=>"true"));
			 if ($file_type2 == 'pdf') {
					if($img8) {
						$holder = '<img class="aligncenter" src="'.$img8.'" alt="pdf" width="130" height="165" />';
					} else $holder = '<img class="aligncenter" src="'.$img3.'" alt="pdf" width="130" height="165" />';
			 }
			 elseif ($file_type2 == 'csv') {
				 $holder = '<img class="aligncenter" src="'.$img.'" alt="excel file" width="130" height="165" />' ;
			 }
			 elseif ($file_type2 == 'link') {
				 $holder = '<img class="aligncenter" src="'.$img2.'" alt="web link" width="130" height="165" />' ;
			 }
			 elseif ($file_type2 == 'ppt') {
				 $holder = '<img class="aligncenter" src="'.$img5.'" alt="powerpoint file" width="130" height="165" />' ;
			 }
			 elseif ($file_type2 == 'doc') {
				 $holder = '<img class="aligncenter" src="'.$img6.'" alt="Word Document" width="130" height="165" />' ;
			 }
			 elseif ($file_type2 == 'tube') {
				 $holder = '<img class="aligncenter" src="'.$img7.'" alt="Youtube Video" width="130" height="165" />' ;
			 }
			 else {
				 $holder = '<img class="aligncenter" src="'.$img4.'" alt="" width="130" height="165" />' ;
			 }
				echo $holder; 
				echo $img444;
            ?>
		</div> 
	</div> 
	</div> 

	<div class="vc_col-sm-9 wpb_column clr column_container" style="margin-bottom:0px;">		
	<div class="wpb_text_column wpb_content_element ">
		<div class="wpb_wrapper">
			<h4><?php echo get_the_title();?></h4>
            <p class="art-link">
            <?php
			$file_type = types_render_field("file-type", array("raw"=>"true"));
			$link = types_render_field("upload-pdf", array("raw"=>"true"));
			$link2 = types_render_field("upload-excel", array("raw"=>"true"));
			$link3 = types_render_field("web-url", array("raw"=>"true"));
			$link4 = types_render_field("upload-other", array("raw"=>"true"));
			$link5 = types_render_field("upload-ppt", array("raw"=>"true"));
			$link6 = types_render_field("upload-doc", array("raw"=>"true"));
			$link7 = types_render_field("youtube-link", array("raw"=>"true"));
			 if ($file_type == 'pdf') {
				 $message = '<a href="'.$link.'" target="_blank">Download PDF File</a>' ;
			 }
			 elseif ($file_type == 'csv') {
				 $message = '<a href="'.$link2.'"  target="_blank">Download Excel File</a>' ;
			 }
			 elseif ($file_type == 'link') {
				 $message = '<a href="'.$link3.'"  target="_blank">Visit Website</a>' ;
			 }
			  elseif ($file_type == 'ppt') {
				 $message = '<a href="'.$link5.'"  target="_blank">Download PPT File</a>' ;
			 }
			  elseif ($file_type == 'doc') {
				 $message = '<a href="'.$link6.'"  target="_blank">Download Doc File</a>' ;
			 }
			  elseif ($file_type == 'tube') {
				 $message = '<a href="'.$link7.'"  target="_blank">View YouTube Video</a>' ;
			 }
			 else {
				 $message = '<a href="'.$link4.'"  target="_blank">Visit Website</a>' ;
			 }
				echo $message; 
				
            ?>
            </p>
			<p><?php $content = get_the_content();print $content;?></p>
			<p style="font-weight: 600 !important;font-size:16px !important;"><?php echo get_the_term_list( $post->ID, 'hsc-programs', 'Related Programs: ', ', ' ); ?></p>
		</div> 
	</div> 
	</div> 
   </div><!-- .clr vc_row-fluid -->
</div>
</div>
<div class="clearfix"></div>
<?php endwhile; ?>