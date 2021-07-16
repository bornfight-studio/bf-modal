<?php
/**
 *
 * @var string $modifier
 * @var int $post_data_id
 *
 */

use wpModalPlugin\core\WPBFConstants;
use wpModalPlugin\helpers\WPBFModalHelper;

$trigger_popup = get_option( WPBFConstants::WPBFML_POST_TYPE_OPTION );
if ( is_page() ) {
	$trigger_popup = 'page';
}


$wpbf_modal_helper = new WPBFModalHelper();
$wpbf_modal_helper->trigger_popup( $trigger_popup );
echo $wpbf_modal_helper->get_open_popup();
?>
<section class="c-modal <?= ! empty( $modifier ) ? $modifier : ''; ?> js-modal">
	<?php

	get_wpbf_template( 'layout/modal-inner', array(
		'post_data_id' => ! empty( $post_data_id ) ? $post_data_id : null,
	) );

	?>
</section>
