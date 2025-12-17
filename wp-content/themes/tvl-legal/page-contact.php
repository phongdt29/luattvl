<?php
/**
 * Template Name: Contact Page
 * Description: Template for Contact page with form and map
 */

get_header();
?>

<div class="container-fluid position-relative p-0">
   <!-- Header Start -->
   <div class="container-fluid bg-breadcrumb">
      <div class="container text-center py-5" style="max-width: 900px;">
         <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s"><?php the_title(); ?></h4>
         <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url('/')); ?>">Trang chủ</a></li>
            <li class="breadcrumb-item active text-primary"><?php the_title(); ?></li>
         </ol>
      </div>
   </div>
   <!-- Header End -->
</div>
<!-- Navbar & Hero End -->

<!-- Contact Start -->
<div class="container-fluid contact py-5">
   <div class="container py-5">
      <div class="row g-5">
         <div class="col-xl-6">
            <div class="wow fadeInUp" data-wow-delay="0.2s">
               <div class="bg-light rounded p-5 mb-5">
                  <h4 class="text-primary mb-4">Thông tin liên hệ</h4>
                  <div class="row g-4">
                     <div class="col-md-12">
                        <div class="contact-add-item">
                           <div class="contact-icon text-primary mb-3">
                              <i class="fas fa-map-marker-alt fa-2x me-3"></i>
                              <span style="font-size: 25px; font-weight: 500;color: #000"> Địa chỉ</span>
                           </div>
                           <div>
                              <p class="mb-0">Trụ sở chính: 47 Nguyễn Minh Hoàng, Phường 12, Quận Tân Bình, TP. HCM</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="contact-add-item">
                           <div class="contact-icon text-primary mb-3">
                              <i class="fas fa-envelope fa-2x me-3"></i>
                              <span style="font-size: 25px; font-weight: 500;color: #000"> Email</span>
                           </div>
                           <div>
                              <p class="mb-0">luattvl@luattvl.vn</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="contact-add-item">
                           <div class="contact-icon text-primary mb-3">
                              <i class="fa fa-phone-alt fa-2x me-3"></i>
                              <span style="font-size: 25px; font-weight: 500;color: #000"> Số điện thoại</span>
                           </div>
                           <div>
                              <p class="mb-0">0968.0968.47</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="bg-light p-5 rounded h-100 wow fadeInUp" data-wow-delay="0.2s">
                  <h4 class="text-primary">Lời nhắn</h4>
                  <div class="tvl-contact-form">
                     <?php
                     // Display Contact Form 7
                     // Replace 'YOUR_FORM_ID' with your actual Contact Form 7 ID
                     // Or use the form title like: echo do_shortcode('[contact-form-7 id="123" title="Contact form"]');
                     if (function_exists('wpcf7_contact_form')) {
                        echo do_shortcode('[contact-form-7 id="f34f9aa" title="Contact form 1"]');
                     } else {
                        echo '<p class="alert alert-warning">Vui lòng cài đặt plugin Contact Form 7 để sử dụng form liên hệ.</p>';
                     }
                     ?>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.1s">
            <div class="rounded h-100">
               <iframe class="rounded h-100 w-100" style="height: 400px;"
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.14258389001!2d106.64624661170411!3d10.8003896893055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752948e31f9585%3A0xab845d36695b046f!2zNDcgTmd1eeG7hW4gTWluaCBIb8OgbmcsIFBoxrDhu51uZyAxMiwgVMOibiBCw6xuaCwgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1734504025468!5m2!1svi!2s"
                  loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Contact End -->
<div class="container-fluid bg-primary">
   <div class="py-5">
      <div class="col-md-12 text-center">
         <h3 class="stick text-white">"TVL Legal System - Đồng hành pháp lý, kiến tạo niềmtin!"</h3>
      </div>
   </div>
</div>
<?php get_footer(); ?>
