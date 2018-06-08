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

<?php $triangle_direction = get_query_var( 'triangle_direction' ) ?>
<span class="triangle triangle--<?php echo $triangle_direction ?>"></span>'
