<?php
/**
 * Template Name: Categories Page
 *
 * Template to display an archive of categories
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package Log_Lolla_Pro
 */

get_header();
?>


<section class="content content-archive">
	<h3 class="hidden">Category archive</h3>

	<?php
	set_query_var( 'topic_list_klass', 'categories' );
	set_query_var( 'topic_list_title', '' );
	set_query_var( 'topic_list_items', log_lolla_pro_get_topic_archive( 'category' ) );
	get_template_part( 'template-parts/topic/topic', 'list' );

	get_template_part( 'template-parts/topic/topic', 'header' );
	?>
</section>

<?php get_template_part( 'template-parts/sidebar/sidebar' ); ?>

<?php get_footer(); ?>
