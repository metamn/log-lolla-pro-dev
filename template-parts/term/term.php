<?php
  /**
   * Template part for displaying a term / taxonomy
   *
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */
?>

<div class="term">
  <a class="link" href="<?php esc_url( get_term_link( $term ) ) ?>" title="<?php $term->name ?>">
    <?php echo $term->name ?>
  </a>
</div>
