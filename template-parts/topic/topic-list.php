<?php
  /**
   * Template part for displaying a list of topics
   *
   * @package Log_Lolla_Pro
   */
?>

<?php

  $term = get_query_var( 'term' );
  $topics = log_lolla_topic_archive( $term );

  set_query_var( 'archive_list_topics_klass', 'tags' );
  set_query_var( 'archive_list_topics_title',  esc_html__( 'All tags ', 'log-lolla') );
  set_query_var( 'archive_list_topics_topics', $topics );

  get_template_part( 'template-parts/archive/parts/archive-list', 'topics' );

?>
