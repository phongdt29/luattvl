<?php
/** Main template file for TVL Legal System theme **/
get_header(); ?>

<div id="tvl-main-content" class="site-main">


<!-- Spinner Start -->
<div id="spinner"
   class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
   <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
      <span class="sr-only">Loading...</span>
   </div>
</div>
<!-- Spinner End -->

<!-- Navbar & Hero Start -->
<div class="container-fluid position-relative p-0">
   <!-- Carousel Start -->
   <div class="header-carousel owl-carousel">
      <div class="header-carousel-item">
         <img src="public/img/carousel-1.jpg" class="img-fluid" alt="Image">
         <div class="carousel-caption">
            <div class="container">
               <div class="row gy-0 gx-5">
                  <div class="col-xl-12 animated fadeInRight">
                     <div class="text-sm-center text-md-start">
                        <h4 class="text-primary fw-bold mb-1">WELCOME TO</h4>
                        <h1 class="display-5 text-uppercase text-white mb-1">TVL Legal System</h1>
                        <h4 class="text-primary text-white fw-bold mb-4">When you choose our
                           service, we
                           will
                           make it at your highest
                           satisfaction.</h4>

                        <div class="d-flex justify-content-center justify-content-md-start flex-shrink-0 mb-4">
                           <!-- Button to Open Popup -->
                           <button id="openPopup" class="btn btn-primary rounded-pill py-3 px-4 px-md-5 me-2"
                              data-bs-toggle="modal" data-bs-target="#videoModal">
                              <i class="fas fa-play-circle me-2"></i> Watch Video
                           </button>

                           <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 ms-2"
                              href="about_1.html">Learn
                              More</a>
                        </div>
                        <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                           <h2 class="text-white me-2">Follow Us:</h2>
                           <div class="d-flex justify-content-start ms-2">
                              <a class="btn btn-md-square btn-light rounded-circle me-2" href="#"><i
                                    class="fab fa-facebook-f"></i></a>
                              <a class="btn btn-md-square btn-light rounded-circle mx-2" href="#"><i
                                    class="fab fa-twitter"></i></a>
                              <a class="btn btn-md-square btn-light rounded-circle mx-2" href="#"><i
                                    class="fab fa-instagram"></i></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-0 col-xl-5">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Carousel End -->
</div>
<!-- Navbar & Hero End -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="videoModalLabel">TVL Legal System</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <!-- Responsive Video -->
            <div class="ratio ratio-16x9">
               <video id="videoPlayer" class="w-100" controls>
                  <source src="public/img/tvl.mp4" type="video/mp4">
                  Your browser does not support the video tag.
               </video>
            </div>
         </div>
      </div>
   </div>
</div>

<section class="container-fluid">
   <div class="container">
      <div class="row">
         <div class="col-lg-3 py-2">
            <div class="heading-section ftco-animate">
               <h2 class="mb-2 ml-3 py-3" style="font-weight: 700">Why select us?</h2>
               <img src="public/img/about-us.png" alt="" class="img-fluid" style="border-radius: 5px;">
               <a href="about_2.html"
                  class="col-md-12 col-lg-12 col-12 col-sm-12 btn btn-primary rounded-pill my-3 py-2"
                  style="font-size: 0.75rem;">Văn
                  phòng
                  luật sư Trần Vân
                  Linh</a>
               <a href="about_3.html"
                  class="col-md-12 col-lg-12 col-12 col-sm-12 btn btn-primary rounded-pill py-2 mb-3"
                  style="font-size: 0.75rem;">Công
                  ty luật TNHH TVL</a>
            </div>
         </div>
         <div class="col-lg-9 services-wrap px-4 pt-5">
            <div class="row pt-md-3">
               <div class="col-md-4 d-flex align-items-stretch">
                  <div class="services text-center">
                     <div class="icon d-flex justify-content-center align-items-center">
                        <img class="col-md-12" src="public/img/ab-1.jpg" alt="" width="200px">
                     </div>
                     <div class="text">
                        <h3>Hiệu quả</h3>
                        <p>TVL Legal System luôn chú trọng áp dụng các giải pháp pháp lý linh hoạt, tối ưu để đảm bảo
                           khách hàng nhận được kết quả tốt nhất trong thời gian ngắn nhất.</p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 d-flex align-items-stretch">
                  <div class="services text-center">
                     <div class="icon d-flex justify-content-center align-items-center">
                        <img class="col-md-12" src="public/img/ab-2.png" alt="" width="200px">
                     </div>
                     <div class="text">
                        <h3>Uy tín</h3>
                        <p>TVL Legal System luôn không ngừng nâng cao chất lượng dịch vụ và tuân
                           thủ các chuẩn mực đạo
                           đức nghề nghiệp, để tạo dựng niềm tin lâu dài với các đối tác và khách hàng.</p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 d-flex align-items-stretch">
                  <div class="services text-center">
                     <div class="icon d-flex justify-content-center align-items-center">
                        <img class="col-md-12" src="public/img/ab-3.png" alt="" width="200px">
                     </div>
                     <div class="text">
                        <h3>Tận tâm</h3>
                        <p>TVL Legal System không chỉ hỗ trợ về mặt pháp lý mà còn lắng nghe, đồng hành trong từng giai
                           đoạn của quá trình giải quyết vụ việc của khách hàng.
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>


