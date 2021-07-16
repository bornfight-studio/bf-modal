<?php


namespace wpModalPlugin\helpers;

use WP_Post;
use wpModalPlugin\core\WPBFConstants;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPBFModalReturnUrlHelper {
	public function get_post_type_return_url( WP_Post $post_data ): string {
		$page_archive_option = get_option( WPBFConstants::WPBFML_ARCHIVE_PAGE_OPTION );

		if ( 'archive' === $page_archive_option ) {
			return get_post_type_archive_link( $post_data->post_type );
		}

		return get_permalink( $page_archive_option );
	}

	public function get_return_url( int $post_id ): string {
		$post_data = get_post( $post_id );

		if ( empty( $post_data ) || ! is_object( $post_data ) ) {
			return get_home_url();
		}

		if ( 'page' === $post_data->post_type ) {
			return $this->get_page_return_url( $post_id );
		}

		return $this->get_post_type_return_url( $post_data );
	}

	public function get_page_return_url( int $post_id ): string {
		$archive_url = get_post_meta( $post_id, WPBFConstants::WPBFML_PAGE_MODAL_ARCHIVE_PAGE_OPTION );

		if ( empty( $archive_url ) ) {
			return get_home_url();
		}

		return get_permalink( $archive_url );
	}
}
