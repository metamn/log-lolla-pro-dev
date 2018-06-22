<?php
/**
 * Template part for displaying audio posts
 *
 * Audio – An audio file. Could be used for Podcasting.
 *
 * @link https://developer.wordpress.org/themes/functionality/post-formats/
 *
 * @package Log_Lolla_Pro
 */

$klass = 'post post-format-audio';
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
