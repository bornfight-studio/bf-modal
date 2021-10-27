<?php


namespace wpModalPlugin\core;

use wpModalPlugin\helpers\WPBFModalHelper;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPBFFrontend {
	public function init(): void {
		add_action( 'wp_footer', array( $this, 'add_popup_to_footer' ) );
	}

	public function add_popup_to_footer(): void {
		$wpbf_modal_helper = new WPBFModalHelper();
		echo $wpbf_modal_helper->get_open_popup();
		$template = locate_template( 'wp-modal-plugin/templates/modal.php', false, false, array() );

		if ( ! empty( $template ) ) {
			load_template( $template );
		} else {
			load_template( WPBFMP_LOCAL_PLUGIN_PATH . '/templates/modal.php' );
		}
	}
}
