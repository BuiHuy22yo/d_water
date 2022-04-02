<?php

/**
 * Footer
 *
 * @package ctwp
 */

namespace CTWP_THEME\Inc;

use CTWP_THEME\Inc\Traits\Singleton;

class Footer {
	use Singleton;

	public function __construct() {
		$this->setup_theme();
	}

	public function setup_theme() {
		// before footer
		add_action('before_footer', [$this, 'open_tag_footer'], 10);
		// ctwp_footer
		add_action('ctwp_footer', [$this, 'footer_main'], 10);
		// after_footer
		add_action('after_footer', [$this, 'close_tag_footer'], 100);
	}

	public function open_tag_footer()
	{
		$classes = esc_attr( implode( ' ', $this->generate_class_footer() ) );

		echo '<footer class="'.$classes.'" >';
        echo '<div class="footer-inner bg-white">';
        echo '<div class="container ">';
	}

	public function close_tag_footer()
	{
		echo '</div>';
		echo '</div>';
		echo '</footer>';
	}

	public function footer_main() {
//		get_template_part('template-parts/footer/logo');
		get_template_part('template-parts/footer/footer-main');

	}

	private function generate_class_footer() {
		return apply_filters('class_footer', array_map('esc_attr', ['primary-footer']) );
	}
}
