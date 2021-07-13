<?php


namespace wpModalPlugin\helpers;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPBFPluginPartialHelper {
	public static function get_partial( string $partial, array $data = array() ): void {
		WPBFPluginPartialHelperBase::get_instance()->get_partial( $partial, $data, false );
	}

	public static function get_partial_html( string $partial, array $data = array() ): string {
		return WPBFPluginPartialHelperBase::get_instance()->get_partial( $partial, $data, true );
	}
}
