<?php
/**
 * Displays the archive header.
 *
 * The archive header contains:
 *  * A Breadcrumb template part.
 *  * The Archive title and description template part.
 *  * The Archive counter list template part.
 *
 * @link https://morethemes.baby/log-lolla-pro-demo/tag/indie-web/ Live example
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

$klass = '';
?>

<header class="archive-header">
	<?php get_template_part( 'template-parts/breadcrumb/breadcrumb', 'for-archives' ); ?>
	<?php get_template_part( 'template-parts/archive/parts/archive', 'title-and-description' ); ?>
	<?php get_template_part( 'template-parts/archive/parts/archive', 'counter-list' ); ?>
</header>
