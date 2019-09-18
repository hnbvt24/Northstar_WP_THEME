<?php
    get_header();
?>
        <div class="main-container serve-item">
           <?php 
                $id = 849;
                $post = get_post($id); 
                $content = apply_filters('the_content', $post->post_content); 
                echo $content;  
            ?>
        </div>
<?php
    get_footer();
?>