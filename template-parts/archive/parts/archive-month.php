<?php
/**
 * Displays a link to month archive.
 *
 * @param integer $archive_year   A year.
 * @param array   $archive_months An array of integers as months of the year.
 *
 * @link https://morethemes.baby/log-lolla-pro-demo/archives/ Live example
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

$archive_year  = get_query_var( 'archive_year' );
$archive_month = get_query_var( 'archive_month' );
?>

<div class="archive-month">
	<a class="link" href="<?php echo esc_url( get_month_link( $archive_year, $archive_month ) ); ?>" title="<?php echo esc_attr( $archive_month ); ?>">
		<?php echo esc_html( $archive_month ); ?>
	</a>
</div>
