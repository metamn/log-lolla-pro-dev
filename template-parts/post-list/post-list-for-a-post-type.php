<?php
/**
 * Displays a list of posts of a certain post type (like source, people)
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

$posts = log_lolla_pro_get_post_type_post_list( $post );
if ( empty( $posts ) ) {
	return;
}

$post_list_query_vars = array(
	'title' => llog_lolla_pro_get_archive_label( 'Posts' ),
	'klass' => 'for-a-post-type',
	'posts' => $posts,
);
set_query_var( 'post-list-query-vars', $post_list_query_vars );
get_template_part( 'template-parts/post-list/post-list', '' );
