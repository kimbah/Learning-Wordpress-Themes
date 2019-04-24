<?php

get_header();



if(have_posts()) :
    while (have_posts()) : the_post(); ?>

    <section>
        <p>Add locations page code to this container in page-locations-2.php - use css/uccms.css for styles</p>
    </section>

    <article class="post page">

        <div class="column-container clearfix"> <!-- column container -->

            <div class="text-column"> <!-- text-column -->
                <?php the_content(); ?>
            </div> <!-- /text-column -->

        </div> <!-- /column container -->

    </article>

    <?php endwhile;

    else :
        echo '<p>No Content Found</p>';

    endif;

get_footer();

?>

<div class="container">
            <?php 
                if(comments_open()):
                    comments_template();
                endif;
            
            ?>
</div>