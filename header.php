<?php
/**
 * Displays the site's header.
 *
 * It contains:
 * * A Header template part.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

$klass = '';
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php
		/**
		 * We use Semantic HTML 5 for accesibility and SEO and validate with the Outliner: https://gsnedders.html5.org/outliner/
		 * The first entry in the Outliner should be the site title, so we are displaying it here
		 * * It is always hidden, it's single purpose is to make the entire site semantic
		 */
	?>
	<h1 class="hidden"><?php bloginfo( 'name' ); ?></h1>

	<?php get_template_part( 'template-parts/header/header', '' ); ?>

	<?php // Will be closed in the footer. ?>
	<div class="content">
