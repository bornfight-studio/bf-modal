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
		$template = locate_template( 'templates/wp-modal-plugin/layout/modal.php', false, false, array() );

		if ( ! empty( $template ) ) {
			load_template( $template );
		} else {
			load_template( WPBFMP_LOCAL_PLUGIN_PATH . '/templates/layout/modal.php' );
		}
	}
}