<!-- Category Start -->
<div class="container-fluid cat pb-5" style="background-image: url('public/img/bg2.jpg');">
   <div class="overlay"></div>
   <div class="container pb-5">
      <div class="text-center mx-auto pt-5 wow fadeInUp" data-wow-delay="0.2s"
         style="max-width: 800px; position: relative;">
         <h1 class="display-6 mb-5 pb-3" style="color: #fff;">LĨNH VỰC HOẠT ĐỘNG</h1>
      </div>
      <div class="owl-carousel cat-carousel wow fadeInUp" data-wow-delay="0.2s">
         <?php
         $practice_areas = get_terms(array(
            'taxonomy' => 'practice_area',
            'hide_empty' => false,
            'orderby' => 'term_id',
            'order' => 'ASC'
         ));

         if ($practice_areas && !is_wp_error($practice_areas)) :
            foreach ($practice_areas as $area) :
               $image_id = get_term_meta($area->term_id, 'practice_area_image', true);
               $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'medium') : get_template_directory_uri() . '/public/img/default-category.jpg';
               $term_link = get_term_link($area);
         ?>
         <div class="cat-item p-3">
            <div class="cat-img mb-3">
               <img src="<?php echo esc_url($image_url); ?>" class="img-fluid w-100 rounded" alt="<?php echo esc_attr($area->name); ?>">
            </div>
            <a href="<?php echo esc_url($term_link); ?>" class="h5 d-inline-block mb-3"><?php echo esc_html($area->name); ?></a>
         </div>
         <?php
            endforeach;
         endif;
         ?>
      </div>
   </div>
