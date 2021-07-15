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
		$post_type    = get_option( WPBFConstants::WPBFML_POST_TYPE_OPTION );
		$archive_page = get_option( WPBFConstants::WPBFML_ARCHIVE_PAGE_OPTION );
		$rewrite_slug = get_option( WPBFConstants::WPBFML_POST_TYPE_REWRITE_SLUG_OPTION );

		if ( ! empty( $archive_page ) && 'archive' === $archive_page ) {
			$query = 'index.php?post_type=' . $post_type . '&post-slug=$matches[1]';
		} else {
			$query = 'index.php?page_id=' . $archive_page . '&post-slug=$matches[1]';
		}

		$regex = $rewrite_slug . '/(.+)/?$';

		add_rewrite_rule( $regex, $query, 'top' );
	}
}
