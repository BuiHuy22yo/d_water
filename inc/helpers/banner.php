<?php
if (!defined('ABSPATH')) {
    return;
}

if (!function_exists('cct_banner')) {
    function cct_banner($url) {
        $html = '';
        $html .= '<div class="banner"><img src="'.$url.'"></div>';
        return $html;
    }
}