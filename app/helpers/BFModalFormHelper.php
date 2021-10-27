<?php


namespace bfModalPlugin\helpers;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class BFModalFormHelper {
	public static function get_selected( string $selected_option, string $option ): string {
		if ( empty( $selected_option ) ) {
			return '';
		}

		if ( $selected_option === $option ) {
			return 'selected';
		}

		return '';
	}
}
