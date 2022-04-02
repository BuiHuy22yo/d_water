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
    'orderby' => 'date',
    'order' => 'DESC',
];
if (!is_home() && !is_front_page()) {
    $args['posts_per_page'] = $posts_per_page;
    $args['paged'] = $data_page;
} else {
    $args['posts_per_page'] = -1;
}

$list_product = new WP_Query($args);
$total = $list_product->found_posts;
$max_page = $total / $posts_per_page > intval($total / $posts_per_page) ? intval($total / $posts_per_page) + 1 : $total / $posts_per_page;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('danh_sach_san_pham bg-white'); ?>>
    <?php if ($list_product->have_posts()) { ?>
        <div class="row <?php echo $class = !is_home() && !is_front_page() ? '' : 'slide_slick' ?>">
            <?php while ($list_product->have_posts()) : $list_product->the_post(); ?>
                <?php
                $sale = get_post_meta(get_the_id(), 'sale_price', true);
                $regular = get_post_meta(get_the_id(), 'regular_price', true);
                $symbol = get_field('currency_symbol', 'option') ? get_field('currency_symbol', 'option') : 'đ';
                $discount = get_discount($regular, $sale);
                ?>
                <div class="col-3 py-2">
                    <div class="inner-item">
                        <div class="product-image position-relative">
                            <div class="image">
                                <img class="w-100" src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
                            </div><?php if ($discount != 0) { ?>
                                <div class="label_product position-absolute top-0 end-0">
                                    <div class="label_wrapper "><?php echo $discount ?></div>
                                </div>
                            <?php } ?>
                            <div class="product-action"></div>
                        </div>
                        <div class="product-info">
                            <div class="product-name">
                                <a href="<?php echo esc_url(get_the_permalink()); ?>"> <?php echo get_the_title() ?></a>
                            </div>
                            <?php if ($regular) { ?>
                                <div class="product-price d-inline-flex">
                                    <?php if ($sale && $sale < $regular) { ?>
                                        <div class="price-sale"><?php echo $sale . $symbol ?></div>
                                        <div class="price-regular"><?php echo $regular . $symbol ?></div>
                                    <?php } else { ?>
                                        <div class="price-sale"><?php echo $regular . $symbol ?></div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php
            endwhile; ?>
        </div>
        <?php
        if (!is_home() && !is_front_page()) { ?>
            <div class="dev_pagination">
                <?php if ($max_page > 1) { ?>
                    <ul class="pagination-nav d-flex justify-content-end">
                        <li class="page-item <?php echo $class = $data_page == 1 ? 'disabled' : '' ?>">
                            <a class="page-link"
                               href="?paged=<?php echo $pre_page = $data_page > 1 ? $data_page - 1 : '' ?>">
                                <i class="fa fa-angle-left"></i>
                            </a>
                        </li>
                        <?php for ($i = 1; $i <= $max_page; $i++) { ?>
                            <li class="page-item <?php echo $class = $data_page == $i ? 'active' : '' ?>"><a
                                        class="page-link" href="?paged=<?php echo $i ?>"><?php echo $i ?></a></li>
                        <?php } ?>
                        <li class="page-item <?php echo $class = $data_page == $max_page ? 'disabled' : '' ?>">
                            <a class="page-link"
                               href="?paged=<?php echo $next_page = $data_page < $max_page ? $data_page + 1 : '' ?>"><i
                                        class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                <?php } ?>
            </div>
        <?php }
    }

    // Reset Post Data
    wp_reset_postdata(); ?>

</article>
