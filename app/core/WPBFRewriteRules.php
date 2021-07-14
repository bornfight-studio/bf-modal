<?php


namespace wpModalPlugin\core;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class WPBFRewriteRules {
	public function register(): void {
		add_action( 'init', array( $this, 'add_custom_rewrite' ) );
		add_action( 'query_vars', array( $this, 'add_custom_query_vars' ) );
	}

	public function add_custom_query_vars( array $vars ): array {
		$vars[] = 'post-slug';

		return $vars;
	}

	public function add_custom_rewrite(): void {

		$regex = 'news/(.+)/?$';
		$query = 'index.php?post_type=news&post-slug=$matches[1]';
		add_rewrite_rule( $regex, $query, 'top' );
	}
}
