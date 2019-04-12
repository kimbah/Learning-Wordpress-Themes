<?php

get_header();

if(have_posts()) :
    while (have_posts()) : the_post(); ?>

    <article class="post page">

        <h3>** Best Sample of your work here Rachel **</h3>
        <br>
        <br>
        <div class="column-container clearfix"> <!-- column container -->
            
            <div class="title-column"> <!-- title-column -->
                <h4><?php the_title(); ?></h4>
            </div> <!-- title-column -->
            
            <div class="text-column"> <!-- text-column -->
                <?php the_content(); ?>
            </div> <!-- text-column -->
        </div> <!-- column container -->
    </article>

    <?php endwhile;

    else :
        echo '<p>No Content Found</p>';

    endif;

get_footer();

?>