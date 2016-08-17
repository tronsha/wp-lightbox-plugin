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
 * Version:           1.1.6
 * Author:            Stefan Hüsges
 * Author URI:        http://www.mpcx.net/
 * Copyright:         Stefan Hüsges
 * License:           MIT
 * License URI:       https://raw.githubusercontent.com/tronsha/wp-lightbox-plugin/master/LICENSE
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

if ( ! is_admin() ) {

	add_action(
		'init',
		function () {
			wp_register_style(
				'mpcx-lightbox',
				plugin_dir_url( __FILE__ ) . 'public/css/lightbox.min.css',
				array(),
				'1.1.6'
			);
			wp_register_script(
				'mpcx-lightbox',
				plugin_dir_url( __FILE__ ) . 'public/js/lightbox.min.js',
				array( 'jquery' ),
				'1.1.6',
				true
			);
			wp_enqueue_style( 'mpcx-lightbox' );
			wp_enqueue_script( 'mpcx-lightbox' );
		}
	);

}
