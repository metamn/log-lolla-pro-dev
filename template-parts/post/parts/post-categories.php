<?php
  /**
   * Displaying post categories
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */
?>

<?php if ( has_category() ) { ?>
  <aside class="post-categories">
    <h3 class="hidden">Article categories</h3>

    <?php
      /* translators: used between list items, there is a space after the comma */
      $categories_list = get_the_category_list( esc_html_x( ', ', 'list item separator', 'log-lolla' ) );

      if ( $categories_list ) {
        /* translators: 1: list of categories. */
        printf(
          '<span class="cat-links">' . esc_html__( 'Posted in%1$s. ', 'log-lolla' ) . '</span>',
          $categories_list
        ); // WPCS: XSS OK.
      }
    ?>
  </aside>
<?php } ?>
