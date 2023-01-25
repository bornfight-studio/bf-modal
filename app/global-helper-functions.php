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
	$post_types = get_post_types(array(
		'public'   => true,
		'_builtin' => false,
	));

	return array_merge( $post_types, array(
		'post' => 'post',
	) );
}

function bfml_get_pages( array $params = array() ): array {
	$args = array(
		'post_type'      => 'page',
		'posts_per_page' => - 1,
		'post_status'    => 'publish',
	);

	if ( ! empty( $params['post__not_in'] ) ) {
		$args = array_merge( $args, array(
			'post__not_in' => $params['post__not_in'],
		) );

		return get_posts( $args );
	}

	$pages = get_posts( $args );

	return array_merge( $pages, array(
		(object) array(
			'ID'         => 'archive',
			'post_title' => 'Archive',
		),
	) );
}