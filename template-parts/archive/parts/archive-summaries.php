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
    <section class="archive-summaries">
      <h3 class="archive-summaries-title">
        <?php esc_html_x( 'Archive summaries ', 'log-lolla'); ?>
      </h3>

      <div class="archive-summaries-body">
        <?php echo $summaries ?>
      </div>
    </section>
  <?php }
?>
