<?php
/**
 * Displays a list of related topics for a parent object.
 *
 * @package Log_Lolla_Pro
 */

$related_to = get_query_var( 'related-to' );

if ( empty( $related_to ) ) {
	return;
}

$title = esc_html__( 'Related topics ', 'log-lolla-pro' );
$items = log_lolla_pro_get_topic_post_list_related_to_archive_as_html( $related_to );

set_query_var( 'topic_list_klass', 'topic-list--related-topics' );
set_query_var( 'topic_list_title', $title );
set_query_var( 'topic_list_items', $items );
get_template_part( 'template-parts/topic/topic', 'list' );
