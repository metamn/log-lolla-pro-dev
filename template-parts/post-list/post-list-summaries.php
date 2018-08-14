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

$post_list_query_vars = array(
	'title'       => log_lolla_pro_get_archive_label( 'Summaries' ),
	'klass'       => 'summaries',
	'posts'       => log_lolla_pro_get_post_type_summary_post_list_for_archive( $archive ),
	'post-format' => 'summary',
);
set_query_var( 'post-list-query-vars', $post_list_query_vars );
get_template_part( 'template-parts/post-list/post-list', 'outside-the-loop' );
