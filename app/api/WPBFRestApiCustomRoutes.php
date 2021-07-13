<?php


namespace wpModalPlugin\api;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPBFRestApiCustomRoutes {
	public function register(): void {
		$this->register_routes();
	}

	private function register_routes(): void {
		add_action( 'rest_api_init', function () {
//			register_rest_route(
			//				WPBFApiHelper::BASE_PATH,
			//				'test-route',
			//				array(
			//					'methods'             => array( 'GET' ),
			//					'callback'            => array(),
			//					'permission_callback' => '__return_true'
			//				)
			//			);
		} );
	}
}
