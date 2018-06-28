<?php
/**
 * Displays a list of related topics for a post type (like source, people)
 *
 * @package Log_Lolla_Pro
 */

$topic = get_term_by( 'slug', $post->post_name, 'post_tag' );

set_query_var( 'topic_list_klass', 'topics' );
set_query_var( 'topic_list_title', esc_html__( 'Related topics ', 'log-lolla-pro' ) );
set_query_var( 'topic_list_items', log_lolla_pro_get_topic_post_list_related_to_archive_as_html( $topic ) );
get_template_part( 'template-parts/topic/topic', 'list' );
