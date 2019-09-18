<?php
	get_header();
	$count = 0;
?>
			<div class="sermons-container">
	        	<section class="sermons">
	        		<div class="upcoming-header">
	        			<h2 class="italic-header">recent <span>sermons</span></h2>
	        		</div>
	        		<div class="list-of-sermons">
	        			<?php 
	        				while(have_posts()) {
							the_post();
							$count += 1;
						?>
		        		<div class="sermon">
		        			<?php $podcast_content = get_the_powerpress_content(); ?>
		        			<h2><?php the_title(); ?></h2>
		        			<div class="sermon-player">
		        				<div class="excerpt-text">
			        				<?php the_excerpt(); ?>
			        			</div>
			        			<div class="audio-player">
			        				<div class="sermon-play-btn" id="sermond_play_btn__<? echo $count ?>">
			        					<img src="<?php echo get_theme_file_uri('images/play-blue.png')?>" onmouseover="this.src='<?php echo get_theme_file_uri('/images/play-orange.png')?>'" onmouseout="this.src='<?php echo get_theme_file_uri('/images/play-blue.png')?>'">
			        				</div>
			        			</div>
			        		</div>
			        		<div class="audio-player-bar" id="audio-player-bar__<? echo $count ?>">
	        					<?php the_powerpress_content(); ?>
	        				</div>
	        			</div>
	        		<?php 
	        			} 
	        		?>
			        </div>
		        	<div class="pagination">
		        		<?php
		                    echo paginate_links();
		                ?>
		        	</div>
	        	</section>
	        </div>
	<?php
	get_footer();
?>