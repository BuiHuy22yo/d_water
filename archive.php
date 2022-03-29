<?php
if (!defined('ABSPATH')) {
    return;
}

get_header();
get_template_part('template-parts/content', 'loop');
get_footer();