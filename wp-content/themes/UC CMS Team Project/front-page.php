<?php

get_header(); ?>

    <div class="site-content clearfix"> <!-- site-content -->

    <h2>** Custom Home Page Content Goes Here Rachel **</h2>

        <?php if(have_posts()) :
            while (have_posts()) : the_post();

            the_content();

            endwhile;

            else :
                echo '<p>No Content Found</p>';

            endif; ?>

            
            <div class="home-columns clearfix"> <!-- home-columns -->
                
                <div class="one-half"> <!-- one-half -->

                    <h2>Latest Opinions</h2>
                    
                    <?php // Opinion posts loop begins here
                    $opinionPosts = new WP_Query('cat=9&posts_per_page=2&orderby=title&order=ASC');

                    if($opinionPosts->have_posts()) :
                        while($opinionPosts->have_posts()) : $opinionPosts->the_post(); ?>
								<div class="post-item clearfix">

									<!-- post-thumbnail -->
									<div class="square-thumbnail">
										<a href="<?php the_permalink(); ?>"><?php
										if (has_post_thumbnail()) {
											the_post_thumbnail('square-thumbnail');
										} else { ?>

											<img src="<?php echo get_template_directory_uri(); ?>/images/duck-thumb.jpg">

										<?php } ?></a>
									</div><!-- /post-thumbnail -->

									<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span class="subtle-date"><?php the_time('n/j/Y'); ?></span></h4>

									<?php the_excerpt(); ?>

                                </div><!-- /post-item -->
                    <?php endwhile;

                    else :
                        // fallback no content message here
                    
                    endif;
                    wp_reset_postdata(); ?>

                    <span class="horiz-center"><a href="<?php echo get_category_link(9); ?>" class="btn-a">View all Opinion Posts</a></span>
                </div> <!-- one-half -->

                
                <div class="one-half last"> <!-- one-half -->

                    <h2>Latest News</h2>
                    
                    <?php // News posts loop begins here
                    $newsPosts = new WP_Query('cat=10&posts_per_page=2&orderby=title&order=ASC');

                    if($newsPosts->have_posts()) :
                        while($newsPosts->have_posts()) : $newsPosts->the_post(); ?>
								<!-- post-item -->
								<div class="post-item clearfix">

									<!-- post-thumbnail -->
									<div class="square-thumbnail">
										<a href="<?php the_permalink(); ?>"><?php
										if (has_post_thumbnail()) {
											the_post_thumbnail('square-thumbnail');
										} else { ?>

											<img src="<?php echo get_template_directory_uri(); ?>/images/leaf.jpg">

										<?php } ?></a>
									</div><!-- /post-thumbnail -->

									<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span class="subtle-date"><?php the_time('n/j/Y'); ?></span></h4>

									<?php the_excerpt(); ?>

									</div><!-- /post-item -->
                    <?php endwhile;

                    else :
                        // fallback no content message here
                    
                    endif;
                    wp_reset_postdata(); ?>

                    <span class="horiz-center"><a href="<?php echo get_category_link(10); ?>" class="btn-a">View all News Posts</a></span>
                </div> <!-- one-half  last-->

            </div> <!-- home-columns -->

    </div> <!-- /site-content -->

<?php get_footer();

?>