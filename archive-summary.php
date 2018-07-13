<?php
/**
 * Displays the archive page for the Summary post type.
 *
 * The page contains:
 *  * A Header from the Archive template part.
 *  * A Post list from the Post template part.
 *
 * @link https://morethemes.baby/log-lolla-pro-demo/summaries Live example
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/ Wordpress documentation
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

get_header();
?>

<section class="content content-archive">
	<h3 class="hidden">Archive for Summaries</h3>

	<?php
		set_query_var( 'post-list-klass', 'post-list--posts' );
		set_query_var( 'post-list-post-format', 'summary' );
		get_template_part( 'template-parts/post/post', 'list' );
	?>

	<?php get_template_part( 'template-parts/archive/archive', 'header' ); ?>
</section>

<?php get_template_part( 'template-parts/sidebar/sidebar' ); ?>

<?php
get_footer();
