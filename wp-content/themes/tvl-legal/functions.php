<?php
function tvl_setup_theme() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    register_nav_menus(array(
        'main-menu' => __('Main Menu', 'tvl'),
    ));
}
add_action('after_setup_theme', 'tvl_setup_theme');

// Register Widget Areas
function tvl_widgets_init() {
    register_sidebar(array(
        'name' => __('Footer - Logo & Social', 'tvl'),
        'id' => 'footer-1',
        'description' => __('Widget area for logo and social links', 'tvl'),
        'before_widget' => '<div class="footer-item">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="text-white mb-4">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => __('Footer - Contact Info', 'tvl'),
        'id' => 'footer-2',
        'description' => __('Widget area for contact information', 'tvl'),
        'before_widget' => '<div class="footer-item">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="text-white mb-4">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => __('Footer - Working Hours', 'tvl'),
        'id' => 'footer-3',
        'description' => __('Widget area for working hours', 'tvl'),
        'before_widget' => '<div class="footer-item">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="text-white mb-4">',
        'after_title' => '</h4>',
    ));
}
add_action('widgets_init', 'tvl_widgets_init');

// Custom Walker for Bootstrap 5 Nav Menu
class WP_Bootstrap_Navwalker extends Walker_Nav_Menu {

    function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class=\"dropdown-menu m-0\">\n";
    }

    function end_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</div>\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'nav-item';

        if ($args->walker->has_children) {
            $classes[] = 'dropdown';
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));

        if ($depth === 0) {
            $output .= $indent . '<div class="' . esc_attr($class_names) . '">';
        }

        $atts = array();
        $atts['title'] = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel'] = !empty($item->xfn) ? $item->xfn : '';
        $atts['href'] = !empty($item->url) ? $item->url : '';

        if ($depth === 0) {
            $atts['class'] = 'nav-link';
            if ($args->walker->has_children) {
                $atts['class'] .= ' dropdown-toggle';
                $atts['data-bs-toggle'] = 'dropdown';
                $atts['role'] = 'button';
                $atts['aria-expanded'] = 'false';
            }
        } else {
            $atts['class'] = 'dropdown-item';
        }

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    function end_el(&$output, $item, $depth = 0, $args = array()) {
        if ($depth === 0) {
            $output .= "</div>\n";
        }
    }
}

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
