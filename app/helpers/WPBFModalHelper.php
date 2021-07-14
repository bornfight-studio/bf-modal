<?php


namespace wpModalPlugin\helpers;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPBFModalHelper {
	public $open_popup;
	public $current_post;

	public function get_open_popup(): string {
		return $this->open_popup;
	}

	public function trigger_popup( string $post_type = 'page' ): void {
		$this->current_post = false;

		if ( get_query_var( 'post-slug' ) ) {
			$name = get_query_var( 'post-slug' );
		}

		if ( ! empty( $name ) ) {
			$this->current_post = get_page_by_path( $name, OBJECT, $post_type );
		}

		if ( ! empty( $this->current_post ) ) {
			$this->open_popup = '<script> var openPopupID = ' . $this->current_post->ID . '; var firstOpen = 1;</script>';
		} else {
			$this->open_popup = '<script> var openPopupID = 0; var firstOpen = 0;</script>';
		}
	}
}
