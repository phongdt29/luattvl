<?php
/**
 * Hướng dẫn sử dụng CMS WordPress - TVL Legal
 * Trang admin hướng dẫn cho người quản trị
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Add menu page
function tvl_add_guide_menu() {
    add_menu_page(
        'Hướng Dẫn Sử Dụng',
        'Hướng Dẫn CMS',
        'edit_posts',
        'tvl-huong-dan',
        'tvl_render_guide_page',
        'dashicons-book-alt',
        100
    );
}
add_action('admin_menu', 'tvl_add_guide_menu');

// Render guide page
function tvl_render_guide_page() {
    ?>
    <div class="wrap tvl-guide-wrap">
        <h1><span class="dashicons dashicons-book-alt"></span> Hướng Dẫn Sử Dụng CMS - TVL Legal System</h1>

        <div class="tvl-guide-container">
            <!-- Navigation Tabs -->
            <div class="tvl-guide-tabs">
                <button class="tvl-tab-btn active" data-tab="overview">Tổng Quan</button>
                <button class="tvl-tab-btn" data-tab="posts">Bài Viết</button>
                <button class="tvl-tab-btn" data-tab="practice-areas">Lĩnh Vực</button>
                <button class="tvl-tab-btn" data-tab="pages">Trang</button>
                <button class="tvl-tab-btn" data-tab="media">Media</button>
                <button class="tvl-tab-btn" data-tab="menus">Menu</button>
                <button class="tvl-tab-btn" data-tab="seo">SEO</button>
            </div>

            <!-- Tab Contents -->
            <div class="tvl-guide-content">

                <!-- Tổng Quan -->
                <div class="tvl-tab-content active" id="overview">
                    <h2>Chào mừng đến với Hệ thống Quản trị TVL Legal</h2>
                    <div class="tvl-guide-section">
                        <h3>Giới thiệu</h3>
                        <p>Đây là hệ thống quản trị nội dung (CMS) cho website <strong>TVL Legal System</strong>. Hệ thống được xây dựng trên nền tảng WordPress, cho phép bạn dễ dàng quản lý nội dung website.</p>

                        <h3>Các chức năng chính</h3>
                        <div class="tvl-feature-grid">
                            <div class="tvl-feature-card">
                                <span class="dashicons dashicons-admin-post"></span>
                                <h4>Bài Viết</h4>
                                <p>Quản lý tin tức, bài viết pháp luật</p>
                            </div>
                            <div class="tvl-feature-card">
                                <span class="dashicons dashicons-category"></span>
                                <h4>Lĩnh Vực</h4>
                                <p>Phân loại theo lĩnh vực hoạt động</p>
                            </div>
                            <div class="tvl-feature-card">
                                <span class="dashicons dashicons-admin-page"></span>
                                <h4>Trang</h4>
                                <p>Quản lý các trang tĩnh</p>
                            </div>
                            <div class="tvl-feature-card">
                                <span class="dashicons dashicons-format-gallery"></span>
                                <h4>Media</h4>
                                <p>Quản lý hình ảnh, tài liệu</p>
                            </div>
                        </div>

                        <h3>Truy cập nhanh</h3>
                        <ul class="tvl-quick-links">
                            <li><a href="<?php echo admin_url('post-new.php'); ?>"><span class="dashicons dashicons-plus"></span> Thêm bài viết mới</a></li>
                            <li><a href="<?php echo admin_url('edit.php'); ?>"><span class="dashicons dashicons-list-view"></span> Xem tất cả bài viết</a></li>
                            <li><a href="<?php echo admin_url('edit-tags.php?taxonomy=practice_area'); ?>"><span class="dashicons dashicons-category"></span> Quản lý lĩnh vực</a></li>
                            <li><a href="<?php echo admin_url('upload.php'); ?>"><span class="dashicons dashicons-admin-media"></span> Thư viện Media</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Bài Viết -->
                <div class="tvl-tab-content" id="posts">
                    <h2>Quản Lý Bài Viết</h2>
                    <div class="tvl-guide-section">

                        <h3>1. Thêm bài viết mới</h3>
                        <div class="tvl-step">
                            <span class="step-number">1</span>
                            <div class="step-content">
                                <p>Vào <strong>Bài viết → Viết bài mới</strong> hoặc click nút bên dưới:</p>
                                <a href="<?php echo admin_url('post-new.php'); ?>" class="button button-primary">+ Thêm bài viết mới</a>
                            </div>
                        </div>

                        <div class="tvl-step">
                            <span class="step-number">2</span>
                            <div class="step-content">
                                <p><strong>Nhập tiêu đề:</strong> Viết tiêu đề bài viết rõ ràng, hấp dẫn</p>
                                <div class="tvl-tip">
                                    <span class="dashicons dashicons-lightbulb"></span>
                                    <em>Mẹo: Tiêu đề nên chứa từ khóa chính và dưới 60 ký tự để tối ưu SEO</em>
                                </div>
                            </div>
                        </div>

                        <div class="tvl-step">
                            <span class="step-number">3</span>
                            <div class="step-content">
                                <p><strong>Nhập nội dung:</strong> Sử dụng editor để viết và định dạng nội dung</p>
                                <ul>
                                    <li>Sử dụng <strong>Heading (H2, H3...)</strong> để chia đoạn</li>
                                    <li>Thêm hình ảnh minh họa bằng nút <strong>"Thêm Media"</strong></li>
                                    <li>Sử dụng <strong>danh sách</strong> để liệt kê thông tin</li>
                                </ul>
                            </div>
                        </div>

                        <div class="tvl-step">
                            <span class="step-number">4</span>
                            <div class="step-content">
                                <p><strong>Chọn Lĩnh vực hoạt động:</strong> Ở sidebar bên phải, tick chọn lĩnh vực phù hợp</p>
                                <div class="tvl-screenshot">
                                    <img src="<?php echo get_template_directory_uri(); ?>/admin/images/practice-area-select.png" alt="Chọn lĩnh vực" onerror="this.style.display='none'">
                                </div>
                            </div>
                        </div>

                        <div class="tvl-step">
                            <span class="step-number">5</span>
                            <div class="step-content">
                                <p><strong>Đặt ảnh đại diện:</strong> Click "Đặt ảnh đại diện" ở sidebar phải</p>
                                <div class="tvl-warning">
                                    <span class="dashicons dashicons-warning"></span>
                                    <em>Quan trọng: Ảnh đại diện sẽ hiển thị trong danh sách bài viết và khi chia sẻ lên mạng xã hội</em>
                                </div>
                            </div>
                        </div>

                        <div class="tvl-step">
                            <span class="step-number">6</span>
                            <div class="step-content">
                                <p><strong>Đăng bài:</strong> Click nút <strong>"Đăng"</strong> để xuất bản bài viết</p>
                            </div>
                        </div>

                        <h3>2. Sửa bài viết</h3>
                        <p>Vào <strong>Bài viết → Tất cả bài viết</strong>, di chuột vào bài cần sửa và click <strong>"Sửa"</strong></p>
                        <a href="<?php echo admin_url('edit.php'); ?>" class="button">Xem tất cả bài viết</a>

                        <h3>3. Xóa bài viết</h3>
                        <p>Di chuột vào bài viết và click <strong>"Bỏ vào thùng rác"</strong>. Bài viết sẽ được chuyển vào thùng rác và có thể khôi phục trong 30 ngày.</p>
                    </div>
                </div>

                <!-- Lĩnh Vực -->
                <div class="tvl-tab-content" id="practice-areas">
                    <h2>Quản Lý Lĩnh Vực Hoạt Động</h2>
                    <div class="tvl-guide-section">

                        <h3>Lĩnh vực hoạt động là gì?</h3>
                        <p>Lĩnh vực hoạt động giúp phân loại bài viết theo các mảng dịch vụ pháp lý của TVL Legal như: Đầu tư & Doanh nghiệp, Kế toán thuế, Sở hữu trí tuệ...</p>

                        <h3>1. Xem danh sách lĩnh vực</h3>
                        <p>Vào <strong>Bài viết → Lĩnh vực hoạt động</strong></p>
                        <a href="<?php echo admin_url('edit-tags.php?taxonomy=practice_area'); ?>" class="button button-primary">Quản lý lĩnh vực</a>

                        <h3>2. Thêm lĩnh vực mới</h3>
                        <div class="tvl-step">
                            <span class="step-number">1</span>
                            <div class="step-content">
                                <p>Điền <strong>Tên</strong> lĩnh vực (VD: "Luật Hình sự")</p>
                            </div>
                        </div>
                        <div class="tvl-step">
                            <span class="step-number">2</span>
                            <div class="step-content">
                                <p>Điền <strong>Đường dẫn (Slug)</strong> - URL thân thiện (VD: "luat-hinh-su")</p>
                            </div>
                        </div>
                        <div class="tvl-step">
                            <span class="step-number">3</span>
                            <div class="step-content">
                                <p>Điền <strong>Mô tả</strong> ngắn gọn về lĩnh vực</p>
                            </div>
                        </div>
                        <div class="tvl-step">
                            <span class="step-number">4</span>
                            <div class="step-content">
                                <p>Upload <strong>Hình ảnh</strong> đại diện cho lĩnh vực</p>
                            </div>
                        </div>
                        <div class="tvl-step">
                            <span class="step-number">5</span>
                            <div class="step-content">
                                <p>Click <strong>"Thêm lĩnh vực mới"</strong></p>
                            </div>
                        </div>

                        <h3>3. Gán bài viết vào lĩnh vực</h3>
                        <p>Khi tạo/sửa bài viết, ở sidebar bên phải sẽ có box <strong>"Lĩnh vực hoạt động"</strong>. Tick chọn lĩnh vực phù hợp cho bài viết.</p>

                        <div class="tvl-tip">
                            <span class="dashicons dashicons-lightbulb"></span>
                            <em>Mẹo: Một bài viết có thể thuộc nhiều lĩnh vực khác nhau</em>
                        </div>

                        <h3>4. Xem bài viết theo lĩnh vực</h3>
                        <p>Trên website, mỗi lĩnh vực có trang riêng hiển thị danh sách bài viết thuộc lĩnh vực đó.</p>
                        <p>Ví dụ: <code><?php echo home_url('/linh-vuc/dau-tu-doanh-nghiep/'); ?></code></p>
                    </div>
                </div>

                <!-- Trang -->
                <div class="tvl-tab-content" id="pages">
                    <h2>Quản Lý Trang</h2>
                    <div class="tvl-guide-section">

                        <h3>Trang khác với Bài viết như thế nào?</h3>
                        <table class="tvl-compare-table">
                            <tr>
                                <th>Trang (Page)</th>
                                <th>Bài viết (Post)</th>
                            </tr>
                            <tr>
                                <td>Nội dung tĩnh, ít thay đổi</td>
                                <td>Nội dung động, cập nhật thường xuyên</td>
                            </tr>
                            <tr>
                                <td>VD: Giới thiệu, Liên hệ, Dịch vụ</td>
                                <td>VD: Tin tức, Bài viết pháp luật</td>
                            </tr>
                            <tr>
                                <td>Không có ngày đăng</td>
                                <td>Có ngày đăng, sắp xếp theo thời gian</td>
                            </tr>
                        </table>

                        <h3>Các trang quan trọng của website</h3>
                        <ul class="tvl-page-list">
                            <?php
                            $important_pages = get_pages(array('number' => 10, 'sort_column' => 'menu_order'));
                            foreach ($important_pages as $page) {
                                echo '<li><a href="' . get_edit_post_link($page->ID) . '">' . esc_html($page->post_title) . '</a> - <a href="' . get_permalink($page->ID) . '" target="_blank">Xem trang</a></li>';
                            }
                            ?>
                        </ul>

                        <h3>Sửa trang</h3>
                        <p>Vào <strong>Trang → Tất cả trang</strong>, click vào tên trang cần sửa</p>
                        <a href="<?php echo admin_url('edit.php?post_type=page'); ?>" class="button">Xem tất cả trang</a>
                    </div>
                </div>

                <!-- Media -->
                <div class="tvl-tab-content" id="media">
                    <h2>Quản Lý Media (Hình ảnh, Tài liệu)</h2>
                    <div class="tvl-guide-section">

                        <h3>1. Upload hình ảnh/tài liệu</h3>
                        <div class="tvl-step">
                            <span class="step-number">1</span>
                            <div class="step-content">
                                <p>Vào <strong>Media → Thêm mới</strong></p>
                                <a href="<?php echo admin_url('media-new.php'); ?>" class="button button-primary">Upload Media</a>
                            </div>
                        </div>
                        <div class="tvl-step">
                            <span class="step-number">2</span>
                            <div class="step-content">
                                <p>Kéo thả file vào hoặc click <strong>"Chọn file"</strong></p>
                            </div>
                        </div>

                        <h3>2. Quy tắc đặt tên file</h3>
                        <div class="tvl-warning">
                            <span class="dashicons dashicons-warning"></span>
                            <strong>Quan trọng:</strong>
                            <ul>
                                <li>Không dùng tiếng Việt có dấu trong tên file</li>
                                <li>Không dùng khoảng trắng, thay bằng dấu gạch ngang (-)</li>
                                <li>Ví dụ tốt: <code>luat-su-tu-van.jpg</code></li>
                                <li>Ví dụ xấu: <code>Luật sư tư vấn.jpg</code></li>
                            </ul>
                        </div>

                        <h3>3. Kích thước ảnh khuyến nghị</h3>
                        <table class="tvl-compare-table">
                            <tr>
                                <th>Loại ảnh</th>
                                <th>Kích thước</th>
                            </tr>
                            <tr>
                                <td>Ảnh đại diện bài viết</td>
                                <td>1200 x 630 px</td>
                            </tr>
                            <tr>
                                <td>Ảnh trong bài viết</td>
                                <td>Tối đa 1200px chiều rộng</td>
                            </tr>
                            <tr>
                                <td>Logo, icon</td>
                                <td>Theo thiết kế</td>
                            </tr>
                        </table>

                        <h3>4. Xem thư viện Media</h3>
                        <a href="<?php echo admin_url('upload.php'); ?>" class="button">Mở thư viện Media</a>
                    </div>
                </div>

                <!-- Menu -->
                <div class="tvl-tab-content" id="menus">
                    <h2>Quản Lý Menu</h2>
                    <div class="tvl-guide-section">

                        <h3>1. Sửa menu</h3>
                        <p>Vào <strong>Giao diện → Menu</strong></p>
                        <a href="<?php echo admin_url('nav-menus.php'); ?>" class="button button-primary">Quản lý Menu</a>

                        <h3>2. Thêm mục menu mới</h3>
                        <div class="tvl-step">
                            <span class="step-number">1</span>
                            <div class="step-content">
                                <p>Ở cột trái, chọn loại nội dung muốn thêm (Trang, Bài viết, Liên kết tùy chỉnh...)</p>
                            </div>
                        </div>
                        <div class="tvl-step">
                            <span class="step-number">2</span>
                            <div class="step-content">
                                <p>Tick chọn mục cần thêm</p>
                            </div>
                        </div>
                        <div class="tvl-step">
                            <span class="step-number">3</span>
                            <div class="step-content">
                                <p>Click <strong>"Thêm vào Menu"</strong></p>
                            </div>
                        </div>
                        <div class="tvl-step">
                            <span class="step-number">4</span>
                            <div class="step-content">
                                <p>Kéo thả để sắp xếp thứ tự</p>
                            </div>
                        </div>
                        <div class="tvl-step">
                            <span class="step-number">5</span>
                            <div class="step-content">
                                <p>Click <strong>"Lưu Menu"</strong></p>
                            </div>
                        </div>

                        <h3>3. Tạo menu con (dropdown)</h3>
                        <p>Kéo mục menu sang phải một chút để biến nó thành menu con của mục phía trên.</p>
                    </div>
                </div>

                <!-- SEO -->
                <div class="tvl-tab-content" id="seo">
                    <h2>Tối Ưu SEO</h2>
                    <div class="tvl-guide-section">

                        <h3>Các yếu tố SEO quan trọng</h3>

                        <h4>1. Tiêu đề (Title)</h4>
                        <ul>
                            <li>Chứa từ khóa chính</li>
                            <li>Độ dài 50-60 ký tự</li>
                            <li>Hấp dẫn, thu hút click</li>
                        </ul>

                        <h4>2. URL (Đường dẫn)</h4>
                        <ul>
                            <li>Ngắn gọn, chứa từ khóa</li>
                            <li>Không dấu tiếng Việt</li>
                            <li>Dùng dấu gạch ngang (-) thay khoảng trắng</li>
                        </ul>

                        <h4>3. Ảnh đại diện</h4>
                        <ul>
                            <li>Luôn đặt ảnh đại diện cho bài viết</li>
                            <li>Kích thước 1200x630 px tối ưu cho mạng xã hội</li>
                            <li>Điền "Văn bản thay thế (Alt text)" cho ảnh</li>
                        </ul>

                        <h4>4. Nội dung</h4>
                        <ul>
                            <li>Tối thiểu 300 từ</li>
                            <li>Sử dụng heading H2, H3 để chia đoạn</li>
                            <li>Chèn từ khóa tự nhiên trong bài</li>
                            <li>Thêm liên kết nội bộ đến bài viết liên quan</li>
                        </ul>

                        <div class="tvl-tip">
                            <span class="dashicons dashicons-lightbulb"></span>
                            <em>Mẹo SEO: Viết nội dung chất lượng, hữu ích cho người đọc là yếu tố quan trọng nhất!</em>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Footer -->
        <div class="tvl-guide-footer">
            <p>Cần hỗ trợ? Liên hệ quản trị viên hoặc đội ngũ kỹ thuật.</p>
            <p><strong>TVL Legal System</strong> - Đồng hành pháp lý, kiến tạo niềm tin!</p>
        </div>
    </div>

    <style>
        .tvl-guide-wrap {
            max-width: 1200px;
            margin: 20px auto;
            font-size: 14px;
        }
        .tvl-guide-wrap h1 {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #1e3a5f;
            border-bottom: 3px solid #c9a227;
            padding-bottom: 15px;
        }
        .tvl-guide-container {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .tvl-guide-tabs {
            display: flex;
            flex-wrap: wrap;
            background: #1e3a5f;
            padding: 0;
        }
        .tvl-tab-btn {
            background: transparent;
            border: none;
            color: #fff;
            padding: 15px 20px;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s;
        }
        .tvl-tab-btn:hover {
            background: rgba(255,255,255,0.1);
        }
        .tvl-tab-btn.active {
            background: #c9a227;
            color: #1e3a5f;
            font-weight: bold;
        }
        .tvl-guide-content {
            padding: 30px;
        }
        .tvl-tab-content {
            display: none;
        }
        .tvl-tab-content.active {
            display: block;
        }
        .tvl-tab-content h2 {
            color: #1e3a5f;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .tvl-tab-content h3 {
            color: #1e3a5f;
            margin-top: 25px;
        }
        .tvl-guide-section {
            line-height: 1.8;
        }
        .tvl-feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin: 20px 0;
        }
        .tvl-feature-card {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            border: 1px solid #e9ecef;
        }
        .tvl-feature-card .dashicons {
            font-size: 40px;
            width: 40px;
            height: 40px;
            color: #c9a227;
            margin-bottom: 10px;
        }
        .tvl-feature-card h4 {
            margin: 10px 0 5px;
            color: #1e3a5f;
        }
        .tvl-quick-links {
            list-style: none;
            padding: 0;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 10px;
        }
        .tvl-quick-links li a {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 15px;
            background: #f0f0f1;
            border-radius: 5px;
            text-decoration: none;
            color: #1e3a5f;
            transition: all 0.3s;
        }
        .tvl-quick-links li a:hover {
            background: #1e3a5f;
            color: #fff;
        }
        .tvl-step {
            display: flex;
            gap: 15px;
            margin: 15px 0;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid #c9a227;
        }
        .step-number {
            background: #1e3a5f;
            color: #fff;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            flex-shrink: 0;
        }
        .step-content {
            flex: 1;
        }
        .step-content p {
            margin: 0 0 10px;
        }
        .tvl-tip {
            background: #e7f5ff;
            border: 1px solid #74c0fc;
            padding: 12px 15px;
            border-radius: 5px;
            margin: 10px 0;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }
        .tvl-tip .dashicons {
            color: #1971c2;
        }
        .tvl-warning {
            background: #fff3cd;
            border: 1px solid #ffc107;
            padding: 12px 15px;
            border-radius: 5px;
            margin: 10px 0;
        }
        .tvl-warning .dashicons {
            color: #856404;
        }
        .tvl-warning ul {
            margin: 10px 0 0 20px;
        }
        .tvl-compare-table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }
        .tvl-compare-table th,
        .tvl-compare-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        .tvl-compare-table th {
            background: #1e3a5f;
            color: #fff;
        }
        .tvl-compare-table tr:nth-child(even) {
            background: #f8f9fa;
        }
        .tvl-page-list {
            list-style: none;
            padding: 0;
        }
        .tvl-page-list li {
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }
        .tvl-guide-footer {
            background: #f8f9fa;
            padding: 20px 30px;
            text-align: center;
            border-top: 1px solid #e9ecef;
        }
        .button {
            margin-top: 10px !important;
        }
    </style>

    <script>
        jQuery(document).ready(function($) {
            $('.tvl-tab-btn').on('click', function() {
                var tabId = $(this).data('tab');

                // Update active tab button
                $('.tvl-tab-btn').removeClass('active');
                $(this).addClass('active');

                // Show corresponding content
                $('.tvl-tab-content').removeClass('active');
                $('#' + tabId).addClass('active');
            });
        });
    </script>
    <?php
}
