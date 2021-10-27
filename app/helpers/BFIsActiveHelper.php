<?php


namespace bfModalPlugin\helpers;

use bfModalPlugin\core\BFConstants;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class BFIsActiveHelper {
	public static function is_archive_page_selected( string $page_id, int $index ): string {
		$selected_archive_page = get_option( BFConstants::BFML_ARCHIVE_PAGE_OPTION );

		if ( empty( $selected_archive_page ) || ! is_array( $selected_archive_page ) ) {
			return '';
		}

		$selected_archive_pages = array_values( $selected_archive_page );

		$key = $index - 1;

		if ( empty( $selected_archive_pages[ $key ] ) ) {
			return '';
		}

		if ( $selected_archive_pages[ $key ] === (string) $page_id ) {
			return 'selected';
		}

		return '';
	}
}
