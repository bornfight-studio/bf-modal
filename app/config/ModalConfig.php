<?php

namespace wpModalPlugin\config;

class ModalConfig {
	public static function get_modal_js_class(): string {
		return 'js-wpbfml-modal';
	}

	public static function get_modal_inner_js_class(): string {
		return 'js-wpbfml-modal-inner';
	}

	public static function get_modal_close_btn_js_class(): string {
		return 'js-wpbfml-modal-close';
	}

	public static function get_modal_trigger_js_class(): string {
		return 'js-wpbfml-modal-trigger';
	}
}