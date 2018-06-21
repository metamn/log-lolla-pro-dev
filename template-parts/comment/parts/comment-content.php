<?php
/**
 * Displays the  comment content
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

$text = get_comment_text();
?>

<aside class="comment-content">
	<h3 class="hidden">Comment content</h3>

	<div class="text">
		<?php echo esc_html( $text ); ?>
	</div>
</aside>
