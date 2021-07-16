<?php
/**
 *
 * @var array $args
 *
 */

use wpModalPlugin\helpers\WPBFModalFormHelper;
?>
<div class="c-repeater">
    <table>
        <tbody class="js-wpbf-repeater-wrapper">
        <tr class="js-wpbf-repeater-tr">
            <td>
                1
            </td>

            <td>
                <select name="wpbfml_post_type" id="wpbfml_post_type">
                    <option value="none"><?= $args['select_options_1_title']; ?></option>
					<?php if ( ! empty( $args['select_options_1'] ) ) {
						foreach ( $args['select_options_1'] as $post_type ) { ?>
                            <option value="<?= $post_type ?>" <?= WPBFModalFormHelper::get_selected( $args['select_options_1_selected'], $post_type ); ?>><?= $post_type; ?></option>
						<?php }
					} ?>
                </select>
            </td>

            <td>
                <select name="wpbfml_archive_page" id="wpbfml_archive_page">
                    <option value="none"><?= $args['select_options_2_title']; ?></option>
					<?php if ( ! empty( $args['select_options_2'] ) ) {
						foreach ( $args['select_options_2'] as $page ) { ?>
                            <option value="<?= $page->ID; ?>" <?= WPBFModalFormHelper::get_selected( $args['select_options_2_selected'], $page->ID ); ?>><?= $page->post_title; ?></option>
						<?php }
					} ?>
                </select>
            </td>
        </tr>
        </tbody>
    </table>

    <div class="c-repeater__add">
        <a href="#" class="button button-primary c-repeater__add-item js-wpbf-add-item">Add Item</a>
    </div>
</div>
