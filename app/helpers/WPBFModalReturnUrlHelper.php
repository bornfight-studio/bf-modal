<?php


namespace wpModalPlugin\helpers;

use wpModalPlugin\core\WPBFConstants;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPBFModalReturnUrlHelper {
	public function get_post_type_return_url( int $post_id ): string {
		$post_data           = get_post( $post_id );
		$page_archive_option = get_option( WPBFConstants::WPBFML_ARCHIVE_PAGE_OPTION );

		if ( empty( $post_data ) || ! is_object( $post_data ) ) {
			return get_home_url();
		}

		if ( 'archive' === $page_archive_option ) {
			return get_post_type_archive_link( $post_data->post_type );
		}

		return get_permalink( $page_archive_option );
	}
}
