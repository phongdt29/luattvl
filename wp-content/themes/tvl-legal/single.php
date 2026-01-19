<?php
get_header();
if (have_posts()) :
    while (have_posts()) : the_post();

        // Get categories for breadcrumb
        $categories = get_the_category();
        $category = !empty($categories) ? $categories[0] : null;

        // Check if post has practice_area taxonomy
        $practice_areas = get_the_terms(get_the_ID(), 'practice_area');
        $practice_area = (!empty($practice_areas) && !is_wp_error($practice_areas)) ? $practice_areas[0] : null;
?>
        <!-- Navbar & Hero Start -->
        <div class="container-fluid position-relative p-0">
            <!-- Header Start -->
            <div class="container-fluid bg-breadcrumb">
                <div class="container text-center py-3" style="max-width: 900px;">
                    <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">
                        <?php
                        if ($practice_area) {
                            echo esc_html($practice_area->name);
                        } elseif ($category) {
                            echo esc_html($category->name);
                        } else {
                            echo 'Tin tức';
                        }
                        ?>
                    </h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Trang chủ</a></li>
                            <?php if ($practice_area) : ?>
                                <li class="breadcrumb-item"><a href="<?php echo home_url('/linh-vuc/'); ?>">Lĩnh vực hoạt động</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo esc_url(get_term_link($practice_area)); ?>"><?php echo esc_html($practice_area->name); ?></a></li>
                            <?php elseif ($category) : ?>
                                
                                <li class="breadcrumb-item"><a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"><?php echo esc_html($category->name); ?></a></li>
                            <?php else : ?>
                                
                            <?php endif; ?>
                            
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- Header End -->
        </div>
        <!-- Navbar & Hero End -->

        <div class="container my-5">
            <div class="row">
                <div class="col-lg-8">
                    <article class="single-post">
                        <h1 class="mb-3"><?php the_title(); ?></h1>
                        <div class="post-meta text-muted mb-4">
                            <span><i class="fas fa-calendar-alt me-1"></i> <?php echo get_the_date('d/m/Y'); ?></span>
                            <?php if ($category) : ?>
                                <span class="ms-3"><i class="fas fa-folder me-1"></i> <?php echo esc_html($category->name); ?></span>
                            <?php endif; ?>
                        </div>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail mb-4">
                                <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded w-100')); ?>
                            </div>
                        <?php endif; ?>
                        <div class="post-content">
                            <?php the_content(); ?>
                        </div>
                    </article>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="sidebar-box">
                        <?php if ($practice_area) : ?>
                            <div class="categories mb-4">
                                <h3>Lĩnh vực hoạt động</h3>
                                <ul class="list-unstyled">
                                    <?php
                                    $all_areas = get_terms(array(
                                        'taxonomy' => 'practice_area',
                                        'hide_empty' => false,
                                        'orderby' => 'term_id',
                                        'order' => 'ASC'
                                    ));
                                    if ($all_areas && !is_wp_error($all_areas)) :
                                        foreach ($all_areas as $area) :
                                            $is_current = ($area->term_id === $practice_area->term_id);
                                    ?>
                                        <li class="mb-2">
                                            <a href="<?php echo esc_url(get_term_link($area)); ?>" class="<?php echo $is_current ? 'text-primary fw-bold' : ''; ?>">
                                                <?php echo esc_html($area->name); ?>
                                            </a>
                                        </li>
                                    <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </ul>
                            </div>
                        <?php else : ?>
                            <div class="categories mb-4">
                                <h3>Danh mục</h3>
                                <ul class="list-unstyled">
                                    <?php
                                    $all_cats = get_categories(array('hide_empty' => false));
                                    foreach ($all_cats as $cat) :
                                        $is_current = ($category && $cat->term_id === $category->term_id);
                                    ?>
                                        <li class="mb-2">
                                            <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>" class="<?php echo $is_current ? 'text-primary fw-bold' : ''; ?>">
                                                <?php echo esc_html($cat->name); ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <!-- Contact Box -->
                        <div class="contact-box p-4 bg-primary text-white rounded">
                            <h4 class="text-white mb-3">Liên hệ tư vấn</h4>
                            <p class="mb-2 text-white"><i class="fas fa-phone-alt me-2"></i>Hotline: 0934.053.153</p>
                            <p class="mb-2 text-white"><i class="fas fa-envelope me-2"></i>Email: luattvl@luattvl.vn</p>
                            <p class="mb-0 text-white"><i class="fas fa-map-marker-alt me-2"></i>TP. Hồ Chí Minh</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    endwhile;
endif;
get_footer();
?>
