<?php
  /**
   * Displaying post format and topics
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla_Pro
   */

  $format = log_lolla_pro_get_post_format_link_to_archive();
  $categories = get_the_category_list( esc_html_x( ' ', 'list item separator', 'log-lolla-pro' ) );
  $tags = get_the_tag_list( '', esc_html_x( ' ', 'list item separator', 'log-lolla-pro' ) );

  $all = $format . ' ' . $categories . ' ' . $tags;
  echo str_replace( '.', '', $all );
?>
