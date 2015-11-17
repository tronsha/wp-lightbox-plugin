<?php
/**
 * @link              https://github.com/tronsha/wp-lightbox-plugin
 * @since             1.0.0
 * @package           wp-lightbox-plugin
 *
 * @wordpress-plugin
 * Plugin Name:       MPCX Lightbox
 * Plugin URI:        https://github.com/tronsha/wp-lightbox-plugin
 * Description:       Lightbox Plugin
 * Version:           1.1.0
 * Author:            Stefan Hüsges
 * Author URI:        http://www.mpcx.net/
 * Copyright:         Stefan Hüsges
 * License:           MIT
 * License URI:       https://raw.githubusercontent.com/tronsha/wp-lightbox-plugin/master/LICENSE
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function initLightbox() {
	if ( ! is_admin() ) {
		wp_register_style(
			'lightbox',
			plugin_dir_url( __FILE__ ) . 'vendor/lightbox/css/lightbox.css',
			array(),
			'2.8.1'
		);
		wp_register_script(
			'lightbox',
			plugin_dir_url( __FILE__ ) . 'vendor/lightbox/js/lightbox.js',
			array( 'jquery' ),
			'2.8.1',
			true
		);
		wp_register_script(
			'lightbox2gallery',
			plugin_dir_url( __FILE__ ) . 'js/lightbox2gallery.js',
			array( 'jquery', 'lightbox' ),
			'1.0.0',
			true
		);
		wp_enqueue_style( 'lightbox' );
		wp_enqueue_script( 'lightbox' );
		wp_enqueue_script( 'lightbox2gallery' );
	}
}

add_action( 'init', 'initLightbox' );
