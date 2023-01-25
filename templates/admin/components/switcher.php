<?php
/**
 *
 * @var array $args
 *
 */
?>
<div>
    <label for="<?php echo esc_attr( $args['checkbox_id'] ); ?>">
		<?php echo esc_html( 'Is Modal?' ); ?>

        <input type="checkbox"
               name="<?php echo esc_attr( $args['checkbox_id'] ); ?>"
               id="<?php echo esc_attr( $args['checkbox_id'] ); ?>"
			<?php echo esc_attr( $args['is_checked'] ); ?>
        >
    </label>
</div>
