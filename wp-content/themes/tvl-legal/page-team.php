<?php
/**
 * Template Name: Team Page
 * Description: Template for Team Members listing page
 */

get_header();
?>

<!-- Navbar & Hero Start -->
<div class="container-fluid position-relative p-0">
   <!-- Header Start -->
   <div class="container-fluid bg-breadcrumb">
      <div class="container text-center py-3" style="max-width: 900px;">
         <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Đội ngũ</h4>
      </div>
   </div>
   <!-- Header End -->
</div>
<!-- Navbar & Hero End -->

<!-- Team Start -->
<div class="container-fluid team py-5 px-3">
   <div class="pb-5">
      <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
         <h2>THÀNH VIÊN</h2>
         <h1 class="display-5 mb-4" style="color: #0275ff;">TVL Legal System</h1>
      </div>

      <?php
      $team_args = array(
         'post_type' => 'team_member',
         'posts_per_page' => -1,
         'orderby' => 'menu_order',
         'order' => 'ASC'
      );

      $team_query = new WP_Query($team_args);

      if ($team_query->have_posts()) :
         $count = 0;
         $total = $team_query->post_count;
      ?>

      <div class="row g-3 justify-content-center pb-3">
         <?php
         while ($team_query->have_posts()) : $team_query->the_post();
            $count++;
            $positions = get_post_meta(get_the_ID(), '_team_positions', true);

            // Close row and start new row after every 4 items, except for the last row
            if ($count > 4 && ($count - 1) % 4 == 0 && $count <= $total) :
         ?>
      </div>
      <div class="row justify-content-center">
         <?php endif; ?>

         <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp pt-3" data-wow-delay="0.4s">
            <a href="<?php the_permalink(); ?>">
               <div class="team-item">
                  <div class="team-img">
                     <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('thumbnail', array('class' => 'img-fluid')); ?>
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

      <?php endwhile; ?>
      </div>

      <?php
         wp_reset_postdata();
      else :
      ?>
         <div class="row justify-content-center">
            <div class="col-12 text-center">
               <p>Chưa có thành viên nào.</p>
            </div>
         </div>
      <?php endif; ?>

   </div>
</div>
<!-- Team End -->
<div class="container-fluid bg-primary">
   <div class="py-5">
      <div class="col-md-12 text-center">
         <h3 class="stick text-white">"TVL Legal System - Đồng hành pháp lý, kiến tạo niềmtin!"</h3>
      </div>
   </div>
</div>
<?php get_footer(); ?>
