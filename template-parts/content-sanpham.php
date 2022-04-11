<?php
//$dev_des = get_field('description','option') ? get_field('description','option'):'';
$dev_des = get_post_meta(get_the_id(),'description',true);
$sale = get_post_meta(get_the_id(), 'sale_price', true);
$regular = get_post_meta(get_the_id(), 'regular_price', true);
$symbol = get_field('currency_symbol', 'option') ? get_field('currency_symbol', 'option') : 'đ';
if($sale){
    $sale_format = number_format($sale, 0, '', ',');
}
if($regular){
    $regular_format = number_format($regular, 0, '', ',');
}
?>


<div class="custom-post-type bg-white py-3" id="post-<?php the_ID(); ?>" >
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-4">
            <div class="image position-relative">
                <img class="d-inline-block w-100 h-100 position-absolute top-0 start-0" src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-lg-8">
            <div class="product-info">
                <div class="product-name">
                    <a href="<?php echo esc_url(the_permalink()); ?>"> <?php the_title() ?></a>
                </div>
                <?php if ($regular) { ?>
                    <div class="product-price d-inline-flex">
                        <?php if ($sale && $sale < $regular) { ?>
                            <div class="price-sale"><?php echo $sale_format . $symbol ?></div>
                            <div class="price-regular"><?php echo $regular_format . $symbol ?></div>
                        <?php } else { ?>
                            <div class="price-sale"><?php echo $regular_format . $symbol ?></div>
                        <?php } ?>
                    </div>
                <?php } ?>
                <div class="dev_description">
                    <?php echo $text = $dev_des ? $dev_des :''?>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
