<?php
/**
 *
 * @var string $modifier
 * @var int $post_data_id
 *
 */

use wpModalPlugin\helpers\WPBFModalHelper;

$wpbf_modal_helper = new WPBFModalHelper();
$wpbf_modal_helper->trigger_popup();
echo $wpbf_modal_helper->get_open_popup();
?>
<div class="c-wpbfml-modal <?= ! empty( $modifier ) ? $modifier : ''; ?> js-wpbfml-modal"></div>