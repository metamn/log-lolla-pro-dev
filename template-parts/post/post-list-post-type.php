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

$archive_posts_title = sprintf(
	'%1$s%2$s',
	/* translators: The title of the Source, People (post type) posts lists. */
	esc_html_x( 'Posts from ', 'The title of the Source, People (post type) posts lists', 'log-lolla-pro' ),
	get_the_title()
);

set_query_var( 'post-list-klass', 'post-list--posts' );
set_query_var( 'post-list-title', $archive_posts_title );
set_query_var( 'post-list-posts', $posts );
get_template_part( 'template-parts/post/post', 'list' );
