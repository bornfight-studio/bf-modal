<?php
/**
 * The Template for displaying modal wrapper
 *
 * This template can be overridden by copying it to your-theme/bf-modal/templates/modal.php.
 */

use bfModalPlugin\config\BFModalConfig;

?>
<div class="c-bfml-modal <?php echo esc_attr( BFModalConfig::get_modal_js_class() ); ?>"></div>