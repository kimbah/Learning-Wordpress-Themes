<?php

get_header(); ?>
<!-- site-content -->
    <div class="site-content clearfix">

        <?php if(have_posts()) :
            while (have_posts()) : the_post();

            the_content();

            endwhile;

            else :
                echo '<p>No Content Found</p>';

            endif; ?>

            <!-- home-columns -->
            <div class="home-columns clearfix">
                <!-- one-half -->
                <div class="one-half">

                    <h2>Latest Opinions</h2>
                    
                    <?php // Opinion posts loop begins here
                    $opinionPosts = new WP_Query('cat=9&posts_per_page=2&orderby=title&order=ASC');

                    if($opinionPosts->have_posts()) :
                        while($opinionPosts->have_posts()) : $opinionPosts->the_post(); ?>
                            <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                            <?php the_excerpt(); ?>
                    <?php endwhile;

                    else :
                        // fallback no content message here
                    
                    endif;
                    wp_reset_postdata();
                    ?>
                </div> <!-- one-half -->

                <!-- one-half -->
                <div class="one-half last">

                    <h2>Latest News</h2>
                    
                    <?php // News posts loop begins here
                    $newsPosts = new WP_Query('cat=10&posts_per_page=2&orderby=title&order=ASC');

                    if($newsPosts->have_posts()) :
                        while($newsPosts->have_posts()) : $newsPosts->the_post(); ?>
                            <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                            <?php the_excerpt(); ?>
                    <?php endwhile;

                    else :
                        // fallback no content message here
                    
                    endif;
                    wp_reset_postdata();
                    ?>
                </div> <!-- one-half  last-->
            </div> <!-- home-columns -->

            

            

    </div> <!-- /site-content -->

<?php get_footer();

?>