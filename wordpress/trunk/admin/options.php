<?php
/**
 * @link    https://github.com/tronsha/wp-lightbox-plugin
 * @since   1.1.8
 * @package wp-lightbox-plugin
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

?>
<div class="wrap">
	<h1>
		Lightbox
	</h1>
	<form method="post" action="options.php">
		<?php settings_fields( 'mpcx_lightbox' ); ?>
		<?php $lightbox_options = get_option( 'mpcx_lightbox' ); ?>
		<input type="hidden" name="mpcx_lightbox[version]" value="<?php echo $lightbox_options['version']; ?>">
		<table class="form-table">
			<tr>
				<th scope="row">
					<label for="mpcx_lightbox_lightbox">Lightbox:</label>
				</th>
				<td>
					<select id="mpcx_lightbox_lightbox" name="mpcx_lightbox[lightbox]">
						<option value="lightbox" <?php selected( $lightbox_options['lightbox'], 'lightbox' ); ?>>Lightbox2</option>
						<option value="fancybox" <?php selected( $lightbox_options['lightbox'], 'fancybox' ); ?>>fancyBox3</option>
					</select>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="mpcx_lightbox_title"><?php _e( 'Title', 'mpcx-lightbox' ); ?>:</label>
				</th>
				<td>
					<select id="mpcx_lightbox_title" name="mpcx_lightbox[title]">
						<option value="0" <?php selected( $lightbox_options['title'], 0 ); ?>><?php _e( 'Disabled', 'mpcx-lightbox' ); ?></option>
						<option value="1" <?php selected( $lightbox_options['title'], 1 ); ?>><?php _e( 'Title', 'mpcx-lightbox' ); ?></option>
						<option value="2" <?php selected( $lightbox_options['title'], 2 ); ?>><?php _e( 'Description', 'mpcx-lightbox' ); ?></option>
						<option value="3" <?php selected( $lightbox_options['title'], 3 ); ?>><?php _e( 'Caption', 'mpcx-lightbox' ); ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="mpcx_lightbox_ajax">Ajax:</label>
				</th>
				<td>
					<input type="checkbox" id="mpcx_lightbox_ajax" name="mpcx_lightbox[ajax]" value="1"<?php checked( $lightbox_options['ajax'], 1 ); ?> />
					<p class="description" id="mpcx_lightbox_ajax-description"><?php printf( __( 'Enable this option for title support at standalone images.', 'mpcx-lightbox' ) ); ?></p>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="mpcx_lightbox_justified">Justified Gallery:</label>
				</th>
				<td>
					<input type="checkbox" id="mpcx_lightbox_justified" name="mpcx_lightbox[justified]" value="1"<?php checked( $lightbox_options['justified'], 1 ); ?> />
				</td>
			</tr>
		</table>
		<?php submit_button(); ?>
	</form>
</div>
