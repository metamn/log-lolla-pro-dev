<?php
/**
 * Displayis a term / taxonomy / topic
 *
 * @param object $topic The topic.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

$topic = get_query_var( 'topic' );

if ( ! empty( $topic ) ) {
	?>
	<div class="topic">
		<?php get_template_part( 'template-parts/topic/parts/topic', 'link' ); ?>
	</div>
	<?php
}
?>
