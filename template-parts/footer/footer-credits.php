<?php
/**
 * Displays the credits in the footer.
 *
 * Displaying the credits can be switched on/off in the Administration screen.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

if ( get_theme_mod( 'footer_credits_display' ) ) {
	?>
	<aside class="footer-credits">
		<h3 class="hidden">Footer credits</h3>

		<div class="text">
			<div class="powered-by">
				<?php
				printf(
					/* translators: %s: CMS name, i.e. WordPress. */
					esc_html__( 'powered by %1$s', 'log-lolla-pro' ),
					'<a class="link" href="https://wordpress.org/" title="WordpPess">WordPress</a>'
				);
				?>
			</div>

			<div class="theme-by">
				<?php
				printf(
					/* translators: 1: Theme name, 2: Theme author. */
					esc_html__( 'and the %1$s', 'log-lolla-pro' ),
					'<a class="link" href="https://morethemes.baby/themes/log-lolla-pro" title="Log Lolla Pro Theme">Log Lolla Pro theme</a>'
				);
				?>
			</div>
		</div>
	</aside>
	<?php
}
?>
