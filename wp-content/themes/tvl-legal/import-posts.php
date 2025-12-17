<?php
/**
 * Import Posts from Old Database to WordPress
 * Run this file once via browser: http://localhost/luattvl/wp-content/themes/tvl-legal/import-posts.php
 */

// Load WordPress
require_once($_SERVER['DOCUMENT_ROOT'] . '/luattvl/wp-load.php');

// Check if user is admin
if (!current_user_can('manage_options')) {
    die('Ban khong co quyen thuc hien thao tac nay.');
}

// Posts data from old database
$old_posts = array(
    array(
        'post_id' => 36,
        'post_title' => 'CUỘC THI HỌC THUẬT "TRANH TÀI HÙNG BIỆN" DO KHOA LUẬT THƯƠNG MẠI TRƯỜNG ĐẠI HỌC LUẬT TP. HỒ CHÍ MINH TỔ CHỨC',
        'post_slug' => 'cuoc-thi-hoc-thuat-tranh-tai-hung-bien-do-khoa-luat-thuong-mai-truong-dai-hoc-luat-tp-ho-chi-minh-to-chuc',
        'post_desc' => 'Thạc sĩ - Luật sư Trần Hoàng Hải Phong thành viên TVL Legal System đã vinh dự đảm nhận vai trò ban giám khảo tại cuộc thi học thuật "Tranh Tài Hùng Biện" do Khoa Luật Thương mại, Trường Đại học Luật TP. Hồ Chí Minh tổ chức.',
        'post_content' => '<p>Ngày 05/12/2024, Thạc sĩ - Luật sư Trần Hoàng Hải Phong thành viên TVL Legal System đã vinh dự đảm nhận vai trò ban giám khảo tại cuộc thi học thuật <i>"Tranh Tài Hùng Biện"</i> do Khoa Luật Thương mại, Trường Đại học Luật TP. Hồ Chí Minh tổ chức. Đây là một sự kiện nổi bật nhằm tạo sân chơi bổ ích cho sinh viên ngành luật, giúp các bạn rèn luyện kỹ năng tranh luận, tư duy phản biện và nâng cao kiến thức pháp luật.</p><figure class="image"><img style="aspect-ratio:625/417;" src="https://luattvl.vn/public/post/18-1-2025-92773033.jpg" width="625" height="417"></figure><p>Cuộc thi quy tụ các đội thi xuất sắc từ nhiều trường đại học, với nội dung xoay quanh các chủ đề pháp luật, đặc biệt là lĩnh vực thương mại.</p>',
        'post_img' => 'cuoc-thi-hoc-thuat-tranh-tai-hung-bien-2833.jpg',
        'post_date' => '2024-12-05'
    ),
    array(
        'post_id' => 37,
        'post_title' => 'HỘI NGHỊ TRUYỀN THÔNG LUẬT BÌNH ĐẲNG GIỚI, LUẬT TRẺ EM VÀ KỸ NĂNG ỨNG XỬ TRONG MÔI TRƯỜNG HỌC ĐƯỜNG',
        'post_slug' => 'hoi-nghi-truyen-thong-luat-binh-dang-gioi-luat-tre-em-va-ky-nang-ung-xu-trong-moi-truong-hoc-duong',
        'post_desc' => 'Luật sư Trần Vân Linh thành viên TVL Legal tham gia Hội nghị Truyền thông Luật Bình đẳng giới, Luật Trẻ em và Kỹ năng ứng xử trong môi trường học đường tại Trường tiểu học Yên Thế.',
        'post_content' => '<p>Ngày 25/11/2024, Luật sư Trần Vân Linh thành viên TVL Legal tham gia <strong>Hội nghị Truyền thông Luật Bình đẳng giới, Luật Trẻ em và Kỹ năng ứng xử trong môi trường học đường tại Trường tiểu học Yên Thế.</strong></p>',
        'post_img' => 'hoi-nghi-truyen-thong-luat-binh-dang-gioi-9836.jpg',
        'post_date' => '2024-11-25'
    ),
    array(
        'post_id' => 38,
        'post_title' => 'CHƯƠNG TRÌNH TALKSHOW "SÒNG BẠC" THƯƠNG TRƯỜNG - MUA BÁN, SÁP NHẬP VÀ CẠNH TRANH DƯỚI GÓC NHÌN PHÁP LÝ',
        'post_slug' => 'chuong-trinh-talkshow-song-bac-thuong-truong-mua-ban-sap-nhap-va-canh-tranh-duoi-goc-nhin-phap-ly',
        'post_desc' => 'Trường Đại học Hùng Vương, TP. Hồ Chí Minh đã tổ chức thành công talkshow đặc biệt với chủ đề "Sòng bạc" thương trường - Mua bán, sáp nhập và cạnh tranh dưới góc nhìn pháp lý".',
        'post_content' => '<p>Ngày 21/11/2024, Trường Đại học Hùng Vương, TP. Hồ Chí Minh đã tổ chức thành công talkshow đặc biệt với chủ đề <i><strong>"Sòng bạc" thương trường - Mua bán, sáp nhập và cạnh tranh dưới góc nhìn pháp lý"</strong></i></p>',
        'post_img' => 'chuong-trinh-talkshow-song-bac-thuong-truong-5831.jpg',
        'post_date' => '2024-11-21'
    ),
    array(
        'post_id' => 50,
        'post_title' => 'KHAI TRƯƠNG CÔNG TY LUẬT TNHH TVL - KỶ NIỆM THÀNH LẬP 16 NĂM VĂN PHÒNG LUẬT SƯ TRẦN VÂN LINH - YEAR AND PARTY 2024',
        'post_slug' => 'khai-truong-cong-ty-luat-tnhh-tvl-ky-niem-thanh-lap-16-nam-van-phong-luat-su-tran-van-linh-year-and-party-2024',
        'post_desc' => 'KHAI TRƯƠNG CÔNG TY LUẬT TNHH TVL- KỶ NIỆM THÀNH LẬP 16 NĂM VĂN PHÒNG LUẬT SƯ TRẦN VÂN LINH - YEAR AND PARTY 2024',
        'post_content' => '<p>Tối ngày 22/12/2024, TVL Legal System đã tổ chức Lễ kỷ niệm 16 năm hoạt động của Văn phòng Luật sư Trần Vân Linh, Year End Party để kết thúc năm 2024 và đồng thời Khai trương Công ty luật TNHH TVL tại Nhà Hàng Dìn Ký.</p>',
        'post_img' => 'khai-truong-cong-ty-luat-tnhh-tvl-3507.jpg',
        'post_date' => '2024-12-22'
    ),
    array(
        'post_id' => 51,
        'post_title' => 'LUẬT SƯ TRẦN HOÀNG HẢI PHONG - GIÁM ĐỐC CÔNG TY LUẬT TNHH TVL TUYÊN TRUYỀN LUẬT THANH NIÊN 2020 TẠI TRƯỜNG TH - THCS - THPT THANH BÌNH',
        'post_slug' => 'luat-su-tran-hoang-hai-phong-giam-doc-cong-ty-luat-tnhh-tvl-tuyen-truyen-luat-thanh-nien-2020-tai-truong-th-thcs-thpt-thanh-binh',
        'post_desc' => 'LUẬT SƯ TRẦN HOÀNG HẢI PHONG - GIÁM ĐỐC CÔNG TY LUẬT TNHH TVL TUYÊN TRUYỀN LUẬT THANH NIÊN 2020 TẠI TRƯỜNG TH - THCS - THPT THANH BÌNH.',
        'post_content' => '<p>Thiết thực tổ chức các hoạt động chào mừng kỷ niệm 50 năm Ngày giải phóng miền nam, thống nhất đất nước.</p>',
        'post_img' => 'luat-su-tran-hoang-hai-phong-tuyen-truyen-luat-thanh-nien-80.jpg',
        'post_date' => '2025-03-17'
    ),
    array(
        'post_id' => 52,
        'post_title' => 'LUẬT SƯ TRẦN HOÀNG HẢI PHONG TUYÊN TRUYỀN LUẬT TRẺ EM, KỸ NĂNG PHÒNG CHỐNG XÂM HẠI VÀ BẠO LỰC HỌC ĐƯỜNG TẠI TRƯỜNG TIỂU HỌC CÁCH MẠNG THÁNG TÁM',
        'post_slug' => 'luat-su-tran-hoang-hai-phong-tuyen-truyen-luat-tre-em-ky-nang-phong-chong-xam-hai-va-bao-luc-hoc-duong-tai-truong-tieu-hoc-cach-mang-thang-tam',
        'post_desc' => 'LUẬT SƯ TRẦN HOÀNG HẢI PHONG – GIÁM ĐỐC CÔNG TY LUẬT TNHH TVL TUYÊN TRUYỀN LUẬT TRẺ EM, KỸ NĂNG PHÒNG CHỐNG XÂM HẠI VÀ BẠO LỰC HỌC ĐƯỜNG.',
        'post_content' => '<p>Hiện nay, bạo lực học đường, bạo hành và xâm hại trẻ em đang trở thành vấn đề nhức nhối, diễn ra ngày càng phức tạp và khó kiểm soát.</p>',
        'post_img' => 'luat-su-tran-hoang-hai-phong-tuyen-truyen-luat-tre-em-2893.jpg',
        'post_date' => '2025-03-24'
    ),
    array(
        'post_id' => 53,
        'post_title' => 'HỘI NGHỊ TUYÊN TRUYỀN NGÀY PHÁP LUẬT - LUẬT SƯ TRẦN VÂN LINH TUYÊN TRUYỀN LUẬT PHÒNG, CHỐNG BẠO LỰC GIA ĐÌNH; LUẬT HÔN NHÂN VÀ GIA ĐÌNH',
        'post_slug' => 'hoi-nghi-tuyen-truyen-ngay-phap-luat-luat-su-tran-van-linh-tuyen-truyen-luat-phong-chong-bao-luc-gia-dinh-luat-hon-nhan-va-gia-dinh',
        'post_desc' => 'HỘI NGHỊ TUYÊN TRUYỀN NGÀY PHÁP LUẬT - LUẬT SƯ TRẦN VÂN LINH TUYÊN TRUYỀN, PHỔ BIẾN LUẬT PHÒNG, CHỐNG BẠO LỰC GIA ĐÌNH; LUẬT HÔN NHÂN VÀ GIA ĐÌNH.',
        'post_content' => '<p>Sáng ngày 15/3/2025, Đảng ủy, Ủy ban nhân dân, Ủy ban MTTQ Việt Nam Phường cùng các tổ chức chính trị - xã hội Phường 12 tổ chức Hội nghị tuyên truyền.</p>',
        'post_img' => 'hoi-nghi-tuyen-truyen-ngay-phap-luat-4211.jpg',
        'post_date' => '2025-03-15'
    ),
    array(
        'post_id' => 54,
        'post_title' => 'LUẬT SƯ TRẦN VÂN LINH TUYÊN TRUYỀN LUẬT BẢO VỆ MÔI TRƯỜNG VÀ NGHỊ ĐỊNH 53/2024/NĐ-CP HƯỚNG DẪN LUẬT TÀI NGUYÊN NƯỚC 2023',
        'post_slug' => 'luat-su-tran-van-linh-tuyen-truyen-luat-bao-ve-moi-truong-va-nghi-dinh-53-2024-nd-cp-huong-dan-luat-tai-nguyen-nuoc-2023',
        'post_desc' => 'LUẬT SƯ TRẦN VÂN LINH - TRƯỞNG VĂN PHÒNG LUẬT SƯ TRẦN VÂN LINH TUYÊN TRUYỀN LUẬT BẢO VỆ MÔI TRƯỜNG VÀ NGHỊ ĐỊNH 53/2024/NĐ-CP.',
        'post_content' => '<p>Hưởng ứng Tháng Thanh niên 2025 và hoạt động "Ngày Chủ nhật Xanh" lần thứ 156.</p>',
        'post_img' => 'luat-su-tran-van-linh-tuyen-truyen-luat-bao-ve-moi-truong-7081.jpg',
        'post_date' => '2025-03-23'
    ),
    array(
        'post_id' => 55,
        'post_title' => 'VIỆN KHOA HỌC PHÁP LÝ TRỌNG TÀI (ARI) - THÔNG BÁO CHIÊU SINH KHÓA BỒI DƯỠNG PHÁP LUẬT TRỌNG TÀI CƠ BẢN THÁNG 4/2025',
        'post_slug' => 'vien-khoa-hoc-phap-ly-trong-tai-ari-thong-bao-chieu-sinh-khoa-boi-duong-phap-luat-trong-tai-co-ban-thang-4-2025',
        'post_desc' => 'VIỆN KHOA HỌC PHÁP LÝ TRỌNG TÀI (ARI) - THÔNG BÁO CHIÊU SINH KHÓA BỒI DƯỠNG PHÁP LUẬT TRỌNG TÀI CƠ BẢN THÁNG 4/2025',
        'post_content' => '<p>Viện Khoa học pháp lý Trọng tài (ARI) - Chiêu sinh khóa bồi dưỡng kiến thức pháp luật về Trọng tài thương mại Tháng 4/2025.</p>',
        'post_img' => 'vien-khoa-hoc-phap-ly-trong-tai-ari-8124.jpg',
        'post_date' => '2025-03-30'
    ),
    array(
        'post_id' => 56,
        'post_title' => 'LUẬT SƯ TRẦN HOÀNG HẢI PHONG TUYÊN TRUYỀN LUẬT TRẺ EM, KỸ NĂNG PHÒNG, CHỐNG XÂM HẠI TRẺ EM TẠI TRƯỜNG THCS NGÔ QUYỀN',
        'post_slug' => 'luat-su-tran-hoang-hai-phong-tuyen-truyen-luat-tre-em-ky-nang-phong-chong-xam-hai-tre-em-tai-truong-thcs-ngo-quyen',
        'post_desc' => 'NGÀY 31/3/2025 - LUẬT SƯ TRẦN HOÀNG HẢI PHONG - GIÁM ĐỐC CÔNG TY LUẬT TNHH TVL TUYÊN TRUYỀN LUẬT TRẺ EM TẠI TRƯỜNG THCS NGÔ QUYỀN.',
        'post_content' => '<p>Sáng ngày 31/03/2025, Ủy ban nhân dân Phường 12 tổ chức xây dựng kế hoạch tuyên truyền Luật Trẻ em.</p>',
        'post_img' => 'luat-su-tran-hoang-hai-phong-tuyen-truyen-luat-tre-em-ngo-quyen-2882.jpg',
        'post_date' => '2025-03-31'
    ),
    array(
        'post_id' => 57,
        'post_title' => 'LUẬT SƯ TRẦN HOÀNG HẢI PHONG - DIỄN GIẢ BUỔI TẬP HUẤN KỸ NĂNG "VIẾT BẢN LUẬN CỨ VÀ TRANH BIỆN" - HÀNH TRANG CHO CHIẾN BINH CÔNG LÝ',
        'post_slug' => 'luat-su-tran-hoang-hai-phong-dien-gia-buoi-tap-huan-ky-nang-viet-ban-luan-cu-va-tranh-bien-hanh-trang-cho-chien-binh-cong-ly',
        'post_desc' => 'LUẬT SƯ TRẦN HOÀNG HẢI PHONG - GIÁM ĐỐC CÔNG TY LUẬT TNHH TVL - DIỄN GIẢ BUỔI TẬP HUẤN KỸ NĂNG "VIẾT BẢN LUẬN CỨ VÀ TRANH BIỆN".',
        'post_content' => '<p>LUẬT SƯ TRẦN HOÀNG HẢI PHONG - GIÁM ĐỐC CÔNG TY LUẬT TNHH TVL - DIỄN GIẢ BUỔI TẬP HUẤN KỸ NĂNG.</p>',
        'post_img' => 'luat-su-tran-hoang-hai-phong-dien-gia-buoi-tap-huan-555.jpg',
        'post_date' => '2025-04-05'
    ),
);

