<?php
  /**
   * Displaying a link to an archive month
   *
   *
   * @package Log_Lolla_Pro
   */

  $archive_year = get_query_var( 'archive_year' );
  $archive_month = get_query_var( 'archive_month' );
?>

<div class="month">
  <a class="link" href="<?php echo get_month_link( $archive_year, $archive_month ); ?>" title="<?php echo $archive_month ?>">
    <?php echo $archive_month ?>
  </a>
</div>
