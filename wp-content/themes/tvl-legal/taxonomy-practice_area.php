<?php

/**
 * Template Name: Lĩnh Vực Hoạt Động
 * Template for Practice Area - Single Detail View
 * Load content from linked Post ID
 */

get_header();

// Get current term
$current_term = get_queried_object();

// Get linked page/post ID from term meta
$linked_post_id = get_term_meta($current_term->term_id, 'practice_area_post_id', true);
$post_content = '';
$post_thumbnail = '';

// Load content from linked page/post
if ($linked_post_id) {
   $linked_post = get_post($linked_post_id);
   if ($linked_post && $linked_post->post_status === 'publish') {
      $post_content = $linked_post->post_content;
      $post_content = apply_filters('the_content', $post_content);
      if (has_post_thumbnail($linked_post_id)) {
         $post_thumbnail = get_the_post_thumbnail_url($linked_post_id, 'large');
      }
   }
}

// Fallback: Try to find a page with same slug as term
if (empty($post_content)) {
   $page_by_slug = get_page_by_path($current_term->slug);
   if ($page_by_slug && $page_by_slug->post_status === 'publish') {
      $post_content = $page_by_slug->post_content;
      $post_content = apply_filters('the_content', $post_content);
      if (has_post_thumbnail($page_by_slug->ID)) {
         $post_thumbnail = get_the_post_thumbnail_url($page_by_slug->ID, 'large');
      }
   }
}

// Fallback to term description if no linked page
if (empty($post_content)) {
   $post_content = wpautop($current_term->description);
}

// Get term image as fallback
$term_image_id = get_term_meta($current_term->term_id, 'practice_area_image', true);
$term_image_url = $term_image_id ? wp_get_attachment_url($term_image_id) : '';

// Use post thumbnail or term image
$featured_image = $post_thumbnail ? $post_thumbnail : $term_image_url;
?>

<!-- Navbar & Hero Start -->
<div class="container-fluid position-relative p-0">
   <!-- Header Start -->
   <div class="container-fluid bg-breadcrumb">
      <div class="container text-center py-3" style="max-width: 900px;">
         <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Lĩnh vực</h4>
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

<!-- Practice Area Detail Start -->
<section class="ftco-section ftco-degree-bg about">
   <div class="container">
      <div class="row">
         <div class="col-lg-8">
            <div class="practice-area-detail">
               <h1 class="display-6 mb-4 text-primary"><?php echo esc_html($current_term->name); ?></h1>

          

               <div class="practice-area-content">
                  <?php echo $post_content; ?>
               </div>

               <!-- Contact CTA -->
               <div class="contact-cta mt-5 p-4 bg-light rounded">
                  <h4 class="text-primary mb-3">Bạn cần tư vấn về <?php echo esc_html($current_term->name); ?>?</h4>
                  <p>Liên hệ ngay với chúng tôi để được tư vấn miễn phí!</p>
                  <div class="d-flex flex-wrap gap-3">
                     <a href="tel:0934053153" class="btn btn-primary">
                        <i class="fas fa-phone-alt me-2"></i>Gọi: 0934.053.153
                     </a>
                     <a href="<?php echo home_url('/lien-he/'); ?>" class="btn btn-outline-primary">
                        <i class="fas fa-envelope me-2"></i>Gửi yêu cầu tư vấn
                     </a>
                  </div>
               </div>
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
                     ?>
                        <li class="mb-2">
                           <a href="<?php echo esc_url($area_link); ?>" class="d-flex justify-content-between align-items-center <?php echo $is_current ? 'active text-primary fw-bold' : ''; ?>">
                              <?php echo esc_html($area->name); ?>
                              <span class="ion-ios-arrow-forward"></span>
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
                  <p class="mb-2"><i class="fas fa-phone-alt me-2"></i>Hotline: 0934.053.153</p>
                  <p class="mb-2"><i class="fas fa-envelope me-2"></i>Email: luattvl@luattvl.vn</p>
                  <p class="mb-0"><i class="fas fa-map-marker-alt me-2"></i>TP. Hồ Chí Minh</p>
               </div>
            </div>
         </div>
         <!-- Sidebar End -->
      </div>
   </div>
</section>
<!-- Practice Area Detail End -->
<div class="container-fluid bg-primary">
   <div class="py-5">
      <div class="col-md-12 text-center">
         <h3 class="stick text-white">"TVL Legal System - Đồng hành pháp lý, kiến tạo niềmtin!"</h3>
      </div>
   </div>
</div>
<?php get_footer(); ?>
