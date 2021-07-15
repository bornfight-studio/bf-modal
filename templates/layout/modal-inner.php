<?php
/**
 *
 * @var array $args
 *
 */

$post_data_id = ! empty( $args['post_data_id'] ) ? $args['post_data_id'] : null;

use wpModalPlugin\core\WPBFConstants;
use wpModalPlugin\helpers\WPBFGlobalHelper;
use wpModalPlugin\helpers\WPBFModalReturnUrlHelper;

if ( ! empty( $post_data_id ) ) {
	$wpbf_modal_return_url_helper = new WPBFModalReturnUrlHelper();
	?>
    <div class="c-modal__inner js-modal-inner">
        <button class="c-modal__close u-b1 js-modal-close"
                data-return-url="<?= $wpbf_modal_return_url_helper->get_post_type_return_url( $post_data_id ); ?>">
            <span><?= __( 'Close', WPBFConstants::WPBFML_DOMAIN_NAME ); ?></span>
			<?php get_wpbf_icon( 'close' ); ?>
        </button>

        <div class="c-modal__content">
            <div class="c-modal__row">
                <div class="c-text-edit">
					<?= WPBFGlobalHelper::bf_content( $post_data_id ); ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
