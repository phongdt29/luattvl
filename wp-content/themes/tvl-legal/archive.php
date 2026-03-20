<?php
/**
 * Template for Archive pages (Category, Tag, Date, etc.)
 */

get_header();
?>

<!-- Navbar & Hero Start -->
<div class="container-fluid position-relative p-0">
   <!-- Header Start -->
   <div class="container-fluid bg-breadcrumb">
      <div class="container text-center py-3" style="max-width: 900px;">
         <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">
            <?php the_archive_title(); ?>
         </h4>
         <?php if (get_the_archive_description()) : ?>
            <div class="text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
               <?php the_archive_description(); ?>
            </div>
         <?php endif; ?>
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
               <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Trang chủ</a></li>
               <li class="breadcrumb-item active" aria-current="page"><?php the_archive_title(); ?></li>
            </ol>
         </nav>
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
            if (have_posts()) :
               while (have_posts()) : the_post();
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
                           <i class="bi bi-calendar"></i> <?php echo get_the_date('d/m/Y'); ?>
                        </p>
                        <p class="card-text">
                           <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                        </p>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">Đọc thêm</a>
                     </div>
                  </div>
               </div>
            <?php
               endwhile;
            ?>
               <!-- Pagination -->
               <div class="col-12 mt-4">
                  <?php
                  echo paginate_links(array(
                     'prev_text' => '<i class="bi bi-arrow-left"></i>',
                     'next_text' => '<i class="bi bi-arrow-right"></i>',
                     'type' => 'list',
                     'class' => 'pagination justify-content-center'
                  ));
                  ?>
               </div>
            <?php else : ?>
               <div class="col-12">
                  <p class="text-center">Chưa có bài viết nào.</p>
               </div>
            <?php endif; ?>
         </div>
      </div>

      <!-- Sidebar (Video) -->
      <div class="col-lg-3">
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
                        if ($video_count > 0) echo '</div>';
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
                  echo '</div>';
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
         <h3 class="stick text-white">"TVL Legal System - Đồng hành pháp lý, kiến tạo niềm tin!"</h3>
      </div>
   </div>
</div>

<?php get_footer(); ?>
