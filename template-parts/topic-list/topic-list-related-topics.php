<?php
/**
 * Displays a list of related topics for a parent object.
 *
 * @param object $related_to The parent object.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0.
 */

$related_to = get_query_var( 'related-to' );

if ( empty( $related_to ) ) {
	return;
}

$list_query_vars = array(
	'klass' => 'topic-list topic-list--related-topics',
	'title' => log_lolla_pro_get_topic_label( 'Related topics' ),
	'items' => log_lolla_pro_get_topic_post_list_related_to_archive_as_html( $related_to ),
);
set_query_var( 'list-query-vars', $list_query_vars );
get_template_part( 'template-parts/framework/structure/list/list', '' );
