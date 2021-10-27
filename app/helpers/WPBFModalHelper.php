<?php


namespace wpModalPlugin\helpers;

use wpModalPlugin\providers\WPBFPostDataProvider;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPBFModalHelper {
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
			$wpbf_post_data_provider = new WPBFPostDataProvider();
			$post_types              = $wpbf_post_data_provider->get_custom_post_types();

			$post_types = array_merge( $post_types, array( 'page', 'post' ) );

			foreach ( $post_types as $post_type ) {
				$post_data = get_page_by_path( $name, OBJECT, $post_type );

				if ( ! empty( $post_data ) ) {
					$this->current_post = $post_data;
				}
			}
		}

		if ( ! empty( $this->current_post ) ) {
			$this->open_popup = '<script> var openWpbfmlPopupID = ' . $this->current_post->ID . '; var firstOpen = 1;</script>';
		} else {
			$this->open_popup = '<script> var openWpbfmlPopupID = 0; var firstOpen = 0;</script>';
		}
	}
}
