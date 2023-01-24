<?php

use bfModalPlugin\providers\BFModalTemplatesProvider;

function bfml_get_icon( string $name ): void {
	load_template( BFML_LOCAL_PLUGIN_PATH . '/static/icons/icon-' . $name . '.php' );
}

function bfml_get_template( string $template_name, array $data = array(), bool $require_once = false ): void {
	load_template( BFML_LOCAL_PLUGIN_PATH . '/templates/' . $template_name . '.php', $require_once, $data );
}

function bfml_register_modal_templates( array $templates ): void {
	BFModalTemplatesProvider::get_instance()->register_modal_templates( $templates );
}

function bfml_get_post_types(): array {
	$post_types = get_post_types( array(
		array(
			'public'   => true,
			'_builtin' => false,
		)
	) );

	return array_merge( $post_types, array(
		'post' => 'post',
	) );
}

function bfml_get_pages(): array {
	$pages = get_posts( array(
		'post_type'      => 'page',
		'posts_per_page' => - 1,
		'post_status'    => 'publish',
	) );

	return array_merge( $pages, array(
		(object) array(
			'ID'         => 'archive',
			'post_title' => 'Archive',
		),
	) );
}