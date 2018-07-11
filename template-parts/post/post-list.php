<?php
/**
 * Displays a list of posts.
 *
 * Either displays a manual query outside of the loop or the standard query from the loop.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

$post_list_klass       = get_query_var( 'post-list-klass' );
$post_list_title       = get_query_var( 'post-list-title' );
$post_list_posts       = get_query_var( 'post-list-posts' );
$post_list_post_format = get_query_var( 'post-list-post-format' );
?>

<section class="post-list <?php echo esc_attr( $post_list_klass ); ?>">
	<h3 class="post-list-title">
		<?php echo wp_kses_post( $post_list_title ); ?>
	</h3>

	<div class="post-list-posts">
		<?php
		if ( $post_list_posts ) {
			$save_current_post = $post;

			// Set up the archive counter.
			global $archive_posts_count;
			$archive_posts_count = count( $post_list_posts );

			foreach ( $post_list_posts as $post ) {
				setup_postdata( $post );

				if ( empty( $post_list_post_format ) ) {
					get_template_part( 'template-parts/post/post-format', get_post_format() );
				} else {
					get_template_part( 'template-parts/post/post-format', $post_list_post_format );
				}
			}

			wp_reset_postdata();
			get_template_part( 'template-parts/navigation/navigation', 'posts' );

			$post = $save_current_post;
		} else {
			if ( have_posts() ) {

				// Set up the archive counter.
				global $archive_posts_count;
				$archive_posts_count = $wp_query->found_posts;

				while ( have_posts() ) {
					the_post();

					if ( empty( $post_list_post_format ) ) {
						get_template_part( 'template-parts/post/post-format', get_post_format() );
					} else {
						get_template_part( 'template-parts/post/post-format', $post_list_post_format );
					}
				}

				get_template_part( 'template-parts/navigation/navigation', 'posts' );
			} else {
				get_template_part( 'template-parts/post/post', 'none' );
			}
		}
		?>
	</div>
</section>
