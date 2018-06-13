<?php
  /**
   * Template part to display related topics for a post type (like source, people)
   *
   * @package Log_Lolla_Pro
   */
?>

<?php
  $topic = get_term_by( 'slug', $post->post_name, 'post_tag' );
  set_query_var( 'topic', $topic );
  get_template_part( 'template-parts/archive/archive', 'related-topics' );
?>
