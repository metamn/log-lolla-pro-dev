<?php
/**
 * Displays the archive header for a post type.
 *
 * It contains:
 * * An Archive header template part.
 *
 * @link https://morethemes.baby/log-lolla-pro-demo/people/ben-thompson/ Live example
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

$title                = get_the_title();
$excerpt              = log_lolla_pro_get_the_excerpt( $post );
$archive_counter_list = log_lolla_pro_get_archive_counter_list( $post );
$pictograms           = log_lolla_pro_get_pictogram_list( $archive_counter_list );

set_query_var( 'archive_klass', 'archive-header--for-post-type' );
set_query_var( 'archive_title', $title );
set_query_var( 'archive_description', $excerpt );
set_query_var( 'pictograms', $pictograms );
get_template_part( 'template-parts/archive-header/archive-header', '' );
