<?php


namespace wpModalPlugin\providers;

use wpModalPlugin\core\WPBFConstants;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPBFAdminOptionsProvider {
	// TODO: this needs some adjustments
	public function save_modal_admin_settings( array $params ): void {
		if ( ! empty( $params['wpbfml_modal_post_types'] ) ) {

			$rewrite_slugs = array();
			foreach ( $params['wpbfml_modal_post_types'] as $post_type => $value ) {
				$post_object = get_post_type_object( $post_type );

				if ( ! empty( $post_object ) && ! empty( $post_object->rewrite['slug'] ) ) {
					$rewrite_slugs[ $post_type ] = $post_object->rewrite['slug'];
				}
			}
			update_option( WPBFConstants::WPBFML_POST_TYPE_REWRITE_SLUG_OPTION, $rewrite_slugs );
			update_option( WPBFConstants::WPBFML_POST_TYPE_OPTION, $params['wpbfml_modal_post_types'] );
		}

		if ( ! empty( $params['wpbfml_archive_page'] ) ) {
			update_option( WPBFConstants::WPBFML_ARCHIVE_PAGE_OPTION, $params['wpbfml_archive_page'] );
		}

		if ( ! empty( $params['wpbfml_disable_front_styles'] ) ) {
			update_option( WPBFConstants::WPBFML_DISABLE_FRONT_STYLES_OPTION, true );
		} else if ( ! empty( $params['submit'] ) ) {
			update_option( WPBFConstants::WPBFML_DISABLE_FRONT_STYLES_OPTION, false );
		}
	}

	public function get_admin_screen( string $tab ): void {
		switch ( $tab ) {
			case '':
				get_wpbfml_template( 'admin/settings-page/form' );
				break;
			case 'other-options':
				get_wpbfml_template( 'admin/settings-page/other-options-form' );
				break;
		}
	}
}
