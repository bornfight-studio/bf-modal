<?php

namespace bfModalPlugin\helpers;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class BFNavigationHelper {
	public static function get_main_url_params() : string {
		return '?page=' . BFML_PLUGIN_SLUG;
	}

	public static function get_other_options_url_params() : string {
		return self::get_main_url_params() . '&tab=other-options';
	}
}