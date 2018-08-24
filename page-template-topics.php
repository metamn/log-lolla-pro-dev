<?php
/**
 * Template Name: Topics Archive Template
 *
 * Template to display the Topics archive.
 *
 * The page contains:
 *  * A Header from the Topic template parts.
 *  * Two Topic lists from the Topic template parts. One for categories, one for tags.
 *
 * @link https://morethemes.baby/blog/topics Live example
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/ WordPress documentation
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

get_header();
?>


<section class="archive for topics">
	<h3 class="archive-title">Topics archive</h3>

	<div class="archive-items">
		<?php
		$list_query_vars = array(
			'klass' => 'topic-list topic-list--categories',
			'title' => log_lolla_pro_get_topic_label( 'Categories' ),
			'items' => log_lolla_pro_get_topic_post_list_as_html( 'category' ),
		);
		set_query_var( 'list-query-vars', $list_query_vars );
		get_template_part( 'template-parts/framework/structure/list/list', '' );

		$list_query_vars = array(
			'klass' => 'topic-list topic-list--tags',
			'title' => log_lolla_pro_get_topic_label( 'Tags' ),
			'items' => log_lolla_pro_get_topic_post_list_as_html( 'post_tag' ),
		);
		set_query_var( 'list-query-vars', $list_query_vars );
		get_template_part( 'template-parts/framework/structure/list/list', '' );

		get_template_part( 'template-parts/topic-header/topic-header', 'without-counters' );
		?>
	</div>
</section>

<?php get_footer(); ?>
