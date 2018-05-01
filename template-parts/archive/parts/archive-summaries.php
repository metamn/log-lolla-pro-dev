<?php
  /**
   * Displaying summaries of an archive
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */
?>

<?php
  $archive = get_queried_object();
  $summaries = log_lolla_display_summaries_for_archive( $archive );

  if ( ! empty( $summaries ) ) { ?>
    <section class="archive-list archive-list--summaries">
      <h3 class="archive-list-title">
        <?php esc_html_e( 'Summaries ', 'log-lolla'); ?>
      </h3>

      <div class="archive-list-body">
        <?php echo $summaries ?>
      </div>
    </section>
  <?php }
?>
