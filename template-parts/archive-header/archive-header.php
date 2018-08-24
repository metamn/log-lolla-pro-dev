<?php
/**
 * Displays the archive header.
 *
 * It contains:
 *  * A Breadcrumb template part.
 *  * The Archive title and description template part.
 *  * The Archive counter list template part.
 *
 * @param string $archive_klass Additional classes for this component.
 *
 * @link https://morethemes.baby/blog/tag/indie-web/ Live example
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

$archive_klass = get_query_var( 'archive_klass' ) ? get_query_var( 'archive_klass' ) : '';
?>

<header class="archive-header <?php echo esc_attr( $archive_klass ); ?>">
	<?php get_template_part( 'template-parts/breadcrumb/breadcrumb', 'for-archives' ); ?>
	<?php get_template_part( 'template-parts/archive/parts/archive', 'title-and-description' ); ?>
	<?php get_template_part( 'template-parts/archive/parts/archive', 'counter-list' ); ?>
</header>
