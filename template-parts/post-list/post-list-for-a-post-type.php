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

$title = log_lolla_pro_get_archive_label( 'Posts' );

set_query_var( 'post-list-klass', 'post-list-for-archive' );
set_query_var( 'post-list-title', $title );
set_query_var( 'post-list-posts', $posts );
get_template_part( 'template-parts/post-list/post-list', '' );
