<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div class="container">
            <?php 
                //Custom Fields
                // $heroImg    = get_post_meta( 148, 'hero_image', true );
                //Feature Image
                $title = get_the_title(get_option('page_for_posts', true));
                $archiveTitle = get_the_archive_title();
                if (!is_page() && !is_singular()){
                    if (get_the_archive_title() != 'Archives'){
                        if ($archiveTitle == 'Archives: Events'){
                            $backgroundImg = wp_get_attachment_image_src(get_post_thumbnail_id(320),'full');
                        } elseif ($archiveTitle == 'Archives: News') {
                            $backgroundImg = wp_get_attachment_image_src(get_post_thumbnail_id(46),'full');
                        } elseif ($archiveTitle == 'Archives: Sermons') {
                            $backgroundImg = wp_get_attachment_image_src(get_post_thumbnail_id(322),'full');
                        }
                       
                    } else {
                        $backgroundImg = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'full');
                    }
                    
                } else {
                    $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
                }
            ?>
            <div class="<?php 
                if (is_singular('post') || is_404() || is_page('leader') || is_singular('news-post') ) {
                        echo 'small-header-container';
                    } else {
                        echo 'header-container';
                    }
            ?> overlay" style="background-image: url('<?php echo $backgroundImg[0]; ?>');">
                <header class="header">
                    <div class="logo">
                        <a href="<?php echo site_url(); ?>"><?php bloginfo(); ?></a>
                    </div>
                    <label class="hamburger hamburger--squeeze" aria-label="Open navigation menu" for="menu-toggle">
                      <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                      </span>
                    </label>
                    <input type="checkbox" id="menu-toggle" />
                    <nav class="nav">
                        <?php
                            wp_nav_menu(array(
                                'theme_location' => 'primary',
                                'menu_class' => 'sub-menu',
                                'container' => 'ul',
                                'container_id' => 'navigation',
                            ));
                        ?>
                    </nav>
                <?php 
                    if (!is_front_page() && !is_page('home') && !is_single()){
                ?>
                    <section class="header-text">
                        <h1>
                        <?php 
                            if (is_page()) {
                                echo get_the_title();
                            } elseif (is_404()){
                                 echo 'Page not found';
                            } else {
                                if (get_the_archive_title() != 'Archives') {
                                    post_type_archive_title();
                                } else {
                                    echo $title;
                                }
                            }
                        ?>
                        </h1>
                    </section>
                <?php 
                    } elseif (!is_page('home')) {
                ?>
                        <section class="callToAction">
                        </section>
                <?php
                    } else {
                ?>
                    <section class="callToAction">
                        <h2><?php echo get_option('top_description'); ?></h2>
                        <span><?php echo get_option('bottom_description'); ?></span>
                        <p><?php echo get_option('excerpt_description'); ?></p>
                        <a href="/visit/"><button class="btn btn-6 btn-6b">Visit Us</button></a>
                    </section>
                <?php 
                    }
                ?>
                </header>
            </div>