<?php
/**
 * Displays a Person's page (a single People page).
 *
 * The page contains:
 *  * A Header from the Archive template tag
 *  * A Post list from the Post template tag
 *  * A Topic list from the Topic template tag
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
	get_template_part( 'template-parts/post/post-list', 'post-list--posts' );
	get_template_part( 'template-parts/post/post-list', 'summaries-for-post-type' );

	$topic = get_term_by( 'slug', $post->post_name, 'post_tag' );
	set_query_var( 'related-to', $topic );
	get_template_part( 'template-parts/topic/topic-list', 'related-topics' );

	get_template_part( 'template-parts/archive/archive-header', 'post-type' );
	?>
</section>

<?php get_template_part( 'template-parts/sidebar/sidebar' ); ?>

<?php
get_footer();
