<?php
/**
 * Displays a list of posts of Standard post format
 *
 * @param array $posts An array of posts.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

$posts = get_query_var( 'posts' );

if ( empty( $posts ) ) {
	return;
}

$post_list_query_vars = array(
	'title' => log_lolla_pro_get_archive_label( 'Thoughts' ),
	'klass' => 'thoughts',
	'posts' => $posts,
);
set_query_var( 'post-list-query-vars', $post_list_query_vars );
get_template_part( 'template-parts/post-list/post-list', 'outside-the-loop' );
