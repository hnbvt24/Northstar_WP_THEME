<?php
    get_header();
?>
    <div class="events-container">
        <section class="events">
            <div class="upcoming-header">
                <h2 class="italic-header">past <span>events</span></h2>
            </div>
             <div class="list-of-events-main">
                 <?php

                    $today = date('Ymd');
                    $pastEvents = new WP_Query(array(
                        'paged' => get_query_var('paged', 1),
                        'post_type' => 'event',
                        'meta_key' => 'event_date',
                        'orderby' => 'meta_value_num',
                        'order' => 'DESC',
                        'meta_query' => array(
                            array(
                                'key' => 'event_date',
                                'compare' => '<',
                                'value' => $today,
                                'type' => 'numeric'
                            )
                        )
                    ));

                    while($pastEvents->have_posts()) {
                        $pastEvents->the_post(); ?>
                         <div class="event">
                            <div class="event-date">
                                <span class="event-date__day"><?php
                                    $eventDate = new DateTime(get_field('event_date'));
                                    $eventTime = new DateTime(get_field('event_time'));
                                    $eventLocation = get_field('event_location');
                                    echo $eventDate->format('d');
                            ?></span>
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
                                    <h4><?php echo $eventDate->format('l, F jS'); ?> • <?php echo $eventTime->format('g:i A'); ?></h4>
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
                ?>
            </div>
           <div class="pagination">
                <?php
                    echo paginate_links(array(
                        'total' => $pastEvents->max_num_pages
                    ));
                ?>
            </div>
        </section>
    </div>
<?php
    get_footer();
?>