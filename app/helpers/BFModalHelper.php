<?php


namespace bfModalPlugin\helpers;

use bfModalPlugin\providers\BFPostDataProvider;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class BFModalHelper {
	public $open_popup;
	public $current_post;

	public function get_open_popup(): string {
		$this->trigger_popup();

		return $this->open_popup;
	}

	public function trigger_popup(): void {
		$this->current_post = false;

		if ( get_query_var( 'post-slug' ) ) {
			$name = get_query_var( 'post-slug' );
		}

		if ( ! empty( $name ) ) {
			$bf_post_data_provider = new BFPostDataProvider();
			$post_types            = $bf_post_data_provider->get_custom_post_types();

			$post_types = array_merge( $post_types, array( 'page', 'post' ) );

			foreach ( $post_types as $post_type ) {
				$post_data = get_page_by_path( $name, OBJECT, $post_type );

				if ( ! empty( $post_data ) ) {
					$this->current_post = $post_data;
				}
			}
		}

		if ( ! empty( $this->current_post ) ) {
			$this->open_popup = '<script> var openBFmlPopupID = ' . $this->current_post->ID . ';</script>';
		} else {
			$this->open_popup = '<script> var openBFmlPopupID = 0;</script>';
		}
	}
}
