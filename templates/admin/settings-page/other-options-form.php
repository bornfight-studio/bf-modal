<?php

use bfModalPlugin\core\BFConstants;
use bfModalPlugin\providers\BFAdminOtherOptionsProvider;

$bf_admin_other_options_provider = new BFAdminOtherOptionsProvider();
$bf_admin_other_options_provider->save_modal_settings( $_POST );

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
                    <label for="<?php echo esc_attr( BFConstants::BFML_DISABLE_FRONT_STYLES_OPTION ); ?>">
                        <input type="checkbox"
                               name="<?php echo esc_attr( BFConstants::BFML_DISABLE_FRONT_STYLES_OPTION ); ?>"
                               id="<?php echo esc_attr( BFConstants::BFML_DISABLE_FRONT_STYLES_OPTION ); ?>" <?php echo ! empty( $disable_front_styles ) ? esc_attr( 'checked' ) : ''; ?>>
						<?php esc_html_e( 'Disable front styles', BFConstants::BFML_ADMIN_DOMAIN_NAME ); ?>
                    </label>
                </td>
            </tr>
            </tbody>
        </table>

        <input type="submit" value="Update" name="<?php echo esc_attr( BFConstants::BFML_SUBMIT_OTHER_OPTION ); ?>"
               class="button button-primary button-large">
    </div>
</form>
