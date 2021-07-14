<?php

use wpModalPlugin\helpers\WPBFPluginPartialHelperBase;

function get_wpbf_partial( $partial, $data = null, $return = false, $folder = WPBFPluginPartialHelperBase::PARTIAL_FOLDER ) {
	return WPBFPluginPartialHelperBase::get_instance()->get_partial( $partial, $data, $return, $folder );
}

function get_wpbf_icon( $name ) {
	return get_wpbf_partial( 'icons/icon-' . $name, [], true, 'static' );
}
