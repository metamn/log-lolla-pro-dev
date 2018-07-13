<?php
/**
 * Displays the archive header for a post type.
 *
 * This template part prepares the data for, and includes the `archive-header` template part.
 *
 * @link https://morethemes.baby/log-lolla-pro-demo/people/ben-thompson/ Live example
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

set_query_var( 'archive_title', get_the_title() );

// `get_the_excerpt()` returns a read more link if the excerpt is empty
// so we get the excerpt directly from the database
set_query_var( 'archive_description', esc_html( $post->post_excerpt ) );

set_query_var( 'pictograms', log_lolla_pro_get_pictogram_list( log_lolla_pro_get_archive_counter_list( $post ) ) );

get_template_part( 'template-parts/archive/archive', 'header' );
