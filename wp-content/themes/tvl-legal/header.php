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
   <link rel="stylesheet" href="/public/libs/font-awesome/6.7.1/css/all.min.css"/>
   <link href="/public/fonts/bootstrap-icons.css" rel="stylesheet">

   <!-- Libraries Stylesheet -->
   <link rel="stylesheet" href="/public/lib/animate/animate.min.css" />
   <link href="/public/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
   <link href="/public/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


   <!-- Customized Bootstrap Stylesheet -->
   <link href="/public/css/bootstrap.min.css" rel="stylesheet">

   <!-- Template Stylesheet -->
   <link href="/public/css/style.css" rel="stylesheet">
   <link rel="stylesheet" href="/public/css/css.css">
   <link rel="stylesheet" href="/public/css/ionicons.min.css">
   <link rel="stylesheet" href="/public/css/icomoon.css">
   <!-- Bootstrap CSS -->

   <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
<nav class="navbar navbar-expand-lg navbar-light">
   <div class="row">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand p-0">
         <img src="<?php echo get_template_directory_uri(); ?>/public/img/logo.png" alt="<?php bloginfo('name'); ?>">
      </a>
   </div>
   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <i class="fa fa-bars"></i>
   </button>
   <div class="collapse navbar-collapse" id="navbarCollapse">
      <?php
      wp_nav_menu(array(
         'theme_location' => 'main-menu',
         'container' => false,
         'menu_class' => 'navbar-nav ms-auto py-0',
         'fallback_cb' => false,
         'depth' => 2,
         'walker' => new WP_Bootstrap_Navwalker()
      ));
      ?>
   </div>
</nav>
</header>
