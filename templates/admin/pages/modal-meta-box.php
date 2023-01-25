<?php

use bfModalPlugin\core\BFConstants;
use bfModalPlugin\helpers\BFModalFormHelper;
use bfModalPlugin\providers\BFModalTemplatesProvider;

$id    = get_the_ID();
$pages = bfml_get_pages( array(
	'post__not_in' => array( $id ),
) );

$is_modal_option           = get_post_meta( $id, BFConstants::BFML_PAGE_IS_MODAL_OPTION, true );
$archive_page_modal_option = get_post_meta( $id, BFConstants::BFML_PAGE_MODAL_ARCHIVE_PAGE_OPTION );
$modal_template_option     = get_post_meta( $id, BFConstants::BFML_MODAL_TEMPLATES_OPTION );

$archive_modal_option  = ! empty( $archive_page_modal_option[0] ) ? $archive_page_modal_option[0] : '';
$chosen_modal_template = ! empty( $modal_template_option[0] ) ? $modal_template_option[0] : '';

$modal_templates = BFModalTemplatesProvider::get_instance()->get_templates();
?>
<div>
	<?php
	bfml_get_template( 'admin/components/switcher', array(
		'checkbox_id' => BFConstants::BFML_PAGE_IS_MODAL_OPTION,
		'is_checked'  => ! empty( $is_modal_option ) && '1' === $is_modal_option ? 'checked' : '',
	) );
	?>

    <div>
        <label for="bfml_modal_archive_page">
			<?php echo esc_html( 'Choose Archive Page' ); ?>
        </label>
        <select name="<?php echo esc_attr( BFConstants::BFML_PAGE_MODAL_ARCHIVE_PAGE_OPTION ); ?>"
                id="<?php echo esc_attr( BFConstants::BFML_PAGE_MODAL_ARCHIVE_PAGE_OPTION ); ?>">
            <option value="">
				<?php echo esc_html( 'Choose' ); ?>
            </option>

			<?php if ( ! empty( $pages ) ) {
				foreach ( $pages as $page ) { ?>
                    <option value="<?php echo esc_attr( $page->ID ); ?>" <?php echo esc_attr( BFModalFormHelper::get_selected( (string) $archive_modal_option, (string) $page->ID ) ); ?>>
						<?php echo esc_html( $page->post_title ); ?>
                    </option>
				<?php }
			} ?>
        </select>
    </div>

	<?php if ( ! empty( $modal_templates ) ) { ?>
        <div>
            <label for="bfml_modal_template">
				<?php echo esc_html( 'Choose Modal Template' ); ?>
            </label>

            <select name="<?php echo esc_attr( BFConstants::BFML_MODAL_TEMPLATES_OPTION ); ?>"
                    id="<?php echo esc_attr( BFConstants::BFML_MODAL_TEMPLATES_OPTION ); ?>">
                <option value="">
					<?php echo esc_html( 'Choose' ); ?>
                </option>

				<?php foreach ( $modal_templates as $key => $modal_template ) { ?>
                    <option value="<?php echo esc_attr( $key ); ?>" <?php echo esc_attr( BFModalFormHelper::get_selected( (string) $chosen_modal_template, $key ) ); ?>>
						<?php echo esc_html( $modal_template ); ?>
                    </option>
				<?php } ?>
            </select>
        </div>
	<?php } ?>
</div>
