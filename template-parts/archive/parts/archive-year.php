<?php
/**
 * Displays a link to a year archive.
 *
 * @param integer $archive_year The archive year.
 *
 * @link https://morethemes.baby/log-lolla-pro-demo/archives/ Live example
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

$archive_year = get_query_var( 'archive_year' );
?>

<div class="archive-year">
	<a class="link" href="<?php echo esc_url( get_year_link( $archive_year ) ); ?>" title="<?php echo esc_attr( $archive_year ); ?>">
		<?php echo esc_html( $archive_year ); ?>
	</a>
</div>
