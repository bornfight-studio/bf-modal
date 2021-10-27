<?php

namespace bfModalPlugin\config;

class BFModalConfig {
	public static function get_modal_js_class(): string {
		return 'js-bfml-modal';
	}

	public static function get_modal_inner_js_class(): string {
		return 'js-bfml-modal-inner';
	}

	public static function get_modal_close_btn_js_class(): string {
		return 'js-bfml-modal-close';
	}

	public static function get_modal_trigger_js_class(): string {
		return 'js-bfml-modal-trigger';
	}
}