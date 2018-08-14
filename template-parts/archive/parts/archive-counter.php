<?php
/**
 * Displays an archive counter.
 *
 * This template part prepares the data for, and includes the `list-item` template part.
 *
 * It contains:
 *  * A List item from the Framework template part
 *
 * @param array $pictogram A pictogram.
 *
 * @link https://morethemes.baby/log-lolla-pro-demo/tag/indie-web/ Live example
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

$pictogram = get_query_var( 'pictogram' );

if ( empty( $pictogram ) ) {
	return;
}

ob_start();
set_query_var( 'arrow_direction', 'bottom' );
get_template_part( 'template-parts/framework/design/decorations/arrow-with-triangle/arrow-with-triangle', '' );
$list_item_icon = ob_get_clean();


$list_item_query_vars = array(
	'klass'        => 'archive-counter archive-counter--' . $pictogram['klass'],
	'primary-text' => $pictogram['text'],
	'metadata'     => $pictogram['number'],
	'icon'         => $list_item_icon,
	'data-attr'    => 'data-scrollto=' . $pictogram['scrollto'],
);
set_query_var( 'list-item-query-vars', $list_item_query_vars );
get_template_part( 'template-parts/framework/structure/list-item/list-item', '' );
