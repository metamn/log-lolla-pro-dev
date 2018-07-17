<?php
/**
 * Template part for displaying a list
 *
 * @package Log_Lolla_Pro
 */

$list_klass = get_query_var( 'list-klass' );
$list_title = get_query_var( 'list-title' );
$list_items = get_query_var( 'list-items' );

if ( $list_items ) {
	?>
	<section class="list <?php echo esc_attr( $list_klass ); ?>">
		<h3 class="list-title">
			<?php echo wp_kses_post( $list_title ); ?>
		</h3>

		<div class="list-items">
			<?php echo wp_kses_post( $list_items ); ?>
		</div>
	</section>
	<?php
}
?>
