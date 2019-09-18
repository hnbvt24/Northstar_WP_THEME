<div class="footer-container">
		        <footer class="footer">
		        	<div class="footer-logo">
		        		<a href="index.html">NORTHSTAR CHURCH</a>
		        	</div>
		        	<nav class="footer-nav">
		        		 <?php
                            wp_nav_menu(array(
                                'theme_location' => 'footer',
                                'menu_class' => 'nav-columns',
                                'container' => 'ul'
                            ));
                        ?>
		        	</nav>
		        	<div class="return-to-top">
		        		<a id="back-to-top" href="#"><img src="<?php echo get_theme_file_uri('/images/up-arrow.png')?>" onmouseover="this.src='<?php echo get_theme_file_uri('/images/up-arrow-orange.png')?>'" onmouseout="this.src='<?php echo get_theme_file_uri('/images/up-arrow.png')?>'"  alt="Return to top arrow"/></a>
		        	</div>
		        </footer>
		        <div class="bottom-bar-container">
			        <div class="bottom-bar">
		        		<div class="copyright">
		        			&copy;Northstar Church 2019
		        		</div>
		        		<div class="social-media">
		        			<div class="social-links">
								<a href="#"><img src="<?php echo get_theme_file_uri('/images/facebook-logo.png')?>" onmouseover="this.src='<?php echo get_theme_file_uri('/images/facebook-logo-orange.png')?>'" onmouseout="this.src='<?php echo get_theme_file_uri('/images/facebook-logo.png')?>'" alt="Northstar Church Facebook Link"></a>
								<a href="#"><img src="<?php echo get_theme_file_uri('/images/instagram-logo.png')?>" onmouseover="this.src='<?php echo get_theme_file_uri('/images/instagram-logo-orange.png')?>'" onmouseout="this.src='<?php echo get_theme_file_uri('/images/instagram-logo.png')?>'" alt="Northstar Church Instagram Link"></a>
								<a href="#"><img src="<?php echo get_theme_file_uri('/images/twitter-logo.png')?>" onmouseover="this.src='<?php echo get_theme_file_uri('/images/twitter-logo-orange.png')?>'" onmouseout="this.src='<?php echo get_theme_file_uri('/images/twitter-logo.png')?>'" alt="Northstar Church Twitter Link"></a>
							</div>
		        		</div>
		        	</div>
		        </div>
	    	</div>
    	</div>
    	<?php wp_footer(); ?>
    </body>
</html>