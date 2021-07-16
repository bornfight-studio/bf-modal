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
                <th><h2>Convert to modal form</h2></th>
            </tr>

            <tr>
                <th>
                    <label for="post_type">
                        Choose Post Type
                    </label>
                </th>
                <td>
                    <select name="post_type" id="post_type">
                        <option value="none">Choose</option>
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
                    <label for="archive_page">
                        Choose Archive Page
                    </label>
                </th>
                <td>
                    <select name="archive_page" id="archive_page">
                        <option value="none">Choose</option>
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
