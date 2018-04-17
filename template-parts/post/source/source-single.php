<?php
/**
 * Template part for displaying a source post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla
 */
?>

<?php
	$post_klass = log_lolla_post_class();
	$post_klass_array = array(
		'post',
		'post-single',
		'source-single',
		$post_klass
	);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($post_klass_array); ?>>
	<?php get_template_part( 'template-parts/post/parts/post', 'title-without-link' ); ?>
	<?php get_template_part( 'template-parts/post/parts/post', 'featured-image' ); ?>
	<?php get_template_part( 'template-parts/post/parts/post', 'content' ); ?>
	<?php get_template_part( 'template-parts/post/parts/post', 'paginated-content' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->