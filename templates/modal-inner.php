<?php
/**
 * The Template for displaying modal content
 *
 * This template can be overridden by copying it to your-theme/wp-modal-plugin/templates/modal-inner.php.
 * Other template overrides your-theme/wp-moda-plugin/templates/modal-inner_{template-name}|{post_type}.php
 */

/**
 *
 * @var array $args
 *
 */

$post_data_id = ! empty( $args['post_data_id'] ) ? $args['post_data_id'] : null;

use wpModalPlugin\config\ModalConfig;
use wpModalPlugin\core\WPBFConstants;

if ( ! empty( $post_data_id ) ) { ?>
    <div class="c-wpbfml-modal__inner <?= ModalConfig::get_modal_inner_js_class(); ?>">
        <button class="c-wpbfml-modal__close u-b1 <?= ModalConfig::get_modal_close_btn_js_class(); ?>"
                data-return-url="<?= ! empty( $args['return_url'] ) ? $args['return_url'] : ''; ?>">
            <span><?= __( 'Close', WPBFConstants::WPBFML_DOMAIN_NAME ); ?></span>
			<?php wpbfml_get_icon( 'close' ); ?>
        </button>

        <div class="c-wpbfml-modal__content">
            <div class="c-wpbfml-modal__row">
                <div class="c-wpbfml-text-edit">
					<?= wpbfml_get_content( $post_data_id ); ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
