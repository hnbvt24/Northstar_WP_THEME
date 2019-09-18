<?php
    get_header();
?>
    <div class="events-container">
        <section class="events">
            <div class="upcoming-header">
                <h2 class="italic-header">upcoming <span>events</span></h2>
            </div>
             <div class="list-of-events-main">
                 <?php
                 if (have_posts()) {
                    while(have_posts()) {
                        the_post(); ?>
                         <div class="event">
                            <div class="event-date">
                                <span class="event-date__day"><?php
                                    $eventDate = new DateTime(get_field('event_date'));
                                    $eventTime = new DateTime(get_field('event_time'));
                                    $eventLocation = get_field('event_location');
                                    echo $eventDate->format('d');
                                ?>
                            </span>
                                <span class="event-date__month"><?php
                                    $eventDate = new DateTime(get_field('event_date'));
                                    echo $eventDate->format('M');
                                ?></span>
                            </div>
                             <div class="event-img">
                                <?php the_post_thumbnail();?>
                            </div>
                            <div class="main-event-summary">
                                <h3 class="event-summary__title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                                <div class="time-and-place">
                                    <h4> <?php echo $eventDate->format('l, F jS'); ?> • <?php echo $eventTime->format('g:i A'); ?></h4>
                                    <address>
                                        <?php echo $eventLocation ?>
                                    </address>
                                </div>
                                <?php the_excerpt();?>
                                <div class="event-read-more">
                                    <a href="<?php the_permalink();?>"><button class="btn btn-6 btn-6a">Event Details</button></a>
                                </div>
                            </div>
                        </div>
                    <?php }
                } else { ?>
                    <div class="event">
                        <div>
                            <span>
                                There are no upcoming events listed as of right now. Check back later for future postings.
                            </span>
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
            <hr>
            <div class="archive">
                Looking for a recap of past events? <a href="<?php echo site_url('/past-events');?>">Check out our past events archive</a>
            </div>
        </section>
    </div>
<?php
    get_footer();
?>