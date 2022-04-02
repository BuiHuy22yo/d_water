<?php
/**
 * Custommer Support
 *
 * @package ctwp
 */

$customer_support = get_field('customer_support', 'option') ? get_field('customer_support', 'option') : '';
$icon = $customer_support && $customer_support['icon'] ? $customer_support['icon'] : '';
$text = $customer_support && $customer_support['text'] ? $customer_support['text'] : '';
$phone = $customer_support && $customer_support['phone'] ? $customer_support['phone'] : '';

?>
<div class="wrapSupport">
    <div class="wrapSupport-inner d-flex justify-content-end align-items-center">
        <?php if($icon) {?>
        <div class="icon text-center rounded-circle dev_text-yellow bg-dark me-3">
            <?php echo $icon ?>
        </div>
        <?php }?>
        <div class="inner-right">
            <div class="text"><?php echo $text ?></div>
            <div class="phone"><?php echo $phone ?></div>
        </div>
    </div>
</div>