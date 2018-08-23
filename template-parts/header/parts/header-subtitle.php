<?php
/**
 * Displays the header subtitle.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

if ( display_header_text() ) {
	?>
	<h4 class="header-subtitle">
		<span class="text">
			<?php bloginfo( 'description' ); ?>
		</span>
	</h4>
	<?php
}
