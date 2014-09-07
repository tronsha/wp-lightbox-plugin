<?php
/*
Plugin Name: Lightbox
Plugin URI: https://github.com/tronsha/wp-lightbox-plugin
Description: Lightbox Plugin
Version: 1.0
Author: Stefan Hüsges
Author URI: http://www.mpcx.net/
Copyright: Stefan Hüsges
License: MIT
*/

defined('ABSPATH') or die("No script kiddies please!");

if (version_compare(phpversion(), '5.3', '<') === true) {

    echo 'Your version of PHP is ' . phpversion() . PHP_EOL;
    echo 'PHP 5.3 or higher is required' . PHP_EOL;

} else {

    add_action(
        'init',
        function () {
            if (!is_admin()) {
                wp_enqueue_style(
                    'lightbox',
                    WP_PLUGIN_URL . '/wp-lightbox-plugin/lightbox/css/lightbox.css',
                    array(),
                    '2.7.1'
                );
                wp_register_script(
                    'lightbox',
                    WP_PLUGIN_URL . '/wp-lightbox-plugin/lightbox/js/lightbox.js',
                    array('jquery'),
                    '2.7.1'
                );
                wp_register_script(
                    'lightbox2gallery',
                    WP_PLUGIN_URL . '/wp-lightbox-plugin/js/lightbox2gallery.js',
                    array('jquery', 'lightbox'),
                    '1.0.0'
                );
                wp_enqueue_script('lightbox');
                wp_enqueue_script('lightbox2gallery');
            }
        }
    );

}
