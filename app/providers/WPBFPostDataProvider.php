<?php


namespace wpModalPlugin\providers;

use WP_Query;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPBFPostDataProvider {
	public function get_custom_post_types(): array {
		$args = array(
			'public'   => true,
			'_builtin' => false,
		);

		return get_post_types( $args );
	}

	public function get_post_types(): array {
		return $this->get_custom_post_types();
//		$default = array(
//			'post',
//			'page',
//		);
//
//		$custom = $this->get_custom_post_types();
//
//		return array_merge( $custom, $default );
	}

	public function get_post_data( array $args ): array {
		$query = new WP_Query( $args );

		return $query->get_posts();
	}

	public function get_all_option_pages(): array {
		$args = array(
			'post_type'      => 'page',
			'posts_per_page' => - 1,
			'post_status'    => 'publish',
		);

		$pages = $this->get_post_data( $args );

		$pages = array_merge( $pages, array(
			(object) array(
				'ID'         => 'archive',
				'post_title' => 'Archive',
			),
		) );

		return $pages;
	}
}
