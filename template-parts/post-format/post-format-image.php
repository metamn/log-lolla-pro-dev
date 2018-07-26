<?php
/**
 * Template part for displaying image posts
 *
 * Image – A single image. The first <img /> tag in the post could be considered the image.
 * Alternatively, if the post consists only of a URL, that will be the image URL
 * and the title of the post (post_title) will be the title attribute for the image.
 *
 * @link https://developer.wordpress.org/themes/functionality/post-formats/
 *
 * @package Log_Lolla_Pro
 */

$klass = 'post post-format-image';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $klass ); ?>>
	<?php get_template_part( 'template-parts/post/parts/post', 'sidebar-left' ); ?>

	<div class="post__content">
		<?php get_template_part( 'template-parts/post/parts/post', 'sticky' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post', 'title' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post', 'first-image' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post', 'permalink-if-no-title' ); ?>
	</div>

	<?php get_template_part( 'template-parts/post/parts/post', 'sidebar-right' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
