<?php


namespace bfModalPlugin\providers;


use bfModalPlugin\core\BFConstants;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class BFPageDataProvider {
	public function get_all_is_modal_pages(): array {
		$args = array(
			'post_type'      => 'page',
			'posts_per_page' => - 1,
			'post_status'    => 'publish',
			'meta_query'     => array(
				array(
					'key'     => BFConstants::BFML_PAGE_IS_MODAL_OPTION,
					'value'   => true,
					'compare' => '==='
				)
			)
		);

		$wpbf_post_data_provider = new BFPostDataProvider();

		return $wpbf_post_data_provider->get_post_data( $args );
	}

	public function get_all_pages( array $params ): array {
		$args = array(
			'post_type'      => 'page',
			'posts_per_page' => - 1,
			'post_status'    => 'publish',
		);

		if ( ! empty( $params['post__not_in'] ) ) {
			$args = array_merge( $args, array(
				'post__not_in' => $params['post__not_in'],
			) );
		}

		$wpbf_post_data_provider = new BFPostDataProvider();

		return $wpbf_post_data_provider->get_post_data( $args );
	}
}
