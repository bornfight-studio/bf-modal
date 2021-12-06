<?php


namespace bfModalPlugin\providers;

use bfModalPlugin\core\BFConstants;
use bfModalPlugin\interfaces\IBFAdminOptions;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class BFAdminOptionsProvider implements IBFAdminOptions {
	public function save_modal_settings( array $post_data ): bool {
		if ( empty( $post_data[ BFConstants::BFML_SUBMIT_MAIN_OPTION ] ) ) {
			return false;
		}

		if ( empty( $post_data[ BFConstants::BFML_MODAL_POST_TYPES_OPTION ] ) ) {
			update_option( BFConstants::BFML_POST_TYPE_REWRITE_SLUG_OPTION, array() );
			update_option( BFConstants::BFML_POST_TYPE_OPTION, array() );
			update_option( BFConstants::BFML_ARCHIVE_PAGE_OPTION, array() );

			return true;
		}

		$rewrite_slugs = array();
		foreach ( $post_data[ BFConstants::BFML_MODAL_POST_TYPES_OPTION ] as $post_type => $value ) {
			$post_object = get_post_type_object( $post_type );

			if ( ! empty( $post_object ) && ! empty( $post_object->rewrite['slug'] ) ) {
				$rewrite_slugs[ $post_type ] = sanitize_text_field( $post_object->rewrite['slug'] );
			}
		}

		array_walk( $post_data[ BFConstants::BFML_MODAL_POST_TYPES_OPTION ], function ( &$value, &$key ) {
			$value = sanitize_text_field( $value );
		} );

		update_option( BFConstants::BFML_POST_TYPE_REWRITE_SLUG_OPTION, $rewrite_slugs );
		update_option( BFConstants::BFML_POST_TYPE_OPTION, $post_data[ BFConstants::BFML_MODAL_POST_TYPES_OPTION ] );


		// set archive pages
		array_walk( $post_data[ BFConstants::BFML_ARCHIVE_PAGE_POST_TYPE_OPTION ], function ( &$value, &$key ) {
			$value = sanitize_text_field( $value );
		} );

		update_option( BFConstants::BFML_ARCHIVE_PAGE_OPTION, $post_data[ BFConstants::BFML_ARCHIVE_PAGE_POST_TYPE_OPTION ] );

		return true;
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
