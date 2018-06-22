<?php
/**
 * Template part to display posts of a post type (like source, people)
 *
 * @package Log_Lolla_Pro
 */

$posts = log_lolla_pro_get_posts_of_a_post_type( $post );
if ( empty( $posts ) ) {
	return;
}

$archive_posts_title = sprintf(
	'%1$s%2$s',
	esc_html_x( 'Posts from ', 'post permalink', 'log-lolla-pro' ),
	get_the_title()
);

set_query_var( 'post-list-klass', 'post-type' );
set_query_var( 'post-list-title', $archive_posts_title );
set_query_var( 'post-list-posts', $posts );
get_template_part( 'template-parts/post/post', 'list' );
