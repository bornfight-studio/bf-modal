<?php

use bfModalPlugin\core\BFConstants;
use bfModalPlugin\helpers\BFNavigationHelper;
use bfModalPlugin\providers\BFAdminOptionsProvider;

$tab                       = ! empty( $_GET['tab'] ) ? sanitize_text_field( $_GET['tab'] ) : '';
$bf_admin_options_provider = new BFAdminOptionsProvider();
$links                     = array(
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
?>
<div class="wrap">
    <h1><?php echo esc_html( 'Modal Plugin' ); ?></h1>

	<?php
	bfml_get_template( 'admin/components/navigation', $links );

	if ( 'other-options' === $tab ) {
		$bf_admin_options_provider->save_other_form_modal_settings( $_POST );
		bfml_get_template( 'admin/components/other-options-form', array(
			'disable_front_styles' => get_option( BFConstants::BFML_DISABLE_FRONT_STYLES_OPTION )
		) );
	} else {
		$bf_admin_options_provider->save_main_modal_settings( $_POST );
		bfml_get_template( 'admin/components/main-form', array(
			'post_types'          => bfml_get_post_types(),
			'pages'               => bfml_get_pages(),
			'selected_post_types' => get_option( BFConstants::BFML_POST_TYPE_OPTION )
		) );
	}
	?>
</div>