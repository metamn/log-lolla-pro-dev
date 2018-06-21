<?php
/**
 * Displays the archive title and description
 *
 * It contains:
 * A List Item from the Framework template part.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

set_query_var( 'list_item_class', 'archive-title-and-description' );

ob_start();
get_template_part( 'template-parts/archive/parts/archive', 'title' );
set_query_var( 'list_item_primary_text', ob_get_clean() );

ob_start();
get_template_part( 'template-parts/archive/parts/archive', 'description' );
set_query_var( 'list_item_secondary_text', ob_get_clean() );

ob_start();
get_template_part( 'template-parts/framework/design/decorations/circle/circle', '' );
set_query_var( 'list_item_graphic', ob_get_clean() );

get_template_part( 'template-parts/framework/structure/list-item/list-item', '' );
