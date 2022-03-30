<?php
/**
 * Content Page template
 *
 * @package aquila
 */

$data_page = get_query_var('paged') ? get_query_var('paged') : 1;
$posts_per_page = get_option('posts_per_page') ? get_option('posts_per_page') : -1;

$args = [
    'post_type' => 'sanpham',
    'post_status' => 'publish',
    'posts_per_page' => $posts_per_page,
    'paged' => $data_page,
    'orderby' => 'date',
    'order' => 'DESC',

];

$list_product = new WP_Query($args);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('danh_sach_san_pham'); ?>>
    <?php if ($list_product->have_posts()) { ?>
        <div class="row">
            <?php while ($list_product->have_posts()) : $list_product->the_post(); ?>
                <div class="col-3 py-2">
                    <div class="inner-item">
                        <div class="product-image position-relative">
                            <div class="image">
                                <img class="w-100" src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
                            </div>
                            <div class="label_product position-absolute top-0 end-0">
                                <div class="label_wrapper ">- 15%</div>
                            </div>
                            <div class="product-action"></div>
                        </div>
                        <div class="product-info">
                            <div class="product-name">
                                <a href="<?php echo esc_url(get_the_permalink()); ?>"> <?php echo get_the_title() ?></a>
                            </div>
                            <div class="product-price d-inline-flex">
                                <div class="price-sale">319,000k</div>
                                <div class="price-regular">355,000</div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            endwhile; ?>
        </div>
        <div class="pagination">
            <ul class="pagination clearfix float-right">
                <li class="page-item disabled"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                <li class="active page-item disabled"><a class="page-link" href="javascript:;">1</a></li>
                <li class="page-item"><a class="page-link" onclick="doSearch(2)" href="?&amp;page=2&amp;view=grid">2</a>
                </li>
                <li class="page-item hidden-xs">
                    <a class="page-link" onclick="doSearch(2)" href="?&amp;page=2&amp;view=grid"><i
                                class="fa fa-angle-right" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </div>
    <?php }

    // Reset Post Data
    wp_reset_postdata(); ?>

</article>
