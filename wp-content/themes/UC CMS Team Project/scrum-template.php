<?php

/*
Template Name: SCRUM
*/

get_header();

if(have_posts()) :
    while (have_posts()) : the_post(); ?> 

    <article class="post page">
        <h3>Add your SCRUM content to scrum-template.php Shane</h3>
        <h2><?php the_title(); ?></h2>
        <div class="info-box">
            <h4>SCRUM SPECIAL NOTICE</h4>
            <p>TEST, ipsum dolor sit amet consectetur adipisicing elit. Ea, rem eius! Earum, repellat! Consequuntur ea delectus eos laboriosam</p>
        </div>
        <?php the_content(); ?>
    </article>

    <?php endwhile;

    else :
        echo '<p>No Content Found</p>';

    endif;

get_footer();

?>