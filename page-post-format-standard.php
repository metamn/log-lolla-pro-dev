<?php
/**
 * Template Name: Standard Post Format Archive
 *
 * Template to display the Standard Post format archive.
 *
 * By default WordPress has no archive for Standard post formats.
 * We should create a page titled `Post Format Standard` and use this template to show Standard Post format archives.
 *
 * In `inc/template-functions` we have a rewrite rule to map `post-format/standard` to this page.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

get_header();
?>

<section class="content content-archive">
	<h3 class="hidden">Archive for Standard post format</h3>

	<?php
		$posts = log_lolla_pro_get_post_format_standard_post_list();
		set_query_var( 'post-list-posts', $posts );
		set_query_var( 'post-list-klass', 'archive-standard-post-format' );
		get_template_part( 'template-parts/post/post', 'list' );
	?>

	<?php get_template_part( 'template-parts/archive/archive', 'header' ); ?>
</section>

<?php get_template_part( 'template-parts/sidebar/sidebar' ); ?>

<?php
get_footer();
