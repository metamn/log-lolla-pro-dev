<?php
  /**
   * Displaying post categories as list
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */
?>

<?php if ( has_category() ) { ?>
  <aside class="post-categories post-categories-as-list">
    <h3 hidden>Article categories</h3>

    <?php echo get_the_category_list(); ?>
  </aside>
<?php } ?>
