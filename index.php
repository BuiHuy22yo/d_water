<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ctwp_theme
 */

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
        <div class="container bg-white">
            <?php
            if (have_posts()) :

                if (is_home() && !is_front_page()) :
                    ?>
                    <div class="heading-title">
                        <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                    </div>
                <?php
                endif;

                /* Start the Loop */
                while (have_posts()) :
                    the_post();
                    if (is_home() && !is_front_page()) {
                        get_template_part('template-parts/content', 'home');
                    }
                    get_template_part('template-parts/content', get_post_type());

                endwhile;

                the_posts_navigation();

            else :

                get_template_part('template-parts/content', 'none');

            endif;
            ?>
        </div>
    </main><!-- #main -->

<?php
get_sidebar();
get_footer();
