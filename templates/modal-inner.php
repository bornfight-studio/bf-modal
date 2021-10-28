<?php
/**
 * The Template for displaying modal content
 *
 * This template can be overridden by copying it to your-theme/bf-modal-plugin/templates/modal-inner.php.
 * Other template overrides your-theme/bf-modal-plugin/templates/modal-inner_{template-name}|{post_type}.php
 */

/**
 *
 * @var array $args
 *
 */

$post_data_id = ! empty( $args['post_data_id'] ) ? $args['post_data_id'] : null;

use bfModalPlugin\config\BFModalConfig;
use bfModalPlugin\core\BFConstants;

if ( ! empty( $post_data_id ) ) { ?>
    <div class="c-bfml-modal__inner <?php echo BFModalConfig::get_modal_inner_js_class(); ?>">
        <button class="c-bfml-modal__close u-b1 <?php echo BFModalConfig::get_modal_close_btn_js_class(); ?>"
                data-return-url="<?php echo ! empty( $args['return_url'] ) ? $args['return_url'] : ''; ?>">
            <span><?php echo __( 'Close', BFConstants::BFML_DOMAIN_NAME ); ?></span>
			<?php bfml_get_icon( 'close' ); ?>
        </button>

        <div class="c-bfml-modal__content">
            <div class="c-bfml-modal__row">
                <div class="c-bfml-text-edit">
                    <?php echo apply_filters( 'the_content', get_post_field( 'post_content', $post_data_id ) ) ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
