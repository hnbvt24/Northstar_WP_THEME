<?php
	get_header();

	global $post;
	
	if( have_rows('visit_page') ):
		the_row();
		//Custom Fields
		$quote			= get_sub_field('main_quote', $post->$ID);
		$firstHeader 	= get_sub_field('first_header', $post->ID);
		$secondHeader 	= get_sub_field('second_header', $post->ID);
		$thirdHeader 	= get_sub_field('third_header', $post->ID);
		$fourthHeader 	= get_sub_field('fourth_header', $post->ID);
		$firstText	 	= get_sub_field('first_section_text', $post->ID);
		$thirdText	 	= get_sub_field('third_section_text', $post->ID);
		$fourthText	 	= get_sub_field('fourth_section_text', $post->ID);
		$thirdImg	 	= get_sub_field('third_section_image', $post->ID);
		$fourthImg 		= get_sub_field('fourth_section_image', $post->ID);
		$locationHeader	= get_sub_field('location_header', $post->ID);
		$address		= get_sub_field('address', $post->ID);
		$map			= get_sub_field('map', $post->ID);
		$locationLink	= get_sub_field('location_link', $post->ID);
		$serviceHeader	= get_sub_field('service_header', $post->ID);
		$serviceTimes	= get_sub_field('service_times', $post->ID);
		$ageGroups		= get_sub_field('age_groups', $post->ID);
	
	endif;

	while(have_posts()) {
		the_post();?>
			<div class="slogan-container blue-container">
		        <section class="slogan">
	        		<h2 class="sloganExcerpt"><?php echo $quote ?></h2>
	        	</section>
	        </div>
	        <div class="main-container">
	        	<div class="main-header">
	        		<h2 class="italic-header"><?php echo $firstHeader ?></h2>
	        	</div>
	        	<div class="main-content">
	        		<?php echo $firstText ?>
	        	</div>
	        </div>
	        <div class="contact-container blue-container">
	        	<section class="contact">
		        	<div class="main-header">
		        		<h2 class="italic-header"><?php echo $secondHeader ?></h2>
		        	</div>
	        		<div class="location content-img">
	        			<?php echo $locationHeader ?>
	        			<address>
	        				<?php echo $address ?>
	        			</address>
	        			<?php echo $map ?>
	        		</div>
	        		<div class="service">
	        			<?php echo $serviceHeader ?>
	        			<h2 class="serviceTime">
	        				<?php echo $serviceTimes ?>
	        			</h2>
	        			<div class="bottom-btn">
	        				<?php
	        					//link information
	        					$link 		= get_sub_field('location_link');
			                    $link_url		= $link['url'];
			                    $link_title		= $link['title'];
			                    $link_target	= $link['target'] ? $link['target'] : '_self';
	        				?>
	        				<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><button class="btn btn-6 btn-6b directions-btn"><?php echo esc_html($link_title); ?></button></a>
	        			</div>
	        		</div>
	       		</section>
	        </div>
	        <div class="main-container visit-container">
	        	<div class="main-header">
	        		<h2 class="italic-header"><?php echo $thirdHeader ?></h2>
	        	</div>
		        <div class="main-content">
		        	<?php echo $thirdText ?>
		        </div>
		        <div class="visit-ministry-content">
		        	<div class="visit-ministry-content__classes">
		        		<ul class="classes">
		        			<?php echo $ageGroups ?>
		        		</ul>
		        	</div>
		        	<div class="visit-ministry-content__image content-img">
		        		<img src="<?php echo $thirdImg['url'] ?>" alt="<?php echo $thirdImg['alt'] ?>">
		        	</div>
		        </div>
		    </div>
		     <div class="blue-container">
		     	<section class="music main-container">
		        	<div class="main-header">
		        		<h2 class="italic-header"><?php echo $fourthHeader ?></h2>
		        	</div>
			        <div class="main-content">
			        	<?php echo $fourthText ?>
			        </div>
			        <div class="worship-img">
		        		<img src="<?php echo $fourthImg['url'] ?>" alt="<?php echo $fourthImg['alt'] ?>">
		        	</div>
		        </section>
		    </div>
	<?php
		    }
	get_footer();

?>