<?php
/**
 * Displays a Summary post footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

?>

<aside class="post-footer-summary">
	<h3 class="hidden">Post footer for Summary Post type</h3>

	<div class="list">
		<?php get_template_part( 'template-parts/post/parts/post', 'summary-link-to-archive' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post', 'summary-link-to-topic' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post', 'summary-date' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post', 'author' ); ?>
		<?php get_template_part( 'template-parts/post/parts/post', 'edit-link' ); ?>
	</div>
</aside>