</div>
<!-- Category End -->
<div class="bg-primary" style="padding-top: 2px"></div>
<div class="container-fluid pb-5 pt-3">
   <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
      <h1 class="display-5" style="color: #0275ff;">Tin tức & sự kiện</h1>
   </div>
   <div class="row">
      <!-- Phần 9 cột cho bài viết -->
      <div class="col-lg-9">
         <div class="row">
            <?php
            // Query the latest 3 posts
            $args = array(
               'post_type' => 'post',
               'posts_per_page' => 3,
               'orderby' => 'date',
               'order' => 'DESC'
            );
            $latest_posts = new WP_Query($args);

            if ($latest_posts->have_posts()) :
               while ($latest_posts->have_posts()) : $latest_posts->the_post();
            ?>
                  <div class="col-md-4">
                     <div class="card mb-3">
                        <?php if (has_post_thumbnail()) : ?>
                           <a href="<?php the_permalink(); ?>">
                              <?php the_post_thumbnail('medium', array('class' => 'card-img-top')); ?>
                           </a>
                        <?php else : ?>
                           <img src="<?php echo get_template_directory_uri(); ?>/public/img/default-post.jpg" class="card-img-top" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                        <div class="card-body">
                           <h5 class="card-title">
                              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                           </h5>
                           <p class="card-text">
                              <i class="bi bi-calendar"></i> <?php echo get_the_date('Y-m-d'); ?>
                           </p>
                           <p class="card-text">
                              <?php echo wp_trim_words(get_the_excerpt(), 30, '...'); ?>
                           </p>
                           <a href="<?php the_permalink(); ?>" class="btn btn-primary">Đọc thêm</a>
                        </div>
                     </div>
                  </div>
            <?php
               endwhile;
               wp_reset_postdata();
            else :
            ?>
               <div class="col-md-12">
                  <p class="text-center">Chưa có bài viết nào.</p>
               </div>
            <?php endif; ?>
         </div>
         <div class="row py-3 text-center pb-5">
            <div class="col-md-12">
               <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="btn btn-primary py-2 px-5">Tất cả bài viết</a>
            </div>
         </div>
      </div>

      <!-- Phần 3 cột cho video -->
      <div class="col-lg-3">
         <!-- Tiêu đề và Slider Section -->
         <div class="d-flex justify-content-between mb-3">
            <h4 class="text-start text-primary">Video</h4>
            <div>
               <button class="btn btn-primary" type="button" data-bs-target="#videoCarousel" data-bs-slide="prev">
                  <i class="bi bi-arrow-left"></i>
               </button>
               <button class="btn btn-primary" type="button" data-bs-target="#videoCarousel" data-bs-slide="next">
                  <i class="bi bi-arrow-right"></i>
               </button>
            </div>
         </div>

         <!-- Video Slider -->
         <div id="videoCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
               <?php
               // Query all videos ordered by menu_order
               $video_args = array(
                  'post_type' => 'video',
                  'posts_per_page' => -1,
                  'orderby' => 'menu_order',
                  'order' => 'ASC',
                  'post_status' => 'publish'
               );

               $video_query = new WP_Query($video_args);

               if ($video_query->have_posts()) :
                  $videos_per_slide = 3; // 3 videos per carousel slide
                  $counter = 0;
                  $slide_index = 0;

                  while ($video_query->have_posts()) : $video_query->the_post();
                     $video_url = get_post_meta(get_the_ID(), '_video_url', true);
                     $external_thumb = get_post_meta(get_the_ID(), '_external_thumbnail', true);

                     // Start new carousel-item for every 3 videos
                     if ($counter % $videos_per_slide == 0) :
                        if ($counter > 0) echo '</div>'; // Close previous carousel-item
                        $active_class = ($slide_index == 0) ? ' active' : '';
                        echo '<div class="carousel-item' . $active_class . '">';
                        $slide_index++;
                     endif;
                     ?>

                     <a href="<?php echo esc_url($video_url); ?>">
                        <div class="d-flex video-card">
                           <div class="col-md-5 mb-2">
                              <?php if ($external_thumb) : ?>
                                 <img class="img-video" src="<?php echo esc_url($external_thumb); ?>" alt="<?php the_title(); ?>">
                              <?php elseif (has_post_thumbnail()) : ?>
                                 <?php the_post_thumbnail('thumbnail', array('class' => 'img-video')); ?>
                              <?php else : ?>
                                 <img class="img-video" src="<?php echo get_template_directory_uri(); ?>/public/img/default-video.jpg" alt="<?php the_title(); ?>">
                              <?php endif; ?>
                           </div>
                           <h6 class="ms-3 align-self-start video-title"><?php the_title(); ?></h6>
                        </div>
                     </a>

                     <?php
                     $counter++;
                  endwhile;

                  // Close the last carousel-item
                  if ($counter > 0) echo '</div>';

                  wp_reset_postdata();
               else :
                  echo '<div class="carousel-item active"><p class="text-center">Chưa có video nào được thêm.</p></div>';
               endif;
               ?>
            </div>
            <!-- Điều khiển carousel -->
         </div>
      </div>
   </div>
</div>
<!-- Team End -->

