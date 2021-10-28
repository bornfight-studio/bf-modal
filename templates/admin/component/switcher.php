<?php
/**
 *
 * @var array $args
 *
 */
?>
<div class="c-bfml-switcher">
    <label for="<?php echo $args['checkbox_id']; ?>">
		<?php echo ! empty( $args['label'] ) ? $args['label'] : ''; ?>

        <div class="c-bfml-switcher-box js-bf-switcher">
            <input type="checkbox" name="<?php echo $args['checkbox_id']; ?>"
                   id="<?php echo $args['checkbox_id']; ?>" <?php echo $args['is_checked']; ?>>

            <div class="c-bfml-switcher__true-false">
                <span class="c-bfml-switcher__on">
                    <?php echo $args['text_on']; ?>
                </span>

                <span class="c-bfml-switcher__off">
                    <?php echo $args['text_off']; ?>
                </span>

                <div class="c-bfml-switcher__slider"></div>
            </div>
        </div>
    </label>
</div>
