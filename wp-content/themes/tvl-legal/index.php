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
         <div class="cat-item p-3">
            <div class="cat-img mb-3">
               <img src="public/img/category/1.jpg" class="img-fluid w-100 rounded" alt="">
            </div>
            <a href="cat_1.html" class="h5 d-inline-block mb-3">Luật sư Tranh Tụng</a>
         </div>
         <div class="cat-item p-3">
            <div class="cat-img mb-3">
               <img src="public/img/category/2.jpg" class="img-fluid w-100 rounded" alt="">
            </div>
            <a href="cat_2.html" class="h5 d-inline-block mb-3">Tố tụng tại Trọng tài</a>
         </div>
         <div class="cat-item p-3">
            <div class="cat-img mb-3">
               <img src="public/img/category/3.jpg" class="img-fluid w-100 rounded" alt="">
            </div>
            <a href="cat_3.html" class="h5 d-inline-block mb-3">Đầu tư & Doanh nghiệp</a>
         </div>
         <div class="cat-item p-3">
            <div class="cat-img mb-3">
               <img src="public/img/category/4.jpg" class="img-fluid w-100 rounded" alt="">
            </div>
            <a href="cat_4.html" class="h5 d-inline-block mb-3">Sở hữu trí tuệ</a>
         </div>
         <div class="cat-item p-3">
            <div class="cat-img mb-3">
               <img src="public/img/category/5.jpg" class="img-fluid w-100 rounded" alt="">
            </div>
            <a href="cat_5.html" class="h5 d-inline-block mb-3">Lao Động</a>
         </div>
         <div class="cat-item p-3">
            <div class="cat-img mb-3">
               <img src="public/img/category/6.jpg" class="img-fluid w-100 rounded" alt="">
            </div>
            <a href="cat_6.html" class="h5 d-inline-block mb-3">Kế Toán - Thuế</a>
         </div>
         <div class="cat-item p-3">
            <div class="cat-img mb-3">
               <img src="public/img/category/7.jpg" class="img-fluid w-100 rounded" alt="">
            </div>
            <a href="cat_7.html" class="h5 d-inline-block mb-3">Bất động sản & Xây dựng</a>
         </div>
         <div class="cat-item p-3">
            <div class="cat-img mb-3">
               <img src="public/img/category/8.jpg" class="img-fluid w-100 rounded" alt="">
            </div>
            <a href="cat_8.html" class="h5 d-inline-block mb-3">Mua bán & Sáp nhập (M&A)</a>
         </div>
         <div class="cat-item p-3">
            <div class="cat-img mb-3">
               <img src="public/img/category/9.jpg" class="img-fluid w-100 rounded" alt="">
            </div>
            <a href="cat_9.html" class="h5 d-inline-block mb-3">Tài chính - Ngân hàng</a>
         </div>
         <div class="cat-item p-3">
            <div class="cat-img mb-3">
               <img src="public/img/category/10.jpg" class="img-fluid w-100 rounded" alt="">
            </div>
            <a href="cat_10.html" class="h5 d-inline-block mb-3">Hôn nhân và gia đình - Thừa kế</a>
         </div>

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
                              <div class="carousel-item active">
                                    <a href="video/toa-dam-phap-luat-truc-tuyen-lao-dong-thoi-vu-va-bao-ve-quyen-loi-trong-thi-truong-linh-hoat.html">
                     <div class="d-flex video-card">
                        <div class="col-md-5 mb-2">
                           <img class="img-video" src="../mediatvphapluat.congnb.com/files/News/2025/07/14/toa-dam-phap-luat-truc-tuyen-lao-dong-thoi-vu-va-bao-ve-quyen-loi-trong-thi-truong-linh-hoat-174939.jpg" alt="">
                        </div>
                        <h6 class="ms-3 align-self-start video-title">Tọa đàm Pháp Luật Trực Tuyến: Lao động thời vụ và bảo vệ quyền lợi trong thị trường linh hoạt</h6>
                     </div>
                  </a>
                                    <a href="video/toa-dam-phap-luat-truc-tuyen-di-chuc-va-quyen-thua-ke-%e2%80%93-giao-thoa-giua-truyen-thong-va-phap-luat.html">
                     <div class="d-flex video-card">
                        <div class="col-md-5 mb-2">
                           <img class="img-video" src="../mediatvphapluat.congnb.com/files/News/2025/07/08/toa-dam-phap-luat-truc-tuyen-di-chuc-va-quyen-thua-ke-giao-thoa-giua-truyen-thong-va-phap-luat-111437.jpg" alt="">
                        </div>
                        <h6 class="ms-3 align-self-start video-title">Tọa đàm Pháp Luật Trực Tuyến: Di chúc và quyền thừa kế – Giao thoa giữa truyền thống và pháp luật</h6>
                     </div>
                  </a>
                                    <a href="video/toa-dam-phap-luat-truc-tuyen-thue-%e2%80%93-cho-thue-nha-va-nhung-khuc-mac-phap-ly-dien-hinh.html">
                     <div class="d-flex video-card">
                        <div class="col-md-5 mb-2">
                           <img class="img-video" src="../mediatvphapluat.congnb.com/files/News/2025/07/08/toa-dam-phap-luat-truc-tuyen-thue-cho-thue-nha-va-nhung-khuc-mac-phap-ly-dien-hinh-163338.jpg" alt="">
                        </div>
                        <h6 class="ms-3 align-self-start video-title">Tọa đàm Pháp Luật Trực Tuyến: Thuê – Cho thuê nhà và những khúc mắc pháp lý điển hình</h6>
                     </div>
                  </a>
                                 </div>
                              <div class="carousel-item ">
                                    <a href="video/toa-dam-phap-luat-truc-tuyen-giai-phap-nao-cho-nan-o-nhiem-tieng-on-tu-am-thanh-karaoke-hang-xom.html">
                     <div class="d-flex video-card">
                        <div class="col-md-5 mb-2">
                           <img class="img-video" src="../mediatvphapluat.congnb.com/files/News/2025/07/07/toa-dam-phap-luat-truc-tuyen-giai-phap-nao-cho-nan-o-nhiem-tieng-on-tu-am-thanh-karaoke-hang-xom-163234.jpg" alt="">
                        </div>
                        <h6 class="ms-3 align-self-start video-title">Tọa đàm Pháp Luật Trực Tuyến: Giải pháp nào cho nạn ô nhiễm tiếng ồn từ âm thanh karaoke hàng xóm</h6>
                     </div>
                  </a>
                                    <a href="video/toa-dam-phap-luat-truc-tuyen-day-them-hoc-them-tu-quy-dinh-den-thuc-tien-ap-dung.html">
                     <div class="d-flex video-card">
                        <div class="col-md-5 mb-2">
                           <img class="img-video" src="../mediatvphapluat.congnb.com/files/News/2025/07/02/toa-dam-phap-luat-truc-tuyen-day-them-hoc-them--tu-quy-dinh-den-thuc-tien-ap-dung-182439.jpg" alt="">
                        </div>
                        <h6 class="ms-3 align-self-start video-title">Tọa đàm Pháp Luật Trực Tuyến: Dạy thêm, Học thêm - Từ quy định đến thực tiễn áp dụng</h6>
                     </div>
                  </a>
                                    <a href="video/thac-si-luat-su-tran-hoang-hai-phong-tham-gia-chuong-trinh-toa-dam-phap-luat-truc-tuyen-ve-chu-de-%e2%80%9cbao-luc-trong-gioi-tre-ngay-nay%e2%80%9d.html">
                     <div class="d-flex video-card">
                        <div class="col-md-5 mb-2">
                           <img class="img-video" src="../mediatvphapluat.congnb.com/files/News/2024/10/31/toa-dam-phap-luat-truc-tuyen-bao-luc-trong-gioi-tre-ngay-nay-143234.jpg" alt="">
                        </div>
                        <h6 class="ms-3 align-self-start video-title">Thạc sĩ - Luật sư Trần Hoàng Hải Phong tham gia chương trình Tọa đàm pháp luật trực tuyến về chủ đề “Bạo lực trong giới trẻ ngày nay”.</h6>
                     </div>
                  </a>
                                 </div>
                              <div class="carousel-item ">
                                    <a href="video/thac-si-luat-su-tran-hoang-hai-phong-tham-gia-chuong-trinh-toa-dam-phap-luat-truc-tuyen-ve-chu-de-%e2%80%9cphong-ngua-chay-no-tai-cac-quan-karaoke-hien-nay%e2%80%9d.html">
                     <div class="d-flex video-card">
                        <div class="col-md-5 mb-2">
                           <img class="img-video" src="../mediatvphapluat.congnb.com/upload/post/2023/10/13/toa-dam-phap-luat-truc-tuyen-phong-ngua-chay-no-tai-cac-quan-karaoke-hien-nay-20231013202134-654417.jpg" alt="">
                        </div>
                        <h6 class="ms-3 align-self-start video-title">Thạc sĩ - Luật sư Trần Hoàng Hải Phong tham gia chương trình Tọa đàm pháp luật trực tuyến về chủ đề “Phòng ngừa cháy, nổ tại các quán karaoke hiện nay”.</h6>
                     </div>
                  </a>
                                    <a href="video/thac-si-luat-su-tran-hoang-hai-phong-tham-gia-chuong-trinh-toa-dam-phap-luat-ve-chu-de-%e2%80%9ctiep-tay-cho-dong-bon-trom-cap-tai-san-co-phai-chiu-trach-nhiem-hinh-su-hay-khong%e2%80%9d.html">
                     <div class="d-flex video-card">
                        <div class="col-md-5 mb-2">
                           <img class="img-video" src="../mediatvphapluat.congnb.com/upload/post/2023/06/22/tiep-tay-cho-dong-bon-trom-cap-tai-san-co-phai-chiu-trach-nhiem-hinh-su-hay-khong-20230622154611-645691.jpg" alt="">
                        </div>
                        <h6 class="ms-3 align-self-start video-title">Thạc sĩ - Luật sư Trần Hoàng Hải Phong tham gia chương trình Tọa đàm pháp luật về chủ đề “Tiếp tay cho đồng bọn trộm cắp tài sản có phải chịu trách nhiệm hình sự hay không?”</h6>
                     </div>
                  </a>
                                    <a href="video/luat-su-tran-van-linh-tham-gia-chuong-trinh-thoi-su-phap-luat-%e2%80%9chinh-phat-nao-cho-doi-tuong-pha-huy-cong-trinh-quan-trong-ve-an-ninh-quoc-gia%e2%80%9d.html">
                     <div class="d-flex video-card">
                        <div class="col-md-5 mb-2">
                           <img class="img-video" src="../mediatvphapluat.congnb.com/upload/post/2023/06/16/hinh-phat-nao-cho-doi-tuong-pha-huy-cong-trinh-quan-trong-ve-an-ninh-quoc-gia-20230616103245-952519.jpg" alt="">
                        </div>
                        <h6 class="ms-3 align-self-start video-title">Luật sư Trần Vân Linh tham gia chương trình Thời sự pháp luật “Hình phạt nào cho đối tượng phá hủy công trình quan trọng về an ninh quốc gia?”</h6>
                     </div>
                  </a>
                                 </div>
                              <div class="carousel-item ">
                                    <a href="video/luat-su-tran-van-linh-tham-gia-chuong-trinh-thoi-su-phap-luat-%e2%80%9cxay-nha-vuot-qua-dien-tich-dat-o-tren-so-do-nguoi-su-dung-dat-lam-the-nao-de-hop-phap-hoa-phan-dat-du-nay%e2%80%9d.html">
                     <div class="d-flex video-card">
                        <div class="col-md-5 mb-2">
                           <img class="img-video" src="../mediatvphapluat.congnb.com/upload/post/2023/06/16/xay-nha-vuot-qua-dien-tich-dat-o-tren-so-do-nguoi-su-dung-dat-lam-the-nao-de-hop-phap-hoa-phan-dat-du-nay-20230616100318-107736.jpg" alt="">
                        </div>
                        <h6 class="ms-3 align-self-start video-title">Luật sư Trần Vân Linh tham gia chương trình Thời sự pháp luật “Xây nhà vượt quá diện tích đất ở trên Sổ đỏ, người sử dụng đất làm thế nào để hợp pháp hóa phần đất dư này?”</h6>
                     </div>
                  </a>
                                    <a href="video/thac-si-luat-su-tran-hoang-hai-phong-tham-gia-chuong-trinh-toa-dam-phap-luat-truc-tuyen-ve-chu-de-%e2%80%9cthi-truong-bat-dong-san-co-tin-hieu-phuc-hoi-sau-nghi-quyet-so-33%e2%80%9d.html">
                     <div class="d-flex video-card">
                        <div class="col-md-5 mb-2">
                           <img class="img-video" src="../mediatvphapluat.congnb.com/upload/post/2023/04/18/toa-dam-phap-luat-truc-tuyen-thi-truong-bat-dong-san-co-tin-hieu-hoi-phuc-sau-nghi-quyet-so-33-20230418202538-805271.jpg" alt="">
                        </div>
                        <h6 class="ms-3 align-self-start video-title">Thạc sĩ - Luật sư Trần Hoàng Hải Phong tham gia chương trình Tọa đàm pháp luật trực tuyến về chủ đề “Thị trường bất động sản có tín hiệu phục hồi sau Nghị quyết số 33”.</h6>
                     </div>
                  </a>
                                    <a href="video/thac-si-luat-su-tran-hoang-hai-phong-tham-gia-chuong-trinh-toa-dam-phap-luat-truc-tuyen-ve-chu-de-%e2%80%9cgoc-nhin-phap-ly-trong-sua-doi-nghi-dinh-65-se-giai-quyet-nhung-van-de-bat-cap-ve-tr">
                     <div class="d-flex video-card">
                        <div class="col-md-5 mb-2">
                           <img class="img-video" src="../mediatvphapluat.congnb.com/upload/post/2023/02/16/toa-dam-phap-luat-truc-tuyen-goc-nhin-phap-ly-trong-sua-doi-nd65-se-giai-quyet-nhung-van-de-bat-cap-ve-trai-phieu-hien-nay-20230216174822-998858.49.de" alt="">
                        </div>
                        <h6 class="ms-3 align-self-start video-title">Thạc sĩ - Luật sư Trần Hoàng Hải Phong tham gia chương trình Tọa đàm pháp luật trực tuyến về chủ đề “Góc nhìn pháp lý trong sửa đổi Nghị định 65 sẽ giải quyết những vấn đề bất cập về trái phiếu hiện nay”.</h6>
                     </div>
                  </a>
                                 </div>
                              
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
                           <?php the_post_thumbnail('full', array('class' => 'img-fluid', 'alt' => get_the_title())); ?>
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



