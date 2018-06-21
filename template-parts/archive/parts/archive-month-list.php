<?php
/**
 * Displays a list of months pointing to a monthly archive.
 *
 * It contains:
 *  * A list of Month acrhive template parts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/ WordPress documentation
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

$archive_months = get_query_var( 'archive_months' );
$grid           = round( count( $archive_months ) / 2 );
?>

<div class="months grid-<?php echo esc_attr( $grid ); ?>">
	<?php
	foreach ( $archive_months as $archive_month ) {
		set_query_var( 'archive_month', $archive_month );
		get_template_part( 'template-parts/archive/parts/archive', 'month' );
	}
	?>
</div>
