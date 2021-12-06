<?php

namespace bfModalPlugin\interfaces;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

interface IBFAdminOptions {
	public function save_modal_settings( array $post_data ): bool;
}