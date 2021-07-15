<div class="wrap">
    <h1>Modal Plugin</h1>

	<?php

	get_wpbf_template( 'admin/layout/navigation', array(
		'tab' => ! empty( $_GET['tab'] ) ? $_GET['tab'] : '',
	) );

	get_wpbf_template( 'admin/settings-page/form' );
	?>
</div>
