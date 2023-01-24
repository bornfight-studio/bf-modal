<?php


namespace bfModalPlugin\providers;

use WP_Query;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class BFPostDataProvider {
	public function get_custom_post_types(): array {
		$args = array(
			'public'   => true,
			'_builtin' => false,
		);

		return get_post_types( $args );
	}

	public function get_post_data( array $args ): array {
		$query = new WP_Query( $args );

		return $query->get_posts();
	}
}
