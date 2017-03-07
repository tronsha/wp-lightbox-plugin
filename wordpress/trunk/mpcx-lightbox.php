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
 * Version:           1.1.8
 * Author:            Stefan Hüsges
 * Author URI:        http://www.mpcx.net/
 * Copyright:         Stefan Hüsges
 * Text Domain:       mpcx-lightbox
 * Domain Path:       /languages/
 * License:           MIT
 * License URI:       https://raw.githubusercontent.com/tronsha/wp-lightbox-plugin/master/LICENSE
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

define( 'MPCX_LIGHTBOX_VERSION', '1.1.8' );

load_plugin_textdomain( 'mpcx-lightbox', false, dirname( plugin_basename( __FILE__ ) ) . '/localization' );

add_filter(
	'wp_get_attachment_link',
	function ( $markup, $id, $size, $permalink, $icon, $text ) {
		$_post = get_post( $id );
		$title = $_post->post_title;
		$parts = explode( '>', $markup, 2 );
		if ( false === empty( $title ) && false === empty( $parts[0] ) && false === empty( $parts[1] ) ) {
			if ( false === strpos( $parts[0], 'data-title' ) ) {
				$markup = $parts[0] . " data-title='" . $title . "'>" . $parts[1];
			}
		}

		return $markup;
	},
	10,
	6
);

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
