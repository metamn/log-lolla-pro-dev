<?php
  /**
   * Template part for displaying archives for a taxonomy
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */
?>

<section class="archive-list archive-list--terms">
  <h3 class="archive-list-title hidden">
    <?php esc_html_e( 'All terms', 'log-lolla'); ?>
  </h3>

  <div class="archive-list-body">
    <?php
      $term = get_query_var( 'term' );
      echo log_lolla_topic_archive( $term ); 
    ?>
  </div>
</section>
