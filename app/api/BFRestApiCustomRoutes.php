<?php


namespace bfModalPlugin\api;

use bfModalPlugin\filters\BFPopulateModalFilter;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class BFRestApiCustomRoutes {
	const POPULATE_MODAL = 'bfml-populate-modal';
	const BASE_PATH = 'api/v1';

	public function register(): void {
		$this->register_routes();
	}

	private function register_routes(): void {
		add_action( 'rest_api_init', function () {
			register_rest_route( self::BASE_PATH, self::POPULATE_MODAL, array(
				'methods'             => array( 'GET' ),
				'callback'            => array( new BFPopulateModalFilter(), 'populate_modal' ),
				'permission_callback' => '__return_true'
			) );
		} );
	}
}
