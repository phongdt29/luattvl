<?php
/**
 * Template for Practice Area Taxonomy Archive
 */

get_header();

// Get current term
$current_term = get_queried_object();
?>

<!-- Navbar & Hero Start -->
<div class="container-fluid position-relative p-0">
   <!-- Header Start -->
   <div class="container-fluid bg-breadcrumb">
      <div class="container text-center py-3" style="max-width: 900px;">
         <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Lĩnh vực hoạt động</h4>
      </div>
   </div>
   <!-- Header End -->
</div>
<!-- Navbar & Hero End -->

<!-- Category Content Start -->
<section class="ftco-section ftco-degree-bg about">
   <div class="container">
      <div class="row">
         <div class="col-lg-8">
            <div>
               <h1 class="display-6 mb-4 text-primary"><?php echo esc_html($current_term->name); ?></h1>

               <?php if ($current_term->description) : ?>
                  <div class="term-description">
                     <?php echo wpautop($current_term->description); ?>
                  </div>
               <?php endif; ?>

               <?php
               // Query posts in this practice area
               $args = array(
                  'post_type' => 'post',
                  'tax_query' => array(
                     array(
                        'taxonomy' => 'practice_area',
                        'field' => 'term_id',
                        'terms' => $current_term->term_id,
                     ),
                  ),
                  'posts_per_page' => 10,
                  'orderby' => 'date',
                  'order' => 'DESC'
               );

               $practice_posts = new WP_Query($args);

               if ($practice_posts->have_posts()) :
                  while ($practice_posts->have_posts()) : $practice_posts->the_post();
               ?>
                  <article class="mb-4">
                     <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                     <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail mb-3">
                           <?php the_post_thumbnail('medium', array('class' => 'img-fluid rounded')); ?>
                        </div>
                     <?php endif; ?>
                     <div class="post-excerpt">
                        <?php the_excerpt(); ?>
                     </div>
                     <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm">Xem thêm</a>
                  </article>
                  <hr>
               <?php
                  endwhile;
                  wp_reset_postdata();
               else :
               ?>
                  <p style="font-size: 18px;">Hiện chưa có bài viết nào trong lĩnh vực này.</p>
               <?php endif; ?>
            </div>
         </div>

         <!-- Sidebar Start -->
         <div class="col-lg-4 sidebar pl-lg-5">
            <div class="sidebar-box">
               <div class="categories">
                  <h3>Lĩnh vực</h3>
                  <?php
                  // Get all practice areas
                  $all_areas = get_terms(array(
                     'taxonomy' => 'practice_area',
                     'hide_empty' => false,
                     'orderby' => 'term_id',
                     'order' => 'ASC'
                  ));

                  if ($all_areas && !is_wp_error($all_areas)) :
                     foreach ($all_areas as $area) :
                        $is_current = ($area->term_id === $current_term->term_id);
                        $area_link = get_term_link($area);
                  ?>
                     <li>
                        <a href="<?php echo esc_url($area_link); ?>" <?php echo $is_current ? 'class="active"' : ''; ?>>
                           <?php echo esc_html($area->name); ?>
                           <span class="ion-ios-arrow-forward"></span>
                        </a>
                     </li>
                  <?php
                     endforeach;
                  endif;
                  ?>

                  <h3 class="text-primary pt-5">Hotline: 0934.053.153</h3>
                  <h3 class="text-primary">Email: luattvl@luattvl.vn</h3>
               </div>
            </div>
         </div>
         <!-- Sidebar End -->
      </div>
   </div>
</section>
<!-- Category Content End -->

<?php get_footer(); ?>
