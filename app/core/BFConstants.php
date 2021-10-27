<?php


namespace bfModalPlugin\core;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class BFConstants {
	const BFML_DOMAIN_NAME = 'bf-modal-plugin-domain';
	const BFML_ADMIN_DOMAIN_NAME = 'bf-modal-plugin-admin-domain';

	const BFML_POST_TYPE_OPTION = 'bfml_post_type_option';
	const BFML_ARCHIVE_PAGE_OPTION = 'bfml_archive_page_option';
	const BFML_POST_TYPE_REWRITE_SLUG_OPTION = 'bfml_post_type_rewrite_slug_option';
	const BFML_PAGE_IS_MODAL_OPTION = '_bfml_is_modal';
	const BFML_PAGE_MODAL_ARCHIVE_PAGE_OPTION = '_bfml_modal_archive_page';
	const BFML_MODAL_TEMPLATES_OPTION = '_bfml_modal_templates_option';
	const BFML_DISABLE_FRONT_STYLES_OPTION = 'bfml_disable_front_styles_option';
}
