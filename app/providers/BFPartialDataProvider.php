<?php


namespace bfModalPlugin\providers;

use bfModalPlugin\core\BFConstants;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class BFPartialDataProvider {
	public function get_override_modal_partial_if_exists( array $data ): string {
		$post_data = get_post( $data['post_data_id'] );

		if ( empty( $post_data ) || ! is_object( $post_data ) ) {
			return locate_template( BFML_PLUGIN_SLUG . '/templates/modal-inner.php', false, false, array(
				'post_data_id' => $data['post_data_id'],
				'return_url'   => $data['return_url']
			) );
		}

		$modal_template      = get_post_meta( $data['post_data_id'], BFConstants::BFML_MODAL_TEMPLATES_OPTION );
		$modal_template_name = ! empty( $modal_template[0] ) ? $modal_template[0] : '';

		if ( ! empty( $modal_template_name ) ) {
			$modal_template = locate_template( BFML_PLUGIN_SLUG . '/templates/modal-inner_' . $modal_template_name . '.php', false, false, array(
				'post_data_id' => $data['post_data_id'],
				'return_url'   => $data['return_url']
			) );

			if ( ! empty( $modal_template ) ) {
				return $modal_template;
			}
		}

		$post_modal = locate_template( BFML_PLUGIN_SLUG . '/templates/modal-inner_' . $post_data->post_type . '.php', false, false, array(
			'post_data_id' => $data['post_data_id'],
			'return_url'   => $data['return_url']
		) );

		if ( ! empty( $post_modal ) ) {
			return $post_modal;
		}

		return locate_template( BFML_PLUGIN_SLUG . '/templates/modal-inner.php', false, false, array(
			'post_data_id' => $data['post_data_id'],
			'return_url'   => $data['return_url']
		) );
	}
}
