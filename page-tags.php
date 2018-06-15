<?php
	/**
	 * Template Name: Tags Page
	 *
	 * Template to display an archive of tags
	 *
	 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
	 *
	 * @package Log_Lolla_Pro
	 */

	get_header();
?>


<section class="content content-archive">
	<h3 class="hidden">Tag archive</h3>

	<?php
	set_query_var( 'topic_list_klass', 'tags' );
	set_query_var( 'topic_list_title', '' );
	set_query_var( 'topic_list_items', log_lolla_pro_get_topic_archive( 'post_tag' ) );
	get_template_part( 'template-parts/topic/topic', 'list' );

	get_template_part( 'template-parts/topic/topic', 'header' );
	?>
</section>

<?php get_template_part( 'template-parts/sidebar/sidebar' ); ?>

<?php get_footer(); ?>
