<?php
/**
 * Displays a list of posts for a Summary
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

$topic = log_lolla_pro_get_post_type_summary_topic( $post );
$posts = log_lolla_pro_get_post_type_summary_post_list_for_the_summary( $post, $topic );

if ( empty( $posts ) ) {
	return;
}

$posts_title = esc_html_x( 'Based on these posts:', 'post permalink', 'log-lolla-pro' );

set_query_var( 'post-list-klass', 'post' );
set_query_var( 'post-list-title', $posts_title );
set_query_var( 'post-list-posts', $posts );
get_template_part( 'template-parts/post/post', 'list' );
