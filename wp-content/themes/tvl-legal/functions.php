<?php

// Include Admin Guide
require_once get_template_directory() . '/admin/huong-dan-su-dung.php';

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
        $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
    }

    function end_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'nav-item';

        if ($args->walker->has_children) {
            $classes[] = 'dropdown';
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));

        $output .= $indent . '<li class="' . esc_attr($class_names) . '">';

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
        $output .= "</li>\n";
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

// Register Sponsors Custom Post Type
function tvl_register_sponsor_post_type() {
    $labels = array(
        'name' => 'Nhà Tài Trợ',
        'singular_name' => 'Nhà Tài Trợ',
        'menu_name' => 'Nhà Tài Trợ',
        'add_new' => 'Thêm Mới',
        'add_new_item' => 'Thêm Nhà Tài Trợ Mới',
        'edit_item' => 'Sửa Nhà Tài Trợ',
        'new_item' => 'Nhà Tài Trợ Mới',
        'view_item' => 'Xem Nhà Tài Trợ',
        'search_items' => 'Tìm Nhà Tài Trợ',
        'not_found' => 'Không tìm thấy nhà tài trợ',
        'not_found_in_trash' => 'Không có nhà tài trợ trong thùng rác'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'publicly_queryable' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'menu_icon' => 'dashicons-heart',
        'supports' => array('title', 'thumbnail'),
        'menu_position' => 6,
    );

    register_post_type('sponsor', $args);
}
add_action('init', 'tvl_register_sponsor_post_type');

// Add Meta Boxes for Sponsor Link
function tvl_sponsor_meta_boxes() {
    add_meta_box(
        'sponsor_link',
        'Thông Tin Nhà Tài Trợ',
        'tvl_sponsor_link_callback',
        'sponsor',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'tvl_sponsor_meta_boxes');

function tvl_sponsor_link_callback($post) {
    wp_nonce_field('tvl_save_sponsor_meta', 'tvl_sponsor_meta_nonce');

    $sponsor_url = get_post_meta($post->ID, '_sponsor_url', true);
    $open_new_tab = get_post_meta($post->ID, '_sponsor_new_tab', true);

    ?>
    <table class="form-table">
        <tr>
            <th><label for="sponsor_url">Website URL</label></th>
            <td>
                <input type="url" id="sponsor_url" name="sponsor_url" value="<?php echo esc_url($sponsor_url); ?>" class="regular-text" placeholder="https://example.com">
                <p class="description">Nhập link website của nhà tài trợ (không bắt buộc)</p>
            </td>
        </tr>
        <tr>
            <th><label for="sponsor_new_tab">Mở trong tab mới</label></th>
            <td>
                <label>
                    <input type="checkbox" id="sponsor_new_tab" name="sponsor_new_tab" value="1" <?php checked($open_new_tab, '1'); ?>>
                    Mở link trong tab mới
                </label>
            </td>
        </tr>
    </table>
    <?php
}

function tvl_save_sponsor_meta($post_id) {
    if (!isset($_POST['tvl_sponsor_meta_nonce'])) {
        return;
    }

    if (!wp_verify_nonce($_POST['tvl_sponsor_meta_nonce'], 'tvl_save_sponsor_meta')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['sponsor_url'])) {
        update_post_meta($post_id, '_sponsor_url', esc_url_raw($_POST['sponsor_url']));
    } else {
        delete_post_meta($post_id, '_sponsor_url');
    }

    if (isset($_POST['sponsor_new_tab'])) {
        update_post_meta($post_id, '_sponsor_new_tab', '1');
    } else {
        delete_post_meta($post_id, '_sponsor_new_tab');
    }
}
add_action('save_post_sponsor', 'tvl_save_sponsor_meta');

// Enable menu_order support for sponsors
function tvl_sponsor_enable_menu_order() {
    add_post_type_support('sponsor', 'page-attributes');
}
add_action('init', 'tvl_sponsor_enable_menu_order');

// Add Menu Order column to Sponsors admin
function tvl_sponsor_columns($columns) {
    $new_columns = array();
    $new_columns['cb'] = $columns['cb'];
    $new_columns['thumbnail'] = 'Logo';
    $new_columns['title'] = 'Tên Nhà Tài Trợ';
    $new_columns['sponsor_url'] = 'Website';
    $new_columns['menu_order'] = 'Thứ Tự';
    $new_columns['date'] = $columns['date'];
    return $new_columns;
}
add_filter('manage_sponsor_posts_columns', 'tvl_sponsor_columns');

function tvl_sponsor_column_content($column_name, $post_id) {
    if ($column_name == 'menu_order') {
        $order = get_post_field('menu_order', $post_id);
        echo $order;
    }

    if ($column_name == 'thumbnail') {
        $thumbnail = get_the_post_thumbnail($post_id, array(60, 60));
        echo $thumbnail ? $thumbnail : '—';
    }

    if ($column_name == 'sponsor_url') {
        $url = get_post_meta($post_id, '_sponsor_url', true);
        if ($url) {
            echo '<a href="' . esc_url($url) . '" target="_blank">' . esc_html($url) . '</a>';
        } else {
            echo '—';
        }
    }
}
add_action('manage_sponsor_posts_custom_column', 'tvl_sponsor_column_content', 10, 2);

