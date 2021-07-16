<?php


namespace wpModalPlugin\controller;

use wpModalPlugin\core\WPBFConstants;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPBFPagesMetaBoxController {
	public function init(): void {
		if ( is_admin() ) {
			add_action( 'add_meta_boxes_page', array( $this, 'add_meta_box_to_pages' ) );

			add_action( 'save_post_page', array( $this, 'save_page_modal_meta_box_data' ), 10, 3 );
		}
	}

	public function save_page_modal_meta_box_data( $post_id, $post, $update ) {
		$is_modal           = ! empty( $_POST['is_modal'] );
		$modal_archive_page = ! empty( $_POST['modal_archive_page'] ) ? sanitize_text_field( $_POST['modal_archive_page'] ) : '';

		update_post_meta( $post_id, WPBFConstants::WPBFML_PAGE_IS_MODAL_OPTION, $is_modal );
		update_post_meta( $post_id, WPBFConstants::WPBFML_PAGE_MODAL_ARCHIVE_PAGE_OPTION, $modal_archive_page );
	}

	public function add_meta_box_to_pages(): void {
		global $post;
		$front_page = get_option( 'page_on_front' );

		if ( $post->ID !== (int) $front_page ) {
			add_meta_box( 'modal_pages', __( 'Modal Page', WPBFConstants::WPBFML_ADMIN_DOMAIN_NAME ), array(
				$this,
				'add_meta_box_callback'
			), 'page', 'side', 'low' );
		}

	}

	public function add_meta_box_callback() {
		get_wpbf_template( 'admin/pages/modal-meta-box' );
	}
}
