<?php

use bfModalPlugin\core\BFConstants;
use bfModalPlugin\helpers\BFIsActiveHelper;
use bfModalPlugin\providers\BFAdminOptionsProvider;
use bfModalPlugin\providers\BFPageDataProvider;
use bfModalPlugin\providers\BFPostDataProvider;

$bf_post_data_provider = new BFPostDataProvider();
$bf_page_data_provider = new BFPageDataProvider();

$post_types = $bf_post_data_provider->get_post_types();
$pages      = $bf_page_data_provider->get_all_option_pages();

$bf_admin_options_provider = new BFAdminOptionsProvider();
$bf_admin_options_provider->save_modal_admin_settings( $_POST );

$selected_post_type = get_option( BFConstants::BFML_POST_TYPE_OPTION );

?>
<form action="" method="post">
    <div class="wrap">
        <h2>
			<?php esc_html_e( 'Convert to modal', BFConstants::BFML_ADMIN_DOMAIN_NAME ); ?>
        </h2>

        <table>
            <tbody>
			<?php if ( ! empty( $post_types ) ) {
				$i = 1;
				foreach ( $post_types as $key => $post_type ) { ?>
                    <tr>
                        <td><?php echo esc_html( $i ); ?></td>
                        <td>
                            <label for="<?php echo esc_attr( $key ); ?>">
                                <input type="checkbox" name="bfml_modal_post_types[<?php echo esc_attr( $key ); ?>]"
                                       id="<?php echo esc_attr( $key ); ?>" <?php echo ! empty( $selected_post_type[ esc_attr( $key ) ] ) ? esc_attr( 'checked' ) : ''; ?>>
								<?php echo esc_html( $post_type ); ?>
                            </label>
                        </td>

                        <td>
                            <select name="bfml_archive_page[<?php echo esc_attr( $key ); ?>]" id="bfml_archive_page">
                                <option value="none"><?php esc_html_e( 'Choose', BFConstants::BFML_ADMIN_DOMAIN_NAME ); ?></option>
								<?php if ( ! empty( $pages ) ) {
									foreach ( $pages as $page ) { ?>
                                        <option value="<?php echo esc_attr( $page->ID ); ?>" <?php echo esc_attr( BFIsActiveHelper::is_archive_page_selected( (string) $page->ID, $i ) ); ?>>
											<?php echo esc_html( $page->post_title ); ?>
                                        </option>
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
