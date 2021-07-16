<?php
/**
 *
 * @var int $id
 *
 */

use wpModalPlugin\core\WPBFConstants;
use wpModalPlugin\helpers\WPBFModalFormHelper;
use wpModalPlugin\providers\WPBFPageDataProvider;

$wpbf_page_data_provider = new WPBFPageDataProvider();
$pages                   = $wpbf_page_data_provider->get_all_pages( array(
	'post__not_in' => array( $id ),
) );

$is_modal_option           = get_post_meta( $id, WPBFConstants::WPBFML_PAGE_IS_MODAL_OPTION );
$archive_page_modal_option = get_post_meta( $id, WPBFConstants::WPBFML_PAGE_MODAL_ARCHIVE_PAGE_OPTION );

$is_modal             = ! empty( $is_modal_option[0] ) ? $is_modal_option[0] : '';
$archive_modal_option = ! empty( $archive_page_modal_option[0] ) ? $archive_page_modal_option[0] : '';
?>
<div class="c-meta-box">
	<?php
	get_wpbf_template( 'admin/component/switcher', array(
		'label'       => __( 'Is modal?', WPBFConstants::WPBFML_ADMIN_DOMAIN_NAME ),
		'checkbox_id' => 'wpbfml_is_modal',
		'is_checked'  => ! empty( $is_modal ) ? 'checked' : '',
		'text_on'     => __( 'Yes', WPBFConstants::WPBFML_ADMIN_DOMAIN_NAME ),
		'text_off'    => __( 'No', WPBFConstants::WPBFML_ADMIN_DOMAIN_NAME ),
	) );
	?>

    <div>
        <label for="wpbf_modal_archive_page" class="c-switcher__select-label">
			<?= __( 'Choose Archive Page', WPBFConstants::WPBFML_ADMIN_DOMAIN_NAME ); ?>
        </label>
        <select name="wpbfml_modal_archive_page" id="wpbfml_modal_archive_page">
            <option value=""><?= __( 'Choose', WPBFConstants::WPBFML_ADMIN_DOMAIN_NAME ); ?></option>

			<?php if ( ! empty( $pages ) ) {
				foreach ( $pages as $page ) { ?>
                    <option value="<?= $page->ID; ?>" <?= WPBFModalFormHelper::get_selected( (string) $archive_modal_option, (string) $page->ID ); ?>><?= $page->post_title; ?></option>
				<?php }
			} ?>
        </select>
    </div>
</div>
