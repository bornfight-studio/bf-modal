<?php


namespace wpModalPlugin\controller;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ModalFormController {
	public function save_modal_form_options( array $params ): void {
		if ( ! empty( $params['post_type'] ) ) {
			$post_type_object = get_post_type_object( $params['post_type'] );

			if ( ! empty( $post_type_object->rewrite['slug'] ) ) {
				update_option( 'wpbfml_post_type_rewrite_slug', $post_type_object->rewrite['slug'] );
			}

			update_option( 'wpbfml_post_type', $params['post_type'] );
		}

		if ( ! empty( $params['archive_page'] ) ) {
			update_option( 'wpbfml_archive_page', $params['archive_page'] );
		}
	}
}
