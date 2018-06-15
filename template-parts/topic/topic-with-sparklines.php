<?php
  /**
   * Template part for displaying a topic / taxonomy
   *
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla_Pro
   */

  $topic = get_query_var( 'topic' );
  $sparklines = get_query_var( 'sparklines' );

  if ( ! empty( $topic ) ) { ?>

    <div class="topic-with-sparklines">
      <span class="topic">
        <?php get_template_part( 'template-parts/topic/parts/topic', 'link' ); ?>
      </span>

      <span class="sparklines sparks-font sparks-font-dotline-medium">
        <?php echo $sparklines ?>
      </span>
    </div>

  <?php }
?>
