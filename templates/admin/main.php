<?php

use bfModalPlugin\core\BFConstants;
use bfModalPlugin\helpers\BFNavigationHelper;
use bfModalPlugin\providers\BFAdminOptionsProvider;
use bfModalPlugin\providers\BFAdminOtherOptionsProvider;

$tab = ! empty( $_GET['tab'] ) ? sanitize_text_field( $_GET['tab'] ) : '';

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
?>
<div class="wrap">
    <h1><?php echo esc_html( 'Modal Plugin' ); ?></h1>

	<?php
	bfml_get_template( 'admin/component/navigation', $links );

	if ( 'other-options' === $tab ) {
		$bf_admin_other_options_provider = new BFAdminOtherOptionsProvider();
		$bf_admin_other_options_provider->save_modal_settings( $_POST );
		bfml_get_template( 'admin/components/other-options-form', array(
			'disable_front_styles' => get_option( BFConstants::BFML_DISABLE_FRONT_STYLES_OPTION )
		) );
	} else {
		$post_types = get_post_types( array(
			array(
				'public'   => true,
				'_builtin' => false,
			)
		) );

		$post_types = array_merge( $post_types, array(
			'post' => 'post',
		) );

		$pages = get_posts( array(
			'post_type'      => 'page',
			'posts_per_page' => - 1,
			'post_status'    => 'publish',
		) );

		$pages = array_merge( $pages, array(
			(object) array(
				'ID'         => 'archive',
				'post_title' => 'Archive',
			),
		) );

		$bf_admin_options_provider = new BFAdminOptionsProvider();
		$bf_admin_options_provider->save_modal_settings( $_POST );

		bfml_get_template( 'admin/components/main-form', array(
			'post_types'          => $post_types,
			'pages'               => $pages,
			'selected_post_types' => get_option( BFConstants::BFML_POST_TYPE_OPTION )
		) );
	}
	?>
</div>
