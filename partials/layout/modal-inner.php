<?php
/**
 *
 * @var int $page_id
 *
 */

use wpModalPlugin\helpers\WPBFGlobalHelper;

?>

<div class="c-modal__inner js-modal-inner">
    <button class="c-modal__close u-b1 js-modal-close u-uppercase">
        <span>Zatvori</span>
		<?= get_wpbf_icon( 'close' ); ?>
    </button>

    <div class="c-modal__content">
        <div class="c-modal__row">
            <div class="c-modal__col">
                Eyebrow <?= $page_id; ?>
            </div>
            <div class="c-modal__col">
                <div class="c-text-edit">
					<?= WPBFGlobalHelper::bf_content( $page_id ); ?>
                </div>
            </div>
        </div>
    </div>
</div>
