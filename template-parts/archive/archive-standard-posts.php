<?php
  /**
   * Displaying standard posts of an archive
   *
   *
   * @package Log_Lolla_Pro
   */

  $archive = get_queried_object();
  $standard_posts = log_lolla_pro_display_standard_posts_for_archive( $archive );

  if ( ! empty( $standard_posts ) ) { ?>
    <section class="archive-list archive-list-standard-posts">
      <h3 class="archive-list-title">
        <?php esc_html_e( 'Thoughts', 'log-lolla-pro'); ?>
      </h3>

      <div class="archive-list-body">
        <?php echo $standard_posts ?>
      </div>
    </section>
  <?php }
?>
