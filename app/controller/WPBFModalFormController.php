<?php


namespace wpModalPlugin\controller;

use wpModalPlugin\core\WPBFConstants;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPBFModalFormController {
	public function save_modal_form_options( array $params ): void {
		if ( ! empty( $params['wpbfml_post_type'] ) ) {
			$post_type_object = get_post_type_object( $params['wpbfml_post_type'] );

			if ( ! empty( $post_type_object->rewrite['slug'] ) ) {
				update_option( WPBFConstants::WPBFML_POST_TYPE_REWRITE_SLUG_OPTION, $post_type_object->rewrite['slug'] );
			} else {
				update_option( WPBFConstants::WPBFML_POST_TYPE_REWRITE_SLUG_OPTION, $params['wpbfml_post_type'] );
			}

			update_option( WPBFConstants::WPBFML_POST_TYPE_OPTION, $params['wpbfml_post_type'] );
		}

		if ( ! empty( $params['wpbfml_archive_page'] ) ) {
			update_option( WPBFConstants::WPBFML_ARCHIVE_PAGE_OPTION, $params['wpbfml_archive_page'] );
		}
	}
}
