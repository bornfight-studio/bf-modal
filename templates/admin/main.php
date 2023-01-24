<?php

use bfModalPlugin\core\BFConstants;
use bfModalPlugin\helpers\BFNavigationHelper;
use bfModalPlugin\providers\BFAdminOptionsProvider;

$tab                       = ! empty( $_GET['tab'] ) ? sanitize_text_field( $_GET['tab'] ) : '';
$bf_admin_options_provider = new BFAdminOptionsProvider();
?>
<div class="wrap">
    <h1><?php esc_html_e( 'Modal Plugin', BFConstants::BFML_ADMIN_DOMAIN_NAME ); ?></h1>

	<?php
	$links = array(
		array(
			'url'             => BFNavigationHelper::get_main_url_params(),
			'title'           => 'BF Modal Settings',
			'is_active_class' => empty( $tab ) ? 'nav-tab-active' : '',
		),
		array(
			'url'             => BFNavigationHelper::get_other_options_url_params(),
			'title'           => 'Other Options',
			'is_active_class' => 'other-options' === $tab ? 'nav-tab-active' : ''
		)
	);
	bfml_get_template( 'admin/component/navigation', $links );

	$bf_admin_options_provider->get_admin_screen( $tab );
	?>
</div>
