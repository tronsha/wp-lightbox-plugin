<?php
/**
 * @link              https://github.com/tronsha/wp-lightbox-plugin
 * @since             1.0.0
 * @package           wp-lightbox-plugin
 *
 * @wordpress-plugin
 * Plugin Name:       Lightbox
 * Plugin URI:        https://github.com/tronsha/wp-lightbox-plugin
 * Description:       Lightbox Plugin
 * Version:           1.1.7
 * Author:            Stefan Hüsges
 * Author URI:        http://www.mpcx.net/
 * Copyright:         Stefan Hüsges
 * License:           MIT
 * License URI:       https://raw.githubusercontent.com/tronsha/wp-lightbox-plugin/master/LICENSE
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

define( 'MPCX_LIGHTBOX_VERSION', '1.1.7' );

add_action(
	'wp_enqueue_scripts',
	function () {
		wp_register_style(
			'mpcx-lightbox',
			plugin_dir_url( __FILE__ ) . 'public/css/lightbox.min.css',
			array(),
			MPCX_LIGHTBOX_VERSION
		);
		wp_register_script(
			'mpcx-lightbox',
			plugin_dir_url( __FILE__ ) . 'public/js/lightbox.min.js',
			array( 'jquery' ),
			MPCX_LIGHTBOX_VERSION,
			true
		);
		wp_enqueue_style( 'mpcx-lightbox' );
		wp_enqueue_script( 'mpcx-lightbox' );
	}
);
