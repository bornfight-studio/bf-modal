<?php
/**
 *
 * @var array $args
 *
 */

use bfModalPlugin\core\BFConstants;
use bfModalPlugin\helpers\BFNavigationHelper;

$tab = ! empty( $args['tab'] ) ? $args['tab'] : '';
?>
<nav class="nav-tab-wrapper">
    <a href="<?php echo esc_url( BFNavigationHelper::get_main_url_params() ); ?>"
       class="nav-tab <?php echo empty( $tab ) ? esc_attr( 'nav-tab-active' ) : ''; ?>">
		<?php esc_html_e( 'BF Modal Settings', BFConstants::BFML_ADMIN_DOMAIN_NAME ); ?>
    </a>
    <a href="<?php echo esc_url( BFNavigationHelper::get_other_options_url_params() ); ?>"
       class="nav-tab <?php echo $tab === 'other-options' ? esc_attr( 'nav-tab-active' ) : ''; ?>">
		<?php esc_html_e( 'Other Options', BFConstants::BFML_ADMIN_DOMAIN_NAME ); ?>
    </a>
</nav>
