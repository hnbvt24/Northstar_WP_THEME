<?php
	get_header();

	while(have_posts()) {
		the_post();

		//Begin Page Conditional Statement:
		//This determines the layout of the page based
		//on which page we are viewing
		the_content();
		
	}
	get_footer();

?>