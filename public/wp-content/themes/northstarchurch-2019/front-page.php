<?php 
	get_header();

    //Custom Fields
    $serviceTime    = get_post_meta( 148, 'service_time', true );
    $serviceTag     = get_post_meta( 148, 'service_tag', true );
    $today = date('Ymd');
    $homepageEvents = new WP_Query(array(
        'posts_per_page' => 3,
        'post_type' => 'event',
        'meta_key' => 'event_date',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'meta_query' => array(
            array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => $today,
                'type' => 'numeric'
            )
        )
    ));
    $homepageNews = new WP_Query(array(
        'posts_per_page' => 1,
        'post_type' => 'news-post',
        'order' => 'DESC'
    ));
    $homepageBlog = new WP_Query(array(
        'posts_per_page' => 1,
        'post_type' => 'post',
        'order' => 'DESC'
    ));
?>
    <div class="services-container">
        <section class="serviceTimes">
    		<h2 class="serviceExcerpt"><span class="serviceHours"><?php echo $serviceTime ?></span><?php echo $serviceTag ?></h2>
    		<a href="/visit/"><button class="btn btn-6 btn-6b-inverse">Visit a Service</button></a>
    	</section>
    </div>
    <div class="upcoming-container">
    	<section class="upcoming-events" <?php
            if ($homepageEvents->found_posts == 1) {
                ?>
                    style="grid-template-rows: 1fr 1fr 3fr;"
                <?php
            } elseif ($homepageEvents->found_posts == 2) {
                ?>
                    style="grid-template-rows: 1fr 2fr 2fr;"
                <?php
            } elseif ($homepageEvents->found_posts == 0) {
                ?>
                    style="grid-template-rows: 1fr 1fr 3fr;"
                <?php
            } else {
                ?>
                    
                <?php
            }
            ?>
        >
    		<div class="upcoming-header">
    			<h2 class="italic-header">upcoming <span>events</span></h2>
    		</div>
            <div class="list-of-events">
            <?php 
            if ($homepageEvents->found_posts > 0){
                while($homepageEvents->have_posts()) {
                    $homepageEvents->the_post(); 
                    ?>

                <div class="upcoming-event">
                    <div class="event-date">
                        <span class="event-date__day"><?php 
                            $eventDate = new DateTime(get_field('event_date'));
                            echo $eventDate->format('d');
                        ?></span>
                        <span class="event-date__month"><?php 
                            $eventDate = new DateTime(get_field('event_date'));
                            echo $eventDate->format('M');
                        ?></span>
                    </div>
                    <div class="event-summary">
                        <h4 class="event-summary__title"><a href="
                            <?php the_permalink(); ?>">
                            <?php the_title(); ?></a></h4>
                        <p><?php echo wp_trim_words(get_the_content(), 18); ?><a href="<?php the_permalink(); ?>">Read More</a></p>
                    </div>
                </div>

                <?php }
            } else {
                ?>
                    No upcoming events listed
                <?php
            }
            ?>
	        </div>
        	<div class="more-events-btn">
        		<a href="<?php echo get_post_type_archive_link('event'); ?>"><button class="btn btn-6 btn-6a events-btn">View More Events</button></a>
        	</div>
    	</section>
    	<section class="latest-announcements">
            <?php while($homepageNews->have_posts()) {
                    $homepageNews->the_post(); ?>
    		<div class="upcoming-header latest-announcements-header">
    			<h2 class="italic-header">latest <span>announcements</span></h2>
    		</div>
    		<div class="latest-announcement">
    			<h4 class="announcement-summary__title"><a href="<?php 
                the_permalink(); ?>"><?php the_title(); ?></a></h4>
        		<p><?php echo wp_trim_words(get_the_content(), 18); ?></p>
    		</div>
        <?php } ?>
    	</section>
    	<section class="latest-blog">
            <?php while($homepageBlog->have_posts()) {
                    $homepageBlog->the_post(); ?>
    		<div class="blog-post">
    			<h4 class="blog-summary__title"><a href="<?php 
                the_permalink();?>"><?php the_title(); ?></a></h4>
    			<p class="time"><?php the_time('F j - g:i a');?></p>
        		<p class="blog-sum"><?php echo wp_trim_words(get_the_content(), 18); ?></p>
        		<div class="blog-img"><?php the_post_thumbnail();?></div>
    		</div>
        <?php } ?>
    	</section>
    </div>
<?php 
    get_footer();
?>