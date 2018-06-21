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

$klass = '';
?>

<footer class="footer">
	<h3 class="hidden">Footer</h3>

	<?php get_template_part( 'template-parts/footer/footer', 'navigation' ); ?>
	<?php get_template_part( 'template-parts/footer/footer', 'copyright' ); ?>
	<?php get_template_part( 'template-parts/footer/footer', 'credits' ); ?>
</footer>
