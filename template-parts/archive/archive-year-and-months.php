<?php
  /**
   * Display archive of years and months
   *
   *
   * @package Log_Lolla_Pro
   */
?>


<?php
  $archive_year = get_query_var( 'archive_year' );
  $archive_months = get_query_var( 'archive_months' );
?>

<div class="year-and-months">
  <?php get_template_part( 'template-parts/archive/parts/archive', 'year' ); ?>

  <?php $grid = round( count( $archive_months ) / 2 ); ?>
  <div class="months grid-<?php echo $grid ?>">
    <?php
      foreach ($archive_months as $archive_month) {
        set_query_var( 'archive_month', $archive_month );
        get_template_part( 'template-parts/archive/parts/archive', 'month' );
      }
    ?>
  </div>
</div>
