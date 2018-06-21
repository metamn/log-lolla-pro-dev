<?php
  /**
   * Displaying summaries of an archive
   *
   *
   * @package Log_Lolla_Pro
   */

  $archive = get_queried_object();
  $posts = log_lolla_pro_get_summaries_for_archive( $archive );

  if ( ! empty( $summaries ) ) { ?>
    <section class="archive-list archive-list-summaries">
      <h3 class="archive-list-title">
        <?php esc_html_e( 'Summaries ', 'log-lolla-pro'); ?>
      </h3>

      <div class="archive-list-body">
        <?php echo $summaries ?>
      </div>
    </section>
  <?php }
?>
