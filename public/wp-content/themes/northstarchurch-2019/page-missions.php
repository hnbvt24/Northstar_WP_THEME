			<?php
				get_header();

				global $post;
		   		if( have_rows('page_outline') ):
					the_row();
			   		//Custom Fields
				    $firstHeader	= get_sub_field( 'first_header', $post->ID );
				    $secondHeader	= get_sub_field( 'second_header', $post->ID );
				    $firstText		= get_sub_field( 'first_section_text', $post->ID );
				    $secondText		= get_sub_field( 'second_section_text', $post->ID );
				    $image 			= get_sub_field( 'main_image', $post->ID );

				endif;

			?>
			<div class="main-container">
	        	<div class="main-header">
	        		<h2 class="italic-header"><?php echo $firstHeader ?></h2>
	        	</div>
	        	<div class="main-content main-team">
	        		<div class="main-text">
		        		<?php echo $firstText ?>
					</div>
		        	<div class="ministry__image content-img">
		        		<img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>">
		        	</div>
		        </div>
	        </div>
	        <div class="main-container">
	        	<div class="main-header">
	        		<h2 class="italic-header"><?php echo $secondHeader ?></h2>
	        	</div>
	        	<div class="main-content">
	        		<div class="main-text">
		        		<?php echo $secondText ?>
					</div>
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