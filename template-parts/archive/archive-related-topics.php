<?php
  /**
   * Displaying related topics of an archive
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */
?>


<?php
  $topic = get_query_var( 'topic' );

  if ( empty( $topic) ) {
    $topic = get_queried_object();
  }

  $related_topics  = log_lolla_display_related_topics_for_archive( $topic );
  if ( empty( $related_topics ) ) return;

  set_query_var( 'archive_list_topics_klass', 'topics' );
  set_query_var( 'archive_list_topics_title',  esc_html__( 'Related topics ', 'log-lolla') );
  set_query_var( 'archive_list_topics_topics', $related_topics );

  get_template_part( 'template-parts/archive/parts/archive-list', 'topics' );
?>
