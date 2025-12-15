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

// Register Team Members Custom Post Type
function tvl_register_team_post_type() {
    $labels = array(
        'name' => 'Thành Viên',
        'singular_name' => 'Thành Viên',
        'menu_name' => 'Thành Viên',
        'add_new' => 'Thêm Mới',
        'add_new_item' => 'Thêm Thành Viên Mới',
        'edit_item' => 'Sửa Thành Viên',
        'new_item' => 'Thành Viên Mới',
        'view_item' => 'Xem Thành Viên',
        'search_items' => 'Tìm Thành Viên',
        'not_found' => 'Không tìm thấy thành viên',
        'not_found_in_trash' => 'Không có thành viên trong thùng rác'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'menu_icon' => 'dashicons-groups',
        'supports' => array('title', 'thumbnail', 'editor'),
        'rewrite' => array('slug' => 'team'),
        'menu_position' => 5,
    );

    register_post_type('team_member', $args);
}
add_action('init', 'tvl_register_team_post_type');

// Add Meta Boxes for Team Member Positions
function tvl_team_meta_boxes() {
    add_meta_box(
        'team_positions',
        'Chức Vụ',
        'tvl_team_positions_callback',
        'team_member',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'tvl_team_meta_boxes');

function tvl_team_positions_callback($post) {
    wp_nonce_field('tvl_save_team_positions', 'tvl_team_positions_nonce');

    $positions = get_post_meta($post->ID, '_team_positions', true);
    $positions = $positions ? $positions : array();

    echo '<div id="team-positions-wrapper">';

    if (!empty($positions)) {
        foreach ($positions as $index => $position) {
            echo '<div class="position-row" style="margin-bottom: 10px;">';
            echo '<input type="text" name="team_positions[]" value="' . esc_attr($position) . '" style="width: 80%;" placeholder="VD: Founder - TVL Legal System" />';
            echo ' <button type="button" class="button remove-position">Xóa</button>';
            echo '</div>';
        }
    }

    echo '</div>';
    echo '<button type="button" class="button" id="add-position">Thêm Chức Vụ</button>';

    ?>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        $('#add-position').on('click', function() {
            var html = '<div class="position-row" style="margin-bottom: 10px;">';
            html += '<input type="text" name="team_positions[]" value="" style="width: 80%;" placeholder="VD: Founder - TVL Legal System" />';
            html += ' <button type="button" class="button remove-position">Xóa</button>';
            html += '</div>';
            $('#team-positions-wrapper').append(html);
        });

        $(document).on('click', '.remove-position', function() {
            $(this).parent('.position-row').remove();
        });
    });
    </script>
    <?php
}

function tvl_save_team_positions($post_id) {
    if (!isset($_POST['tvl_team_positions_nonce'])) {
        return;
    }

    if (!wp_verify_nonce($_POST['tvl_team_positions_nonce'], 'tvl_save_team_positions')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['team_positions'])) {
        $positions = array_filter($_POST['team_positions']);
        update_post_meta($post_id, '_team_positions', $positions);
    } else {
        delete_post_meta($post_id, '_team_positions');
    }
}
add_action('save_post_team_member', 'tvl_save_team_positions');

// Add Menu Order column to Team Members admin
function tvl_team_columns($columns) {
    $columns['menu_order'] = 'Thứ Tự';
    return $columns;
}
add_filter('manage_team_member_posts_columns', 'tvl_team_columns');

function tvl_team_column_content($column_name, $post_id) {
    if ($column_name == 'menu_order') {
        $order = get_post_field('menu_order', $post_id);
        echo $order;
    }
}
add_action('manage_team_member_posts_custom_column', 'tvl_team_column_content', 10, 2);

// Make team members sortable
function tvl_team_sortable_columns($columns) {
    $columns['menu_order'] = 'menu_order';
    return $columns;
}
add_filter('manage_edit-team_member_sortable_columns', 'tvl_team_sortable_columns');

