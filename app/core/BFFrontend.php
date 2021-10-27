<?php


namespace bfModalPlugin\core;

use bfModalPlugin\helpers\BFModalHelper;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class BFFrontend {
	public function init(): void {
		add_action( 'wp_footer', array( $this, 'add_popup_to_footer' ) );
	}

	public function add_popup_to_footer(): void {
		$wpbf_modal_helper = new BFModalHelper();
		echo $wpbf_modal_helper->get_open_popup();
		$template = locate_template( BFML_PLUGIN_SLUG . '/templates/modal.php', false, false, array() );

		if ( ! empty( $template ) ) {
			load_template( $template );
		} else {
			load_template( BFML_LOCAL_PLUGIN_PATH . '/templates/modal.php' );
		}
	}
}
