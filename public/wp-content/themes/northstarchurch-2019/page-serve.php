        <?php
            get_header();

        ?>
        <div class="main-container">
        	<div class="main-header">
        		<h2 class="italic-header">volunteer <span>teams</span></h2>
        	</div>
        	<div class="main-content main-groups">
            <?php

                // check if the repeater field has rows of data
                if( have_rows('serve_group') ):

                    // loop through the rows of data
                    while ( have_rows('serve_group') ) : the_row();

                    // display a sub field value
                    $name = get_sub_field('name');
                    $description = get_sub_field('description');
                    $image = get_sub_field('image');
                    $link = get_sub_field('volunteer_link');
            ?>
    	        <div class="group">
        			<div class="group-name">
            			<h3><?php echo $name ?></h3>
            		</div>
        			<div class="group-content">
        				<div class="group-text">
            				<?php echo $description ?>
            			</div>
            			<div class="group-links serve-group">
    						<a href="<?php echo $link ?>"><button class="btn btn-6 btn-6a">Volunteer Sign-up</button></a>
    					</div>
    					<div class="group-image">
    						<img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt']?>">
    					</div>
    				</div>
        		</div>
           <?php
                endwhile;

            else :
            ?>

                <p style="text-align: center;">no rows found</p>

            <?php
            endif;

            ?>
    	   </div>
        </div>
    <?php
        get_footer();
    ?>