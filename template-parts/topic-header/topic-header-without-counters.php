<?php
/**
 * Template part for displaying the header of the tag archive page
 *
 * It will be displayed using the common `archive-header` template
 *
 * @package Log_Lolla_Pro
 */

$title                = get_the_title();
$archive_counter_list = log_lolla_pro_get_archive_counter_list( $post );
$pictograms           = log_lolla_pro_get_pictogram_list( $archive_counter_list );

set_query_var( 'archive_title', $title );
set_query_var( 'pictograms', $pictograms );
get_template_part( 'template-parts/archive-header/archive-header', 'without-counters' );
