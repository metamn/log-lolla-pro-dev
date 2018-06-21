<?php
/**
 * Displays an archive of a year and it's months.
 *
 * It contains:
 * * A Year Archive template part.
 * * A Month list  Archive template part.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/ Wordpress documentation
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

$archive_year   = get_query_var( 'archive_year' );
$archive_months = get_query_var( 'archive_months' );
?>

<div class="year-and-months">
	<?php get_template_part( 'template-parts/archive/parts/archive', 'year' ); ?>
	<?php get_template_part( 'template-parts/archive/parts/archive/month', 'list' ); ?>
</div>
