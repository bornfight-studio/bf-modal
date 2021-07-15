<?php


namespace wpModalPlugin\core;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPBFFrontend {
	public function init(): void {
		add_action( 'wp_footer', array( $this, 'add_popup_to_footer' ) );
	}

	public function add_popup_to_footer(): void {
		load_template(WPBFMP_LOCAL_PLUGIN_PATH . '/templates/layout/modal.php');
//		get_wpbf_partial( 'layout/modal', array() );
	}
}
