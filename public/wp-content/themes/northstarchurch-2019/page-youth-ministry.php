			<?php
				get_header();

				$firstHeader 	= get_post_meta( 28, 'First_Section_Header', true );
				$secondHeader	= get_post_meta( 28, 'Second_Section_Header', true );
				$thirdHeader	= get_post_meta( 28, 'Third_Section_Header', true );
    			$fourthHeader	= get_post_meta( 28, 'Fourth_Section_Header', true );
				$firstText 		= get_post_meta( 28, 'First_Section_Text', true );
				$secondText 	= get_post_meta( 28, 'Second_Section_Text', true );
				$thirdText 		= get_post_meta( 28, 'Third_Section_Text', true );
				$fourthText 	= get_post_meta( 28, 'Fourth_Section_Text', true );
				$staffImg1		= get_post_meta( 28, 'staff_member_1', true );
				$staffImg2		= get_post_meta( 28, 'staff_member_2', true );
				$newsBtn		= get_post_meta( 28, 'news_btn', true );
				$newsLink		= get_post_meta( 28, 'news_link', true );
				$registerBtn	= get_post_meta( 28, 'register_btn', true );
				$registerLink	= get_post_meta( 28, 'register_link', true );
				$fbLink			= get_post_meta( 28, 'fb_link', true);
				$instaLink		= get_post_meta( 28, 'insta_link', true);
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
	        	<div class="main-content main-team">
	        		<div class="main-text">
		        		<?php echo $secondText ?>
					</div>
		        	<div class="ministry__image content-img">
		        		<?php echo wp_get_attachment_image( $staffImg1, 'full'); ?>
		        		<?php echo wp_get_attachment_image( $staffImg2, 'full'); ?>
		        	</div>
		        </div>
	        </div>
	        <div class="main-container">
	        	<div class="main-header">
	        		<h2 class="italic-header"><?php echo $thirdHeader ?></h2>
	        	</div>
	        	<div class="main-content">
	        		<?php echo $thirdText ?>
	        		<div class="ministry__social-media">
						<a href="<?php echo $fbLink ?>" target="_blank"><img src="<?php echo get_theme_file_uri('images/facebook-logo-blue.png')?>" onmouseover="hover(this,5);" onmouseout="unhover(this,5);" alt="Facebook"></a>
						<a href="<?php echo $instaLink ?>" target="_blank"><img src="<?php echo get_theme_file_uri('images/instagram-logo-blue.png')?>" onmouseover="hover(this,6);" onmouseout="unhover(this,6);" alt="Instagram"></a>
	        		</div>
					<div class="register">
						<a href="<?php echo $newsLink ?>"><button class="btn btn-6 btn-6a"><?php echo $newsBtn ?></button></a>
					</div>
	        	</div>
	        </div>
	        <div class="main-container">
	        	<div class="main-header">
	        		<h2 class="italic-header"><?php echo $fourthHeader ?></h2>
	        	</div>
	        	<div class="main-content">
	        		<?php echo $fourthText ?>
					<div class="register">
						<a href="<?php echo $registerLink ?>"><button class="btn btn-6 btn-6a"><?php echo $registerBtn ?></button></a>
					</div>
	        	</div>
	        </div>
	        <?php
	        	get_footer();
	        ?>