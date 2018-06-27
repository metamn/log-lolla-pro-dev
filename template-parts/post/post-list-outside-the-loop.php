<?php
/**
 * Displays a list of posts outside of the loop.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

$post_list_klass = get_query_var( 'post-list-klass' );
$post_list_title = get_query_var( 'post-list-title' );
$post_list_posts = get_query_var( 'post-list-posts' );

if ( $post_list_posts ) {
	?>
	<section class="post-list <?php echo esc_attr( log_lolla_pro_get_classname_bem( 'post-list', $post_list_klass ) ); ?>">
		<h3 class="post-list-title">
			<?php echo esc_attr( $post_list_title ); ?>
		</h3>

		<div class="post-list-posts">
			<?php
			$save_current_post = $post;

			foreach ( $post_list_posts as $post ) {
				setup_postdata( $post );
				get_template_part( 'template-parts/post/post-format', get_post_format() );
			}

			wp_reset_postdata();
			get_template_part( 'template-parts/navigation/navigation', 'posts' );

			$post = $save_current_post;
			?>
		</div>
	</section>
	<?php
}
?>
