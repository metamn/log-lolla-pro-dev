<?php
/**
 * Displays a list of posts.
 *
 * Either displays a manual query outside of the loop or the standard query from the loop.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

$post_list_query_vars_defaults = array(
	'klass'       => '',
	'title'       => '',
	'posts'       => array(),
	'post-format' => '',
);

$post_list_query_vars = array_merge(
	$post_list_query_vars_defaults,
	get_query_var( 'post-list-query-vars' )
);

$post_list_klass       = $post_list_query_vars['klass'];
$post_list_title       = $post_list_query_vars['title'];
$post_list_posts       = $post_list_query_vars['posts'];
$post_list_post_format = $post_list_query_vars['post-format'];
?>

<section class="post-list post-list--<?php echo esc_attr( $post_list_klass ); ?>">
	<h3 class="list-title">
		<?php echo wp_kses_post( $post_list_title ); ?>
	</h3>

	<div class="list-items">
		<?php
		if ( $post_list_posts ) {
			$save_current_post = $post;

			// Set up the archive counter.
			global $archive_posts_count;
			$archive_posts_count = count( $post_list_posts );

			foreach ( $post_list_posts as $post ) {
				setup_postdata( $post );

				if ( empty( $post_list_post_format ) ) {
					get_template_part( 'template-parts/post-format/post-format', get_post_format() );
				} else {
					get_template_part( 'template-parts/post-format/post-format', $post_list_post_format );
				}
			}

			wp_reset_postdata();
			get_template_part( 'template-parts/navigation/navigation', 'for-posts' );

			$post = $save_current_post;
		} else {
			if ( have_posts() ) {

				// Set up the archive counter.
				global $archive_posts_count;
				$archive_posts_count = $wp_query->found_posts;

				while ( have_posts() ) {
					the_post();

					if ( empty( $post_list_post_format ) ) {
						get_template_part( 'template-parts/post-format/post-format', get_post_format() );
					} else {
						get_template_part( 'template-parts/post-format/post-format', $post_list_post_format );
					}
				}

				get_template_part( 'template-parts/navigation/navigation', 'for-posts' );
			} else {
				get_template_part( 'template-parts/post/post', 'none' );
			}
		}
		?>
	</div>
</section>
