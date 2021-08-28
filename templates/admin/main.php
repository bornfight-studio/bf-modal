<?php
$tab = ! empty( $_GET['tab'] ) ? $_GET['tab'] : '';
?>
<div class="wrap">
    <h1>Modal Plugin</h1>

	<?php

	get_wpbfml_template( 'admin/layout/navigation', array(
		'tab' => $tab,
	) );

	// TODO: fix this
	if ( 'other-options' === $tab ) {
		get_wpbfml_template( 'admin/settings-page/other-options-form' );
	} else {
		get_wpbfml_template( 'admin/settings-page/form' );
	}
	?>
</div>
