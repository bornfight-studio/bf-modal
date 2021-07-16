<?php
/**
 *
 * @var array $args
 *
 */
?>
<div class="c-switcher">
    <label for="wpbfml_is_modal">
		<?= ! empty( $args['label'] ) ? $args['label'] : ''; ?>

        <div class="c-switcher-box js-wpbf-switcher">
            <input type="checkbox" name="<?= $args['checkbox_id']; ?>"
                   id="<?= $args['checkbox_id']; ?>" <?= $args['is_checked']; ?>>

            <div class="c-switcher__true-false">
                <span class="c-switcher__on">
                    <?= $args['text_on']; ?>
                </span>

                <span class="c-switcher__off">
                    <?= $args['text_off']; ?>
                </span>

                <div class="c-switcher__slider"></div>
            </div>
        </div>


    </label>
</div>
