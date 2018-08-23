<?php
/**
 * Displays the footer navigation.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

?>

<nav class="footer-navigation">
	<h3 class="hidden">Footer navigation</h3>
	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'menu-1',
			'menu_id'        => 'primary-menu',
			'before'         => '<span class="link">',
			'after'          => '</span>',
		)
	);
	?>
</nav>
