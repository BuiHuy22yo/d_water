<?php

/**
* Hook
*
* @package Ctwp
*/

namespace CTWP_THEME\Inc;

use CTWP_THEME\Inc\Traits\Singleton;

class Hooks {

	use Singleton;

	protected function __construct() {

		// load class.
		$this->setup_hooks();
	}

	protected function setup_hooks() {

		/**
		 * Actions.
		 */

        add_action('init', array($this,'mbc_create_postype_sanpham'));
		
	}


    public function mbc_create_postype_sanpham()
    {
        $args = array(
            'labels' => array(
                'name' => esc_html__('Sản Phẩm', 'mbc'),
                'singular_name' => esc_html__('Sản Phẩm', 'mbc'),
                'add_new_item' => esc_html__('Add Sản Phẩm', 'mbc'),
                'add_new' => esc_html__('Add Sản Phẩm', 'mbc'),
            ),
            'public' => true,
            'has_archive' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => true,
            'hierarchical' => false,
            'taxonomies' => array('category', 'post_tag'),
            'supports' => array('title', 'editor', 'thumbnail', 'author'),
            'menu_icon' => 'dashicons-products',
            'rewrite' => array(
                'slug' => 'sanpham',
                'with_front' => true,
                'feeds' => true,
                'pages' => true,
            ),
        );

        register_post_type('sanpham', $args);
    }

}