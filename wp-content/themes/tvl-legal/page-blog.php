<?php
/**
 * Template Name: Blog Page
 * Description: Template for Blog/News listing page with video sidebar
 */

get_header();
?>

<!-- Navbar & Hero Start -->
<div class="container-fluid position-relative p-0">
   <!-- Header Start -->
   <div class="container-fluid bg-breadcrumb">
      <div class="container text-center" style="max-width: 700px;">
         <h3 class="text-white wow fadeInDown display-5" data-wow-delay="0.1s">Tin tức & sự kiện</h3>
      </div>
   </div>
   <!-- Header End -->
</div>
<!-- Navbar & Hero End -->

<div class="container-fluid pb-5 pt-3">
   <div class="row">
      <!-- Phần 9 cột cho bài viết -->
      <div class="col-lg-9">
         <div class="row">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            $blog_args = array(
               'post_type' => 'post',
               'posts_per_page' => 15,
               'paged' => $paged,
               'orderby' => 'date',
               'order' => 'DESC'
            );

            $blog_query = new WP_Query($blog_args);

            if ($blog_query->have_posts()) :
               while ($blog_query->have_posts()) : $blog_query->the_post();
            ?>
               <!-- Bài viết -->
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
                        <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">Đọc thêm</a>
                     </div>
                  </div>
               </div>
            <?php
               endwhile;

               // Pagination
               if ($blog_query->max_num_pages > 1) :
            ?>
               <div class="col-12">
                  <nav aria-label="Page navigation">
                     <ul class="pagination justify-content-center">
                        <?php
                        echo paginate_links(array(
                           'total' => $blog_query->max_num_pages,
                           'current' => $paged,
                           'format' => '?paged=%#%',
                           'prev_text' => '<i class="bi bi-arrow-left"></i>',
                           'next_text' => '<i class="bi bi-arrow-right"></i>',
                           'type' => 'list',
                        ));
                        ?>
                     </ul>
                  </nav>
               </div>
            <?php
               endif;
               wp_reset_postdata();
            else :
            ?>
               <div class="col-12">
                  <p class="text-center">Chưa có bài viết nào.</p>
               </div>
            <?php endif; ?>
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
               $video_args = array(
                  'post_type' => 'video',
                  'posts_per_page' => 9,
                  'orderby' => 'menu_order',
                  'order' => 'ASC'
               );

               $video_query = new WP_Query($video_args);
               $video_count = 0;
               $slide_index = 0;

               if ($video_query->have_posts()) :
                  while ($video_query->have_posts()) : $video_query->the_post();

                     if ($video_count % 3 == 0) {
                        if ($video_count > 0) echo '</div>'; // Close previous slide
                        $active_class = ($slide_index == 0) ? 'active' : '';
                        echo '<div class="carousel-item ' . $active_class . '">';
                        $slide_index++;
                     }

                     $video_url = get_post_meta(get_the_ID(), '_video_url', true);
                     $external_thumb = get_post_meta(get_the_ID(), '_external_thumbnail', true);

                     if ($external_thumb) {
                        $thumbnail_url = $external_thumb;
                     } elseif (has_post_thumbnail()) {
                        $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                     } else {
                        $thumbnail_url = get_template_directory_uri() . '/public/img/default-video.jpg';
                     }
               ?>
                  <a href="<?php echo $video_url ? esc_url($video_url) : get_permalink(); ?>" target="_blank">
                     <div class="d-flex video-card">
                        <div class="col-md-5 mb-2">
                           <img class="img-video" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title(); ?>">
                        </div>
                        <h6 class="ms-3 align-self-start video-title"><?php the_title(); ?></h6>
                     </div>
                  </a>
               <?php
                     $video_count++;
                  endwhile;
                  echo '</div>'; // Close last slide
                  wp_reset_postdata();
               else :
               ?>
                  <div class="carousel-item active">
                     <p class="text-center">Chưa có video nào.</p>
                  </div>
               <?php endif; ?>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="container-fluid bg-primary">
   <div class="py-5">
      <div class="col-md-12 text-center">
         <h3 class="stick text-white">"TVL Legal System - Đồng hành pháp lý, kiến tạo niềmtin!"</h3>
      </div>
   </div>
</div>
<?php get_footer(); ?>
