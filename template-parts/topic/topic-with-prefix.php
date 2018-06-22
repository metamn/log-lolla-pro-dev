<?php
/**
 * Template part for displaying a topic / taxonomy
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Pro
 */

$topic = get_query_var( 'topic' );
if ( ! empty( $topic ) ) {
	?>

	<div class="topic-with-prefix">
		<span class="prefix">
			<?php echo esc_html_x( 'On&nbsp;', 'log-lolla-pro' ); ?>
		</span>

		<span class="topic">
			<?php get_template_part( 'template-parts/topic/parts/topic', 'link' ); ?>
		</span>
	</div>
	<?php
}
?>
