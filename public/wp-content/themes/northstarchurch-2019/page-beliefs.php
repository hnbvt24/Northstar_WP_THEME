<?php
	get_header();

	global $post;

	if( have_rows('page_outline') ):
		the_row();
		//Custom Fields
		$header 	= get_sub_field('header', $post->$ID);
		$text 		= get_sub_field('text', $post->ID);
		$quote 		= get_sub_field('quote', $post->ID);
	
	endif;

	while(have_posts()) {
		the_post();?>
			<div class="main-container">
	        	<div class="main-content">
	        		<div class="main-header">
						<h2 class="italic-header"><?php echo $header ?></h2>
					</div>
					<div class="main-content">
			        	<?php echo $text ?>
		        	</div>
	        		<section class="affiliation-images" style="text-align:center;">
        			<?php

		                // check if the repeater field has rows of data
		                if( have_rows('Image_Section') ):

		                    // loop through the rows of data
		                    while ( have_rows('Image_Section') ) : the_row();

		                    // display a sub field value
		                    $image = get_sub_field('image');
		                    
	            	?>
						<img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt']?>">
					<?php
				   		endwhile;

						else :
					?>

						<p style="text-align: center;">no images found</p>

					<?php
						endif;
					?>
	        		</section>
	     		</div>
	        </div>
<?php
	}
	get_footer();

?>