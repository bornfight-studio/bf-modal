<?php


namespace bfModalPlugin\filters;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class BFBaseFilter {
	protected function get_request_params( \WP_REST_Request $request, array $params ): array {
		$request_params = array();
		$query_params   = $request->get_query_params();

		foreach ( $params as $param ) {
			$request_params[ $param[0] ] = isset( $query_params[ $param[0] ] ) && '' !== $query_params[ $param[0] ] ? $query_params[ $param[0] ] : $param[1];
		}

		return $request_params;
	}
}
