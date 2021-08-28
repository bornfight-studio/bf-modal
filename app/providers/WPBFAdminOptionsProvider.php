<?php


namespace wpModalPlugin\providers;

use wpModalPlugin\core\WPBFConstants;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPBFAdminOptionsProvider {
	public function save_modal_form_options( array $params ): void {
		if ( ! empty( $params['wpbf_modal_post_types'] ) ) {

			$rewrite_slugs = array();
			foreach ( $params['wpbf_modal_post_types'] as $post_type => $value ) {
				$post_object = get_post_type_object( $post_type );

				if ( ! empty( $post_object ) && ! empty( $post_object->rewrite['slug'] ) ) {
					$rewrite_slugs[ $post_type ] = $post_object->rewrite['slug'];
				}
			}
			update_option( WPBFConstants::WPBFML_POST_TYPE_REWRITE_SLUG_OPTION, $rewrite_slugs );
			update_option( WPBFConstants::WPBFML_POST_TYPE_OPTION, $params['wpbf_modal_post_types'] );
		}

		if ( ! empty( $params['wpbfml_archive_page'] ) ) {
			update_option( WPBFConstants::WPBFML_ARCHIVE_PAGE_OPTION, $params['wpbfml_archive_page'] );
		}
	}
}
