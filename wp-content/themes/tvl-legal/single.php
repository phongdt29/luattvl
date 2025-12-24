<?php
get_header();
if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
        <div class="container my-5">
            <h1><?php the_title(); ?></h1>
            <p class="text-muted"><?php echo get_the_date(); ?></p>
            <?php if (has_post_thumbnail()) : ?>
                <div class="post-thumbnail mb-4">
                    <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded')); ?>
                </div>
            <?php endif; ?>
            <div><?php the_content(); ?></div>
        </div>
    <?php endwhile;
endif;
get_footer();
