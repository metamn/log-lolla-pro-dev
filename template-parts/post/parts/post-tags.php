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

    <?php log_lolla_post_tags(); ?>
  </aside>
<?php } ?>
