<?php
    get_header();
?>
            <div class="news-container">
                <section class="news">
                    <div class="upcoming-header">
                        <h2 class="italic-header">recent <span>news posts</span></h2>
                    </div>
                    <div class="list-of-news">
                        <?php
                            while(have_posts()) {
                                the_post(); ?>
                                <div class="news-article">
                                    <div class="news-img">
                                    	<?php the_post_thumbnail();?>
                                    </div>
                                    <div class="news-summary">
                                        <h4 class="news-summary__title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                                        <h5><?php the_time('F j, Y - g:i a');?> in <?php echo get_the_category_list(', '); ?></h5>
                                        <h6><?php the_author_posts_link();?></h6>
                                         <p><?php echo wp_trim_words(get_the_content(), 40); ?></p>
                                        <div class="news-read-more">
                                            <a href="<?php the_permalink();?>"><button class="btn btn-6 btn-6a">Read News Post</button></a>
                                        </div>
                                    </div>
                                </div>
                            <?php }
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