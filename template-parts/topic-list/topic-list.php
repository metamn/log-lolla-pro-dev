<?php
/**
 * Template part for displaying a list of topics
 *
 * @package Log_Lolla_Pro
 */

$topic_list_klass = get_query_var( 'topic-list-klass' );
$topic_list_title = get_query_var( 'topic-list-title' );
$topic_list_items = get_query_var( 'topic-list-items' );

if ( $topic_list_items ) {
	?>
	<section class="topic-list <?php echo esc_attr( $topic_list_klass ); ?>">
		<h3 class="topic-list-title">
			<?php echo wp_kses_post( $topic_list_title ); ?>
		</h3>

		<div class="topic-list-body">
			<?php echo wp_kses_post( $topic_list_items ); ?>
		</div>
	</section>
	<?php
}
?>
