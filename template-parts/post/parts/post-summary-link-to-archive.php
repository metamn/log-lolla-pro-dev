<?php
/**
 * Displays a link to the Summary archive
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

?>

<div class="link-with-prefix">
	<span class="prefix">
		<?php echo esc_html_x( 'A&nbsp;', 'log-lolla-pro' ); ?>
	</span>

	<?php echo wp_kses_post( log_lolla_pro_get_link_html( 'Summaries', 'Summary' ) ); ?>
</div>
