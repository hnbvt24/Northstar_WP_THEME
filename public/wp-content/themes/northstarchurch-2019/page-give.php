			<?php
				get_header();

				global $post;
	
				if( have_rows('page_outline') ):
					the_row();
					//Custom Fields
					$header 	= get_sub_field('header', $post->$ID);
					$text 		= get_sub_field('text', $post->ID);
				
				endif;

			?>
			<div class="main-container serve-item">
	        	<div class="main-header">
	        		<h2 class="italic-header"><?php echo $header ?></h2>
	        	</div>
	        	<div class="main-content">
	        		<?php echo $text ?>
					<div class="register">
						<?php

			                // check if the repeater field has rows of data
			                if( have_rows('buttons') ):

			                    // loop through the rows of data
			                    while ( have_rows('buttons') ) : the_row();

			                    // display a sub field value
			                    $button 		= get_sub_field('button');
			                    $link_url		= $button['url'];
			                    $link_title		= $button['title'];
			                    $link_target	= $button['target'] ? $button['target'] : '_self';
			                    
	            		?>
						<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
							<button class="btn btn-6 btn-6a"><?php echo esc_html($link_title); ?></button>
						</a>
						<?php
						    endwhile;

						else :
							//No results found
						endif;

						?>
					</div>
	        	</div>
	        </div>
	        <?php
	        	get_footer();
	        ?>