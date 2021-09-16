<?php

namespace wpModalPlugin\providers;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPBFModalTemplatesProvider {
	private static ?WPBFModalTemplatesProvider $instance = null;
	private array $templates = array();

	private function __construct() {
	}

	public static function get_instance(): WPBFModalTemplatesProvider {
		if ( null === self::$instance ) {
			self::$instance = new WPBFModalTemplatesProvider();
		}

		return self::$instance;
	}

	public function register_modal_templates( array $templates ): void {
		if ( ! empty( $templates ) ) {
			foreach ( $templates as $template ) {
				if ( is_string( $template ) ) {
					$this->register_modal_template( $template );
				}
			}
		}
	}

	public function register_modal_template( string $template_name ): bool {
		if ( empty( $template_name ) ) {
			return false;
		}


		$this->templates[ sanitize_title_with_dashes( $template_name ) ] = $template_name;

		return true;
	}

	public function get_templates(): array {
		return $this->templates;
	}
}