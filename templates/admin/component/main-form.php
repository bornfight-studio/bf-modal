<?php
/**
 *
 * @var array $args (array|post_types, array|pages, array|selected_post_types)
 *
 */

use bfModalPlugin\core\BFConstants;
use bfModalPlugin\helpers\BFIsActiveHelper;

?>
<form action="" method="post">
    <div class="wrap">
        <h2>
			<?php echo esc_html( 'Convert to modal' ); ?>
        </h2>

        <table>
            <tbody>
			<?php if ( ! empty( $args['post_types'] ) ) {
				$i = 1;
				foreach ( $args['post_types'] as $key => $post_type ) { ?>
                    <tr>
                        <td><?php echo esc_html( $i ); ?></td>
                        <td>
                            <label for="<?php echo esc_attr( $key ); ?>">
                                <input type="checkbox"
                                       name="<?php echo esc_attr( BFConstants::BFML_MODAL_POST_TYPES_OPTION ); ?>[<?php echo esc_attr( $key ); ?>]"
                                       id="<?php echo esc_attr( $key ); ?>" <?php echo ! empty( $args['selected_post_types'][ esc_attr( $key ) ] ) ? esc_attr( 'checked' ) : ''; ?>>
								<?php echo esc_html( $post_type ); ?>
                            </label>
                        </td>

                        <td>
                            <select name="<?php echo esc_attr( BFConstants::BFML_ARCHIVE_PAGE_POST_TYPE_OPTION ); ?>[<?php echo esc_attr( $key ); ?>]"
                                    id="<?php echo esc_attr( BFConstants::BFML_ARCHIVE_PAGE_POST_TYPE_OPTION ); ?>">
                                <option value="none"><?php esc_html_e( 'Choose', BFConstants::BFML_ADMIN_DOMAIN_NAME ); ?></option>
								<?php if ( ! empty( $args['pages'] ) ) {
									foreach ( $args['pages'] as $page ) { ?>
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

        <input type="submit" value="Update" name="<?php echo esc_attr( BFConstants::BFML_SUBMIT_MAIN_OPTION ); ?>"
               class="button button-primary button-large">
    </div>
</form>
