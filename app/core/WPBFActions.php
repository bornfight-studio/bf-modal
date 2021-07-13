<?php


namespace wpModalPlugin\core;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPBFActions {
	/**
	 *
	 * Fired on plugin activation hook
	 *
	 * @since    1.0.0
	 */
	public static function activate(): void {
		// Do something at plugin activation
	}

	/**
	 *
	 * Fired on plugin deactivation hook
	 * Maybe better to use uninstall.php file
	 *
	 * @since    1.0.0
	 */

	public static function deactivate(): void {
		// Do something when plugin is deactivated
	}
}
