<?php
  /**
   * Displaying an archive counter
   *
   *
   * @package Log_Lolla_Pro
   */

  set_query_var( 'list_item_class', 'archive-counter' );
  set_query_var( 'list_item_primary_text', $pictogram['text'] );
  set_query_var( 'list_item_secondary_text', '' );
  set_query_var( 'list_item_graphic', $pictogram['number'] );

  ob_start();
  set_query_var( 'arrow_direction', 'bottom' );
  get_template_part( 'template-parts/framework/design/decorations/arrow-with-triangle/arrow-with-triangle', '' );
  set_query_var( 'list_item_icon', ob_get_clean() );

  get_template_part( 'template-parts/framework/structure/list-item/list-item', '' );
?>
