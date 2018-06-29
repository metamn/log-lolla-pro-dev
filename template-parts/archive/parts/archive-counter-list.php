<?php
/**
 * Displays a list of counters for an Archive.
 *
 * @param array $pictograms An array of pictograms.
 *
 * @link https://morethemes.baby/log-lolla-pro-pro-demo/tag/indie-web/ Live example
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

$pictograms = get_query_var( 'pictograms' );

if ( empty( $pictograms ) ) {
	$archive = get_queried_object();

	if ( empty( $archive ) ) {
		return;
	}

	$archive_counter_list = log_lolla_pro_get_archive_counter_list( $archive );
	$pictograms           = log_lolla_pro_get_pictogram_list( $archive_counter_list );
}

if ( empty( $pictograms ) ) {
	return;
}
?>

<nav class="archive-counter-list">
	<h3 class="hidden">Archive counter list</h3>

	<?php
	foreach ( $pictograms as $pictogram ) {
		set_query_var( 'pictogram', $pictogram );
		get_template_part( 'template-parts/archive/parts/archive-counter', '' );
	}
	?>
</nav>
