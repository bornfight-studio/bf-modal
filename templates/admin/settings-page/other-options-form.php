<?php

use wpModalPlugin\core\WPBFConstants;
use wpModalPlugin\helpers\WPBFIsActiveHelper;
use wpModalPlugin\providers\WPBFAdminOptionsProvider;
use wpModalPlugin\providers\WPBFPageDataProvider;
use wpModalPlugin\providers\WPBFPostDataProvider;

$wpbf_admin_options_provider = new WPBFAdminOptionsProvider();
$wpbf_admin_options_provider->save_modal_admin_settings( $_POST );

$disable_front_styles = get_option( WPBFConstants::WPBFML_DISABLE_FRONT_STYLES_OPTION );
?>
<form action="" method="post">
    <div class="wrap">

        <h2><?= __( 'Other Modal Options', WPBFConstants::WPBFML_ADMIN_DOMAIN_NAME ); ?></h2>

        <table>
            <tbody>
            <tr>
                <td>
                    <label for="wpbfml_disable_front_styles">
                        <input type="checkbox" name="wpbfml_disable_front_styles"
                               id="wpbfml_disable_front_styles" <?= ! empty( $disable_front_styles ) ? 'checked' : ''; ?>>
						<?= __( 'Disable front styles', WPBFConstants::WPBFML_ADMIN_DOMAIN_NAME ); ?>
                    </label>
                </td>
            </tr>
            </tbody>
        </table>

        <input type="submit" value="Update" name="submit" class="button button-primary button-large">
    </div>
</form>
