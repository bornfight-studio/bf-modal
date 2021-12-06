<?php

namespace bfModalPlugin\providers;

use bfModalPlugin\core\BFConstants;
use bfModalPlugin\interfaces\IBFAdminOptions;

class BFAdminOtherOptionsProvider implements IBFAdminOptions {
	public function save_modal_settings( array $post_data ): bool {
		if ( empty( $post_data[ BFConstants::BFML_SUBMIT_OTHER_OPTION ] ) ) {
			return false;
		}

		if ( empty( $post_data[ BFConstants::BFML_DISABLE_FRONT_STYLES_OPTION ] ) ) {
			update_option( BFConstants::BFML_DISABLE_FRONT_STYLES_OPTION, false );

			return true;
		}

		update_option( BFConstants::BFML_DISABLE_FRONT_STYLES_OPTION, true );

		return true;
	}
}