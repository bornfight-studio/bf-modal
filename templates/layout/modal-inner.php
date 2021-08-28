<?php
/**
 *
 * @var array $args
 *
 */

$post_data_id = ! empty( $args['post_data_id'] ) ? $args['post_data_id'] : null;

use wpModalPlugin\core\WPBFConstants;
use wpModalPlugin\helpers\WPBFGlobalHelper;

if ( ! empty( $post_data_id ) ) { ?>
    <div class="c-modal__inner js-modal-inner">
        <button class="c-modal__close u-b1 js-modal-close"
                data-return-url="<?= ! empty( $args['return_url'] ) ? $args['return_url'] : ''; ?>">
            <span><?= __( 'Close', WPBFConstants::WPBFML_DOMAIN_NAME ); ?></span>
			<?php get_wpbfml_icon( 'close' ); ?>
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
