<?php
/**
 * Displays the archive description.
 *
 * @param string $archive_description The archive description.
 *
 * @link https://morethemes.baby/log-lolla-pro-pro-demo/tag/indie-web/ Live example
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

$archive_description = get_query_var( 'archive_description' );

if ( ! empty( $archive_description ) ) {
	printf( '%1$s', esc_html( $archive_description ) );
} else {
	the_archive_description( '', '' );
}
