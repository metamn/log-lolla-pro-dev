<?php
  /**
   * Template part for displaying the header of a post type
   *
   *
   * @package Log_Lolla_Pro
   */
?>

<?php
	set_query_var( 'archive_title', get_the_title() );

	// `get_the_excerpt()` returns a read more link if the excerpt is empty
	// so we get the excerpt directly from the database
	set_query_var( 'archive_description', esc_html__( $post->post_excerpt ) );

	set_query_var( 'pictograms', log_lolla_get_pictograms( log_lolla_get_source_counters( $post ) ) );

	get_template_part( 'template-parts/archive/archive', 'header' );
?>
