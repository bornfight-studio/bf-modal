<?php


namespace wpModalPlugin\core;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPBFConstants {
	const WPBFML_DOMAIN_NAME       = 'wp-modal-plugin-domain';
	const WPBFML_ADMIN_DOMAIN_NAME = 'wp-modal-plugin-admin-domain';


	const WPBFML_POST_TYPE_OPTION               = 'wpbfml_post_type_option';
	const WPBFML_ARCHIVE_PAGE_OPTION            = 'wpbfml_archive_page_option';
	const WPBFML_POST_TYPE_REWRITE_SLUG_OPTION  = 'wpbfml_post_type_rewrite_slug_option';
	const WPBFML_PAGE_IS_MODAL_OPTION           = '_wpbfml_is_modal';
	const WPBFML_PAGE_MODAL_ARCHIVE_PAGE_OPTION = '_wpbfml_modal_archive_page';
}
