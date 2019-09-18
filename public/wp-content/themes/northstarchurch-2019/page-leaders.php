<?php
	get_header();

	while(have_posts()) {
		the_post();?>
			<div class="main-container leader-container">
	        	<div class="main-header">
	        		<h2 class="italic-header">meet our <span>leaders</span></h2>
	        	</div>
	        	<div class="main-content">
	        	<?php
	        		the_content();
	        	?>
	        	</div>
	        	<div class="leadership-board-container">
		        	<div class="main-content leadership-board">
		        		<?php
		        			$board = get_field(strval('leadership_board'));
	                        $name = $board['name'];
	                        $description = $board['description'];
	                        $image = $board['image'];
	                    ?>
	        			<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
	        			<h4><?php echo $name; ?></h4>
	        			<h5><?php echo $description; ?></h5>
	        		</div>
	        	</div>
	        </div>
	<?php
	}
	get_footer();

?>