<?php


namespace bfModalPlugin\api;

use bfModalPlugin\filters\BFPopulateModalFilter;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class BFRestApiCustomRoutes {
	public function register(): void {
		$this->register_routes();
	}

	private function register_routes(): void {
		add_action( 'rest_api_init', function () {
			register_rest_route( BFApiHelper::BASE_PATH, BFApiHelper::POPULATE_MODAL, array(
				'methods'             => array( 'GET' ),
				'callback'            => array( new BFPopulateModalFilter(), 'populate_modal' ),
				'permission_callback' => '__return_true'
			) );
		} );
	}
}
