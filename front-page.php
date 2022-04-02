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
    <main id="primary" class="site-main mb-4">
        <div class="container"><?php
            get_template_part('template-parts/content', 'home'); ?>
        </div>
    </main>
<?php
get_footer();
