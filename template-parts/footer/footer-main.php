<?php

$footer_left = get_field('footer_left', 'option') ? get_field('footer_left', 'option') : '';
$left_text = $footer_left && $footer_left['title'] ? $footer_left['title'] : "";
$left_image_id = $footer_left && $footer_left['image'] ? $footer_left['image'] : "";
$left_image_url = $left_image_id ? wp_get_attachment_url($left_image_id) : "#";
$left_description = $footer_left && $footer_left['description'] ? $footer_left['description'] : "";
$left_info = $footer_left && $footer_left['info'] ? $footer_left['info'] : "";

$footer_center = get_field('footer_center', 'option') ? get_field('footer_center', 'option') : '';


$footer_right = get_field('footer_right', 'option') ? get_field('footer_right', 'option') : '';
$right_text = $footer_right && $footer_right['title'] ? $footer_right['title'] : "";
$right_list = $footer_right && $footer_right['icon_list'] ? $footer_right['icon_list'] : "";

$footer_bottom = get_field('footer_bottom', 'option') ? get_field('footer_bottom', 'option') : '';
$footer_text = $footer_bottom && $footer_bottom['text'] ? $footer_bottom['text'] : "";

?>
<div class="row pt-5">
    <div class="col-12 col-lg-4 ">
        <div class="footer-top footer-left">
            <div class="title mb-3"><?php echo $left_text ?></div>
            <div class="image mb-3">
                <img src="<?php echo $left_image_url ?>" alt="">
            </div>
            <p class="mota mb-3"><?php echo $left_description ?></p>
            <?php

            if ($left_info) {
                ?>
                <div class="list-item">
                    <?php
                    foreach ($left_info as $item) {

                        $icon = $item && $item['info_item'] && $item['info_item']['icon'] ? $item['info_item']['icon'] : "";
                        $text = $item && $item['info_item'] && $item['info_item']['text'] ? $item['info_item']['text'] : "";
                        ?>
                        <div class="item d-flex mb-2">
                            <div class="icon me-2"><?php echo $icon ?></div>
                            <div class="text"><?php echo $text ?></div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="col-12 col-lg-4 ">
        <div class="footer-top footer-center">
            <div class="title"></div>
        </div>
    </div>
    <div class="col-12 col-lg-4 ">
        <div class="footer-top footer-right">
            <div class="title "><?php echo $right_text ?></div>
            <?php
            if ($right_list) {
                ?>
                <div class="icon-list-item d-flex">
                    <?php
                    foreach ($right_list as $item) {

                        $icon_item = $item['icon_item'] ? $item['icon_item'] : [];
                        $icon = $icon_item && $icon_item['icon'] ? $icon_item['icon'] : [];
                        $link_url = $icon_item && $icon_item['link'] && $icon_item['link']['url'] ? $icon_item['link']['url'] : [];
                        ?>
                        <div class="item ">
                            <div class="icon me-2">
                                <a class="icon" href="<?php echo $link_url ?>"><?php echo $icon ?></div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="col-lg-12 ">
        <div class="footer-bottom py-2 mt-2">
            <div class="text text-center"><?php echo $footer_text ?></div>
        </div>
    </div>
</div>
