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
    <section class="archive-list archive-list--topics">
      <h3 class="archive-list-title">
        <?php esc_html_e( 'Related topics ', 'log-lolla'); ?>
      </h3>

      <div class="archive-list-body">
        <?php echo $related_topics ?>
      </div>
    </section>
  <?php }
?>
