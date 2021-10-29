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

        <div class="c-bfml-switcher-box js-bf-switcher">
            <input type="checkbox" name="<?php echo esc_attr( $args['checkbox_id'] ); ?>"
                   id="<?php echo esc_attr( $args['checkbox_id'] ); ?>" <?php echo esc_attr( $args['is_checked'] ); ?>>

            <div class="c-bfml-switcher__true-false">
                <span class="c-bfml-switcher__on">
                    <?php esc_html_e( 'Yes', BFConstants::BFML_ADMIN_DOMAIN_NAME ) ?>
                </span>

                <span class="c-bfml-switcher__off">
                    <?php esc_html_e( 'No', BFConstants::BFML_ADMIN_DOMAIN_NAME ) ?>
                </span>

                <div class="c-bfml-switcher__slider"></div>
            </div>
        </div>
    </label>
</div>
