<?php
/**
 * Template part for displaying the header of the tag archive page
 *
 * It will be displayed using the common `archive-header` template
 *
 * @package Log_Lolla_Pro
 */

set_query_var( 'archive_title', get_the_title() );
set_query_var( 'pictograms', log_lolla_pro_get_pictogram_list( log_lolla_pro_get_archive_counter_list( $post ) ) );

get_template_part( 'template-parts/archive/archive', 'header' );
