<?php


namespace wpModalPlugin\core;

use wpModalPlugin\providers\WPBFPageDataProvider;
use wpModalPlugin\providers\WPBFPostDataProvider;

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
		$post_types    = get_option( WPBFConstants::WPBFML_POST_TYPE_OPTION );
		$archive_pages = get_option( WPBFConstants::WPBFML_ARCHIVE_PAGE_OPTION );
		$rewrite_slugs = get_option( WPBFConstants::WPBFML_POST_TYPE_REWRITE_SLUG_OPTION );

		if ( ! empty( $post_types ) ) {
			foreach ( $post_types as $post_type => $value ) {
				if ( 'post' === $post_type ) {
					$this->add_custom_rewrite_for_defaults_post_type( $archive_pages[ $post_type ] );
				} else {
					$this->add_custom_rewrite_for_custom_post_types( $post_type, $archive_pages[ $post_type ], $rewrite_slugs[$post_type] );
				}
			}
		}


		$this->add_custom_rewrite_rules_for_modal_pages();
	}

	public function add_custom_rewrite_for_custom_post_types( string $post_type, string $archive_page, string $rewrite_slug ): void {
		if ( 'archive' === $archive_page ) {
			$query = 'index.php?post_type=' . $post_type . '&post-slug=$matches[1]';
		} else {
			$query = 'index.php?page_id=' . $archive_page . '&post-slug=$matches[1]';
		}

		$regex = $rewrite_slug . '/(.+)/?$';

		$this->add_rewrite_rule( $regex, $query );
	}

	public function add_custom_rewrite_for_defaults_post_type(string $archive_page_id): void {
		$args = array(
			'post_type'      => 'post',
			'posts_per_page' => - 1,
			'post_status'    => 'publish',
		);

		$wpbf_post_data_provider = new WPBFPostDataProvider();
		$all_posts               = $wpbf_post_data_provider->get_post_data( $args );

		if ( ! empty( $all_posts ) ) {
			foreach ( $all_posts as $all_post ) {

				if ( empty( $archive_page_id ) || 'archive' === $archive_page_id ) {
					$archive_page_id = get_option( 'page_on_front' );
				}

				$regex = $all_post->post_name . '/?$';
				$query = 'index.php?page_id=' . $archive_page_id . '&post-slug=' . $all_post->post_name;
				$this->add_rewrite_rule( $regex, $query );
			}
		}
	}

	public function add_custom_rewrite_rules_for_modal_pages(): void {
		$wpbf_page_data_provider = new WPBFPageDataProvider();
		$pages                   = $wpbf_page_data_provider->get_all_is_modal_pages();

		if ( ! empty( $pages ) ) {
			foreach ( $pages as $page ) {
				$redirect_page_meta = get_post_meta( $page->ID, WPBFConstants::WPBFML_PAGE_MODAL_ARCHIVE_PAGE_OPTION );
				$redirect_page_id   = ! empty( $redirect_page_meta[0] ) ? $redirect_page_meta[0] : '';

				if ( empty( $redirect_page_id ) ) {
					$redirect_page_id = get_option( 'page_on_front' );
				}

				$regex = $page->post_name . '/?$';
				$query = 'index.php?page_id=' . $redirect_page_id . '&post-slug=' . $page->post_name;

				$this->add_rewrite_rule( $regex, $query );
			}
		}
	}

	public function add_rewrite_rule( string $regex, string $query, $after = 'top' ): void {
		add_rewrite_rule( $regex, $query, $after );
	}
}
