<?php
get_header();
?>

    <div class="dev_breadcrumb">
        <div class="container">
            <div class="inner">
                <?php
                if (!is_home() && !is_front_page()) {
                    echo cct_breadcrumb();
                }
                ?>
            </div>
        </div>
    </div>
    <div class="dev_banner">
        <div class="container">
            <div class="inner">
                <?php
                if (is_home() || is_front_page()) {
                    $banner_image_id = get_field('banner_images', 'option') ? get_field('banner_images', 'option') : '';
                    $banner_image_url = $banner_image_id ? wp_get_attachment_url($banner_image_id) : "#";
                    echo cct_banner($banner_image_url);
                }
                ?>
            </div>
        </div>
    </div>

    <main id="primary" class="site-main mb-4">
        <div class="container"><?php
            get_template_part('template-parts/content', 'home'); ?>
        </div>
    </main>
<?php
get_footer();
