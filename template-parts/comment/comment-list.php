<?php
/**
 * Displays a list of comments.
 *
 * It contains:
 * * A List title Comment template part
 * * A series of Single comments template parts
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

if ( post_password_required() ) {
	return;
}

$comments           = log_lolla_pro_get_comment_list_of_a_post( $post );
$number_of_comments = count( $comments );
if ( ! $number_of_comments ) {
	return;
}
?>

<section class="comments" id="comments-for-post-<?php echo esc_attr( get_the_ID( $post ) ); ?>">
	<?php
		set_query_var( 'number_of_comments', $number_of_comments );
		get_template_part( 'template-parts/comment/parts/comment', 'list-title' );
	?>

	<div class="comments-body">
		<?php
		foreach ( $comments as $comment ) {
			get_template_part( 'template-parts/comment/comment', 'single' );
		}
		?>
	</div>
</section>
