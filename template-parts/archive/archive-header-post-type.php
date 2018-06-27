<?php
/**
 * Displays the header of a post type archive
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

set_query_var( 'archive_title', get_the_title() );

// `get_the_excerpt()` returns a read more link if the excerpt is empty
// so we get the excerpt directly from the database
set_query_var( 'archive_description', esc_html( $post->post_excerpt ) );

set_query_var( 'pictograms', log_lolla_pro_get_pictograms( log_lolla_pro_get_archive_counter_list( $post ) ) );

get_template_part( 'template-parts/archive/archive', 'header' );
