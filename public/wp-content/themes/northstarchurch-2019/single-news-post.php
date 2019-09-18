<?php
	
	get_header();

	while(have_posts()) {
		the_post();

		$theParent = wp_get_post_parent_id(get_the_ID());

		if ($theParent) {
			echo get_permalink($theParent);
			echo get_the_title($theParent);
		}
?>
			<div class="news-container">
	        	<section class="post">
		        	<h3><a href="<?php echo site_url('/news');?>">News Home</a> / <?php echo the_title(); ?></h3>
		        	<div class="blog-post-info">
		        		<div>
			        		<h2><?php echo the_title(); ?></h2>
			        		<h3><?php the_time('F j, Y - g:i a');?> in <?php echo get_the_category_list(', '); ?></h3>
			        	</div>
		        		<img src="<?php echo get_avatar_url(get_the_author_meta( 'user_email' )); ?>" alt="Author Image">
		        	</div>
		        	<?php  
		        		echo the_content();
		        	?>
				</section>
				<section class="comments">
					<div class="response">
						<h3>
							<?php echo do_shortcode('[DISPLAY_ULTIMATE_SOCIAL_ICONS]'); ?>
						</h3>
					</div>
				<!-- This is a later feature we can implement
					<h4>Leave a Comment:</h4>
					<textarea placeholder="Bacon ipsum dolor amet jerky andouille">
					</textarea>
					<a href="blog-post.html"><button class="btn btn-6 btn-6a">Submit</button></a>
				-->
				</section>
				<section class="returnHome">
					<a href="<?php echo site_url('/news');?>">Return to News Posts</a>
				</section>
			</div>
	<?php }

get_footer();

?>