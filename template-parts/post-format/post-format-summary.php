<?php
/**
 * Display a post of a Summary post type
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Pro
 */

$post_klass = log_lolla_pro_get_post_class();

$post_klass_array = array(
	'post',
	'post-format-summary',
	$post_klass,
);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $post_klass_array ); ?>>
	<?php get_template_part( 'template-parts/post/parts/post', 'sidebar-left' ); ?>

	<div class="post__content">
		<?php get_template_part( 'template-parts/post/parts/post', 'sticky' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post-title', 'without-link' ); ?>
	</div>

	<?php get_template_part( 'template-parts/post/parts/post', 'sidebar-right' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->