<?php
  /**
   * Displaying post tags
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */
?>

<?php if ( has_tag() ) { ?>
  <aside class="post-tags">
    <h3 class="hidden">Article tags</h3>

    <?php
      /* translators: used between list items, there is a space after the comma */
      $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'log-lolla' ) );

      if ( $tags_list ) {
        /* translators: 1: list of tags. */
        printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s. ', 'log-lolla' ) . '</span>',
          $tags_list
        ); // WPCS: XSS OK.
      }
    ?>
  </aside>
<?php } ?>
