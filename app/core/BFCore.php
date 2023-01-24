<?php

namespace bfModalPlugin\core;

use bfModalPlugin\api\BFApiHelper;
use bfModalPlugin\api\BFRestApiCustomRoutes;
use bfModalPlugin\providers\BFPagesMetaBoxProvider;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class BFCore {
	public function init(): void {
		$this->init_classes();

		add_action( 'wp_enqueue_scripts', array( $this, 'add_public_scripts' ) );
	}

	public function add_public_scripts(): void {
		if ( empty( get_option( BFConstants::BFML_DISABLE_FRONT_STYLES_OPTION ) ) ) {
			wp_enqueue_style( 'bfml_public-css', BFML_LOCAL_PLUGIN_URL . 'static/public/dist/style.css', null, '1.0.1', false );
		}
		wp_enqueue_script( 'bfml_public-js', BFML_LOCAL_PLUGIN_URL . 'static/public/dist/bundle.js', null, '1.0.1', true );

		wp_localize_script( 'bfml_public-js', 'bf_frontend_ajax_object', array(
			'ajax_url'       => get_rest_url() . 'api/v1',
			'populate_modal' => BFApiHelper::POPULATE_MODAL,
			'ajax_nonce'     => wp_create_nonce( 'wp_rest' )
		) );
	}

	private function init_classes(): void {
		$bf_dashboard_setup = new BFDashboardSetup();
		$bf_dashboard_setup->init();

		$bf_rest_api_custom_routes = new BFRestApiCustomRoutes();
		$bf_rest_api_custom_routes->register();

		$bf_frontend = new BFFrontend();
		$bf_frontend->init();

		$bf_rewrite_rules = new BFRewriteRules();
		$bf_rewrite_rules->register();

		$bf_pages_meta_box_provider = new BFPagesMetaBoxProvider();
		$bf_pages_meta_box_provider->init();
	}
}