// Make sponsors sortable
function tvl_sponsor_sortable_columns($columns) {
    $columns['menu_order'] = 'menu_order';
    return $columns;
}
add_filter('manage_edit-sponsor_sortable_columns', 'tvl_sponsor_sortable_columns');

// Add Duplicate link to Sponsor row actions
function tvl_duplicate_sponsor_link($actions, $post) {
    if ($post->post_type == 'sponsor') {
        if (current_user_can('edit_posts')) {
            $actions['duplicate'] = '<a href="' . wp_nonce_url(admin_url('admin.php?action=tvl_duplicate_sponsor&post=' . $post->ID), 'tvl_duplicate_sponsor_' . $post->ID, 'tvl_duplicate_nonce') . '" title="Sao chép nhà tài trợ này" rel="permalink">Sao chép</a>';
        }
    }
    return $actions;
}
add_filter('post_row_actions', 'tvl_duplicate_sponsor_link', 10, 2);

// Handle Sponsor Duplication
function tvl_duplicate_sponsor() {
    if (empty($_GET['post'])) {
        wp_die('Không tìm thấy nhà tài trợ để sao chép!');
    }

    $post_id = absint($_GET['post']);

    if (!isset($_GET['tvl_duplicate_nonce']) || !wp_verify_nonce($_GET['tvl_duplicate_nonce'], 'tvl_duplicate_sponsor_' . $post_id)) {
        wp_die('Security check failed');
    }

    if (!current_user_can('edit_posts')) {
        wp_die('Bạn không có quyền thực hiện hành động này');
    }

    $post = get_post($post_id);

    if (!$post || $post->post_type != 'sponsor') {
        wp_die('Nhà tài trợ không tồn tại hoặc đã bị xóa!');
    }

    $new_post = array(
        'post_title' => $post->post_title . ' (Copy)',
        'post_status' => 'draft',
        'post_type' => 'sponsor',
        'post_author' => get_current_user_id(),
        'menu_order' => $post->menu_order
    );

    $new_post_id = wp_insert_post($new_post);

    if (is_wp_error($new_post_id)) {
        wp_die('Lỗi khi tạo bản sao: ' . $new_post_id->get_error_message());
    }

    // Duplicate meta
    $sponsor_url = get_post_meta($post_id, '_sponsor_url', true);
    if ($sponsor_url) {
        update_post_meta($new_post_id, '_sponsor_url', $sponsor_url);
    }

    $new_tab = get_post_meta($post_id, '_sponsor_new_tab', true);
    if ($new_tab) {
        update_post_meta($new_post_id, '_sponsor_new_tab', $new_tab);
    }

    // Duplicate featured image
    $thumbnail_id = get_post_thumbnail_id($post_id);
    if ($thumbnail_id) {
        set_post_thumbnail($new_post_id, $thumbnail_id);
    }

    wp_redirect(admin_url('post.php?action=edit&post=' . $new_post_id));
    exit;
}
add_action('admin_action_tvl_duplicate_sponsor', 'tvl_duplicate_sponsor');

// Register Videos Custom Post Type
function tvl_register_video_post_type() {
    $labels = array(
        'name' => 'Video',
        'singular_name' => 'Video',
        'menu_name' => 'Video',
        'add_new' => 'Thêm Mới',
        'add_new_item' => 'Thêm Video Mới',
        'edit_item' => 'Sửa Video',
        'new_item' => 'Video Mới',
        'view_item' => 'Xem Video',
        'search_items' => 'Tìm Video',
        'not_found' => 'Không tìm thấy video',
        'not_found_in_trash' => 'Không có video trong thùng rác'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'menu_icon' => 'dashicons-video-alt3',
        'supports' => array('title', 'thumbnail', 'editor', 'excerpt'),
        'rewrite' => array('slug' => 'video'),
        'menu_position' => 7,
    );

    register_post_type('video', $args);
}
add_action('init', 'tvl_register_video_post_type');

// Add Meta Boxes for Video
function tvl_video_meta_boxes() {
    add_meta_box(
        'video_info',
        'Thông Tin Video',
        'tvl_video_info_callback',
        'video',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'tvl_video_meta_boxes');

function tvl_video_info_callback($post) {
    wp_nonce_field('tvl_save_video_meta', 'tvl_video_meta_nonce');

    $video_url = get_post_meta($post->ID, '_video_url', true);
    $external_thumbnail = get_post_meta($post->ID, '_external_thumbnail', true);

    ?>
    <table class="form-table">
        <tr>
            <th><label for="video_url">Link Video</label></th>
            <td>
                <input type="url" id="video_url" name="video_url" value="<?php echo esc_url($video_url); ?>" class="large-text" placeholder="https://example.com/video.html">
                <p class="description">Nhập link đến trang video (bắt buộc)</p>
            </td>
        </tr>
        <tr>
            <th><label for="external_thumbnail">Link Ảnh Thumbnail (Tùy chọn)</label></th>
            <td>
                <input type="url" id="external_thumbnail" name="external_thumbnail" value="<?php echo esc_url($external_thumbnail); ?>" class="large-text" placeholder="https://example.com/image.jpg">
                <p class="description">Nhập link ảnh thumbnail từ nguồn bên ngoài (nếu không có thì dùng Featured Image)</p>
            </td>
        </tr>
    </table>
    <?php
}

function tvl_save_video_meta($post_id) {
    if (!isset($_POST['tvl_video_meta_nonce'])) {
        return;
    }

    if (!wp_verify_nonce($_POST['tvl_video_meta_nonce'], 'tvl_save_video_meta')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['video_url'])) {
        update_post_meta($post_id, '_video_url', esc_url_raw($_POST['video_url']));
    } else {
        delete_post_meta($post_id, '_video_url');
    }

    if (isset($_POST['external_thumbnail']) && !empty($_POST['external_thumbnail'])) {
        update_post_meta($post_id, '_external_thumbnail', esc_url_raw($_POST['external_thumbnail']));
    } else {
        delete_post_meta($post_id, '_external_thumbnail');
    }
}
add_action('save_post_video', 'tvl_save_video_meta');