// Enable menu_order support for team members
function tvl_team_enable_menu_order() {
    add_post_type_support('team_member', 'page-attributes');
}
add_action('init', 'tvl_team_enable_menu_order');

// Add Duplicate link to Team Member row actions
function tvl_duplicate_team_member_link($actions, $post) {
    if ($post->post_type == 'team_member') {
        if (current_user_can('edit_posts')) {
            $actions['duplicate'] = '<a href="' . wp_nonce_url(admin_url('admin.php?action=tvl_duplicate_team_member&post=' . $post->ID), 'tvl_duplicate_' . $post->ID, 'tvl_duplicate_nonce') . '" title="Sao chép thành viên này" rel="permalink">Sao chép</a>';
        }
    }
    return $actions;
}
add_filter('post_row_actions', 'tvl_duplicate_team_member_link', 10, 2);

// Handle Team Member Duplication
function tvl_duplicate_team_member() {
    // Check if action is set
    if (empty($_GET['post'])) {
        wp_die('Không tìm thấy thành viên để sao chép!');
    }

    // Get the original post ID
    $post_id = absint($_GET['post']);

    // Verify nonce
    if (!isset($_GET['tvl_duplicate_nonce']) || !wp_verify_nonce($_GET['tvl_duplicate_nonce'], 'tvl_duplicate_' . $post_id)) {
        wp_die('Security check failed');
    }

    // Check permissions
    if (!current_user_can('edit_posts')) {
        wp_die('Bạn không có quyền thực hiện hành động này');
    }

    // Get the original post
    $post = get_post($post_id);

    if (!$post || $post->post_type != 'team_member') {
        wp_die('Thành viên không tồn tại hoặc đã bị xóa!');
    }

    // Create new post array
    $new_post = array(
        'post_title' => $post->post_title . ' (Copy)',
        'post_content' => $post->post_content,
        'post_status' => 'draft', // Set as draft for review
        'post_type' => 'team_member',
        'post_author' => get_current_user_id(),
        'menu_order' => $post->menu_order
    );

    // Insert the new post
    $new_post_id = wp_insert_post($new_post);

    if (is_wp_error($new_post_id)) {
        wp_die('Lỗi khi tạo bản sao: ' . $new_post_id->get_error_message());
    }

    // Duplicate post meta (positions)
    $positions = get_post_meta($post_id, '_team_positions', true);
    if ($positions) {
        update_post_meta($new_post_id, '_team_positions', $positions);
    }

    // Duplicate featured image
    $thumbnail_id = get_post_thumbnail_id($post_id);
    if ($thumbnail_id) {
        set_post_thumbnail($new_post_id, $thumbnail_id);
    }

    // Duplicate all other post meta
    $post_meta = get_post_meta($post_id);
    if ($post_meta) {
        foreach ($post_meta as $meta_key => $meta_values) {
            // Skip _team_positions as we already handled it
            if ($meta_key == '_team_positions' || $meta_key == '_thumbnail_id') {
                continue;
            }

            foreach ($meta_values as $meta_value) {
                add_post_meta($new_post_id, $meta_key, maybe_unserialize($meta_value));
            }
        }
    }

    // Redirect to edit the new post
    wp_redirect(admin_url('post.php?action=edit&post=' . $new_post_id));
    exit;
}
add_action('admin_action_tvl_duplicate_team_member', 'tvl_duplicate_team_member');

// Add admin notice after duplication
function tvl_duplicate_admin_notice() {
    global $post;

    if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($post) && $post->post_type == 'team_member' && strpos($post->post_title, '(Copy)') !== false) {
        ?>
        <div class="notice notice-success is-dismissible">
            <p><strong>Thành viên đã được sao chép thành công!</strong> Bạn đang chỉnh sửa bản sao. Hãy cập nhật thông tin và xuất bản khi hoàn tất.</p>
        </div>
        <?php
    }
}
add_action('admin_notices', 'tvl_duplicate_admin_notice');

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
