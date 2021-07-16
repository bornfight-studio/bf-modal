<?php


namespace wpModalPlugin\core;

use wpModalPlugin\providers\WPBFPageDataProvider;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class WPBFRewriteRules {
	public function register(): void {
		add_action( 'init', array( $this, 'add_custom_rewrite' ) );
		add_action( 'query_vars', array( $this, 'add_custom_query_vars' ) );
		add_action( 'template_redirect', array( $this, 'remove_canonical_redirect' ), 0 );
	}

	public function remove_canonical_redirect(): void {
		if ( is_front_page() ) {
			remove_action( 'template_redirect', 'redirect_canonical' );
		}
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

		$this->add_rewrite_rule( $regex, $query );

		$this->add_custom_rewrite_rules_for_modal_pages();
	}

	public function add_custom_rewrite_rules_for_modal_pages(): void {
		$wpbf_page_data_provider = new WPBFPageDataProvider();
		$pages                   = $wpbf_page_data_provider->get_all_is_modal_pages();

		if ( ! empty( $pages ) ) {
			foreach ( $pages as $page ) {
				$redirect_page_id = get_post_meta( $page->ID, '_wpbfml_archive_page' );

				if ( empty( $redirect_page_id ) ) {
					$redirect_page_id = get_option( 'page_on_front' );
				}

				$regex = $page->post_name . '/?$';
				$query = 'index.php?page_id=' . $redirect_page_id . '&post-slug=' . $page->post_name;

				add_rewrite_rule( $regex, $query, 'top' );
			}
		}
	}

	public function add_rewrite_rule( string $regex, string $query, $after = 'top' ): void {
		add_rewrite_rule( $regex, $query, $after );
	}
}
