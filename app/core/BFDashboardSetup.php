<?php

namespace bfModalPlugin\core;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class BFDashboardSetup {
	public $capability = 'manage_options';

	public function init(): void {
		add_action( 'admin_menu', array( $this, 'register_options_page' ) );
		add_filter( 'plugin_action_links_' . BFML_PLUGIN_BASENAME, array( $this, 'add_settings_link' ), 10, 1 );
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
		add_menu_page( 'BF Modal Options', 'BF Modal Options', $this->capability, BFML_PLUGIN_SLUG, array(
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

		load_template( BFML_LOCAL_PLUGIN_PATH . 'templates/admin/main.php' );
	}

	public function add_settings_link( array $links ): array {
		$settings_link = 'admin.php?page=' . BFML_PLUGIN_SLUG;
		$links[]       = sprintf( '<a href="%s">Settings</a>', $settings_link );

		return $links;
	}
}
