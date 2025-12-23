<?php

/**
 * Template Name: Lĩnh Vực Hoạt Động
 * Template for Practice Area - List Posts by Category
 */

get_header();

// Get current term
$current_term = get_queried_object();

// Pagination
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

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
   'paged' => $paged,
   'orderby' => 'date',
   'order' => 'DESC'
);

$practice_posts = new WP_Query($args);
?>

<!-- Navbar & Hero Start -->
<div class="container-fluid position-relative p-0">
   <!-- Header Start -->
   <div class="container-fluid bg-breadcrumb">
      <div class="container text-center py-3" style="max-width: 900px;">
         <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s"><?php echo esc_html($current_term->name); ?></h4>
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
               <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Trang chủ</a></li>
               <li class="breadcrumb-item"><a href="<?php echo home_url('/linh-vuc/'); ?>">Lĩnh vực hoạt động</a></li>
               <li class="breadcrumb-item active" aria-current="page"><?php echo esc_html($current_term->name); ?></li>
            </ol>
         </nav>
      </div>
   </div>
   <!-- Header End -->
</div>
<!-- Navbar & Hero End -->

<!-- Practice Area Posts List Start -->
<section class="ftco-section ftco-degree-bg about">
   <div class="container">
      <div class="row">
         <div class="col-lg-8">
            <div class="practice-area-posts">

               <?php if ($current_term->description) : ?>
                  <div class="term-description mb-4">
                     <?php echo wpautop($current_term->description); ?>
                  </div>
               <?php endif; ?>

               <?php if ($practice_posts->have_posts()) : ?>

                  <div class="posts-list">
                     <?php while ($practice_posts->have_posts()) : $practice_posts->the_post(); ?>
                        <article class="post-item mb-4 pb-4 border-bottom">
                           <div class="row">
                              <?php if (has_post_thumbnail()) : ?>
                                 <div class="col-md-4 mb-3 mb-md-0">
                                    <a href="<?php the_permalink(); ?>">
                                       <?php the_post_thumbnail('medium', array('class' => 'img-fluid rounded')); ?>
                                    </a>
                                 </div>
                                 <div class="col-md-8">
                              <?php else : ?>
                                 <div class="col-12">
                              <?php endif; ?>
                                    <h3 class="post-title h5 mb-2">
                                       <a href="<?php the_permalink(); ?>" class="text-dark"><?php the_title(); ?></a>
                                    </h3>
                                    <div class="post-meta text-muted mb-2" style="font-size: 14px;">
                                       <span><i class="fas fa-calendar-alt me-1"></i><?php echo get_the_date('d/m/Y'); ?></span>
                                    </div>
                                    <div class="post-excerpt">
                                       <?php the_excerpt(); ?>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm">Xem thêm</a>
                                 </div>
                           </div>
                        </article>
                     <?php endwhile; ?>
                  </div>

                  <!-- Pagination -->
                  <div class="pagination-wrapper mt-4">
                     <?php
                     echo paginate_links(array(
                        'total' => $practice_posts->max_num_pages,
                        'current' => $paged,
                        'prev_text' => '<i class="fas fa-chevron-left"></i>',
                        'next_text' => '<i class="fas fa-chevron-right"></i>',
                        'type' => 'list',
                        'class' => 'pagination justify-content-center'
                     ));
                     ?>
                  </div>

                  <?php wp_reset_postdata(); ?>

               <?php else : ?>
                  <div class="alert alert-info">
                     <p class="mb-0">Hiện chưa có bài viết nào trong lĩnh vực này.</p>
                  </div>
               <?php endif; ?>

            </div>
         </div>

         <!-- Sidebar Start -->
         <div class="col-lg-4 sidebar pl-lg-5">
            <div class="sidebar-box">
               <div class="categories">
                  <h3>Lĩnh vực hoạt động</h3>
                  <ul class="list-unstyled">
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
                           $post_count = $area->count;
                     ?>
                        <li class="mb-2">
                           <a href="<?php echo esc_url($area_link); ?>" class="d-flex justify-content-between align-items-center <?php echo $is_current ? 'active text-primary fw-bold' : ''; ?>">
                              <?php echo esc_html($area->name); ?>
                              <span class="badge bg-secondary"><?php echo $post_count; ?></span>
                           </a>
                        </li>
                     <?php
                        endforeach;
                     endif;
                     ?>
                  </ul>
               </div>

               <!-- Contact Box -->
               <div class="contact-box mt-4 p-4 bg-primary text-white rounded">
                  <h4 class="text-white mb-3">Liên hệ tư vấn</h4>
                  <p class="mb-2 text-white"><i class="fas fa-phone-alt me-2"></i>Hotline: 0934.053.153</p>
                  <p class="mb-2 text-white"><i class="fas fa-envelope me-2"></i>Email: luattvl@luattvl.vn</p>
                  <p class="mb-0 text-white"><i class="fas fa-map-marker-alt me-2"></i>TP. Hồ Chí Minh</p>
               </div>
            </div>
         </div>
         <!-- Sidebar End -->
      </div>
   </div>
</section>
<!-- Practice Area Posts List End -->

<div class="container-fluid bg-primary">
   <div class="py-5">
      <div class="col-md-12 text-center">
         <h3 class="stick text-white">"TVL Legal System - Đồng hành pháp lý, kiến tạo niềm tin!"</h3>
      </div>
   </div>
</div>

<?php get_footer(); ?>
