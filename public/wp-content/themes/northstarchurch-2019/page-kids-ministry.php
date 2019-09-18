			<?php
				get_header();

				$firstHeader 	= get_post_meta( 26, 'First_Section_Header', true );
				$secondHeader	= get_post_meta( 26, 'Second_Section_Header', true );
				$thirdHeader	= get_post_meta( 26, 'Third_Section_Header', true );
    			$fourthHeader	= get_post_meta( 26, 'Fourth_Section_Header', true );
				$firstText 		= get_post_meta( 26, 'First_Section_Text', true );
				$secondText 	= get_post_meta( 26, 'Second_Section_Text', true );
				$thirdText 		= get_post_meta( 26, 'Third_Section_Text', true );
				$fourthText 	= get_post_meta( 26, 'Fourth_Section_Text', true );
				$ageGroups 		= get_post_meta( 12, 'age_groups', true );
				$staffImg1		= get_post_meta( 26, 'staff_member_1', true );
				$staffImg2		= get_post_meta( 26, 'staff_member_2', true );
				$registerBtn	= get_post_meta( 26, 'register_btn', true );
				$registerLink	= get_post_meta( 26, 'register_link', true );
			?>
			<div class="main-container">
	        	<div class="main-header">
	        		<h2 class="italic-header"><?php echo $firstHeader ?></h2>
	        	</div>
	        	<div class="main-content">
	        		<div class="main-text">
		        		<?php echo $firstText ?>
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
	        	</div>
	        	<div class="visit-ministry-content__classes main-classes">
	        		<ul class="classes">
	        			<?php echo $ageGroups ?>
	        		</ul>
	        	</div>
	        </div>
	        <div class="main-container">
	        	<div class="main-header">
	        		<h2 class="italic-header"><?php echo $thirdHeader ?></h2>
	        	</div>
	        	<div class="main-content main-team">
	        		<div class="main-text">
		        		<?php echo $thirdText ?>
					</div>
		        	<div class="ministry__image content-img">
		        		<?php echo wp_get_attachment_image( $staffImg1, 'full'); ?>
		        		<?php echo wp_get_attachment_image( $staffImg2, 'full'); ?>
		        	</div>
		        </div>
	        </div>
	        <div class="main-container">
	        	<div class="main-header">
	        		<h2 class="italic-header"><?php echo $fourthHeader ?></h2>
	        	</div>
	        	<div class="main-content">
	        		<div class="main-text">
		        		<?php echo $fourthText ?>
		        	</div>
					<div class="register">
						<a href="<?php echo $registerLink ?>"><button class="btn btn-6 btn-6a"><?php echo $registerBtn ?></button></a>
					</div>
	        	</div>
	        </div>
	        <?php
	        	get_footer();
	        ?>