<?php
  /**
   * Displaying related topics of an archive
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */
?>


<?php
  $archive = get_queried_object();
  $related_topics  = log_lolla_display_related_topics_for_archive( $archive );

  if ( ! empty( $related_topics ) ) { ?>
    <section class="archive-related-topics">
      <h3 class="archive-related-topics-title">
        <?php esc_html_x( 'Archive related topics ', 'log-lolla'); ?>
      </h3>

      <div class="archive-related-topics-body">
        <?php echo $related_topics ?>
      </div>
    </section>
  <?php }
?>
