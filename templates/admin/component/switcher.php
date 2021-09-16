<?php
/**
 *
 * @var array $args
 *
 */
?>
<div class="c-wpbfml-switcher">
    <label for="wpbfml_is_modal">
		<?= ! empty( $args['label'] ) ? $args['label'] : ''; ?>

        <div class="c-wpbfml-switcher-box js-wpbf-switcher">
            <input type="checkbox" name="<?= $args['checkbox_id']; ?>"
                   id="<?= $args['checkbox_id']; ?>" <?= $args['is_checked']; ?>>

            <div class="c-wpbfml-switcher__true-false">
                <span class="c-wpbfml-switcher__on">
                    <?= $args['text_on']; ?>
                </span>

                <span class="c-wpbfml-switcher__off">
                    <?= $args['text_off']; ?>
                </span>

                <div class="c-wpbfml-switcher__slider"></div>
            </div>
        </div>


    </label>
</div>
