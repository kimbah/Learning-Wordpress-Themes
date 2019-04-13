<?php

get_header();

if(have_posts()) :
    while (have_posts()) : the_post(); ?>

    <article class="post page">

        <h3>** Best Sample of your work here Rachel **</h3>
        <br>
        <div class="column-container clearfix"> <!-- column container -->
            
            <div class="title-column"> <!-- title-column -->
                <h2><?php the_title(); ?></h2>
            </div> <!-- /title-column -->
            
            <div class="text-column"> <!-- text-column -->
                <?php the_content(); ?>

                <button id="portfolio-posts-btn">Load portfolio related blog posts</button>
                <div id="portfolio-posts-container"></div>
            </div> <!-- /text-column -->

        </div> <!-- /column container -->

    </article>

    <?php endwhile;

    else :
        echo '<p>No Content Found</p>';

    endif;

get_footer();

?>