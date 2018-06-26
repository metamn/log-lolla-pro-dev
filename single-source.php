<?php
/**
 * Displays a Source's page.
 *
 * The page contains:
 *  * A Header from the Archive template tag
 *  * A Post list from the Post template tag
 *  * A Topic list from the Topic template tag
 *
 * @link https://morethemes.baby/log-lolla-pro-pro-demo/sources/stratechery/ Live example
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/ WordPress documentation
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

get_header();
?>

<section class="content content-archive">
	<h3 class="hidden">Single source archive</h3>

	<?php
	get_template_part( 'template-parts/post/post-list', 'post-type' );
	get_template_part( 'template-parts/topic/topic-list', 'post-type-related' );
	get_template_part( 'template-parts/archive/archive-header', 'post-type' );
	?>
</section>

<?php get_template_part( 'template-parts/sidebar/sidebar' ); ?>

<?php
get_footer();
