<?php

use wpModalPlugin\controller\ModalFormController;
use wpModalPlugin\providers\WPBFPostDataProvider;

$wpbf_post_data_provider = new WPBFPostDataProvider();
$post_types              = $wpbf_post_data_provider->get_post_types();
$pages                   = $wpbf_post_data_provider->get_all_option_pages();

$modal_form_controller = new ModalFormController();
$modal_form_controller->save_modal_form_options( $_POST );

$chosen_post_type    = get_option( 'wpbfml_post_type' );
$chosen_archive_page = get_option( 'wpbfml_archive_page' );

var_dump( $chosen_post_type );
var_dump( $chosen_archive_page );

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
                                <option value="<?= $post_type ?>"><?= $post_type; ?></option>
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
                                <option value="<?= $page->ID; ?>"><?= $page->post_title; ?></option>
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
