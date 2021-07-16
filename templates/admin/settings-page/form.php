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

$selected_post_type       = get_option( WPBFConstants::WPBFML_POST_TYPE_OPTION );
$selected_archive_page    = get_option( WPBFConstants::WPBFML_ARCHIVE_PAGE_OPTION );
$selected_archive_page_id = ! empty( $selected_archive_page[0] ) ? $selected_archive_page[0] : '';

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
                                <input type="checkbox" name="wpbf_modal_post_types[<?= $key; ?>]" id="<?= $key; ?>">

								<?= $post_type; ?>
                            </label>
                        </td>

                        <td>
                            <select name="wpbfml_archive_page[<?= $key; ?>]" id="wpbfml_archive_page">
                                <option value="none"><?= __( 'Choose', WPBFConstants::WPBFML_ADMIN_DOMAIN_NAME ); ?></option>
								<?php if ( ! empty( $pages ) ) {
									foreach ( $pages as $page ) { ?>
                                        <option value="<?= $page->ID; ?>" <?= WPBFModalFormHelper::get_selected( (string) $selected_archive_page_id, (string) $page->ID ); ?>><?= $page->post_title; ?></option>
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

		<?php
		//		get_wpbf_template( 'admin/component/repeater', array(
		//			'select_options_1'          => $post_types,
		//			'select_options_1_title'    => __( 'Choose Post Type', WPBFConstants::WPBFML_ADMIN_DOMAIN_NAME ),
		//			'select_options_1_selected' => $selected_post_type,
		//			'select_options_2'          => $pages,
		//			'select_options_2_title'    => __( 'Choose Archive Page', WPBFConstants::WPBFML_ADMIN_DOMAIN_NAME ),
		//			'select_options_2_selected' => $selected_archive_page,
		//
		//		) );
		?>


        <input type="submit" value="Update" name="submit" class="button button-primary button-large">
    </div>
</form>
