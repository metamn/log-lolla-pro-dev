<?php
  /**
   * Template part to display a shortcode
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */
?>

<?php
  if ( empty( $shortcode_klass ) ) {
    $shortcode_klass = get_query_var( $shortcode_klass );
  }
?>

<aside class="shortcode <?php echo $shortcode_klass; ?>">
  <?php get_template_part( 'template-parts/shortcode/parts/shortcode', 'title' ); ?>
  <?php get_template_part( 'template-parts/shortcode/parts/shortcode', 'body' ); ?>
</aside>
