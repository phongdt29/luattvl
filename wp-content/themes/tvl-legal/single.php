<?php
get_header();
if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
        <div class="container my-5">
            <h1><?php the_title(); ?></h1>
            <p class="text-muted"><?php echo get_the_date(); ?></p>
            <div><?php the_content(); ?></div>
        </div>
    <?php endwhile;
endif;
get_footer();