// Counter
$imported = 0;
$skipped = 0;
$errors = array();

echo '<h1>Import Posts to WordPress</h1>';
echo '<pre>';

foreach ($old_posts as $post_data) {
    // Check if post already exists by slug
    $existing = get_page_by_path($post_data['post_slug'], OBJECT, 'post');

    if ($existing) {
        echo "SKIPPED: {$post_data['post_title']} (da ton tai)\n";
        $skipped++;
        continue;
    }

    // Prepare post data
    $new_post = array(
        'post_title'    => $post_data['post_title'],
        'post_name'     => $post_data['post_slug'],
        'post_content'  => $post_data['post_content'],
        'post_excerpt'  => $post_data['post_desc'],
        'post_status'   => 'publish',
        'post_type'     => 'post',
        'post_date'     => $post_data['post_date'] . ' 00:00:00',
        'post_author'   => 1,
    );

    // Insert post
    $post_id = wp_insert_post($new_post, true);

    if (is_wp_error($post_id)) {
        echo "ERROR: {$post_data['post_title']} - " . $post_id->get_error_message() . "\n";
        $errors[] = $post_data['post_title'];
    } else {
        echo "OK: {$post_data['post_title']} (ID: $post_id)\n";
        $imported++;

        // Store old post ID as meta for reference
        update_post_meta($post_id, '_old_post_id', $post_data['post_id']);
        update_post_meta($post_id, '_old_post_img', $post_data['post_img']);
    }
}

echo '</pre>';
echo '<h2>Ket qua:</h2>';
echo "<p>Da import: <strong>$imported</strong> bai viet</p>";
echo "<p>Da bo qua: <strong>$skipped</strong> bai viet (da ton tai)</p>";
echo "<p>Loi: <strong>" . count($errors) . "</strong></p>";

if (!empty($errors)) {
    echo '<h3>Danh sach loi:</h3><ul>';
    foreach ($errors as $err) {
        echo "<li>$err</li>";
    }
    echo '</ul>';
}

echo '<p><a href="' . admin_url('edit.php') . '">Xem danh sach bai viet trong Admin</a></p>';
