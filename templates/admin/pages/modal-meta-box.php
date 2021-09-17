<?php
/**
 *
 * @var int $id
 *
 */

use wpModalPlugin\core\WPBFConstants;
use wpModalPlugin\helpers\WPBFModalFormHelper;
use wpModalPlugin\providers\WPBFModalTemplatesProvider;
use wpModalPlugin\providers\WPBFPageDataProvider;

$wpbf_page_data_provider = new WPBFPageDataProvider();
$pages                   = $wpbf_page_data_provider->get_all_pages( array(
	'post__not_in' => array( $id ),
) );

$is_modal_option           = get_post_meta( $id, WPBFConstants::WPBFML_PAGE_IS_MODAL_OPTION );
$archive_page_modal_option = get_post_meta( $id, WPBFConstants::WPBFML_PAGE_MODAL_ARCHIVE_PAGE_OPTION );
$modal_template_option     = get_post_meta( $id, WPBFConstants::WPBFML_MODAL_TEMPLATES_OPTION );

$is_modal              = ! empty( $is_modal_option[0] ) ? $is_modal_option[0] : '';
$archive_modal_option  = ! empty( $archive_page_modal_option[0] ) ? $archive_page_modal_option[0] : '';
$chosen_modal_template = ! empty( $modal_template_option[0] ) ? $modal_template_option[0] : '';

$modal_templates = WPBFModalTemplatesProvider::get_instance()->get_templates();
?>
<div class="c-meta-box">
	<?php
	wpbfml_get_template( 'admin/component/switcher', array(
		'label'       => __( 'Is modal?', WPBFConstants::WPBFML_ADMIN_DOMAIN_NAME ),
		'checkbox_id' => WPBFConstants::WPBFML_PAGE_IS_MODAL_OPTION,
		'is_checked'  => ! empty( $is_modal ) ? 'checked' : '',
		'text_on'     => __( 'Yes', WPBFConstants::WPBFML_ADMIN_DOMAIN_NAME ),
		'text_off'    => __( 'No', WPBFConstants::WPBFML_ADMIN_DOMAIN_NAME ),
	) );
	?>

    <div>
        <label for="wpbfml_modal_archive_page" class="c-wpbfml-switcher__select-label">
			<?= __( 'Choose Archive Page', WPBFConstants::WPBFML_ADMIN_DOMAIN_NAME ); ?>
        </label>
        <select name="<?= WPBFConstants::WPBFML_PAGE_MODAL_ARCHIVE_PAGE_OPTION; ?>"
                id="<?= WPBFConstants::WPBFML_PAGE_MODAL_ARCHIVE_PAGE_OPTION; ?>">
            <option value=""><?= __( 'Choose', WPBFConstants::WPBFML_ADMIN_DOMAIN_NAME ); ?></option>

			<?php if ( ! empty( $pages ) ) {
				foreach ( $pages as $page ) { ?>
                    <option value="<?= $page->ID; ?>" <?= WPBFModalFormHelper::get_selected( (string) $archive_modal_option, (string) $page->ID ); ?>><?= $page->post_title; ?></option>
				<?php }
			} ?>
        </select>
    </div>

	<?php if ( ! empty( $modal_templates ) ) { ?>
        <div>
            <label for="wpbfml_modal_template" class="c-wpbfml-switcher__select-label">
				<?= __( 'Choose Modal Template', WPBFConstants::WPBFML_ADMIN_DOMAIN_NAME ); ?>
            </label>

            <select name="<?= WPBFConstants::WPBFML_MODAL_TEMPLATES_OPTION; ?>"
                    id="<?= WPBFConstants::WPBFML_MODAL_TEMPLATES_OPTION; ?>">
                <option value=""><?= __( 'Choose', WPBFConstants::WPBFML_ADMIN_DOMAIN_NAME ); ?></option>

				<?php foreach ( $modal_templates as $key => $modal_template ) { ?>
                    <option value="<?= $key; ?>" <?= WPBFModalFormHelper::get_selected( (string) $chosen_modal_template, $key ); ?>><?= $modal_template; ?></option>
				<?php } ?>
            </select>
        </div>
	<?php } ?>
</div>
