<?php
/**
 * Displays a single Summarypost.
 *
 * The page contains:
 *  * The Single post format template part.
 *  * The Post footer template part.
 *  * The Comment list template part.
 *  * The Post navigation template part.
 *
 * @link https://morethemes.baby/log-lolla-pro-pro-demo/2018/05/21/tech-platforms-and-the-knowledge-problem/ Live example
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/ WordPress documentation
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

get_header();
?>

<section class="content content-single">
	<h3 class="hidden">Single post</h3>

	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/post/post-single', 'summary' );
		get_template_part( 'template-parts/post/parts/post-footer', 'summary' );
		get_template_part( 'template-parts/navigation/navigation', 'post' );
	endwhile; // End of the loop.
	?>
</section>

<?php get_template_part( 'template-parts/sidebar/sidebar' ); ?>

<?php
get_footer();
