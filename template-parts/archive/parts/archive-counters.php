<?php
  /**
   * Displaying archive counters
   *
   *
   * @package Log_Lolla_Pro
   */
?>

<?php
  $pictograms = get_query_var( 'pictograms' );

  if ( empty( $pictograms ) ) {
    $pictograms = log_lolla_get_pictograms( log_lolla_get_archive_counters() );
  }

  if ( empty( $pictograms) ) return;
?>


<nav class="archive-counters">
  <h3 class="hidden">Archive counters</h3>

  <?php
    foreach ($pictograms as $pictogram) {
      set_query_var( 'pictogram', $pictogram );
      get_template_part( 'template-parts/archive/parts/archive-counter', '' );
    }
  ?>
</nav>
