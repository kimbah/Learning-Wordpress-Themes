<?php get_header(); ?>


    <article class="post page">
        
        <div class="row">
      
        </div>
            </article>

    <div class="container">
            <?php 
                if(comments_open()):
                    comments_template();
                endif;
            
            ?>
    </div>

<?php get_footer(); ?>