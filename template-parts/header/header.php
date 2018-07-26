<?php
/**
 * Displays the site header.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Pro
 */

if ( function_exists( 'log_lolla_pro_get_header_class' ) ) {
	$klass = log_lolla_pro_get_header_class();
} else {
	$klass = '';
}
?>

<header class="header <?php echo esc_attr( $klass ); ?>">
	<?php get_template_part( 'template-parts/header/parts/header', 'image' ); ?>
	<?php get_template_part( 'template-parts/header/parts/header', 'logo' ); ?>
	<?php get_template_part( 'template-parts/header/parts/header', 'title' ); ?>
	<?php get_template_part( 'template-parts/header/parts/header', 'subtitle' ); ?>
	<?php get_template_part( 'template-parts/header/parts/header', 'menu-hamburger' ); ?>
</header>

<?php get_template_part( 'template-parts/header/parts/header', 'menu' ); ?>
