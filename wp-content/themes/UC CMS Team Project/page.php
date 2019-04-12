<?php

get_header(); ?>
<!-- site-content -->
    <div class="site-content clearfix">
        </h2>TEST TEST TEST</h2>
            <!-- main column -->
            <div class="main-column">
                <?php if(have_posts()) :
                    while (have_posts()) : the_post();

                    get_template_part('content', 'page');

                    endwhile;

                    else :
                        echo '<p>No Content Found</p>';

                    endif; ?>
            </div> <!-- /main-column -->
    
    <?php get_sidebar(); ?>

    </div> <!-- /site-content -->

<?php get_footer();

?>