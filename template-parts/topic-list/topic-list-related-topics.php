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

$title = log_lolla_pro_get_topic_label( 'Related topics' );
$items = log_lolla_pro_get_topic_post_list_related_to_archive_as_html( $related_to );

set_query_var( 'list-klass', 'list--related-topics' );
set_query_var( 'list-title', $title );
set_query_var( 'list-items', $items );
get_template_part( 'template-parts/framework/structure/list/list', '' );
