<?php
/**
 *
 * @var array $args
 *
 */
?>
<div class="c-bfml-switcher">
    <label for="<?= $args['checkbox_id']; ?>">
		<?= ! empty( $args['label'] ) ? $args['label'] : ''; ?>

        <div class="c-bfml-switcher-box js-bf-switcher">
            <input type="checkbox" name="<?= $args['checkbox_id']; ?>"
                   id="<?= $args['checkbox_id']; ?>" <?= $args['is_checked']; ?>>

            <div class="c-bfml-switcher__true-false">
                <span class="c-bfml-switcher__on">
                    <?= $args['text_on']; ?>
                </span>

                <span class="c-bfml-switcher__off">
                    <?= $args['text_off']; ?>
                </span>

                <div class="c-bfml-switcher__slider"></div>
            </div>
        </div>
    </label>
</div>
