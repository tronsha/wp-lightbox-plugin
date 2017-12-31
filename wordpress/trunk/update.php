<?php
/**
 * @link    https://github.com/tronsha/wp-lightbox-plugin
 * @package wp-lightbox-plugin
 */

define( 'MPCX_LIGHTBOX_UPDATE_VERSION', '1.2.4' );
$data = get_option( 'mpcx_lightbox' );
if ( true === isset( $data['version'] ) && version_compare( $data['version'], MPCX_LIGHTBOX_UPDATE_VERSION, '<' ) ) {
        if ( false === isset( $data['gallery'] ) ) {
            $data['gallery'] = 1;
        }
        if ( false === isset( $data['standalone'] ) ) {
            $data['standalone'] = 1;
        }
}
$data['version'] = MPCX_LIGHTBOX_UPDATE_VERSION;
update_option( 'mpcx_lightbox', $data );
