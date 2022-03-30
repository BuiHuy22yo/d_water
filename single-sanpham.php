<?php
if (!defined('ABSPATH')) {
    return;
}
get_header();
?>
    <div class="dev_breadcrumb">
        <div class="container">
            <div class="inner">
                <?php
                echo cct_breadcrumb() ;
                ?>
            </div>
        </div>
    </div>
    <div class="single-sanpham ">
        <div class="inner">
            <div class="container">
                <?php
                while (have_posts()) {
                    the_post();
                    get_template_part('template-parts/content-sanpham');
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>

<?php
get_footer();
