<?php
  /**
   * Displaying a triangle
   *
   * The corresponding SCSS code can be found in `assets/scss/framework/design/decorations`
   *
   * @package Log_Lolla_Pro
   */
?>

<?php $direction = get_query_var( 'triangle_direction' ) ?>
<?php $klass = get_query_var( 'triangle_klass' ) ?>
<span class="triangle triangle--<?php echo $triangle_direction ?> <?php echo $triangle_klass ?>"></span>
