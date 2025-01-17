<?php
/**
 * Displays the copyright text in the footer.
 *
 * Displaying the copyright text can be switched on/off in the Administration screen.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

if ( get_theme_mod( 'footer_copyright_display' ) ) {
	?>
	<aside class="footer-copyright">
		<h3 class="hidden">Footer copyright</h3>

		<div class="text">
			&copy;
			<?php echo esc_attr( date( 'Y' ) ); ?>
			<a class="link" href="<?php echo esc_url( get_theme_mod( 'footer_copyright_link' ) ); ?>" title="<?php esc_attr( get_theme_mod( 'footer_copyright' ) ); ?>">
				<?php echo esc_attr( get_theme_mod( 'footer_copyright' ) ); ?>
			</a>
		</div>
	</aside>
	<?php
}
?>
