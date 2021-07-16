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
		$custom = $this->get_custom_post_types();

		return array_merge( $custom, array(
			'post'
		) );
	}

	public function get_post_data( array $args ): array {
		$query = new WP_Query( $args );

		return $query->get_posts();
	}
}
