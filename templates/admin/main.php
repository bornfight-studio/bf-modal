<?php

use bfModalPlugin\core\BFConstants;
use bfModalPlugin\providers\BFAdminOptionsProvider;

$tab                       = ! empty( $_GET['tab'] ) ? sanitize_text_field( $_GET['tab'] ) : '';
$bf_admin_options_provider = new BFAdminOptionsProvider();
?>
<div class="wrap">
    <h1><?php esc_html_e( 'Modal Plugin', BFConstants::BFML_ADMIN_DOMAIN_NAME ); ?></h1>

	<?php
	bfml_get_template( 'admin/layout/navigation', array(
		'tab' => $tab,
	) );

	$bf_admin_options_provider->get_admin_screen( $tab );
	?>
</div>
