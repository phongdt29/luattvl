<?php
/** Header for TVL Legal System theme **/
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com/">
   <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
   <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;family=Roboto:wght@400;500;700;900&amp;display=swap"
      rel="stylesheet">

   <!-- Icon Font Stylesheet -->
   <link rel="stylesheet" href="public/libs/font-awesome/6.7.1/css/all.min.css"/>
   <link href="public/fonts/bootstrap-icons.css" rel="stylesheet">

   <!-- Libraries Stylesheet -->
   <link rel="stylesheet" href="public/lib/animate/animate.min.css" />
   <link href="public/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
   <link href="public/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


   <!-- Customized Bootstrap Stylesheet -->
   <link href="public/css/bootstrap.min.css" rel="stylesheet">

   <!-- Template Stylesheet -->
   <link href="public/css/style.css" rel="stylesheet">
   <link rel="stylesheet" href="public/css/css.css">
   <link rel="stylesheet" href="public/css/ionicons.min.css">
   <link rel="stylesheet" href="public/css/icomoon.css">
   <!-- Bootstrap CSS -->

   <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
<nav class="navbar navbar-expand-lg navbar-light">
   <div class="row">
      <a href="index.html" class="navbar-brand p-0">
         <img src="public/img/logo.png" alt="Logo">
      </a>
   </div>
   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <i class="fa fa-bars"></i>
   </button>
   <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="navbar-nav ms-auto py-0">
         <a href="index.html" class="nav-item nav-link">Trang chủ</a>
         <div class="nav-item dropdown">
            <a class="nav-link" data-bs-toggle="dropdown">Giới thiệu</a>
            <div class="dropdown-menu m-0">
               <a href="about_1.html" class="dropdown-item">TVL Legal System</a>
               <a href="about_2.html" class="dropdown-item">Văn phòng luật sư Trần Vân Linh</a>
               <a href="about_3.html" class="dropdown-item">Công ty Luật TNHH TVL</a>
            </div>
         </div>
         <div class="nav-item dropdown">
            <a class="nav-link" data-bs-toggle="dropdown">Lĩnh vực</a>
            <div class="dropdown-menu m-0">
               <a href="cat_1.html" class="dropdown-item">Luật sư Tranh tụng</a>
               <a href="cat_2.html" class="dropdown-item">Tố tụng tại Trọng tài</a>
               <a href="cat_3.html" class="dropdown-item">Đầu tư & Doanh nghiệp</a> <a
                  href="cat_4.html" class="dropdown-item">Sở hữu trí tuệ</a>
               <a href="cat_5.html" class="dropdown-item">Lao Động</a>
               <a href="cat_6.html" class="dropdown-item">Kế Toán - Thuế</a>
               <a href="cat_7.html" class="dropdown-item">Bất động sản & Xây dựng</a>
               <a href="cat_8.html" class="dropdown-item">Mua bán & Sáp nhập (M&A )</a>
               <a href="cat_9.html" class="dropdown-item">Tài chính - Ngân hàng</a>
               <a href="cat_10.html" class="dropdown-item">Hôn nhân và gia đình - Thừa kế</a>
            </div>
         </div>
         
         
         <a href="team.html" class="nav-item nav-link">Đội ngũ</a>
         <a href="contact.html" class="nav-item nav-link">Liên hệ</a>
      </div>
   </div>
</nav>
</header>
