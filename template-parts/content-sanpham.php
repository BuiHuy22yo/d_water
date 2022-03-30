<?php
//$dev_des = get_field('description','option') ? get_field('description','option'):'';
$dev_des = get_post_meta(get_the_id(),'description',true)
?>


<div class="custom-post-type bg-white py-3" id="post-<?php the_ID(); ?>" >
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-4">
            <div class="image">
                <img class="w-100" src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-lg-8">
            <div class="product-info">
                <div class="product-name">
                    <a href="<?php echo esc_url(the_permalink()); ?>"> <?php the_title() ?></a>
                </div>
                <div class="product-price d-inline-flex">
                    <div class="price-sale">319,000k</div>
                    <div class="price-regular">355,000</div>
                </div>
                <div class="dev_description">
                    <?php echo $text = $dev_des ? $dev_des :''?>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
