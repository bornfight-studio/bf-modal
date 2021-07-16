<?php


namespace wpModalPlugin\providers;


use wpModalPlugin\core\WPBFConstants;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPBFPageDataProvider {
	public function get_all_is_modal_pages(): array {
		$args = array(
			'post_type'      => 'page',
			'posts_per_page' => - 1,
			'post_status'    => 'publish',
			'meta_query'     => array(
				array(
					'key'     => WPBFConstants::WPBFML_PAGE_IS_MODAL_OPTION,
					'value'   => true,
					'compare' => '==='
				)
			)
		);

		$wpbf_post_data_provider = new WPBFPostDataProvider();

		return $wpbf_post_data_provider->get_post_data( $args );
	}

	public function get_all_option_pages(): array {
		$args = array(
			'post_type'      => 'page',
			'posts_per_page' => - 1,
			'post_status'    => 'publish',
		);

		$wpbf_post_data_provider = new WPBFPostDataProvider();
		$pages                   = $wpbf_post_data_provider->get_post_data( $args );

		$pages = array_merge( $pages, array(
			(object) array(
				'ID'         => 'archive',
				'post_title' => 'Archive',
			),
		) );

		return $pages;
	}
}
