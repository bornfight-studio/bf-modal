<?php

namespace wpModalPlugin\filters;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use WP_REST_Request;
use WP_REST_Response;
use wpModalPlugin\helpers\WPBFModalReturnUrlHelper;

class WPBFPopulateModalFilter extends WPBFBaseFilter {
	public function populate_modal( WP_REST_Request $request ): WP_REST_Response {
		$query_params = $this->get_request_params( $request, array(
			array( 'page_id', null ),
			array( 'return_url', '' ),
		) );

		$modal = '';
		if ( ! empty( $query_params['page_id'] ) ) {
			$modal = $this->get_modal( (int) $query_params['page_id'], $query_params['return_url'] );
		}

		$url = get_permalink( $query_params['page_id'] );

		$response_data = array(
			'html' => $modal,
			'url'  => $url,
		);

		$response = new WP_REST_Response( $response_data );
		$response->set_status( 200 );

		return $response;
	}

	public function get_modal( int $post_data_id, string $return_url ): string {
		ob_start();
		ob_implicit_flush( 0 );

		if ( empty( $return_url ) ) {
			$wpbf_modal_return_url_helper = new WPBFModalReturnUrlHelper();
			$return_url                   = $wpbf_modal_return_url_helper->get_post_type_return_url( $post_data_id );
		}

		$located = locate_template( 'templates/wp-modal-plugin/layout/modal-inner.php', true, false, array(
			'post_data_id' => $post_data_id,
			'return_url'   => $return_url
		) );

		if ( empty( $located ) ) {
			get_wpbf_template( 'layout/modal-inner', array(
				'post_data_id' => $post_data_id,
				'return_url'   => $return_url,
			) );
		}

		return ob_get_clean();
	}
}
