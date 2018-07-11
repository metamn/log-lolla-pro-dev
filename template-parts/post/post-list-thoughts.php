<?php
/**
 * Displays a list of posts of Standard post format
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

$posts = get_query_var( 'posts' );

if ( empty( $posts ) ) {
	return;
}

$title = esc_html( 'Thoughts', 'log-lolla-pro' );

set_query_var( 'post-list-klass', 'post-list--thoughts' );
set_query_var( 'post-list-title', $title );
set_query_var( 'post-list-posts', $posts );
get_template_part( 'template-parts/post/post-list', 'outside-the-loop' );
