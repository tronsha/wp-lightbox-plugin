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
					<label for="mpcx_lightbox_title"><?php _e( 'Title', 'mpcx-lightbox' ); ?>:</label>
				</th>
				<td>
					<select id="mpcx_lightbox_title" name="mpcx_lightbox[title]">
						<option value="-1" <?php selected( $lightbox_options['title'], -1 ); ?>><?php _e( 'Disabled', 'mpcx-lightbox' ); ?></option>
						<option value="0" <?php selected( $lightbox_options['title'], 0 ); ?>><?php _e( 'Title', 'mpcx-lightbox' ); ?></option>
						<option value="1" <?php selected( $lightbox_options['title'], 1 ); ?>><?php _e( 'Description', 'mpcx-lightbox' ); ?></option>
						<option value="2" <?php selected( $lightbox_options['title'], 2 ); ?>><?php _e( 'Caption', 'mpcx-lightbox' ); ?></option>
					</select>
				</td>
			</tr>
		</table>
		<?php submit_button(); ?>
	</form>
</div>
