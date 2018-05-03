<?php
/**
 * The template for displaying the home page
 *
 * If there is a `to-home-page` category with posts these posts will be displayed here
 * If not, the homepage will display the latest posts
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla
 */

get_header(); ?>

	<section class="content content-home">
		<h3 hidden>Home</h3>

		<?php
			if ( have_posts() ) :

				// Get comments for this set of posts
				$comments = log_lolla_get_comments_for_the_loop( $wp_query->posts );


				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/post/post-format', get_post_format() );


					// Get all comments before the post date
					//
					$comments_before_post = log_lolla_get_comments_before_date( $comments, get_the_date() );

					// Display comments
					//
					if ( ! empty( $comments_before_post ) ) {
						foreach ( $comments_before_post as $comment ) {
							get_template_part( 'template-parts/comment/comment', 'in-loop' );

							// Remove comment from the list
							$comments = log_lolla_remove_object_from_array( $comments, $comment );
						}
					}


				endwhile;

				get_template_part( 'template-parts/navigation/navigation', 'posts' );

			else :

				get_template_part( 'template-parts/post/post', 'none' );

			endif;
		?>
	</section>

	<?php get_template_part( 'template-parts/sidebar/sidebar' ); ?>

<?php
get_footer();
