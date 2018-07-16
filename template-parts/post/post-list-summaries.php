<?php
/**
 * Displays a list of Summary post type
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

$archive = get_query_var( 'archive' );

if ( empty( $archive ) ) {
	return;
}

$title = log_lolla_pro_get_archive_label( 'Summaries' );
$posts = log_lolla_pro_get_post_type_summary_post_list_for_archive( $archive );

set_query_var( 'post-list-klass', 'post-list--summaries' );
set_query_var( 'post-list-title', $title );
set_query_var( 'post-list-posts', $posts );
get_template_part( 'template-parts/post/post-list', 'outside-the-loop' );
