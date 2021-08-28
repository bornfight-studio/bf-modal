<?php

function get_wpbfml_icon( $name ) {
	load_template( WPBFMP_LOCAL_PLUGIN_PATH . '/static/icons/icon-' . $name . '.php' );
}

function get_wpbfml_template( string $template_name, array $data = array(), bool $require_once = false ) {
	load_template( WPBFMP_LOCAL_PLUGIN_PATH . '/templates/' . $template_name . '.php', $require_once, $data );
}
