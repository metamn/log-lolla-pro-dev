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

set_query_var( 'list_item_class', 'archive-counter' );
set_query_var( 'list_item_primary_text', $pictogram['text'] );
set_query_var( 'list_item_secondary_text', '' );
set_query_var( 'list_item_graphic', $pictogram['number'] );

ob_start();
set_query_var( 'arrow_direction', 'bottom' );
get_template_part( 'template-parts/framework/design/decorations/arrow-with-triangle/arrow-with-triangle', '' );
set_query_var( 'list_item_icon', ob_get_clean() );

get_template_part( 'template-parts/framework/structure/list-item/list-item', '' );
