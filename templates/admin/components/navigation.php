<?php
/**
 *
 * @var array $args (string|url, string|title, string|is_active_class)
 *
 *
 */

if ( ! empty( $args ) ) { ?>
    <nav class="nav-tab-wrapper">
		<?php foreach ( $args as $item ) { ?>
            <a href="<?php echo esc_url( $item['url'] ); ?>"
               class="nav-tab <?php echo esc_attr( $item['is_active_class'] ); ?>">
				<?php echo esc_html( $item['title'] ); ?>
            </a>
		<?php } ?>
    </nav>
<?php }

