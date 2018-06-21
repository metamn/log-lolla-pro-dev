<?php
/**
 * Displays a link to a year archive.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

$archive_year = get_query_var( 'archive_year' );
?>

<div class="year">
	<a class="link" href="<?php echo esc_url( get_year_link( $archive_year ) ); ?>" title="<?php echo esc_attr( $archive_year ); ?>">
		<?php echo esc_html( $archive_year ); ?>
	</a>
</div>
