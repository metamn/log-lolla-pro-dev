<?php
  /**
   * Displaying standard posts of an archive
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */
?>

<?php
  $archive = get_queried_object();
  $standard_posts = log_lolla_display_standard_posts_for_archive( $archive );

  if ( ! empty( $standard_posts ) ) { ?>
    <section class="archive-list archive-list--standard-posts">
      <h3 class="archive-list-title">
        <?php esc_html_e( 'Thoughts', 'log-lolla'); ?>
      </h3>

      <div class="archive-list-body">
        <?php echo $standard_posts ?>
      </div>
    </section>
  <?php }
?>
