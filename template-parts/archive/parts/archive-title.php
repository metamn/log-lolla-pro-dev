<?php
/**
 * Displays the archive title.
 *
 * The archive type added by WordPress by default is removed by a filter (`Category: News` => `News`).
 *
 * @param string $archive_title The title of the archive.
 *
 * @link https://morethemes.baby/log-lolla-pro-pro-demo/tag/indie-web/ Live example
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

$archive_title = get_query_var( 'archive_title' );

if ( ! empty( $archive_title ) ) {
	printf( '%s', esc_html( $archive_title ) );
} else {
	the_archive_title( '', '' );
}
