<?php
/**
 * Template part for displaying gallery posts
 *
 * Gallery – A gallery of images.
 * Post will likely contain a gallery shortcode and will have image attachments.
 *
 * @link https://developer.wordpress.org/themes/functionality/post-formats/
 *
 * @package Log_Lolla_Pro
 */

$klass = 'post post-format-gallery';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $klass ); ?>>
	<?php get_template_part( 'template-parts/post/parts/post', 'sidebar-left' ); ?>

	<div class="post__content">
		<?php get_template_part( 'template-parts/post/parts/post', 'sticky' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post', 'title' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post', 'gallery' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post', 'permalink-if-no-title' ); ?>
	</div>

	<?php get_template_part( 'template-parts/post/parts/post', 'sidebar-right' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
