<?php
add_action('admin_head', 'redxunlite_admin_css');
function redxunlite_admin_css() {
  echo
	'<style>
    .redxunhello ul {padding-left: 20px; margin-top: 10px; margin-bottom: 10px;}
		.redxunhello ul li {position:relative;}
		.redxunhello ul li:before {content:"✓"; margin-right:5px;}
		.redxunlite-clear {clear:both;float:none;}
		.youtube-embed { width  : 740px;  height : 400px;}
    .youtube-embed iframe { width  : 100%; height : 100%;}
  </style>';
}

class RedxunLite_Lite_Welcome {
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'redxunLite_lite_welcome_register_menu' ) );
		add_action( 'load-themes.php', array( $this, 'redxunLite_lite_activation_admin_notice' ) );
		add_action( 'redxunLite_lite_welcome', array( $this, 'redxunLite_lite_welcome_getting_started' ),  10 );
}

	/**
	 * Creates the dashboard page
	 *
	 * @see  add_theme_page()
	 */
	public function redxunLite_lite_welcome_register_menu() {
		add_theme_page( 'About Redxun', 'About Redxun', 'activate_plugins', 'redxunlite-welcome', array( $this, 'redxunLite_lite_welcome_screen' ) );
	}
	/**
	 * Adds an admin notice upon successful activation.
	 */
	public function redxunLite_lite_activation_admin_notice() {
		global $pagenow;
		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'redxunLite_lite_welcome_admin_notice' ), 99 );
		}
	}
	/**
	 * Display an admin notice linking to the welcome screen
	 */
	public function redxunLite_lite_welcome_admin_notice() {
		?>
			<div class="updated notice is-dismissible">
				<p><?php echo sprintf( esc_html__( 'Welcome! Thank you for choosing Redxun Lite! Make sure you visit our %1$swelcome page%1$s.', 'redxunlite' ), '<a href="' . esc_url( admin_url( 'themes.php?page=redxunlite-welcome' ) ) . '">', '</a>' ); ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=redxunlite-welcome' ) ); ?>" class="button" style="text-decoration: none;"><?php _e( 'Get started with Redxun Lite', 'redxunlite' ); ?></a></p>
			</div>
		<?php
	}

	/**
	 * Welcome screen content
	 */
	public function redxunLite_lite_welcome_screen() {
		require_once( ABSPATH . 'wp-load.php' );
		require_once( ABSPATH . 'wp-admin/admin.php' );
		require_once( ABSPATH . 'wp-admin/admin-header.php' );
		?>

		<div class="redxunlite-tab-content">
			<?php
			do_action( 'redxunLite_lite_welcome' ); ?>
		</div>
		<?php
	}
	/**
	 * Getting started
	 */
	public function redxunLite_lite_welcome_getting_started() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/getting-started.php' );
	}
}
$GLOBALS['RedxunLite_Lite_Welcome'] = new RedxunLite_Lite_Welcome();
