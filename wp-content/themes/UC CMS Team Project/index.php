<?php

get_header(); ?>
    <div class="site-content clearfix"> <!-- site-content -->

            <div class="main-column"> <!-- main-column -->
                <?php if(have_posts()) :
                    while (have_posts()) : the_post();
                    get_template_part('content', get_post_format());
                    endwhile;

                    echo paginate_links();

                else :
                    echo '<p>No Content Found</p>';
                endif; ?>
            </div> <!-- /main-column -->
    
    <?php get_sidebar(); ?>

    </div> <!-- /site-content -->

<?php get_footer(); ?>