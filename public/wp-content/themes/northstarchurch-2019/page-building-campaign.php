<?php
	get_header();

	global $post;
	
	if( have_rows('building_campaign_page') ):
		the_row();
		//Custom Fields
		$tab1			= get_post_meta( 14, 'tab_1', true );
		$tab2			= get_post_meta( 14, 'tab_2', true );
		$tab3			= get_post_meta( 14, 'tab_3', true );
		$tab4			= get_post_meta( 14, 'tab_4', true );
	    $latestHeader	= get_sub_field('latest_header', $post->ID);
	    $latestNews		= get_sub_field('latest_news', $post->ID);
	    $latestMedia	= get_sub_field('latest_media', $post->ID);
	    $firstHeader 	= get_sub_field('first_header', $post->ID);
		$secondHeader 	= get_sub_field('second_header', $post->ID);
		$thirdHeader 	= get_sub_field('third_header', $post->ID);
		$fourthHeader 	= get_sub_field('fourth_header', $post->ID);
		$firstText	 	= get_sub_field('first_section_text', $post->ID);
		$secondText		= get_sub_field('second_section_text', $post->ID);
		$thirdText	 	= get_sub_field('third_section_text', $post->ID);
		$goalHeader		= get_sub_field('goal_header', $post->ID);
		$goalAmount		= get_sub_field('goal_amount', $post->ID);
		$fourthText	 	= get_sub_field('fourth_section_text', $post->ID);
		$button	 		= get_sub_field('fourth_section_button', $post->ID);
			$link_url		= $button['url'];
			$link_title		= $button['title'];
			$link_target	= $button['target'] ? $button['target'] : '_self';
		$address		= get_sub_field('address', $post->ID);

	endif;

	while(have_posts()) {
		the_post();?>
			<div class="building-campaign-container">
		       <nav class="building-nav">
		       		<ul class="nav-options">
		       			<a href="#history"><?php echo $tab1 ?></a>
		       			<a href="#vision"><?php echo $tab2 ?></a>
		       			<a href="#goal"><?php echo $tab3 ?></a>
		       			<a href="#give"><?php echo $tab4 ?></a>
		       </nav>
	        </div>
	        <div class="main-container">
	        	<div class="main-header">
	        		<h2 class="italic-header"><?php echo $latestHeader ?></h2>
	        	</div>
	        	<div class="main-content">
	        		<?php echo $latestNews ?>
	        		<?php echo $latestMedia ?>
	        	</div>
	        </div>
	        <div class="blue-container" id="history">
	        	<section class="main-container">
		        	<div class="main-header">
		        		<h2 class="italic-header"><?php echo $firstHeader ?></h2>
		        	</div>
		        	<div class="main-content">
		        		<?php echo $firstText ?>
		        	</div>
		        </section>
	        </div>
	        <div class="main-container" id="vision">
	        	<div class="main-header">
	        		<h2 class="italic-header"><?php echo $secondHeader ?></h2>
	        	</div>
	        	<div class="main-content">
		        	<?php echo $secondText ?>
	        		<div class="location">
	        			<address>
	        				<?php echo $address ?>
	        			</address>
				        <?php if( function_exists('photo_gallery') ) { photo_gallery(1); } ?>
		        	</div>
				</div>
	        </div>
	        <div class="blue-container" id="goal">
	        	<section class="main-container">
		        	<div class="main-header">
		        		<h2 class="italic-header"><?php echo $thirdHeader ?></h2>
		        	</div>
			        <div class="main-content">
			        	<?php echo $thirdText ?>
			        </div>
			        <div class="fund-container-text">
			        	<h3 class="italic-header"><?php echo $goalHeader ?></h3>
			        	<span class="fund-count"><?php echo $goalAmount ?></span>
			        </div>
			        <div class="fund-container-bar">
					   <!--[wppb progress=35 option=flat color=blue]-->
					   <!-- This is the PROGRESS WP Bar -->
					   <?php the_content(); ?>
					</div>
				</section>
		    </div>
		    <div class="main-container" id="give">
	        	<div class="main-header">
	        		<h2 class="italic-header"><?php echo $fourthHeader ?></h2>
	        	</div>
	        	<div class="main-content">
	        		<?php echo $fourthText ?>
					<div class="register">
						<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
						<button class="btn btn-6 btn-6a"><?php echo esc_html($link_title); ?></button>
					</a>
					</div>
	        	</div>
	        </div>
	<?php
	}
	get_footer();

?>