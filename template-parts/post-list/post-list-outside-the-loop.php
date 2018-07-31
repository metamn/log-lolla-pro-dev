<?php
/**
 * Displays a list of posts outside of the loop.
 *
 * This is needed for example on a category archive page to keep the Posts counter different for Summaries counter
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

$post_list_klass       = get_query_var( 'post-list-klass' );
$post_list_title       = get_query_var( 'post-list-title' );
$post_list_posts       = get_query_var( 'post-list-posts' );
$post_list_post_format = get_query_var( 'post-list-post-format' );

if ( $post_list_posts ) {
	?>
	<section class="post-list post-list--<?php echo esc_attr( $post_list_klass ); ?>">
		<h3 class="list-title">
			<?php echo esc_attr( $post_list_title ); ?>
		</h3>

		<div class="list-items">
			<?php
			$save_current_post = $post;

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
			?>
		</div>
	</section>
	<?php
}
?>
