<?php
/**
 * Template part for displaying status posts
 *
 * Status – A short status update, similar to a Twitter status update.
 *
 * @link https://developer.wordpress.org/themes/functionality/post-formats/
 *
 * @package Log_Lolla_Pro
 */

$klass = 'post post-format-status';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $klass ); ?>>
	<?php get_template_part( 'template-parts/post/parts/post', 'sidebar-left' ); ?>

	<div class="post__content">
		<?php get_template_part( 'template-parts/post/parts/post', 'date-and-time' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post', 'sticky' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post', 'content' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post', 'author-linking-to-post' ); ?>
	</div>

	<?php get_template_part( 'template-parts/post/parts/post', 'sidebar-right' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->