<?php get_header(); ?>

<?php while (have_posts()) : the_post();
   $positions = get_post_meta(get_the_ID(), '_team_positions', true);
?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5">
   <div class="container text-center py-5">
      <h1 class="display-2 text-white mb-4 animated slideInDown"><?php the_title(); ?></h1>
   </div>
</div>
<!-- Page Header End -->

<!-- Team Member Detail Start -->
<div class="container-fluid py-5">
   <div class="container">
      <div class="row g-5">
         <div class="col-lg-4">
            <div class="team-item">
               <div class="team-img">
                  <?php if (has_post_thumbnail()) : ?>
                     <?php the_post_thumbnail('full', array('class' => 'img-fluid rounded')); ?>
                  <?php else : ?>
                     <img src="<?php echo get_template_directory_uri(); ?>/public/img/team/default-avatar.png" class="img-fluid rounded" alt="<?php the_title(); ?>">
                  <?php endif; ?>
               </div>
            </div>
         </div>
         <div class="col-lg-8">
            <h2 class="mb-4"><?php the_title(); ?></h2>

            <?php if ($positions && is_array($positions)) : ?>
               <div class="mb-4">
                  <h4 class="mb-3">Chức vụ:</h4>
                  <ul class="list-unstyled">
                     <?php foreach ($positions as $position) : ?>
                        <li class="mb-2"><i class="fa fa-check text-primary me-2"></i><?php echo esc_html($position); ?></li>
                     <?php endforeach; ?>
                  </ul>
               </div>
            <?php endif; ?>

            <?php if (get_the_content()) : ?>
               <div class="team-content">
                  <h4 class="mb-3">Thông tin chi tiết:</h4>
                  <?php the_content(); ?>
               </div>
            <?php endif; ?>

            <div class="mt-4">
               <a href="<?php echo home_url('/'); ?>#team" class="btn btn-primary">Quay lại</a>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Team Member Detail End -->
<div class="container-fluid bg-primary">
   <div class="py-5">
      <div class="col-md-12 text-center">
         <h3 class="stick text-white">"TVL Legal System - Đồng hành pháp lý, kiến tạo niềmtin!"</h3>
      </div>
   </div>
</div>
<?php endwhile; ?>

<?php get_footer(); ?>
