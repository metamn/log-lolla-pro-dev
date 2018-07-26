<?php
/**
 * Displays a Source's page.
 *
 * The page contains:
 *  * A Header from the Archive template tag
 *  * A Post list from the Post template tag
 *  * A Topic list from the Topic template tag
 *
 * @link https://morethemes.baby/log-lolla-pro-demo/sources/stratechery/ Live example
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/ WordPress documentation
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

get_header();
?>

<section class="content content-archive">
	<h3 class="archive-title">Single source archive</h3>

	<div class="archive-items">
		<?php
		get_template_part( 'template-parts/post-list/post-list', 'for-a-post-type' );
		get_template_part( 'template-parts/post-list/post-list', 'summaries-for-post-type' );

		$topic = get_term_by( 'slug', $post->post_name, 'post_tag' );
		set_query_var( 'related-to', $topic );
		get_template_part( 'template-parts/topic/topic-list', 'related-topics' );

		get_template_part( 'template-parts/archive-header/archive-header', 'for-post-type' );
		?>
	</div>
</section>

<?php get_template_part( 'template-parts/sidebar/sidebar' ); ?>

<?php
get_footer();
