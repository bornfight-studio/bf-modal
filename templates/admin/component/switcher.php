<?php
/**
 *
 * @var array $args
 *
 */

use bfModalPlugin\core\BFConstants;

?>
<div class="c-bfml-switcher">
    <label for="<?php echo esc_attr( $args['checkbox_id'] ); ?>">
		<?php esc_html_e( 'Is Modal?', BFConstants::BFML_ADMIN_DOMAIN_NAME ) ?>

        <input type="checkbox" name="<?php echo esc_attr( $args['checkbox_id'] ); ?>"
               id="<?php echo esc_attr( $args['checkbox_id'] ); ?>" <?php echo esc_attr( $args['is_checked'] ); ?>>
        <span class="checkmark"></span>
    </label>
</div>
