<?php
/**
 *
 * @var string $modifier
 * @var int $page_id
 *
 */

use wpModalPlugin\helpers\WPBFModalHelper;

$wpbf_modal_helper = new WPBFModalHelper();
$wpbf_modal_helper->trigger_popup( get_option( 'wpbfml_post_type' ) );
echo $wpbf_modal_helper->get_open_popup();
?>
<section class="c-modal <?= ! empty( $modifier ) ? $modifier : ''; ?> js-modal">
	<?php

	get_wpbf_template( 'layout/modal-inner', array(
		'page_id' => $page_id,
	) );

	?>
</section>
