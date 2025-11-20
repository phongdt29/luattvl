<?php
function tvl_setup_theme() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    register_nav_menus(array(
        'main-menu' => __('Main Menu', 'tvl'),
    ));
}
add_action('after_setup_theme', 'tvl_setup_theme');

// function tvl_enqueue_assets() {
//     // IMPORTANT: copy your original 'public' folder into the theme root (tvl-legal/public) so these files exist
//     wp_enqueue_style('bootstrap', get_template_directory_uri() . '/public/css/bootstrap.min.css');
//     wp_enqueue_style('tvl-style', get_stylesheet_uri());
//     wp_enqueue_style('tvl-main-style', get_template_directory_uri() . '/public/css/style.css');

//     wp_enqueue_script('jquery');
//     wp_enqueue_script('bootstrap-bundle', get_template_directory_uri() . '/public/js/bootstrap.bundle.min.js', array('jquery'), null, true);
//     wp_enqueue_script('tvl-main', get_template_directory_uri() . '/public/js/main.js', array('jquery'), null, true);
// }
// add_action('wp_enqueue_scripts', 'tvl_enqueue_assets');
