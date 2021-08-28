<?php

use wpModalPlugin\core\WPBFConstants;
use wpModalPlugin\helpers\WPBFIsActiveHelper;
use wpModalPlugin\providers\WPBFAdminOptionsProvider;
use wpModalPlugin\providers\WPBFPageDataProvider;
use wpModalPlugin\providers\WPBFPostDataProvider;

$wpbf_post_data_provider = new WPBFPostDataProvider();
$wpbf_page_data_provider = new WPBFPageDataProvider();

$post_types = $wpbf_post_data_provider->get_post_types();
$pages      = $wpbf_page_data_provider->get_all_option_pages();

$wpbf_admin_options_provider = new WPBFAdminOptionsProvider();
$wpbf_admin_options_provider->save_modal_form_options( $_POST );

$selected_post_type    = get_option( WPBFConstants::WPBFML_POST_TYPE_OPTION );

?>
<form action="" method="post">
    <div class="wrap">

        <h2><?= __( 'Convert to modal', WPBFConstants::WPBFML_ADMIN_DOMAIN_NAME ); ?></h2>

        <table>
            <tbody>
			<?php if ( ! empty( $post_types ) ) {
				$i = 1;
				foreach ( $post_types as $key => $post_type ) { ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td>
                            <label for="<?= $key; ?>">
                                <input type="checkbox" name="wpbf_modal_post_types[<?= $key; ?>]"
                                       id="<?= $key; ?>" <?= ! empty( $selected_post_type[ $key ] ) ? 'checked' : ''; ?>>

								<?= $post_type; ?>
                            </label>
                        </td>

                        <td>
                            <select name="wpbfml_archive_page[<?= $key; ?>]" id="wpbfml_archive_page">
                                <option value="none"><?= __( 'Choose', WPBFConstants::WPBFML_ADMIN_DOMAIN_NAME ); ?></option>
								<?php if ( ! empty( $pages ) ) {
									foreach ( $pages as $page ) { ?>
                                        <option value="<?= $page->ID; ?>" <?= WPBFIsActiveHelper::is_archive_page_selected((string)$page->ID, $i); ?>><?= $page->post_title; ?></option>
									<?php }
								} ?>
                            </select>
                        </td>
                    </tr>
					<?php
					$i ++;
				}
			} ?>
            </tbody>
        </table>

        <input type="submit" value="Update" name="submit" class="button button-primary button-large">
    </div>
</form>