// Enable menu_order support for videos
function tvl_video_enable_menu_order() {
    add_post_type_support('video', 'page-attributes');
}
add_action('init', 'tvl_video_enable_menu_order');

// Add custom columns to Videos admin
function tvl_video_columns($columns) {
    $new_columns = array();
    $new_columns['cb'] = $columns['cb'];
    $new_columns['thumbnail'] = 'Thumbnail';
    $new_columns['title'] = 'Tiêu Đề';
    $new_columns['video_url'] = 'Link Video';
    $new_columns['menu_order'] = 'Thứ Tự';
    $new_columns['date'] = $columns['date'];
    return $new_columns;
}
add_filter('manage_video_posts_columns', 'tvl_video_columns');

function tvl_video_column_content($column_name, $post_id) {
    if ($column_name == 'menu_order') {
        $order = get_post_field('menu_order', $post_id);
        echo $order;
    }

    if ($column_name == 'thumbnail') {
        $external_thumb = get_post_meta($post_id, '_external_thumbnail', true);
        if ($external_thumb) {
            echo '<img src="' . esc_url($external_thumb) . '" style="width:60px;height:60px;object-fit:cover;">';
        } else {
            $thumbnail = get_the_post_thumbnail($post_id, array(60, 60));
            echo $thumbnail ? $thumbnail : '—';
        }
    }

    if ($column_name == 'video_url') {
        $url = get_post_meta($post_id, '_video_url', true);
        if ($url) {
            echo '<a href="' . esc_url($url) . '" target="_blank">Xem video</a>';
        } else {
            echo '—';
        }
    }
}
add_action('manage_video_posts_custom_column', 'tvl_video_column_content', 10, 2);

// Make videos sortable
function tvl_video_sortable_columns($columns) {
    $columns['menu_order'] = 'menu_order';
    return $columns;
}
add_filter('manage_edit-video_sortable_columns', 'tvl_video_sortable_columns');

// Add Duplicate link to Video row actions
function tvl_duplicate_video_link($actions, $post) {
    if ($post->post_type == 'video') {
        if (current_user_can('edit_posts')) {
            $actions['duplicate'] = '<a href="' . wp_nonce_url(admin_url('admin.php?action=tvl_duplicate_video&post=' . $post->ID), 'tvl_duplicate_video_' . $post->ID, 'tvl_duplicate_nonce') . '" title="Sao chép video này" rel="permalink">Sao chép</a>';
        }
    }
    return $actions;
}
add_filter('post_row_actions', 'tvl_duplicate_video_link', 10, 2);

// Handle Video Duplication
function tvl_duplicate_video() {
    if (empty($_GET['post'])) {
        wp_die('Không tìm thấy video để sao chép!');
    }

    $post_id = absint($_GET['post']);

    if (!isset($_GET['tvl_duplicate_nonce']) || !wp_verify_nonce($_GET['tvl_duplicate_nonce'], 'tvl_duplicate_video_' . $post_id)) {
        wp_die('Security check failed');
    }

    if (!current_user_can('edit_posts')) {
        wp_die('Bạn không có quyền thực hiện hành động này');
    }

    $post = get_post($post_id);

    if (!$post || $post->post_type != 'video') {
        wp_die('Video không tồn tại hoặc đã bị xóa!');
    }

    $new_post = array(
        'post_title' => $post->post_title . ' (Copy)',
        'post_content' => $post->post_content,
        'post_excerpt' => $post->post_excerpt,
        'post_status' => 'draft',
        'post_type' => 'video',
        'post_author' => get_current_user_id(),
        'menu_order' => $post->menu_order
    );

    $new_post_id = wp_insert_post($new_post);

    if (is_wp_error($new_post_id)) {
        wp_die('Lỗi khi tạo bản sao: ' . $new_post_id->get_error_message());
    }

    // Duplicate meta
    $video_url = get_post_meta($post_id, '_video_url', true);
    if ($video_url) {
        update_post_meta($new_post_id, '_video_url', $video_url);
    }

    $external_thumb = get_post_meta($post_id, '_external_thumbnail', true);
    if ($external_thumb) {
        update_post_meta($new_post_id, '_external_thumbnail', $external_thumb);
    }

    // Duplicate featured image
    $thumbnail_id = get_post_thumbnail_id($post_id);
    if ($thumbnail_id) {
        set_post_thumbnail($new_post_id, $thumbnail_id);
    }

    wp_redirect(admin_url('post.php?action=edit&post=' . $new_post_id));
    exit;
}
add_action('admin_action_tvl_duplicate_video', 'tvl_duplicate_video');

