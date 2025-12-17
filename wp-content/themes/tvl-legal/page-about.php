<?php
/**
 * Template Name: About Page
 * Description: Template for About Us page
 */

get_header();
?>

<!-- Navbar & Hero Start -->
<div class="container-fluid position-relative p-0">
   <!-- Header Start -->
   <div class="container-fluid bg-breadcrumb">
      <div class="container text-center" style="max-width: 700px;">
         <h3 class="text-white wow fadeInDown display-5" data-wow-delay="0.1s"><?php the_title(); ?></h3>
      </div>
   </div>
   <!-- Header End -->
</div>
<!-- Navbar & Hero End -->

<!-- About Start -->
<div class="container-fluid about pb-5">
   <div class="container py-4">
      <?php while (have_posts()) : the_post(); ?>
      <div class="row g-5 align-items-center">
         <?php if (has_post_thumbnail()) : ?>
         <div class="col-xl-12 wow fadeInRight" data-wow-delay="0.2s">
            <div class="bg-primary rounded position-relative overflow-hidden">
               <div class="rounded-bottom">
                  <?php the_post_thumbnail('full', array('class' => 'img-fluid rounded-bottom w-80')); ?>
               </div>
            </div>
         </div>
         <?php endif; ?>

         <div class="col-md-12">
            <div class="page-content">
               <?php the_content(); ?>
            </div>
         </div>
      </div>
      <?php endwhile; ?>
   </div>
</div>
<div class="container-fluid bg-primary">
   <div class="py-5">
      <div class="col-md-12 text-center">
         <h3 class="stick text-white">"TVL Legal System - Đồng hành pháp lý, kiến tạo niềmtin!"</h3>
      </div>
   </div>
</div>
<!-- About End -->

<?php get_footer(); ?>
