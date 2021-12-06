<?php
// If uninstall not called from WordPress, then exit.

if ( ! defined( 'ABSPATH' ) && ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

$options = array(
	'bfml_post_type_rewrite_slug_option',
	'bfml_post_type_option',
	'bfml_archive_page_option',
	'bfml_disable_front_styles_option',
	'bfml_archive_page',
	'bfml_modal_post_types'
);

foreach ( $options as $option ) {
	if ( ! empty( get_option( $option ) ) ) {
		delete_option( $option );
	}
}