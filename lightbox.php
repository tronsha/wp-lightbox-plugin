<?php
/**
 * @link              https://github.com/tronsha/wp-lightbox-plugin
 * @since             1.0.0
 * @package           wp-lightbox-plugin
 *
 * @wordpress-plugin
 * Plugin Name:       UPA Lightbox
 * Plugin URI:        https://github.com/tronsha/wp-lightbox-plugin/blob/upa/README.md
 * Description:       Lightbox Plugin
 * Version:           1.0.1
 * Author:            UPA-Webdesign
 * Author URI:        http://www.upa-webdesign.de/
 * Copyright:         Stefan Hüsges
 * License:           MIT
 * License URI:       https://raw.githubusercontent.com/tronsha/wp-lightbox-plugin/master/LICENSE
 */


function initLightbox() {
	if ( ! is_admin() ) {
		wp_register_style(
			'lightbox',
			plugin_dir_url( __FILE__ ) . 'lightbox/css/lightbox.css',
			array(),
			'2.7.1'
		);
		wp_register_style(
			'gallery',
			plugin_dir_url( __FILE__ ) . 'css/gallery.css',
			array(),
			'1.0.0'
		);
		wp_register_script(
			'lightbox',
			plugin_dir_url( __FILE__ ) . 'lightbox/js/lightbox.js',
			array( 'jquery' ),
			'2.7.1'
		);
		wp_register_script(
			'lightbox2gallery',
			plugin_dir_url( __FILE__ ) . 'js/lightbox2gallery.js',
			array( 'jquery', 'lightbox' ),
			'1.0.0'
		);
		wp_enqueue_style( 'lightbox' );
		wp_enqueue_style( 'gallery' );
		wp_enqueue_script( 'lightbox' );
		wp_enqueue_script( 'lightbox2gallery' );
	}
}

add_action( 'init', 'initLightbox' );
