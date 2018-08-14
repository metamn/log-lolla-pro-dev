<?php
/**
 * Displays the archive title and description.
 *
 * This template part prepares the data for, and includes the `list-item` template part.
 *
 * It contains:
 * A List Item from the Framework template part.
 *
 * @link https://morethemes.baby/log-lolla-pro-demo/tag/indie-web/ Live example
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

set_query_var( 'list_item_class', 'archive-title-and-description' );

ob_start();
get_template_part( 'template-parts/archive/parts/archive', 'title' );
$list_item_primary_text = ob_get_clean();

ob_start();
get_template_part( 'template-parts/archive/parts/archive', 'description' );
$list_item_secondary_text = ob_get_clean();

ob_start();
get_template_part( 'template-parts/framework/design/decorations/circle/circle', '' );
$list_item_graphic = ob_get_clean();

$list_item_query_vars = array(
	'klass'          => 'archive-title-and-description',
	'primary-text'   => $list_item_primary_text,
	'secondary-text' => $list_item_secondary_text,
	'graphic'        => $list_item_graphic,
);
set_query_var( 'list-item-query-vars', $list_item_query_vars );
get_template_part( 'template-parts/framework/structure/list-item/list-item', '' );
