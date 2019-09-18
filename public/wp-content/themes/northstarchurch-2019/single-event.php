<?php
	
	get_header();

	while(have_posts()) {
		the_post();

        $eventDate = new DateTime(get_field('event_date'));
        $eventTime = new DateTime(get_field('event_time'));
        $eventLocation = get_field('event_location');
?>
			<div class="event-container">
	        	<section class="selectedEvent">
	        		<div class="main-event-details">
	        			<div class="upcoming-header">
	        				<a href="<?php echo get_post_type_archive_link('event'); ?>">Events Home</a>
		        			<h2 class="italic-header"><?php echo the_title(); ?></h2>
		        		</div>
	        			<div class="time-and-place">
	        				
		        			<h4 class="event-time"><?php echo $eventDate->format('l, F jS'); ?> • <?php echo $eventTime->format('g:i A'); ?></h4>
		        			<address>
		        				<?php echo $eventLocation ?>
							</address>
						</div>
	        			<?php  
		        			echo the_content();
		        		?>
	        		</div>
	        		<div class="main-event-social">
	        			<div class="event-social-links">
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank"><img src="<?php echo get_theme_file_uri('images/facebook-logo-orange.png')?>" onmouseover="hover(this,5);" onmouseout="unhover(this,5);" alt="Facebook"></a>
							<a href="http://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank"><img src="<?php echo get_theme_file_uri('images/twitter-logo-orange.png')?>" onmouseover="hover(this,7);" onmouseout="unhover(this,7);" alt="Twitter"></a>
						</div>
	        		</div>
				</section>
				<!-- <div class="prev-events-btn">
	        		<a href="events.html" class="prevBtn"><button class="btn btn-6 btn-6a events-btn">Previous Event</button></a>
	        		<a href="events.html" class="nextBtn"><button class="btn btn-6 btn-6a events-btn">Next Event</button></a>
	        	</div>
	        	<div class="prev-events-btn__small">
	        		<a href="events.html" class="prevBtn"><img src="images/keyboard-prev-arrow-button.png" alt="Previous Events Arrow"></a>
	        		<a href="events.html" class="nextBtn"><img src="images/keyboard-next-arrow-button.png" alt="Previous Events Arrow"></a>
	        	</div> -->
			</div>
	<?php }

get_footer();

?>