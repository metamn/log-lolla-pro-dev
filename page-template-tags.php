<?php
/**
 * Template Name: Tags Archive Template
 *
 * Template to display the Tags archive.
 *
 * The page contains:
 *  * A Header from the Topic template parts.
 *  * A Topic list from the Topic template parts.
 *
 * @link https://morethemes.baby/log-lolla-pro-demo/tags Live example
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/ WordPress documentation
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

get_header();
?>


<section class="archive archive-for-tags">
	<h3 class="archive-title">Tags archive</h3>

	<div class="archive-items">
		<?php
		set_query_var( 'list-klass', 'list--tags' );
		set_query_var( 'list-title', '' );
		set_query_var( 'list-items', log_lolla_pro_get_topic_post_list_as_html( 'post_tag' ) );
		get_template_part( 'template-parts/framework/structure/list/list', '' );

		get_template_part( 'template-parts/topic-header/topic-header', '' );
		?>
	</div>
</section>

<?php get_footer(); ?>
