<?php


namespace wpModalPlugin\helpers;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPBFModalFormHelper {
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
