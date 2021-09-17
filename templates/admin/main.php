<?php

use wpModalPlugin\providers\WPBFAdminOptionsProvider;

$tab                         = ! empty( $_GET['tab'] ) ? $_GET['tab'] : '';
$wpbf_admin_options_provider = new WPBFAdminOptionsProvider();
?>
<div class="wrap">
    <h1>Modal Plugin</h1>

	<?php

	wpbfml_get_template( 'admin/layout/navigation', array(
		'tab' => $tab,
	) );

	$wpbf_admin_options_provider->get_admin_screen( $tab );
	?>
</div>
