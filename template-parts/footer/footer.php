<?php
/**
 * Displays the site's footer.
 *
 * It contains:
 * * A Navigation footer template part.
 * * A Copyright footer template part.
 * * A Credits footer template part.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

?>

<footer class="footer">
	<h3 class="hidden">Footer</h3>

	<?php get_template_part( 'template-parts/footer/parts/footer', 'navigation' ); ?>
	<?php get_template_part( 'template-parts/footer/parts/footer', 'copyright' ); ?>
	<?php get_template_part( 'template-parts/footer/parts/footer', 'credits' ); ?>
</footer>
