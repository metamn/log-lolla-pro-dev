<?php
	/**
	 * Template part for displaying aside posts
	 *
	 * aside – Typically styled without a title. Similar to a Facebook note update.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/post-formats/
	 *
	 * @package Log_Lolla
	 */

	$klass = 'post post-format-aside';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $klass ); ?>>
	<?php get_template_part( 'template-parts/post/post', 'sidebar-left' ); ?>

	<div class="post__content">
		<?php get_template_part( 'template-parts/post/parts/post', 'sticky' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post', 'content' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post', 'permalink' ); ?>
	</div>

	<?php get_template_part( 'template-parts/post/post', 'sidebar-right' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
