<?php

namespace bfModalPlugin\core;

use bfModalPlugin\api\BFRestApiCustomRoutes;
use bfModalPlugin\providers\BFPagesMetaBoxProvider;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class BFCore {
	public function init(): void {
		$this->init_classes();
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