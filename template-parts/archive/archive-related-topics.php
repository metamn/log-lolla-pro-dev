<?php
  /**
   * Displaying related topics of an archive
   *
   *
   * @package Log_Lolla_Pro
   */

  $topic = get_query_var( 'topic' );

  if ( empty( $topic) ) {
    $topic = get_queried_object();
  }

  $related_topics  = log_lolla_get_related_topics_for_archive( $topic );
  if ( empty( $related_topics ) ) return;

  set_query_var( 'topic_list_klass', 'topics' );
  set_query_var( 'topic_list_title',  esc_html__( 'Related topics ', 'log-lolla') );
  set_query_var( 'topic_list_items', $related_topics );

  get_template_part( 'template-parts/topic/topic', 'list' );
?>
