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

<?php
  $term = get_query_var( 'term' );
  if ( ! empty( $term ) ) { ?>

    <div class="term">
      <a class="link" href="<?php echo esc_url( get_term_link( $term->term_id ) ) ?>" title="<?php echo $term->name ?>">
        <?php echo $term->name ?>
      </a>
    </div>

  <?php }
?>
