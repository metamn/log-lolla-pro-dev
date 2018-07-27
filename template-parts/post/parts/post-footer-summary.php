<?php
/**
 * Displays a Summary post footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Pro
 */

$klass = '';
?>

<aside class="post-footer post-footer-summary">
	<h3 class="hidden">Summary post footer</h3>

	<?php get_template_part( 'template-parts/post/parts/post', 'summary-link-to-archive' ); ?>
	<?php get_template_part( 'template-parts/post/parts/post', 'summary-link-to-topic' ); ?>
	<?php get_template_part( 'template-parts/post/parts/post', 'summary-date' ); ?>
	<?php get_template_part( 'template-parts/post/parts/post', 'author' ); ?>
	<?php get_template_part( 'template-parts/post/parts/post', 'edit-link' ); ?>
</aside>
