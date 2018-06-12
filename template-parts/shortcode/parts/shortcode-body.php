<?php
  /**
   * Template part to display a shortcode body
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */
?>


<?php
  if ( empty( $shortcode_body ) ) {
    $shortcode_body = get_query_var( $shortcode_body );
  }

  if ( empty( $shortcode_body ) ) return;
?>

<div class="shortcode-body">
  <?php echo $shortcode_body; ?>
</div>
