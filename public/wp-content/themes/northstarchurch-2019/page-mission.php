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
			?>
			<div class="main-container">
				<div class="main-header">
					<h2 class="italic-header"><?php echo $header ?></h2>
				</div>
				<div class="main-content">
		        	<?php echo $text ?>
	        	</div>
	        	<div class="slogan-container mission-bottom-slogan">
					<section class="slogan">
			      		<h2 class="sloganExcerpt"><?php echo $quote ?></h2>
				   	</section>
				</div>
			</div>
        	<?php
        		get_footer();
        	?>