<section class="">
   <div class="container">
      <div class="sponsor-carousel">
         <div class="sponsor-track">
            <!-- Lặp lại các logo để tạo hiệu ứng nối đuôi -->
            <img src="public/img/logo/l1.jpg" alt="Nhà Tài Trợ 1">
            <img src="public/img/logo/l2.jpg" alt="Nhà Tài Trợ 2">
            <img src="public/img/logo/l3.jpg" alt="Nhà Tài Trợ 3">
            <img src="public/img/logo/l4.jpg" alt="Nhà Tài Trợ 4">
            <img src="public/img/logo/l1.jpg" alt="Nhà Tài Trợ 1">
            <img src="public/img/logo/l2.jpg" alt="Nhà Tài Trợ 2">
            <img src="public/img/logo/l3.jpg" alt="Nhà Tài Trợ 3">
            <img src="public/img/logo/l4.jpg" alt="Nhà Tài Trợ 4">
         </div>
      </div>
   </div>
</section>




   <div class="container-fluid bg-primary">
   <div class="py-5">
      <div class="col-md-12 text-center">
         <h3 class="stick text-white">"TVL
            Legal
            System
            - Đồng hành
            pháp lý, kiến
            tạo niềm
            tin!"</h3>
      </div>
   </div>
</div>

</div>

<?php get_footer(); ?>
