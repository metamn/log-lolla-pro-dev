<?php
  /**
   * Template part to display a shortcode title
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */
?>


<?php
  if ( empty( $shortcode_title ) ) {
    $shortcode_title = get_query_var( $shortcode_title );
  }

  if ( empty( $shortcode_title_url ) ) {
    $shortcode_title_url = get_query_var( $shortcode_title_url );
  }

  if ( empty( $shortcode_title ) ) return;
?>

<h3 class="shortcode-title">
  <?php if ( ! empty( $shortcode_title_url ) ) { ?>
    <a class="link" href="<?php echo $shortcode_title_url ?>" title="<?php echo $shortcode_title ?>">
  <?php } ?>

  <?php echo $shortcode_title; ?>

  <?php if ( ! empty( $shortcode_title_url ) ) { ?>
    </a>
  <?php } ?>
</h3>
