<?php
	get_header();

	global $post;
	
	if( have_rows('top_section') ):
		the_row();
		//Custom Fields
		$header 	= get_sub_field('header', $post->$ID);
		$text 		= get_sub_field('text', $post->ID);
	
	endif;

	while(have_posts()) {
		the_post();?>
			<div class="main-container">
	        	<div class="main-header">
	        		<h2 class="italic-header"><?php echo $header ?></h2>
	        	</div>
	        	<div class="main-content">
	        		<?php echo $text ?>
	        	</div>
	        </div>
	        <div class="main-container">
	        	<div class="main-header">
	        		<h2 class="italic-header">our <span>small groups</span></h2>
	        	</div>
	        	<div class="main-content main-groups">
	        	<?php

	                // check if the repeater field has rows of data
	                if( have_rows('small_group') ):

	                    // loop through the rows of data
	                    while ( have_rows('small_group') ) : the_row();

	                    // display a sub field value
	                    $leader = get_sub_field('leader');
	                    $type = get_sub_field('type');
	                    $area = get_sub_field('area');
	                    $day = get_sub_field('day');
	                    $time = get_sub_field('time');
	                    $image = get_sub_field('image');
	                    $email = get_sub_field('email');
	                    $childcare = get_sub_field('childcare');
	                    $description = get_sub_field('description');
            	?>
	        		<div class="group">
	        			<div class="group-name">
		        			<h3><?php echo $type ?> - <?php echo $leader ?></h3>
		        		</div>
	        			<div class="group-content">
	        				<div class="group-text">
			        			<?php echo $day ?> <?php echo $time ?>
			        			<address><?php echo $area ?></address>
			        			Childcare provided: <?php echo $childcare ?>
		        			</div>
		        			<div class="group-description">
		        				<?php echo $description ?>
		        			</div>
		        			<div class="group-links small-group">
								<a href="<?php echo 'mailto:' . $email ?>"><button class="btn btn-6 btn-6a">Contact Leader</button></a>
							</div>
							<div class="group-image">
								<img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt']?>">
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
	}
	get_footer();

?>