<!-- Team Start -->
<div class="container-fluid team py-5 px-3">
   <div class="pb-5">
      <div class=" text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
         <h2>THÀNH VIÊN</h2>
         <h1 class="display-5 mb-4" style="color: #0275ff;">TVL Legal System</h1>
      </div>

      <?php
      // Query all team members ordered by menu_order
      $team_args = array(
         'post_type' => 'team_member',
         'posts_per_page' => -1,
         'orderby' => 'menu_order',
         'order' => 'ASC'
      );

      $team_query = new WP_Query($team_args);

      if ($team_query->have_posts()) :
         $counter = 0;
         $members_per_row = 4;

         while ($team_query->have_posts()) : $team_query->the_post();
            $positions = get_post_meta(get_the_ID(), '_team_positions', true);

            // Start new row for every 4 members
            if ($counter % $members_per_row == 0) :
               if ($counter > 0) echo '</div>'; // Close previous row
               echo '<div class="row g-3 justify-content-center pb-3">';
            endif;
            ?>

            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp pt-3" data-wow-delay="0.4s">
               <a href="<?php echo get_permalink(); ?>">
                  <div class="team-item">
                     <div class="team-img">
                        <?php if (has_post_thumbnail()) : ?>
                           <?php the_post_thumbnail('thumbnail', array('class' => 'img-fluid', 'alt' => get_the_title())); ?>
                        <?php else : ?>
                           <img src="<?php echo get_template_directory_uri(); ?>/public/img/team/default-avatar.png" class="img-fluid" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                     </div>
                     <div class="team-title">
                        <h5 class="mb-2"><?php the_title(); ?></h5>
                        <?php if ($positions && is_array($positions)) : ?>
                           <ul class="list-unstyled">
                              <?php foreach ($positions as $position) : ?>
                                 <li><?php echo esc_html($position); ?></li>
                              <?php endforeach; ?>
                           </ul>
                        <?php endif; ?>
                     </div>
                  </div>
               </a>
            </div>

            <?php
            $counter++;
         endwhile;

         // Close the last row
         echo '</div>';

         wp_reset_postdata();
      else :
         echo '<p class="text-center">Chưa có thành viên nào được thêm.</p>';
      endif;
      ?>

   </div>
</div>



<!-- Sponsors Carousel Start -->
<section class="">
   <div class="container">
      <div class="sponsor-carousel">
         <div class="sponsor-track">
            <?php
            // Query all sponsors ordered by menu_order
            $sponsor_args = array(
               'post_type' => 'sponsor',
               'posts_per_page' => -1,
               'orderby' => 'menu_order',
               'order' => 'ASC',
               'post_status' => 'publish'
            );

            $sponsor_query = new WP_Query($sponsor_args);

            if ($sponsor_query->have_posts()) :
               // Loop through sponsors twice for seamless carousel effect
               for ($i = 0; $i < 2; $i++) :
                  while ($sponsor_query->have_posts()) : $sponsor_query->the_post();
                     $sponsor_url = get_post_meta(get_the_ID(), '_sponsor_url', true);
                     $new_tab = get_post_meta(get_the_ID(), '_sponsor_new_tab', true);
                     $target = $new_tab ? ' target="_blank" rel="noopener noreferrer"' : '';

                     if ($sponsor_url) :
                        ?>
                        <a href="<?php echo esc_url($sponsor_url); ?>"<?php echo $target; ?>>
                           <?php if (has_post_thumbnail()) : ?>
                              <?php the_post_thumbnail('thumbnail', array('alt' => get_the_title())); ?>
                           <?php endif; ?>
                        </a>
                        <?php
                     else :
                        if (has_post_thumbnail()) :
                           the_post_thumbnail('thumbnail', array('alt' => get_the_title()));
                        endif;
                     endif;
                  endwhile;

                  // Reset query for second loop
                  if ($i == 0) $sponsor_query->rewind_posts();
               endfor;

               wp_reset_postdata();
            endif;
            ?>
         </div>
      </div>
   </div>
</section>
<!-- Sponsors Carousel End -->




<div class="container-fluid bg-primary">
   <div class="py-5">
      <div class="col-md-12 text-center">
         <h3 class="stick text-white">"TVL Legal System - Đồng hành pháp lý, kiến tạo niềmtin!"</h3>
      </div>
   </div>
</div>

</div>

<?php get_footer(); ?>
