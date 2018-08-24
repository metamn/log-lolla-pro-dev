<?php
/**
 * Displays an archive of a year and it's months.
 *
 * It contains:
 * * A Year Archive template part.
 * * A Month list Archive template part.
 *
 * @param integer $archive_year   A year.
 * @param array   $archive_months An array of integers as months of the year.
 *
 * @link https://morethemes.baby/blog/archives/ Live example
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

$archive_year   = get_query_var( 'archive_year' );
$archive_months = get_query_var( 'archive_months' );
?>

<div class="archive-year-and-months">
	<?php get_template_part( 'template-parts/archive/parts/archive', 'year' ); ?>
	<?php get_template_part( 'template-parts/archive/parts/archive', 'month-list' ); ?>
</div>
