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