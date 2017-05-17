<?php
/**
 * @link    https://github.com/tronsha/wp-lightbox-plugin
 * @package wp-lightbox-plugin
 */

define( 'MPCX_LIGHTBOX_UPDATE_VERSION', '1.2.1' );
$data = get_option( 'mpcx_lightbox' );
if ( true === isset( $data['version'] ) && version_compare( $data['version'], MPCX_LIGHTBOX_UPDATE_VERSION, '<' ) ) {
	$data['version'] = MPCX_LIGHTBOX_UPDATE_VERSION;
	update_option( 'mpcx_lightbox', $data );
}
