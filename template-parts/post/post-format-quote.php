<?php
/**
 * Template part for displaying quote posts
 *
 * Quote – A quotation. Probably will contain a blockquote holding the quote content.
 * Alternatively, the quote may be just the content, with the source/author being the title.
 *
 * We go with the second option: we assume everything is a quote, and we don't style an eventual quote inside
 *
 * @link https://developer.wordpress.org/themes/functionality/post-formats/
 *
 * @package Log_Lolla_Pro
 */

$klass = 'post post-format-quote';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $klass ); ?>>
	<?php get_template_part( 'template-parts/post/post', 'sidebar-left' ); ?>

	<div class="post__content">
		<?php get_template_part( 'template-parts/post/parts/post', 'sticky' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post', 'title' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post', 'content' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post', 'permalink-if-no-title' ); ?>
	</div>

	<?php get_template_part( 'template-parts/post/post', 'sidebar-right' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
