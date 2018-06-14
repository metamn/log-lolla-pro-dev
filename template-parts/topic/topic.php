<?php
  /**
   * Template part for displaying a term / taxonomy
   *
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */

  $topic = get_query_var( 'topic' );

  if ( ! empty( $topic ) ) { ?>

    <div class="topic">
      <?php get_template_part( 'template-parts/topic/parts/topic', 'link' ); ?>
    </div>

  <?php }
?>
