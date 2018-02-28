<?php
/**
 * Create A Simple Theme Options Panel
 * Source : http://www.wpexplorer.com/wordpress-theme-options/
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Start Class
if ( ! class_exists( 'WPEX_Theme_Options' ) ) {

	class WPEX_Theme_Options {

		/**
		 * Start things up
		 *
		 * @since 1.0.0
		 */
		public function __construct() {

			// We only need to register the admin panel on the back-end
			if ( is_admin() ) {
				add_action( 'admin_menu', array( 'WPEX_Theme_Options', 'add_admin_menu' ) );
				add_action( 'admin_init', array( 'WPEX_Theme_Options', 'register_settings' ) );
			}

		}

		/**
		 * Returns all theme options
		 *
		 * @since 1.0.0
		 */
		public static function get_theme_options() {
			return get_option( 'theme_options' );
		}

		/**
		 * Returns single theme option
		 *
		 * @since 1.0.0
		 */
		public static function get_theme_option( $id ) {
			$options = self::get_theme_options();
			if ( isset( $options[$id] ) ) {
				return $options[$id];
			}
		}

		/**
		 * Add sub menu page
		 *
		 * @since 1.0.0
		 */
		public static function add_admin_menu() {
			add_menu_page(
				esc_html__( 'Theme Settings', get_bloginfo('name') ),
				esc_html__( 'Theme Settings', get_bloginfo('name') ),
				'manage_options',
				'theme-settings',
				array( 'WPEX_Theme_Options', 'create_admin_page' )
			);
		}

		/**
		 * Register a setting and its sanitization callback.
		 *
		 * We are only registering 1 setting so we can store all options in a single option as
		 * an array. You could, however, register a new setting for each option
		 *
		 * @since 1.0.0
		 */
		public static function register_settings() {
			register_setting( 'theme_options', 'theme_options', array( 'WPEX_Theme_Options', 'sanitize' ) );
		}

		/**
		 * Sanitization callback
		 *
		 * @since 1.0.0
		 */
		public static function sanitize( $options ) {

			// If we have options lets sanitize them
			if ( $options ) {

				// Checkbox
				if ( ! empty( $options['active_pwa'] ) ) {
					$options['active_pwa'] = 'on';
				} else {
					unset( $options['active_pwa'] ); // Remove from options if not checked
				}

				// Input
				//if ( ! empty( $options['input_example'] ) ) {
				//	$options['input_example'] = sanitize_text_field( $options['input_example'] );
				//} else {
				//	unset( $options['input_example'] ); // Remove from options if empty
				//}

				// Select
				if ( ! empty( $options['styleRequest'] ) ) {
					$options['styleRequest'] = sanitize_text_field( $options['styleRequest'] );
				}

			}

			// Return sanitized options
			return $options;

		}

		/**
		 * Settings page output
		 *
		 * @since 1.0.0
		 */
		public static function create_admin_page() { ?>

			<div class="wrap">

				<h1><?php esc_html_e( 'Theme Options', get_bloginfo('name') ); ?></h1>

				<form method="post" action="options.php">

					<?php settings_fields( 'theme_options' ); ?>

					<table class="form-table wpex-custom-admin-login-table">

						<?php // Checkbox example ?>
						<tr valign="top">
							<th scope="row"><?php esc_html_e( 'PWA OPTIONS', get_bloginfo('name') ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'active_pwa' ); ?>
								<input type="checkbox" name="theme_options[active_pwa]" <?php checked( $value, 'on' ); ?>> <?php esc_html_e( 'Activated PWA', get_bloginfo('name') ); ?>
							</td>
						</tr>

						<tr valign="top" class="wpex-custom-admin-screen-background-section">
							<th scope="row"><?php esc_html_e( 'Static style request mode', get_bloginfo('name') ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'styleRequest' ); ?>
								<select name="theme_options[styleRequest]">
									<?php
									$options = array(
                                        ''         => esc_html(__( 'Select', get_bloginfo('name') ) ),
										'prefetch' => esc_html__( 'Prefetch', get_bloginfo('name') ),
										'preload' => esc_html__( 'Preload', get_bloginfo('name') ),
										'dsn-prefetch' => esc_html__( 'dns-Prefetch', get_bloginfo('name') ),
									);
									foreach ( $options as $id => $label ) { ?>
										<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $value, $id, true ); ?>>
											<?php echo strip_tags( $label ); ?>
										</option>
									<?php } ?>
								</select>
							</td>
						</tr>

					</table>

					<?php submit_button(); ?>

				</form>

			</div><!-- .wrap -->
		<?php }

	}
}
