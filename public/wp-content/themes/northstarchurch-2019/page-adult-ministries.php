			<?php 
				get_header();

				$firstHeader 	= get_post_meta( 32, 'First_Section_Header', true );
				$secondHeader	= get_post_meta( 32, 'Second_Section_Header', true );
				$firstText 		= get_post_meta( 32, 'First_Section_Text', true );
				$secondText 	= get_post_meta( 32, 'Second_Section_Text', true );

				$group 	= get_field('group_type');
			?>
			<div class="main-container">
	        	<div class="main-header">
	        		<h2 class="italic-header"><?php echo $firstHeader ?></h2>
	        	</div>
	        	<div class="main-content">
	        		<?php echo $firstText ?>
	        	</div>
	        </div>
	        <div class="main-container">
	        	<div class="main-header">
	        		<h2 class="italic-header"><?php echo $secondHeader ?></h2>
	        	</div>
	        	<div class="main-content main-groups">

	        	<?php

					// check if the repeater field has rows of data
					if( have_rows('group_type') ):

					 	// loop through the rows of data
					    while ( have_rows('group_type') ) : the_row();

					        // display a sub field value
					        $name = get_sub_field('name');
					        $description = get_sub_field('description');
					        $image = get_sub_field('image');
					        $sgLink = get_sub_field('small_group_link');
					        $nLink = get_sub_field('newsletter_link');
					?>
					<div class="group">
	        			<div class="group-name">
		        			<h3><?php echo $name ?></h3>
		        		</div>
	        			<div class="group-content">
	        				<div class="group-text">
		        				<?php echo $description ?>
		        			</div>
		        			<div class="group-links">
		        				<div class="group-link">
									<a href="<?php echo $sgLink ?>"><button class="btn btn-6 btn-6a">Small Groups</button></a>
								</div>
								<div class="group-link adult-group">
									<a href="<?php echo $nLink ?>"><button class="btn btn-6 btn-6a">Newsletter Sign-up</button></a>
								</div>
							</div>
							<div class="group-image">
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
							</div>
						</div>
	        		</div>
					<?php
					    endwhile;

					else :
					?>

						<p style="text-align: center;">no rows found</p>

					<?php
					endif;

					?>
				</div>
	        </div>
	        <?php
	        	get_footer();
	        ?>