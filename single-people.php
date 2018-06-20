<?php
/**
 * Displays a Person's page (a single People page).
 *
 * The page contains:
 *  * A Header from the Post Type template tag
 *  * A Post list from the Post Type template tag
 *  * A Related topics list from the Post Type template tag
 *
 * @link https://morethemes.baby/log-lolla-pro-pro-demo/people/ben-thompson/ Live example
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/ WordPress documentation
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

get_header();
?>

<section class="content content-archive">
	<h3 class="hidden">Single person archive</h3>

	<?php
	get_template_part( 'template-parts/post-type/post-type', 'posts' );
	get_template_part( 'template-parts/post-type/post-type', 'related-topics' );
	get_template_part( 'template-parts/post-type/post-type', 'header' );
	?>
</section>

<?php get_template_part( 'template-parts/sidebar/sidebar' ); ?>

<?php
get_footer();
