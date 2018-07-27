<?php
/**
 * Template part to display a link to a topic
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0.
 */

$klass = '';
?>


<a class="link topic-link" href="<?php echo esc_url( get_term_link( $topic->term_id ) ); ?>" title="<?php echo esc_attr( $topic->name ); ?>">
	<?php echo esc_html( $topic->name ); ?>
</a>
