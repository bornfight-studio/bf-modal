<?php


namespace wpModalPlugin\api;

use wpModalPlugin\filters\WPBFPopulateModalFilter;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPBFRestApiCustomRoutes {
	public function register(): void {
		$this->register_routes();
	}

	private function register_routes(): void {
		add_action( 'rest_api_init', function () {
			register_rest_route( WPBFApiHelper::BASE_PATH, WPBFApiHelper::POPULATE_MODAL, array(
				'methods'             => array( 'GET' ),
				'callback'            => array( new WPBFPopulateModalFilter(), 'populate_modal' ),
				'permission_callback' => '__return_true'
			) );
		} );
	}
}
