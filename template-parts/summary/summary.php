<?php
  /**
   * Template part to display a summary
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */
?>


<article class="summary">
  <?php get_template_part( 'template-parts/summary/parts/summary', 'dates' ); ?>
  <?php get_template_part( 'template-parts/summary/parts/summary', 'link-to-topic' ); ?>
  <?php get_template_part( 'template-parts/summary/parts/summary', 'title-without-link' ); ?>
</article>
