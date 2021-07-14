<?php


namespace wpModalPlugin\helpers;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WPBFGlobalHelper {
	public static function bf_content( ?int $id = null ): string {
		global $post;

		if ( empty( $id ) ) {
			$id = $post->ID;
		}

		return apply_filters( 'the_content', get_post_field( 'post_content', $id ) );
	}
}
