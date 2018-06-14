<?php
  /**
   * Template part for displaying sparklines
   *
   * @package Log_Lolla_Pro
   */

   $sparklines = get_query_var( 'sparklines' );
?>

<span class="sparklines sparks-font sparks-font-dotline-medium">
  <?php echo $sparklines ?>
</span>
