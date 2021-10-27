<?php
/**
 *
 * @var int $id
 *
 */

use bfModalPlugin\core\BFConstants;
use bfModalPlugin\helpers\BFModalFormHelper;
use bfModalPlugin\providers\BFModalTemplatesProvider;
use bfModalPlugin\providers\BFPageDataProvider;

$bf_page_data_provider = new BFPageDataProvider();
$pages                   = $bf_page_data_provider->get_all_pages( array(
	'post__not_in' => array( $id ),
) );

$is_modal_option           = get_post_meta( $id, BFConstants::BFML_PAGE_IS_MODAL_OPTION );
$archive_page_modal_option = get_post_meta( $id, BFConstants::BFML_PAGE_MODAL_ARCHIVE_PAGE_OPTION );
$modal_template_option     = get_post_meta( $id, BFConstants::BFML_MODAL_TEMPLATES_OPTION );

$is_modal              = ! empty( $is_modal_option[0] ) ? $is_modal_option[0] : '';
$archive_modal_option  = ! empty( $archive_page_modal_option[0] ) ? $archive_page_modal_option[0] : '';
$chosen_modal_template = ! empty( $modal_template_option[0] ) ? $modal_template_option[0] : '';

$modal_templates = BFModalTemplatesProvider::get_instance()->get_templates();
?>
<div class="c-meta-box">
	<?php
	bfml_get_template( 'admin/component/switcher', array(
		'label'       => __( 'Is modal?', BFConstants::BFML_ADMIN_DOMAIN_NAME ),
		'checkbox_id' => BFConstants::BFML_PAGE_IS_MODAL_OPTION,
		'is_checked'  => ! empty( $is_modal ) ? 'checked' : '',
		'text_on'     => __( 'Yes', BFConstants::BFML_ADMIN_DOMAIN_NAME ),
		'text_off'    => __( 'No', BFConstants::BFML_ADMIN_DOMAIN_NAME ),
	) );
	?>

    <div>
        <label for="bfml_modal_archive_page" class="c-bfml-switcher__select-label">
			<?= __( 'Choose Archive Page', BFConstants::BFML_ADMIN_DOMAIN_NAME ); ?>
        </label>
        <select name="<?= BFConstants::BFML_PAGE_MODAL_ARCHIVE_PAGE_OPTION; ?>"
                id="<?= BFConstants::BFML_PAGE_MODAL_ARCHIVE_PAGE_OPTION; ?>">
            <option value=""><?= __( 'Choose', BFConstants::BFML_ADMIN_DOMAIN_NAME ); ?></option>

			<?php if ( ! empty( $pages ) ) {
				foreach ( $pages as $page ) { ?>
                    <option value="<?= $page->ID; ?>" <?= BFModalFormHelper::get_selected( (string) $archive_modal_option, (string) $page->ID ); ?>><?= $page->post_title; ?></option>
				<?php }
			} ?>
        </select>
    </div>

	<?php if ( ! empty( $modal_templates ) ) { ?>
        <div>
            <label for="bfml_modal_template" class="c-bfml-switcher__select-label">
				<?= __( 'Choose Modal Template', BFConstants::BFML_ADMIN_DOMAIN_NAME ); ?>
            </label>

            <select name="<?= BFConstants::BFML_MODAL_TEMPLATES_OPTION; ?>"
                    id="<?= BFConstants::BFML_MODAL_TEMPLATES_OPTION; ?>">
                <option value=""><?= __( 'Choose', BFConstants::BFML_ADMIN_DOMAIN_NAME ); ?></option>

				<?php foreach ( $modal_templates as $key => $modal_template ) { ?>
                    <option value="<?= $key; ?>" <?= BFModalFormHelper::get_selected( (string) $chosen_modal_template, $key ); ?>><?= $modal_template; ?></option>
				<?php } ?>
            </select>
        </div>
	<?php } ?>
</div>
