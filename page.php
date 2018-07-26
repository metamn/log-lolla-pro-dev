<?php
/**
 * Displays a page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

get_header();
?>

<section class="content-page">
	<h3 class="hidden">Page</h3>

	<?php
	// Display the content of the page.
	if ( have_posts() ) {

		// Start the Loop.
		while ( have_posts() ) :
			the_post();

			/*
			 * Include the Post-Format-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
			 */
			get_template_part( 'template-parts/post/post', 'single' );

		endwhile;

		get_template_part( 'template-parts/navigation/navigation', 'for-posts' );

	} else {

		get_template_part( 'template-parts/post/post', 'none' );
	}

	wp_reset_postdata();
	?>
</section>

<?php
get_footer();
