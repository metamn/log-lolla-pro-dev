<?php
/**
 * Displayis a term / taxonomy / topic with sparklines
 *
 * @param object $topic      The topic.
 * @param string $sparklines The content for the sparklines.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

$topic      = get_query_var( 'topic' );
$sparklines = get_query_var( 'sparklines' );

if ( ! empty( $topic ) ) {
	?>

	<div class="topic-with-sparklines">
		<span class="topic">
			<?php get_template_part( 'template-parts/topic/parts/topic', 'link' ); ?>
		</span>

		<span class="sparklines sparks-font sparks-font-dotline-medium">
			<?php echo esc_html( $sparklines ); ?>
		</span>
	</div>
	<?php
}
?>
