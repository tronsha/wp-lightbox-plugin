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

load_plugin_textdomain( 'mpcx-lightbox', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

register_activation_hook(
	__FILE__,
	function () {
		add_option( 'mpcx_lightbox', array( 'version' => MPCX_LIGHTBOX_VERSION, 'title' => 0 ) );
	}
);

if ( true === is_admin() ) {

	add_action(
		'upgrader_process_complete',
		function ( $object, $options ) {
			if ( 'update' === $options['action'] && 'plugin' === $options['type'] ) {
				if ( true === in_array( plugin_basename( __FILE__ ), $options['plugins'] ) ) {
					include plugin_dir_path( __FILE__ ) . 'update.php';
				}
			}
		},
		10,
		2
	);

	add_action(
		'admin_init',
		function () {
			register_setting(
				'mpcx_lightbox',
				'mpcx_lightbox'
			);
		}
	);

	add_action(
		'admin_menu',
		function () {
			add_options_page(
				'Lightbox',
				'Lightbox',
				'manage_options',
				'lightbox',
				function () {
					include plugin_dir_path( __FILE__ ) . 'admin/options.php';
				}
			);
		}
	);

}

$lightbox_options = get_option( 'mpcx_lightbox' );
$title_id = intval( $lightbox_options['title'] );

if ( -1 !== $title_id ) {

	add_filter(
		'wp_get_attachment_link',
		function ( $markup, $id, $size, $permalink, $icon, $text ) {
			$lightbox_options = get_option( 'mpcx_lightbox' );
			$title_id = intval( $lightbox_options['title'] );
			$_post = get_post( $id );
			switch ( $title_id ) {
				case 1:
					$title = $_post->post_content;
					break;
				case 2:
					$title = $_post->post_excerpt;
					break;
				case 0:
				default:
					$title = $_post->post_title;
			}
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

}

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
