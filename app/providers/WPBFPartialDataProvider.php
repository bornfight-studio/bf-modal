<?php


namespace wpModalPlugin\providers;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPBFPartialDataProvider {
	public function get_override_modal_partial_if_exists( array $data ): string {
		$post_data = get_post( $data['post_data_id'] );

		if ( empty( $post_data ) || ! is_object( $post_data ) ) {
			return locate_template( 'templates/wp-modal-plugin/layout/modal-inner.php', false, false, array(
				'post_data_id' => $data['post_data_id'],
				'return_url'   => $data['return_url']
			) );
		}

		$post_modal = locate_template( 'templates/wp-modal-plugin/layout/modal-inner_' . $post_data->post_type . '.php', false, false, array(
			'post_data_id' => $data['post_data_id'],
			'return_url'   => $data['return_url']
		) );

		if ( ! empty( $post_modal ) ) {
			return $post_modal;
		}

		return locate_template( 'templates/wp-modal-plugin/layout/modal-inner.php', false, false, array(
			'post_data_id' => $data['post_data_id'],
			'return_url'   => $data['return_url']
		) );
	}
}
