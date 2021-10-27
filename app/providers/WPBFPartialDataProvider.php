<?php


namespace wpModalPlugin\providers;

use wpModalPlugin\core\WPBFConstants;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPBFPartialDataProvider {
	public function get_override_modal_partial_if_exists( array $data ): string {
		$post_data = get_post( $data['post_data_id'] );

		if ( empty( $post_data ) || ! is_object( $post_data ) ) {
			return locate_template( 'wp-modal-plugin/templates/modal-inner.php', false, false, array(
				'post_data_id' => $data['post_data_id'],
				'return_url'   => $data['return_url']
			) );
		}

		$modal_template      = get_post_meta( $data['post_data_id'], WPBFConstants::WPBFML_MODAL_TEMPLATES_OPTION );
		$modal_template_name = ! empty( $modal_template[0] ) ? $modal_template[0] : '';

		if ( ! empty( $modal_template_name ) ) {
			$modal_template = locate_template( 'wp-modal-plugin/templates/modal-inner_' . $modal_template_name . '.php', false, false, array(
				'post_data_id' => $data['post_data_id'],
				'return_url'   => $data['return_url']
			) );

			if ( ! empty( $modal_template ) ) {
				return $modal_template;
			}
		}

		$post_modal = locate_template( 'wp-modal-plugin/templates/modal-inner_' . $post_data->post_type . '.php', false, false, array(
			'post_data_id' => $data['post_data_id'],
			'return_url'   => $data['return_url']
		) );

		if ( ! empty( $post_modal ) ) {
			return $post_modal;
		}

		return locate_template( 'wp-modal-plugin/templates/modal-inner.php', false, false, array(
			'post_data_id' => $data['post_data_id'],
			'return_url'   => $data['return_url']
		) );
	}
}
