<?php

use wpModalPlugin\providers\WPBFModalTemplatesProvider;

function wpbfml_get_icon( string $name ): void {
	load_template( WPBFMP_LOCAL_PLUGIN_PATH . '/static/icons/icon-' . $name . '.php' );
}

function wpbfml_get_template( string $template_name, array $data = array(), bool $require_once = false ): void {
	load_template( WPBFMP_LOCAL_PLUGIN_PATH . '/templates/' . $template_name . '.php', $require_once, $data );
}

function wpbfml_register_modal_templates( array $templates ): void {
	WPBFModalTemplatesProvider::get_instance()->register_modal_templates( $templates );
}

function wpbfml_get_content( int $post_id = null ) {
	global $post;

	if ( empty( $post_id ) ) {
		$post_id = $post->ID;
	}

	return apply_filters( 'the_content', get_post_field( 'post_content', $post_id ) );
}