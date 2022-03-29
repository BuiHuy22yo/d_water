<?php

/**
 * Header
 *
 * @package ctwp
 */

namespace CTWP_THEME\Inc;

use CTWP_THEME\Inc\Traits\Singleton;

class Header {
	use Singleton;

	public function __construct() {
		$this->setup_theme();
	}

	public function setup_theme() {
		// before header
		add_action('before_header', [$this, 'open_tag_header'], 10);
		// ctwp_header
		add_action('ctwp_header', [$this, 'header_main'], 10);
		// after_header
		add_action('after_header', [$this, 'close_tag_header'], 100);
	}

	public function open_tag_header()
	{
		$classes = esc_attr( implode( ' ', $this->generate_class_header() ) );

		echo '<header class="'.$classes.'" >';
        echo '<div class="header-inner">';
        echo '<div class="container">';
        echo '<div class="row align-items-center">';

	}

	public function close_tag_header()
	{
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</header>';
	}

	public function header_main() {?>
        <div class="col-4 d-lg-none d-block"><?php
            get_template_part('template-parts/header/toggle');
            get_template_part('template-parts/header/nav');
            ?>
        </div>
        <div class="col-lg-2"><?php get_template_part('template-parts/header/logo'); ?></div>
        <div class="col-lg-5"><?php get_template_part('template-parts/header/search'); ?></div>
        <div class="col-lg-5"><?php get_template_part('template-parts/header/customer_support'); ?></div>
        <div class="col-12"><?php get_template_part('template-parts/header/nav'); ?></div>
        <?php
	}

	private function generate_class_header() {
		return apply_filters('class_header', array_map('esc_attr', ['primary-header']) );
	}
}
