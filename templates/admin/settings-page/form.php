<?php

use wpModalPlugin\controller\WPBFModalFormController;
use wpModalPlugin\core\WPBFConstants;
use wpModalPlugin\helpers\WPBFModalFormHelper;
use wpModalPlugin\providers\WPBFPageDataProvider;
use wpModalPlugin\providers\WPBFPostDataProvider;

$wpbf_post_data_provider = new WPBFPostDataProvider();
$wpbf_page_data_provider = new WPBFPageDataProvider();

$post_types = $wpbf_post_data_provider->get_post_types();
$pages      = $wpbf_page_data_provider->get_all_option_pages();

$modal_form_controller = new WPBFModalFormController();
$modal_form_controller->save_modal_form_options( $_POST );

$chosen_post_type    = get_option( WPBFConstants::WPBFML_POST_TYPE_OPTION );
$chosen_archive_page = get_option( WPBFConstants::WPBFML_ARCHIVE_PAGE_OPTION );
?>
<form action="" method="post">
    <div class="wrap">
        <table class="form-class">
            <tbody>
            <tr>
                <th>
                    <h2><?= __( 'Convert to modal', WPBFConstants::WPBFML_ADMIN_DOMAIN_NAME ); ?></h2>
                </th>
            </tr>

            <tr>
                <th>
                    <label for="wpbfml_post_type">
						<?= __( 'Choose Post Type', WPBFConstants::WPBFML_ADMIN_DOMAIN_NAME ); ?>
                    </label>
                </th>
                <td>
                    <select name="wpbfml_post_type" id="wpbfml_post_type">
                        <option value="none"><?= __( 'Choose', WPBFConstants::WPBFML_ADMIN_DOMAIN_NAME ); ?></option>
						<?php if ( ! empty( $post_types ) ) {
							foreach ( $post_types as $post_type ) { ?>
                                <option value="<?= $post_type ?>" <?= WPBFModalFormHelper::get_selected( $chosen_post_type, $post_type ); ?>><?= $post_type; ?></option>
							<?php }
						} ?>
                    </select>
                </td>
            </tr>

            <tr>
                <th>
                    <label for="wpbfml_archive_page">
						<?= __( 'Choose Archive Page', WPBFConstants::WPBFML_ADMIN_DOMAIN_NAME ); ?>
                    </label>
                </th>
                <td>
                    <select name="wpbfml_archive_page" id="wpbfml_archive_page">
                        <option value="none"><?= __( 'Choose', WPBFConstants::WPBFML_ADMIN_DOMAIN_NAME ); ?></option>
						<?php if ( ! empty( $pages ) ) {
							foreach ( $pages as $page ) { ?>
                                <option value="<?= $page->ID; ?>" <?= WPBFModalFormHelper::get_selected( $chosen_archive_page, $page->ID ); ?>><?= $page->post_title; ?></option>
							<?php }
						} ?>
                    </select>
                </td>
            </tr>
            </tbody>
        </table>

        <input type="submit" value="Update" name="submit" class="button button-primary button-large">
    </div>
</form>