// Add custom CSS for Contact Form 7 styling
function tvl_cf7_custom_styles() {
    ?>
    <style>
        /* Contact Form 7 Custom Styles */
        .tvl-contact-form .wpcf7-form {
            margin: 0;
        }

        .tvl-contact-form .wpcf7-form-control-wrap {
            display: block;
            width: 100%;
        }

        .tvl-contact-form input[type="text"],
        .tvl-contact-form input[type="email"],
        .tvl-contact-form input[type="tel"],
        .tvl-contact-form textarea,
        .tvl-contact-form select {
            width: 100%;
            padding: 1rem 0.75rem;
            border: 0;
            border-radius: 0.25rem;
            background-color: #fff;
            font-size: 1rem;
            line-height: 1.5;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .tvl-contact-form input[type="text"]:focus,
        .tvl-contact-form input[type="email"]:focus,
        .tvl-contact-form input[type="tel"]:focus,
        .tvl-contact-form textarea:focus,
        .tvl-contact-form select:focus {
            outline: 0;
            border-color: #0275ff;
            box-shadow: 0 0 0 0.25rem rgba(2, 117, 255, 0.25);
        }

        .tvl-contact-form textarea {
            min-height: 160px;
            resize: vertical;
        }

        .tvl-contact-form .wpcf7-submit {
            width: 100%;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            border: none;
            border-radius: 0.25rem;
            background-color: #0275ff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.15s ease-in-out;
        }

        .tvl-contact-form .wpcf7-submit:hover {
            background-color: #0056b3;
        }

        .tvl-contact-form .wpcf7-spinner {
            margin-left: 10px;
        }

        .tvl-contact-form .wpcf7-response-output {
            margin: 1rem 0 0;
            padding: 0.75rem 1.25rem;
            border: 1px solid transparent;
            border-radius: 0.25rem;
        }

        .tvl-contact-form .wpcf7-validation-errors,
        .tvl-contact-form .wpcf7-acceptance-missing {
            color: #842029;
            background-color: #f8d7da;
            border-color: #f5c2c7;
        }

        .tvl-contact-form .wpcf7-mail-sent-ok {
            color: #0f5132;
            background-color: #d1e7dd;
            border-color: #badbcc;
        }

        .tvl-contact-form .wpcf7-mail-sent-ng,
        .tvl-contact-form .wpcf7-aborted {
            color: #842029;
            background-color: #f8d7da;
            border-color: #f5c2c7;
        }

        .tvl-contact-form .wpcf7-spam-blocked {
            color: #664d03;
            background-color: #fff3cd;
            border-color: #ffecb5;
        }

        .tvl-contact-form .wpcf7-not-valid-tip {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        /* Grid layout for form fields */
        .tvl-contact-form .wpcf7-form p {
            margin-bottom: 1rem;
        }
    </style>
    <?php
}
add_action('wp_head', 'tvl_cf7_custom_styles');

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

// Register Slider/Banner Custom Post Type
function tvl_register_slider_post_type() {
    $labels = array(
        'name' => 'Banner Slides',
        'singular_name' => 'Banner Slide',
        'menu_name' => 'Banner Slides',
        'add_new' => 'Thêm Mới',
        'add_new_item' => 'Thêm Banner Mới',
        'edit_item' => 'Sửa Banner',
        'new_item' => 'Banner Mới',
        'view_item' => 'Xem Banner',
        'search_items' => 'Tìm Banner',
        'not_found' => 'Không tìm thấy banner',
        'not_found_in_trash' => 'Không có banner trong thùng rác'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'publicly_queryable' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'menu_icon' => 'dashicons-images-alt2',
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_position' => 4,
    );

    register_post_type('slider', $args);
}
add_action('init', 'tvl_register_slider_post_type');

// Add Meta Boxes for Slider
function tvl_slider_meta_boxes() {
    add_meta_box(
        'slider_details',
        'Chi Tiết Banner',
        'tvl_slider_details_callback',
        'slider',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'tvl_slider_meta_boxes');

function tvl_slider_details_callback($post) {
    wp_nonce_field('tvl_save_slider_meta', 'tvl_slider_meta_nonce');

    $subtitle = get_post_meta($post->ID, '_slider_subtitle', true);
    $button_text = get_post_meta($post->ID, '_slider_button_text', true);
    $button_url = get_post_meta($post->ID, '_slider_button_url', true);
    $video_url = get_post_meta($post->ID, '_slider_video_url', true);
    $facebook_url = get_post_meta($post->ID, '_slider_facebook', true);
    $twitter_url = get_post_meta($post->ID, '_slider_twitter', true);
    $instagram_url = get_post_meta($post->ID, '_slider_instagram', true);

    ?>
    <table class="form-table">
        <tr>
            <th><label for="slider_subtitle">Tiêu Đề Phụ (Subtitle)</label></th>
            <td>
                <input type="text" id="slider_subtitle" name="slider_subtitle" value="<?php echo esc_attr($subtitle); ?>" class="large-text" placeholder="VD: When you choose our service...">
                <p class="description">Dòng text phía dưới tiêu đề chính</p>
            </td>
        </tr>
        <tr>
            <th><label for="slider_button_text">Text Nút (Button Text)</label></th>
            <td>
                <input type="text" id="slider_button_text" name="slider_button_text" value="<?php echo esc_attr($button_text); ?>" class="regular-text" placeholder="Learn More">
            </td>
        </tr>
        <tr>
            <th><label for="slider_button_url">Link Nút (Button URL)</label></th>
            <td>
                <input type="url" id="slider_button_url" name="slider_button_url" value="<?php echo esc_url($button_url); ?>" class="large-text" placeholder="https://example.com">
            </td>
        </tr>
        <tr>
            <th><label for="slider_video_url">Video URL</label></th>
            <td>
                <input type="url" id="slider_video_url" name="slider_video_url" value="<?php echo esc_url($video_url); ?>" class="large-text" placeholder="https://example.com/video.mp4">
                <p class="description">Link video cho nút "Watch Video" (không bắt buộc)</p>
            </td>
        </tr>
        <tr>
            <th colspan="2"><h3>Social Media Links</h3></th>
        </tr>
        <tr>
            <th><label for="slider_facebook">Facebook URL</label></th>
            <td>
                <input type="url" id="slider_facebook" name="slider_facebook" value="<?php echo esc_url($facebook_url); ?>" class="large-text" placeholder="https://facebook.com/yourpage">
            </td>
        </tr>
        <tr>
            <th><label for="slider_twitter">Twitter URL</label></th>
            <td>
                <input type="url" id="slider_twitter" name="slider_twitter" value="<?php echo esc_url($twitter_url); ?>" class="large-text" placeholder="https://twitter.com/yourprofile">
            </td>
        </tr>
        <tr>
            <th><label for="slider_instagram">Instagram URL</label></th>
            <td>
                <input type="url" id="slider_instagram" name="slider_instagram" value="<?php echo esc_url($instagram_url); ?>" class="large-text" placeholder="https://instagram.com/yourprofile">
            </td>
        </tr>
    </table>
    <?php
}

function tvl_save_slider_meta($post_id) {
    if (!isset($_POST['tvl_slider_meta_nonce'])) {
        return;
    }

    if (!wp_verify_nonce($_POST['tvl_slider_meta_nonce'], 'tvl_save_slider_meta')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Save all meta fields
    if (isset($_POST['slider_subtitle'])) {
        update_post_meta($post_id, '_slider_subtitle', sanitize_text_field($_POST['slider_subtitle']));
    }

    if (isset($_POST['slider_button_text'])) {
        update_post_meta($post_id, '_slider_button_text', sanitize_text_field($_POST['slider_button_text']));
    }

    if (isset($_POST['slider_button_url'])) {
        update_post_meta($post_id, '_slider_button_url', esc_url_raw($_POST['slider_button_url']));
    }

    if (isset($_POST['slider_video_url'])) {
        update_post_meta($post_id, '_slider_video_url', esc_url_raw($_POST['slider_video_url']));
    }

    if (isset($_POST['slider_facebook'])) {
        update_post_meta($post_id, '_slider_facebook', esc_url_raw($_POST['slider_facebook']));
    }

    if (isset($_POST['slider_twitter'])) {
        update_post_meta($post_id, '_slider_twitter', esc_url_raw($_POST['slider_twitter']));
    }

    if (isset($_POST['slider_instagram'])) {
        update_post_meta($post_id, '_slider_instagram', esc_url_raw($_POST['slider_instagram']));
    }
}
add_action('save_post_slider', 'tvl_save_slider_meta');

// Enable menu_order support for sliders
function tvl_slider_enable_menu_order() {
    add_post_type_support('slider', 'page-attributes');
}
add_action('init', 'tvl_slider_enable_menu_order');

// Add custom columns to Sliders admin
function tvl_slider_columns($columns) {
    $new_columns = array();
    $new_columns['cb'] = $columns['cb'];
    $new_columns['thumbnail'] = 'Hình Ảnh';
    $new_columns['title'] = 'Tiêu Đề';
    $new_columns['menu_order'] = 'Thứ Tự';
    $new_columns['date'] = $columns['date'];
    return $new_columns;
}
add_filter('manage_slider_posts_columns', 'tvl_slider_columns');

function tvl_slider_column_content($column_name, $post_id) {
    if ($column_name == 'menu_order') {
        $order = get_post_field('menu_order', $post_id);
        echo $order;
    }

    if ($column_name == 'thumbnail') {
        $thumbnail = get_the_post_thumbnail($post_id, array(100, 60));
        echo $thumbnail ? $thumbnail : '—';
    }
}
add_action('manage_slider_posts_custom_column', 'tvl_slider_column_content', 10, 2);

// Make sliders sortable
function tvl_slider_sortable_columns($columns) {
    $columns['menu_order'] = 'menu_order';
    return $columns;
}
add_filter('manage_edit-slider_sortable_columns', 'tvl_slider_sortable_columns');

// Register Features/Services Custom Post Type
function tvl_register_feature_post_type() {
    $labels = array(
        'name' => 'Tính Năng',
        'singular_name' => 'Tính Năng',
        'menu_name' => 'Tính Năng',
        'add_new' => 'Thêm Mới',
        'add_new_item' => 'Thêm Tính Năng Mới',
        'edit_item' => 'Sửa Tính Năng',
        'new_item' => 'Tính Năng Mới',
        'view_item' => 'Xem Tính Năng',
        'search_items' => 'Tìm Tính Năng',
        'not_found' => 'Không tìm thấy tính năng',
        'not_found_in_trash' => 'Không có tính năng trong thùng rác'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'publicly_queryable' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'menu_icon' => 'dashicons-star-filled',
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_position' => 8,
    );

    register_post_type('feature', $args);
}
add_action('init', 'tvl_register_feature_post_type');

// Enable menu_order support for features
function tvl_feature_enable_menu_order() {
    add_post_type_support('feature', 'page-attributes');
}
add_action('init', 'tvl_feature_enable_menu_order');

// Add custom columns to Features admin
function tvl_feature_columns($columns) {
    $new_columns = array();
    $new_columns['cb'] = $columns['cb'];
    $new_columns['thumbnail'] = 'Icon';
    $new_columns['title'] = 'Tiêu Đề';
    $new_columns['menu_order'] = 'Thứ Tự';
    $new_columns['date'] = $columns['date'];
    return $new_columns;
}
add_filter('manage_feature_posts_columns', 'tvl_feature_columns');

function tvl_feature_column_content($column_name, $post_id) {
    if ($column_name == 'menu_order') {
        $order = get_post_field('menu_order', $post_id);
        echo $order;
    }

    if ($column_name == 'thumbnail') {
        $thumbnail = get_the_post_thumbnail($post_id, array(60, 60));
        echo $thumbnail ? $thumbnail : '—';
    }
}
add_action('manage_feature_posts_custom_column', 'tvl_feature_column_content', 10, 2);

// Make features sortable
function tvl_feature_sortable_columns($columns) {
    $columns['menu_order'] = 'menu_order';
    return $columns;
}
add_filter('manage_edit-feature_sortable_columns', 'tvl_feature_sortable_columns');

// Register Practice Area Taxonomy
function tvl_register_practice_area_taxonomy() {
    $labels = array(
        'name' => 'Lĩnh Vực Hoạt Động',
        'singular_name' => 'Lĩnh Vực',
        'menu_name' => 'Lĩnh Vực',
        'all_items' => 'Tất Cả Lĩnh Vực',
        'edit_item' => 'Sửa Lĩnh Vực',
        'view_item' => 'Xem Lĩnh Vực',
        'update_item' => 'Cập Nhật Lĩnh Vực',
        'add_new_item' => 'Thêm Lĩnh Vực Mới',
        'new_item_name' => 'Tên Lĩnh Vực Mới',
        'search_items' => 'Tìm Lĩnh Vực',
        'popular_items' => 'Lĩnh Vực Phổ Biến',
        'not_found' => 'Không tìm thấy lĩnh vực'
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_in_rest' => true,
        'show_tagcloud' => false,
        'rewrite' => array('slug' => 'linh-vuc'),
    );

    register_taxonomy('practice_area', array('post'), $args);
}
add_action('init', 'tvl_register_practice_area_taxonomy');

// Add image field to Practice Area taxonomy
function tvl_practice_area_add_image_field() {
    ?>
    <div class="form-field">
        <label for="practice_area_image">Hình Ảnh</label>
        <input type="hidden" id="practice_area_image" name="practice_area_image" value="">
        <div id="practice_area_image_preview" style="margin-bottom: 10px;"></div>
        <button type="button" class="button" id="upload_practice_area_image">Chọn Hình Ảnh</button>
        <button type="button" class="button" id="remove_practice_area_image" style="display:none;">Xóa Hình Ảnh</button>
        <p class="description">Upload hình ảnh đại diện cho lĩnh vực hoạt động</p>
    </div>

    <script type="text/javascript">
    jQuery(document).ready(function($) {
        var mediaUploader;

        $('#upload_practice_area_image').on('click', function(e) {
            e.preventDefault();

            if (mediaUploader) {
                mediaUploader.open();
                return;
            }

            mediaUploader = wp.media({
                title: 'Chọn Hình Ảnh',
                button: {
                    text: 'Sử Dụng Hình Này'
                },
                multiple: false
            });

            mediaUploader.on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                $('#practice_area_image').val(attachment.id);
                $('#practice_area_image_preview').html('<img src="' + attachment.url + '" style="max-width:200px;height:auto;">');
                $('#remove_practice_area_image').show();
            });

            mediaUploader.open();
        });

        $('#remove_practice_area_image').on('click', function(e) {
            e.preventDefault();
            $('#practice_area_image').val('');
            $('#practice_area_image_preview').html('');
            $(this).hide();
        });
    });
    </script>
    <?php
}
add_action('practice_area_add_form_fields', 'tvl_practice_area_add_image_field');

// Edit image field for Practice Area taxonomy
function tvl_practice_area_edit_image_field($term) {
    $image_id = get_term_meta($term->term_id, 'practice_area_image', true);
    $image_url = $image_id ? wp_get_attachment_url($image_id) : '';
    ?>
    <tr class="form-field">
        <th scope="row"><label for="practice_area_image">Hình Ảnh</label></th>
        <td>
            <input type="hidden" id="practice_area_image" name="practice_area_image" value="<?php echo esc_attr($image_id); ?>">
            <div id="practice_area_image_preview" style="margin-bottom: 10px;">
                <?php if ($image_url) : ?>
                    <img src="<?php echo esc_url($image_url); ?>" style="max-width:200px;height:auto;">
                <?php endif; ?>
            </div>
            <button type="button" class="button" id="upload_practice_area_image">Chọn Hình Ảnh</button>
            <button type="button" class="button" id="remove_practice_area_image" style="<?php echo $image_url ? '' : 'display:none;'; ?>">Xóa Hình Ảnh</button>
            <p class="description">Upload hình ảnh đại diện cho lĩnh vực hoạt động</p>

            <script type="text/javascript">
            jQuery(document).ready(function($) {
                var mediaUploader;

                $('#upload_practice_area_image').on('click', function(e) {
                    e.preventDefault();

                    if (mediaUploader) {
                        mediaUploader.open();
                        return;
                    }

                    mediaUploader = wp.media({
                        title: 'Chọn Hình Ảnh',
                        button: {
                            text: 'Sử Dụng Hình Này'
                        },
                        multiple: false
                    });

                    mediaUploader.on('select', function() {
                        var attachment = mediaUploader.state().get('selection').first().toJSON();
                        $('#practice_area_image').val(attachment.id);
                        $('#practice_area_image_preview').html('<img src="' + attachment.url + '" style="max-width:200px;height:auto;">');
                        $('#remove_practice_area_image').show();
                    });

                    mediaUploader.open();
                });

                $('#remove_practice_area_image').on('click', function(e) {
                    e.preventDefault();
                    $('#practice_area_image').val('');
                    $('#practice_area_image_preview').html('');
                    $(this).hide();
                });
            });
            </script>
        </td>
    </tr>
    <?php
}
add_action('practice_area_edit_form_fields', 'tvl_practice_area_edit_image_field');

// Add linked post field for Practice Area taxonomy (Edit form)
function tvl_practice_area_edit_linked_post_field($term) {
    $linked_post_id = get_term_meta($term->term_id, 'practice_area_post_id', true);
    ?>
    <tr class="form-field">
        <th scope="row"><label for="practice_area_post_id">Trang/Bài Viết Chi Tiết</label></th>
        <td>
            <select name="practice_area_post_id" id="practice_area_post_id" style="width: 100%; max-width: 400px;">
                <option value="">-- Chọn trang/bài viết --</option>
                <?php
                // Get Pages
                $pages = get_posts(array(
                    'post_type' => 'page',
                    'posts_per_page' => -1,
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'post_status' => 'publish'
                ));
                if (!empty($pages)) {
                    echo '<optgroup label="-- Trang (Pages) --">';
                    foreach ($pages as $page) {
                        $selected = ($linked_post_id == $page->ID) ? 'selected' : '';
                        echo '<option value="' . $page->ID . '" ' . $selected . '>' . esc_html($page->post_title) . ' (ID: ' . $page->ID . ')</option>';
                    }
                    echo '</optgroup>';
                }

                // Get Posts
                $posts = get_posts(array(
                    'post_type' => 'post',
                    'posts_per_page' => -1,
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'post_status' => 'publish'
                ));
                if (!empty($posts)) {
                    echo '<optgroup label="-- Bài viết (Posts) --">';
                    foreach ($posts as $post) {
                        $selected = ($linked_post_id == $post->ID) ? 'selected' : '';
                        echo '<option value="' . $post->ID . '" ' . $selected . '>' . esc_html($post->post_title) . ' (ID: ' . $post->ID . ')</option>';
                    }
                    echo '</optgroup>';
                }
                ?>
            </select>
            <p class="description">Chọn trang hoặc bài viết chứa nội dung chi tiết cho lĩnh vực này.</p>
        </td>
    </tr>
    <?php
}
add_action('practice_area_edit_form_fields', 'tvl_practice_area_edit_linked_post_field');

// Add linked post field for Practice Area taxonomy (Add form)
function tvl_practice_area_add_linked_post_field() {
    ?>
    <div class="form-field">
        <label for="practice_area_post_id">Trang/Bài Viết Chi Tiết</label>
        <select name="practice_area_post_id" id="practice_area_post_id" style="width: 100%;">
            <option value="">-- Chọn trang/bài viết --</option>
            <?php
            // Get Pages
            $pages = get_posts(array(
                'post_type' => 'page',
                'posts_per_page' => -1,
                'orderby' => 'title',
                'order' => 'ASC',
                'post_status' => 'publish'
            ));
            if (!empty($pages)) {
                echo '<optgroup label="-- Trang (Pages) --">';
                foreach ($pages as $page) {
                    echo '<option value="' . $page->ID . '">' . esc_html($page->post_title) . ' (ID: ' . $page->ID . ')</option>';
                }
                echo '</optgroup>';
            }

            // Get Posts
            $posts = get_posts(array(
                'post_type' => 'post',
                'posts_per_page' => -1,
                'orderby' => 'title',
                'order' => 'ASC',
                'post_status' => 'publish'
            ));
            if (!empty($posts)) {
                echo '<optgroup label="-- Bài viết (Posts) --">';
                foreach ($posts as $post) {
                    echo '<option value="' . $post->ID . '">' . esc_html($post->post_title) . ' (ID: ' . $post->ID . ')</option>';
                }
                echo '</optgroup>';
            }
            ?>
        </select>
        <p class="description">Chọn trang hoặc bài viết chứa nội dung chi tiết cho lĩnh vực này.</p>
    </div>
    <?php
}
add_action('practice_area_add_form_fields', 'tvl_practice_area_add_linked_post_field');

// Save Practice Area fields
function tvl_save_practice_area_image($term_id) {
    if (isset($_POST['practice_area_image'])) {
        update_term_meta($term_id, 'practice_area_image', sanitize_text_field($_POST['practice_area_image']));
    }
    if (isset($_POST['practice_area_post_id'])) {
        update_term_meta($term_id, 'practice_area_post_id', absint($_POST['practice_area_post_id']));
    }
}
add_action('created_practice_area', 'tvl_save_practice_area_image');
add_action('edited_practice_area', 'tvl_save_practice_area_image');

// Add image column to Practice Area admin list
function tvl_practice_area_columns($columns) {
    $new_columns = array();
    $new_columns['cb'] = $columns['cb'];
    $new_columns['image'] = 'Hình Ảnh';
    $new_columns['name'] = $columns['name'];
    $new_columns['description'] = $columns['description'];
    $new_columns['slug'] = $columns['slug'];
    $new_columns['posts'] = $columns['posts'];
    return $new_columns;
}
add_filter('manage_edit-practice_area_columns', 'tvl_practice_area_columns');

// Display image in Practice Area admin column
function tvl_practice_area_column_content($content, $column_name, $term_id) {
    if ($column_name == 'image') {
        $image_id = get_term_meta($term_id, 'practice_area_image', true);
        if ($image_id) {
            $image = wp_get_attachment_image($image_id, array(50, 50));
            $content = $image;
        } else {
            $content = '—';
        }
    }
    return $content;
}
add_filter('manage_practice_area_custom_column', 'tvl_practice_area_column_content', 10, 3);

// Enqueue media uploader scripts for Practice Area taxonomy
function tvl_enqueue_practice_area_scripts($hook) {
    // Load on taxonomy edit pages
    if ($hook === 'edit-tags.php' || $hook === 'term.php') {
        if (isset($_GET['taxonomy']) && $_GET['taxonomy'] === 'practice_area') {
            wp_enqueue_media();
            wp_enqueue_script('jquery');
        }
    }
}
add_action('admin_enqueue_scripts', 'tvl_enqueue_practice_area_scripts');

// Handle Contact Form Submission
function tvl_handle_contact_form() {
    // Verify nonce
    if (!isset($_POST['contact_nonce']) || !wp_verify_nonce($_POST['contact_nonce'], 'tvl_contact_form_nonce')) {
        wp_die('Security check failed');
    }

    // Sanitize form data
    $name = sanitize_text_field($_POST['contact_name']);
    $email = sanitize_email($_POST['contact_email']);
    $phone = sanitize_text_field($_POST['contact_phone']);
    $field = sanitize_text_field($_POST['contact_field']);
    $subject = sanitize_text_field($_POST['contact_subject']);
    $message = sanitize_textarea_field($_POST['contact_message']);

    // Validate email
    if (!is_email($email)) {
        wp_redirect(add_query_arg('contact', 'invalid_email', wp_get_referer()));
        exit;
    }

    // Prepare email
    $to = get_option('admin_email'); // Send to site admin email
    $email_subject = '[TVL Legal System] ' . $subject;

    $email_message = "Thông tin liên hệ mới từ website:\n\n";
    $email_message .= "Họ & Tên: " . $name . "\n";
    $email_message .= "Email: " . $email . "\n";
    $email_message .= "Số điện thoại: " . $phone . "\n";
    $email_message .= "Lĩnh vực: " . $field . "\n";
    $email_message .= "Chủ đề: " . $subject . "\n\n";
    $email_message .= "Nội dung:\n" . $message . "\n";

    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . $name . ' <' . $email . '>',
        'Reply-To: ' . $email
    );

    // Send email
    $sent = wp_mail($to, $email_subject, $email_message, $headers);

    // Redirect with status
    if ($sent) {
        wp_redirect(add_query_arg('contact', 'success', wp_get_referer()));
    } else {
        wp_redirect(add_query_arg('contact', 'failed', wp_get_referer()));
    }
    exit;
}
add_action('admin_post_tvl_contact_form', 'tvl_handle_contact_form');
add_action('admin_post_nopriv_tvl_contact_form', 'tvl_handle_contact_form');

// Display contact form messages
function tvl_contact_form_messages() {
    if (!isset($_GET['contact'])) {
        return;
    }

    $status = $_GET['contact'];
    $message = '';
    $type = 'success';

    switch ($status) {
        case 'success':
            $message = 'Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi sớm nhất có thể.';
            $type = 'success';
            break;
        case 'failed':
            $message = 'Có lỗi xảy ra khi gửi tin nhắn. Vui lòng thử lại.';
            $type = 'danger';
            break;
        case 'invalid_email':
            $message = 'Email không hợp lệ. Vui lòng kiểm tra lại.';
            $type = 'warning';
            break;
    }

    if ($message) {
        echo '<div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert" style="position: fixed; top: 100px; right: 20px; z-index: 9999; max-width: 400px;">';
        echo $message;
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
        echo '<script>setTimeout(function(){ var alert = document.querySelector(".alert"); if(alert) alert.remove(); }, 5000);</script>';
    }
}
add_action('wp_footer', 'tvl_contact_form_messages');

// Enable Page Templates for Posts
function tvl_add_post_templates($templates) {
    $post_templates = array(
        'taxonomy-practice_area.php' => 'Lĩnh Vực Hoạt Động',
    );
    return array_merge($templates, $post_templates);
}
add_filter('theme_post_templates', 'tvl_add_post_templates');

// Load custom template for single post
function tvl_load_post_template($template) {
    if (is_singular('post')) {
        $custom_template = get_post_meta(get_the_ID(), '_wp_page_template', true);
        if ($custom_template && $custom_template !== 'default') {
            $new_template = locate_template($custom_template);
            if ($new_template) {
                return $new_template;
            }
        }
    }
    return $template;
}
add_filter('single_template', 'tvl_load_post_template');
