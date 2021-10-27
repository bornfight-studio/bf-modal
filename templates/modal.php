<?php
/**
 * The Template for displaying modal wrapper
 *
 * This template can be overridden by copying it to your-theme/wp-modal-plugin/templates/modal.php.
 */

use wpModalPlugin\config\ModalConfig;
?>
<div class="c-wpbfml-modal <?= ModalConfig::get_modal_js_class(); ?>"></div>