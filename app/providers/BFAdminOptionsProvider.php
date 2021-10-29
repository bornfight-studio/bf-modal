<?php


namespace bfModalPlugin\providers;

use bfModalPlugin\core\BFConstants;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class BFAdminOptionsProvider {
	// TODO: this needs some adjustments
	public function save_modal_admin_settings( array $params ): void {
		if ( ! empty( $params['bfml_modal_post_types'] ) ) {

			$rewrite_slugs = array();
			foreach ( $params['bfml_modal_post_types'] as $post_type => $value ) {
				$post_object = get_post_type_object( $post_type );

				if ( ! empty( $post_object ) && ! empty( $post_object->rewrite['slug'] ) ) {
					$rewrite_slugs[ $post_type ] = sanitize_text_field( $post_object->rewrite['slug'] );
				}
			}

			array_walk( $params['bfml_modal_post_types'], function ( &$value, &$key ) {
				$value = sanitize_text_field( $value );
			} );

			update_option( BFConstants::BFML_POST_TYPE_REWRITE_SLUG_OPTION, $rewrite_slugs );
			update_option( BFConstants::BFML_POST_TYPE_OPTION, $params['bfml_modal_post_types'] );
		}

		if ( ! empty( $params['bfml_archive_page'] ) ) {
			array_walk( $params['bfml_archive_page'], function ( &$value, &$key ) {
				$value = sanitize_text_field( $value );
			} );

			update_option( BFConstants::BFML_ARCHIVE_PAGE_OPTION, $params['bfml_archive_page'] );
		}

		if ( ! empty( $params['bfml_disable_front_styles'] ) ) {
			update_option( BFConstants::BFML_DISABLE_FRONT_STYLES_OPTION, true );
		} else if ( ! empty( $params['submit'] ) ) {
			update_option( BFConstants::BFML_DISABLE_FRONT_STYLES_OPTION, false );
		}
	}

	public function get_admin_screen( string $tab ): void {
		switch ( $tab ) {
			case '':
				bfml_get_template( 'admin/settings-page/form' );
				break;
			case 'other-options':
				bfml_get_template( 'admin/settings-page/other-options-form' );
				break;
		}
	}
}
