<?php
/**
 * Template Name: Categories Page
 *
 * Template to display the Categories archive.
 *
 * The page contains:
 *  * A Header from the Topic template parts.
 *  * A Topic list from the Topic template parts.
 *
 * @link https://morethemes.baby/log-lolla-pro-demo/categories Live example
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/ WordPress documentation
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

get_header();
?>


<section class="content content-archive">
	<h3 class="hidden">Categories archive</h3>

	<?php
	set_query_var( 'list-klass', 'list--categories' );
	set_query_var( 'list-title', '' );
	set_query_var( 'list-items', log_lolla_pro_get_topic_post_list_as_html( 'category' ) );
	get_template_part( 'template-parts/framework/structure/list/list', '' );

	get_template_part( 'template-parts/topic/topic', 'header' );
	?>
</section>

<?php get_template_part( 'template-parts/sidebar/sidebar' ); ?>

<?php get_footer(); ?>
