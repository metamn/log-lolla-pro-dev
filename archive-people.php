<?php
/**
 * Displays the archive page for the People post type.
 *
 * The page contains:
 *  * A Header from the Archive template part.
 *  * A Post list from the Post template part.
 *
 * @link https://morethemes.baby/log-lolla-pro-demo/people Live example
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/ Wordpress documentation
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

get_header();
?>

<section class="content content-archive">
	<h3 class="archive-title">Archive for People</h3>

	<div class="archive-items">
		<?php
			set_query_var( 'post-list-klass', 'post-list-for-archive' );
			get_template_part( 'template-parts/post/post', 'list' );
		?>

		<?php get_template_part( 'template-parts/archive/archive', 'header' ); ?>
	</div>
</section>

<?php get_template_part( 'template-parts/sidebar/sidebar' ); ?>

<?php
get_footer();
