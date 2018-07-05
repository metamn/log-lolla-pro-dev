<?php
/**
 * Template Name: Topics Page
 *
 * Template to display the Topics archive.
 *
 * The page contains:
 *  * A Header from the Topic template parts.
 *  * Two Topic lists from the Topic template parts. One for categories, one for tags.
 *
 * @link https://morethemes.baby/log-lolla-pro-pro-demo/topics Live example
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/ WordPress documentation
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

get_header();
?>


<section class="content content-archive">
	<h3 class="hidden">Topics archive</h3>

	<?php
	set_query_var( 'topic_list_klass', 'categories' );
	set_query_var( 'topic_list_title', '' );
	set_query_var( 'topic_list_items', log_lolla_pro_get_topic_post_list_as_html( 'category' ) );
	get_template_part( 'template-parts/topic/topic', 'list' );

	set_query_var( 'topic_list_klass', 'tags' );
	set_query_var( 'topic_list_title', '' );
	set_query_var( 'topic_list_items', log_lolla_pro_get_topic_post_list_as_html( 'post_tag' ) );
	get_template_part( 'template-parts/topic/topic', 'list' );

	get_template_part( 'template-parts/topic/topic', 'header' );
	?>
</section>

<?php get_template_part( 'template-parts/sidebar/sidebar' ); ?>

<?php get_footer(); ?>
