<?php
/**
 * Displays the home page.
 *
 * The home page is a list of posts and comments.
 *
 * @link https://morethemes.baby/log-lolla-pro-demo/ Live example
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/ Wordpress documentation
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

get_header();
?>

<section class="content content-home">
	<h3 class="hidden">Home</h3>

	<?php get_template_part( 'template-parts/post-list/post-list', 'with-comments' ); ?>
</section>

<?php get_template_part( 'template-parts/sidebar/sidebar' ); ?>

<?php
get_footer();
