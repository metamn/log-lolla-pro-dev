<?php
  /**
   * Displaying a triangle
   *
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */
?>

<?php $direction = get_query_var( 'triangle_direction' ) ?>
<?php $klass = get_query_var( 'triangle_klass' ) ?>
<span class="triangle triangle--<?php echo $triangle_direction ?> <?php echo $triangle_klass ?>"></span>
