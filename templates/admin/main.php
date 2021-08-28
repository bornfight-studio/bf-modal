<div class="wrap">
    <h1>Modal Plugin</h1>

	<?php

	get_wpbfml_template( 'admin/layout/navigation', array(
		'tab' => ! empty( $_GET['tab'] ) ? $_GET['tab'] : '',
	) );

	get_wpbfml_template( 'admin/settings-page/form' );
	?>
</div>
