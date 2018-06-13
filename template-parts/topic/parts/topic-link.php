<?php
  /**
   * Template part to display a link to a topic
   */
?>


<a class="link" href="<?php echo esc_url( get_term_link( $topic->term_id ) ) ?>" title="<?php echo $topic->name ?>">
  <?php echo $topic->name ?>
</a>
