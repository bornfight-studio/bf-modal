<?php

use bfModalPlugin\core\BFConstants;
use bfModalPlugin\providers\BFAdminOptionsProvider;

$bf_admin_options_provider = new BFAdminOptionsProvider();
$bf_admin_options_provider->save_modal_admin_settings( $_POST );

$disable_front_styles = get_option( BFConstants::BFML_DISABLE_FRONT_STYLES_OPTION );
?>
<form action="" method="post">
    <div class="wrap">

        <h2>
			<?php esc_html_e( 'Other Modal Options', BFConstants::BFML_ADMIN_DOMAIN_NAME ); ?>
        </h2>

        <table>
            <tbody>
            <tr>
                <td>
                    <label for="bfml_disable_front_styles">
                        <input type="checkbox" name="bfml_disable_front_styles"
                               id="bfml_disable_front_styles" <?php echo ! empty( $disable_front_styles ) ? esc_attr( 'checked' ) : ''; ?>>
						<?php esc_html_e( 'Disable front styles', BFConstants::BFML_ADMIN_DOMAIN_NAME ); ?>
                    </label>
                </td>
            </tr>
            </tbody>
        </table>

        <input type="submit" value="Update" name="submit" class="button button-primary button-large">
    </div>
</form>
