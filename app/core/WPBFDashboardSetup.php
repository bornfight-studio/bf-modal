<?php


namespace wpModalPlugin\core;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPBFDashboardSetup {
	public $capability = 'manage_options';

	public function init(): void {
		add_action( 'admin_menu', array( $this, 'register_options_page' ) );
	}

	/**
	 *
	 * add_options_page() -> Settings
	 * add_management_page() -> Tools
	 * add_theme_page() -> Appearance
	 * add_plugins_page() -> Plugins
	 * add_users_page() -> Users
	 *
	 * add_submenu_page() -> Custom subpage -> first parameter is parent slug
	 * add_menu_page() -> Custom page
	 *
	 */
	public function register_options_page(): void {
		add_menu_page( 'WP Modal Plugin Options', 'WP Modal Plugin Options', $this->capability, WPBFMP_PLUGIN_SLUG, array(
			$this,
			'get_options_menu_page_html'
		) );
	}

	/**
	 * Main admin page html
	 */
	public function get_options_menu_page_html(): void {
		if ( ! current_user_can( $this->capability ) ) {
			exit;
		}

//		var_dump(WPBFMP_LOCAL_PLUGIN_PATH);

		load_template(WPBFMP_LOCAL_PLUGIN_PATH . 'templates/admin/main.php');

//		get_wpbf_partial( 'admin/main', array() );
	}
}
